-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 29 sep. 2018 à 09:37
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `newyork`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `createdCom` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `newsid`, `author`, `comment`, `createdCom`, `status`) VALUES
(1, 1, 'Julien', 'Bonjour', '2018-08-10 10:17:49', 0),
(2, 2, 'Julien', 'Essai', '2018-08-13 13:11:01', 0),
(3, 2, 'Julien ', 'Bonjour', '2018-08-16 17:38:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(255) UNSIGNED NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `mail` varchar(191) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `mail`, `password`) VALUES
(1, 'admin', 'jbeunaiche@gmail.com', '$2y$12$af6KzNLzRCgUxnninYhReO41ZVa8.d96DuZRL9JBUpSI0wyhncYiu');

-- --------------------------------------------------------

--
-- Structure de la table `monument`
--

CREATE TABLE `monument` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lon` float NOT NULL,
  `lat` float NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monument`
--

INSERT INTO `monument` (`id`, `name`, `lon`, `lat`, `price`) VALUES
(1, 'Statue de la Liberté', -74.0445, 40.6893, '40'),
(2, 'Ground Zero', -74.0131, 40.7118, '40'),
(3, 'Washington Square', -73.9973, 40.7308, '0'),
(4, 'Empire State Building', -73.9858, 40.7485, '40'),
(5, 'World Trade Center', -74.0131, 40.7118, '30'),
(6, 'Times Square', -73.9851, 40.7589, '0'),
(7, 'Madame Tussauds', -73.9888, 40.7564, '35'),
(8, 'The Metropolitan Museum of Art ', -73.9632, 40.7794, '20'),
(9, 'Central Park', -73.9654, 40.7829, '0'),
(10, 'High Line', -74.0048, 40.748, '0'),
(11, 'Governors Island', -74.0168, 40.6894, '0'),
(12, 'Fort Greene Park', -73.9751, 40.6914, '0'),
(13, 'Taureau de Wall Street ', -74.0134, 40.7056, '0'),
(14, 'Cathédrale Saint Patrick', -73.976, 40.7585, '10'),
(15, 'Rockefeller Center', -73.9787, 40.7587, '40'),
(16, 'MoMa', -73.9776, 40.7614, '35'),
(17, 'Radio City Music Hall', -73.98, 40.76, '15'),
(18, '58 Joralemon Street', -73.9974, 40.6936, '0'),
(19, 'Williamsburg', -73.9578, 40.7072, '0'),
(20, 'Brooklyn Bridge Park', -73.9981, 40.6994, '0'),
(21, 'Barclays Center', -73.9753, 40.6825, '40');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created`) VALUES
(1, 'Fête du hamburger', 'Le 18 septembre a lieu la fête national du hamburger. Chacun a son goût, mais ce restaurant est dans le top 5 pour tout le monde. Five Napkin Burger est un restaurant où l’on peut manger des hamburgers, du sushi et d’autres plats. Le meilleur hamburger est l’Original 5 Napkin Burger avec du fromage spécial et de la sauce.', '2018-09-26 13:00:00'),
(2, '11 Septembre ', 'Commémoration du 11 septembre..', '2018-09-21 11:18:18'),
(3, 'NBA', 'Match de pré-saison NBA au Madison Square Garden. ', '2018-09-26 09:10:05'),
(4, 'San Gennaro - Little Italy', 'C\'est la fête religieuse la plus ancienne et la plus populaire des américains d\'origine italienne. Durant 10 jours, San Gennaro, le saint patron de Naples, est célébré dans tout le pays, et notamment à NY à Little Italy par un festival du 13 au 23 Septembre 2018.', '2018-09-28 15:10:08'),
(5, 'New York Comic Con', 'La New York Comic Con est la plus grosse convention sur le thème de la bande dessinée d\'Amérique du Nord. Elle rassemble les fanatiques de comics et bien plus encore. Plus de 200.000 personnes y ont participé l\'an passé ! En 2018, New York Comic Con a lieu du 4 au 7 octobre.', '2018-09-28 10:21:09'),
(6, 'Columbus Day', 'Tous les 2ème lundi d\'octobre, on commémore la découverte de l\'Amérique par Christophe Colomb en 1492. Pour célébrer l\'évènement, tous les ans est organisée la Columbus Day Parade. Cette année, elle aura lieu le lundi 08 Octobre 2018 de 11h30 à 15h00. Le point de départ se situe à l\'angle de fifth avenue et de 44th Street, puis le cortège remonte le long de 72nd Street.\r\nSachez aussi qu\'une messe est organisée à 9h30 à la Cathédrale St Patrick en l\'honneur de Christophe Colomb.', '2018-09-28 11:18:14'),
(12, 'Le weekend Open House New York', 'Le week-end du 13 et 14 octobre 2018 est organisé l\'Open House New York. Lors de cet événement, vous pouvez visiter plus de 200 immeubles et structures privés dans tous les boroughs de New York (Manhattan, Queens, Bronx, Brooklyn et Staten Island). Il permet aux résidents et aux visiteurs de la ville de voir New York sous un angle différent en leur permettant de visiter des endroits qu\'il est habituellement impossible à voir, car hors limites ou tout simplement privés. Cela ressemble à nos Journées du Patrimoine en France.', '2018-09-28 13:17:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_id` (`newsid`) USING BTREE;

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `pseudo_2` (`pseudo`,`mail`),
  ADD UNIQUE KEY `pseudo_3` (`pseudo`,`mail`),
  ADD UNIQUE KEY `pseudo_4` (`pseudo`),
  ADD UNIQUE KEY `mail_2` (`mail`);

--
-- Index pour la table `monument`
--
ALTER TABLE `monument`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `monument`
--
ALTER TABLE `monument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `newsid_name` FOREIGN KEY (`newsid`) REFERENCES `news` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
