<?php
namespace Higo\Service\Oauth\Repository;

use Higo\Service\Oauth\Entity\ClientEntity;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class: ClientRepository
 *
 * @see BaseRepository
 */
class ClientRepository extends BaseRepository
{
    const __TABLE__ = 'oauth_clients'; 

    /**
     * dns
     *
     * @var string
     */
    protected $dns = 'account';

    public static $optionResolver;

    /**
     * getClientEntity
     *
     * @param string  $clientId
     * @param string  $grantType
     * @param string  $clientSecret
     * @param boolean $mustValidateSecret
     *
     * @throws Doctrine\DBAL\DBALException
     * @return mixed
     */
    public function getClientEntity($clientId, $grantType, $clientSecret = null, $mustValidateSecret = true)
    {
        try {
            $rows = self::$connection->createQueryBuilder()
                ->select('*')->from(self::__TABLE__)
                ->where('client_id = :client_id')->setParameter('client_id', $clientId)
                ->andWhere('client_secret = :client_secret')->setParameter('client_secret', $clientSecret)
                ->setFirstResult(0)->setMaxResults(1)
                ->execute()->fetchAll();
        } catch (\Doctrine\DBAL\DBALException $ex) {
            trigger_error("Failed to get client id($clientId) ". $ex->getMessage());
            throw $ex;
        }

        if (empty($rows)) {
            return null;
        }

        return self::mapRowToObject($rows[0]);
    }

    /**
     * createClient
     *
     * @param mixed $data
     *
     */
    public static function createClient($data)
    {
        try {
            $data = self::getOptionResolver()->resolve($data);
            $ret = self::$connection->createQueryBuilder()
                ->insert(self::__TABLE__)
                ->values($data)
                ->execute();
        } catch (\Exception $ex) {
            throw $ex;
        }
        return $ret;
    }

    /**
     * arrayToObject
     *
     * @param mixed $data
     *
     * @return ClientEntity
     */
    public static function mapRowToObject($data) : ClientEntity
    {
        $client = new ClientEntity();
        $client->setIdentifier(isset($data['client_id']) ? $data['client_id'] : null); 
        $client->setName(isset($data['name']) ? $data['name'] : null);
        $client->setClientSecret(isset($data['client_secret']) ? $data['client_secret'] : null);
        $client->setRedirectUri(isset($data['redirect_uri']) ? $data['redirect_uri'] : null);
        $client->setUserId(isset($data['user_id']) ? $data['user_id'] : null);
        $client->setScopes(isset($data['scopes']) ? $data['scopes'] : null);
        return $client;
    }

    /**
     * getOptionResolver
     * 
     * @return OptionResolver
     */
    public static function getOptionResolver()
    {
        if (self::$optionResolver instanceof OptionsResolver) {
            return self::$optionResolver;
        }

        self::$optionResolver = (new OptionsResolver())
            ->setRequired(array('client_id', 'client_secret', 'redirect_uri'))
            ->setAllowedTypes('client_id', ['string'])
            ->setAllowedTypes('client_secret', 'string')
            ->setAllowedTypes('client_uri', 'string')
            ->setAllowedTypes('name', ['string', 'null'])
            ->setAllowedTypes('scopes', ['string', 'null'])
            ->setAllowedTypes('user_id', ['int', 'null']);

        return self::$optionResolver;
    } 
}
