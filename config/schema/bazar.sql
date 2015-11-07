-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2015 at 09:58 AM
-- Server version: 5.5.38-35.2
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpag314_bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `created_by`, `owner`, `price`, `created`, `modified`) VALUES
(4, 'Sapato chiquéeeeerrimo', '', 4, 4, '25.00', '2015-11-05 00:18:35', '2015-11-05 00:18:35'),
(5, 'Bolsa arrasadooooora', '', 4, 5, '34.00', '2015-11-05 00:18:54', '2015-11-05 00:18:54'),
(6, 'Blusa Gap', 'Tamanho M e sem uso', 3, 5, '1.00', '2015-11-07 12:16:05', '2015-11-07 12:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `registered_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `role` varchar(40) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `created`, `modified`, `role`) VALUES
(3, 'admin', '$2y$10$2x9Y3YWp67riI4Fq97vpgu46GeHCoZaBvuMbyhcovATjL9VjwUEhy', 'Administrador Geral', 'joaogabrielv@gmail.com', '2015-11-04 16:41:50', '2015-11-04 16:41:50', 'admin'),
(4, 'gisele', '$2y$10$E0NhOH7uY6LBZGpn1v6NTejkCo4pBPea8hW2qYVnK.oRitQFqbIRO', 'Gisele Lima', 'giselelima03@gmail.com', '2015-11-04 20:06:44', '2015-11-04 20:06:44', 'admin'),
(5, 'fabiane', '$2y$10$KMxLZ4fcXI3s3Fc/zpxqiOgrUjPcgmSKQRCpDc8PU2oFWPKKDX9ty', 'Fabiane', 'fabiane@bla.com', '2015-11-04 23:46:29', '2015-11-04 23:46:29', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_created_by_users` (`created_by`) USING BTREE, ADD KEY `fk_owner_users` (`owner`) USING BTREE;

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_produck_id_products` (`product_id`), ADD KEY `fk_registered_by_users` (`registered_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`registered_by`) REFERENCES `users` (`id`),
ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
