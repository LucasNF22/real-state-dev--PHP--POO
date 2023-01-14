<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Propiedades Disponibles</h1>
        
        <?php 
            $limite = 50;
            include 'includes/templates/tarjeta-propiedad.php';
        ?>

    </main>

    <?php incluirTemplate('footer'); ?>
    
  