-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2022 às 16:33
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ww_zuza`
--

-- --------------------------------------------------------

-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ww_zuza` ;

-- -----------------------------------------------------
-- Schema ww_zuza
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ww_zuza` DEFAULT CHARACTER SET utf8mb4 ;
USE `ww_zuza` ;
--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Panfleto'),
(2, 'Cartão'),
(3, 'Cardápio'),
(4, 'Banner'),
(5, 'Papel Timbrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `telefone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco_cliente`
--

CREATE TABLE `endereco_cliente` (
  `id` int(11) NOT NULL,
  `cep` int(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero_casa` varchar(45) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `uf` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `n_cartao` varchar(45) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `nome_cartao` varchar(45) NOT NULL,
  `validade` varchar(45) NOT NULL,
  `verificacao` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `data_nasc` varchar(45) NOT NULL,
  `parcelamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valor_total` DECIMAL(10,2) NOT NULL,
  `situacao` tinyint(4) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_tem_produto`
--

CREATE TABLE `pedido_tem_produto` (
  `quantidade` int(11) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedido_tem_produto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `cores` varchar(80) NOT NULL,
  `material` varchar(45) NOT NULL,
  `tamanho` varchar(15) NOT NULL,
  `prazo` varchar(15) NOT NULL,
  `qtd` varchar(15) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `cores`, `material`, `tamanho`, `prazo`, `qtd`, `foto`, `categoria_id`) VALUES
(1, 'Panfleto 4x0', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '70', '4x0 (colorido)', 'Papel Offset  90g', '15cm x 10cm', '3 dias úteis', '1000un', '627bfb295a9a0.png', 1),
(2, 'Panfleto 4x4', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '200', '4x4', 'Papel Couchê', '15cm x 10cm', '2 dias úteis', '5000un', '627bffc456c7e.png', 1),
(3, 'Panfleto Ofício', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '450', '4x4', 'Papel Offset  90g', '20cm x 10cm', '3 dias úteis', '10000un', '627c035424952.png', 1),
(6, 'Cartão de Visita', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '80', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c299b49ff.png', 2),
(8, 'Cartão de Visita 4x4', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '200', '4x4', 'Papel Couchê 300g', '9cm x 5cm', '3 dias úteis', '1000un', '6282c3a45923e.png', 2),
(10, 'Cartão de Visita 4x0', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '60', '4x0', 'Papel Couchê 300g', '9cm x 5cm', '2 dias úteis', '1000un', '6282c4124e65a.png', 2),
(11, 'Cardápio', 'Folders, flyers, outdoors, entre outros materiais, quando inseridos em uma campanha publicitária com estratégias claras, são uma forte arma de divulgação e de presença de marca.', '250', '4x4 (colorido)', 'Papel Couchê 95g', '20cm x 10cm', '4 dias úteis', '30un', '6285b5b2ed663.png', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `perfil` varchar(20) NOT NULL DEFAULT 'Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_cliente_usuario1_idx` (`usuario_id`);

--
-- Índices para tabela `endereco_cliente`
--
ALTER TABLE `endereco_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_endereco_cliente_cliente_idx` (`cliente_id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagamento_pedido1_idx` (`pedido_id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `pedido_tem_produto`
--
ALTER TABLE `pedido_tem_produto`
  ADD KEY `fk_pedido_tem_produto_pedido_idx` (`pedido_id`),
  ADD KEY `fk_pedido_tem_produto_produto1_idx` (`produto_id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco_cliente`
--
ALTER TABLE `endereco_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `endereco_cliente`
--
ALTER TABLE `endereco_cliente`
  ADD CONSTRAINT `fk_endereco_cliente_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido_tem_produto`
--
ALTER TABLE `pedido_tem_produto`
  ADD CONSTRAINT `fk_pedido_tem_produto_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_tem_produto_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
