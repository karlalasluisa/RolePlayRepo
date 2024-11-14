<?php
// app/controllers/CreatureController.php
require_once(dirname(__DIR__) . "..\..\persistence\DAO\CreatureDAO.php");
require_once(dirname(__DIR__) . "\models\Creature.php");

$_creatureController = new CreatureController();

// Enrutamiento de las acciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "create") {
        $_creatureController->createAction();
    } else if ($_POST["type"] == "edit") {
        $_creatureController->editAction();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    if (isset($_GET["action"]) && $_GET["action"] == "detail") {
        $_creatureController->detailAction();
    } elseif (isset($_GET["action"]) && $_GET["action"] == "edit") {
        $_creatureController->editAction();
    } else {
        $_creatureController->deleteAction();
    }
}

class CreatureController {

    public function __construct() {
    }

    // Función para obtener la lista completa de criaturas
    function readAction() {
        $creatureDAO = new CreatureDAO();
        return $creatureDAO->selectAll();
    }

    // Función para crear una nueva criatura
    function createAction() {
        // Obtención de los valores del formulario
        $name = $_POST["name"];
        $description = $_POST["description"];
        $attackPower = $_POST["attackPower"];
        $lifeLevel = $_POST["lifeLevel"];
        $weapon = $_POST["weapon"];

        // Creación de objeto Creature
        $creature = new Creature();
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAttackPower($attackPower);
        $creature->setLifeLevel($lifeLevel);
        $creature->setWeapon($weapon);
        
        // Procesar avatar si está presente
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
            $avatarPath = 'uploads/' . basename($_FILES['avatar']['name']);
            move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);
            $creature->setAvatar($avatarPath);
        }

        // Llamada a la BD
        $creatureDAO = new CreatureDAO();
        $creatureDAO->insert($creature);

        header('Location: ..\..\index.php');
    }

    // Función para editar una criatura existente
    function editAction() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Si es POST, actualizamos los datos de la criatura
            $id = $_POST["id"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $attackPower = $_POST["attackPower"];
            $lifeLevel = $_POST["lifeLevel"];
            $weapon = $_POST["weapon"];

            // Creación del objeto criatura para actualizar
            $creature = new Creature();
            $creature->setIdCreature($id);
            $creature->setName($name);
            $creature->setDescription($description);
            $creature->setAttackPower($attackPower);
            $creature->setLifeLevel($lifeLevel);
            $creature->setWeapon($weapon);

            // Procesar avatar si está presente
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $avatarPath = 'uploads/' . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);
                $creature->setAvatar($avatarPath);
            }

            // Llamada a la BD para actualizar
            $creatureDAO = new CreatureDAO();
            $creatureDAO->update($creature);

            // Redirigir después de actualizar
            header('Location: ..\..\index.php');
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            // Si es GET, mostramos el formulario de edición con los datos de la criatura
            $id = $_GET["id"];

            $creatureDAO = new CreatureDAO();
            $creature = $creatureDAO->selectById($id);

            // Cargar vista de edición
            include("../views/edit.php");
        }
    }

    // Función para eliminar una criatura
    function deleteAction() {
        $id = $_GET["id"];

        $creatureDAO = new CreatureDAO();
        $creatureDAO->delete($id);

        header('Location: ../index.php');
    }

    // Función para mostrar detalles de una criatura
    function detailAction() {
        $id = $_GET["id"];

        $creatureDAO = new CreatureDAO();
        $creature = $creatureDAO->selectById($id);

        // Verificar si la criatura fue encontrada
        if ($creature) {
            // Pasar la variable $creature a la vista
            include("../views/detail.php");
        } else {
            // Si la criatura no existe, mostrar un mensaje
            echo "La criatura no existe.";
        }
    }
}
?>
