<?php

namespace App\Models;

use PDO;
use PDOException;

class PdoConnection
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $pdo = new PDO(
                "mysql:host=" . DATABASE_HOST . ";dbname=" . DATABASE_NAME . ";",
                DATABASE_USER,
                DATABASE_PASSWORD
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        } catch (PDOException $ex) {
            echo "ERROR: " . $ex->getMessage();
        }
    }

    public function getDataBaseContext(): PDO
    {
        return $this->pdo;
    }
}
