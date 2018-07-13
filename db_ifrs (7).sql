-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2018 às 20:38
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db.ifrs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(1, 'Institucional'),
(2, 'Mercado de Trabalho'),
(3, 'Comunidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `idProjeto` int(11) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idComentarioPai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `idProjeto`, `descricao`, `data`, `idUsuario`, `idComentarioPai`) VALUES
(50, 3, 'Teste de comentario', '2018-07-10 22:53:23', 1, NULL),
(51, 4, 'muito bom', '2018-07-13 02:21:52', 1, NULL),
(52, 4, 'melhor comentário de todos', '2018-07-13 02:26:35', 1, NULL),
(84, 4, 'melhor comentário de todos', '2018-07-13 02:26:35', 1, 52),
(85, 3, 'Teste de comentario Resposta', '2018-07-10 22:53:23', 1, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `concurso`
--

CREATE TABLE `concurso` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `dataInscricaoInicial` date NOT NULL,
  `dataInscricaoFinal` date NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `dataPremiacao` date NOT NULL,
  `descricaoPremiacao` varchar(40) NOT NULL,
  `tipoAvaliacao` tinyint(1) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `projetoVencedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `concurso`
--

INSERT INTO `concurso` (`id`, `titulo`, `descricao`, `dataInscricaoInicial`, `dataInscricaoFinal`, `idCategoria`, `dataPremiacao`, `descricaoPremiacao`, `tipoAvaliacao`, `ativo`, `projetoVencedor`) VALUES
(1, 'Melhor melhor do mundo', 'Melhor melhor do mundo', '2018-07-13', '2018-07-18', 1, '2018-07-31', 'um carro', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipeprojeto`
--

CREATE TABLE `equipeprojeto` (
  `idProjeto` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipeprojeto`
--

INSERT INTO `equipeprojeto` (`idProjeto`, `idAluno`) VALUES
(3, 5),
(4, 4),
(4, 5),
(5, 4),
(6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `id` int(11) NOT NULL,
  `idProjeto` int(11) DEFAULT NULL,
  `idConcurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodovotacao`
--

CREATE TABLE `periodovotacao` (
  `id` int(11) NOT NULL,
  `idConcurso` int(11) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resumo` varchar(200) NOT NULL,
  `tecnologiasUtilizadas` varchar(100) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `duracao` varchar(10) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `publicoAlvo` varchar(50) DEFAULT NULL,
  `departamentoAfetado` varchar(100) DEFAULT NULL,
  `resultadoEsperado` varchar(100) DEFAULT NULL,
  `areaAtuacao` varchar(100) DEFAULT NULL,
  `idCoordenador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `titulo`, `resumo`, `tecnologiasUtilizadas`, `idStatus`, `duracao`, `idCategoria`, `publicoAlvo`, `departamentoAfetado`, `resultadoEsperado`, `areaAtuacao`, `idCoordenador`) VALUES
(3, 'TCC', 'O melhor TCC de todos os tempos.', 'C# e Java', 1, '1 semestre', 2, NULL, 'IFRS', 'O melhor programa de todos', 'hahahahaha', 1),
(4, 'Trabalho PHP', 'Projetos e Concursos', 'PHP', 3, '1 Ano', 2, 'Tupandi', 'cu', 'cu', 'tet', 1),
(5, 'TCC2', '22222', '2222', 2, '1 dia', 2, NULL, NULL, NULL, 'hahahahaha', 1),
(6, 'fernanda TCC', 'Java é melhor que php', 'Java', 2, '3 anos', 3, 'Feliz', NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `idComentario` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `descricao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`) VALUES
(1, 'Inicial'),
(2, 'Andamento'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` int(11) NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `siape` varchar(7) DEFAULT NULL,
  `matricula` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `tipo`, `ativo`, `siape`, `matricula`) VALUES
(1, 'Raquel', 'raquel_g2010@hotmail.com', 12345, 1, 1, '', '201713330148'),
(2, 'Felipe', 'felipe', 123123, 3, 1, '', ''),
(3, 'João', 'joao@gmail.com', 34567, 2, 1, '2017744', ''),
(4, 'Lucas', 'lucas@gmail.com', 45678, 1, 1, '', '123456789123'),
(5, 'Fernanda', 'fernanda@gmail.com', 56789, 1, 1, '', '234567894356'),
(6, 'Roberto', 'roberto@gmail.com', 12345, 2, 1, '1234567', NULL),
(7, 'Rafael', 'rafael@gmail.com', 12345, 1, 1, NULL, '121212121212'),
(21, 'Marco', 'raquel_g2010@hotmail.com', 121, 1, 1, NULL, '112'),
(22, 'Marco', 'raquel_g2010@hotmail.com', 123, 2, 1, '1234', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `votos`
--

CREATE TABLE `votos` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idProjeto` int(11) DEFAULT NULL,
  `idConcurso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProjeto` (`idProjeto`),
  ADD KEY `FK_ComentarioPai` (`idComentarioPai`);

--
-- Indexes for table `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `projetoVencedor` (`projetoVencedor`);

--
-- Indexes for table `equipeprojeto`
--
ALTER TABLE `equipeprojeto`
  ADD KEY `idProjeto` (`idProjeto`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProjeto` (`idProjeto`),
  ADD KEY `idConcurso` (`idConcurso`);

--
-- Indexes for table `periodovotacao`
--
ALTER TABLE `periodovotacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idConcurso` (`idConcurso`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idcoordenador` (`idCoordenador`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComentario` (`idComentario`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProjeto` (`idProjeto`),
  ADD KEY `idConcurso` (`idConcurso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periodovotacao`
--
ALTER TABLE `periodovotacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `FK_ComentarioPai` FOREIGN KEY (`idComentarioPai`) REFERENCES `comentario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`);

--
-- Limitadores para a tabela `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `concurso_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `concurso_ibfk_2` FOREIGN KEY (`projetoVencedor`) REFERENCES `projeto` (`id`);

--
-- Limitadores para a tabela `equipeprojeto`
--
ALTER TABLE `equipeprojeto`
  ADD CONSTRAINT `equipeprojeto_ibfk_1` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `equipeprojeto_ibfk_2` FOREIGN KEY (`idAluno`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `inscricao_ibfk_1` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `inscricao_ibfk_2` FOREIGN KEY (`idConcurso`) REFERENCES `concurso` (`id`);

--
-- Limitadores para a tabela `periodovotacao`
--
ALTER TABLE `periodovotacao`
  ADD CONSTRAINT `periodovotacao_ibfk_1` FOREIGN KEY (`idConcurso`) REFERENCES `concurso` (`id`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `FK_idcoordenador` FOREIGN KEY (`idCoordenador`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`idComentario`) REFERENCES `comentario` (`id`);

--
-- Limitadores para a tabela `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `votos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `votos_ibfk_2` FOREIGN KEY (`idProjeto`) REFERENCES `projeto` (`id`),
  ADD CONSTRAINT `votos_ibfk_3` FOREIGN KEY (`idConcurso`) REFERENCES `concurso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
