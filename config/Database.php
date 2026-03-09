<?php

class Database
{
    //Atributos privados para almacenar la info de conexion a la bd
    private $host = "localhost";
    private $dbname = "bdblog";
    private $username = "root";
    private $password = "";

    //Atributo publico para almacenar la conexión a la bd
    public $conn;

    //Metodo publico para establecer la conexión a la base de datos
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexión exitosa a la base de datos.";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

        return $this->conn;
    }
}
