-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ww_zuza
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ww_zuza
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ww_zuza` DEFAULT CHARACTER SET utf8mb4 ;
USE `ww_zuza` ;

-- -----------------------------------------------------
-- Table `ww_zuza`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `perfil` VARCHAR(20) NOT NULL DEFAULT 'Cliente',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`cliente`
-- -----------------------------------------------------
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
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`comentario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(1200) NULL,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comentario_cliente_idx` (`cliente_id` ASC),
  CONSTRAINT `fk_comentario_cliente`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `ww_zuza`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `ww_zuza` ;

-- -----------------------------------------------------
-- Table `ww_zuza`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;
INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Panfleto'),
(2, 'Cart??o'),
(3, 'Card??pio'),
(4, 'Banner'),
(5, 'Papel Timbrado');

-- -----------------------------------------------------
-- Table `ww_zuza`.`endereco_cliente`
-- -----------------------------------------------------
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
-- Table `ww_zuza`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`pedido` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `valor_total` DECIMAL(10,2) NOT NULL,
  `situacao` TINYINT(4) NULL DEFAULT NULL,
  `cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `cliente_id` (`cliente_id` ASC),
  CONSTRAINT `pedido_ibfk_1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `ww_zuza`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`pagamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `n_cartao` VARCHAR(45) NOT NULL,
  `pedido_id` INT(11) NOT NULL,
  `nome_cartao` VARCHAR(45) NOT NULL,
  `validade` VARCHAR(45) NOT NULL,
  `verificacao` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `data_nasc` VARCHAR(45) NOT NULL,
  `parcelamento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pagamento_pedido1_idx` (`pedido_id` ASC),
  CONSTRAINT `fk_pagamento_pedido1`
    FOREIGN KEY (`pedido_id`)
    REFERENCES `ww_zuza`.`pedido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ww_zuza`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `cores` VARCHAR(80) NOT NULL,
  `material` VARCHAR(45) NOT NULL,
  `tamanho` VARCHAR(15) NOT NULL,
  `prazo` VARCHAR(15) NOT NULL,
  `qtd` VARCHAR(15) NOT NULL,
  `foto` VARCHAR(60) NULL DEFAULT NULL,
  `categoria_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `categoria_id` (`categoria_id` ASC),
  CONSTRAINT `produto_ibfk_1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `ww_zuza`.`categoria` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `cores`, `material`, `tamanho`, `prazo`, `qtd`, `foto`, `categoria_id`) VALUES
(1, 'Panfleto 4x0', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '70', '4x0 (colorido)', 'Papel Offset  90g', '15cm x 10cm', '3 dias ??teis', '1000un', '627bfb295a9a0.png', 1),
(2, 'Panfleto 4x4', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '200', '4x4', 'Papel Couch??', '15cm x 10cm', '2 dias ??teis', '5000un', '627bffc456c7e.png', 1),
(3, 'Panfleto Of??cio', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '450', '4x4', 'Papel Offset  90g', '20cm x 10cm', '3 dias ??teis', '10000un', '627c035424952.png', 1),
(6, 'Cart??o de Visita', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '80', '4x0', 'Papel Couch?? 300g', '9cm x 5cm', '3 dias ??teis', '1000un', '6282c299b49ff.png', 2),
(8, 'Cart??o de Visita 4x4', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '200', '4x4', 'Papel Couch?? 300g', '9cm x 5cm', '3 dias ??teis', '1000un', '6282c3a45923e.png', 2),
(10, 'Cart??o de Visita 4x0', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '60', '4x0', 'Papel Couch?? 300g', '9cm x 5cm', '2 dias ??teis', '1000un', '6282c4124e65a.png', 2),
(11, 'Card??pio', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicit??ria com estrat??gias claras, s??o uma forte arma de divulga????o e de presen??a de marca.', '250', '4x4 (colorido)', 'Papel Couch?? 95g', '20cm x 10cm', '4 dias ??teis', '30un', '6285b5b2ed663.png', 3);


-- -----------------------------------------------------
-- Table `ww_zuza`.`pedido_tem_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`pedido_tem_produto` (
  `quantidade` INT(11) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `pedido_id` INT(11) NOT NULL,
  `produto_id` INT(11) NOT NULL,
  INDEX `fk_pedido_tem_produto_pedido_idx` (`pedido_id` ASC),
  INDEX `fk_pedido_tem_produto_produto1_idx` (`produto_id` ASC),
  CONSTRAINT `fk_pedido_tem_produto_pedido`
    FOREIGN KEY (`pedido_id`)
    REFERENCES `ww_zuza`.`pedido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_tem_produto_produto1`
    FOREIGN KEY (`produto_id`)
    REFERENCES `ww_zuza`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
