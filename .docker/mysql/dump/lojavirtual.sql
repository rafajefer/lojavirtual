-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 10/02/2025 às 14:23
-- Versão do servidor: 5.7.44
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lojavirtual`
--
CREATE DATABASE IF NOT EXISTS `lojavirtual` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lojavirtual`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `posicao` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `carousel`
--

INSERT INTO `carousel` (`id`, `nome`, `posicao`, `active`) VALUES
(1, 'Carousel home principal', 'principal', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carousel_itens`
--

CREATE TABLE IF NOT EXISTS `carousel_itens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_id` int(11) NOT NULL,
  `ordem` int(2) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `titulo` varchar(100) DEFAULT NULL,
  `texto` varchar(200) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carousel_id` (`carousel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `carousel_itens`
--

INSERT INTO `carousel_itens` (`id`, `carousel_id`, `ordem`, `active`, `titulo`, `texto`, `imagem`, `url`) VALUES
(1, 1, 1, 1, '', '', 'assets/imagens/banner/01.png', ''),
(2, 1, 2, 1, '', '', 'assets/imagens/banner/02.png', ''),
(3, 1, 3, 1, 'Notebook Toshiba Satellite 145', '', 'assets/imagens/banner/03.png', 'produto/notebook-toshiba-satellite-145'),
(4, 1, 4, 1, '', '', 'assets/imagens/banner/04.png', ''),
(5, 1, 5, 0, '', '', 'assets/imagens/banner/05.png', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `qtde` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_nome_uk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `active`, `status`, `slug`) VALUES
(3, 'Smartphone', 1, 1, 'smartphone'),
(18, 'TV e Eletrônicos', 1, 1, 'tv-e-eletronicos'),
(19, 'Games', 1, 1, 'games'),
(22, 'Brinquedos', 1, 1, 'brinquedos'),
(28, 'Informática', 1, 1, 'informatica'),
(29, 'Periféricos', 1, 1, 'perifericos'),
(31, 'Hardware', 1, 1, 'hardware'),
(58, 'Smartphone', 1, 1, 'smartphone'),
(60, 'Celulares e Telefones', 1, 1, 'celulares-e-telefones'),
(65, 'Teste', 0, 1, 'teste'),
(66, 'Teste 2', 1, 1, 'teste-2'),
(70, 'Rafael Jeferson 2', 1, 1, 'rafael-jeferson-2'),
(73, 'Rafael Jeferson 4', 1, 1, 'rafael-jeferson-4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracao`
--

CREATE TABLE IF NOT EXISTS `configuracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cnpj` varchar(16) NOT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `youtube` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `configuracao`
--

INSERT INTO `configuracao` (`id`, `empresa`, `telefone`, `celular`, `email`, `cnpj`, `logo`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'Loja Virtual 2.0', '11 2000-2000', '11 92000-2000', 'comercial@lojavirtual.com.br\r\n', '0001.110.0002/00', 'assets/imagens/logo-topo.png', NULL, NULL, NULL, NULL, '2019-06-28 11:28:53', '2019-06-28 11:51:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` char(9) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fabricante`
--

CREATE TABLE IF NOT EXISTS `fabricante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `fabricante`
--

INSERT INTO `fabricante` (`id`, `nome`, `telefone`, `email`, `status`) VALUES
(1, 'Samsung', '', '', 0),
(2, 'Lenovo', '', '', 0),
(3, 'Motorola', '', '', 0),
(4, 'Oakley', '(11) 9705-39847', 'oakley@gmail.com', 0),
(6, 'Asus', '(12) 34654-8979', 'asus@gmail.com', 0),
(7, 'Adidas', '(33) 4124-32142', 'adidas@gmail.com', 1),
(8, 'Nokia', '(43) 1412-43214', 'nokia@gmail.com', 0),
(9, 'Semp Toshiba', '(43) 1243-2414', 'semptoshiba@gmail.com', 0),
(10, 'Positivo', '(11) 11111-1111', 'positivo@gmail.com', 1),
(11, 'Dell', '', 'dell@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `subcategoria_id` int(11) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco_alto` decimal(10,2) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descricao` text,
  `detalhes` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `thumbnail` varchar(255) DEFAULT NULL,
  `destaque` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`),
  KEY `fabricante_id` (`fabricante_id`),
  KEY `subcategoria_id` (`subcategoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `categoria_id`, `subcategoria_id`, `fabricante_id`, `nome`, `preco_alto`, `preco`, `descricao`, `detalhes`, `active`, `status`, `thumbnail`, `destaque`, `slug`, `created_at`, `updated_at`) VALUES
(1, 28, 77, 1, 'Notebook Samsung Core i3-7020U 4GB 1TB Tela Full HD 15.6” Windows 10 Essentials E30 NP350XAA-KF2BR', 2100.00, 1900.00, 'CARACTERÍSTICAS\r\nTipo Notebook\r\nProcessador Intel® Core™ i3-7020U Dual Core 2.3 GHz\r\nSistema operacional Windows 10 Home\r\nUnidade óptica Não possui\r\nLeitor de cartão Não\r\nLeitor biométrico Não\r\nTamanho da tela 15.6\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\r\nWebcam integrada Sim\r\nResolução da webcam VGA\r\nCaracterísticas Gerais\r\n- Tela LED Full HD antirreflexiva, com resolução de 1920 x 1080 \r\n- Conector combo para fone de ouvido / microfone \r\n- Efeitos de Áudio: SoundAlive™ \r\n- Alto-falantes: 3W Estéreo (1.5W x 2) \r\n- Microfone integrado \r\n- Bluetooth 4.1\r\nCache 3 MB L3\r\nSintonizador de TV não\r\nChipset Integrado (Intel)\r\nTipo de tela LCD LED\r\nCor Branco\r\nESPECIFICAÇÕES TÉCNICAS\r\nConexão s/ fio (wireless) 802.11ac\r\nConexão Bluetooth Sim\r\nMemória RAM 4 GB DDR4 2133 MHz\r\nDisco rígido (HD) 1 TB 5400 RPM\r\nPortas USB 2 (3.0), 1 (2.0)\r\nTensão/Voltagem Bivolt\r\nGarantia 12 meses\r\nConteúdo da Embalagem - Notebook \r\n- Fonte Adaptadora \r\n- Guias de Usuário \r\n- Certificado de Garantia\r\nConexão HDMI sim\r\nRede 10/100\r\nSoftwares inclusos - Samsung Settings \r\n- Samsung Update \r\n- Samsung Recovery\r\nBateria 3 células 43 Wh\r\nOutras conexões RJ45\r\nPlaca de vídeo Integrada, com tecnologia Intel® HD Graphics 620\r\nPlaca de som Integrada, com HD (High Definition) Audio\r\nTeclado Português-BR, com teclado numérico integrado\r\nMouse Touchpad, com suporte à função multitoques\r\nTipo de memória DDR4\r\nSlot de expansão 1 slot (ocupado)\r\nDIMENSÕES\r\nNotebook Samsung Core i3-7020U 4GB 1TB Tela Full HD 15.6” Windows 10 Essentials E30 NP350XAA-KF2BRAltura1,99 CentimetrosLargura37,70 CentimetrosProfundidade24,90 CentimetrosPeso1,95 Quilos\r\nCONTATO SAMSUNG\r\nE-mail/Site:4004-0000 - capitais e grandes centros, 0800-124-421 demais cidades e regiões\r\n', NULL, 1, 1, 'assets/imagens/produtos/04f6aa6e80264256fd30fa603888505e.jpg', 1, 'notebook-samsung-core-i3-7020u-4gb-1tb-tela-full-hd-15-6”-windows-10-essentials-e30-np350xaa-kf2br', '2019-05-31 21:31:37', '2019-06-27 22:57:48'),
(3, 19, 17, 7, 'Console PlayStation 4 1TB Bundle + Game Fifa 19 - Sony', 2850.00, 2600.00, 'fadsf', NULL, 1, 1, 'assets/imagens/produtos/54cfc4d235d0f34c8492f917435065d9.jpg', 1, 'console-playstation-4-1tb-bundle-game-fifa-19-sony', '2019-06-03 16:12:34', '2019-06-27 22:35:58'),
(5, 19, 20, 1, 'Console XBOX One S 1TB Branco - Microsoft', 2000.00, 1680.00, 'te8', NULL, 1, 1, 'assets/imagens/produtos/4830f8f8a939c3e0cfbf7d596b08d2ce.png', 1, 'console-xbox-one-s-1tb-branco-microsoft', '2019-06-03 16:18:46', '2019-06-27 22:16:15'),
(6, 60, 85, 3, 'Smartphone Motorola Moto G7 Play 32GB Dual Chip Android Pie - 9.0 Tela 5.7', 900.00, 700.00, 'Código	134186808\r\nCódigo de barras	7892597348107\r\nMarca	Motorola\r\nModelo	XT1952-2\r\nCor	Azul Escuro\r\nTipo de Chip	Nano Chip\r\nQuantidade de Chips	Dual Chip\r\nMemória Interna	32GB\r\nMemória RAM	2GB\r\nProcessador	1.8 GHz Octa-Core Qualcomm Snapdragon 632 (SDM632)\r\nSistema Operacional	Android\r\nVersão	Android Pie - 9.0\r\nTipo de tela	LCD IPS\r\nTamanho do Display	5.7\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"\r\nResolução	HD+ - 720 x 1440 (720 x 1512 incluindo o notch)\r\nCâmera traseira	13MP\r\nCâmera frontal	8MP\r\nFilmadora	4K\r\nExpansivo até	MicroSD até 256GB\r\nAlimentação/Tipo de bateria	3000 mAh\r\nBanda	2G - GSM 850/900/1800/1900 MHz; 3G - WCDMA 850/900/1700/1900/2100 MHz; 4G - LTE B1(2100), B2(1900), B3(1800), B4(1700/2100), B5(850), B7(2600), B28(700), B66 (AWS3+4)\r\nConectividade	Wi-Fi, 3G, 4G\r\nNFC	Não\r\nTV	Não possui\r\nRecursos de Chamada	Chamada por Voz\r\nConteúdo da Embalagem	1 Telefone indigo, 1 kit de manuais, 1 cabo de sincronização, 1 fone de ouvido estereo, 1 carregador de parede e 1 ferramenta de remoção do chip\r\nDimensões aproximadas do produto - cm (AxLxP)	14,7x7,1x0,7cm\r\nPeso líq. aproximado do produto (kg)	149g\r\nGarantia do Fornecedor	12 Meses\r\nReferência do modelo	XT1952-2\r\nFornecedor	Flexitronics Internacional Tecnologia LTDA\r\nSAC	4002-1244 Capitais e Regiões Metropolitanas ou 0800 773-1244 - Demais Regiões', NULL, 1, 1, 'assets/imagens/produtos/90f810679425169e03db95bcda93e03e.jpg', 1, 'smartphone-motorola-moto-g7-play-32gb-dual-chip-android-pie-9-0-tela-5-7', '2019-06-05 19:32:53', '2019-06-29 13:51:28'),
(7, 28, 77, 10, 'Notebook Positivo Motion Q232A Intel Atom Quad Core 2GB 32GB SSD Tela LCD 14', 998.70, 929.70, 'notebook............', NULL, 1, 1, 'assets/imagens/produtos/720866fd72818d45dfde4b6965644711.jpg', 1, 'notebook-positivo-motion-q232a-intel-atom-quad-core-2gb-32gb-ssd-tela-lcd-14', '2019-06-05 23:31:58', '2019-06-28 13:52:29'),
(8, 28, 50, 10, 'Computador Positivo Dual Core 4GB 500GB Tela 19.5” Windows 10 Stilo C4500B-19', 1499.00, 1399.00, 'O computador Positivo Stilo C4500B-19 reúne tecnologia e praticidade para toda a família. Desenvolvido com os mais recentes recursos, o Positivo Stilo é perfeito para trabalhar, estudar e se divertir.\r\n\r\nCom um design moderno, compacto e discreto, este computador desktop oferece bom desempenho em atividades de rotina como navegar na internet, ver fotos e vídeos, além de permitir escutar suas músicas favoritas.\r\n\r\nO Positivo Stilo vem equipado com processador Dual Core, 4GB de RAM e 500GB de HD para você armazenar os seus principais arquivos. Além, disso vem com monitor de alta definição para ampliar a sua experiência visual.\r\n\r\nExplore as vantagens que o computador Positivo pode oferecer e simplifique a sua rotina com um equipamento de excelente custo-benefício. A Positivo é referência em computadores e acredita que a tecnologia faz parte da vida de todos nós.', NULL, 1, 1, 'assets/imagens/produtos/acf99d7864982867d15fe4649fe67318.jpg', 1, 'computador-positivo-dual-core-4gb-500gb-tela-19-5”-windows-10-stilo-c4500b-19', '2019-06-05 23:31:58', '2019-06-28 14:07:44'),
(9, 28, 77, 11, 'Notebook Dell 14-3468 Intel Core i3 6006U 14', 2299.00, 2099.00, 'fdsa', NULL, 1, 1, 'assets/imagens/produtos/c86e9a23b2dd449da85cdbb8ec99054f.jpg', 1, 'notebook-dell-14-3468-intel-core-i3-6006u-14', '2019-06-11 21:39:32', '2019-06-27 23:52:33'),
(10, 28, 77, 9, 'Notebook Toshiba Satellite 145', 1500.00, 1300.00, 'Processador: AMD E-Series E1-2100, Intel Celeron 1005M, Intel Core i5 4200M\r\nAdaptador Gráfico: AMD Radeon HD 8210, Intel HD Graphics (Ivy Bridge), Intel HD Graphics 4600\r\nEcrã: 15.6 polegadas\r\nPeso: 2.3kg\r\nPreço: 300, 400 euro', NULL, 1, 1, 'assets/imagens/produtos/12d3d20b172a8ebc4bfe14ee432942c9.jpg', 0, 'notebook-toshiba-satellite-145', '2019-06-28 13:41:18', '2019-06-28 13:41:45'),
(11, 28, 33, 10, 'Monitor IPS 29  LG Full HD 29UM69G', 1899.00, 1299.00, 'Monitor Gamer Full HD LG LED Widescreen IPS 29” - UltraWide Pro Gamer\r\nO monitor gamer UltraWide Pro Gamer LCD LED IPS Full HD da LG não vai te deixar na mão na hora de enfrentar os games mais cascudos. São 29 polegadas e ele te oferece 30% mais tela widescreen para uma incrível imersão visual, dando a vantagem que você precisa para ganhar de seus adversários. O recurso 1ms Motion Blur Reduction permite que você tenha movimentos instantâneos e com a maior precisão através do tempo de resposta de 1ms. Sem falar no AMD FreeSync™, que elimina falhas de imagem que surgem da diferença entre a taxa de quadro da placa de vídeo e a taxa de atualização do monitor.Jogar games escuros já não é mais um problema! O Black Stabilizer ajusta o brilho automaticamente e dá aos jogadores visibilidade total. Agora os campers não vão te pegar de surpresa!Ele não para por aí. O Dynamic Action Sync garante um processamento mais rápido, para acompanhar a velocidade das suas habilidades.E tudo isso é completo com o Game Mode, que oferece um ambiente de jogos personalizado. É ou não é um monitor perfeito!', NULL, 1, 1, 'assets/imagens/produtos/2b3c7392532b192b5e05ba7ad719f93e.jpg', 0, 'monitor-ips-29-lg-full-hd-29um69g', '2019-06-28 16:38:24', '2019-06-28 16:38:43'),
(12, 60, 89, 3, 'Radio Comunicador Talkabout 25KM T100BR AZUL Motorola', 219.99, 187.06, 'Mantendo a Família Sempre Unida! \r\n\r\nSimples, compacto e fácil de usar por toda a família, o T100BR é a maneira perfeita de estar em contato quando estiverem fora de casa, seja em um local de recreação, numa caminhada no parque ou desfrutando de um piquenique. \r\n\r\nEste colorido rádio bidirecional possui um alcance de até 25km e tem 26 canais, oferecendo exatamente o que você precisa para alcançar instantaneamente sua família e amigos e saber que estão seguros. \r\n\r\nA que distância meus rádios se comunicam? O alcance de comunicação é calculado com base em um teste de linha de visão sem obstrução sob condições ideais. O alcance real irá variar dependendo do terreno e condições e geralmente é menor do que o máximo possível. Seu alcance real será limitado por diversos fatores, incluindo: Terreno, condições climáticas, obstruções e interferência eletromagnética. \r\n\r\nPrincipais Características: \r\n- 26 Canais \r\n- Compatível com qualquer rádio de FRS/GMRS \r\n- Eco Smart: Modo de economia de bateria \r\n- Alerta visual de bateria fraca \r\n- Tom de teclado \r\n- Tom de confirmação de conversação \r\n- Supressor de ruído automático \r\n- Temporizador \r\n- Bloqueio de teclado \r\n\r\n*Fique atento! Somente os modelos de rádio Talkabout com sigla BR (T100BR, T200BR, T400BR e MD200BR) possuem homologação ANATEL e garantia de 12 meses pela Motorola Brasil.\r\nCód.Fabricante:62144339514\r\n\r\nFrequência: 462~467MHz (UHF) Alcance: Até 25km (em Condições Ideais) Alimentação: Até 18h com 3x Pilhas Alcalinas AAA (Não Inclusas) Canais: 26 Canais Tom: 20 Tons de Chamada Dimensões: 4,85x13,26x2,79cm (LxAxP) Peso: 80g (Sem Pilhas) / 110g (Com Pilhas) Itens Inclusos: Par de Rádios T100BR, 2 Presilhas de Cinto e Guia do Usuário Embalagem: Caixa com 2 Rádios (1 Par)', NULL, 1, 1, 'assets/imagens/produtos/5018daed78cd7a147c173d7542efd370.jpg', 1, 'radio-comunicador-talkabout-25km-t100br-azul-motorola', '2019-06-28 18:15:19', '2019-06-28 18:15:51'),
(13, 22, 90, 7, 'Máscara Value Avengers B0440 - Hasbro - Homem Aranha', 22.00, 17.00, 'Vista-se do seu super-herói preferido com as máscaras Marvel! As máscaras com tiras elásticas permitem que você assuma a identidade de heróis como Hulk, Spider-Man e outros (vendidos separadamente). Quando você estiver vestindo-as todos saberão o herói que você é!\r\nFabricante: Hasbro\r\nTema/Personagem: Vingadores\r\nDimensões aprox. da embalagem (AxLxC) cm: 7x16x18 cm\r\nRecomendação por idade: A partir de 4 anos de idade\r\nSom/Luzes: Não\r\nMaterial/Composição: Plástico\r\nReferência do produto: B0440\r\nAviso: As cores podem variar entre as imagens mostradas acima e o produto. Imagens meramente ilustrativas.\r\nFornecedor: Hasbro\r\nConteúdo da embalagem: 01 máscara', NULL, 1, 1, 'assets/imagens/produtos/b1fce348524e8997967536e03b9c0af1.jpg', 0, 'mascara-value-avengers-b0440-hasbro-homem-aranha', '2019-06-28 18:25:49', '2019-06-28 18:27:11'),
(14, 22, 90, 7, 'Brinquedo Mascara Avengers Hasbro Ultron Era de Ultron B2600', 64.99, 58.00, 'Com esta máscara super-divertida, a criança vai se sentir como um Super-herói da Marvel! Fabricada em plástico e com elástico de ajuste. Produto mede aproximadamente 20x25cm.2', NULL, 1, 1, 'assets/imagens/produtos/832bfeb9354c657398cf706febb205de.jpg', 0, 'brinquedo-mascara-avengers-hasbro-ultron-era-de-ultron-b2600', '2019-06-28 18:29:03', '2025-02-10 14:09:40'),
(15, 22, 90, 7, 'Fantasia Ladybug Pop M - Sulamericana', 78.90, 65.00, 'Fantasia Ladybug Pop M - Sulamericana Com influências de animações japonesas, europeias e americanas, “Miraculous” conta a história de Marinette - uma menina sincera e entusiasmada que se transforma em Ladybug, uma heroína cheia de personalidade. Ao lado de Cat Noir, que é na verdade seu amigo e paixão secreta, Adrien, ela tem a difícil tarefa de salvar a cidade de Paris de um misterioso vilão.', NULL, 1, 1, 'assets/imagens/produtos/8d700605497d799b75c47ddb1713aebc.jpg', 1, 'fantasia-ladybug-pop-m-sulamericana', '2019-06-28 19:06:27', '2019-06-28 19:06:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_imagens`
--

CREATE TABLE IF NOT EXISTS `produto_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produto_imagens`
--

INSERT INTO `produto_imagens` (`id`, `produto_id`, `url`, `created_at`, `updated_at`) VALUES
(102, 5, 'assets/imagens/produtos/4830f8f8a939c3e0cfbf7d596b08d2ce.png', '2019-06-27 22:13:29', '2019-06-27 22:13:29'),
(103, 5, 'assets/imagens/produtos/082fa831bc44fc2525173e8034442376.png', '2019-06-27 22:13:31', '2019-06-27 22:13:31'),
(104, 5, 'assets/imagens/produtos/f3969fcc6865b1e3255c138061b0932c.jpg', '2019-06-27 22:13:31', '2019-06-27 22:13:31'),
(105, 5, 'assets/imagens/produtos/9dab8bda52044bb7fea4954c674a1939.jpg', '2019-06-27 22:13:31', '2019-06-27 22:13:31'),
(112, 3, 'assets/imagens/produtos/54cfc4d235d0f34c8492f917435065d9.jpg', '2019-06-27 22:35:58', '2019-06-27 22:35:58'),
(113, 7, 'assets/imagens/produtos/c22eab422c5cb08907404362f7423f71.png', '2019-06-27 22:37:38', '2019-06-27 22:37:38'),
(114, 7, 'assets/imagens/produtos/f109550a3d718243ccc76deaf2c9feb6.jpg', '2019-06-27 22:37:38', '2019-06-27 22:37:38'),
(115, 7, 'assets/imagens/produtos/720866fd72818d45dfde4b6965644711.jpg', '2019-06-27 22:37:38', '2019-06-27 22:37:38'),
(116, 6, 'assets/imagens/produtos/b47e80cb65c4ebae2343166c9cc092f8.jpg', '2019-06-27 22:41:42', '2019-06-27 22:41:42'),
(117, 6, 'assets/imagens/produtos/359102fd7da6e414b1442e4ec104a5aa.jpg', '2019-06-27 22:41:42', '2019-06-27 22:41:42'),
(118, 6, 'assets/imagens/produtos/e1d440cdc4e7929f66dffd9741098f37.jpg', '2019-06-27 22:41:42', '2019-06-27 22:41:42'),
(119, 6, 'assets/imagens/produtos/90f810679425169e03db95bcda93e03e.jpg', '2019-06-27 22:41:42', '2019-06-27 22:41:42'),
(120, 1, 'assets/imagens/produtos/5ba9ae518fcff0e32c7eb2d037856806.jpg', '2019-06-27 22:57:47', '2019-06-27 22:57:47'),
(121, 1, 'assets/imagens/produtos/000f8a6f46bae9b89f587f73b35e83dc.jpg', '2019-06-27 22:57:47', '2019-06-27 22:57:47'),
(122, 1, 'assets/imagens/produtos/1d6613226fd15c5d3e28068c87ba40ea.jpg', '2019-06-27 22:57:48', '2019-06-27 22:57:48'),
(123, 1, 'assets/imagens/produtos/04f6aa6e80264256fd30fa603888505e.jpg', '2019-06-27 22:57:48', '2019-06-27 22:57:48'),
(128, 9, 'assets/imagens/produtos/666b176897e5256243995142dd9c74cd.jpg', '2019-06-27 23:52:18', '2019-06-27 23:52:18'),
(129, 9, 'assets/imagens/produtos/89776dd5f5b25c904418baa2549d0268.jpg', '2019-06-27 23:52:19', '2019-06-27 23:52:19'),
(130, 9, 'assets/imagens/produtos/e03fe011718790b25524a2b41d233dfb.jpg', '2019-06-27 23:52:19', '2019-06-27 23:52:19'),
(131, 9, 'assets/imagens/produtos/c86e9a23b2dd449da85cdbb8ec99054f.jpg', '2019-06-27 23:52:19', '2019-06-27 23:52:19'),
(132, 10, 'assets/imagens/produtos/317010532d99e5894489f752b2ca02e3.jpg', '2019-06-28 13:41:45', '2019-06-28 13:41:45'),
(133, 10, 'assets/imagens/produtos/0277ccab789d57bd264fceff7e3e7a0d.jpg', '2019-06-28 13:41:45', '2019-06-28 13:41:45'),
(134, 10, 'assets/imagens/produtos/12d3d20b172a8ebc4bfe14ee432942c9.jpg', '2019-06-28 13:41:45', '2019-06-28 13:41:45'),
(135, 8, 'assets/imagens/produtos/347b558eb7b099ca44679fc7d3fc0e97.jpg', '2019-06-28 14:07:43', '2019-06-28 14:07:43'),
(136, 8, 'assets/imagens/produtos/acf99d7864982867d15fe4649fe67318.jpg', '2019-06-28 14:07:44', '2019-06-28 14:07:44'),
(137, 11, 'assets/imagens/produtos/d3414f2b5fbcc522b91abd92051353b0.jpg', '2019-06-28 16:38:42', '2019-06-28 16:38:42'),
(138, 11, 'assets/imagens/produtos/83580b4b759fe378f70bee2fb19e6584.jpg', '2019-06-28 16:38:43', '2019-06-28 16:38:43'),
(139, 11, 'assets/imagens/produtos/a8c584d9985017c0d0f3540de7ad2243.jpg', '2019-06-28 16:38:43', '2019-06-28 16:38:43'),
(140, 11, 'assets/imagens/produtos/2b3c7392532b192b5e05ba7ad719f93e.jpg', '2019-06-28 16:38:43', '2019-06-28 16:38:43'),
(141, 12, 'assets/imagens/produtos/1828fec710e6ce99cb30541088f15db5.jpg', '2019-06-28 18:15:50', '2019-06-28 18:15:50'),
(142, 12, 'assets/imagens/produtos/fdf359151a4c5dfc3e249b67230d6db6.jpg', '2019-06-28 18:15:50', '2019-06-28 18:15:50'),
(143, 12, 'assets/imagens/produtos/49cfb89fa05515fde94777d70eb16152.jpg', '2019-06-28 18:15:51', '2019-06-28 18:15:51'),
(144, 12, 'assets/imagens/produtos/5018daed78cd7a147c173d7542efd370.jpg', '2019-06-28 18:15:51', '2019-06-28 18:15:51'),
(145, 13, 'assets/imagens/produtos/d84d73806fc8c264785fe23feb94440c.jpg', '2019-06-28 18:27:11', '2019-06-28 18:27:11'),
(146, 13, 'assets/imagens/produtos/b1fce348524e8997967536e03b9c0af1.jpg', '2019-06-28 18:27:11', '2019-06-28 18:27:11'),
(147, 14, 'assets/imagens/produtos/832bfeb9354c657398cf706febb205de.jpg', '2019-06-28 18:29:19', '2019-06-28 18:29:19'),
(148, 15, 'assets/imagens/produtos/8d700605497d799b75c47ddb1713aebc.jpg', '2019-06-28 19:06:44', '2019-06-28 19:06:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `nome`, `active`, `status`, `slug`) VALUES
(17, 19, 'Playstation 4', 1, 1, 'playstation-4'),
(18, 19, 'Playstation 3', 1, 1, 'playstation-3'),
(19, 19, 'Playstation 2', 1, 1, 'playstation-2'),
(20, 19, 'Xbox One', 1, 1, 'xbox-one'),
(21, 19, 'Xbox 360', 1, 1, 'xbox-360'),
(22, 19, 'PSP', 1, 1, 'psp'),
(26, 22, 'Jardim', 1, 1, 'jardim'),
(27, 22, 'Equipamentos agrícolas', 1, 1, 'equipamentos-agricolas'),
(28, 18, 'DVD Player', 1, 1, 'dvd-player'),
(29, 22, 'Brinquedos para Bebê', 1, 1, 'brinquedos-para-bebe'),
(30, 3, 'Samsung', 1, 1, 'samsung'),
(31, 3, 'Motorola', 0, 1, 'motorola'),
(32, 3, 'LG', 1, 1, 'lg'),
(33, 28, 'Monitores', 1, 1, 'monitores'),
(34, 28, 'Kindle', 1, 1, 'kindle'),
(35, 28, 'Cartão de Memória', 1, 1, 'cartao-de-memoria'),
(36, 3, 'Quantum', 1, 1, 'quantum'),
(37, 3, 'Microsoft', 1, 1, 'microsoft'),
(38, 28, 'Impressora e Multifuncional', 1, 1, 'impressora-e-multifuncional'),
(39, 3, 'Multilaser', 1, 1, 'multilaser'),
(40, 3, 'Sony', 1, 1, 'sony'),
(41, 3, 'Positivo', 1, 1, 'positivo'),
(42, 3, 'Nokia', 1, 1, 'nokia'),
(43, 28, 'Componentes', 1, 1, 'componentes'),
(44, 3, 'Lenovo', 1, 1, 'lenovo'),
(45, 3, 'ZenFone', 1, 1, 'zenfone'),
(46, 28, 'Lenovo', 1, 1, 'lenovo'),
(47, 3, 'Samsung', 1, 1, 'samsung'),
(48, 28, 'Gradiente', 1, 1, 'gradiente'),
(49, 28, 'Positivo', 1, 1, 'positivo'),
(50, 28, 'PC / Computador', 1, 1, 'pc-computador'),
(51, 28, 'Acessórios de Informática', 1, 1, 'acessorios-de-informatica'),
(52, 28, 'Multilaser', 1, 1, 'multilaser'),
(53, 18, 'TV', 1, 1, 'tv'),
(54, 31, 'Placas de Som', 1, 1, 'placas-de-som'),
(55, 31, 'Processadores', 1, 1, 'processadores'),
(56, 31, 'Placas-mãe', 1, 1, 'placas-mae'),
(57, 31, 'Placa de vídeo (VGA)', 1, 1, 'placa-de-video-vga'),
(58, 31, 'Placas TV & Edição', 1, 1, 'placas-tv-edicao'),
(59, 31, 'Modem', 1, 1, 'modem'),
(60, 31, 'Memória RAM', 1, 1, 'memoria-ram'),
(61, 31, 'Fontes', 1, 1, 'fontes'),
(62, 18, 'Som e Audio', 1, 1, 'som-e-audio'),
(63, 31, 'Disco Rígido (HD)', 1, 1, 'disco-rigido-hd'),
(64, 18, 'GPS', 1, 1, 'gps'),
(66, 29, 'Gabinetes', 1, 1, 'gabinetes'),
(67, 29, 'Suprimentos', 1, 1, 'suprimentos'),
(68, 29, 'WebCam', 1, 1, 'webcam'),
(69, 29, 'Som & Acessórios', 1, 1, 'som-acessorios'),
(70, 29, 'Teclado & Mouse', 1, 1, 'teclado-mouse'),
(71, 29, 'Mesa Digitalizadora', 1, 1, 'mesa-digitalizadora'),
(77, 28, 'Notebook', 1, 1, 'notebook'),
(78, 28, 'Tablet', 1, 1, 'tablet'),
(79, 18, 'Filmadoras', 1, 1, 'filmadoras'),
(80, 19, 'Nintendo DSI', 1, 1, 'nintendo-dsi'),
(81, 19, 'Nintendo Wii', 1, 1, 'nintendo-wii'),
(82, 19, 'Geek', 1, 1, 'geek'),
(83, 19, 'Joystick', 1, 1, 'joystick'),
(85, 60, 'Smartphones', 1, 1, 'smartphones'),
(86, 18, 'Filmadora', 1, 1, 'filmadora'),
(87, 60, 'Samsung Galaxy S', 1, 1, 'samsung-galaxy-s'),
(88, 28, 'Pen drive', 1, 1, 'pen-drive'),
(89, 60, 'Walkie Talkie', 1, 1, 'walkie-talkie'),
(90, 22, ' Fantasias', 1, 1, 'fantasias');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carousel_itens`
--
ALTER TABLE `carousel_itens`
  ADD CONSTRAINT `carousel_itens_ibfk_1` FOREIGN KEY (`carousel_id`) REFERENCES `carousel` (`id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricante` (`id`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`);

--
-- Restrições para tabelas `produto_imagens`
--
ALTER TABLE `produto_imagens`
  ADD CONSTRAINT `produto_imagens_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
