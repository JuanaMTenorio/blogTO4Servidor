<?php require_once __DIR__ . "/../../includes/header.php"; ?>

<div class="form-container">

    <h2>Registro de usuario</h2>

    <form method="POST" action="panel.php?controller=usuario&action=guardar">

        <label for="nick">Nick:</label>
        <input type="text" name="nick" id="nick" required>

        <br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>

        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <br><br>

        <label for="imagen_avatar">Imagen avatar:</label>
        <input type="text" name="imagen_avatar" id="imagen_avatar" placeholder="nombre_imagen.jpg">

        <br><br>

        <label for="rol">Perfil:</label>
        <select name="rol" id="rol" required>
            <option value="">Seleccione perfil</option>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>

        <br><br>

        <input type="submit" value="Crear usuario">

    </form>

</div>