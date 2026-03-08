<?php

//Incluyo la clase Database para poder usar la conexión PDO
require_once "config/Database.php";

//Creo la clase Categoria
class Categoria
{
    //ATRIBUTOS PRIVADOS DEL OBJETO
    //Representan las columnas de la tabla categorias
    private $id;
    private $nombre;

    //ATRIBUTO PARA GUARDAR LA CONEXIÓN A LA BASE DE DATOS
    private $conn;

    //CONSTRUCTOR
    //Se ejecuta automáticamente cuando creamos un objeto Categoria
    public function __construct()
    {
        //Creamos un objeto de la clase Database
        $database = new Database();

        //Guardamos la conexión en el atributo $conn
        $this->conn = $database->getConnection();
    }

    // GETTERS Y SETTERS
    //Permiten acceder a los atributos privados
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // MÉTODO obtenerTodas()
    //Este método obtiene todas las categorías de la base de datos
    //Se usará por ejemplo para mostrar las categorías en un menú o en un formulario
    public function obtenerTodas()
    {
        //Consulta SQL
        $sql = "SELECT * FROM categorias ORDER BY nombre";

        //Ejecutamos la consulta
        $stmt = $this->conn->query($sql);

        //Devolvemos todas las categorías
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // MÉTODO obtenerPorId()
    //Obtiene una categoría concreta a partir de su id
    public function obtenerPorId()
    {
        //Consulta SQL con marcador de posición
        $sql = "SELECT * FROM categorias WHERE id = ?";

        //Preparamos la consulta
        $stmt = $this->conn->prepare($sql);

        //Ejecutamos pasando el id
        $stmt->execute([$this->id]);

        //Devolvemos la categoría encontrada
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
