-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cdc
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cdc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cdc` DEFAULT CHARACTER SET utf8 ;
USE `cdc` ;

-- -----------------------------------------------------
-- Table `cdc`.`citas_rep`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`citas_rep` (
  `id_cita` INT NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(250) NULL,
  `num_historia` VARCHAR(250) NULL,
  `fecha_nac` DATE NULL,
  `sexo` INT NULL,
  `telefono` VARCHAR(250) NULL,
  `edad` VARCHAR(250) NULL,
  `rango` VARCHAR(250) NULL,
  `cia` VARCHAR(250) NULL,
  `des_razon` VARCHAR(250) NULL,
  `fec_citas` DATE NULL,
  `motivo` VARCHAR(250) NULL,
  PRIMARY KEY (`id_cita`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`destino_reportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`destino_reportes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(250) NULL,
  `nombre` VARCHAR(250) NULL,
  `reporte_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `cdc`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`password_resets` (
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `token` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `cdc`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`ubicacion` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(250) NULL,
  `ubicacion_padre` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ubicacion_ubicacion_idx` (`ubicacion_padre` ASC),
  CONSTRAINT `fk_ubicacion_ubicacion`
    FOREIGN KEY (`ubicacion_padre`)
    REFERENCES `cdc`.`ubicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`archivo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `tipo` INT NOT NULL COMMENT '1: imagen\n2: pdf',
  `ruta` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`persona` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(250) NOT NULL,
  `apellido_paterno` VARCHAR(250) NOT NULL,
  `apellido_materno` VARCHAR(250) NULL,
  `direccion` VARCHAR(250) NULL,
  `fecha_nacimiento` DATE NULL,
  `sexo` INT NOT NULL DEFAULT 1 COMMENT '1: masculino, 2: femenino\n',
  `dni` VARCHAR(250) NULL,
  `pasaporte` VARCHAR(250) NULL,
  `carne_extra` VARCHAR(250) NULL,
  `ruc` VARCHAR(250) NULL,
  `ubicacion_nacimiento` INT NULL,
  `ubicacion_domicilio` INT NULL,
  `foto_portada` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_ubicacion1_idx` (`ubicacion_nacimiento` ASC),
  INDEX `fk_persona_ubicacion2_idx` (`ubicacion_domicilio` ASC),
  INDEX `fk_persona_archivo1_idx` (`foto_portada` ASC),
  CONSTRAINT `fk_persona_ubicacion1`
    FOREIGN KEY (`ubicacion_nacimiento`)
    REFERENCES `cdc`.`ubicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_ubicacion2`
    FOREIGN KEY (`ubicacion_domicilio`)
    REFERENCES `cdc`.`ubicacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_persona_archivo1`
    FOREIGN KEY (`foto_portada`)
    REFERENCES `cdc`.`archivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(191) CHARACTER SET 'utf8mb4' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `persona_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC),
  INDEX `fk_users_persona1_idx` (`persona_id` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `cdc`.`historia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`historia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha_creacion` DATETIME NULL,
  `persona_historia` INT NOT NULL,
  `usuario_creacion` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_historia_persona1_idx` (`persona_historia` ASC),
  CONSTRAINT `fk_historia_persona1`
    FOREIGN KEY (`persona_historia`)
    REFERENCES `cdc`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`motivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`motivo` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`aseguradora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`aseguradora` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(250) NULL,
  `RUC` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`medico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`medico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `CMP` VARCHAR(250) NULL,
  `persona_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_medico_persona1_idx` (`persona_id` ASC),
  CONSTRAINT `fk_medico_persona1`
    FOREIGN KEY (`persona_id`)
    REFERENCES `cdc`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`medico_especialidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`medico_especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `medico_id` INT NOT NULL,
  `especialidad_id` INT NOT NULL,
  `activo` INT NULL,
  INDEX `fk_medico_has_especialidad_especialidad1_idx` (`especialidad_id` ASC),
  INDEX `fk_medico_has_especialidad_medico1_idx` (`medico_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_medico_has_especialidad_medico1`
    FOREIGN KEY (`medico_id`)
    REFERENCES `cdc`.`medico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medico_has_especialidad_especialidad1`
    FOREIGN KEY (`especialidad_id`)
    REFERENCES `cdc`.`especialidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`cita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`cita` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `motivo_id` INT NOT NULL,
  `nro_orden` INT NULL,
  `aseguradora_id` INT NULL COMMENT 'Si la aseguradora es nula, se entiende que es paciente privado',
  `historia_id` INT NOT NULL,
  `usuario_creacion` INT(10) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `medico_especialidad_id` INT NOT NULL,
  `nota_adicional` TEXT NULL,
  `fecha_cita` DATE NULL,
  `confirmado` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_cita_motivo1_idx` (`motivo_id` ASC),
  INDEX `fk_cita_aseguradora1_idx` (`aseguradora_id` ASC),
  INDEX `fk_cita_historia1_idx` (`historia_id` ASC),
  INDEX `fk_cita_medico_especialidad1_idx` (`medico_especialidad_id` ASC),
  CONSTRAINT `fk_cita_motivo1`
    FOREIGN KEY (`motivo_id`)
    REFERENCES `cdc`.`motivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_aseguradora1`
    FOREIGN KEY (`aseguradora_id`)
    REFERENCES `cdc`.`aseguradora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_historia1`
    FOREIGN KEY (`historia_id`)
    REFERENCES `cdc`.`historia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_medico_especialidad1`
    FOREIGN KEY (`medico_especialidad_id`)
    REFERENCES `cdc`.`medico_especialidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cdc`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`horario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `desde` TIME NULL,
  `hasta` TIME NULL,
  `dia` DATE NULL,
  `cantidad_pacientes` INT NULL,
  `medico_especialidad_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_horario_medico_especialidad1_idx` (`medico_especialidad_id` ASC),
  CONSTRAINT `fk_horario_medico_especialidad1`
    FOREIGN KEY (`medico_especialidad_id`)
    REFERENCES `cdc`.`medico_especialidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `cdc` ;

-- -----------------------------------------------------
-- Placeholder table for view `cdc`.`ubicaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cdc`.`ubicaciones` (`id` INT, `tag` INT, `ubicacion` INT);

-- -----------------------------------------------------
-- View `cdc`.`ubicaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cdc`.`ubicaciones`;
USE `cdc`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cdc`.`ubicaciones` AS select ifnull(`f`.`id`,ifnull(`e`.`id`,ifnull(`d`.`id`,ifnull(`c`.`id`,ifnull(`b`.`id`,`a`.`id`))))) AS `id`,ifnull(`f`.`nombre`,ifnull(`e`.`nombre`,ifnull(`d`.`nombre`,ifnull(`c`.`nombre`,ifnull(`b`.`nombre`,`a`.`nombre`))))) AS `tag`,(case when isnull(`c`.`nombre`) then concat(ifnull(upper(`a`.`nombre`),''),', ',ifnull(`b`.`nombre`,'')) when isnull(`d`.`nombre`) then concat(ifnull(upper(`a`.`nombre`),''),' - ',ifnull(upper(`b`.`nombre`),''),', ',ifnull(`c`.`nombre`,'')) else concat(ifnull(upper(`c`.`nombre`),''),' - ',ifnull(upper(`d`.`nombre`),''),', ',ifnull(concat(upper(left(`e`.`nombre`,1)),lower(substr(`e`.`nombre`,2))),''),' - ',ifnull(concat(upper(left(`f`.`nombre`,1)),lower(substr(`f`.`nombre`,2))),'')) end) AS `ubicacion` from (((((`cdc`.`ubicacion` `a` join `cdc`.`ubicacion` `b` on((isnull(`a`.`ubicacion_padre`) and (`b`.`ubicacion_padre` = `a`.`id`)))) left join `cdc`.`ubicacion` `c` on((`c`.`ubicacion_padre` = `b`.`id`))) left join `cdc`.`ubicacion` `d` on((`d`.`ubicacion_padre` = `c`.`id`))) left join `cdc`.`ubicacion` `e` on((`e`.`ubicacion_padre` = `d`.`id`))) left join `cdc`.`ubicacion` `f` on((`f`.`ubicacion_padre` = `e`.`id`)));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
