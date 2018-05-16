-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 09 mai 2018 à 20:24
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
(1, '$2y$10$BP7q2GHMV9HfGeSBBintkOD.mzu6HqGf7mpGJnhYzV5nQlShfHunG'),
(2, '$2y$10$r196c9rJwa/QfAtmGEPe5eCLSrW7m7rsiFrJe6xVCUMDQtNAyVCHa'),
(3, '$2y$10$euq7luRKKZiG3YSg02FjKeyJLGlFVORb9T.QJJ6wS.dXlIlu.JBIe'),
(4, '$2y$10$aD7270i9GXDA47bAxgAD8O6y.iWPl/5fJHo4brGo81o7/AQBOQCyK'),
(5, '$2y$10$QOTvOTTrv1wUX95sNVOR1.EfrE9LlANIEJ1SED6BSR.wgcKAz8v1q'),
(6, '$2y$10$HI7zHOzJrjGlUzVY5cCmsun4vgmDA1W5k.jA3DXsLq3Qw1cU8zPda'),
(7, '$2y$10$KLsXI2oVfvJzFgQtLqbureScKHUNtg403EoxdOFhZMCT7BrS3Ft7m'),
(8, '$2y$10$D.wBTTRfRc7HVJx6sUamF.Fb2ogjFOJ9JVUDnJEcwPFSBOprAhUCG'),
(9, '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
  `province` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Canada',
  `longitude` decimal(8,6) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `naissance` date NOT NULL,
  `profession` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `texte` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `prenom`, `nom`, `email`, `type`, `statut`, `code_postal`, `ville`, `province`, `pays`, `longitude`, `latitude`, `naissance`, `profession`, `sexe`, `texte`, `photo`) VALUES
(1, 'Sam', 'Houle', 'ld.samuel.houle@gmail.com', 'membre', 1, 'j7g 2t8', 'boisbriand', 'QC', 'Canada', '0.000000', '0.000000', '1997-04-03', 'Administration', 'Homme', '1', ''),
(2, 'George', 'Francois', 'g@g.com', 'membre', 1, 'H4X 1Y8', 'Montreal', 'QC', 'Canada', '0.000000', '0.000000', '1987-05-15', 'Administration', 'Homme', '1', ''),
(3, 'Mathieu', 'Brosseau', 'm@b.com', 'membre', 1, 'H1N 1J4', 'Montreal', 'QC', 'Canada', '0.000000', '0.000000', '1992-04-11', 'Administration', 'Homme', '1', ''),
(4, 'Milene', 'Tremblay', 'm@t.com', 'membre', 1, ' H4E 3H4', 'Montreal', 'QC', 'Canada', '0.000000', '0.000000', '2000-05-07', 'Administration', 'Femme', '1', ''),
(5, 'Matt', 'Damon', 'm@d.com', 'membre', 1, 'H8N 3A4', 'Montreal', 'QC', 'Canada', '0.000000', '0.000000', '1999-05-01', 'Administration', 'Homme', '1', ''),
(6, 'Mitsu', 'Gelina', 'm@g.com', 'membre', 1, 'H7T 1E4', 'Laval', 'QC', 'Canada', '0.000000', '0.000000', '1982-05-01', 'Administration', 'Femme', '1', ''),
(7, 'Jerome', 'Pingouin', 'j@p.com', 'membre', 1, 'H7T 1R3', 'Laval', 'QC', 'Canada', '0.000000', '0.000000', '1985-03-07', 'Gestion', 'Homme', '1', ''),
(8, 'Camille', 'Gismon', 'c@g.com', 'membre', 1, 'J7G 3K5', 'boisbriand', 'QC', 'Canada', '0.000000', '0.000000', '1994-04-11', 'Hebergement', 'Femme', '1', ''),
(9, 'Rym', 'Lou', 'r@l.com', 'membre', 1, 'h2c2a1', 'Ahuntsic-Cartierville', 'QC', 'Canada', '-73.651588', '45.558133', '1987-03-31', 'Droit', 'Femme', 'allo je mappele rym', '63d01424f347d69167f5f1ea94bd8d2b663eb514.png');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_msg` int(12) NOT NULL,
  `id_destinateur` int(6) NOT NULL,
  `id_destinataire` int(6) NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_msg`, `id_destinateur`, `id_destinataire`, `stamp`, `contenu`) VALUES
(1, 1, 2, '2018-05-04 14:51:03', 'Bonjour!'),
(2, 2, 1, '2018-05-04 14:51:16', 'Bonjour :)'),
(3, 1, 2, '2018-05-04 14:52:32', 'Est-ce que vous serai interessez a venir jouer au basketball la semaine prochaine?'),
(4, 2, 1, '2018-05-04 14:52:49', 'Oui cela m\'interesse! Disons mardi?'),
(5, 1, 2, '2018-05-04 14:53:06', 'Oui parfait. Au parc Jarry ca vous va?'),
(6, 2, 1, '2018-05-04 14:53:56', 'Oui, je vais creer un event pour mardi prochain en soiree.'),
(7, 1, 3, '2018-05-07 15:46:30', 'Allo'),
(8, 3, 1, '2018-05-07 15:48:06', 'Bonjour. Je crois que vous pratiquez le baseball?'),
(9, 5, 1, '2018-05-07 15:48:06', 'Coucou'),
(10, 1, 3, '2018-05-07 15:48:52', 'Serez-vous interessez à vous rencontrer pour faire un peu de golf?'),
(11, 1, 5, '2018-05-07 15:48:52', 'Bonjour'),
(12, 1, 2, '2018-05-08 02:45:47', 'wasup'),
(13, 1, 2, '2018-05-08 02:48:23', 'yo');

-- --------------------------------------------------------

--
-- Structure de la table `niveau_sport`
--

CREATE TABLE `niveau_sport` (
  `id_membre` int(6) NOT NULL,
  `id_sport` int(4) NOT NULL,
  `niveau` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 2, '2018-05-04 14:47:42', 1),
(1, 3, '2018-05-04 14:47:42', 1),
(2, 3, '2018-05-04 14:48:21', 1),
(4, 3, '2018-05-04 14:48:21', 1);

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
  ADD KEY `message_id_destinataire_fk` (`id_destinataire`);

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
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_ev` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_msg` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
