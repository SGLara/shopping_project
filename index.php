<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Tienda de camisetas</title>
</head>

<body>
    <div class="container">
        <!-- HEADER -->
        <header class="header">
            <div class="logo">
                <img src="assets/img/camiseta.png" alt="camiseta_logo">
                <a href="index.php">Tienda de camisetas</a>
            </div>
        </header>

        <!-- MENU -->
        <nav class="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
                <li><a href="#">Categoria 4</a></li>
                <li><a href="#">Categoria 5</a></li>
                <li><a href="#">Categoria 6</a></li>
            </ul>
        </nav>

        <div class="content">
            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="login block_aside">
                    <form action="#" method="POST">
                        <label for="email">Email:</label>
                        <input type="email" name="email">

                        <label for="password">Contraseña:</label>
                        <input type="password" name="password">
                    </form>

                    <a href="#">Mis pedidos</a>
                    <a href="#">Gestionar pedidos</a>
                    <a href="#">Gestionar categorias</a>
                </div>
            </aside>

            <!-- MAIN -->
            <div class="main">
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta.png">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30 dólares</p>
                    <a href="#">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta.png">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30 dólares</p>
                    <a href="#">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta.png">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30 dólares</p>
                    <a href="#">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="camiseta.png">
                    <h2>Camiseta Azul Ancha</h2>
                    <p>$30 dólares</p>
                    <a href="#">Comprar</a>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer>
            <p>Desarrollado por Steven Lara &copy; <?= date('Y'); ?></p>
        </footer>
    </div>
</body>

</html>