<?php

require '../../includes/app.php';

use App\Propiedad;


// Filtro apara usuarios no logueados
estaAutenticado();

// BASE DE DATOS
$db = conectarDB();

// Consultar datos vendedores
$consulta_vendedores = "SELECT * FROM vendedores";
$resultado_vendedores = mysqli_query($db, $consulta_vendedores);

// Codigo para Detectar errores
$erores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedor_id = '';

// Ejecuta el codigo cuando se envía el formulario.
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $propiedad = new Propiedad($_POST);

    $propiedad->guardar();

    debuguear($propiedad);

    /*
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
    
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    */
    

    // mysqli_real_escape_string, evita que se inyecte codigo sql, y guarda los datos como entidades que no se pueden ejecutar.
    $titulo = mysqli_real_escape_string($db,  $_POST['titulo'] );
    $precio = mysqli_real_escape_string($db,  $_POST['precio'] );
    $descripcion = mysqli_real_escape_string($db,  $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string($db,  $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string($db,  $_POST['wc'] );
    $estacionamiento =mysqli_real_escape_string($db,  $_POST['estacionamiento'] );
    $vendedor_id = mysqli_real_escape_string($db,  $_POST['vendedor_id'] );
    $creado = date('Y/m/d');

    //Asignar imagen a una variable
    $imagen = $_FILES['imagen'];

    var_dump($imagen['name']);

   
    // Chequear si hay errores
    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 25) {
        $errores[] = "La descripción debe tener mas de 25 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "Debes añadir las habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes añadir los baños";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes añadir las cocheras";
    }

    if (!$vendedor_id) {
        $errores[] = "Selecciona un vendedor";
    }

    if(!$imagen['name']) {
        $errores[] = "Debes añadir una imagen";
    }
    //validando tamaño de imagen
    $tamaño_max = 1000 ;  // en kb
    $tamaño_max_bytes = 1000 * 1000; // en bytes

    if($imagen['size'] > $tamaño_max_bytes) {
        $errores[] = "La imagen es muy pesada";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";


    // revisar que no haya errores
    if (empty($errores)) {

        /** Subida de archivos **/
        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        // Generar nombre unico
        $nombreImagen= md5( uniqid( rand(), true)) . '.jpg';


        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        
        

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Se redirecciona
            header('Location: /admin?resultado=1');
        }
    }
}


incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>CREAR</h1>

    <a href="/admin" class=" boton boton-verde margin-bottom no-margin-top">Volver</a>


    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>


    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept=" image/png, image/jpg">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="10" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="10" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="10" value="<?php echo $estacionamiento ?>">

        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor_id">
                <option value="" disabled selected>--Selecciona un vendedor--</option>

                <?php while ($vendedor = mysqli_fetch_assoc($resultado_vendedores) ) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre']. " " . $vendedor['apellido']; ?>
                    </option>
                <?php endwhile ?>

            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>