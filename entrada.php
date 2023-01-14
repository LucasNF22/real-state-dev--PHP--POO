<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen propiedad">
        </picture>
        <p class="info-meta">Escrito el: <span>20/12/22</span> por: <span>ADMIN</span></p>

        <div class="resumen-propiedad">
            
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pharetra diam, nec convallis metus. Nullam vehicula rutrum leo eget aliquam. Duis molestie facilisis odio, id pretium lectus varius vitae. Praesent quis placerat elit. Nam nec tellus sit amet mi gravida viverra sed ut diam. Sed nec odio feugiat, lacinia nibh sit amet, consequat dui. Aenean in dapibus lacus, pharetra congue neque. Curabitur scelerisque tortor at vulputate sodales. Maecenas sed interdum elit. Cras rhoncus tellus elit, et blandit elit gravida eu. Curabitur pretium, lectus at dictum dictum, tellus ipsum interdum enim, vel hendrerit lectus lorem posuere mi. Nam posuere tincidunt cursus. Maecenas dapibus dictum venenatis.
                    </p>
        </div>
    </main>

    <?php incluirTemplate('footer'); ?>
    
 