<?php

declare(strict_types=1);

use PDO;

class DB
{
    public static function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=todo_db', 'root', '1234');
    }
}