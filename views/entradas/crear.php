<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="form-container">

    <h2>Nueva entrada</h2>

    <form method="POST" action="panel.php?controller=entrada&action=guardar">

        <!-- CATEGORÍA -->
        <label>Categoría</label>
        <select name="categoria_id" required>

            <option value="">Seleccione una categoría</option>

            <!-- Aquí se mostrarán las categorías desde la BD -->
            <?php foreach ($categorias as $categoria): ?>

                <option value="<?php echo $categoria['id']; ?>">
                    <?php echo htmlspecialchars($categoria['nombre']); ?>
                </option>

            <?php endforeach; ?>

        </select>

        <br><br>

        <!-- TÍTULO -->
        <label>Título</label>
        <input type="text" name="titulo" placeholder="Título de la entrada" required>

        <br><br>

        <!-- IMAGEN -->
        <label>Imagen</label>
        <input type="text" name="imagen" placeholder="Nombre de la imagen">

        <br><br>

        <!-- DESCRIPCIÓN -->
        <label>Descripción</label>
        <textarea name="descripcion" rows="6" placeholder="Contenido de la entrada" required></textarea>

        <br><br>

        <input type="submit" value="Guardar entrada">

    </form>

</div>