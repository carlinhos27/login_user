<?php
// controllers/RegistroController.php
require_once '../app/models/UsuarioModel.php';

class RegistroController
{
    public function showRegistroForm()
    {
        include_once '../app/views/registro.php';
    }

    public function registrarUsuario()
    {
      
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombreUsuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];

        $usuarioModel = new UsuarioModel();
        $usuarioModel->crearUsuario($nombreUsuario, $contraseña);

        header('Location: ../public/login');
     }
    }
}
