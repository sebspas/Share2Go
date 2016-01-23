-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  sharegofhwroot.mysql.db
-- Généré le :  Sam 31 Octobre 2015 à 11:01
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sharegofhwroot`
--

-- --------------------------------------------------------

--
-- Structure de la table `effectue`
--

CREATE TABLE IF NOT EXISTS `effectue` (
  `idtrajet` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `effectue`
--

INSERT INTO `effectue` (`idtrajet`, `iduser`) VALUES
(19, 15),
(20, 15),
(21, 14),
(21, 12),
(22, 14),
(22, 15),
(24, 12),
(24, 15),
(19, 16),
(23, 18),
(23, 13),
(24, 19),
(27, 19),
(22, 22),
(28, 22),
(22, 25),
(29, 13),
(30, 13);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idmessage` int(11) NOT NULL,
  `message` longtext,
  `date` datetime DEFAULT NULL,
  `idauteur` int(11) NOT NULL,
  `idtrajet` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idmessage`, `message`, `date`, `idauteur`, `idtrajet`) VALUES
(43, 'BIJOUR\r\n', '2015-01-04 18:38:45', 14, 21),
(44, 'salut les pd !\r\n', '2015-01-04 18:38:57', 14, 20),
(45, 'Jourbon\r\n', '2015-01-04 18:39:49', 15, 22),
(46, 'Bijour\r\n', '2015-01-04 18:40:09', 14, 22),
(47, 'Bonjour\r\n', '2015-01-04 18:40:15', 15, 22),
(48, 'Bonsoir, Ã  quel endroit pouvez-vous me prendre ?', '2015-01-04 18:40:22', 13, 19),
(49, 'Bonjour', '2015-01-04 18:41:35', 12, 24),
(50, 'Bonjour :)', '2015-01-04 18:41:58', 16, 24),
(51, 'Salut !', '2015-01-04 18:48:17', 13, 20),
(52, 'Bijour', '2015-01-04 18:48:32', 13, 21),
(53, 'Salut !', '2015-01-04 18:48:51', 13, 22),
(54, 'Hello :)\r\n', '2015-01-04 23:42:32', 15, 24),
(55, 'Hello.', '2015-01-05 00:22:29', 18, 23),
(56, 'Hello', '2015-01-06 19:28:45', 13, 23),
(57, 'test', '2015-01-07 23:01:46', 13, 21),
(58, '', '2015-01-08 00:11:36', 13, 21),
(59, '', '2015-01-08 00:11:38', 13, 21),
(60, '', '2015-01-08 00:11:39', 13, 21),
(61, 'Yop :)\r\n', '2015-01-11 22:37:53', 19, 24),
(62, 'bonjour !', '2015-01-26 08:43:42', 12, 22),
(63, 'Hello\r\n', '2015-07-07 13:44:07', 30, 28),
(64, 'hg', '2015-07-07 13:51:34', 30, 22),
(65, 'sdfdfs', '2015-07-08 14:49:07', 30, 28);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `idtrajet` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `villedep` varchar(45) DEFAULT NULL,
  `villearr` varchar(45) DEFAULT NULL,
  `heuredep` time DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `nbplace` int(11) DEFAULT NULL,
  `nonfumeur` int(11) DEFAULT NULL,
  `musique` int(11) DEFAULT NULL,
  `valise` int(11) DEFAULT NULL,
  `bavar` int(11) DEFAULT NULL,
  `com` longtext,
  `idauteur` int(11) NOT NULL,
  `idvehicule` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `trajet`
--

INSERT INTO `trajet` (`idtrajet`, `date`, `villedep`, `villearr`, `heuredep`, `prix`, `nbplace`, `nonfumeur`, `musique`, `valise`, `bavar`, `com`, `idauteur`, `idvehicule`) VALUES
(19, '2015-01-05', 'Aix-en-Provence', 'Marseille', '07:05:00', 3, 0, 1, 1, 0, 1, '', 13, 14),
(20, '2015-12-25', 'Bagnols-sur-CÃ¨ze', 'Toulon', '10:45:00', 10, 0, 0, 0, 0, 0, '', 14, 15),
(21, '2015-03-22', 'Peypin', 'Aix-en-Provence', '20:00:00', 55, 0, 1, 1, 0, 0, 'Oh yeah\r\n', 15, 16),
(22, '2015-02-21', 'Ã‰guilles', 'Aix-en-Provence', '06:00:00', 1, 1, 1, 0, 0, 0, '', 12, 13),
(23, '2015-12-15', 'Souque Negre', 'Les Crottes', '20:00:00', 26, 0, 0, 1, 0, 1, 'Babar', 15, 16),
(24, '2015-02-02', 'Calas', 'Paris', '04:35:00', 48, 0, 0, 0, 1, 1, '', 16, 17),
(27, '2015-01-30', 'Aix-en-Provence', 'Aubagne', '12:15:00', 1, 0, 0, 0, 1, 0, 'Mon dernier trajet.', 13, 14),
(28, '2015-02-26', 'Aix-en-Provence', 'BollÃ¨ne', '12:15:00', 13, 2, 0, 1, 1, 0, 'C''est la fin...', 19, 20),
(29, '2015-01-30', 'Aix-en-Provence', 'Peypin', '12:00:00', 25, 1, 1, 1, 1, 1, '', 22, 21),
(30, '2015-01-30', 'Aix-en-Provence', 'Marignane', '18:00:00', 3, 2, 0, 1, 0, 1, 'Mon trajet du retour tous les vendredis, on rentre Ã  la maison ! :)', 25, 22);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `age` date DEFAULT NULL,
  `sexe` varchar(6) DEFAULT NULL,
  `mdp` varchar(256) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `avatar` longtext,
  `note` int(11) DEFAULT '0',
  `lastco` datetime DEFAULT NULL,
  `online` int(11) DEFAULT '0',
  `permis` int(11) DEFAULT NULL,
  `dateinscription` date DEFAULT NULL,
  `nbtrajet` int(11) DEFAULT '0',
  `banni` int(11) DEFAULT '0',
  `tokens` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `age`, `sexe`, `mdp`, `tel`, `mail`, `avatar`, `note`, `lastco`, `online`, `permis`, `dateinscription`, `nbtrajet`, `banni`, `tokens`) VALUES
(12, 'CARLIER', 'Charles-Henri', '1993-08-21', 'Homme', '897f2415fde7041dc792dcb43f18ee37a262018e', '0650512660', 'aimezlavie@hotmail.fr', 'avatar/12.jpeg', 0, '2015-01-26 08:41:34', 0, 1, '2015-01-04', 1, 0, '0'),
(13, 'Corral', 'jonathan', '1994-05-06', 'Homme', 'cb60fd97408f218f69a00a84a7d8807dd9952aa9', '0612345678', 'johnlejardinnier@gmail.com', 'avatar/13.jpeg', 0, '2015-10-18 11:41:05', 0, 1, '2015-01-04', 1, 0, '0'),
(14, 'Corfa', 'Sebastien', '1995-11-22', 'Homme', '1c1b7543ac378fd5b72045f16553bf5f56b89587', '0750917831', 'sebspas@gmail.com', 'avatar/14.jpeg', 0, '2015-09-08 09:04:19', 0, 1, '2015-01-04', 0, 0, '0'),
(15, 'Bayle', 'Pierre', '1994-03-06', 'Homme', '235e14a5e912d8293f58a395078819af66428d74', '0623252629', 'piebay13@laposte.net', 'avatar/15.jpeg', 0, '2015-01-07 23:01:28', 1, 1, '2015-01-04', 2, 1, '55b424bc72868aee77f8015d30863ea33ee2ff86'),
(16, 'Coder', 'Marie', '1996-03-01', 'Femme', '079299528f9dda0694dd871e3fe92eed47b765f1', '0669696969', 'bob.est.votre.ami@hotmail.fr', 'avatar/16.jpeg', 0, '2015-01-07 22:28:29', 0, 1, '2015-01-04', 1, 1, 'fcec229c3340629399727fb36cc40236c8844b14'),
(17, 'Coadalen', 'Kenny', '1994-01-29', 'Homme', '0b619a429e9d8539adfe3545fc00c41df33d8363', '0621489647', 'kennycg13@hotmail.fr', 'avatar/17.jpeg', 0, '2015-07-16 19:26:01', 0, 1, '2015-01-04', 1, 0, '0'),
(18, 'Chazeau', 'Nicolas', '1994-01-08', 'Homme', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '0770011816', 'n.chazeau@laposte.net', 'avatar/default.png', 0, '2015-01-25 22:39:17', 1, 1, '2015-01-05', 0, 0, NULL),
(19, 'corfa', 'sebastien', '1995-11-22', 'Homme', '1c1b7543ac378fd5b72045f16553bf5f56b89587', '0750917831', 'sebastien.corfa@etu.univ-amu.fr', 'avatar/19.jpeg', 0, '2015-01-30 14:28:46', 1, 1, '2015-01-07', 1, 0, NULL),
(20, 'Coadalen', 'Kenny', '1994-01-29', 'Homme', '0b619a429e9d8539adfe3545fc00c41df33d8363', '0621489647', 'Kenny.COADALEN-GUILBAUD@etu.univ-amu.fr', 'avatar/default.png', 0, '2015-01-09 15:17:30', 0, 1, '2015-01-09', 0, 0, '0'),
(21, 'Compte', 'Demo', '1990-01-01', 'Homme', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0100000000', 'compte.demo@univ-amu.fr', 'avatar/default.png', 0, '2015-01-25 21:00:44', 1, 1, '2015-01-11', 0, 0, 'c810c9ec4e4d10977805c7b35a00d0d6836b84ca'),
(22, 'Bayle', 'Pierre', '1994-03-06', 'Homme', '1bd5205a512f55a7f5244d280295a9926d2703b2', '0632548963', 'pierre.bayle@etu.univ-amu.fr', 'avatar/22.jpeg', 0, '2015-01-11 22:36:25', 0, 1, '2015-01-11', 1, 0, '0'),
(25, 'Coustellier', 'Magali', '1995-11-21', 'Femme', '042ebebbb4bbf2fb917520c772513c4ae1e0f8b2', '0123456789', 'magali.coustellier@etu.univ-amu.fr', 'avatar/default.png', 0, '2015-04-04 11:43:37', 1, 1, '2015-01-12', 1, 0, '0'),
(26, 'coucou', 'Vincent', '1994-10-07', 'Homme', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', '0684320000', 'vincent.desmazieres@univ-amu.fr', 'avatar/default.png', 0, NULL, 0, 1, '2015-01-14', 0, 1, '88629fa926e312afa7684eab47566d53ae23f3f2'),
(27, 'coucou', 'Vincent', '1994-10-07', 'Homme', '5ed25af7b1ed23fb00122e13d7f74c4d8262acd8', '0684320000', 'vincent.desmazieres@etu.univ-amu.fr', 'avatar/default.png', 0, '2015-01-14 10:37:36', 0, 1, '2015-01-14', 0, 0, '0'),
(28, 'CODER', 'Marie', '1996-03-01', 'Femme', '079299528f9dda0694dd871e3fe92eed47b765f1', '0611111111', 'marie.coder@etu.univ-amu.fr', 'avatar/default.png', 0, NULL, 0, 0, '2015-01-25', 0, 1, 'cfa015fdce4abd30096dfc4c22b06816d8e92221'),
(29, 'Magali', 'Coustellier', '1995-11-21', 'Femme', '042ebebbb4bbf2fb917520c772513c4ae1e0f8b2', '0678177127', 'magali.coustellier@univ-amu.fr', 'avatar/default.png', 0, NULL, 0, 1, '2015-04-04', 0, 1, '0a6e61bddc788e92a1d115a3acf3316e6f4f695f'),
(30, 'corral', 'Jonathan', '1994-05-06', 'Homme', '09dc6e30a6c1ad329c02d3d9a081e7fa18401cfa', '0698868153', 'jonathan.corral@etu.univ-amu.fr', 'avatar/default.png', 0, '2015-07-18 13:14:44', 1, 0, '2015-07-07', 0, 0, '0');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `idvehicule` int(11) NOT NULL,
  `marque` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `nbplace` int(11) DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`idvehicule`, `marque`, `model`, `nbplace`, `iduser`) VALUES
(13, 'Audi', 'R8', 5, 12),
(14, 'Audi', 'R8', 1, 13),
(15, 'Mercedes-Benz', 'Serie 3', 3, 14),
(16, 'Audi', 'R8', 3, 15),
(17, 'Chevrolet', 'Mondeo', 3, 16),
(18, 'Renault', 'Clio III', 3, 17),
(19, 'Renault', 'Megane', 3, 17),
(20, 'Porsche', 'Cayenne', 4, 19),
(21, 'Peugeot', '308', 3, 22),
(22, 'Volkswagen', 'Polo', 3, 25),
(23, 'CitroÃ«n', 'C3', 4, 13);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `effectue`
--
ALTER TABLE `effectue`
  ADD KEY `fk_trajet_has_user_user1_idx` (`iduser`),
  ADD KEY `fk_trajet_has_user_trajet_idx` (`idtrajet`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_message_user1_idx` (`idauteur`),
  ADD KEY `fk_message_trajet1_idx` (`idtrajet`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`idtrajet`),
  ADD KEY `fk_trajet_user1_idx` (`idauteur`),
  ADD KEY `fk_trajet_vehicule1_idx` (`idvehicule`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`idvehicule`),
  ADD KEY `fk_vehicule_user1_idx` (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `idtrajet` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `idvehicule` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `effectue`
--
ALTER TABLE `effectue`
  ADD CONSTRAINT `fk_trajet_has_user_trajet` FOREIGN KEY (`idtrajet`) REFERENCES `trajet` (`idtrajet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trajet_has_user_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_trajet1` FOREIGN KEY (`idtrajet`) REFERENCES `trajet` (`idtrajet`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`idauteur`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `fk_trajet_user1` FOREIGN KEY (`idauteur`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trajet_vehicule1` FOREIGN KEY (`idvehicule`) REFERENCES `vehicule` (`idvehicule`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `fk_vehicule_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
