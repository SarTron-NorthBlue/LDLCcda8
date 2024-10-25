-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 oct. 2024 à 11:01
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ldlc`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `composant` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `REF` varchar(255) NOT NULL,
  `QT` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `marque`, `composant`, `date_creation`, `prix`, `REF`, `QT`) VALUES
(21, 'acer', 'carte mère B4520', '2024-10-25', 1258.00, 'zqdqzdqzdzqd415', '5'),
(22, 'hp', 'carte mère', '2024-10-10', 1258.00, 'zqdqzdqzdzqd415', '15852'),
(1, 'asus', 'carte mère A520', '2024-10-15', 1150.00, 'ref1', '10'),
(2, 'msi', 'processeur Ryzen 5', '2024-10-13', 250.00, 'ref2', '8'),
(3, 'gigabyte', 'carte graphique GTX 1650', '2024-09-22', 600.00, 'ref3', '15'),
(4, 'intel', 'processeur i7', '2024-08-19', 400.00, 'ref4', '20'),
(5, 'kingston', 'RAM 16GB DDR4', '2024-10-09', 150.00, 'ref5', '30'),
(6, 'corsair', 'SSD 1TB', '2024-07-18', 125.00, 'ref6', '50'),
(7, 'seagate', 'HDD 2TB', '2024-06-30', 80.00, 'ref7', '60'),
(8, 'western digital', 'SSD 500GB', '2024-09-05', 70.00, 'ref8', '40'),
(9, 'adata', 'RAM 8GB DDR4', '2024-07-07', 75.00, 'ref9', '25'),
(10, 'samsung', 'carte mère B460', '2024-08-25', 140.00, 'ref10', '12'),
(11, 'acer', 'carte mère B450', '2024-10-11', 200.00, 'ref11', '5'),
(12, 'hp', 'processeur i5', '2024-09-14', 300.00, 'ref12', '13'),
(13, 'dell', 'carte graphique RTX 3060', '2024-08-30', 450.00, 'ref13', '18'),
(14, 'zotac', 'carte graphique GTX 1050', '2024-10-03', 350.00, 'ref14', '7'),
(15, 'asrock', 'carte mère Z490', '2024-06-22', 180.00, 'ref15', '9'),
(16, 'nvidia', 'carte graphique RTX 4090', '2024-08-14', 2500.00, 'ref16', '3'),
(17, 'amd', 'processeur Ryzen 9', '2024-09-29', 600.00, 'ref17', '10'),
(18, 'gigabyte', 'alimentation 750W', '2024-10-02', 120.00, 'ref18', '14'),
(19, 'thermaltake', 'boîtier ATX', '2024-07-11', 90.00, 'ref19', '8'),
(20, 'cooler master', 'ventilateur RGB', '2024-10-15', 50.00, 'ref20', '19'),
(23, 'patriot', 'RAM 32GB DDR4', '2024-10-06', 300.00, 'ref23', '5'),
(24, 'asus', 'processeur Ryzen 3', '2024-08-17', 120.00, 'ref24', '16'),
(25, 'msi', 'ventirad AMD', '2024-09-23', 35.00, 'ref25', '25'),
(27, 'gigabyte', 'carte mère X570', '2024-08-28', 170.00, 'ref27', '13'),
(28, 'samsung', 'SSD 500GB NVMe', '2024-07-22', 120.00, 'ref28', '30'),
(29, 'seagate', 'HDD 1TB', '2024-06-21', 60.00, 'ref29', '40'),
(30, 'intel', 'processeur i9', '2024-08-27', 500.00, 'ref30', '6'),
(31, 'adata', 'SSD externe 1TB', '2024-09-10', 150.00, 'ref31', '15'),
(32, 'wd', 'HDD externe 4TB', '2024-10-05', 180.00, 'ref32', '5'),
(33, 'acer', 'carte graphique RTX 2070', '2024-09-08', 700.00, 'ref33', '8'),
(34, 'hp', 'processeur i3', '2024-09-13', 100.00, 'ref34', '10'),
(35, 'kingston', 'RAM 4GB DDR3', '2024-08-15', 40.00, 'ref35', '50'),
(36, 'asrock', 'carte mère B350', '2024-07-17', 130.00, 'ref36', '17'),
(37, 'gigabyte', 'alimentation 850W', '2024-09-19', 140.00, 'ref37', '9'),
(38, 'nvidia', 'carte graphique RTX 3080', '2024-08-11', 1500.00, 'ref38', '12'),
(39, 'thermaltake', 'ventirad RGB', '2024-07-25', 70.00, 'ref39', '18'),
(40, 'cooler master', 'boîtier micro ATX', '2024-09-30', 60.00, 'ref40', '6'),
(42, 'samsung', 'SSD NVMe 1TB', '2024-08-12', 180.00, 'ref42', '7'),
(43, 'seagate', 'HDD 8TB', '2024-07-27', 200.00, 'ref43', '8'),
(44, 'adata', 'SSD portable 2TB', '2024-06-24', 250.00, 'ref44', '5'),
(45, 'patriot', 'RAM 64GB DDR4', '2024-10-04', 500.00, 'ref45', '4'),
(46, 'dell', 'carte graphique RX 5700', '2024-09-20', 800.00, 'ref46', '3'),
(47, 'zotac', 'carte graphique GTX 1660', '2024-08-13', 600.00, 'ref47', '5'),
(48, 'amd', 'processeur Ryzen 7', '2024-07-31', 400.00, 'ref48', '9'),
(49, 'gigabyte', 'carte mère X470', '2024-09-07', 150.00, 'ref49', '14'),
(50, 'acer', 'boîtier tour ATX', '2024-06-29', 110.00, 'ref50', '8'),
(51, 'asus', 'ventilateur CPU', '2024-10-18', 45.00, 'ref51', '20'),
(52, 'msi', 'processeur Ryzen 5 3600', '2024-09-21', 220.00, 'ref52', '14'),
(53, 'corsair', 'RAM 64GB DDR5', '2024-08-10', 550.00, 'ref53', '6'),
(54, 'seagate', 'SSD 2TB', '2024-07-15', 300.00, 'ref54', '12'),
(55, 'gigabyte', 'carte mère B660', '2024-10-12', 190.00, 'ref55', '9'),
(56, 'amd', 'processeur Ryzen 5 5600X', '2024-09-25', 280.00, 'ref56', '7'),
(57, 'intel', 'carte mère Z590', '2024-08-16', 210.00, 'ref57', '11'),
(59, 'adata', 'RAM 8GB DDR5', '2024-06-20', 100.00, 'ref59', '15'),
(60, 'patriot', 'SSD 512GB', '2024-09-17', 90.00, 'ref60', '10'),
(61, 'zotac', 'carte graphique RTX 2060', '2024-10-19', 800.00, 'ref61', '5'),
(62, 'kingston', 'HDD 2TB', '2024-09-11', 95.00, 'ref62', '20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
