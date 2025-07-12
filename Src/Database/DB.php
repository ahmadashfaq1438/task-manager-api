<?php
namespace Src\Database;

use PDO;

class DB
{
    public static function connect(): PDO
    {
        return new PDO("mysql:host=localhost;dbname=fourtechbase", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
?>