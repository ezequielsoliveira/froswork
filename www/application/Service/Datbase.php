<?php

namespace Utility;

class Database
{
    private static $connection = null;
    public static string $host;
    public static string $dbname;
    public static int $port;
    public static string $username;
    public static string $password;
    public static array $options = [
        \PDO::ATTR_PERSISTENT => false,
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
    ];

    public static function getConnection(): \PDO
    {
        if (self::$connection === null) {
            self::$host = getenv('MARIADB_HOST');
            self::$dbname = getenv('MARIADB_DATABASE');
            self::$port = getenv('MARIADB_PORT');
            self::$username = getenv('MARIADB_USER');
            self::$password = getenv('MARIADB_PASSWORD');
            self::$connection = new \PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";port=" . self::$port . ";",
                self::$username,
                self::$password,
                self::$options
            );
        }
        return self::$connection;
    }

    public static function closeConnection(): void
    {
        static::$connection = null;
    }
}
