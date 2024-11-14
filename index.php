<!-- app/views/creature/index.php -->

<?php
require_once(dirname(__FILE__) . '\app\controllers\CreatureController.php');
// Instanciamos el controlador de criaturas para obtener la lista de criaturas
$_creatureController = new CreatureController();
$creatures = $_creatureController->readAction();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Criaturas</title>
    <!-- Vinculamos Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <div class="ml-auto">
                <!-- Botón para crear una nueva criatura -->
                <a href="app\views\create.php" class="btn btn-primary">Crear una Criatura</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Lista de Criaturas</h2>
        <div class="row">
            <?php foreach ($creatures as $creature): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $creature->getAvatar() ?>" class="card-img-top" alt="<?= $creature->getName() ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $creature->getName() ?></h5>
                        <p class="card-text"><?= substr($creature->getDescription(), 0, 100) ?>...</p>
                        <div class="d-flex justify-content-between">
                            <a href="app\views\detail.php?id=<?= $creature->getIdCreature() ?>" class="btn btn-info">Más info</a>
                            <a href="app\views\edit.php?id=<?= $creature->getIdCreature() ?>" class="btn btn-warning">Modificar</a>
                            <a href="?id=<?= $creature->getIdCreature() ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta criatura?')">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias (si se quiere usar interactividad avanzada) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>