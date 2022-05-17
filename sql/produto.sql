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

INSERT INTO `produto` (`id`, `nome`, `preco`, `cores`, `material`, `tamanho`, `prazo`, `qtd`, `foto`, `categoria_id`) VALUES
(1, 'Panfleto 4x0', '70,00', '4x0 (color', 'Papel Offset  90g', '15cm x 10cm', '3 dias úteis', '1000un', '627bfb295a9a0.png', 1),
(2, 'Panfleto 4x4', '200,00', '4x4', 'Papel Couchê', '15cm x 10cm', '2 dias úteis', '5000un', '627bffc456c7e.png', 1),
(3, 'Panfleto Ofício', '450,00', '4x4', 'Papel Offset  90g', '20cm x 10cm', '3 dias úteis', '10000un', '627c035424952.png', 1),
(6, 'Cartão de Visita', '80,00', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c299b49ff.png', 2),
(8, 'Cartão de Visita 4x4', '200,00', '4x4', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c3a45923e.png', 2),
(10, 'Cartão de Visita 4x0', '60,00', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '2 dias úteis', '1000un', '6282c4124e65a.png', 2);
