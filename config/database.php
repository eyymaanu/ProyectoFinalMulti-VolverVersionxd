<?php
class Database {
    private static $pdo = null;

    private function __construct() {}

    public static function getConnection() {

        if (self::$pdo === null) {
            $host = 'fra1.clusters.zeabur.com';
            $port = '30250';
            $charset = 'utf8mb4';
            $db = 'zeabur';
            $user = 'root';
            $pass = 't8239Fd61fnaVeL0JKkvAE45GbI7HQlo';

            $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        return self::$pdo;
    }
}
?>
