<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
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
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Imagen blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Iluminacion natural</h4>
                    <p class="info-meta">Escrito el: <span>16/10/22</span> por: <span>ADMIN</span></p>
                    <p>
                        Optimiza la luz natural de forma conrrecta con estos tips.
                    </p>
                </a>
            </div>
        </article><!--Fin entrada blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Imagen blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Micro espacios</h4>
                    <p class="info-meta">Escrito el: <span>08/10/22</span> por: <span>ADMIN</span></p>
                    <p>
                        Como vivir en 35m2 sin volverse loco.
                    </p>
                </a>
            </div>
        </article><!--Fin entrada blog-->
    </main>

    <?php incluirTemplate('footer'); ?>
    
