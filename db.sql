-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.15
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `projetophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `idgenero` int(11) NOT NULL AUTO_INCREMENT,
  `nomegenero` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`idgenero`, `nomegenero`) VALUES
(1, 'Ação'),
(3, 'Aventura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE IF NOT EXISTS `jogos` (
  `idjogos` int(11) NOT NULL AUTO_INCREMENT,
  `idgenero` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `idrelacionado` int(11) NOT NULL,
  `lancamento` date NOT NULL,
  `desenvolvedora` varchar(45) NOT NULL,
  `distribuidora` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  PRIMARY KEY (`idjogos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`idjogos`, `idgenero`, `nome`, `descricao`, `idrelacionado`, `lancamento`, `desenvolvedora`, `distribuidora`, `link`, `imagem`) VALUES
(1, 1, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive', 1, '2012-08-21', 'Valve', 'Valve', 'http://store.steampowered.com/app/730/', 'csgo.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionado`
--

CREATE TABLE IF NOT EXISTS `relacionado` (
  `idrelacionado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idrelacionado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `relacionado`
--

INSERT INTO `relacionado` (`idrelacionado`, `nome`) VALUES
(1, 'Counter Strike');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `nome`, `sobrenome`, `login`, `senha`, `email`, `adm`) VALUES
(1, 'Perses', 'De Vilhena', 'perses', '123456', 'persesvilhena', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
