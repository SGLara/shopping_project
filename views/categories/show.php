<?php if (isset($category)) : ?>
    <h1><?= $category->nombre ?></h1>
    <?php if ($products->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else : ?>
        <?php while ($pro = $products->fetch_object()) : ?>
            <div class="product">
                <?php if ($pro->imagen != null) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="camiseta.png">
                <?php else : ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png" alt="camiseta.png">
                <?php endif; ?>
                <h2><?= $pro->nombre ?></h2>
                <p><?= $pro->Precio ?></p>
                <a href="#" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>