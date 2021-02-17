 <!-- SIDEBAR -->
 <aside class="sidebar">
     <div class="login block_aside">

         <?php if (!isset($_SESSION['identity'])) : ?>
             <?php if (isset($_SESSION['error_login'])) : ?>
                 <strong class="alert_red"><?= $_SESSION['error_login'] ?></strong><br><br>
             <?php endif; ?>
             <?php Helpers::deleteSession('error_login'); ?>


             <h3>Entrar a la WEB</h3>
             <form action="<?= base_url ?>user/login" method="POST">
                 <label for="email">Email:</label>
                 <input type="email" name="email" required>

                 <label for="password">Contraseña:</label>
                 <input type="password" name="password" required>

                 <input type="submit" value="Enviar">
             </form>
         <?php else : ?>
             <h3>Bienvenido, <br><?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellido; ?></h3>
         <?php endif; ?>

         <ul>
             <li><a href="#">Mis pedidos</a></li>
             <li><a href="#">Gestionar pedidos</a></li>
             <li><a href="#">Gestionar categorias</a></li>
             <?php if (isset($_SESSION['identity'])) : ?>
                 <li><a href="<?= base_url ?>user/logout">Cerrar Sesión</a></li>
             <?php endif; ?>
         </ul>
     </div>
 </aside>

 <!-- MAIN -->
 <div class="main">