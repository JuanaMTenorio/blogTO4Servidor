<?php

//Incluiyo la conexión PDO
require_once "config/Database.php";

//Creo la clase Entrada
class Entrada{
    //ATRIBUTOS PRIVADOS
    //Representan las columnas de la tabla entradas
    private $id;
    private $usuario_id;
    private $categoria_id;
    private $titulo;
    private $imagen;
    private $descripcion;
    private $fecha;
    //ATRIBUTO PARA GUARDAR LA CONEXIÓN A LA BASE DE DATOS
    private $conn;

    //CONSTRUCTOR
    //Se ejecuta automáticamente cuando se crea un objeto Entrada
    public function __construct()
    {
        //Creamos el objeto Database
        $database = new Database();

        //Guardamos la conexión a la BD
        $this->conn = $database->getConnection();
    }

    // GETTERS Y SETTERS
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    // MÉTODO guardar()
    //Inserta una nueva entrada en la base de datos
    public function guardar()
    {
        //Consulta SQL para insertar una entrada
        $sql = "INSERT INTO entradas (usuario_id, categoria_id, titulo, imagen, descripcion)
                VALUES (?, ?, ?, ?, ?)";

        //Preparamos la consulta
        $stmt = $this->conn->prepare($sql);

        //Ejecutamos la consulta pasando los valores
        $resultado = $stmt->execute([
            $this->usuario_id,
            $this->categoria_id,
            $this->titulo,
            $this->imagen,
            $this->descripcion
        ]);

        //Devolvemos true o false
        return $resultado;
    }

    // MÉTODO obtenerTodas()
    //Obtiene todas las entradas del blog
    public function obtenerTodas()
    {
        //Consulta SQL
        $sql = "SELECT * FROM entradas ORDER BY fecha DESC";

        //Ejecutamos la consulta
        $stmt = $this->conn->query($sql);

        //Devolvemos todas las entradas
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // MÉTODO obtenerPorId()
    //Obtiene una entrada concreta
    public function obtenerPorId()
    {
        $sql = "SELECT * FROM entradas WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$this->id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // MÉTODO eliminar()
    //Elimina una entrada del blog
    public function eliminar()
    {
        $sql = "DELETE FROM entradas WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$this->id]);
    }
}
