-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ww_zuza
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ww_zuza` ;

-- -----------------------------------------------------
-- Schema ww_zuza
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ww_zuza` DEFAULT CHARACTER SET utf8mb4 ;
USE `ww_zuza` ;

-- -----------------------------------------------------
-- Table `ww_zuza`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`categoria` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `ww_zuza`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`usuario` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `perfil` ENUM('adimin', 'cliente') NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`cliente` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  `cep` VARCHAR(45) NULL DEFAULT NULL,
  `endereco` VARCHAR(45) NULL DEFAULT NULL,
  `num_casa` VARCHAR(45) NULL DEFAULT NULL,
  `complemento` VARCHAR(45) NULL DEFAULT NULL,
  `cidade` VARCHAR(45) NULL DEFAULT NULL,
  `uf` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf` (`cpf` ASC) VISIBLE,
  INDEX `fk_cliente_usuario1_idx` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `ww_zuza`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`produto` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `preco` VARCHAR(20) NOT NULL,
  `cores` VARCHAR(80) NOT NULL,
  `material` VARCHAR(45) NOT NULL,
  `tamanho` VARCHAR(15) NOT NULL,
  `prazo` VARCHAR(15) NOT NULL,
  `qtd` VARCHAR(15) NOT NULL,
  `foto` VARCHAR(60) NULL DEFAULT NULL,
  `categoria_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_id` (`categoria_id` ASC) VISIBLE,
  CONSTRAINT `produto_ibfk_1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `ww_zuza`.`categoria` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `ww_zuza`.`pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`pedido` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`pedido` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL,
  `valor` DECIMAL(9,2) NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `situacao` TINYINT(4) NOT NULL,
  `produto_id` INT(11) NOT NULL,
  `cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pedido_produto1_idx` (`produto_id` ASC) VISIBLE,
  INDEX `fk_pedido_cliente1_idx` (`cliente_id` ASC) VISIBLE,
  CONSTRAINT `fk_pedido_cliente1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `ww_zuza`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_produto1`
    FOREIGN KEY (`produto_id`)
    REFERENCES `ww_zuza`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`pagamento` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`pagamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `n_cartao` VARCHAR(45) NOT NULL,
  `nome_cartao` VARCHAR(45) NOT NULL,
  `validade` VARCHAR(45) NOT NULL,
  `verificacao` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `data_nasc` VARCHAR(45) NOT NULL,
  `parcelamento` VARCHAR(45) NOT NULL,
  `pedido_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pagamento_pedido1_idx` (`pedido_id` ASC) VISIBLE,
  CONSTRAINT `fk_pagamento_pedido1`
    FOREIGN KEY (`pedido_id`)
    REFERENCES `ww_zuza`.`pedido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
