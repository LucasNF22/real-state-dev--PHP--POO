<?php

    require 'includes/app.php';

    // BASE DE DATOS
    $db = conectarDB();

    // Validar el id valido en la URL
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /');
    }

    // Consultar datos de la propiedad
    $consulta_propiedad = "SELECT * FROM propiedades WHERE id = $id";
    
    // Obtener datos
    $resultado_propiedad = mysqli_query($db, $consulta_propiedad);
    $propiedad = mysqli_fetch_assoc($resultado_propiedad);

    // echo "<pre>";
    // var_dump($resultado_propiedad);
    // echo "</pre>";
    
    if(!$resultado_propiedad->num_rows) {
        header('location: /');  
    } 

    
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'] ?></h1>
        
        <a href="/anuncios.php" class=" boton boton-verde margin-bottom no-margin-top">Volver</a>
        
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'] ?>" alt="imagen propiedad">
        
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo number_format($propiedad['precio'],0); ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc'] ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad['estacionamiento'] ?></p>
                        </li>
                        <li>
                            <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad['habitaciones'] ?></p>
                        </li>
                    </ul>
                    <p><?php echo $propiedad['descripcion'] ?></p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in pharetra diam, nec convallis metus. Nullam vehicula rutrum leo eget aliquam. Duis molestie facilisis odio, id pretium lectus varius vitae. Praesent quis placerat elit. Nam nec tellus sit amet mi gravida viverra sed ut diam. Sed nec odio feugiat, lacinia nibh sit amet, consequat dui. Aenean in dapibus lacus, pharetra congue neque. Curabitur scelerisque tortor at vulputate sodales. Maecenas sed interdum elit. Cras rhoncus tellus elit, et blandit elit gravida eu. Curabitur pretium, lectus at dictum dictum, tellus ipsum interdum enim, vel hendrerit lectus lorem posuere mi. Nam posuere tincidunt cursus. Maecenas dapibus dictum venenatis.
                    </p>
        </div>
    </main>

    <?php 
    
    mysqli_close($db);
    incluirTemplate('footer'); 
    
    ?>
    
    