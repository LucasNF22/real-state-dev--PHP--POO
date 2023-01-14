<?php

    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor">
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

    </main>

    <section class="seccion contenedor">
        <h2>Propiedades disponibles</h2>

        <?php 
            $limite = 3;
            include 'includes/templates/tarjeta-propiedad.php';
        ?>
        
        <div class="alinear-centro">
            <a href="anuncios.php" class="boton-verde j">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra el Hogar de tus sueños</h2>
        <p>Completa el formulario de contacto y un asesor se pondrá en contacto a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="info-meta">Escrito el: <span>20/12/22</span> por: <span>ADMIN</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa.
                        </p>
                    </a>
                </div>
            </article><!--Fin entrada blog-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para una correcta decoración</h4>
                        <p class="info-meta">Escrito el: <span>18/12/22</span> por: <span>ADMIN</span></p>
                        <p>
                            Maximiza el espacio de tu hogar con esta guía, aprende a combinar muebles
                            y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article><!--Fin entrada blog-->
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención
                    y la casa que adquirí, cumplió todas las espectativas.
                </blockquote>
                <p>- Lionel Messi</p>
            </div>
        </section>

    </div>

    <?php incluirTemplate('footer'); ?>

   