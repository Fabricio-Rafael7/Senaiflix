-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/07/2024 às 03:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senaiflix_fabricio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinaturas`
--

CREATE TABLE `assinaturas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `plano` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `email`, `telefone`, `data_cadastro`, `data_atualizacao`, `status`, `senha`, `numero`) VALUES
(1, 'calebe', 'root', 'rua dos gays', 'Conjunto Cristina (São Benedito)', 'santa luzia', 'MG', '33110160', 'musicas@gmail.com', '31973473625', '2024-06-16 20:33:48', '2024-06-16 20:33:48', 0, '$2y$10$ym4xeiChLkoQ8mZwGxQvl.yJhCIpDVIbMUIeUiB/DjJgymofHe8M6', '234432'),
(2, 'alisson', '12345678910', 'rua dos gays2', 'Conjunto Cristina (São Benedito)', 'santa luzia', 'MG', '33110060', 'aaa@gmail.com', '31973473624', '2024-06-16 20:37:13', '2024-06-16 20:37:13', 0, '$2y$10$8D55yJHjYqsvhFZBbmoo8uoNOPLLXAkS0xr/N118M1XPHbp6xL3xC', '234432'),
(3, 'calebe', '12345678912', 'rua dos gays3', 'Conjunto Cristina (São Benedito)', 'santa luzia', 'MG', '33110060', '0001020119@senaimgaluno.com.br', '31973473626', '2024-06-16 20:43:58', '2024-06-16 20:43:58', 0, '$2y$10$p4VXdFF7ruoaoiHUnznzhedAExMa8ACN7Byv6YRCa8BizOnfnQqoy', '234432'),
(4, 'calebe', '12345678912', 'rua dos gays3', 'Conjunto Cristina (São Benedito)', 'santa luzia', 'MG', '33110060', '0001020119@senaimgaluno.com.br', '31973473626', '2024-06-16 20:46:11', '2024-06-16 20:46:11', 0, '$2y$10$pGcJatL6g.S74./v67ruXeP77BOFyjmPy3WRsWP3Acju4/6pZnety', '234432'),
(9, 'fabricio', '12345678911', 'Rua Clarismundo Bernardes Terra', 'Conjunto Cristina (São Benedito)', 'Santa Luzia', 'MG', '33110060', 'adm1@gmail.com', '31973473625', '2024-06-18 09:13:22', '2024-06-18 09:13:22', 0, '2bf6252a8ff6d5a0038a361ae8312a4f75ec61ad46ffa35d5265d39b1c29fe61', '234432');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ano_lancamento` date DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `classificacao` varchar(10) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `midia` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `descricao`, `ano_lancamento`, `genero`, `classificacao`, `imagem`, `midia`, `data_cadastro`, `data_atualizacao`, `status`) VALUES
(1, 'The green Mile', 'Um carcereiro tem um relacionamento incomum e comovente com um preso que está no corredor na morte: Coffey, um negro enorme, condenado por ter matado brutalmente duas gêmeas de nove anos. Ele tem tamanho e força para matar qualquer um, mas seu comportamento é completamente oposto à sua aparência', '0000-00-00', 'Drama', '16', 'the green mile.jpeg', 'https://worker-square-heart-580a.uieafpvtgl.workers.dev/movies/The%20Green%20Mile%20%281999%29/1385d6da012041509306a0221c4c9353.mkv', '2024-06-18 09:05:13', '2024-06-18 09:05:13', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_atualizacao` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `data_cadastro`, `data_atualizacao`, `status`) VALUES
(2, 'alisson', 'alisson', '2bf6252a8ff6d5a0038a361ae8312a4f75ec61ad46ffa35d5265d39b1c29fe61', 'adm1@gmail.com', '2024-06-18 08:10:59', '2024-06-18 08:10:59', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD CONSTRAINT `assinaturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
