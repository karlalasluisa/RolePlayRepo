<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de la Criatura</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <div class="container mt-5">
            <h2>Detalles de la Criatura</h2>

            <?php if (isset($creature) && $creature): ?>
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <td><?= $creature->getName(); ?></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td><?= $creature->getDescription(); ?></td>
                    </tr>
                    <tr>
                        <th>Poder de Ataque</th>
                        <td><?= $creature->getAttackPower(); ?></td>
                    </tr>
                    <tr>
                        <th>Nivel de Vida</th>
                        <td><?= $creature->getLifeLevel(); ?></td>
                    </tr>
                    <tr>
                        <th>Arma</th>
                        <td><?= $creature->getWeapon(); ?></td>
                    </tr>
                    <?php if ($creature->getAvatar()): ?>
                        <tr>
                            <th>Avatar</th>
                            <td><img src="<?= $creature->getAvatar(); ?>" alt="Avatar" width="100"></td>
                        </tr>
                    <?php endif; ?>
                </table>

                <a href="index.php" class="btn btn-secondary">Volver</a>
                <a href="?id=<?= $creature->getIdCreature(); ?>&action=edit" class="btn btn-warning">Editar</a>
            <?php else: ?>
                <p>La criatura no existe.</p>
            <?php endif; ?>


        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
