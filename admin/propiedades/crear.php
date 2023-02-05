<?php

require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;


// Filtro apara usuarios no logueados
estaAutenticado();

// BASE DE DATOS
$db = conectarDB();

// Consultar datos vendedores
$consulta_vendedores = "SELECT * FROM vendedores";
$resultado_vendedores = mysqli_query($db, $consulta_vendedores);

// Arreglo con mensaje de errores
$errores = Propiedad::getErrores();


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

    // Crea un nueva instancia
    $propiedad = new Propiedad($_POST);

    /** Subida de archivos **/
    
    // Generar nombre unico
    $nombreImagen= md5( uniqid( rand(), true)) . '.jpg';

    // Setear imagen
    // Realiza un resize a la imagen con intervention
    if($_FILES['imagen']['tmp_name']){
        $imagen = Image::make($_FILES['imagen']['tmp_name'])->fit($width=800, $heigt=600 );
        $propiedad->setImagen($nombreImagen);
    }

   

    // Validar
    $errores = $propiedad->validar();

    
    // revisar que no haya errores
    if (empty($errores)) { 

        // Crear carpeta
        if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen en el servidor
        $imagen->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la base de datos
        $resultado = $propiedad->guardar(); 

        // Mensaje de exito o error
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