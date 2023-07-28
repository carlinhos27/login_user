<?php
// app/models/UsuarioModel.php
require_once '..database/Database.php';

class UsuarioModel
{
    public function crearUsuario($nombreUsuario, $contraseña)
    {
        $nombreUsuario = trim($nombreUsuario); 
        $hashContraseña = password_hash($contraseña, PASSWORD_DEFAULT);

        try {

            $db = Database::getConnection();
            $sql = 'INSERT INTO Usuarios (nombre_usuario, contraseña) VALUES (?, ?)';
            $stmt = $db->prepare($sql);
            $stmt->execute([$nombreUsuario, $hashContraseña]);

        } catch (PDOException $e) {

            die('Error al crear el usuario: ' . $e->getMessage());
        }
    }

    public function obtenerUsuarioPorNombre($nombreUsuario)
    {
        $nombreUsuario = trim($nombreUsuario); 

        try {

            $db = Database::getConnection();
            $sql = 'SELECT * FROM Usuarios WHERE nombre_usuario = ?';
            $stmt = $db->prepare($sql);
            $stmt->execute([$nombreUsuario]);

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
                die('Error al obtener el usuario: ' . $e->getMessage());
        }
    }
}
