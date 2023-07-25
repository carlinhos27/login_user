<?php
include('../config/cdn-helper.php');

$nav_links = [
    [
        'name' => 'Option 1',
        'route' => 'iniciouser',
    ],
    [
        'name' => 'Option 2',
        'route' => 'pedro',
    ],
    [
        'name' => 'Option 3',
        'route' => 'luis',
    ],
];

// Obtiene la URL actual
$current_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$current_url = strval($current_url);
$url = isset($_GET['url']) ? $_GET['url'] : '/';
$url = '/calendario/public/'.$url;
$url = strval($url);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Título de la página</title>

    <!-- hojas de estilo -->
    <?php printCSSCDNLinks($cdnLists['css']); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../public">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php if ($_SESSION) { ?>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <?php foreach ($nav_links as $link) : ?>
                            <li class="nav-item <?php if (strpos($current_url, $link['route']) !== false) { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo $link['route']; ?>" data-route="<?php echo $link['route']; ?>">
                                    <?php echo $link['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php } ?>
        </nav>
    </header>
</body>

</html>
