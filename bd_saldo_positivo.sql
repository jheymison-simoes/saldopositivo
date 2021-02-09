-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Jul-2020 às 20:56
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_saldo_positivo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_cartoes`
--

CREATE TABLE `cadastrar_cartoes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `banco` varchar(300) NOT NULL,
  `bandeira` varchar(100) NOT NULL,
  `limite_total` decimal(19,2) NOT NULL,
  `limite_disponivel` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_cartoes`
--

INSERT INTO `cadastrar_cartoes` (`id`, `titulo`, `banco`, `bandeira`, `limite_total`, `limite_disponivel`, `id_cadastrar_usuarios`) VALUES
(8, 'Cartão Santander', 'Santander', 'Mastercard', '2500.00', '2500.00', 13),
(9, 'Cartão Nubank', 'Nubank', 'Mastercard', '1200.00', '1000.00', 13),
(10, 'Cartão Nubank', 'Nubank', 'Mastercard', '1200.00', '1000.00', 13),
(11, 'Cartão Nubank', 'Nubank', 'Mastercard', '1200.00', '1000.00', 13),
(12, 'Cartão Nubank', 'Nubank', 'Bandeira', '1200.00', '1000.00', 13),
(13, 'Cartão Nubank', 'Nubank', 'Mastercard', '1200.00', '1000.00', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_despesas`
--

CREATE TABLE `cadastrar_despesas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `tipo_despesa` varchar(200) NOT NULL,
  `tipo_pagamento` varchar(200) NOT NULL,
  `despesa_fixa` varchar(200) NOT NULL DEFAULT 'Não',
  `valor_despesa` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_despesas`
--

