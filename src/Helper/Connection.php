<?php
namespace OOP_regLog\Helper;

class Connection
{
    /**
     * PDO connection object.
     * @var \PDO
     */
    private static $connection = null;

    /**
     * Connection constructor. Connection cannot be instantiated.
     */
    private function __construct()
    {
    }

    /**
     * Create a PDO object if it doesn't already exist, then return it.
     * @return \PDO
     */
    public static function getConnection()
    {
        if (!self::$connection) {
            try {
                self::$connection = new \PDO('mysql:host=localhost;dbname=oop_reglog;port=3306', 'root', 'root');
                self::$connection->exec("SET NAMES UTF8");
            } catch (\PDOException $exception) {
                echo "Fatal error.";
                exit;
            }
        }
        return self::$connection;
    }
}