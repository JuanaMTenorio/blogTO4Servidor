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
            <td><?php echo htmlspecialchars($entrada['titulo'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($entrada['categoria_nombre'] ?? ''); ?></td>
            <td>
                <?php if (!empty($entrada['imagen'])): ?>
                    <img src="images/<?php echo htmlspecialchars($entrada['imagen']); ?>" width="100">
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($entrada['descripcion'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($entrada['fecha'] ?? ''); ?></td>
            <td>
                <?php if ($_SESSION['rol'] == 'admin' || $_SESSION['usuario'] == $entrada['usuario_id']): ?>
                    <a href="panel.php?controller=entrada&action=editar&id=<?php echo $entrada['id']; ?>">Editar</a>

                    <a href="panel.php?controller=entrada&action=eliminar&id=<?php echo $entrada['id']; ?>"
                        onclick="return confirm('¿Seguro que quieres eliminar esta entrada?');">Eliminar</a>
                <?php endif; ?>

                <a href="panel.php?controller=entrada&action=detalle&id=<?php echo $entrada['id']; ?>">Detalle</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>

<div class="paginacion">

<?php for ($i = 1; $i <= $totalPaginas; $i++): ?>

    <a href="panel.php?controller=entrada&action=listar&pagina=<?php echo $i; ?>">
        <?php echo $i; ?>
    </a>

<?php endfor; ?>

</div>