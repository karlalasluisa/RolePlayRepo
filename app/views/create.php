<?php
require_once(dirname(__FILE__) . '\..\controllers\CreatureController.php');

// Verificamos si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["type"] == "create") {
    $_creatureController = new CreatureController();
    $_creatureController->createAction();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Criatura</title>
    <!-- Vinculamos Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <a href="..\..\index.php" class="btn btn-secondary">Volver</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Crear una Nueva Criatura</h2>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="attackPower">Poder de Ataque</label>
                <input type="number" class="form-control" id="attackPower" name="attackPower" required>
            </div>
            <div class="form-group">
                <label for="lifeLevel">Nivel de Vida</label>
                <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" required>
            </div>
            <div class="form-group">
                <label for="weapon">Arma</label>
                <input type="text" class="form-control" id="weapon" name="weapon" required>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="text" class="form-control" id="avatar" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Crear Criatura</button>
        </form>
    </div>
</body>
</html>
