<?php
    if (!isset($_SESSION))
    session_start();

    $auth = $_SESSION['login'] ?? false ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="pagina de bienes raices" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots"content="content,follow" />
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header ">
            <div class="barra">
                <a href="/index.php">
                    <img src="/build/img/logo.svg" alt="imagen de nuestro logo">
                </a>

                <div class="mostrar-menu">
                    <img src="/build/img/barras.svg" alt="menu desplegable responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="imagen dark-mode">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if ($auth) :  ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>


            </div>  <!-- .barra -->
            <?php if ($inicio) { ?>
                <h1> Venta De Casas y Pisos Exclusivos De Lujo</h1>
            <?php } ?>
            
        </div>
    </header>
