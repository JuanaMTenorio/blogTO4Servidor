<?php

//Incluimos el modelo Categoria
require_once __DIR__ . "/../models/Categoria.php";

class CategoriaController
{

    // MÉTODO crear()
    //Muestra el formulario para crear una categoría

    public function crear()
    {

        require_once __DIR__. "/../views/categorias/crear.php";
    }


    public function guardar()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = trim($_POST['nombre']);

            $categoria = new Categoria();
            $categoria->setNombre(htmlspecialchars($nombre));

            $resultado = $categoria->guardar();

            if ($resultado) {
                header("Location: ../../panel.php");
                exit();
            } else {
                echo "Error al guardar la categoría";
            }
        }
    }
}
