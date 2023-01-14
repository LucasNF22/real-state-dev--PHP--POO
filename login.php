<?php

require 'includes/app.php';

// Conexion a la base de datos
$db = conectarDB();

// Autenticar el usuario

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email =  mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) );
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
        $errores[] = "El email no es válido";
    }
    
    if(!$password) {
        $errores[] = "El password no es válido";
    }

    if(empty($errores)){

        // Revisar si el usuario existe
        $queryUsuario = "SELECT * FROM usuarios WHERE email = '$email' ";
        $resultadoUsuario = mysqli_query($db, $queryUsuario);
        
        
        if($resultadoUsuario->num_rows){
            
            $usuario = mysqli_fetch_assoc($resultadoUsuario);
            
            // Revisar si el password es correcto
            $auth = password_verify($password, $usuario['password']);

            var_dump($auth);

            if($auth){
                // El usuario esta autenticado
                session_start();

                // Llenar array de sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin');
                

            }else {
                $errores[] = "El password es incorrecto";
            }
        }else {
            $errores[] = "El ususario no existe";
        }
    }

    

}


incluirTemplate('header');
?>

<main class="contenedor seccion mw-40">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
       <div class="alerta error"><?php echo $error; ?></div>
    
    <?php endforeach ?>

    <form  class="formulario" method="POST">
        <fieldset>
            <legend>Email y password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer'); ?>