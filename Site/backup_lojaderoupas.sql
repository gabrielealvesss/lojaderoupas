-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/06/2023 às 22:11
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojaderoupas`
--
CREATE DATABASE IF NOT EXISTS `lojaderoupas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lojaderoupas`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `COD_FUN` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `funcao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`COD_FUN`, `nome`, `login`, `senha`, `status`, `funcao`) VALUES
(1, 'João da Silva', 'joaodasilva', '123', 'ATIVO', 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `roupa`
--

CREATE TABLE `roupa` (
  `COD_ROUPA` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `tamanho` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `preco` double NOT NULL,
  `Vendas_idVendas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `roupa`
--

INSERT INTO `roupa` (`COD_ROUPA`, `tipo`, `marca`, `tamanho`, `categoria`, `preco`, `Vendas_idVendas`) VALUES
(1, 'Regata', 'HL', 'M', 'Blusa', 50, 1010);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idVendas` int(11) NOT NULL,
  `Funcionarios_COD_FUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`idVendas`, `Funcionarios_COD_FUN`) VALUES
(1010, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`COD_FUN`);

--
-- Índices de tabela `roupa`
--
ALTER TABLE `roupa`
  ADD PRIMARY KEY (`COD_ROUPA`),
  ADD KEY `fk_Roupa_Vendas1_idx` (`Vendas_idVendas`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVendas`),
  ADD KEY `fk_Vendas_Funcionarios_idx` (`Funcionarios_COD_FUN`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `roupa`
--
ALTER TABLE `roupa`
  ADD CONSTRAINT `fk_Roupa_Vendas1` FOREIGN KEY (`Vendas_idVendas`) REFERENCES `vendas` (`idVendas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_Vendas_Funcionarios` FOREIGN KEY (`Funcionarios_COD_FUN`) REFERENCES `funcionarios` (`COD_FUN`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
