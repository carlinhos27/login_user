<?php
// controllers/LoginController.php
require_once '../app/models/UsuarioModel.php';

class LoginController
{
    public function mostrarFormularioLogin()
    {
        include_once '../app/views/login.php';
    }

    public function iniciarSesion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nombreUsuario = $_POST['nombre_usuario'];
            $contraseña = $_POST['contraseña'];

            $nombreUsuario = filter_var($nombreUsuario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->obtenerUsuarioPorNombre($nombreUsuario);

            if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {

                session_start();
                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                header('Location: iniciouser'); 
                exit();
            } else {

                header('Location: login?error=1'); 
                exit();
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        header('Location: ../public/');
        exit();
    }
}
