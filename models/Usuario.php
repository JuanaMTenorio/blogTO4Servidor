<?php
//Incluimos la case Database para poder usar la conexión PDO
require_once __DIR__ . "/../config/Database.php";

//Creo la clase Usario
class Usuario
{
    //ATRIBUTOS PRIVADOS DEL OBJETO
    //Aqui guardo los datos de un usuario
    private $id;
    private $nick;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $imagen_avatar;
    private $rol;

    //ATRIBUTOS PARA GUARDAR LA CONEXIÓN A LA BASE DE DATOS
    private $conn;

    //CONSTRUCTOR
    //Se ejecuta automáticamente al crear un objeto Usuario
    public function __construct()
    {
        //Creo un objeto de la clase Database
        $database = new Database();
        //Guardo la conexión que devuelve getConnection() en $this->conn
        $this->conn = $database->getConnection();
    }

    //GETTERS Y SETTERS
    //Sirven para obtener y modificar los atributos privados del objeto
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNick()
    {
        return $this->nick;
    }
    public function setNick($nick)
    {
        $this->nick = $nick;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getImagenAvatar()
    {
        return $this->imagen_avatar;
    }
    public function setImagenAvatar($imagen_avatar)
    {
        $this->imagen_avatar = $imagen_avatar;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    //METODO PARA INSERTAR/GUARDA UN USUARIO EN LA BD
    public function guardar()
    {
        //CREO LA CONSULTA SQL CON MARCADORES DE POSICION(?)
        //ASI EVITO INYECCION SQL MALA
        $sql = "INSERT INTO usuarios (nick, nombre, apellidos, email, password, imagen_avatar, rol)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        //PREPARO LA CONSULTA
        $stmt = $this->conn->prepare($sql);
        //EJECUTO LA CONSULTA Y PASO LOS VALORES EN EL MISMO ORDEN
        $resultado = $stmt->execute([
            $this->nick,
            $this->nombre,
            $this->apellidos,
            $this->email,
            $this->password,
            $this->imagen_avatar,
            $this->rol
        ]);
        //Devuelvo true o false según hata ido bien o no
        return $resultado;
    }

    // MÉTODO login()
    //Este método comprueba si el usuario existe en la base de datos
    //Si existe devuelve true y si no, false
    //usando el email y la contraseña
    public function login()
    {
        //Consulta SQL para buscar el usuario
        $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";

        //Preparamos la consulta
        $stmt = $this->conn->prepare($sql);

        //Ejecutamos la consulta pasando los valores
        $stmt->execute([
            $this->email,
            $this->password
        ]);

        //Si encuentra usuario devolverá sus datos
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
