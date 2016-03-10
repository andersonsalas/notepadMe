-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema notepadMe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema notepadMe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `notepadMe` DEFAULT CHARACTER SET utf8 ;
USE `notepadMe` ;

-- -----------------------------------------------------
-- Table `notepadMe`.`notas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `notepadMe`.`notas` (
  `id` INT(8) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(64) NOT NULL,
  `contenido` TEXT NOT NULL,
  `creado` DATETIME NOT NULL,
  `modificado` DATETIME NOT NULL,
  `activo` INT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `notepadMe`.`notas`
-- -----------------------------------------------------
START TRANSACTION;
USE `notepadMe`;
INSERT INTO `notepadMe`.`notas` (`titulo`, `contenido`, `creado`, `modificado`) VALUES ('¡Bienvenido a notepadMe!', '<h1>&iexcl;Bienvenido a notepadMe!</h1>\n<p>notepadMe! es un editor de texto que sirve de bloc de notas personal. Es simple y minimalista.&nbsp;notepadMe! es software libre, distribu&iacute;do bajo licencia GNU-GPLv3.&nbsp;</p>\n<h3>&iquest;C&oacute;mo surge notepadMe?</h3>\n<p>Necesitaba un script r&aacute;pido y funcional para guardar mis anotaciones sin tener que requerir de servicios de terceros como Evernote. Tambi&eacute;n es una forma que encontr&eacute; de practicar la realizaci&oacute;n de aplicaciones web haciendo uso de AJAX/jQuery.</p>\n<h3>&iquest;Puedo ayudar a desarrollar notepadMe?</h3>\n<p>&iexcl;Por supuesto!, puedes visitar el repositorio en GitHub:</p>\n<p>http://github.com/andersonsalas/notepadMe</p>\n<p>Para contribuir, haz lo siguiente:</p>\n<ol>\n<li>Haz un fork del repositorio</li>\n<li>Crea una nueva rama (brach) con la caracter&iacute;stica que dese&ntilde;as a&ntilde;adir/modificar</li>\n<li>Realiza el push request.</li>\n</ol>\n<p>Hecho con amor desde Venezuela por Anderson Salas</p>\n<p>contacto@andersonsalas.com.ve</p>\n<p>http://github.com/andersonsalas</p>\n<h2>&nbsp;</h2>', NOW(), NOW());

COMMIT;

