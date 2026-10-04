-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06/01/2022 às 23:34
-- Versão do servidor: 10.3.32-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sysdae_novo`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `TotalAlunosPorAno` (IN `varAno` INT)  BEGIN
	SELECT COUNT(matricula.matricula) AS TotalAlunos
FROM        matricula
inner join  residencia         on residencia.aluno_id=matricula.aluno_id
inner join  regimes_residencia on  residencia.regime_residencia_id= regimes_residencia.id
where       matricula.ano=varAno ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alojamento`
--

CREATE TABLE `alojamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_alojamento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_aptos` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `alojamento`
--

INSERT INTO `alojamento` (`id`, `descricao_alojamento`, `nro_aptos`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Alojamento 1', 4, 7, '2021-10-24 16:22:12', '2022-01-06 13:58:49'),
(2, 'Alojamento 2', 4, 7, '2021-10-24 16:22:29', '2022-01-06 13:58:55'),
(3, 'Alojamento Feminino', 4, 7, '2022-01-04 18:54:03', '2022-01-06 13:59:01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_pai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_pai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_mae` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_mae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato_emergencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficio_id` bigint(20) UNSIGNED NOT NULL,
  `situacao_id` bigint(20) UNSIGNED NOT NULL,
  `observacoes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `cpf`, `nome`, `sexo_id`, `email`, `slug`, `telefone`, `nome_pai`, `telefone_pai`, `nome_mae`, `telefone_mae`, `contato_emergencia`, `municipio`, `beneficio_id`, `situacao_id`, `observacoes`, `created_at`, `updated_at`) VALUES
(1, '3997', 'Rafael Stella', 1, 'teste@teste.com', '3997', '33341277', 'Octacillio Stella', '2761334', 'Zeli Maria Stella', '2761334', 'teste', 'Protasio Alves', 1, 1, 'Teste2', '2007-09-22 02:49:00', '2022-01-06 00:27:41'),
(2, '4000', 'Rafael Donadelo ', 1, 'teste@teste.com', '4000', '33341278', 'Hermes Donadello ', '1', 'Rosimeri L. Donadello ', '2761311', 'teste', 'Protasio Alves', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(3, '4001', 'Wilson Jose Zdonek', 1, 'teste@teste.com', '4001', '33341279', 'Osmar Jose Zdoneck', '1', 'Ilda Elena Zdoneck ', '99790743', 'teste', 'Aurea ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(4, '4002', 'Renato Giareta ', 1, 'teste@teste.com', '4002', '33341280', 'Edegar Antonio Giaretta', '1', 'Leonira Giaretta', '3414703', 'teste', 'Getulio Vargas ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(5, '4004', 'Darlan Cecchin', 1, 'teste@teste.com', '4004', '33341281', 'DÃ©lcio Cecchin', '36172150', 'Ilene Cecchin', '1', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(6, '4005', 'Marcos Vinicius Lusa ', 1, 'teste@teste.com', '4005', '33341282', 'Arlindo Lusa ', '6171569', 'Ivanilse Della Vechia Lusa', '6171569', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(7, '4012', 'Giovane Regoso ', 1, 'teste@teste.com', '4012', '33341283', 'Pedro Regoso ', '1', 'Nelci Regoso ', '99821708', 'teste', 'Benjamin Constant do Sul ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(8, '4016', 'Clarice Elisabete Antunes ', 2, 'teste@teste.com', '4016', '33341284', 'Ronaldo Antunes ', '054-3641774', 'Eloisa Catarina Antunes ', '1', 'teste', 'Ronda Alta ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(9, '4017', 'Daiane de Oliveira', 2, 'teste@teste.com', '4017', '33341285', 'Domingos Ilton de Oliveira', '33451011', 'Sandra V. Emiliavaca de Oliveira', '33451011', 'teste', 'SertÃ£o', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(10, '4020', 'Gustavo Costela ', 1, 'teste@teste.com', '4020', '33341286', 'Moacir Costela ', '1', 'Augusta Arcari Costela', '6160029', 'teste', 'Vila Langaro ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(11, '4021', 'Gabriel GavelhÃ£o', 1, 'teste@teste.com', '4021', '33341287', 'Ernesto GavelhÃ£o ', '3372680', 'Adriana Fatima  T. GavelhÃ£o', '1', 'teste', 'EstaÃ§Ã£o', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(12, '4022', 'Roberto Vassoler', 1, 'teste@teste.com', '4022', '33341288', 'Jose Artur Vassoler ', '054-341-2727', 'Silvania Rossi ', '1', 'teste', 'Getulio Vargas ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(13, '4025', 'MIchel Marolli ', 1, 'teste@teste.com', '4025', '33341289', 'Pedro Marolli ', '91186463', 'Ivalda F. S. Marolli ', '1', 'teste', 'Serafina Correia ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(14, '4028', 'Adriano Momoli', 1, 'teste@teste.com', '4028', '33341290', 'Olivio Momoli ', '99565646', 'Jovilde F. Momoli', '1', 'teste', 'Ronda Alta', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(15, '4031', 'Lucas Basegio', 1, 'teste@teste.com', '4031', '33341291', 'Vandir Baseggio', '5433371397', 'Liane Maria Baseggio', '5433371397', 'teste', 'Estacao', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(16, '4036', 'Maikon Remis Tessaro', 1, 'teste@teste.com', '4036', '33341292', 'Marcos Roberto Tessaro', '99943308', 'Rosange Tessaro', '99943308', 'teste', 'Marau', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(17, '4038', 'Alaor Marcos Gusso ', 1, 'teste@teste.com', '4038', '33341293', 'Valdir Antonio Gusso', '1', 'Marli Mezalina Gusso ', '5311157', 'teste', 'Paim Filho ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(18, '4040', 'Cristian Jeferson Follmer', 1, 'teste@teste.com', '4040', '33341294', 'Volnei Follmer', '1', 'Roseli B. Follmer ', '91223831', 'teste', 'Victor Graeff', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(19, '4043', 'Tiago Pezzini ', 1, 'teste@teste.com', '4043', '33341295', 'Sergio Elias Pezzini', '1', 'Eni Bresolin Pezzini', '91245055', 'teste', 'Ipiranga do Sul ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(20, '4045', 'Jonas Antonio Casa', 1, 'teste@teste.com', '4045', '33341296', 'Dorvalino Casa', '3591620', 'Inelda Casa', '3591620', 'teste', 'Vila Maria', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(21, '4048', 'Gleisson Enio Mingotti', 1, 'teste@teste.com', '4048', '33341297', 'Valderlei A. Mingotti ', '3214433', 'Claudete C. Mingotti', '1', 'teste', 'Erechim ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(22, '4049', 'Vitor Baseggio', 1, 'teste@teste.com', '4049', '33341298', 'Roberto Baseggio', '1', 'Sandra Broch Baseggio', '1', 'teste', 'Sao JOse do Ouro', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(23, '4050', 'Jailton Daniel Trindade', 1, 'teste@teste.com', '4050', '33341299', 'Antonio Jair Trindade', '99699540', 'Gestrudes S. Trindade', '1', 'teste', 'Sertao', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(24, '4052', 'Junior Machnach', 1, 'teste@teste.com', '4052', '33341300', 'Luciano Machnach', '1', 'Elmi Machnach', '1', 'teste', 'Campina das Missoes ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(25, '4053', 'Ronaldo Seibert ', 1, 'teste@teste.com', '4053', '33341301', 'Romildo Seibert ', '1', 'Genoveva Jandira H. Seibert', '98055271', 'teste', 'Arroio do Tigre ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(26, '4054', 'Maiquel Junior Stein', 1, 'teste@teste.com', '4054', '33341302', 'Darci Stein', '99526655', 'Rejane Andersen Stein', '99526655', 'teste', 'Arroio do Tigre', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(27, '4055', 'Fabio Rossetto', 1, 'teste@teste.com', '4055', '33341303', 'Valdir Rossetto', '5411026', 'Dora Rossetto', '1', 'teste', 'Trindade do Sul', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(28, '4059', 'Vinicius Marcon ', 1, 'teste@teste.com', '4059', '33341304', 'Isaltino Marcon ', '91286371', 'Diva Marcon ', '1', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(29, '4060', 'Angelo Panisson', 1, 'teste@teste.com', '4060', '33341305', 'Luiz Heleno Panisson ', '3442870', 'Jucelene Panisson', '3442023', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(30, '4061', 'Alan Cristian de Quadros', 1, 'teste@teste.com', '4061', '33341306', 'Edenilson de Quadros', '-33451709', 'Edenilse de Quadros', '99864747', 'teste', 'Sertao', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(31, '4062', 'Diego Cristovan Wuttke', 1, 'teste@teste.com', '4062', '33341307', 'DionÃ­sio Wuttke', '91225710', 'Elaine K. Wuttke', '1', 'teste', 'Nova Boa Vista', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(32, '4064', 'Teilor Dalla Costa', 1, 'teste@teste.com', '4064', '33341308', 'Joares Dalla Costa ', '5680073', 'Jane Dalla Costa', '5680073', 'teste', 'Ponte Preta', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(33, '4066', 'Gabriel Bertol ', 1, 'teste@teste.com', '4066', '33341309', 'Ruy Carlos Bertol', '054-3821063', 'Lucia M. Bertol', '1', 'teste', 'Alto Alegre ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(34, '4068', 'Anderson Gatti', 1, 'teste@teste.com', '4068', '33341310', 'Olivio GAtti', '99817592', 'Claudete Maria Gatti', '1', 'teste', 'SertÃ£o', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(35, '4069', 'Jaivan Vanz', 1, 'teste@teste.com', '4069', '33341311', 'Ildelbandro Luiz Vanz', '91189941', 'Rejane Bortolin Vanz', '1', 'teste', 'Marau ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(36, '4071', 'Dimas Pagoto Maier', 1, 'teste@teste.com', '4071', '33341312', 'Jose A. Folle Maier', '99710152', 'Diva Pagot MAier', '99710152', 'teste', 'Coxilha ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(37, '4077', 'Paulo Alexandre Spagnollo', 1, 'teste@teste.com', '4077', '33341313', 'Osmar Lopes Spagnolo', '5435047044', 'Erilde Spagnolo', '5435047044', 'teste', 'Barros Cassal', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(38, '4078', 'Jorge Vinicius de Matos', 1, 'teste@teste.com', '4078', '33341314', 'Jose Claudio de Matos', '33451270', 'Carmem Maria de Matos', '33451270', 'teste', 'Sertao', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(39, '4079', 'Jeand Carlos Piva Tumelero', 1, 'teste@teste.com', '4079', '33341315', 'Antonio Romualdo Tumelero', '054-616-9218', 'Roseli D. Piva Tumelero ', '1', 'teste', 'Tupanci do Sul ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(40, '4080', 'Marcio Adauto Letsch', 1, 'teste@teste.com', '4080', '33341316', 'Daniel Teodoro Letsch ', '3961051', 'Zeli Maria Letch ', '1', 'teste', 'Santo Expedito do Sul ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(41, '4082', 'Guilherme Beseggio', 1, 'teste@teste.com', '4082', '33341317', 'Gilberto Baseggio ', '3441536', 'Maristela Tesser Baseggio', '1', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(42, '4084', 'Julio Cesar Orlandi', 1, 'teste@teste.com', '4084', '33341318', 'Cesar Jose Orlandi', '99731651', 'Eunice Macari', '99731651', 'teste', 'Vacaria', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(43, '4086', 'Gustavo Beledelli', 1, 'teste@teste.com', '4086', '33341319', 'Samir Antonio  Beledelli', '054-337-1160', 'Maria Elena M. Beledelli', '1', 'teste', 'Ipiranga do Sul ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(44, '4088', 'Aline Remus ', 1, 'teste@teste.com', '4088', '33341320', 'Valdir Remus ', '99732242', 'Ilda Remus ', '1', 'teste', 'Sao Valentim ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(45, '4089', 'Adriano Jung', 1, 'teste@teste.com', '4089', '33341321', 'Valdir Jung', '91346001', 'Albertina Jung', '1', 'teste', 'Getulio Vargas ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(46, '4091', 'Paulo Cesar Lopes ', 1, 'teste@teste.com', '4091', '33341322', 'Leonir Lopes ', '1', 'Elma Maria Lopes ', '3442974', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(47, '4093', 'Douglas Zeni ', 1, 'teste@teste.com', '4093', '33341323', 'Adir Antonio Zeni ', '1', 'Zilda MAria Zeni ', '054-345-1158', 'teste', 'Sertao', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(48, '4095', 'Eriques Panho ', 1, 'teste@teste.com', '4095', '33341324', 'Celso Panho ', '054-3482277', 'Marines S. Panho ', '1', 'teste', 'Tapejara', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(49, '4098', 'Ezequiel Guilherme Fioreze', 1, 'teste@teste.com', '4098', '33341325', 'Elido Fioreze', '99663604', 'Edite R. Fioreze', '1', 'teste', 'Colorado ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(50, '4100', 'Fabio Schebler ', 1, 'teste@teste.com', '4100', '33341326', 'Jose Paulo Schebler', '9962-4088', 'Jandira F. Scheibler ', '314-7371', 'teste', 'Passo Fundo ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(51, '4101', 'Evandro Schmatz', 1, 'teste@teste.com', '4101', '33341327', 'Ibanor Schmatz', '91228190', 'Iria Maria Schmatz', '1', 'teste', 'Alto Alegre ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(52, '4102', 'Joao Luis Girardi ', 1, 'teste@teste.com', '4102', '33341328', 'Milton Girardi ', '1', 'Rosmari Fontana ', '3741149', 'teste', 'IbiaÃ§a', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(53, '4103', 'Lucas Volnei Schneider', 1, 'teste@teste.com', '4103', '33341329', '', '5533721416', 'Lucinda Schneider', '5533721416', 'teste', 'Saldanha Marinho', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(54, '4104', 'Vinicius Ceron Vendruscolo', 1, 'teste@teste.com', '4104', '33341330', 'Nilo Vendruscolo', '545251289', 'Odete Rosmari F. C. VEndruscolo', '545251289', 'teste', 'Severiano de Almeida ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(55, '4105', 'Eduardo Costela', 1, 'teste@teste.com', '4105', '33341331', 'Claudio Costela', '5251088', 'Rosa Maria B. Costela', '1', 'teste', 'Severiano de Almeida ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(56, '4106', 'Lucas Colombelli ', 1, 'teste@teste.com', '4106', '33341332', 'Decio Antonio Colombelli ', '1', 'Lorena M. Colombelli ', '99538770', 'teste', 'Sao Jose do Ouro', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(57, '4113', 'Jonas Pancotte', 1, 'teste@teste.com', '4113', '33341333', 'Paulo Jose Pancotte', '516133121', 'Jacinta M. Pancotte', '1', 'teste', 'Itapuca', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(58, '4114', 'Everton Roveda ', 1, 'teste@teste.com', '4114', '33341334', 'Irineo Roveda', '99460000', 'Neiva B. Roveda ', '504-3550', 'teste', 'Colorado ', 1, 1, '-', '2007-09-22 02:49:00', '2007-09-22 02:49:00'),
(60, '58194614015', 'Cedemir Pereira', 1, 'cedemir@gmail.com', '', '33451277', 'Sebastiao Pereira', '33451277', 'Olivia Pereira', '33451277', '33451277', 'sertao-rs', 1, 1, 'Teste', NULL, '2022-01-06 13:45:52'),
(61, '58194614017', 'Cedemir Pereira2', 1, 'cedemir.pereira@sertao.ifrs.edu.br', '58194614017', '33451277', 'Sebastiao Pereira', '33451277', 'Olivia Pereira', '33451277', '33451277', 'sertao-rs', 1, 1, 'Teste', '2021-12-06 03:02:14', '2021-12-06 03:09:22'),
(62, '12356789', 'Maria Eduarda Rostirola', 2, 'maria.eduarda@gmail.com', '12356789', '33451277', 'Renildo Rostirola', '33451277', 'Marenilse Pereira', '33451277', '33451277', 'Estação', 1, 1, '-', '2021-12-07 00:40:47', '2021-12-07 00:40:47'),
(63, '123456', 'Diego Lusa', 1, 'diego.lusa@sertao.ifrs.edu.br', '123456', '3335-8000', 'Pai do Diego', '3345-8000', 'Mae do Diego', '3345-8000', '334580_000', 'Sertao-RS', 1, 1, '-', '2022-01-04 17:46:59', '2022-01-04 17:47:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `apartamento`
--

CREATE TABLE `apartamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_apartamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alojamento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `apartamento`
--

INSERT INTO `apartamento` (`id`, `descricao_apartamento`, `alojamento_id`, `created_at`, `updated_at`) VALUES
(1, '501', 1, '2021-10-24 16:23:05', '2021-10-24 16:23:05'),
(2, '502', 1, '2022-01-04 18:54:38', '2022-01-04 18:54:38'),
(3, '503', 1, '2022-01-04 18:54:50', '2022-01-04 18:54:50'),
(4, '504', 1, '2022-01-04 18:55:03', '2022-01-04 18:55:03'),
(5, '602', 2, '2022-01-06 13:55:37', '2022-01-06 13:55:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ata`
--

CREATE TABLE `ata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nro_ata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_ata` date NOT NULL,
  `descricao_ata` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `atendimento_id` bigint(20) UNSIGNED NOT NULL,
  `relato_atendimento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outras_observacoes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `historia_de_vida` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `encaminhamentos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `data`, `hora`, `aluno_id`, `user_id`, `atendimento_id`, `relato_atendimento`, `outras_observacoes`, `historia_de_vida`, `encaminhamentos`, `created_at`, `updated_at`) VALUES
(1, '2021-09-20', '17:38:00', 6, 6, 2, 'Aluno alega dificuldades ao estudar', '-', '-', 'Teste', '2021-10-22 02:25:17', '2022-01-06 13:04:21'),
(2, '2021-11-03', '11:00:00', 2, 6, 2, 'Teste de Atendimento', 'Teste de Atendimento', 'Teste de Atendimento', 'Teste de Atendimento', '2021-11-03 17:04:43', '2022-01-06 13:03:25'),
(3, '2022-01-04', '16:12:00', 3, 6, 2, 'Aluno foi pego bebendo no alojamento', '-', '-', '-', '2022-01-04 19:13:40', '2022-01-04 19:13:40'),
(4, '2022-01-06', '09:28:00', 60, 6, 2, 'O aluno Cedemir procurou a psicóloga alegando ter dificuldades de estudar...', '-', '-', '-', '2022-01-06 12:30:43', '2022-01-06 12:30:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_curso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `descricao_curso`, `created_at`, `updated_at`) VALUES
(1, 'Técnico em Agropecuária Integrado', '2021-10-17 00:55:11', '2021-11-28 19:46:13'),
(2, 'Manutencao e Suporte em Informatica Integrado', '2021-10-17 00:55:46', '2021-10-17 00:55:46'),
(3, 'Técnico em Agropecuária - Subsequente', '2021-10-17 00:56:14', '2021-10-17 00:56:14'),
(4, 'Manutencao e Suporte em Informatica Concomitante', '2021-10-17 00:56:38', '2021-10-17 00:56:38'),
(5, 'PROEJA', '2021-11-28 01:25:03', '2022-01-06 02:27:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_atendimento`
--

CREATE TABLE `forma_atendimento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `forma_atendimento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `forma_atendimento`
--

INSERT INTO `forma_atendimento` (`id`, `forma_atendimento`, `created_at`, `updated_at`) VALUES
(1, 'On Line', '2021-10-22 02:20:21', '2021-10-22 02:20:21'),
(2, 'Presencial', '2021-10-22 02:20:34', '2021-10-22 02:20:34'),
(3, 'Telefone', '2021-10-22 02:20:50', '2021-10-22 02:20:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto`
--

CREATE TABLE `foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricula` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `serie_id` bigint(20) UNSIGNED NOT NULL,
  `turma_id` bigint(20) UNSIGNED NOT NULL,
  `ano` int(11) NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `matricula`
--

INSERT INTO `matricula` (`id`, `matricula`, `aluno_id`, `serie_id`, `turma_id`, `ano`, `curso_id`, `created_at`, `updated_at`) VALUES
(2, 123456789, 62, 1, 1, 2021, 1, NULL, '2022-01-06 13:04:59'),
(3, 654321, 61, 1, 1, 2021, 2, NULL, NULL),
(4, 54321, 63, 5, 3, 2022, 5, '2022-01-04 19:28:36', '2022-01-04 19:28:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medidas_disciplinares`
--

CREATE TABLE `medidas_disciplinares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medida_disciplinar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_20_030106_create_alojamento_table', 1),
(5, '2021_08_20_030132_create_ata_table', 1),
(6, '2021_08_20_030147_create_curso_table', 1),
(7, '2021_08_20_030216_create_forma_atendimento_table', 1),
(8, '2021_08_20_030250_create_medidas_disciplinares_table', 1),
(9, '2021_08_20_030331_create_programa_beneficio_table', 1),
(10, '2021_08_20_030353_create_regimes_residencia_table', 1),
(11, '2021_08_20_030427_create_serie_table', 1),
(12, '2021_08_20_030444_create_situacao_aluno_table', 1),
(13, '2021_08_20_030502_create_turma_table', 1),
(14, '2021_08_21_015443_create_residencia_autorizacoes_table', 1),
(15, '2021_08_21_015518_create_perfil_table', 1),
(16, '2021_08_21_015537_create_aluno_table', 1),
(17, '2021_08_21_015538_create_foto_table', 1),
(18, '2021_08_21_015609_create_apartamento_table', 1),
(19, '2021_08_21_015628_create_matricula_table', 1),
(20, '2021_08_21_015720_create_residencia_table', 1),
(21, '2021_08_21_015733_create_atendimento_table', 1),
(22, '2021_08_21_015745_create_setor_table', 1),
(23, '2021_08_21_015746_create_ocorrencia_table', 1),
(24, '2021_08_21_015747_create_ocorrencias_atividades_orientadas_table', 1),
(25, '2021_08_21_015829_create_residencia_faltas_table', 1),
(26, '2021_10_03_114146_alter_aluno_table_add_foto_column', 2),
(27, '2021_10_21_182543_create_permission_tables', 3),
(28, '2021_10_21_182819_create_products_table', 4),
(29, '2021_10_26_020752_create_roles_table', 5),
(30, '2021_10_26_021146_create_resources_table', 5),
(31, '2021_10_26_022007_alter_users_table', 5),
(32, '2021_10_26_024555_create_resource_role_table', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `data_ocorrencia` date NOT NULL,
  `descricao_ocorrencia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_reuniao_conselho_disciplinar` date NOT NULL,
  `medidas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_horas_recebidas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ocorrencia`
--

INSERT INTO `ocorrencia` (`id`, `aluno_id`, `data_ocorrencia`, `descricao_ocorrencia`, `data_reuniao_conselho_disciplinar`, `medidas`, `total_horas_recebidas`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-10-21', 'Aluno foi encontrado no Apto fumando', '2021-08-10', 'Aluno foi suspenso por 10 dias', 12, '2021-10-22 02:17:04', '2021-10-22 02:17:04'),
(2, 2, '2022-01-05', 'embriagado', '2022-01-05', 'teste', 12, NULL, NULL),
(3, 5, '2022-01-05', 'Teste2', '2022-01-05', 'Aluno foi suspenso por 10 dias', 20, '2022-01-05 16:54:45', '2022-01-06 02:28:37'),
(4, 9, '2022-01-06', 'Aluna foi encontrada dormindo durante período de aula', '2022-01-06', 'Enquadrada no artigo XXX da residencia estudantil....', 10, '2022-01-06 14:33:44', '2022-01-06 14:37:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencias_atividades_orientadas`
--

CREATE TABLE `ocorrencias_atividades_orientadas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ocorrencia_id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `setor_id` bigint(20) UNSIGNED NOT NULL,
  `descricao_atividade` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `nro_horas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ocorrencias_atividades_orientadas`
--

INSERT INTO `ocorrencias_atividades_orientadas` (`id`, `ocorrencia_id`, `aluno_id`, `user_id`, `setor_id`, `descricao_atividade`, `data`, `nro_horas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '', '2021-11-03', 10, '2021-11-03 17:12:30', '2021-11-03 17:21:19'),
(2, 1, 1, 1, 2, '', '2021-11-03', 10, '2021-11-03 17:21:42', '2021-11-03 19:43:22'),
(3, 1, 1, 1, 3, '', '2021-11-03', 10, '2021-11-03 19:19:06', '2021-11-03 19:43:46'),
(4, 1, 1, 1, 4, '', '2021-03-11', 8, '2021-11-03 20:04:25', '2021-11-04 05:34:27'),
(5, 3, 63, 3, 2, 'Plantio e manutenção de mudaxxx', '2022-06-01', 10, '2022-01-06 19:09:39', '2022-01-06 20:57:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sobre` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redes_sociais` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `programa_beneficio`
--

CREATE TABLE `programa_beneficio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_beneficio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `programa_beneficio`
--

INSERT INTO `programa_beneficio` (`id`, `descricao_beneficio`, `created_at`, `updated_at`) VALUES
(1, 'Não recebe', NULL, NULL),
(2, 'Auxílio Moradia', NULL, NULL),
(3, 'Auxílio Permanência', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `regimes_residencia`
--

CREATE TABLE `regimes_residencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_regime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `regimes_residencia`
--

INSERT INTO `regimes_residencia` (`id`, `descricao_regime`, `created_at`, `updated_at`) VALUES
(1, 'Semirresidente', '2021-11-07 04:56:28', '2021-11-07 04:56:28'),
(2, 'Residente', '2021-11-07 04:56:39', '2021-11-07 04:56:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `residencia`
--

CREATE TABLE `residencia` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `regime_residencia_id` bigint(20) UNSIGNED NOT NULL,
  `apto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apto_antigo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apto_novo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_troca` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `residencia`
--

INSERT INTO `residencia` (`id`, `aluno_id`, `data_entrada`, `data_saida`, `regime_residencia_id`, `apto`, `apto_antigo`, `apto_novo`, `data_troca`, `created_at`, `updated_at`) VALUES
(5, 60, '2021-12-06', NULL, 1, '501', NULL, NULL, NULL, NULL, NULL),
(6, 61, '2021-12-06', NULL, 2, '501', NULL, NULL, NULL, NULL, NULL),
(7, 62, '2021-12-07', NULL, 2, '601', NULL, NULL, NULL, '2021-12-07 03:09:39', '2021-12-07 03:09:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `residencia_autorizacoes`
--

CREATE TABLE `residencia_autorizacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(11) UNSIGNED NOT NULL,
  `autorizacao_parcial` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `justificativa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_autorizacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quem_autorizou` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `residencia_faltas`
--

CREATE TABLE `residencia_faltas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `data_falta` date NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `residencia_faltas`
--

INSERT INTO `residencia_faltas` (`id`, `aluno_id`, `data_falta`, `motivo`, `created_at`, `updated_at`) VALUES
(3, 6, '2022-01-06', 'Aluno passou mal e pediu para ir embora', '2022-01-07 00:55:48', '2022-01-07 00:55:48');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `residentes`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `residentes` (
`TotalResidentes` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resource` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `resources`
--

INSERT INTO `resources` (`id`, `name`, `resource`, `is_menu`, `created_at`, `updated_at`) VALUES
(1, 'Listar Alunos', 'admin.alunos.index', 1, '2021-10-26 12:50:01', '2021-10-29 21:52:33'),
(2, 'Criar Alunos', 'admin.alunos.create', 1, '2021-10-28 20:45:02', '2021-10-29 22:14:41'),
(3, 'Editar Alunos', 'admin.alunos.edit', 1, '2021-10-31 18:55:08', '2021-11-02 05:11:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resource_role`
--

CREATE TABLE `resource_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `resource_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `resource_role`
--

INSERT INTO `resource_role` (`role_id`, `resource_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(2, 2),
(1, 3),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'USER', 'ROLE_USER', '2021-10-26 12:39:15', '2021-10-26 12:39:15'),
(2, 'User', 'ROLE_USER', '2021-10-28 20:27:13', '2021-10-28 20:27:13'),
(3, 'Administrador', 'ROLE_ADMIN', '2021-11-02 01:05:07', '2021-11-02 01:05:07');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `semirresidentes`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `semirresidentes` (
`TotalSemiResidentes` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `semirresidentes5`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `semirresidentes5` (
`sexo` varchar(60)
,`email` varchar(255)
,`nome` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `semirresidentes8`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `semirresidentes8` (
`id` bigint(20) unsigned
,`sexo_id` bigint(20) unsigned
,`email` varchar(255)
,`nome` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `semirresidentes9`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `semirresidentes9` (
`sexo_id` bigint(20) unsigned
,`email` varchar(255)
,`nome` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `semirresidentes_sexo`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `semirresidentes_sexo` (
`sexo` varchar(60)
,`email` varchar(255)
,`nome` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `serie`
--

CREATE TABLE `serie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `serie`
--

INSERT INTO `serie` (`id`, `descricao_serie`, `created_at`, `updated_at`) VALUES
(1, '1º Ano', NULL, NULL),
(2, '2º Ano', NULL, NULL),
(3, '3º Ano', NULL, NULL),
(5, 'Teste', '2021-11-27 01:04:48', '2021-11-28 19:54:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`id`, `setor`, `created_at`, `updated_at`) VALUES
(1, 'Bovinocultura', '2021-11-03 13:41:24', '2021-11-03 13:41:24'),
(2, 'Fruticultura', '2021-11-03 13:41:24', '2021-11-03 13:41:24'),
(3, 'Residencia Estudantil', NULL, NULL),
(4, 'DAE Central', NULL, '2021-11-27 18:21:57'),
(6, 'Biblioteca', '2021-11-27 18:22:30', '2021-11-28 19:54:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sexo`
--

CREATE TABLE `sexo` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `sexo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `sexo`
--

INSERT INTO `sexo` (`id`, `sexo`) VALUES
(1, 'Masculino'),
(2, 'Feminino'),
(3, 'Prefiro não Informar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao_aluno`
--

CREATE TABLE `situacao_aluno` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_situacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `situacao_aluno`
--

INSERT INTO `situacao_aluno` (`id`, `descricao_situacao`, `created_at`, `updated_at`) VALUES
(1, 'Cursando', NULL, '2021-11-28 19:53:56'),
(2, 'Transferido', NULL, NULL),
(3, 'Formado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `totalApto`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `totalApto` (
`apto` varchar(50)
,`totalApto` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `totalCurso2021`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `totalCurso2021` (
`descricao_curso` varchar(255)
,`totalCurso` bigint(21)
,`ano` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `totalMatriculados2021`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `totalMatriculados2021` (
`TotalAlunos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao_turma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id`, `descricao_turma`, `created_at`, `updated_at`) VALUES
(1, '11', NULL, '2021-11-28 20:03:52'),
(2, '12', NULL, NULL),
(3, '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Cedemir Pereira', 'cedemir@gmail.com', NULL, '$2y$10$s86rsxkwx.rZ8.41OgtN/eaTdqmTRbRnt.J.UdSKECuXpjXrRoCz2', NULL, '2021-10-16 04:01:01', '2021-11-02 03:57:20', 3),
(2, 'CD', 'cedemir.pereira@sertao.ifrs.edu.br', NULL, '$2y$10$zyZTYY16cm.QqA/O9ih6ounBsz.F9FspW5Ku2GkkMoHlfgFdrVAcq', NULL, '2021-10-22 05:18:22', '2021-10-22 05:23:32', NULL),
(3, 'teste', 'teste@teste.com', NULL, '$2y$10$82sZbnUnhgojefB2jPIqG.vpnqvb7jUfYkQCeCyQ60Dc2WqxLFYR.', NULL, '2021-10-24 03:36:11', '2021-10-24 03:36:11', NULL),
(4, 'Ricardo Silva', 'ricardo.silva@sertao.ifrs.edu.br', NULL, '$2y$10$9C3uMPXxK4CQUdSzQ3xlauUz.2sfSMbwXFx7R9bqwsffeH8jCs29G', NULL, '2021-12-14 00:48:18', '2021-12-14 00:48:18', NULL),
(5, 'diego', 'diego.lusa@sertao.ifrs.edu.br', NULL, '$2y$10$/NK1EQOWnbdpRcs2zvWzfOJk6UH0vr7DAtGgGXihuDSDJxIQ7uReO', NULL, '2022-01-04 18:07:23', '2022-01-04 18:07:23', NULL),
(6, 'Gabriele Silva', 'gabriele.silva@sertao.ifrs.edu.br', NULL, '$2y$10$cp0ThdSPtl5eAP6nAXfpSODqBWtmG5Yt5gA50sMvoXIypHB3NNwA6', NULL, '2022-01-04 18:58:33', '2022-01-04 18:58:33', NULL),
(7, 'CRE', 'residencia.estudantil@sertao.ifrs.edu.br', NULL, '$2y$10$iMmTFyy.Sz.dhiMSy5XE0eoBcMSSA67i0RbBkJnODilpfmYfbKemS', NULL, '2022-01-06 13:58:00', '2022-01-06 13:58:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para view `residentes`
--
DROP TABLE IF EXISTS `residentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `residentes`  AS  select count(`aluno`.`id`) AS `TotalResidentes` from ((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Residente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `semirresidentes`
--
DROP TABLE IF EXISTS `semirresidentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semirresidentes`  AS  select count(`aluno`.`id`) AS `TotalSemiResidentes` from ((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Semirresidente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `semirresidentes5`
--
DROP TABLE IF EXISTS `semirresidentes5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semirresidentes5`  AS  select `sexo`.`sexo` AS `sexo`,`aluno`.`email` AS `email`,`aluno`.`nome` AS `nome` from (((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `sexo` on(`aluno`.`sexo_id` = `sexo`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Semirresidente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `semirresidentes8`
--
DROP TABLE IF EXISTS `semirresidentes8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semirresidentes8`  AS  select distinct `aluno`.`id` AS `id`,`aluno`.`sexo_id` AS `sexo_id`,`aluno`.`email` AS `email`,`aluno`.`nome` AS `nome` from (((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `sexo` on(`aluno`.`sexo_id` = `sexo`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Semirresidente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `semirresidentes9`
--
DROP TABLE IF EXISTS `semirresidentes9`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semirresidentes9`  AS  select `aluno`.`sexo_id` AS `sexo_id`,`aluno`.`email` AS `email`,`aluno`.`nome` AS `nome` from (((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `sexo` on(`aluno`.`sexo_id` = `sexo`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Semirresidente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `semirresidentes_sexo`
--
DROP TABLE IF EXISTS `semirresidentes_sexo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semirresidentes_sexo`  AS  select `sexo`.`sexo` AS `sexo`,`aluno`.`email` AS `email`,`aluno`.`nome` AS `nome` from (((`aluno` join `residencia` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `sexo` on(`aluno`.`sexo_id` = `sexo`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id` and `regimes_residencia`.`descricao_regime` = 'Semirresidente')) ;

-- --------------------------------------------------------

--
-- Estrutura para view `totalApto`
--
DROP TABLE IF EXISTS `totalApto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalApto`  AS  select `residencia`.`apto` AS `apto`,count(`residencia`.`apto`) AS `totalApto` from ((`residencia` join `aluno` on(`residencia`.`aluno_id` = `aluno`.`id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id`)) group by `residencia`.`apto` ;

-- --------------------------------------------------------

--
-- Estrutura para view `totalCurso2021`
--
DROP TABLE IF EXISTS `totalCurso2021`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalCurso2021`  AS  select `curso`.`descricao_curso` AS `descricao_curso`,count(`matricula`.`curso_id`) AS `totalCurso`,`matricula`.`ano` AS `ano` from ((`matricula` join `aluno` on(`matricula`.`aluno_id` = `aluno`.`id`)) join `curso` on(`matricula`.`curso_id` = `curso`.`id`)) where `matricula`.`ano` = 2021 group by `curso`.`descricao_curso` ;

-- --------------------------------------------------------

--
-- Estrutura para view `totalMatriculados2021`
--
DROP TABLE IF EXISTS `totalMatriculados2021`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalMatriculados2021`  AS  select count(`matricula`.`matricula`) AS `TotalAlunos` from ((`matricula` join `residencia` on(`residencia`.`aluno_id` = `matricula`.`aluno_id`)) join `regimes_residencia` on(`residencia`.`regime_residencia_id` = `regimes_residencia`.`id`)) where `matricula`.`ano` = 2021 ;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alojamento`
--
ALTER TABLE `alojamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alojamento_user_id` (`user_id`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_programa_beneficio_id_foreign` (`beneficio_id`),
  ADD KEY `aluno_situacao_id_foreign` (`situacao_id`),
  ADD KEY `aluno_sexo_id_foreign` (`sexo_id`);

--
-- Índices de tabela `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartamento_id_alojamento_foreign` (`alojamento_id`);

--
-- Índices de tabela `ata`
--
ALTER TABLE `ata`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atendimento_id_forma_atendimento_foreign` (`atendimento_id`),
  ADD KEY `atendimento_user_id` (`user_id`),
  ADD KEY `atendimento_aluno_id` (`aluno_id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `forma_atendimento`
--
ALTER TABLE `forma_atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_aluno_id_foreign` (`aluno_id`);

--
-- Índices de tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula_id_aluno_foreign` (`aluno_id`),
  ADD KEY `matricula_id_serie_foreign` (`serie_id`),
  ADD KEY `matricula_id_turma_foreign` (`turma_id`),
  ADD KEY `matricula_id_curso_foreign` (`curso_id`) USING BTREE;

--
-- Índices de tabela `medidas_disciplinares`
--
ALTER TABLE `medidas_disciplinares`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ocorrencia_aluno_id` (`aluno_id`);

--
-- Índices de tabela `ocorrencias_atividades_orientadas`
--
ALTER TABLE `ocorrencias_atividades_orientadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ocorrencias_atividades_orientadas_id_ocorrencia_foreign` (`ocorrencia_id`),
  ADD KEY `ocorrencias_atividades_orientadas_id_setor_foreign` (`setor_id`) USING BTREE,
  ADD KEY `ocorrencias_aluno_id` (`aluno_id`),
  ADD KEY `ocorrencias_user_id` (`user_id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_user_id_foreign` (`user_id`);

--
-- Índices de tabela `programa_beneficio`
--
ALTER TABLE `programa_beneficio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `regimes_residencia`
--
ALTER TABLE `regimes_residencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `residencia`
--
ALTER TABLE `residencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residencia_residencia_id_foreign` (`regime_residencia_id`),
  ADD KEY `residencia_aluno_id_foreign` (`aluno_id`);

--
-- Índices de tabela `residencia_autorizacoes`
--
ALTER TABLE `residencia_autorizacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residencia_autorizacoes_aluno_id` (`aluno_id`);

--
-- Índices de tabela `residencia_faltas`
--
ALTER TABLE `residencia_faltas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residencia_faltas_aluno_id` (`aluno_id`);

--
-- Índices de tabela `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `resource_role`
--
ALTER TABLE `resource_role`
  ADD KEY `resource_role_role_id_foreign` (`role_id`),
  ADD KEY `resource_role_resource_id_foreign` (`resource_id`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `situacao_aluno`
--
ALTER TABLE `situacao_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alojamento`
--
ALTER TABLE `alojamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `apartamento`
--
ALTER TABLE `apartamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `ata`
--
ALTER TABLE `ata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forma_atendimento`
--
ALTER TABLE `forma_atendimento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `medidas_disciplinares`
--
ALTER TABLE `medidas_disciplinares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ocorrencias_atividades_orientadas`
--
ALTER TABLE `ocorrencias_atividades_orientadas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `programa_beneficio`
--
ALTER TABLE `programa_beneficio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `regimes_residencia`
--
ALTER TABLE `regimes_residencia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `residencia`
--
ALTER TABLE `residencia`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `residencia_autorizacoes`
--
ALTER TABLE `residencia_autorizacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `residencia_faltas`
--
ALTER TABLE `residencia_faltas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `serie`
--
ALTER TABLE `serie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `situacao_aluno`
--
ALTER TABLE `situacao_aluno`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `alojamento`
--
ALTER TABLE `alojamento`
  ADD CONSTRAINT `alojamento_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_programa_beneficio_id_foreign` FOREIGN KEY (`beneficio_id`) REFERENCES `programa_beneficio` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aluno_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aluno_situacao_id_foreign` FOREIGN KEY (`situacao_id`) REFERENCES `situacao_aluno` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `apartamento_id_alojamento_foreign` FOREIGN KEY (`alojamento_id`) REFERENCES `alojamento` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `atendimento_id_forma_atendimento_foreign` FOREIGN KEY (`atendimento_id`) REFERENCES `forma_atendimento` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `atendimento_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_id_aluno_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_id_curso_foreign` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_id_serie_foreign` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_id_turma_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `ocorrencia_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `ocorrencias_atividades_orientadas`
--
ALTER TABLE `ocorrencias_atividades_orientadas`
  ADD CONSTRAINT `ocorrencias_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ocorrencias_atividades_orientadas_id_ocorrencia_foreign` FOREIGN KEY (`ocorrencia_id`) REFERENCES `ocorrencia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ocorrencias_atividades_orientadas_id_setor_foreign` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ocorrencias_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `residencia`
--
ALTER TABLE `residencia`
  ADD CONSTRAINT `residencia_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `residencia_residencia_id_foreign` FOREIGN KEY (`regime_residencia_id`) REFERENCES `regimes_residencia` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `residencia_autorizacoes`
--
ALTER TABLE `residencia_autorizacoes`
  ADD CONSTRAINT `residencia_autorizacoes_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `residencia_faltas`
--
ALTER TABLE `residencia_faltas`
  ADD CONSTRAINT `residencia_faltas_aluno_id` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `resource_role`
--
ALTER TABLE `resource_role`
  ADD CONSTRAINT `resource_role_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`),
  ADD CONSTRAINT `resource_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
