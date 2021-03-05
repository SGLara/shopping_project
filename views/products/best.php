<h1>Algunos de nuestros productos</h1>

<?php while ($pro = $products->fetch_object()) : ?>
    <div class="product">
        <?php if ($pro->imagen != null) : ?>
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="camiseta.png">
        <?php else : ?>
            <img src="assets/img/camiseta.png" alt="camiseta.png">
        <?php endif; ?>
        <h2><?= $pro->nombre ?></h2>
        <p><?= $pro->Precio ?></p>
        <a href="#" class="button">Comprar</a>
    </div>
<?php endwhile; ?>

<div class="product">
    <img src="assets/img/camiseta.png" alt="camiseta.png">
    <h2>Camiseta Azul Ancha</h2>
    <p>$30 dólares</p>
    <a href="#" class="button">Comprar</a>
</div>

<div class="product">
    <img src="assets/img/camiseta.png" alt="camiseta.png">
    <h2>Camiseta Azul Ancha</h2>
    <p>$30 dólares</p>
    <a href="#" class="button">Comprar</a>
</div>

<div class="product">
    <img src="assets/img/camiseta.png" alt="camiseta.png">
    <h2>Camiseta Azul Ancha</h2>
    <p>$30 dólares</p>
    <a href="#" class="button">Comprar</a>
</div>

<div class="product">
    <img src="assets/img/camiseta.png" alt="camiseta.png">
    <h2>Camiseta Azul Ancha</h2>
    <p>$30 dólares</p>
    <a href="#" class="button">Comprar</a>
</div>

<div class="product">
    <img src="assets/img/camiseta.png" alt="camiseta.png">
    <h2>Camiseta Azul Ancha</h2>
    <p>$30 dólares</p>
    <a href="#" class="button">Comprar</a>
</div>