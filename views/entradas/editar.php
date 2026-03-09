<div class="form-container">

    <h2>Editar entrada</h2>

    <form method="POST" action="../../panel.php?controller=entrada&action=actualizar"
        onsubmit="return confirm('¿Seguro que quieres actualizar esta entrada?');">

        <input type="hidden" name="id" value="<?php echo $datosEntrada['id']; ?>">

        <label for="categoria_id">Categoría:</label>
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Seleccione una categoría</option>

            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"
                    <?php if ($categoria['id'] == $datosEntrada['categoria_id']) echo "selected"; ?>>
                    <?php echo htmlspecialchars($categoria['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo"
            value="<?php echo htmlspecialchars($datosEntrada['titulo']); ?>" required>

        <br><br>

        <label for="imagen">Imagen:</label>
        <input type="text" name="imagen" id="imagen"
            value="<?php echo htmlspecialchars($datosEntrada['imagen']); ?>">

        <br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="6" required><?php echo htmlspecialchars($datosEntrada['descripcion']); ?></textarea>

        <br><br>

        <input type="submit" value="Actualizar entrada">

    </form>

</div>