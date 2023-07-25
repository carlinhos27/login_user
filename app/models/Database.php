<?php
// app/models/Database.php

class Database
{
    private static $connection = null;

    public static function getConnection($configName = 'usuarios')
    {
         $databaseConfig = require '../config/database.php';

          if (!isset($databaseConfig[$configName])) {
            die('Error: La configuración especificada no existe.');
        }

        $config = $databaseConfig[$configName];
        $host = $config['host'];
        $database = $config['database'];
        $username = $config['username'];
        $password = $config['password'];

        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Error al conectar a la base de datos: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
