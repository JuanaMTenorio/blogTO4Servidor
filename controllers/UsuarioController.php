<?php

require_once __DIR__ . "/../models/Usuario.php";

class UsuarioController
{
    //MÉTODO LOGIN
    public function login()
    {
        //Si el formulario se ha enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Recogemos los datos del formulario
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            //Creamos un objeto Usuario
            $usuario = new Usuario();

            //Asignamos email y password al objeto
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            //Llamamos al método login del modelo
            $resultado = $usuario->login();

            //Si existe el usuario, creamos sesión y redirigimos al panel
            if ($resultado) {
                $_SESSION['usuario'] = $resultado['id'];
                $_SESSION['nick'] = $resultado['nick'];
                $_SESSION['rol'] = $resultado['rol'];

                header("Location: panel.php");
                exit();
            } else {
                echo "Email o contraseña incorrectos";
            }
        }

        //Mostramos la vista del login
        require_once __DIR__ . "/../views/usuarios/login.php";
    }

    //MÉTODO CREAR
    public function crear()
    {
        require_once __DIR__ . "/../views/usuarios/crear.php";
    }

    //MÉTODO GUARDAR
    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nick = trim($_POST['nick']);
            $nombre = trim($_POST['nombre']);
            $apellidos = trim($_POST['apellidos']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $imagen_avatar = trim($_POST['imagen_avatar']);
            $rol = trim($_POST['rol'] ?? '');
            $usuario = new Usuario();

            $usuario->setNick(htmlspecialchars($nick));
            $usuario->setNombre(htmlspecialchars($nombre));
            $usuario->setApellidos(htmlspecialchars($apellidos));
            $usuario->setEmail(htmlspecialchars($email));
            $usuario->setPassword($password);
            $usuario->setImagenAvatar(htmlspecialchars($imagen_avatar));
            $usuario->setRol(htmlspecialchars($rol));

            $resultado = $usuario->guardar();

            if ($resultado) {
                header("Location: panel.php");
                exit();
            } else {
                echo "Error al crear usuario";
            }
        }
    }

    public function listar()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerTodos();

        require_once __DIR__ . "/../views/usuarios/listar.php";
    }

    public function detalle()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $usuario = new Usuario();
            $usuario->setId($id);

            $datosUsuario = $usuario->obtenerPorId();

            require_once __DIR__ . "/../views/usuarios/detalle.php";
        }
    }
}