INSERT INTO `cadastrar_despesas` (`id`, `data`, `descricao`, `tipo_despesa`, `tipo_pagamento`, `despesa_fixa`, `valor_despesa`, `id_cadastrar_usuarios`) VALUES
(160, '2020-07-25', 'teste', 'Futebol', 'parcelado', 'Não', '499.00', 13),
(161, '2020-08-25', 'teste', 'Futebol', 'parcelado', 'Não', '499.00', 13),
(162, '2020-07-31', 'Comprei uma bicileta', 'Aluguel', 'a_vista', 'Não', '1299.99', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_ganhos`
--

CREATE TABLE `cadastrar_ganhos` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `tipo_renda` varchar(200) NOT NULL,
  `valor` decimal(19,2) NOT NULL,
  `renda_fixa` varchar(200) NOT NULL DEFAULT 'Não',
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_ganhos`
--

INSERT INTO `cadastrar_ganhos` (`id`, `data`, `descricao`, `tipo_renda`, `valor`, `renda_fixa`, `id_cadastrar_usuarios`) VALUES
(177, '2020-07-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(178, '2020-08-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(179, '2020-09-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(180, '2020-10-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(181, '2020-11-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(182, '2020-12-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(183, '2021-01-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(184, '2021-02-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(185, '2021-03-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(186, '2021-04-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(187, '2021-05-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(188, '2021-06-25', 'Meu Salário Mensal', 'Salário', '2200.88', 'Sim', 13),
(189, '2020-07-29', 'Meu Salário Mensal', 'Salário', '50.59', 'Não', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_metas`
--

CREATE TABLE `cadastrar_metas` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `tipo_meta` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor_meta` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_metas`
--

INSERT INTO `cadastrar_metas` (`id`, `data`, `tipo_meta`, `descricao`, `valor_meta`, `id_cadastrar_usuarios`) VALUES
(6, '2020-07-29', 'Carro', 'Carro novo Gol G8', '33000.00', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastrar_usuarios`
--

CREATE TABLE `cadastrar_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastrar_usuarios`
--

INSERT INTO `cadastrar_usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(13, 'Jheymison Simões', 'jheymisonbao@live.com', '8bbba38f39369f74524837ce01201db1102be476'),
(14, 'Neslon Neto', 'nelson@gmail.com', '8bbba38f39369f74524837ce01201db1102be476'),
(15, 'Joao Antonio', 'joao@gmail.com', '59da2bb5fe2dce670127d209659b30bd331adf4c'),
(16, 'Elisangela Simões', 'eli@gmail.com', '8bbba38f39369f74524837ce01201db1102be476');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes_avista`
--

CREATE TABLE `cartoes_avista` (
  `id` int(11) NOT NULL,
  `id_cadastrar_cartoes` int(11) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes_parcelados`
--

CREATE TABLE `cartoes_parcelados` (
  `id` int(11) NOT NULL,
  `id_cadastrar_cartoes` int(11) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cartoes_parcelados`
--

INSERT INTO `cartoes_parcelados` (`id`, `id_cadastrar_cartoes`, `id_cadastrar_despesas`, `id_cadastrar_usuarios`) VALUES
(62, 8, 160, 13),
(63, 8, 161, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_a_vista`
--

CREATE TABLE `pagamentos_a_vista` (
  `id` int(11) NOT NULL,
  `forma_pagamento` varchar(200) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamentos_a_vista`
--

INSERT INTO `pagamentos_a_vista` (`id`, `forma_pagamento`, `id_cadastrar_despesas`, `id_cadastrar_usuarios`) VALUES
(62, 'dinheiro_vista', 142, 13),
(63, 'dinheiro_vista', 162, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_parcelados`
--

CREATE TABLE `pagamentos_parcelados` (
  `id` int(11) NOT NULL,
  `forma_pagamento` varchar(200) NOT NULL,
  `qnt_parcelas` int(10) NOT NULL,
  `id_cadastrar_despesas` int(11) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamentos_parcelados`
--

INSERT INTO `pagamentos_parcelados` (`id`, `forma_pagamento`, `qnt_parcelas`, `id_cadastrar_despesas`, `id_cadastrar_usuarios`) VALUES
(98, 'cartao_parcelado', 2, 160, 13),
(99, 'cartao_parcelado', 2, 161, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuarios`
--

CREATE TABLE `perfil_usuarios` (
  `id` int(11) NOT NULL,
  `empresa` varchar(300) NOT NULL,
  `profissao` varchar(300) NOT NULL,
  `sobre` varchar(1000) NOT NULL,
  `imagem` varchar(1000) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil_usuarios`
--

INSERT INTO `perfil_usuarios` (`id`, `empresa`, `profissao`, `sobre`, `imagem`, `id_cadastrar_usuarios`) VALUES
(3, 'Editar(Opcional)', 'Editar(Opcional)', 'Editar(Opcional)', 'assets/img/faces/61cb245b76ba9a914f9c00ab36a4f97e.jpg', 13),
(4, 'Editar(Opcional)', 'Editar(Opcional)', 'Editar(Opcional)', 'assets/img/faces/avatar.jpg', 14),
(5, 'Editar(Opcional)', 'Editar(Opcional)', 'Editar(Opcional)', 'assets/img/faces/avatar.jpg', 15),
(6, 'Editar(Opcional)', 'Editar(Opcional)', 'Editar(Opcional)', 'assets/img/faces/avatar.jpg', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_despesas`
--

CREATE TABLE `tipos_de_despesas` (
  `id` int(11) NOT NULL,
  `tipo_despesa` varchar(200) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_de_despesas`
--

INSERT INTO `tipos_de_despesas` (`id`, `tipo_despesa`, `id_cadastrar_usuarios`) VALUES
(9, 'Fatura do Cartão', 100),
(10, 'Aluguel', 100),
(11, 'Concerto Automóvel', 100),
(12, 'Futebol', 100),
(13, 'Água Sanitária', 100),
(14, 'Energia', 100),
(15, 'Cinema', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_ganhos`
--

CREATE TABLE `tipos_de_ganhos` (
  `id` int(11) NOT NULL,
  `tipo_ganho` varchar(200) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipos_de_ganhos`
--

INSERT INTO `tipos_de_ganhos` (`id`, `tipo_ganho`, `id_cadastrar_usuarios`) VALUES
(4, 'Salário', 100),
(5, 'Décimo Quarto', 100),
(6, 'Hora Extra', 100),
(7, 'Renda Extra', 100),
(8, 'Prêmio', 100),
(9, 'Presente', 100),
(10, 'Prestação de Serviço', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `tipo_transacao` varchar(200) NOT NULL,
  `tipo_pagamento` varchar(200) NOT NULL,
  `valor` decimal(19,2) NOT NULL,
  `id_cadastrar_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`id`, `data`, `descricao`, `tipo_transacao`, `tipo_pagamento`, `valor`, `id_cadastrar_usuarios`) VALUES
(156, '2020-07-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(157, '2020-08-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(158, '2020-09-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(159, '2020-10-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(160, '2020-11-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(161, '2020-12-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(162, '2021-01-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(163, '2021-02-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(164, '2021-03-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(165, '2021-04-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(166, '2021-05-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(167, '2021-06-25', 'Meu Salário Mensal', 'Renda', 'A Vista', '2200.88', 13),
(168, '2020-07-25', 'Teste', 'Despesa', 'a_vista', '399.00', 13),
(169, '2005-06-11', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(170, '2005-07-12', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(171, '2000-02-28', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(172, '2005-09-10', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(173, '2005-10-11', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(174, '2005-11-10', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(175, '2005-12-11', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(176, '2006-01-10', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(177, '2006-02-10', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(178, '2006-03-13', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(179, '2006-04-12', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(180, '2006-05-13', 'Conta de Agua', 'Despesa', 'parcelado', '50.99', 13),
(181, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(182, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(183, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(184, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(185, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(186, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(187, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(188, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(189, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(190, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(191, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(192, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '59.99', 13),
(193, '2020-07-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(194, '2020-08-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(195, '2020-09-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(196, '2020-10-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(197, '2020-11-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(198, '2020-12-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(199, '2021-01-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(200, '2021-02-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(201, '2021-03-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(202, '2021-04-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(203, '2021-05-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(204, '2021-06-25', 'Conta de Agua', 'Despesa', 'a_vista', '59.99', 13),
(205, '2005-06-11', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(206, '2005-07-12', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(207, '2000-02-28', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(208, '2005-09-10', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(209, '2005-10-11', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(210, '2005-11-10', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(211, '2005-12-11', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(212, '2006-01-10', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(213, '2006-02-10', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(214, '2006-03-13', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(215, '2006-04-12', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(216, '2006-05-13', 'Teste com PArcelado', 'Despesa', 'parcelado', '12.99', 13),
(217, '2020-07-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(218, '2020-08-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(219, '2020-09-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(220, '2020-10-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(221, '2020-11-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(222, '2020-07-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(223, '2020-08-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(224, '2020-09-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(225, '2020-10-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(226, '2020-11-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(227, '2020-12-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(228, '2021-01-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(229, '2021-02-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(230, '2021-03-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(231, '2021-04-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(232, '2021-05-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(233, '2021-06-25', 'Teste com PArcelado', 'Despesa', 'parcelado', '0.00', 13),
(234, '2020-07-25', 'Internet da Algar', 'Despesa', 'a_vista', '50.00', 13),
(235, '2020-07-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(236, '2020-08-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(237, '2020-09-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(238, '2020-10-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(239, '2020-11-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(240, '2020-12-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(241, '2021-01-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(242, '2021-02-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(243, '2021-03-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(244, '2021-04-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(245, '2021-05-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(246, '2021-06-25', 'Futebol com os amigos', 'Despesa', 'parcelado', '0.00', 13),
(247, '2020-07-25', 'Internet da Algar', 'Despesa', 'parcelado', '0.00', 13),
(248, '2020-08-25', 'Internet da Algar', 'Despesa', 'parcelado', '0.00', 13),
(249, '2020-07-25', 'teste', 'Despesa', 'parcelado', '0.00', 13),
(250, '2020-08-25', 'teste', 'Despesa', 'parcelado', '0.00', 13),
(251, '2020-09-25', 'teste', 'Despesa', 'parcelado', '0.00', 13),
(252, '2020-07-25', 'teste', 'Despesa', 'parcelado', '499.00', 13),
(253, '2020-08-25', 'teste', 'Despesa', 'parcelado', '499.00', 13),
(254, '2020-07-29', 'Meu Salário Mensal', 'Renda', 'A Vista', '50.59', 13),
(255, '2020-07-31', 'Comprei uma bicileta', 'Despesa', 'a_vista', '1299.99', 13);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastrar_cartoes`
--
ALTER TABLE `cadastrar_cartoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_despesas`
--
ALTER TABLE `cadastrar_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_ganhos`
--
ALTER TABLE `cadastrar_ganhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_metas`
--
ALTER TABLE `cadastrar_metas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadastrar_usuarios`
--
ALTER TABLE `cadastrar_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cartoes_avista`
--
ALTER TABLE `cartoes_avista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cartoes_parcelados`
--
ALTER TABLE `cartoes_parcelados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos_a_vista`
--
ALTER TABLE `pagamentos_a_vista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos_parcelados`
--
ALTER TABLE `pagamentos_parcelados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfil_usuarios`
--
ALTER TABLE `perfil_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_de_despesas`
--
ALTER TABLE `tipos_de_despesas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipos_de_ganhos`
--
ALTER TABLE `tipos_de_ganhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastrar_cartoes`
--
ALTER TABLE `cadastrar_cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cadastrar_despesas`
--
ALTER TABLE `cadastrar_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `cadastrar_ganhos`
--
ALTER TABLE `cadastrar_ganhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de tabela `cadastrar_metas`
--
ALTER TABLE `cadastrar_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cadastrar_usuarios`
--
ALTER TABLE `cadastrar_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `cartoes_avista`
--
ALTER TABLE `cartoes_avista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cartoes_parcelados`
--
ALTER TABLE `cartoes_parcelados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `pagamentos_a_vista`
--
ALTER TABLE `pagamentos_a_vista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `pagamentos_parcelados`
--
ALTER TABLE `pagamentos_parcelados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `perfil_usuarios`
--
ALTER TABLE `perfil_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tipos_de_despesas`
--
ALTER TABLE `tipos_de_despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tipos_de_ganhos`
--
ALTER TABLE `tipos_de_ganhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
