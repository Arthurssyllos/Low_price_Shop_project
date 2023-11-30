-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25/11/2023 às 01:04
-- Versão do servidor: 8.0.31
-- Versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lowpriceshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(110) NOT NULL,
  `imagemProduto` text NOT NULL,
  `corProduto` varchar(110) NOT NULL,
  `descricaoProduto` varchar(110) NOT NULL,
  `tamanhoProduto` varchar(110) NOT NULL,
  `precoProduto` varchar(110) NOT NULL,
  `categoria` varchar(110) NOT NULL,
  `DisponivelProduto` int NOT NULL,
  `estoqueProduto` int NOT NULL,
  `dataCadastro` datetime NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nomeProduto`, `imagemProduto`, `corProduto`, `descricaoProduto`, `tamanhoProduto`, `precoProduto`, `categoria`, `DisponivelProduto`, `estoqueProduto`, `dataCadastro`) VALUES
(1, 'Camiseta Vans Preto', 'camisa_vans.png', 'Preto, Branco, vermelho', 'Fundada na Califórnia em 1966, a VANS está envolvida com a cultura de rua, artes, música e ligada ao skate e à', 'P, M, G', '150', 'Camisa', 1, 30, '2023-11-22 23:27:06'),
(2, 'Nike Shoulder Bag Preto', 'bag.png', 'Preto', '', 'Unico', '212', 'Bag', 1, 30, '2023-11-22 23:27:06'),
(3, 'Boné New Era Mbi19bon117 Preto', 'bone.png', 'Preto', '', 'Unico', '184', 'Boné', 1, 30, '2023-11-22 23:27:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

DROP TABLE IF EXISTS `transacao`;
CREATE TABLE IF NOT EXISTS `transacao` (
  `idTransacao` int NOT NULL AUTO_INCREMENT,
  `idProduto` int NOT NULL,
  `idUsuario` int NOT NULL,
  `preco` varchar(110) NOT NULL,
  `situacao` int NOT NULL,
  `endereco` varchar(110) NOT NULL,
  `dataCompra` datetime NOT NULL,
  `enviado` int NOT NULL,
  PRIMARY KEY (`idTransacao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `senha` varchar(110) NOT NULL,
  `endereco` varchar(110) NOT NULL,
  `cidade` varchar(110) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
