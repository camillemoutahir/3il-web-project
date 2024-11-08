-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-camillem.alwaysdata.net
-- Generation Time: Nov 07, 2024 at 12:26 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camillem_site_bijoux`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `email`, `telephone`, `adresse`) VALUES
(1, 'Jewels Company', 'jewels-company@company.com', '0945761238', '57 rue Nelson Mandela');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `description_text` text NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id`, `image_url`, `description_text`, `prix`, `categorie`) VALUES
(1, 'bague-en-3-ors.jpg', 'Bague en 3 ors', 340.6, 'bague'),
(2, 'bague-en-or-jaune.jpg', 'Bague en or', 77, 'bague'),
(3, 'boucles-d-oreilles-en-or-jaune-perle-de-culture-cabochon-d-eau-douce-9-95-mm.jpg', 'Boucles d\'oreilles en or', 70.8, 'boucles d\'oreilles'),
(4, 'chaine-en-or-jaune-maille-forcat.jpg', 'Chaine en or maille forcat', 87, 'collier'),
(5, 'creoles-en-or-jaune.jpg', 'Créoles en or jaune', 86.5, 'boucles d\'oreilles'),
(8, 'collier-en-or-jaune-et-perle-de-culture.jpg', 'Collier en or jaune et perle', 274.6, 'collier'),
(9, 'boucles-d-oreilles-en-plaque-or-et-oxydes-de-zirconium.jpg', 'Boucles d\'oreilles plaque or et zirconium', 21.2, 'boucles d\'oreilles'),
(10, 'bracelet-jonc-en-argent-rhodie.jpg', 'Bracelet jonque en argent rhodié', 92.8, 'bracelet');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`id`, `contenu`) VALUES
(1, 'Bienvenue sur notre site de bijoux, où l\'artisanat et l\'élégance se rencontrent.\n'),
(3, 'Découvrez notre sélection de bijoux uniques et précieux, conçus avec passion et minutie par une petite équipe d\'artisans talentueux.'),
(4, 'Chaque pièce est fabriquée à la main avec des matériaux de la plus haute qualité, garantissant non seulement beauté, mais aussi durabilité.\r\n'),
(5, 'Nous avons soigneusement sélectionné des designs qui allient tradition et modernité pour satisfaire tous les goûts et styles.\r\n'),
(6, 'Nos créations sont plus qu\'un simple accessoire : elles sont le reflet de notre engagement envers la qualité et l\'authenticité, et un hommage à la beauté de l\'artisanat fait main.\r\n'),
(7, 'Explorez notre collection complète en cliquant sur le bouton ci-dessous : vous y trouverez des descriptions détaillées, des images captivantes et des informations sur chaque bijou.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
