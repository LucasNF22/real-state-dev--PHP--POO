<?php

// Importar la conexion
require 'includes/config/app.php';
$db =  conectarDB();

// Crear un email y un apssword
$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash' ); ";

//echo($query);

// Agregarlo a la base de datos
mysqli_query($db, $query);