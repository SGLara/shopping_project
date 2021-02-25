<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar Producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "product/save&id=" . $pro->id; ?>
<?php else : ?>
    <h1>Crear Nuevo Producto</h1>
    <?php $url_action = base_url . "product/save"; ?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre</label>
        <input type="text" name="name" required value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

        <label for="description">Descripción</label>
        <textarea name="description"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="price">Precio</label>
        <input type="number" name="price" required value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" required value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

        <label for="category">Categoria</label>
        <?php $categories = Helpers::showCategories(); ?>
        <select name="category">
            <option value="null">Seleccione una categoria</option>

            <?php while ($cat = $categories->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <label for="image">Imagen</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="image" required>

        <input type="submit" value="Guardar">
        <a href="<?= base_url ?>product/handle" style="background: gray; text-decoration:none; color:white; padding: 2px; margin-top:3px;">Cancelar</a>
    </form>
</div>