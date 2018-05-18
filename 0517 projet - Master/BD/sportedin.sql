-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 16 mai 2018 à 22:19
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sportedin`
--
CREATE DATABASE IF NOT EXISTS `sportedin` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `sportedin`;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id_membre` int(6) NOT NULL,
  `mot_de_passe` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id_membre`, `mot_de_passe`) VALUES
(1, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(2, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(3, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(4, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(5, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(6, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(7, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(8, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(9, '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(10, '1bfbdf35b1359fc6b6f93893874cf23a50293de5');

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

CREATE TABLE `conversation` (
  `id_convo` int(6) NOT NULL,
  `membre_un` int(6) NOT NULL,
  `membre_deux` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id_convo`, `membre_un`, `membre_deux`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 9),
(6, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_ev` int(6) NOT NULL,
  `id_destinateur` int(6) NOT NULL,
  `id_destinataire` int(6) NOT NULL,
  `date_ev` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `statut` int(1) NOT NULL,
  `id_sport` int(4) NOT NULL,
  `endroit` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_ev`, `id_destinateur`, `id_destinataire`, `date_ev`, `heure_debut`, `heure_fin`, `statut`, `id_sport`, `endroit`) VALUES
(1, 1, 3, '2018-05-31', '19:00:00', '20:00:00', 1, 1, 'Parc Jarry');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(6) NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `statut` int(1) NOT NULL,
  `code_postal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quartier` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Canada',
  `longitude` decimal(8,6) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `naissance` date NOT NULL,
  `age` int(3) NOT NULL,
  `profession` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `prenom`, `nom`, `email`, `type`, `statut`, `code_postal`, `ville`, `quartier`, `province`, `pays`, `longitude`, `latitude`, `naissance`, `age`, `profession`, `sexe`, `texte`, `photo`) VALUES
(1, 'Samuel', 'houle', 'ld.samuel.houle@gmail.com', 'membre', 1, 'j7g2t8', 'Boisbriand', '', 'QC', 'Canada', '-73.817813', '45.610763', '1997-04-03', 21, 'Administration', 'Femme', 'Hey', '06422d95c6f9d8293d372409fd352638ac813a7f.jpg'),
(2, 'Matt', 'damon', 'matdamon@hotmail.com', 'membre', 1, 'H4X1Y8', 'Montreal-Ouest', '', 'QC', 'Canada', '-73.645505', '45.453078', '1977-12-12', 40, 'Autre', 'Homme', 'Im Matt Damon', '3b01b0bc05ae8369f08236e3c470647f48c984be.jpg'),
(3, 'Gen', 'houle', 'G@h.com', 'membre', 1, 'j7g2t8', 'Boisbriand', '', 'QC', 'Canada', '-73.817813', '45.610763', '1992-12-02', 25, 'Droit', 'Femme', '1', 'default.png'),
(4, 'jerome', 'george', 'jerome@g.com', 'membre', 1, 'H8N3A4', 'Montreal', 'LaSalle', 'QC', 'Canada', '-73.615974', '45.447005', '1980-04-12', 38, 'Sante', 'Homme', '1', 'default.png'),
(5, 'Math', 'Gerv', 'Ma@g.com', 'membre', 1, 'H8N3A4', 'Montreal', 'LaSalle', 'QC', 'Canada', '-73.615974', '45.447005', '1992-12-14', 25, 'Administration', 'Femme', '1', 'default.png'),
(6, 'maxime', 'cava', 'max@c.com', 'membre', 1, 'H7P5P5', 'Laval', '', 'QC', 'Canada', '-73.800989', '45.565635', '1979-03-03', 39, 'Droit', 'Homme', '1', 'default.png'),
(7, 'milene', 'tremblay', 'mil@t.com', 'membre', 1, 'H7P5P5', 'Laval', '', 'QC', 'Canada', '-73.800989', '45.565635', '1995-12-15', 22, 'Sante', 'Femme', '1', 'default.png'),
(8, 'Justine', 'Monique', 'ju@mon.c', 'membre', 1, 'H1P2N9', 'Montreal', 'Saint Leonard', 'QC', 'Canada', '-73.591931', '45.590098', '1969-03-15', 49, 'Droit', 'Femme', 'hwe', 'default.png'),
(9, 'Marguerite', 'poistra', 'marg@poit.com', 'membre', 1, 'H4X1Y8', 'Montreal-Ouest', '', 'QC', 'Canada', '-73.645505', '45.453078', '1956-12-12', 61, 'Sante', 'Autre', '123', 'default.png'),
(10, 'anthony', 'picard', 'ant@pic.copm', 'membre', 1, 'H1P2N7', 'Montreal', 'Saint Leonard', 'QC', 'Canada', '-73.588563', '45.588693', '1987-04-25', 31, 'Gestion', 'Homme', '1', 'default.png');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_msg` int(12) NOT NULL,
  `id_convo` int(6) NOT NULL,
  `id_destinateur` int(6) NOT NULL,
  `id_destinataire` int(6) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_msg`, `id_convo`, `id_destinateur`, `id_destinataire`, `stamp`, `contenu`) VALUES
