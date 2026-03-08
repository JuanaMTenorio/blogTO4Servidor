<?php

//Iniciamos sesión
session_start();

//Si no existe sesión de usuario
if (!isset($_SESSION['usuario'])) {

    //Redirigimos al login
    header("Location: index.php?controller=usuario&action=login");
    exit();
}
