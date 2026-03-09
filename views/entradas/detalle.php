<div class="form-container">

    <h2>Detalle de la entrada</h2>

    <?php if ($datosEntrada): ?>

        <p><strong>Título:</strong> <?php echo htmlspecialchars($datosEntrada['titulo']); ?></p>

        <p><strong>Categoría:</strong> <?php echo htmlspecialchars($datosEntrada['categoria_nombre']); ?></p>

        <p><strong>Autor:</strong> <?php echo htmlspecialchars($datosEntrada['autor']); ?></p>

        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($datosEntrada['fecha']); ?></p>

        <p><strong>Imagen:</strong> <?php echo htmlspecialchars($datosEntrada['imagen']); ?></p>

        <p><strong>Descripción:</strong></p>
        <div class="detalle-descripcion">
            <?php echo nl2br(htmlspecialchars($datosEntrada['descripcion'])); ?>
        </div>

    <?php else: ?>

        <p>No se ha encontrado la entrada.</p>

    <?php endif; ?>

</div>