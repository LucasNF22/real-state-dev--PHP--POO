<?php
    // Impotar la conexion
    $db = conectarDB();
    
    // Consultar
    $query_propiedades = " SELECT * FROM propiedades LIMIT $limite";


    // Obtener resultado
    $resultado = mysqli_query($db, $query_propiedades);

?>

<div class="contenedor-anuncios">

    <?php while( $propiedad = mysqli_fetch_assoc($resultado) ): ?>

    <div class="anuncio">
        <picture>
                <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'] ?>" alt="anuncio">
        </picture>
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'] ?></h3>
            <p><?php echo $propiedad['descripcion'] ?></p>

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

            <a href="anuncio.php?id=<?php echo $propiedad['id'] ?>" class="boton boton-amarillo">Ver propiedad</a>
        </div>
    </div> <!--fin .anuncio-->
    
    <?php endwhile ?>

</div><!--fin .contenedor-anuncios-->   

<?php
    // Cerrar la conexion
        mysqli_close($db);

?>