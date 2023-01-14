<?php

require '../includes/app.php';

$auth = estaAutenticado();
if(!$auth){
    header('location: /');
}



// Importar conexion a la BD
$db = conectarDB();

// Escribir el QUERY
$query = "SELECT * FROM propiedades";

// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query);

// Mensaje de propiedade creada correctamente
$resultado = $_GET['resultado'] ?? null; 

// Eliminar Propiedad
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id) {
        // Elimina el archivo de imagend e la propiedad
        $query_imagen = " SELECT imagen FROM propiedades WHERE id = $id ";
        $resultado_QI = mysqli_query($db, $query_imagen);
        $propiedad = mysqli_fetch_assoc($resultado_QI);
        
        unlink('../imagenes/' . $propiedad['imagen']);
        
        
        // Elmina datos de la propiedad
        $query_delete = " DELETE FROM propiedades WHERE id = $id ";
        $resultado_QD = mysqli_query($db, $query_delete);

        if($resultado_QD) {
            header('location: /admin?resultado=3');
        }
    }
    
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>ADMINISTRADOR DE PROPIEDADES</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito"> Anuncio Creado Correctamente</p>
        <?php elseif(intval($resultado) === 2) : ?>
        <p class="alerta exito"> Propiedad Editada Correctamente</p>
        <?php elseif(intval($resultado) === 3) : ?>
        <p class="alerta exito"> Propiedad Eliminada Correctamente</p>
    <?php endif ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>



    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar resultados de la BD -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['id'] ?></td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td>
                        <img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen propiedad" class="imagenTabla">
                    </td>
                    <td>$<?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id" value= "<?php echo $propiedad['id'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" >
                        </form>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block ">Editar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>




<?php 
    // Cerrar la conexion
    mysqli_close($db);


    incluirTemplate('footer'); 
?>