(22, 1, 2, 1, '2018-05-09 21:29:03', 'Bonjour Samuel'),
(24, 1, 1, 2, '2018-05-09 21:29:31', 'Bonjour!'),
(27, 2, 1, 3, '2018-05-09 21:30:30', 'Allo'),
(28, 1, 2, 1, '2018-05-09 21:30:30', 'Comment vas tu?'),
(31, 2, 3, 1, '2018-05-09 21:33:13', 'Hey, vous pratiquez le golf la fin de semaine?'),
(32, 1, 1, 2, '2018-05-09 21:33:13', 'Ca va tres bien et toi?'),
(36, 3, 4, 1, '2018-05-09 21:33:57', 'Vous etes un passione de basket?'),
(38, 1, 2, 1, '2018-05-09 21:35:03', 'Super, es-tu libre la semaine prochaine pour jouer une game de golf?'),
(40, 3, 4, 1, '2018-05-12 17:34:32', 'Allo'),
(42, 3, 1, 4, '2018-05-12 17:34:57', 'Coucou'),
(44, 2, 3, 1, '2018-05-12 19:53:47', 'yo'),
(45, 1, 1, 2, '2018-05-12 04:00:00', 'BLABLA'),
(46, 1, 1, 2, '0000-00-00 00:00:00', 'test2'),
(47, 1, 1, 2, '2018-05-12 22:41:22', 'test2'),
(48, 3, 1, 4, '2018-05-15 03:17:15', 'hye'),
(49, 1, 1, 2, '2018-05-15 03:17:49', 'hey matt'),
(50, 3, 1, 4, '2018-05-15 14:31:07', 'bonjour'),
(51, 1, 1, 2, '2018-05-15 19:56:15', 'Hey yetais ful bon ton film bro'),
(52, 1, 1, 2, '2018-05-15 19:57:27', 'h');

-- --------------------------------------------------------

--
-- Structure de la table `niveau_sport`
--

CREATE TABLE `niveau_sport` (
  `id_membre` int(6) NOT NULL,
  `id_sport` int(4) NOT NULL,
  `niveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `niveau_sport`
--

INSERT INTO `niveau_sport` (`id_membre`, `id_sport`, `niveau`) VALUES
(10, 1, 1),
(7, 1, 2),
(1, 1, 1),
(2, 3, 2),
(3, 6, 2),
(4, 1, 3),
(5, 1, 1),
(6, 2, 1),
(6, 3, 1),
(7, 4, 1),
(7, 1, 1),
(8, 1, 1),
(8, 3, 1),
(8, 4, 2),
(9, 1, 2),
(9, 4, 2),
(9, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(6) NOT NULL,
  `id_ev` int(6) NOT NULL,
  `date_notif` date NOT NULL,
  `contenu` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reseau`
--

CREATE TABLE `reseau` (
  `id_membre` int(6) NOT NULL,
  `id_ami` int(6) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reseau`
--

INSERT INTO `reseau` (`id_membre`, `id_ami`, `stamp`, `statut`) VALUES
(1, 3, '2018-05-15 22:30:25', 1),
(1, 4, '2018-05-15 22:33:51', 2),
(6, 1, '2018-05-16 20:13:38', 1),
(6, 1, '2018-05-16 20:13:42', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id_sport` int(4) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icone` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id_sport`, `nom`, `icone`) VALUES
(1, 'Baseball', 'baseball.png'),
(2, 'Badminton', 'badminton.png'),
(3, 'Basketball', 'basketball.png'),
(4, 'Bicycle', 'bicycle.png'),
(5, 'Boxe', 'boxing.png'),
(6, 'Aviron', 'canoe.png'),
(7, 'Escalade', 'climbing.png'),
(8, 'Danse', 'dancer.png'),
(9, 'Gym', 'dumbbell.png'),
(10, 'Chasse et Peche', 'fishing.png'),
(11, 'Golf', 'golf.png'),
(12, 'Alpinisme', 'hicking.png'),
(13, 'Hockey', 'hockey.png'),
(14, 'Jogging', 'jogging.png'),
(15, 'Arts Martiaux', 'karate.png'),
(16, 'Tenis de Table', 'pingpong.png'),
(17, 'Soccer', 'soccer.png'),
(18, 'Tenis', 'tennis.png'),
(19, 'Volleyball', 'volleyball.png'),
(20, 'Course auto', 'racing.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD KEY `connexion_id_membre_fk` (`id_membre`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id_convo`),
  ADD KEY `un_conversation_fk` (`membre_un`),
  ADD KEY `deux_conversation_fk` (`membre_deux`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_ev`),
  ADD KEY `evenement_id_destinateur_fk` (`id_destinateur`),
  ADD KEY `evenement_id_destinataire_fk` (`id_destinataire`),
  ADD KEY `evenement_id_sport_fk` (`id_sport`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `membre_email_uk` (`email`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `message_id_destinateur_fk` (`id_destinateur`),
  ADD KEY `message_id_destinataire_fk` (`id_destinataire`),
  ADD KEY `id_convo_message_fk` (`id_convo`);

--
-- Index pour la table `niveau_sport`
--
ALTER TABLE `niveau_sport`
  ADD KEY `niveau_sport_id_membre_fk` (`id_membre`),
  ADD KEY `niveau_sport_id_sport_fk` (`id_sport`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `notification_id_ev_fk` (`id_ev`);

--
-- Index pour la table `reseau`
--
ALTER TABLE `reseau`
  ADD KEY `reseau_id_membre_fk` (`id_membre`),
  ADD KEY `reseau_id_ami_fk` (`id_ami`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id_convo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_ev` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_msg` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `id_convo_message_fk` FOREIGN KEY (`id_convo`) REFERENCES `conversation` (`id_convo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
