-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 04 oct. 2018 à 13:53
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
(3, 2, 'Julien ', 'Bonjour', '2018-08-16 17:38:42', 0),
(50, 4, 'Julien', 'Super fête', '2018-10-03 14:56:54', 0),
(51, 4, 'Bernard', 'Oui\r\n', '2018-10-03 14:57:10', 0),
(52, 1, 'Julien', 'Miam', '2018-10-03 14:58:01', 0),
(53, 2, 'Julien', 'A voir !', '2018-10-03 14:58:22', 0),
(54, 3, 'Julien', 'Vivement le début de la saison', '2018-10-03 14:58:37', 0),
(55, 3, 'Toto', 'Oui !!!', '2018-10-03 14:58:43', 0),
(56, 5, 'Julien', 'Grosse convention. ', '2018-10-03 14:59:10', 0),
(57, 5, 'Toto', 'Oui j\'ai hâte d\'y être.', '2018-10-03 14:59:25', 0),
(58, 6, 'Julien', 'Une belle fête. ', '2018-10-03 14:59:40', 0),
(59, 6, 'Mathieu', 'Non je ne trouve pas ', '2018-10-03 14:59:53', 0),
(60, 7, 'Julien', 'ça va être super ! ', '2018-10-03 15:00:12', 0),
(61, 7, 'Bernard', 'Oui !', '2018-10-03 15:00:18', 0),
(62, 1, 'Bernard', 'De super burger au 5 Nap\'', '2018-10-03 15:01:05', 0),
(63, 7, 'Julien', 'Rendez-vous sur la 5ème avenue :) ', '2018-10-03 15:04:07', 0);

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
  `description` text NOT NULL,
  `lon` float NOT NULL,
  `lat` float NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monument`
--

INSERT INTO `monument` (`id`, `name`, `description`, `lon`, `lat`, `price`) VALUES
(1, 'Statue de la Liberté', 'La Statue de la Liberté est une immense statue. Elle mesure 46 mètres de haut, mais sa flamme se dresse à 93 mètres grâce à un socle massif et impressionnant sur lequel elle se dresse. L’œuvre est signée du sculpteur français Auguste Bartholdi, mais ce sont les ateliers de Gustave Eiffel qui ont réalisé sa structure intérieure.', -74.0445, 40.6893, '40'),
(2, 'Ground Zero', 'Le site du World Trade Center est un terrain de 16 acres (6,47 ha) sur lequel se tenait le complexe du WTC jusqu\'aux attentats du 11 septembre 2001. Le site se situe dans l\'ouest du quartier de Lower Manhattan à New York, dont la majeure partie est délimitée au nord par Vesey Street, à l\'ouest par West Side Highway, au sud par Liberty Street et à l\'est par Church Street. Dans la partie nord du site en face de Vesey Street, l\'ancienne position du 7 World Trade Center est délimitée à l\'ouest par Washington Street, au nord par Barclay Street, et à l\'est par West Broadway.', -74.0131, 40.7118, '40'),
(3, 'Washington Square', 'Washington Square Park est un parc de la ville de New York, situé dans le sud de l\'arrondissement de Manhattan dans le quartier de Greenwich Village.', -73.9973, 40.7308, '0'),
(4, 'Empire State Building', 'L’Empire State Building est un gratte-ciel de style Art déco situé dans l\'arrondissement de Manhattan, à New York. Il est situé dans le quartier de Midtown au 350 de la 5? Avenue, entre les 33? et 34? rues. Inauguré le 1?? mai 1931, il mesure 381 mètres et compte 102 étages. ', -73.9858, 40.7485, '40'),
(5, 'World Trade Center', '', -74.0131, 40.7118, '30'),
(6, 'Times Square', 'Times Square à New York est la place la plus fréquentée de Manhattan. Sur cette place, surnommée Cross of the World (Carrefour du Monde), vous trouverez de nombreux écrans LED et personnages costumés. C’est un excellent endroit pour prendre un selfie et l’un des sites incontournables de New York. Ce n’est que récemment que Times Square a repris de la vigueur. Durant les années 1990, l’ancien maire Giuliani a mis tous ses efforts pour améliorer la place. Aidé par Walt Disney, il l’a transformée en un spectacle architectural et de lumières.', -73.9851, 40.7589, '0'),
(7, 'Madame Tussauds', 'Le musée de Madame Tussauds de New York est un lieu qui plaira à tous ! Il abrite des statues de cire de personnalités : chanteurs, personnages de bandes-dessinés, politiciens… Vous rencontrerez de nombreuses célébrités et ici vous serez sûre de voir votre/vos star(s) préférée(s) !', -73.9888, 40.7564, '35'),
(8, 'The Metropolitan Museum of Art ', 'Le Metropolitan Museum of Art de New York est l’un des plus grands musées d’art au monde. Ouvert au public depuis le 20 février 1872, il est situé dans l\'arrondissement de Manhattan, du côté de Central Park sur la Cinquième avenue et à la hauteur de la 82? rue', -73.9632, 40.7794, '20'),
(9, 'Central Park', 'Central Park est un immense parc au cœur de Manhattan. Le parc, qui s’étend de la 59th à la 110th Street (de la Fifth à la 8th Avenue), a été aménagé, mais vous y trouverez toujours des parties de nature sauvage. Central Park accueille plus de 42 millions de visiteurs par an : c’est le poumon vert de Manhattan, New York. Les voiture sont bannies de nombreuses routes à Central Park et le parc offre une grande diversité de sites touristiques et d’activités. Été ou hiver, on ne s’y ennuie jamais !', -73.9654, 40.7829, '0'),
(10, 'High Line', 'La High Line connue aussi sous le nom de High Line Park est un parc linéaire urbain suspendu de l\'arrondissement de Manhattan à New York, aménagé sur une portion désaffectée des anciennes voies ferrées aériennes du Lower West Side.', -74.0048, 40.748, '0'),
(11, 'Governors Island', 'Governors Island est une île de 70 hectares, située dans la baie supérieure de New York, à environ 1 km au sud de Manhattan. Elle est séparée de Brooklyn par le Buttermilk Channel. De 1776 à 1996, ce site fut une base de l\'Armée américaine, et des garde-côtes.', -74.0168, 40.6894, '0'),
(12, 'Fort Greene Park', '', -73.9751, 40.6914, '0'),
(13, 'Taureau de Wall Street ', 'Le taureau de Wall Street est une sculpture en bronze de l\'artiste Arturo Di Modica située au Bowling Green Park près de la bourse de New York aux États-Unis', -74.0134, 40.7056, '0'),
(14, 'Cathédrale Saint Patrick', 'La cathédrale Saint-Patrick de New York, construite entre 1853 et 1878, est située dans le quartier de gratte-ciel de Midtown à New York, en plein cœur de l\'arrondissement de Manhattan. Elle se trouve à l\'angle de la Cinquième avenue et de la 50? Rue, à deux pas du Rockefeller Center et non loin de Central Park. ', -73.976, 40.7585, '10'),
(15, 'Rockefeller Center', 'Le Rockefeller Center est un complexe commercial construit par la famille Rockefeller composé de dix-neuf bâtiments. Il est situé dans le quartier de Midtown, entre la 5? avenue et l\'avenue des Amériques de l\'arrondissement de Manhattan de la ville de New York.', -73.9787, 40.7587, '40'),
(16, 'MoMa', 'Le Museum of Modern Art est un musée d\'art moderne et contemporain inauguré en 1929 et aujourd\'hui situé dans le quartier de Midtown dans l\'arrondissement de Manhattan, à New York.', -73.9776, 40.7614, '35'),
(17, 'Radio City Music Hall', 'Le Radio City Music Hall est une salle de spectacle située dans le Rockefeller Center dans le quartier de Midtown à New York. C’est dans ce lieu que se produisent notamment The Rockettes, groupe de danse féminin qui existe depuis 50 ans.', -73.98, 40.76, '15'),
(18, '58 Joralemon Street', 'Le 58 Joralemon Street est un immeuble factice du quartier de Brooklyn Heights à New York. Sa façade cache un puits de ventilation du métro de New York. Édifié en 1847, l\'immeuble a été transformé en 1908 en gaine de ventilation du métro avec une façade de style Greek Revival.', -73.9974, 40.6936, '0'),
(19, 'Williamsburg', 'Williamsburg est un quartier de la ville de New York, situé dans l\'arrondissement de Brooklyn. Le quartier a donné son nom au pont de Williamsburg, qui relie Brooklyn à l\'East Village et au Lower East Side, situés à Manhattan, en chevauchant l\'East River.', -73.9578, 40.7072, '0'),
(20, 'Brooklyn Bridge Park', 'Brooklyn Bridge Park est un parc de 85 hectares situé sur le côté de Brooklyn de l\'East River à New York. ', -73.9981, 40.6994, '0'),
(21, 'Barclays Center', 'Le Barclays Center est une salle omnisports située dans l\'arrondissement de Brooklyn à New York. Sa capacité est de 17 732 places pour les rencontres de basket-ball. Elle accueille les matchs à domicile des Nets de Brooklyn, une équipe de basket-ball évoluant dans la National Basketball Association.', -73.9753, 40.6825, '40');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created`) VALUES
(1, 'Fête du hamburger', 'Le 18 septembre a lieu la fête national du hamburger.', '', '2018-09-26 13:00:00'),
(2, '11 Septembre ', 'Commémoration', '', '2018-09-21 11:18:18'),
(3, 'NBA', 'Match de pré-saison NBA au Madison Square Garden. ', '', '2018-09-26 09:10:05'),
(4, 'San Gennaro - Little Italy', 'C\'est la fête religieuse la plus ancienne et la plus populaire des américains d\'origine italienne. Durant 10 jours, San Gennaro, le saint patron de Naples, est célébré dans tout le pays, et notamment à NY à Little Italy par un festival du 13 au 23 Septembre 2018.', '', '2018-09-28 15:10:08'),
(5, 'New York Comic Con', 'La New York Comic Con est la plus grosse convention sur le thème de la bande dessinée d\'Amérique du Nord. Elle rassemble les fanatiques de comics et bien plus encore. Plus de 200.000 personnes y ont participé l\'an passé ! En 2018, New York Comic Con a lieu du 4 au 7 octobre.', '', '2018-09-28 10:21:09'),
(6, 'Columbus Day', 'Tous les 2ème lundi d\'octobre, on commémore la découverte de l\'Amérique par Christophe Colomb en 1492. Pour célébrer l\'évènement, tous les ans est organisée la Columbus Day Parade. Cette année, elle aura lieu le lundi 08 Octobre 2018 de 11h30 à 15h00. Le point de départ se situe à l\'angle de fifth avenue et de 44th Street, puis le cortège remonte le long de 72nd Street.\r\nSachez aussi qu\'une messe est organisée à 9h30 à la Cathédrale St Patrick en l\'honneur de Christophe Colomb.', '', '2018-09-28 11:18:14'),
(7, 'Le weekend Open House New York', 'Le week-end du 13 et 14 octobre 2018 est organisé l\'Open House New York. Lors de cet événement, vous pouvez visiter plus de 200 immeubles et structures privés dans tous les boroughs de New York (Manhattan, Queens, Bronx, Brooklyn et Staten Island). Il permet aux résidents et aux visiteurs de la ville de voir New York sous un angle différent en leur permettant de visiter des endroits qu\'il est habituellement impossible à voir, car hors limites ou tout simplement privés. Cela ressemble à nos Journées du Patrimoine en France.', '', '2018-09-28 13:17:17');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `monument`
--
ALTER TABLE `monument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
