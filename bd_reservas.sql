-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2018 às 15:41
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_reservas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carros`
--

CREATE TABLE `tb_carros` (
  `id_car` int(11) NOT NULL,
  `nome_car` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_carros`
--

INSERT INTO `tb_carros` (`id_car`, `nome_car`) VALUES
(1, 'Caravan'),
(2, 'Corcel'),
(3, 'Brasilia'),
(4, 'Fusca'),
(5, '147'),
(6, 'Uno'),
(7, 'Diplomata'),
(8, 'Comodoro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_reservas`
--

CREATE TABLE `tb_reservas` (
  `id_res` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date NOT NULL,
  `pessoa` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_reservas`
--

INSERT INTO `tb_reservas` (`id_res`, `id_car`, `dt_inicio`, `dt_fim`, `pessoa`) VALUES
(1, 1, '2018-05-03', '2018-05-04', 'Filipe Souza'),
(2, 1, '2018-05-07', '2018-05-11', 'Henrique Souza'),
(3, 3, '2018-05-12', '2018-05-15', 'Ricardo'),
(4, 6, '2018-05-16', '2018-05-17', 'Pedro'),
(9, 7, '2018-05-01', '2018-05-06', 'carlos'),
(10, 4, '2018-05-06', '2018-05-15', 'Silvana'),
(11, 8, '2018-05-01', '2018-05-11', 'Daniel'),
(12, 5, '2018-05-18', '2018-05-27', 'Camila');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_carros`
--
ALTER TABLE `tb_carros`
  ADD PRIMARY KEY (`id_car`);

--
-- Indexes for table `tb_reservas`
--
ALTER TABLE `tb_reservas`
  ADD PRIMARY KEY (`id_res`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_carros`
--
ALTER TABLE `tb_carros`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_reservas`
--
ALTER TABLE `tb_reservas`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
