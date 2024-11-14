-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `rolegame`;

-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rolegame` DEFAULT CHARACTER SET utf8;
USE `rolegame`;

-- Volcando estructura para tabla rolegame.creature
CREATE TABLE IF NOT EXISTS `creature` (
  `idCreature` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `attackPower` int(11) DEFAULT NULL,
  `lifeLevel` int(11) DEFAULT NULL,
  `weapon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCreature`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `rolegame`;

-- -----------------------------------------------------
-- Schema rolegame
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rolegame` DEFAULT CHARACTER SET utf8;
USE `rolegame`;

-- Volcando estructura para tabla rolegame.creature
CREATE TABLE IF NOT EXISTS `creature` (
  `idCreature` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `attackPower` int(11) DEFAULT NULL,
  `lifeLevel` int(11) DEFAULT NULL,
  `weapon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCreature`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Insertando datos en la tabla rolegame.creature
INSERT INTO `creature` (`name`, `description`, `avatar`, `attackPower`, `lifeLevel`, `weapon`)
VALUES ('Dragon', 'A powerful fire-breathing creature', 'dragon_avatar.png', 95, 100, 'Fire Breath');

INSERT INTO `creature` (`name`, `description`, `avatar`, `attackPower`, `lifeLevel`, `weapon`)
VALUES ('Goblin', 'A small but cunning creature', 'goblin_avatar.png', 30, 40, 'Dagger');
