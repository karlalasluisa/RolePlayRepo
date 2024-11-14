<?php
$creature = $creature; // Aquí el objeto 'creature' se pasa desde el controlador
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Criatura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Criatura</h2>
    <form action="../controllers/CreatureController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $creature->getIdCreature(); ?>">

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $creature->getName(); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description" required><?= $creature->getDescription(); ?></textarea>
        </div>

        <div class="form-group">
            <label for="attackPower">Poder de Ataque:</label>
            <input type="number" class="form-control" id="attackPower" name="attackPower" value="<?= $creature->getAttackPower(); ?>" required>
        </div>

        <div class="form-group">
            <label for="lifeLevel">Nivel de Vida:</label>
            <input type="number" class="form-control" id="lifeLevel" name="lifeLevel" value="<?= $creature->getLifeLevel(); ?>" required>
        </div>

        <div class="form-group">
            <label for="weapon">Arma:</label>
            <input type="text" class="form-control" id="weapon" name="weapon" value="<?= $creature->getWeapon(); ?>" required>
        </div>

        <div class="form-group">
            <label for="avatar">Avatar (Opcional):</label>
            <input type="file" class="form-control-file" id="avatar" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
