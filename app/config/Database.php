<?php
require_once 'env.php';


class Database
{

    public static Database $instance;
    private PDO $pdo;

    private function __construct()
    {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
        } catch (PDOexception $ex) {
            throw new Exception("connection to the database failed: " . $ex->getMessage());
        }
    }


    public static function getInstance(): Database
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function getConnection() : PDO {
        return $this->pdo;
    }
}
