<h1>Registrarse</h1>

<?php if (isset($_SESSION['register']) && $_SESSION['register']) : ?>
    <strong>Registro completado correctamente</strong>
<?php else : ?>
    <strong>Registro Fallido</strong>
<?php endif; ?>

<form action="<?= base_url ?>user/save" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>

    <label for="last_name">Apellido:</label>
    <input type="text" name="last_name" required>

    <label for="email">Email:</label>
    <input type="text" name="email" required>

    <label for="password">Contraseña:</label>
    <input type="text" name="password" required>

    <input type="submit" value="Registrarse">
</form>