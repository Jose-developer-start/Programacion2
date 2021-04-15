-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 08:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_xyz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(5) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `imagen_cate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `categoria`, `imagen_cate`) VALUES
(1, 'Res', 'res.png'),
(2, 'Res', 'imagen_res.png\r\n'),
(3, 'Pollo', 'imagen_pollo.png\r\n'),
(4, 'Zapato', 'imagen_zapato.png'),
(5, 'Leche', 'leche-png'),
(6, 'Galletas', 'galletas.png'),
(7, 'Electrodomesticos', 'hola.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passw` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `passw`, `tipo`, `estado`, `token`) VALUES
(1, 'jose', 'josedeodanes99@gmail.com', '$2y$10$5iD58PjfJp2uIZVmnfgnaOETK1Y.Sv5ZKo9JXDX.brCwPnPqCMwWi', 1, 1, ''),
(3, 'dfg', 'josedeodanes99@gmail.com', '$2y$10$nNoGseo.ndurgiK8PgS95eCSZ86kvlnqUy8Gfk4XtS8luc/vc8fse', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
