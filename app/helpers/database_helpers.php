<?php
// app/helpers/database_helpers.php

// Función para guardar una relación uno a muchos
function guardarUnoAMuchos($tablaPrincipal, $idPrincipal, $tablaSecundaria, $campoSecundario, $valoresSecundarios)
{
    require_once '../database/Database.php';
    $db = new Database();

    $idPrincipal = intval($idPrincipal);
    $campoSecundario = htmlspecialchars($campoSecundario);

    foreach ($valoresSecundarios as $valorSecundario) {
        $valorSecundario = htmlspecialchars($valorSecundario);

        $query = "INSERT INTO $tablaSecundaria ($campoSecundario) VALUES ('$valorSecundario')";
        $db->query($query);

        $idSecundario = $db->lastInsertId();

        $query = "INSERT INTO $tablaPrincipal (id_principal, id_secundario) VALUES ($idPrincipal, $idSecundario)";
        $db->query($query);
    }
}

// Función para guardar una relación muchos a muchos
function guardarMuchosAMuchos($tablaPrincipal, $idPrincipal, $tablaIntermedia, $campoTablaPrincipal, $campoTablaIntermedia, $valoresSecundarios)
{
    require_once 'app/models/Database.php';
    $db = new Database();

    $idPrincipal = intval($idPrincipal);
    $campoTablaPrincipal = htmlspecialchars($campoTablaPrincipal);
    $campoTablaIntermedia = htmlspecialchars($campoTablaIntermedia);

    foreach ($valoresSecundarios as $valorSecundario) {
        $valorSecundario = htmlspecialchars($valorSecundario);

        $query = "INSERT INTO $tablaIntermedia ($campoTablaIntermedia) VALUES ('$valorSecundario')";
        $db->query($query);

        $idSecundario = $db->lastInsertId();

        $query = "INSERT INTO $tablaPrincipal ($campoTablaPrincipal, id_secundario) VALUES ($idPrincipal, $idSecundario)";
        $db->query($query);
    }
}

// Otras funciones útiles para consultas y relaciones, si se requieren, pueden agregarse aquí.
?>
