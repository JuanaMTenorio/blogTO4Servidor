<div class="form-container">

    <h2>Detalle del usuario</h2>

    <?php if ($datosUsuario): ?>

        <p><strong>ID:</strong> <?php echo htmlspecialchars($datosUsuario['id'] ?? ''); ?></p>
        <p><strong>Nick:</strong> <?php echo htmlspecialchars($datosUsuario['nick'] ?? ''); ?></p>
        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($datosUsuario['nombre'] ?? ''); ?></p>
        <p><strong>Apellidos:</strong> <?php echo htmlspecialchars($datosUsuario['apellidos'] ?? ''); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($datosUsuario['email'] ?? ''); ?></p>
        <p><strong>Password:</strong> <?php echo htmlspecialchars($datosUsuario['password'] ?? ''); ?></p>
        <p><strong>Imagen avatar:</strong> <?php echo htmlspecialchars($datosUsuario['imagen_avatar'] ?? ''); ?></p>
        <p><strong>Rol:</strong> <?php echo htmlspecialchars($datosUsuario['rol'] ?? ''); ?></p>

    <?php else: ?>

        <p>No se ha encontrado el usuario.</p>

    <?php endif; ?>

</div>