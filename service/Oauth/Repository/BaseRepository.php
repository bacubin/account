<?php
namespace Higo\Service\Oauth\Repository;

use Doctrine\DBAL\ConnectionInterface;
use Doctrine\DBAL\DriverManager;

/**
 * Class: BaseRepository
 *
 * @abstract
 */
abstract class BaseRepository
{
    /**
     * connection
     *
     * @var ConnectionInterface
     */
    public static $connection = null;

    /**
     * dns
     *
     * @var string
     */
    protected $dns = 'default';

    /**
     * __construct
     * 
     * @return void
     *
     */
    public function __construct()
    {
        self::initConnection($this->dns);
    }

    /**
     * getDbSetting
     *
     * @return array
     */
    public static function getDbSetting() : array
    {
        return require PATH_SERVICE_SETTING . "mysql.ini.php";
    }

    /**
     * initConnection
     *
     * @param string $dns
     */
    public static function initConnection(string $dns)
    {
        if (!self::$connection instanceof ConnectionInterface) {
            $params = self::getDbSetting();
            if (!isset($params[$dns])) {
                throw new \Exception('DNS not defined');
            }
            self::$connection = DriverManager::getConnection($params[$dns]);
        }
        return self::$connection;
    }
}


