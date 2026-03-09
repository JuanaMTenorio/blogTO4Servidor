<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="form-container">

    <h2>Nueva categoría</h2>

    <form method="POST" action="panel.php?controller=entrada&action=guardar">
        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Seleccione una categoría</option>

            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>">
                    <?php echo htmlspecialchars($categoria['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>

        <br><br>

        <label for="imagen">Imagen:</label>
        <input type="text" name="imagen" id="imagen">

        <br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="6" required></textarea>

        <br><br>

        <input type="submit" value="Guardar entrada">

    </form>

</div>