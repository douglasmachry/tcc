-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 07-Jul-2014 às 00:13
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pizzadmin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `municipio` int(2) NOT NULL,
  `teleEntrega` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome`, `municipio`, `teleEntrega`) VALUES
(1, 'Jardim Carvalho', 5, '5.00'),
(3, 'Porto', 13, '2.00'),
(5, 'Leopoldina', 3, '2.00'),
(6, 'ProtÃ¡sio', 4, '3.00'),
(7, 'Ipu', 6, '1.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` char(14) NOT NULL,
  `idMunicipio` int(2) NOT NULL,
  `idBairro` int(2) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `rg`, `cpf`, `idMunicipio`, `idBairro`, `endereco`, `observacoes`) VALUES
(4, 'teste', '1111111111', '123.456.789-09', 1, 5, '11111', ''),
(5, 'teste2', '2222222222', '123.456.789-09', 1, 1, '11111111111', 'teste2'),
(6, 'teste3', '3333333333', '123,456.789-09', 1, 1, '333333333333', ''),
(7, 'teste4', '1111111111', '123.456.789-09', 1, 1, 'aaaa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentoestoque`
--

CREATE TABLE IF NOT EXISTS `movimentoestoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` int(3) NOT NULL,
  `tipoES` char(1) NOT NULL,
  `dataHora` datetime NOT NULL,
  `quantidade` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `municipios`
--

INSERT INTO `municipios` (`id`, `nome`) VALUES
(1, 'a'),
(3, 'c'),
(4, 'd'),
(5, 'e'),
(6, 'f'),
(7, 'g'),
(8, 'h'),
(9, 'i'),
(10, 'j'),
(11, 'k'),
(12, 'b'),
(13, 'l'),
(16, 'm'),
(17, 'n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidopizza`
--

CREATE TABLE IF NOT EXISTS `pedidopizza` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idPedido` int(10) NOT NULL,
  `idTamanho` int(2) NOT NULL,
  `observacoes` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pedidopizza`
--

INSERT INTO `pedidopizza` (`id`, `idPedido`, `idTamanho`, `observacoes`) VALUES
(1, 2, 1, ''),
(2, 2, 1, ''),
(3, 3, 1, ''),
(4, 3, 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoproduto`
--

CREATE TABLE IF NOT EXISTS `pedidoproduto` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idPedido` int(255) NOT NULL,
  `idProduto` int(5) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pedidoproduto`
--

INSERT INTO `pedidoproduto` (`id`, `idPedido`, `idProduto`, `observacoes`) VALUES
(1, 1, 3, ''),
(2, 1, 3, ''),
(3, 3, 3, ''),
(4, 3, 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idCliente` int(100) NOT NULL,
  `motivoCancelamento` text NOT NULL,
  `telentrega` tinyint(1) NOT NULL,
  `motoboy` varchar(20) NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL,
  `dataHoraConclusao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `idCliente`, `motivoCancelamento`, `telentrega`, `motoboy`, `valorTotal`, `dataHoraConclusao`) VALUES
(1, 5, '', 0, '0', '2.80', '0000-00-00 00:00:00'),
(2, 5, 'nÃ£o quero mais', 0, '0', '70.00', '0000-00-00 00:00:00'),
(3, 4, 'sei la', 0, '0', '72.80', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidosabor`
--

CREATE TABLE IF NOT EXISTS `pedidosabor` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `idPedidoPizza` int(7) NOT NULL,
  `idSabores` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `pedidosabor`
--

INSERT INTO `pedidosabor` (`id`, `idPedidoPizza`, `idSabores`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 2, 1),
(4, 2, 1),
(5, 3, 1),
(6, 3, 1),
(7, 4, 1),
(8, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE IF NOT EXISTS `precos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` char(20) NOT NULL,
  `idTipoSabor` int(3) NOT NULL,
  `idTamanho` int(1) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`id`, `nome`, `idTipoSabor`, `idTamanho`, `valor`) VALUES
(1, 'A Pequena', 4, 1, '31.50'),
(3, 'h Pequena', 3, 1, '35.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `tipoProduto` int(2) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `medida` char(2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `tipoProduto`, `quantidade`, `medida`, `preco`) VALUES
(2, 'teste3', 3, 3, 'g', '3.50'),
(3, 'teste1', 1, 1, 'g', '1.40'),
(4, 'teste2', 3, 34, 'kg', '25.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE IF NOT EXISTS `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(80) NOT NULL,
  `sabor` int(2) NOT NULL,
  `tamanho` int(2) NOT NULL,
  `idProduto` int(3) NOT NULL,
  `quantidade` float NOT NULL,
  `medida` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id`, `nome`, `sabor`, `tamanho`, `idProduto`, `quantidade`, `medida`) VALUES
(2, 'a Pequena', 1, 1, 4, 65, 'un');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabores`
--

CREATE TABLE IF NOT EXISTS `sabores` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `idTipoSabor` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `sabores`
--

INSERT INTO `sabores` (`id`, `nome`, `idTipoSabor`) VALUES
(1, 'a', 3),
(2, 'b', 3),
(3, 'c', 3),
(4, 'd', 1),
(5, 'e', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `statuspedido`
--

CREATE TABLE IF NOT EXISTS `statuspedido` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `idPedido` int(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `dataHora` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `statuspedido`
--

INSERT INTO `statuspedido` (`id`, `idPedido`, `status`, `dataHora`) VALUES
(9, 1, 'aberto', '2014-07-06 19:18:47'),
(10, 2, 'cancelado', '2014-07-06 19:26:01'),
(11, 3, 'cancelado', '2014-07-06 19:28:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE IF NOT EXISTS `tamanhos` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `quantSabores` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `nome`, `quantSabores`) VALUES
(1, 'Pequena', 2),
(2, 'MÃ©dia', 3),
(3, 'Grande', 4),
(14, '33', 33),
(15, '1', 1),
(16, '2', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idCliente` int(10) NOT NULL,
  `telefone` char(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`id`, `idCliente`, `telefone`) VALUES
(1, 1, '(11)1111-111'),
(2, 1, '(22)2222-222'),
(3, 1, '(33)3333-333'),
(4, 4, '(11)1111-111'),
(5, 5, '(11)1111-111'),
(6, 5, '(22)2222-222'),
(7, 6, '1111111111'),
(8, 6, '(22)2222-2222'),
(9, 7, '(11)1111-1111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE IF NOT EXISTS `tipoproduto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`id`, `nome`) VALUES
(1, 'Bebidas'),
(2, 'Pizzas'),
(3, 'Lanches'),
(4, 'Ingredientes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposabores`
--

CREATE TABLE IF NOT EXISTS `tiposabores` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tiposabores`
--

INSERT INTO `tiposabores` (`id`, `nome`) VALUES
(1, 'TipoSabor'),
(2, 't'),
(3, 'h'),
(4, 'A'),
(5, 'Tradicionais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(11) NOT NULL,
  `senha` varchar(11) NOT NULL,
  `perfil` varchar(11) NOT NULL,
  `idMunicipio` int(6) NOT NULL,
  `idBairro` int(6) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `rg` int(10) NOT NULL,
  `cpf` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `perfil`, `idMunicipio`, `idBairro`, `endereco`, `rg`, `cpf`) VALUES
(1, 'Administrador', 'admin', 'admin', 'admin', 1, 1, '11111111', 1111111111, 111111),
(2, 'operador', 'operador', 'operador', 'operador', 0, 0, '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
