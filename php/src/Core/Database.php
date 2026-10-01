<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../.");
$dotenv->load();

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $dbHost = "host={$_ENV["DB_HOST"]}";
        $dbName = "dbname={$_ENV["DB_NAME"]}";
        $charset = "charset=utf8mb4";
        $dsn = "mysql:{$dbHost};{$dbName};{$charset};";
        $this->pdo = new PDO($dsn, $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
