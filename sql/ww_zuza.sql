-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

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
  `usuario_id` INT(11) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf` (`cpf` ASC),
  INDEX `fk_cliente_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_cliente_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `ww_zuza`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`endereco_cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`endereco_cliente` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`endereco_cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cep` INT(10) NOT NULL,
  `endereco` VARCHAR(255) NOT NULL,
  `numero_casa` VARCHAR(45) NOT NULL,
  `cliente_id` INT(11) NOT NULL,
  `complemento` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_endereco_cliente_cliente_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_endereco_cliente_cliente`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `ww_zuza`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `ww_zuza`.`lg_adm`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`lg_adm` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`lg_adm` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

INSERT INTO `lg_adm`(`id`,`email`,`senha`) VALUES
(1,'adm@email.com','123123');

-- -----------------------------------------------------
-- Table `ww_zuza`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`produto` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `desc` VARCHAR(255) NOT NULL,
  `preco` VARCHAR(20) NOT NULL,
  `cores` VARCHAR(10) NOT NULL,
  `material` VARCHAR(45) NOT NULL,
  `tamanho` VARCHAR(15) NOT NULL,
  `prazo` VARCHAR(15) NOT NULL,
  `qtd` VARCHAR(15) NOT NULL,
  `foto` VARCHAR(60) NULL DEFAULT NULL,
  `fotoBanner` VARCHAR(60) NULL DEFAULT NULL,
  `categoria_id` INT(11) NOT NULL,
  `lg_adm_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_id` (`categoria_id` ASC),
  INDEX `fk_produto_lg_adm1_idx` (`lg_adm_id` ASC),
  CONSTRAINT `produto_ibfk_1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `ww_zuza`.`categoria` (`id`),
  CONSTRAINT `fk_produto_lg_adm1`
    FOREIGN KEY (`lg_adm_id`)
    REFERENCES `ww_zuza`.`lg_adm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;

INSERT INTO `produto` (`id`, `nome`, `desc`, `preco`, `cores`, `material`, `tamanho`, `prazo`, `qtd`, `foto`, `categoria_id`) VALUES
(1, 'Panfleto 4x0', 'teste', '70,00', '4x0 (colorido)', 'Papel Offset  90g', '15cm x 10cm', '3 dias úteis', '1000un', '627bfb295a9a0.png', 1),
(3, 'Panfleto Ofício', 'teste2', '450,00', '4x4', 'Papel Offset  90g', '20cm x 10cm', '3 dias úteis', '10000un', '627c035424952.png', 1),
(6, 'Cartão de Visita', 'teste3', '80,00', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c299b49ff.png', 2),
(8, 'Cartão de Visita 4x4', 'teste4', '200,00', '4x4', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c3a45923e.png', 2),
(10, 'Cartão de Visita 4x0', 'teste5', '60,00', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '2 dias úteis', '1000un', '6282c4124e65a.png', 2),
(11, 'Cardápio', 'teste6', '250,00', '4x4 (colorido)', 'Papel Couchê 95g', '20cm x 10cm', '4 dias úteis', '30un', '6285b5b2ed663.png', 3);



-- -----------------------------------------------------
-- Table `ww_zuza`.`pedido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`pedido` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`pedido` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `DATA` DATETIME NOT NULL,
  `VALOR` DECIMAL(9,2) NOT NULL,
  `QUANTIDADE` INT(11) NOT NULL,
  `SITUACAO` TINYINT(4) NOT NULL,
  `produto_id` INT(11) NOT NULL,
  `cliente_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_PEDIDO_produto1_idx` (`produto_id` ASC),
  INDEX `fk_pedido_cliente1_idx` (`cliente_ID` ASC),
  CONSTRAINT `fk_PEDIDO_produto1`
    FOREIGN KEY (`produto_id`)
    REFERENCES `ww_zuza`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_cliente1`
    FOREIGN KEY (`cliente_ID`)
    REFERENCES `ww_zuza`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ww_zuza`.`pagamento` ;

CREATE TABLE IF NOT EXISTS `ww_zuza`.`pagamento` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `n_cartao` VARCHAR(45) NOT NULL,
  `PEDIDO_ID` INT(11) NOT NULL,
  `nome_cartao` VARCHAR(45) NOT NULL,
  `validade` VARCHAR(45) NOT NULL,
  `verificacao` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `data_nasc` VARCHAR(45) NOT NULL,
  `parcelamento` VARCHAR(45) NOT NULL,
  `lg_adm_id` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_PAGAMENTO_PEDIDO1_idx` (`PEDIDO_ID` ASC),
  INDEX `fk_pagamento_lg_adm1_idx` (`lg_adm_id` ASC),
  CONSTRAINT `fk_PAGAMENTO_PEDIDO1`
    FOREIGN KEY (`PEDIDO_ID`)
    REFERENCES `ww_zuza`.`pedido` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_lg_adm1`
    FOREIGN KEY (`lg_adm_id`)
    REFERENCES `ww_zuza`.`lg_adm` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
