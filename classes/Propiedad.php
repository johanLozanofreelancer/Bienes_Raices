<?php


namespace App;

class Propiedad {
    //Base de Datos
    protected static $db;

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

    //Definir conexion a Base de Datos
    public static function setDB($database){
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '' ;
        $this->titulo = $args['titulo'] ?? '' ;
        $this->precio = $args['precio'] ?? '' ;
        $this->imagen = $args['imagen'] ?? '' ;
        $this->descripcion = $args['descripcion'] ?? '' ;
        $this->habitaciones = $args['habitaciones'] ?? '' ;
        $this->wc = $args['wc'] ?? '' ;
        $this->estacionamiento = $args['estacionamiento'] ?? '' ;
        $this->creado = date('Y/m/d') ?? '' ;
        $this->vendedor_id = $args['vendedor_id'] ?? '' ;
    }


    public function guardar() {
        //sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la la base de datis
        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$this->titulo', '$this->precio', '$this->imagen', '$this->descripcion', '$this->habitaciones', '$this->wc', '$this->estacionamiento', '$this->creado', '$this->vendedor_id')";

        $resultado = self::$db->query($query);

    }
    public function sanitizarAtributos(){

    }

}