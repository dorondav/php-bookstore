<?php

class Db
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "php_books";
    /** @var $PDO */
    protected function connect()
    {

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (error $e) {
            $e->getMessage();
        }
    }
}