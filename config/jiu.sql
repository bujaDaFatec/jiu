-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Out-2024 às 21:00
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jiu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `faixa` enum('branca','azul','roxa','marrom','preta') DEFAULT 'branca',
  `status` enum('ativo','inativo') DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `recorrencia` enum('nenhuma','semanal') DEFAULT 'semanal',
  `dias_semana` set('segunda','terça','quarta','quinta','sexta') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id_aula`, `data_inicio`, `data_fim`, `localizacao`, `recorrencia`, `dias_semana`) VALUES
(1, '2024-10-24 19:00:00', '2024-10-24 21:00:00', 'Sala 3', 'semanal', 'terça,quinta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_alteracoes`
--

CREATE TABLE `historico_alteracoes` (
  `id_alteracao` int(11) NOT NULL,
  `id_presenca` int(11) DEFAULT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `alterado_por` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca`
--

CREATE TABLE `presenca` (
  `id_presenca` int(11) NOT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `status_presenca` enum('presente','ausente','atrasado') DEFAULT 'ausente',
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Índices para tabela `historico_alteracoes`
--
ALTER TABLE `historico_alteracoes`
  ADD PRIMARY KEY (`id_alteracao`),
  ADD KEY `id_presenca` (`id_presenca`),
  ADD KEY `alterado_por` (`alterado_por`);

--
-- Índices para tabela `presenca`
--
ALTER TABLE `presenca`
  ADD PRIMARY KEY (`id_presenca`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `idx_aula_aluno` (`id_aula`,`id_aluno`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `historico_alteracoes`
--
ALTER TABLE `historico_alteracoes`
  MODIFY `id_alteracao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presenca`
--
ALTER TABLE `presenca`
  MODIFY `id_presenca` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `historico_alteracoes`
--
ALTER TABLE `historico_alteracoes`
  ADD CONSTRAINT `historico_alteracoes_ibfk_1` FOREIGN KEY (`id_presenca`) REFERENCES `presenca` (`id_presenca`) ON DELETE CASCADE,
  ADD CONSTRAINT `historico_alteracoes_ibfk_2` FOREIGN KEY (`alterado_por`) REFERENCES `alunos` (`id_aluno`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `presenca`
--
ALTER TABLE `presenca`
  ADD CONSTRAINT `presenca_ibfk_1` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE,
  ADD CONSTRAINT `presenca_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
