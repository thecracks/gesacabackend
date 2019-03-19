-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_gesaca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_gesaca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_gesaca` DEFAULT CHARACTER SET utf8 ;
USE `db_gesaca` ;

-- -----------------------------------------------------
-- Table `db_gesaca`.`Nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesaca`.`Nivel` (
  `IdNivel` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(50) NOT NULL,
  `estado` INT(1) NOT NULL,
  PRIMARY KEY (`IdNivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesaca`.`Anio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesaca`.`Anio` (
  `IdAnio` INT NOT NULL,
  `Fecha` INT(4) NOT NULL,
  `FechaInicio` DATE NOT NULL,
  `FechaFin` DATE NOT NULL,
  `Descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`IdAnio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesaca`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesaca`.`Persona` (
  `IdPersona` INT NOT NULL,
  `Nombre` VARCHAR(80) NOT NULL,
  `Paterno` VARCHAR(50) NOT NULL,
  `Materno` VARCHAR(50) NOT NULL,
  `Telefono` VARCHAR(10) NULL,
  `Tipo` INT(1) NOT NULL,
  `Sub` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`IdPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_gesaca`.`Matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_gesaca`.`Matricula` (
  `IdMatricula` INT NOT NULL,
  `IdPersona` INT NOT NULL,
  `IdNivel` INT NOT NULL,
  `IdAnio` INT NOT NULL,
  `IdGrado` INT(1) NOT NULL,
  `IdSeccion` INT(2) NOT NULL,
  `Nota` DECIMAL(2,2) NULL DEFAULT 0.00,
  PRIMARY KEY (`IdMatricula`),
  INDEX `fk_Matricula_Persona_idx` (`IdPersona` ASC) ,
  INDEX `fk_Matricula_Nivel1_idx` (`IdNivel` ASC) ,
  INDEX `fk_Matricula_Anio1_idx` (`IdAnio` ASC) ,
  CONSTRAINT `fk_Matricula_Persona`
    FOREIGN KEY (`IdPersona`)
    REFERENCES `db_gesaca`.`Persona` (`IdPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Matricula_Nivel1`
    FOREIGN KEY (`IdNivel`)
    REFERENCES `db_gesaca`.`Nivel` (`IdNivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Matricula_Anio1`
    FOREIGN KEY (`IdAnio`)
    REFERENCES `db_gesaca`.`Anio` (`IdAnio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
