<h1>Gestionar Productos</h1>

<a href="<?= base_url ?>product/create" class="button button-small">
    CREAR PRODUCTO
</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
    </tr>
    <?php while ($pro = $result->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id ?></td>
            <td><?= $pro->nombre ?></td>
            <td><?= $pro->precio ?></td>
            <td><?= $pro->stock ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- STYLES -->
<style>
    .button-small {
        width: 200px;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        border: 1px solid #cccccc;
        width: 100%;
        text-align: center;
    }

    table td {
        border-top: 1px solid #cccccc;
        padding: 2px;
    }
</style>