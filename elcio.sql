-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/08/2026 às 02:35
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `elcio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id_chamado` int(11) NOT NULL,
  `id_destinatario` int(11) DEFAULT NULL,
  `titulo_chamado` varchar(40) DEFAULT NULL,
  `mensagem_chamado` varchar(255) DEFAULT NULL,
  `prioridade_chamado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id_chamado`, `id_destinatario`, `titulo_chamado`, `mensagem_chamado`, `prioridade_chamado`) VALUES
(1, NULL, 'teste', 'teste', 3),
(2, NULL, 'teste', 'testeste', 2),
(3, 4, 'teste', 'TESTESTE', 2),
(4, 2, 'teste', 'TESTES', 3),
(5, 3, 'teste', 'TESTES', 2),
(6, 1, 'teste', 'TESTESTE', 2),
(7, 1, 'teste', 'testeste', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `destinatarios`
--

CREATE TABLE `destinatarios` (
  `id_destinatario` int(11) NOT NULL,
  `nome_destinatario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `destinatarios`
--

INSERT INTO `destinatarios` (`id_destinatario`, `nome_destinatario`) VALUES
(1, 'MATHEUS FARIAS'),
(2, 'PEDRO NOGA'),
(3, 'ELCIO SAVA'),
(4, 'ALINE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `prioridades`
--

CREATE TABLE `prioridades` (
  `id_prioridade` int(11) NOT NULL,
  `tipo_prioridade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prioridades`
--

INSERT INTO `prioridades` (`id_prioridade`, `tipo_prioridade`) VALUES
(1, 'Baixa'),
(2, 'Média'),
(3, 'Alta');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id_chamado`);

--
-- Índices de tabela `destinatarios`
--
ALTER TABLE `destinatarios`
  ADD PRIMARY KEY (`id_destinatario`);

--
-- Índices de tabela `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`id_prioridade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `destinatarios`
--
ALTER TABLE `destinatarios`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `id_prioridade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
