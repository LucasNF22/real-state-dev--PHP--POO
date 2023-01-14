<?php

function conectarDB(): mysqli
{

    $db = new mysqli('localhost', 'root', 'SQL123456', 'realstatedev_crud');

    $db->set_charset('utf8');

    if (!$db) {
        echo "Error no se pudo conectar";
        exit;
    }
    
    return $db;
}
