<?php

//require_once 'C:\xampp\htdocs\RolePlayRepo\persistence\conf\PersistentManager.php';
//require_once 'C:\xampp\htdocs\RolePlayRepo\app\models/Creature.php';
require_once(dirname(__FILE__) . '\..\conf\PersistentManager.php');
require_once(dirname(__FILE__) . '\..\..\app\models\Creature.php');



class CreatureDAO {

    // Constante con el nombre de la tabla
    const CREATURE_TABLE = 'creature';

    // Conexión a la base de datos
    private $conn = null;

    // Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    // Selecciona todas las criaturas
    public function selectAll() {
        $query = "SELECT * FROM " . CreatureDAO::CREATURE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $creatures = array();
        
        while ($creatureBD = mysqli_fetch_array($result)) {
            $creature = new Creature();
            $creature->setIdCreature($creatureBD["idCreature"]);
            $creature->setName($creatureBD["name"]);
            $creature->setDescription($creatureBD["description"]);
            $creature->setAvatar($creatureBD["avatar"]);
            $creature->setAttackPower($creatureBD["attackPower"]);
            $creature->setLifeLevel($creatureBD["lifeLevel"]);
            $creature->setWeapon($creatureBD["weapon"]);

            array_push($creatures, $creature);
        }
        
        return $creatures;
    }

    // Inserta una nueva criatura
    public function insert($creature) {
        $query = "INSERT INTO " . CreatureDAO::CREATURE_TABLE . " (name, description, avatar, attackPower, lifeLevel, weapon) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        
        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        
        mysqli_stmt_bind_param($stmt, 'sssiii', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        return $stmt->execute();
    }
    public function selectById($id) {
        $query = "SELECT * FROM " . CreatureDAO::CREATURE_TABLE . " WHERE idCreature = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);  // Asegúrate de vincular el ID como un entero
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Verificamos si la consulta devuelve resultados
        if ($creatureBD = mysqli_fetch_array($result)) {
            $creature = new Creature();
            $creature->setIdCreature($creatureBD["idCreature"]);
            $creature->setName($creatureBD["name"]);
            $creature->setDescription($creatureBD["description"]);
            $creature->setAvatar($creatureBD["avatar"]);
            $creature->setAttackPower($creatureBD["attackPower"]);
            $creature->setLifeLevel($creatureBD["lifeLevel"]);
            $creature->setWeapon($creatureBD["weapon"]);

            return $creature;
        } else {
            // Aquí puede ser útil agregar un log para ver si no se encontró la criatura
            error_log("No se encontró criatura con ID: " . $id); // Esto se guarda en el archivo de logs de PHP
            return null; // Retorna null si no se encuentra la criatura
        }
    }



    // Elimina una criatura por su ID
    public function delete($id) {
        $query = "DELETE FROM " . CreatureDAO::CREATURE_TABLE . " WHERE idCreature = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
    // Actualiza una criatura existente
    public function update($creature) {
        $query = "UPDATE " . CreatureDAO::CREATURE_TABLE . " SET name = ?, description = ?, avatar = ?, attackPower = ?, lifeLevel = ?, weapon = ? WHERE idCreature = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attackPower = $creature->getAttackPower();
        $lifeLevel = $creature->getLifeLevel();
        $weapon = $creature->getWeapon();
        $idCreature = $creature->getIdCreature();

        mysqli_stmt_bind_param($stmt, 'sssiiii', $name, $description, $avatar, $attackPower, $lifeLevel, $weapon, $idCreature);
        return $stmt->execute();
    }

}
?>