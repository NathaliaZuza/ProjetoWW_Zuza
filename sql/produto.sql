DROP SCHEMA IF EXISTS `ww_zuza` ;

CREATE SCHEMA `ww_zuza` DEFAULT CHARACTER SET utf8mb4 ;
USE `ww_zuza` ;

-- -----------------------------------------------------
-- Table `ww_zuza`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `categoria` (nome)
values
('Panfleto'),
('Cartão'),
('Cardápio'),
('Banner'),
('Papel Timbrado');

-- -----------------------------------------------------
-- Table `ww_zuza`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ww_zuza`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `preco` VARCHAR(20) NOT NULL,
  `cores` VARCHAR(10) NOT NULL,
  `material` VARCHAR(45) NOT NULL,
  `tamanho` VARCHAR(15) NOT NULL,
  `prazo` VARCHAR(15) NOT NULL,
  `qtd` VARCHAR(15) NOT NULL,
  `foto` VARCHAR(60) NULL DEFAULT NULL,
  `fotoBanner` VARCHAR(60) NULL DEFAULT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(categoria_id) REFERENCES categoria(id)
);
INSERT INTO `produto` (`nome`, `preco`, `cores`, `material`, `tamanho`, `prazo`, `qtd`, `foto`, `categoria_id`) VALUES
('Panfleto 4x0', '70,00', '4x0', 'Papel Couchê', '15cm x 10cm', '3 dias úteis', '1000un', '627bfb295a9a0.png', 1),
('Panfleto 4x4', '200,00', '4x4', 'Papel Couchê', '15cm x 10cm', '2 dias úteis', '5000un', '627bffc456c7e.png', 1),
('Panfleto 20x10', '450,00', '4x4', 'Papel Couchê', '20cm x 10cm', '3 dias úteis', '10000un', '627c035424952.png', 1);