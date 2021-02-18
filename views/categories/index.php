<h1>Gestionar Categorias</h1>

<a href="<?= base_url ?>category/create" class="button button-small">
    CREAR CATEGORIA
</a>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>

    <?php while ($category = $result->fetch_object()) : ?>
        <tr>
            <td><?= $category->id; ?></td>
            <td><?= $category->nombre; ?></td>
        </tr>
    <?php endwhile; ?>

</table>