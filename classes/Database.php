<?php

class Database
{
    private $pdo;
    private $error;

    public function __construct()
    {
        $config = require_once '../../config.php';

        try {
          $this->setPdo( new PDO(CONNECT .';dbname='. NAME , USER, PASS));
        } catch (PDOException $e) {

        }
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param mixed $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }
}
