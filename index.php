<?php
session_start();

include "includes/header.php";
//AÑADO EL CODIGO PARA LLAMAR AL CONTROLADOR
require_once "controllers/UsuarioController.php";
$controller = new UsuarioController();
$controller->login();
?>

<!--<h2>Vista previa del Blog</h2>
<p>Bienvenido al blog.</p>-->

<?php
include "includes/footer.php";
?>