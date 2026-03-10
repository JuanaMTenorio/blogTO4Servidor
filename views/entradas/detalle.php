<div class="form-container">

    <h2>Detalle de la entrada</h2>

    <?php if ($datosEntrada): ?>

        <p><strong>Título:</strong> <?php echo htmlspecialchars($datosEntrada['titulo']); ?></p>
        <p><strong>Categoría:</strong> <?php echo htmlspecialchars($datosEntrada['categoria_nombre']); ?></p>
        <p><strong>Autor:</strong> <?php echo htmlspecialchars($datosEntrada['autor']); ?></p>
        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($datosEntrada['fecha']); ?></p>

        <?php if (!empty($datosEntrada['imagen'])): ?>
            <p><strong>Imagen:</strong></p>
            <img src="images/<?php echo htmlspecialchars($datosEntrada['imagen']); ?>" width="200">
        <?php endif; ?>

        <p><strong>Descripción:</strong></p>
        <div class="detalle-descripcion">
            <!--<?php echo nl2br(htmlspecialchars($datosEntrada['descripcion'])); ?>-->
            <?php echo $datosEntrada['descripcion']; ?>
        </div>

    <?php else: ?>

        <p>No se ha encontrado la entrada.</p>

    <?php endif; ?>

</div>