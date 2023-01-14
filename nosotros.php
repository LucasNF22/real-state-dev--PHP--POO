<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>


    <main class="contenedor contenido-centrado">
        <h1>Nuestra visión</h1>

        <div class="contenido-nosotros ">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pharetra diam, nec convallis metus. Nullam vehicula rutrum leo eget aliquam. Duis molestie facilisis odio, id pretium lectus varius vitae. Praesent quis placerat elit.
                </p>
            </div>

        </div>
    </main>
    <section class="contenedor">
        <h1>Más sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Ventas y transacciones seguras de inicio a fin.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>El mejor precio para tu bolsillo.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Tu tiempo es valioso, nosotros lo valoramos.</p>
            </div>
        </div>

    </section>

    <?php incluirTemplate('footer'); ?>
 