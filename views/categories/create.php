<h1>Crear nueva categoria</h1>

<form action="<?= base_url ?>category/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" required>

    <input type="submit" value="Guardar">
</form>