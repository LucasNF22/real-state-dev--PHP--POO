<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealStateDev</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">

                <div class="flex">
                    <a href="/index.php">
                        <img src="/build/img/logo.svg" alt="Logotipo empresa">
                    </a>

                    <div class="mobile-menu">
                        <img src="/build/img/barras.svg" alt="icono menu responsive">
                    </div>
                </div>


                <nav class="navegacion">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="icono dark-mode">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if($auth): ?>
                        <a href="cerrar-sesion.php">LogOut</a>
                    <?php endif ?>
                </nav>

            </div><!--Cierre .barra-->
            <?php if ($inicio) { ?>
                <h1>Venta y administracion de propiedades exclusivas</h1>
            <?php } ?>
        </div>
    </header>