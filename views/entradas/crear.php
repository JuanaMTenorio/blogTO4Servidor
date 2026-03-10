<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="form-container">
    <h2>Nueva entrada</h2>
    <form method="POST" action="panel.php?controller=entrada&action=guardar"
        enctype="multipart/form-data">
        <!-- CATEGORÍA -->
        <label for="categoria_id">Categoría</label>
        <select name="categoria_id" id="categoria_id" required>
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
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen" placeholder="Nombre de la imagen">
        <br><br>
        <!-- DESCRIPCIÓN -->
        <label>Descripción</label>
        <textarea name="descripcion" id="descripcion" rows="6" placeholder="Contenido de la entrada" required></textarea>
        <script>
            CKEDITOR.replace('descripcion');
        </script>
        <br><br>
        <input type="submit" value="Guardar entrada">
    </form>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</div>