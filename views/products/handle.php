<h1>Gestionar Productos</h1>

<a href="<?= base_url ?>product/create" class="button button-small">
    CREAR PRODUCTO
</a>
<!-- SHOW THIS MESSAGES WHEN PRODUCT IS CREATED -->
<?php if (isset($_SESSION['product']) && $_SESSION['product'] == 'completed') : ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong><br>
<?php elseif (isset($_SESSION['product']) && $_SESSION['product'] != 'completed') : ?>
    <strong class="alert_red">El producto NO se ha creado correctamente</strong><br>
<?php endif; ?>
<?php Helpers::deleteSession('product'); ?>


<!-- SHOW THIS MESSAGES WHEN PRODUCT IS DELETED -->
<?php if (isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'success') : ?>
    <strong class="alert_green">El producto se ha eliminado correctamente</strong><br>
<?php elseif (isset($_SESSION['deleted']) && $_SESSION['deleted'] != 'success') : ?>
    <strong class="alert_red">El producto NO se ha eliminado correctamente</strong><br>
<?php endif; ?>
<?php Helpers::deleteSession('deleted'); ?>



<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>
    <?php while ($pro = $result->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id ?></td>
            <td><?= $pro->nombre ?></td>
            <td><?= $pro->precio ?></td>
            <td><?= $pro->stock ?></td>
            <td>
                <a href="<?= base_url ?>product/edit&id=<?= $pro->id ?>" class="button button-handle">Editar</a>
                <a href="<?= base_url ?>product/delete&id=<?= $pro->id ?>" class="button button-handle button-red">Eliminar</a>
            </td>
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