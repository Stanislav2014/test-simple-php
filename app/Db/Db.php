<?php

namespace App\Db;

use PDO;

final class Db
{
    public $pdo;

    /** Работа с БД
     * @return void
     */
    public function __construct()
    {
        $host = 'db';
        $db = 'items_db';
        $user = 'user';
        $pass = 'password';

        $this->pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    }
}