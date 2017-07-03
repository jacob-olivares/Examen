-- MySQL Script generated by MySQL Workbench
-- Fri Jun 30 14:30:07 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Paciente` (
  `rut_paciente` INT NOT NULL,
  `nombres` VARCHAR(45) NULL DEFAULT NULL,
  `ape_pat` VARCHAR(45) NULL DEFAULT NULL,
  `ape_mat` VARCHAR(45) NULL DEFAULT NULL,
  `sexo` CHAR(1) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` INT NULL DEFAULT NULL,
  PRIMARY KEY (`rut_paciente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Medico` (
  `rut_medico` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NULL DEFAULT NULL,
  `ape_pat` VARCHAR(45) NULL DEFAULT NULL,
  `ape_mat` VARCHAR(45) NULL DEFAULT NULL,
  `especialidad` VARCHAR(45) NULL DEFAULT NULL,
  `valor_consulta` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`rut_medico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Consulta` (
  `idConsulta` INT NOT NULL AUTO_INCREMENT,
  `fecha_atencion` DATETIME NULL DEFAULT NULL,
  `rut_paciente` INT NULL DEFAULT NULL,
  `rut_medico` INT NULL DEFAULT NULL,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idConsulta`),
  INDEX `rut_medico_idx` (`rut_medico` ASC),
  INDEX `rut_paciente_idx` (`rut_paciente` ASC),
  CONSTRAINT `rut_medico`
    FOREIGN KEY (`rut_medico`)
    REFERENCES `mydb`.`Medico` (`rut_medico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `rut_paciente`
    FOREIGN KEY (`rut_paciente`)
    REFERENCES `mydb`.`Paciente` (`rut_paciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Privilegio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Privilegio` (
  `idPrivilegio` INT NOT NULL,
  `tipoPrivilegio` VARCHAR(45) NULL,
  PRIMARY KEY (`idPrivilegio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `idPrivilegio` INT NULL,
  PRIMARY KEY (`idUsuario`, `usuario`, `contrasena`),
  INDEX `idPrivilegio_idx` (`idPrivilegio` ASC),
  CONSTRAINT `idPrivilegio`
    FOREIGN KEY (`idPrivilegio`)
    REFERENCES `mydb`.`Privilegio` (`idPrivilegio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Permiso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Permiso` (
  `idPermiso` INT NOT NULL,
  `tipoPermiso` VARCHAR(45) NULL,
  `idPrivilegio` INT NULL,
  PRIMARY KEY (`idPermiso`),
  INDEX `idPrivilegio_idx` (`idPrivilegio` ASC),
  CONSTRAINT `idPrivilegio_fk`
    FOREIGN KEY (`idPrivilegio`)
    REFERENCES `mydb`.`Privilegio` (`idPrivilegio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
