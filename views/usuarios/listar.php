<h2>Listado de usuarios</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nick</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Operaciones</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['nick'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($usuario['nombre'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($usuario['apellidos'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($usuario['email'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($usuario['rol'] ?? ''); ?></td>
            <td>
                <a href="panel.php?controller=usuario&action=detalle&id=<?php echo $usuario['id']; ?>">Detalle</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>