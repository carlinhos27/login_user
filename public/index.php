<?php
// public/index.php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$usuarioLogueado = isset($_SESSION['usuario_id']);

// rutas permitidas para usuarios logueados
$rutasPermitidasLogueados = [
    'iniciouser' => 'IndexController@inicio',
    'logout' => 'LoginController@logout'
];

// rutas permitidas para usuarios no logueados
$rutasPermitidasNoLogueados = [
    '/' => 'InicioController@mostrarInicio',
    'login' => 'LoginController@mostrarFormularioLogin',
    'registro' => 'RegistroController@showRegistroForm',
    'registrar' => 'RegistroController@registrarUsuario',
    'iniciarsesion' => 'LoginController@iniciarSesion',
];

// Obtener la URL solicitada
$url = isset($_GET['url']) ? $_GET['url'] : '/';

// Enrutamiento dinámico
$controladorMetodo = null;

if ($usuarioLogueado && isset($rutasPermitidasLogueados[$url])) {
    $controladorMetodo = $rutasPermitidasLogueados[$url];
} elseif (!$usuarioLogueado && isset($rutasPermitidasNoLogueados[$url])) {
    $controladorMetodo = $rutasPermitidasNoLogueados[$url];
}

if ($controladorMetodo) {
    [$controlador, $metodo] = explode('@', $controladorMetodo);
    $controladorArchivo = '../app/controllers/' . $controlador . '.php';

    if (file_exists($controladorArchivo)) {
        require_once $controladorArchivo;
        $controladorInstancia = new $controlador();
        $controladorInstancia->$metodo();
    } else {
        echo 'Error 404 - Página no encontrada';
    }
} else {
    if ($usuarioLogueado) {
        if ($url === 'login' || $url === 'registro' || $url === '/') {
            header('Location: iniciouser');
            exit();
        }
        header('Location: iniciouser');
        exit();
    } else {
        if ($url === 'iniciouser') {
            header('Location: login');
            exit();
        }

        header('Location: login');
        exit();
    }
}
