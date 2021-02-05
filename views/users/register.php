<h1>Registrarse</h1>

<form action="index.php?controller=user&action=save" method="POST">
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