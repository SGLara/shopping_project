 <!-- SIDEBAR -->
 <aside class="sidebar">
     <div class="login block_aside">

         <?php if (!isset($_SESSION['identity'])) : ?>

             <h3>Entrar a la WEB</h3>
             <form action="<?= base_url ?>user/login" method="POST">
                 <label for="email">Email:</label>
                 <input type="email" name="email">

                 <label for="password">Contraseña:</label>
                 <input type="password" name="password">

                 <input type="submit" value="Enviar">
             </form>
         <?php else : ?>
             <h3>Bienvenido, <?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellido; ?></h3>
         <?php endif; ?>

         <ul>
             <li><a href="#">Mis pedidos</a></li>
             <li><a href="#">Gestionar pedidos</a></li>
             <li><a href="#">Gestionar categorias</a></li>
         </ul>
     </div>
 </aside>

 <!-- MAIN -->
 <div class="main">