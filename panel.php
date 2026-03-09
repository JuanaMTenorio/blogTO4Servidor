<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include "includes/header.php";
?>

<div class="panel-superior">
    <h2>Panel de administración</h2>
    <p>Bienvenido <?php echo $_SESSION['nick']; ?></p>

    <table border="1" cellpadding="5">
        <tr>
            <th><a href="panel.php?controller=usuario&action=crear">Crear usuario</a></th>
            <th><a href="panel.php?controller=usuario&action=listar">Listar usuarios</a></th>
            <th><a href="panel.php?controller=categoria&action=crear">Crear categoría</a></th>
            <th><a href="panel.php?controller=entrada&action=crear">Crear entrada</a></th>
            <th><a href="logout.php">Cerrar sesión</a></th>
        </tr>
    </table>
</div>

<div class="panel-formulario">
    <?php
    if (isset($_GET['controller']) && isset($_GET['action'])) {

        $controller = $_GET['controller'];
        $action = $_GET['action'];

        if ($controller == "usuario") {
            require_once "controllers/UsuarioController.php";
            $objeto = new UsuarioController();
        }

        if ($controller == "categoria") {
            require_once "controllers/CategoriaController.php";
            $objeto = new CategoriaController();
        }

        if ($controller == "entrada") {
            require_once "controllers/EntradaController.php";
            $objeto = new EntradaController();
        }

        if (isset($objeto) && method_exists($objeto, $action)) {
            $objeto->$action();
        }
    }
    ?>
</div>

<hr>

<div class="panel-tabla">
    <?php
    require_once "controllers/EntradaController.php";
    $controller = new EntradaController();
    $controller->listar();
    ?>
</div>

<?php include "includes/footer.php"; ?>