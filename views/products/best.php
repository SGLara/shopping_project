<h1>Algunos de nuestros productos</h1>

<?php while ($pro = $products->fetch_object()) : ?>
    <div class="product">
        <?php if ($pro->imagen != null) : ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="camiseta.png">
        <?php else : ?>
            <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta.png">
        <?php endif; ?>
        <h2><?= $pro->nombre ?></h2>
        <p><?= $pro->Precio ?></p>
        <a href="#" class="button">Comprar</a>
    </div>
<?php endwhile; ?>