<?php

//Iniciamos sesión para poder guardar datos del usuario
session_start();
//Incluimos el modelo Usuario
require_once "models/Usuario.php";

//Creamos la clase controlador
class UsuarioController{
    // MÉTODO login()
    //Este método muestra el formulario de login
    //y procesa la autenticación cuando el formulario se envía
    public function login(){
        //Si el formulario se ha enviado (POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Recogemos los datos del formulario
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Creamos el objeto Usuario
            $usuario = new Usuario();

            //Asignamos los datos recibidos
            $usuario->setEmail($email);
            $usuario->setPassword($password);

            //Llamamos al método login() del modelo
            $resultado = $usuario->login();

            //Si el usuario existe en la base de datos
            if ($resultado) {

                //Guardamos los datos en la sesión
                $_SESSION['usuario'] = $resultado['id'];
                $_SESSION['nick'] = $resultado['nick'];
                $_SESSION['perfil'] = $resultado['perfil'];

                //Redirigimos a la página principal
                header("Location: index.php");
                exit();
            } else {

                //Si no existe el usuario
                echo "Email o contraseña incorrectos";
            }
        }

        //Mostramos la vista del formulario
        require_once "views/usuarios/login.php";
    }
}
