<h1>Crear Nuevo Producto</h1>
<div class="form_container">
    <form action="<?= base_url ?>product/save" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" required>

        <label for="description">Descripción</label>
        <textarea name="description"></textarea>

        <label for="price">Precio</label>
        <input type="text" name="price" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" required>

        <label for="category">Categoria</label>
        <?php $categories = Helpers::showCategories(); ?>
        <select name="category">
            <option value="null">Seleccione una categoria</option>

            <?php while ($cat = $categories->fetch_object()) : ?>
                <option value="<?= $cat->id ?>">
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <!-- <label for="image">Imagen</label>
        <input type="file" name="image" required> -->

        <input type="submit" value="Guardar">
        <a href="<?= base_url ?>product/handle" style="background: gray; text-decoration:none; color:white; padding: 2px; margin-top:3px;">Cancelar</a>
    </form>
</div>