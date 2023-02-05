<?php
namespace App;

class Propiedad {

    // Base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedor_id' ];

    // Errores
    protected static $errores = [];
    
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedor_id;

    // Definir la conexión a la BD
    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedor_id = $args['vendedor_id'] ?? '';
    }

    public function guardar(){

        //Sanitzar los datos 
 
        $datos = $this->sanitizarDatos();
    
        //Insertar a base de datos
        $query = " INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($datos));
        $query .= " ) VALUES ( '";
        $query .= join("', '", array_values($datos));
        $query .= "' ) ";
        
                
        $resultado = self::$db->query($query);

        return $resultado;

    }

    public function datos(){
        $datos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id')continue;
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }

    public function sanitizarDatos () {
        $datos = $this->datos();
        $sanitizado = [];
        foreach($datos as $key => $value ){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Subida de archivos
    public function setImagen($imagen){
            // Asignar al atributo de la imagen el nombre de la imagen
            if($imagen){
                $this->imagen = $imagen;
            }
    }

    // Validacion 
    public static function getErrores() {
        
        return self::$errores;
    }

    public function validar(){
        // Chequear si hay errores
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }

        if (strlen($this->descripcion) < 25) {
            self::$errores[] = "La descripción debe tener mas de 25 caracteres";
        }

        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir las habitaciones";
        }
        
        if (!$this->wc) {
            self::$errores[] = "Debes añadir los baños";
        }

        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir las cocheras";
        }

        if (!$this->vendedor_id) {
            self::$errores[] = "Selecciona un vendedor";
        }

        if(!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen";
        }
        
        return self::$errores;
        
    }
    

}