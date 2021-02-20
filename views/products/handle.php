<h1>Gestionar Productos</h1>

<a href="<?= base_url ?>product/create" class="button button-small">
    Crear Producto
</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php while ($pro = $products->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id ?></td>
            <td><?= $pro->nombre ?></td>
            <td><?= $pro->precio ?></td>
            <td><?= $pro->stock ?></td>
        </tr>
    <?php endwhile; ?>
</table>