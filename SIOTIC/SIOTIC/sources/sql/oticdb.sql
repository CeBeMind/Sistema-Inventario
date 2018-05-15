SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Municipios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Municipios` (
  `id_municipio` INT NOT NULL AUTO_INCREMENT ,
  `nom_municipio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_municipio`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parroquias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Parroquias` (
  `id_parroquia` INT NOT NULL AUTO_INCREMENT ,
  `nom_parroquia` VARCHAR(45) NOT NULL ,
  `id_municipio_padre` INT NOT NULL ,
  PRIMARY KEY (`id_parroquia`) ,
  INDEX `fk_id_municipio_idx` (`id_municipio_padre` ASC) ,
  CONSTRAINT `fk_id_municipio`
    FOREIGN KEY (`id_municipio_padre` )
    REFERENCES `mydb`.`Municipios` (`id_municipio` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Sedes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Sedes` (
  `id_sede` INT NOT NULL ,
  `nom_sede` VARCHAR(45) NOT NULL ,
  `id_parroquia_madre` INT NOT NULL ,
  PRIMARY KEY (`id_sede`) ,
  INDEX `fk_id_parroquia_madre_idx` (`id_parroquia_madre` ASC) ,
  CONSTRAINT `fk_id_parroquia_madre`
    FOREIGN KEY (`id_parroquia_madre` )
    REFERENCES `mydb`.`Parroquias` (`id_parroquia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Departamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Departamentos` (
  `id_departamento` INT NOT NULL ,
  `nom_departamento` VARCHAR(45) NOT NULL ,
  `id_sede_madre` INT NOT NULL ,
  PRIMARY KEY (`id_departamento`) ,
  INDEX `fk_id_sede_madre_idx` (`id_sede_madre` ASC) ,
  CONSTRAINT `fk_id_sede_madre`
    FOREIGN KEY (`id_sede_madre` )
    REFERENCES `mydb`.`Sedes` (`id_sede` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuarios` (
  `id_usuario` INT NOT NULL ,
  `usuario` VARCHAR(45) NULL ,
  `nom_usuario` VARCHAR(45) NOT NULL ,
  `ape_usuario` VARCHAR(45) NOT NULL ,
  `ced_usuario` VARCHAR(45) NULL ,
  `email_usuario` VARCHAR(45) NULL ,
  `cargo_usuario` VARCHAR(45) NULL ,
  `id_departamento_padre` INT NOT NULL ,
  `id_jefe_de_departamento` INT NULL ,
  PRIMARY KEY (`id_usuario`) ,
  INDEX `fk_id_departamento_padre_idx` (`id_departamento_padre` ASC) ,
  INDEX `fk_id_jefe_de_departamento_idx` (`id_jefe_de_departamento` ASC) ,
  CONSTRAINT `fk_id_departamento_padre`
    FOREIGN KEY (`id_departamento_padre` )
    REFERENCES `mydb`.`Departamentos` (`id_departamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_jefe_de_departamento`
    FOREIGN KEY (`id_jefe_de_departamento` )
    REFERENCES `mydb`.`Departamentos` (`id_departamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Privilegios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Privilegios` (
  `id_privilegios` INT NOT NULL ,
  `id_usuario_autorizado` INT NOT NULL ,
  `id_autorizador` INT NOT NULL ,
  `Comentarios` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id_privilegios`) ,
  INDEX `fk_usuario_autorizado_idx` (`id_usuario_autorizado` ASC) ,
  INDEX `fk_id_autorizador_idx` (`id_autorizador` ASC) ,
  CONSTRAINT `fk_usuario_autorizado`
    FOREIGN KEY (`id_usuario_autorizado` )
    REFERENCES `mydb`.`Usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_autorizador`
    FOREIGN KEY (`id_autorizador` )
    REFERENCES `mydb`.`Usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estatus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Estatus` (
  `id_estatus` INT NOT NULL ,
  `fallas` VARCHAR(200) NULL ,
  `comentarios` VARCHAR(200) NULL ,
  `cantidad_entradas_unidad` INT NULL ,
  `estado_actual_unidad` INT NOT NULL ,
  PRIMARY KEY (`id_estatus`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Hardware`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Hardware` (
  `id_hardware` INT NOT NULL AUTO_INCREMENT ,
  `tipo_hardware` VARCHAR(45) NOT NULL ,
  `marca_hardware` VARCHAR(45) NOT NULL ,
  `modelo_hardware` VARCHAR(45) NOT NULL ,
  `bienes_hardware` VARCHAR(45) NOT NULL ,
  `usuario_asignado` VARCHAR(45) NOT NULL ,
  `fecha_entrada` DATETIME NOT NULL ,  
  `id_estatus` INT NOT NULL ,
  PRIMARY KEY (`id_hardware`) ,
  INDEX `fk_id_estatus_idx` (`id_estatus` ASC) ,
  CONSTRAINT `fk_id_estatus`
    FOREIGN KEY (`id_estatus` )
    REFERENCES `mydb`.`Estatus` (`id_estatus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Telefonos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Telefonos` (
  `id_telefono` INT NOT NULL ,
  `tipo_telefono` VARCHAR(45) NOT NULL ,
  `marca_telefono` VARCHAR(45) NOT NULL ,
  `modelo_telefono` VARCHAR(45) NOT NULL ,
  `nro_telefono` INT NULL ,
  `imei` VARCHAR(45) NULL ,
  `imei_sim` VARCHAR(45) NULL ,
  `puk` VARCHAR(45) NULL ,
  `usuario_asignado` VARCHAR(45) NOT NULL,
  `id_estatus` INT NOT NULL ,
  PRIMARY KEY (`id_telefono`) ,
  INDEX `fk_id_estatus_idx` (`id_estatus` ASC) ,
  CONSTRAINT `fk_id_estatus`
    FOREIGN KEY (`id_estatus` )
    REFERENCES `mydb`.`Estatus` (`id_estatus` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entradas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Entradas` (
  `id_entrada` INT NOT NULL AUTO_INCREMENT ,
  `fecha_entrada` DATETIME NOT NULL ,
  `id_unidad_hardware` INT NULL ,
  `id_unidad_telefono` INT NULL ,
  `id_encargado` INT NULL ,
  `salida_pcp` VARCHAR(45) NULL ,
  `fecha_salida_pcp` DATETIME NULL ,
  `numero_orden` VARCHAR(45) NOT NULL ,
  `nom_responsable` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_entrada`) ,
  INDEX `fk_id_unidad_idx` (`id_unidad_hardware` ASC) ,
  INDEX `fk_id_unidad_telefono_idx` (`id_unidad_telefono` ASC) ,
  INDEX `fk_id_encargado_idx` (`id_encargado` ASC) ,
  CONSTRAINT `fk_id_unidad_hardware`
    FOREIGN KEY (`id_unidad_hardware` )
    REFERENCES `mydb`.`Hardware` (`id_hardware` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_unidad_telefono`
    FOREIGN KEY (`id_unidad_telefono` )
    REFERENCES `mydb`.`Telefonos` (`id_telefono` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_encargado`
    FOREIGN KEY (`id_encargado` )
    REFERENCES `mydb`.`Usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Salidas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Salidas` (
  `id_salida` INT NOT NULL ,
  `id_entrada` INT NOT NULL ,
  `fecha_salida` DATETIME NOT NULL ,
  `nom_responsable` VARCHAR(45) NULL ,
  `salida_pcp` VARCHAR(45) NULL ,
  `fecha_salida_pcp` DATETIME NULL ,
  `reporte` VARCHAR(200) NOT NULL ,
  `nom_receptor` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_salida`) ,
  INDEX `fk_id_entrada_idx` (`id_entrada` ASC) ,
  CONSTRAINT `fk_id_entrada`
    FOREIGN KEY (`id_entrada` )
    REFERENCES `mydb`.`Entradas` (`id_entrada` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`HistAsigCelulares`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`HistAsigCelulares` (
  `id_asignacion` INT NOT NULL AUTO_INCREMENT ,
  `id_usuario` INT NOT NULL ,
  `id_telefono` INT NOT NULL ,
  PRIMARY KEY (`id_asignacion`) ,
  INDEX `fk_id_usuario_idx` (`id_usuario` ASC) ,
  INDEX `fk_id_telefono_idx` (`id_telefono` ASC) ,
  CONSTRAINT `fk_id_usuario`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `mydb`.`Usuarios` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_telefono`
    FOREIGN KEY (`id_telefono` )
    REFERENCES `mydb`.`Telefonos` (`id_telefono` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pendrives`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Pendrives` (
  `fecha` DATE NOT NULL ,
  `cantidad` INT NOT NULL ,
  PRIMARY KEY (`fecha`) )
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
