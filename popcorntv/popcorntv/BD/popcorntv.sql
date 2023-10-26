-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2023 às 15:01
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `popcorntv`
--
CREATE DATABASE IF NOT EXISTS `popcorntv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `popcorntv`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `codigo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`codigo_cliente`, `nome`, `sobrenome`, `cpf`) VALUES
(17, 'SADF', 'ASDF', '9617559463'),
(18, 'tiago', 'santos', '09617559468'),
(19, 'timoteo', 'asdf', '09617559463'),
(20, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

DROP TABLE IF EXISTS `filmes`;
CREATE TABLE IF NOT EXISTS `filmes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `trailler` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

DROP TABLE IF EXISTS `locacao`;
CREATE TABLE IF NOT EXISTS `locacao` (
  `codigo_locacao` int(11) NOT NULL AUTO_INCREMENT,
  `data_locacao` varchar(255) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `FK_cliente_codigo_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_locacao`),
  KEY `FK_LOCACAO_2` (`FK_cliente_codigo_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locado`
--

DROP TABLE IF EXISTS `locado`;
CREATE TABLE IF NOT EXISTS `locado` (
  `FK_filmes_codigo` int(11) DEFAULT NULL,
  `FK_LOCACAO_codigo_locacao` int(11) DEFAULT NULL,
  KEY `FK_LOCADO_1` (`FK_filmes_codigo`),
  KEY `FK_LOCADO_2` (`FK_LOCACAO_codigo_locacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `FK_LOCACAO_2` FOREIGN KEY (`FK_cliente_codigo_cliente`) REFERENCES `clientes` (`codigo_cliente`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `locado`
--
ALTER TABLE `locado`
  ADD CONSTRAINT `FK_LOCADO_1` FOREIGN KEY (`FK_filmes_codigo`) REFERENCES `filmes` (`codigo`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_LOCADO_2` FOREIGN KEY (`FK_LOCACAO_codigo_locacao`) REFERENCES `locacao` (`codigo_locacao`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
