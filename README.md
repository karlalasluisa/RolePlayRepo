# Role Playing Game Creature Management Web App

## Descripción del Proyecto

Esta aplicación web permite gestionar criaturas para un juego de rol. Las funcionalidades incluyen la creación, edición, eliminación y visualización de detalles de criaturas almacenadas en la base de datos. Existen dos niveles de acceso:
- **Público**: Permite solo consultar la lista de criaturas.
- **Privado**: Permite CRUD completo (crear, leer, actualizar, eliminar) mediante un usuario autenticado "hardcoded".

## Estructura del Proyecto

- **Base de Datos**: La base de datos `rolegame` contiene una tabla `creature` con los detalles de cada criatura.
- **Persistencia**: 
  - `PersistentManager.php` proporciona una conexión única a la base de datos.
  - `CreatureDAO.php` maneja las operaciones CRUD para la tabla `creature`.
- **Modelo**: `Creature.php` define la estructura de datos de una criatura.
- **Controlador**: `CreatureController.php` gestiona las acciones de la aplicación, como listar, crear, editar, eliminar y ver detalles de criaturas.
- **Vistas**: Las vistas `index.php`, `create.php`, `detail.php` y `edit.php` permiten la interacción del usuario con el sistema.

## Base de Datos

La estructura de la tabla `creature` en la base de datos `rolegame` es la siguiente:

| Campo        | Tipo          | Descripción                            |
|--------------|---------------|----------------------------------------|
| idCreature   | INT (PK)      | Identificador único de la criatura     |
| name         | VARCHAR(150)  | Nombre de la criatura                  |
| description  | VARCHAR(255)  | Descripción de la criatura             |
| avatar       | VARCHAR(255)  | URL del avatar de la criatura          |
| attackPower  | INT           | Poder de ataque de la criatura         |
| lifeLevel    | INT           | Nivel de vida de la criatura           |
| weapon       | VARCHAR(45)   | Arma utilizada por la criatura         |

## Diagrama de Clases

El siguiente diagrama de clases muestra los principales componentes de la aplicación y cómo interactúan entre sí:

```plaintext
+---------------------------+
|        PersistentManager   |
+---------------------------+
| +getInstance()            |
| +get_connection()         |
+---------------------------+
           |
           |
+---------------------------+
|        CreatureDAO        |
+---------------------------+
| - conn                    |
| +selectAll()              |
| +selectById(id)           |
| +insert(creature)         |
| +update(creature)         |
| +delete(id)               |
+---------------------------+
           |
           |
+---------------------------+
|         Creature          |
+---------------------------+
| - idCreature              |
| - name                    |
| - description             |
| - avatar                  |
| - attackPower             |
| - lifeLevel               |
| - weapon                  |
+---------------------------+
| +getters & setters        |
+---------------------------+

+---------------------------+
|     CreatureController    |
+---------------------------+
| +createAction()           |
| +editAction()             |
| +deleteAction()           |
| +detailAction()           |
| +readAction()             |
+---------------------------+

+---------------------------+
|           Views           |
+---------------------------+
| index.php                 |
| create.php                |
| detail.php                |
| edit.php                  |
+---------------------------+
