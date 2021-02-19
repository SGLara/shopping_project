<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url ?>css/styles.css">
    <title>Tienda de camisetas</title>
</head>

<body>
    <div class="container">
        <!-- HEADER -->
        <header class="header">
            <div class="logo">
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="camiseta_logo">
                <a href="index.php">Tienda de camisetas</a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categories = Helpers::showCategory(); ?>
        <nav class="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>
                <?php while($cat = $categories->fetch_object()) : ?>
                    <li><a href="#"><?= $cat->nombre?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>

        <div class="content">