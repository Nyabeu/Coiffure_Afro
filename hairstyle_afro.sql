-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 jan. 2020 à 18:57
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hairstyle_afro`
--

-- --------------------------------------------------------

--
-- Structure de la table `category_hairstyle`
--

DROP TABLE IF EXISTS `category_hairstyle`;
CREATE TABLE IF NOT EXISTS `category_hairstyle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_hairstyle`
--

INSERT INTO `category_hairstyle` (`id`, `name`, `picture`) VALUES
(1, 'Rasta', 'rasta-5e11f75b053aa.jpeg'),
(2, 'Tissage', 'tissage-5e11f75b053aa.jpeg'),
(3, 'Natte', 'natte-5e11f75b053aa.jpeg'),
(4, 'Nappy', 'nappy-5e11f75b053aa.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Antony'),
(2, 'Boulogne-Billancourt'),
(3, 'Châtenay-Malabry'),
(4, 'Drancy'),
(5, 'Evry-Courcouronnes'),
(6, 'Fontenay-aux-Roses'),
(7, 'Grigny'),
(8, 'Herblay-sur-Seine'),
(9, 'Issy-les-Moulineaux'),
(10, 'Les ulis'),
(11, 'Montrouge'),
(12, 'Nogent-sur-Marne'),
(13, 'Orly'),
(14, 'Paris'),
(15, 'Rueil-Malmaison'),
(16, 'Saint-Denis'),
(17, 'Versailles');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `city_contact_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E6388AD895BD` (`city_contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200113094653', '2020-01-13 09:47:30'),
('20200113095039', '2020-01-13 09:50:47'),
('20200113103705', '2020-01-13 10:37:21'),
('20200113131854', '2020-01-13 13:19:35'),
('20200113144605', '2020-01-13 14:46:54');

-- --------------------------------------------------------

--
-- Structure de la table `model_hairstyle`
--

DROP TABLE IF EXISTS `model_hairstyle`;
CREATE TABLE IF NOT EXISTS `model_hairstyle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoty_hairstyle_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8961142F10B419F5` (`categoty_hairstyle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_hairstyle`
--

INSERT INTO `model_hairstyle` (`id`, `categoty_hairstyle_id`, `name`, `picture`, `model`, `description`, `price`) VALUES
(5, 3, 'File', 'file-5e1c53d984e98.jpeg', 'Longue', 'Très jolie coiffure pour enfant', 15),
(6, 1, 'Laine', 'laine-5e1c54ca708b5.jpeg', 'Moyenne', 'Meilleur modèle', 60),
(7, 1, 'Piqué Laissé', 'piquelaisse-5e1c5530e3ece.jpeg', 'Longue', 'Nous vous proposons des mèches piqué-lâché en CHEVEUX VIERGES BRESILIENS REMY (racine avec racine, et bouts avec bouts dans la même direction). La pose de Piqué Lâché (Mega Hair ou Fio a Fio au Brésil) , technique de pose d\'extensions indétectable...', 50),
(8, 3, 'Tresse', 'tresse-5e1c55b560109.jpeg', 'Moyenne', 'Une tresse ou natte est une manière d\'assembler par entrelacement des cheveux, des fils ou faisceaux de fils. Elle est utilisée entre autres dans la confection de cordes. La tresse la plus courante est un entrelacement de trois fils ou faisceaux de fils', 7),
(9, 2, 'Greffe Bresilienne avec raie au milieu', 'orianemin-5e1c5703149e2.jpeg', 'Moyenne', 'Jolie coiffure', 30),
(11, 4, 'Mini nappy', 'nappy-5e1c57d144c5f.jpeg', 'Court', 'Très petit', 10),
(12, 1, 'Gros rasta', 'rastasimple-5e1c604672794.jpeg', 'Longue', 'Coiffure et Idées de coiffures...', 40),
(13, 4, 'Long nappy', 'longnappy-5e1c962b5b320.jpeg', 'Longue', 'Jolie coiffure pour mannequin', 30);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E6388AD895BD` FOREIGN KEY (`city_contact_id`) REFERENCES `city` (`id`);

--
-- Contraintes pour la table `model_hairstyle`
--
ALTER TABLE `model_hairstyle`
  ADD CONSTRAINT `FK_8961142F10B419F5` FOREIGN KEY (`categoty_hairstyle_id`) REFERENCES `category_hairstyle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
