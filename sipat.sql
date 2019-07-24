-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2019 às 23:51
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abate_intangivel`
--

CREATE TABLE IF NOT EXISTS `abate_intangivel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `notasadicionais` varchar(100) NOT NULL,
  `designacao` varchar(100) NOT NULL,
  `tipo_aquisicao` varchar(60) NOT NULL,
  `entidade_fornecedora` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `abate_intangivel`
--

INSERT INTO `abate_intangivel` (`id`, `notasadicionais`, `designacao`, `tipo_aquisicao`, `entidade_fornecedora`) VALUES
(1, 'Abatido por degradação', 'cadeira de roda', 'doação', 'emss');

-- --------------------------------------------------------

--
-- Estrutura da tabela `afectacao`
--

CREATE TABLE IF NOT EXISTS `afectacao` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(30) DEFAULT NULL,
  `departamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `afectacao`
--

INSERT INTO `afectacao` (`id`, `funcionario`, `departamento`) VALUES
(1, 'Edson Manuel', 'InformÃ¡tica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bem`
--

CREATE TABLE IF NOT EXISTS `bem` (
  `idbem` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(45) DEFAULT NULL,
  `numeroinventario` int(20) DEFAULT NULL,
  `custobem` double DEFAULT NULL,
  `vidautil` double DEFAULT NULL,
  `despesacompra` double DEFAULT NULL,
  `classificacaodespesa` varchar(100) DEFAULT NULL,
  `valoravaliacao` double DEFAULT NULL,
  `dataavaliacao` date DEFAULT NULL,
  `valorreavaliacao` double DEFAULT NULL,
  `datareavaliacao` date DEFAULT NULL,
  `valormensalamortizacao` double DEFAULT NULL,
  `valoranualamortizacao` double DEFAULT NULL,
  `dataentradaoeracao` date DEFAULT NULL,
  `tipodocumentoaquisicao` varchar(45) DEFAULT NULL,
  `datacontrato` date DEFAULT NULL,
  `statusbem` tinyint(1) DEFAULT NULL,
  `datacriacao` timestamp NULL DEFAULT NULL,
  `dataalteracao` timestamp NULL DEFAULT NULL,
  `dataeliminacao` timestamp NULL DEFAULT NULL,
  `nomecontacriacao` varchar(50) DEFAULT NULL,
  `nomecontaalteracao` varchar(50) DEFAULT NULL,
  `nomecontaeliminacao` varchar(50) DEFAULT NULL,
  `tipo_aquisicao_idtipo_aquisicao` int(11) NOT NULL,
  PRIMARY KEY (`idbem`),
  KEY `fk_bem_tipo_aquisicao_idx` (`tipo_aquisicao_idtipo_aquisicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bemimovel`
--

CREATE TABLE IF NOT EXISTS `bemimovel` (
  `codigo` int(100) DEFAULT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(60) NOT NULL,
  `tipo_imovel` varchar(10) NOT NULL,
  `tipo_aquisicao` varchar(30) NOT NULL,
  `entidade_fornecedora` varchar(30) NOT NULL,
  `data_operacao` date NOT NULL,
  `dominio` varchar(20) DEFAULT NULL,
  `proprietario` varchar(60) DEFAULT NULL,
  `periodo_afetacao` int(5) DEFAULT NULL,
  `custo_aquisicao` double DEFAULT NULL,
  `despesa_compra` double DEFAULT NULL,
  `classificacao_despesa` varchar(30) DEFAULT NULL,
  `valor_mensal` double DEFAULT NULL,
  `vida_util` double DEFAULT NULL,
  `conservatoria` varchar(20) DEFAULT NULL,
  `tipo_construcao` varchar(30) DEFAULT NULL,
  `piso_num` int(10) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `construcao_ano` int(10) DEFAULT NULL,
  `data_ultimo_control` date DEFAULT NULL,
  `estado_conservacao` varchar(20) DEFAULT NULL,
  `valor_patrimonio` int(100) DEFAULT NULL,
  `contrato` varchar(40) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `bemimovel`
--

INSERT INTO `bemimovel` (`codigo`, `id`, `designacao`, `tipo_imovel`, `tipo_aquisicao`, `entidade_fornecedora`, `data_operacao`, `dominio`, `proprietario`, `periodo_afetacao`, `custo_aquisicao`, `despesa_compra`, `classificacao_despesa`, `valor_mensal`, `vida_util`, `conservatoria`, `tipo_construcao`, `piso_num`, `area`, `construcao_ano`, `data_ultimo_control`, `estado_conservacao`, `valor_patrimonio`, `contrato`, `data_inicio`, `data_fim`) VALUES
(6, 26, 'Herança', 'Urbano', 'Compra(usado)', 'Tecno', '2019-02-05', 'Privado', 'TV Globo', 10, 20000, 1000, 'Financiamento', 4000, 10, '3Âª conserv', 'ConstruÃ§Ã£o PrÃ³peria', 10, '50x50', 2019, NULL, NULL, NULL, 'Escrito', '2019-02-11', '2019-02-04'),
(7, 27, 'RequisiÃ§Ã£o', 'Urbano', 'AcessÃ£o', 'ENM', '2019-02-11', 'Publico', 'SIC', 5, 10000, 200, 'Financiamento', 3000, 5, '2Âª Conserv', 'Auto dirigida', 5, '16x20', 2014, '2019-02-04', 'Bom', 100000000, 'Escrito', '2019-02-13', '2019-02-11'),
(1, 25, 'Legado', 'RÃºstico', 'Comodato', 'EMSS', '2019-01-07', 'Publico', 'TPA', 4, 10000, 200, 'Patrimonial', 200, 3, '4Âª conserv', 'Auto dirigida', 5, '2x2', 2016, '2019-01-08', 'Bom', 4000000, 'Verbal', '2019-01-07', '2019-01-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bemintangivel`
--

CREATE TABLE IF NOT EXISTS `bemintangivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notasadicionais` varchar(300) DEFAULT NULL,
  `designacao` varchar(30) DEFAULT NULL,
  `tipo_aquisicao` varchar(30) DEFAULT NULL,
  `entidade_fornecedora` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Extraindo dados da tabela `bemintangivel`
--

INSERT INTO `bemintangivel` (`id`, `notasadicionais`, `designacao`, `tipo_aquisicao`, `entidade_fornecedora`) VALUES
(35, 'Por recomendaÃ§Ã£o', 'Legado', 'RequisiÃ§Ã£o', 'AAA'),
(33, 'Publicidade em troca', 'NacionalizaÃ§Ã£o', 'Confisco', 'DSTV'),
(31, 'A Gestora', 'Sem Dono Conhecido', 'Arrendamento', 'Luisa'),
(30, 'contratual', 'Legado', 'AcessÃ£o', 'UAN'),
(29, 'Resgate', 'TransferÃªncia', 'Confisco', 'BANC'),
(28, 'DoaÃ§Ã£o', 'Sem Dono Conhecido', 'AcessÃ£o', 'PGR'),
(27, 'ministÃ©rio', 'NacionalizaÃ§Ã£o', 'Compra(Novo)', 'MINJUD'),
(26, 'Investimento', 'ReversÃ£o (Direito de)', 'AcessÃ£o', 'SOL'),
(25, 'SÃ³cio', 'RequisiÃ§Ã£o', 'Confisco', 'EMSS'),
(24, 'O promotor', 'NacionalizaÃ§Ã£o', 'AcessÃ£o', 'CÃ©sar Hosdain'),
(23, 'Por doaÃ§Ã£o', 'Legado', 'Permuta', 'Osvaldo VirgÃ­lio'),
(22, 'nada ', 'HeranÃ§a TestamentÃ¡ria', 'AcessÃ£o', 'SSA'),
(34, 'Solidariedade', 'Testamento', 'DoaÃ§Ã£o', 'Ritmos de Alegria'),
(21, 'Por doaÃ§Ã£o', 'Sem dono', 'AcessÃ£o', 'BNA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bemmovel`
--

CREATE TABLE IF NOT EXISTS `bemmovel` (
  `codigo` int(100) DEFAULT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(60) NOT NULL,
  `tipo_aquisicao` varchar(50) NOT NULL,
  `entidade_fornecedora` varchar(60) NOT NULL,
  `data_operacao` date NOT NULL,
  `localizacao` varchar(40) NOT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `serie_num` varchar(30) DEFAULT NULL,
  `custo_aquisicao` double DEFAULT NULL,
  `despesa_compra` double DEFAULT NULL,
  `classificacao_despesa` varchar(30) DEFAULT NULL,
  `valor_mensal` double DEFAULT NULL,
  `vida_util` float DEFAULT NULL,
  `data_control` date DEFAULT NULL,
  `estado_conservacao` varchar(30) DEFAULT NULL,
  `operacionalidade` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `bemmovel`
--

INSERT INTO `bemmovel` (`codigo`, `id`, `designacao`, `tipo_aquisicao`, `entidade_fornecedora`, `data_operacao`, `localizacao`, `marca`, `modelo`, `cor`, `serie_num`, `custo_aquisicao`, `despesa_compra`, `classificacao_despesa`, `valor_mensal`, `vida_util`, `data_control`, `estado_conservacao`, `operacionalidade`) VALUES
(2, 5, 'RequisiÃ§Ã£o', 'Aluguer', 'ENM', '2019-01-07', 'Miramar', 'Sonny', 'Xperia', 'Dourado', 'ST-65', 1000, 100, 'OrÃ§amental', 200, 3, '2019-01-08', 'Bom', 'Sim'),
(NULL, 7, 'ReversÃ£o(Direito de)', 'Aluguer', 'FTTP', '2019-02-04', 'USA', 'Apple', 'xs', 'Golden', 'App-32', 1000, 100, 'OrÃ§amental', 50, 10, '2019-02-05', 'Bom', 'Sim'),
(NULL, 8, 'RequisiÃ§Ã£o', 'Aluguer', 'TV MarÃ§al', '1980-01-15', 'MarÃ§al', 'Sonny', 'NÃ£o sei', 'Castanho', 'S654', 2000, 12000, 'OrÃ§amental', 2300, 5, '2019-03-17', 'Bom', 'Sim'),
(NULL, 9, 'RequisiÃ§Ã£o', 'Aluguer', '', '0000-00-00', '', '', '', '', '', 0, 0, 'OrÃ§amental', 0, 0, '0000-00-00', 'Bom', ''),
(NULL, 10, 'RequisiÃ§Ã£o', 'Aluguer', '', '0000-00-00', '', '', '', '', '', 0, 0, 'OrÃ§amental', 0, 0, '0000-00-00', 'Bom', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pais` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `id_imovel` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `pais`, `provincia`, `cidade`, `municipio`, `bairro`, `rua`, `id_imovel`) VALUES
(18, 'Portugal', 'Lisboa', 'Lisboa', 'Rio', 'Jamaica', 'Alverga', 27),
(16, 'Argentina', 'Laguara', 'Nicara', 'Mira', 'Nina', 'Pitra', 25),
(17, 'Brasil', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Baia', 'Nicaraguas', 'Jacarezinho', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguro_imovel`
--

CREATE TABLE IF NOT EXISTS `seguro_imovel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `apolice_num` varchar(20) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `riscos_cobertos` varchar(60) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `seguradora` varchar(30) DEFAULT NULL,
  `id_imovel` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `seguro_imovel`
--

INSERT INTO `seguro_imovel` (`id`, `apolice_num`, `data`, `riscos_cobertos`, `valor`, `seguradora`, `id_imovel`) VALUES
(5, 'MN-54-21', '2019-01-15', 'Danos PrÃ³prios', 23000, 'Global', 25),
(6, 'NM-54-80', '2019-02-05', 'Danos PrÃ³prios', 300000, 'Banco Sol', 26),
(7, 'NM-54-81', '2019-02-11', 'Danos PrÃ³prios', 32000, 'BIC', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguro_movel`
--

CREATE TABLE IF NOT EXISTS `seguro_movel` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `apolice_num` varchar(30) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `riscos_cobertos` varchar(60) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `seguradora` varchar(30) DEFAULT NULL,
  `id_movel` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `seguro_movel`
--

INSERT INTO `seguro_movel` (`id`, `apolice_num`, `data`, `riscos_cobertos`, `valor`, `seguradora`, `id_movel`) VALUES
(1, 'MN-54-21', '2019-01-07', 'Danos PrÃ³prios', 23000, 'ENSA', 5),
(2, 'Ts-44-23', '2019-02-04', 'Roubo', 23000, 'Banco Sol', 6),
(3, 'APP-54-21', '2019-02-06', 'Roubo', 100, 'OXF', 7),
(4, 'MN-54-23', '2019-03-23', 'Danos causados a terceiros', 22000, 'Global', 8),
(5, '', '0000-00-00', 'Danos causados a terceiros', 0, '', 9),
(6, '', '0000-00-00', 'Danos causados a terceiros', 0, '', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguro_veiculo`
--

CREATE TABLE IF NOT EXISTS `seguro_veiculo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `apolice_num` varchar(20) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `riscos_cobertos` varchar(60) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `seguradora` varchar(30) DEFAULT NULL,
  `id_veiculo` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `seguro_veiculo`
--

INSERT INTO `seguro_veiculo` (`id`, `apolice_num`, `data`, `riscos_cobertos`, `valor`, `seguradora`, `id_veiculo`) VALUES
(6, 'MN-54-21', '2019-01-08', 'Danos PrÃ³prios', 300000, 'Global', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_aquisicao`
--

CREATE TABLE IF NOT EXISTS `tipo_aquisicao` (
  `idtipo_aquisicao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_aquisicao` varchar(30) DEFAULT NULL,
  `codigo` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`idtipo_aquisicao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE IF NOT EXISTS `utilizador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prinome` varchar(20) NOT NULL,
  `ultnome` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `repetsenha` varchar(30) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `prinome`, `ultnome`, `email`, `senha`, `repetsenha`, `categoria`) VALUES
(29, 'Paulo', 'Antonio', 'paulo@uan.com', 'MTIzNDU2', 'MTIzNDU2', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `codigo` int(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(30) DEFAULT NULL,
  `tipo_aquisicao` varchar(30) DEFAULT NULL,
  `entidade_fornecedora` varchar(60) DEFAULT NULL,
  `data_operacao` date DEFAULT NULL,
  `localizacao` varchar(60) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(60) DEFAULT NULL,
  `combustivel` varchar(20) DEFAULT NULL,
  `cilindrada` varchar(20) DEFAULT NULL,
  `cilindro_num` varchar(20) DEFAULT NULL,
  `motor_num` varchar(20) DEFAULT NULL,
  `chassis_num` varchar(20) DEFAULT NULL,
  `quadro` varchar(20) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `porta_num` int(3) DEFAULT NULL,
  `capacidade` varchar(5) DEFAULT NULL,
  `lotacao` int(5) DEFAULT NULL,
  `caixa` varchar(30) DEFAULT NULL,
  `entidade_proprietaria` varchar(60) DEFAULT NULL,
  `periodo_afetacao` int(5) DEFAULT NULL,
  `conservatoria` varchar(15) DEFAULT NULL,
  `livro` varchar(10) DEFAULT NULL,
  `ano_fabrico` int(5) DEFAULT NULL,
  `conservacao` varchar(20) DEFAULT NULL,
  `operacionalidade` varchar(20) DEFAULT NULL,
  `control` date DEFAULT NULL,
  `custo_aquisicao` double DEFAULT NULL,
  `despesa_compra` double DEFAULT NULL,
  `class_despesa` varchar(20) DEFAULT NULL,
  `valor_mensal` double DEFAULT NULL,
  `vida_util` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`codigo`, `id`, `designacao`, `tipo_aquisicao`, `entidade_fornecedora`, `data_operacao`, `localizacao`, `matricula`, `marca`, `modelo`, `combustivel`, `cilindrada`, `cilindro_num`, `motor_num`, `chassis_num`, `quadro`, `cor`, `porta_num`, `capacidade`, `lotacao`, `caixa`, `entidade_proprietaria`, `periodo_afetacao`, `conservatoria`, `livro`, `ano_fabrico`, `conservacao`, `operacionalidade`, `control`, `custo_aquisicao`, `despesa_compra`, `class_despesa`, `valor_mensal`, `vida_util`) VALUES
(1, 14, 'Legado', 'DoaÃ§Ã£o', 'Osvaldo VirgÃ­lio', '2019-01-08', 'Brigada', 'LD-49-43-IO', 'Hundai', 'Elantra', 'Gasolina', '12v', 'C12', 'MN-NA998', 'CH1233', 'Q7654', 'Preto', 5, '10', 5, 'automatica', 'UAN', 4, '2Âª', 'P766', 2016, 'Bom', 'Sim', '2019-01-01', 10000, 1000, '', 200, 10);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bem`
--
ALTER TABLE `bem`
  ADD CONSTRAINT `fk_bem_tipo_aquisicao` FOREIGN KEY (`tipo_aquisicao_idtipo_aquisicao`) REFERENCES `tipo_aquisicao` (`idtipo_aquisicao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
