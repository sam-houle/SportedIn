-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 01 mai 2018 à 19:26
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, 'bicycle', 'bicycle.png'),
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
(17, 'soccer', 'soccer.png'),
(18, 'Tenis', 'tennis.png'),
(19, 'Volleyball', 'volleyball.png'),
(20, 'course auto', 'racing.png');

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
  MODIFY `id_membre` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_msg` int(12) NOT NULL AUTO_INCREMENT;
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
