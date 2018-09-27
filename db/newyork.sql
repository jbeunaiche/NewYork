-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 26 sep. 2018 à 14:39
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
  `postid` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `createdCom` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `postid`, `author`, `comment`, `createdCom`, `status`) VALUES
(1, 1, 'Julien', 'Bonjour', '2018-09-19 11:12:13', 1),
(2, 2, 'Julien', 'Bonjour', '2018-09-19 11:12:13', 1),
(3, 2, 'Julien', 'Essai', '2018-09-19 09:18:16', 1);

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
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`) VALUES
(1, 'Fête du hamburger', 'Le 18 septembre a lieu la fête national du hamburger. Chacun a son goût, mais ce restaurant est dans le top 5 pour tout le monde. Five Napkin Burger est un restaurant où l’on peut manger des hamburgers, du sushi et d’autres plats. Le meilleur hamburger est l’Original 5 Napkin Burger avec du fromage spécial et de la sauce.'),
(2, '11 Septembre ', 'Commémoration du 11 septembre..'),
(3, 'Fête du hamburger', 'Le 18 septembre a lieu la fête national du hamburger. Chacun a son goût, mais ce restaurant est dans le top 5 pour tout le monde. Five Napkin Burger est un restaurant où l’on peut manger des hamburgers, du sushi et d’autres plats. Le meilleur hamburger est l’Original 5 Napkin Burger avec du fromage spécial et de la sauce.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_id` (`postid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
