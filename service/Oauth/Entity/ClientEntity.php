<?php
namespace Higo\Service\Oauth\Entity;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait; 

/**
 * Class: ClientEntity
 *
 * @see ClientEntityInterface
 */
class ClientEntity implements ClientEntityInterface 
{
    use ClientTrait, EntityTrait; 

    /**
     * clientSecret
     *
     * @var string
     */
    protected $clientSecret;

    /**
     * userId
     *
     * @var int
     */
    protected $userId;

    /**
     * grantType
     *
     * @var mixed
     */
    protected $grantType;

    /**
     * scopes
     *
     * @var string
     */
    protected $scopes;

    /**
     * setClientSecret
     *
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * getClientSecret
     * 
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * setName
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * setRedirectUri
     *
     * @param mixed $uri
     */
    public function setRedirectUri($uri) 
    {
        $this->redirectUri = $uri;
    }

    /**
     * getRedirectUri
     * 
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * setGrantType
     *
     * @param mixed $grantType
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
    }

    /**
     * getGrantType
     *
     */
    public function getGrantType()
    {
        return $this->grantType;
    }

    /**
     * setUserId
     *
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * getUserId
     *
     */
    public function getUserId() 
    {
        return $this->userId;
    }

    /**
     * setScopes
     *
     * @param mixed $scopes
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;
    }

    /**
     * getScopes
     *
     */
    public function getScopes()
    {
        return $this->scopes;
    }
}
