# Crear el modelo Creature en PHP

creature_model_code = """
<?php

// app/models/Creature.php

class Creature {
    private $id;
    private $name;
    private $imageUrl;
    private $description;

    public function __construct($id = null, $name = "", $imageUrl = "", $description = "") {
        $this->id = $id;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->description = $description;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    // CRUD Functions (Database interaction)
    public static function getAll() {
        // Obtener todas las criaturas de la BBDD
    }

    public function save() {
        // Guardar o actualizar criatura en la BBDD
    }

    public static function delete($id) {
        // Eliminar una criatura de la BBDD
    }
}
?>
"""

# Guardar el archivo del modelo
model_path = os.path.join(extraction_path, "ArteanV3_Resuelto/app/models/Creature.php")
with open(model_path, "w") as file:
    file.write(creature_model_code)

model_path  # Confirmar la ruta del archivo creado para el modelo de criatura en PHP.
