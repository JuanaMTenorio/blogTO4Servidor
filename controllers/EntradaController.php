<?php

//Incluimos el modelo Entrada
require_once __DIR__ . "/../models/Entrada.php";

//Incluimos el modelo Categoria (lo necesitaremos para el select)
require_once __DIR__ . "/../models/Categoria.php";

class EntradaController
{

    // MÉTODO crear()
    //Este método muestra el formulario para crear una entrada
    public function crear()
    {

        //Creamos objeto Categoria para obtener las categorías
        $categoria = new Categoria();

        //Obtenemos todas las categorías de la BD
        $categorias = $categoria->obtenerTodas();

        //Cargamos la vista del formulario
        require_once __DIR__ . "/../views/entradas/crear.php";
    }

    //MÉTODO GUARDAR
    public function guardar()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $categoria_id = trim($_POST['categoria_id'] ?? '');
            $titulo = trim($_POST['titulo'] ?? '');
            $imagen = trim($_POST['imagen'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');

            $entrada = new Entrada();

            //El usuario_id sale de la sesión
            $entrada->setUsuarioId($_SESSION['usuario']);
            $entrada->setCategoriaId(htmlspecialchars($categoria_id));
            $entrada->setTitulo(htmlspecialchars($titulo));
            $entrada->setImagen(htmlspecialchars($imagen));
            $entrada->setDescripcion(htmlspecialchars($descripcion));

            $resultado = $entrada->guardar();

            if ($resultado) {
                header("Location: panel.php");
                exit();
            } else {
                echo "Error al guardar la entrada";
            }
        }
    }
    //MÉTODO listar()
    public function listar()
    {
        $entrada = new Entrada();
        $entradas = $entrada->obtenerTodas();

        require_once __DIR__ . "/../views/entradas/listar.php";
    }
    
    //METODO EDITAR
    public function editar()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $entrada = new Entrada();
            $entrada->setId($id);

            $datosEntrada = $entrada->obtenerPorId();

            if (!$datosEntrada) {
                echo "Entrada no encontrada";
                exit();
            }

            //CONTROL DE PERMISOS
            if ($_SESSION['rol'] != 'admin' && $datosEntrada['usuario_id'] != $_SESSION['usuario']) {
                echo "No tienes permiso para editar esta entrada";
                exit();
            }

            $categoria = new Categoria();
            $categorias = $categoria->obtenerTodas();

            require_once __DIR__ . "/../views/entradas/editar.php";
        }
    }
    //METODO ACTUALIZAR
    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = trim($_POST['id'] ?? '');
            $categoria_id = trim($_POST['categoria_id'] ?? '');
            $titulo = trim($_POST['titulo'] ?? '');
            $imagen = trim($_POST['imagen'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');

            //COMPROBAR DE QUIÉN ES LA ENTRADA
            $entrada = new Entrada();
            $entrada->setId($id);

            $datosEntrada = $entrada->obtenerPorId();

            if (!$datosEntrada) {
                echo "Entrada no encontrada";
                exit();
            }

            //CONTROL DE PERMISOS
            if ($_SESSION['rol'] != 'admin' && $datosEntrada['usuario_id'] != $_SESSION['usuario']) {
                echo "No tienes permiso para actualizar esta entrada";
                exit();
            }

            $entrada->setCategoriaId($categoria_id);
            $entrada->setTitulo(htmlspecialchars($titulo));
            $entrada->setImagen(htmlspecialchars($imagen));
            $entrada->setDescripcion(htmlspecialchars($descripcion));

            $resultado = $entrada->actualizar();

            if ($resultado) {
                header("Location: panel.php");
                exit();
            } else {
                echo "Error al actualizar la entrada";
            }
        }
    }
    //METODO detalle()
    public function detalle()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $entrada = new Entrada();
            $entrada->setId($id);

            $datosEntrada = $entrada->obtenerDetalle();

            require_once __DIR__ . "/../views/entradas/detalle.php";
        }
    }

    //MET0D0 eliminar()
    public function eliminar()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $entrada = new Entrada();
            $entrada->setId($id);

            $datosEntrada = $entrada->obtenerPorId();

            if (!$datosEntrada) {
                echo "Entrada no encontrada";
                exit();
            }

            //CONTROL DE PERMISOS
            if ($_SESSION['rol'] != 'admin' && $datosEntrada['usuario_id'] != $_SESSION['usuario']) {
                echo "No tienes permiso para eliminar esta entrada";
                exit();
            }

            $resultado = $entrada->eliminar();

            if ($resultado) {
                header("Location: panel.php");
                exit();
            } else {
                echo "Error al eliminar la entrada";
            }
        }
    }
}
