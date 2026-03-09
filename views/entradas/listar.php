<h2>Listado de entradas</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Título</th>
        <th>Categoría</th>
        <th>Imagen</th>
        <th>Descripción</th>
        <th>Fecha</th>
        <th>Operaciones</th>
    </tr>

    <?php foreach ($entradas as $entrada): ?>
        <tr>
            <td><?php echo $entrada['titulo']; ?></td>
            <td><?php echo $entrada['categoria_id']; ?></td>
            <td><?php echo $entrada['imagen']; ?></td>
            <td><?php echo $entrada['descripcion']; ?></td>
            <td><?php echo $entrada['fecha']; ?></td>
            <td>
                <a href="panel.php?controller=entrada&action=editar&id=<?php echo $entrada['id']; ?>">Editar</a>
                <a href="panel.php?controller=entrada&action=eliminar&id=<?php echo $entrada['id']; ?>"
                    onclick="return confirm('¿Seguro que quieres eliminar esta entrada?');">Eliminar</a>
                <a href="panel.php?controller=entrada&action=detalle&id=<?php echo $entrada['id']; ?>">Detalle</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>