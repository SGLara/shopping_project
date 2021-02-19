<h1>Crear nueva categoria</h1>

<form action="<?= base_url ?>category/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" required>

    <input type="submit" value="Guardar">
    <a href="<?= base_url ?>category/index" style="background: gray; text-decoration:none; color:white; padding: 2px; margin-top:3px;">Cancelar</a>
</form>