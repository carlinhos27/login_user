<?php
// app/database/Database.php

class Database
{
    private static $connection = null;

    public static function getConnection($configName = 'default')
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

    // Método para ejecutar una consulta SQL
    public function query($query)
    {
        try {
            $stmt = self::$connection->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die('Error en la consulta: ' . $e->getMessage());
        }
    }

    // Método para obtener el último ID insertado
    public function lastInsertId()
    {
        return self::$connection->lastInsertId();
    }
}
?>
