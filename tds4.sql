-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 25 mai 2024 à 14:08
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tds4_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `salaire` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `nom`, `salaire`) VALUES
(1, 'Alima Serge', 35000),
(2, 'Noah Albert', 5000);

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE `annees` (
  `id` int(11) NOT NULL,
  `debut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annees`
--

INSERT INTO `annees` (`id`, `debut`) VALUES
(2, 2020),
(3, 2021);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `corps` text DEFAULT NULL,
  `publie_a` datetime DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1,
  `auteur_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `corps`, `publie_a`, `actif`, `auteur_id`, `category_id`) VALUES
(1, 'Les Eglises de Reveil', 'Les eglises de reveil constituent un grand fait social dans notre pays', '2024-04-10 00:00:00', 1, 1, 1),
(2, 'La delinquence en milieu scolaire', NULL, '2024-05-15 00:00:00', 1, NULL, 4),
(3, 'Les innovations technologiques', NULL, NULL, 1, 1, 10),
(4, 'Le transport urbain et ses deboires', NULL, '2024-05-15 00:00:00', 0, 2, 2),
(5, 'Preparation des jeux olympiques de Paris modif', 'Ici le corps de ce post modif ...', NULL, 1, NULL, NULL),
(6, 'Les jeux olympiques de Paris solo', 'Ici le corps', NULL, 1, NULL, NULL),
(7, 'La rentree scolaire', 'Le corps ....', '2024-05-25 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `nationalite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `prenom`, `telephone`, `nationalite`) VALUES
(1, 'Essomba', 'Clement', '064576186', 1),
(2, 'Madzou', 'Joseph', '054678998', 2),
(3, 'Nguimbi', 'Alain', '045378723', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `actif`) VALUES
(1, 'Faits sociaux', NULL, 0),
(2, 'Environnement', 'Categorie traitant de l\'environnement', 0),
(3, 'Religion', NULL, 0),
(4, 'Education', 'Dans cette categorie nous parlons d\'education', 1),
(5, 'Sport', 'Ici on parle de sport', 0),
(10, 'Hitech', NULL, 0),
(11, 'Artisanat', 'articles traitant de l\'artisanat', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

CREATE TABLE `cycles` (
  `code_s` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `abb` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycles`
--

INSERT INTO `cycles` (`code_s`, `nom`, `abb`) VALUES
(1, 'BREVET DE TECHNICIEN SUPERIEUR', 'BTS'),
(2, 'LICENCE PROFESSIONNELLE', 'LP');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `salaire` double DEFAULT 10000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `salaire`) VALUES
(1, 'ESSOMBA', 'CLEMENT', 15000),
(2, 'MADZOU', 'ALAIN', 35000),
(4, 'MABIALA', 'ALOYS', 15000);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `matricule` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`matricule`, `nom`, `prenom`, `phone`, `adresse`) VALUES
(10, 'MABIALA', 'PIERRE', '064537898', 'RAFFINERIE CORAF'),
(11, 'MABIALA', 'PIERRE', NULL, 'RAFFINERIE CORAF'),
(12, 'Bouiti', 'Albert', '056783321', 'Songolo'),
(13, 'ESSOMBA', 'ADANNA', NULL, 'GENDARMERIE DE MVOU-MVOU'),
(15, 'KALLA', 'Jean Vidal', '064678899', 'ARRONDISSEMENT DE NGOYO'),
(16, 'Bouiti', 'Runelle', NULL, 'Songolo'),
(17, 'SAKOULOU', 'Joviale', NULL, 'MPITA GENDARMERIE'),
(18, 'KALLA', 'Norbert', '064678896', 'ARRONDISSEMENT DE NGOYO'),
(19, 'KALLA', 'ARMAND', '0646783359', 'ARRONDISSEMENT DE NGOYO');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `code_f` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `abb` varchar(5) DEFAULT NULL,
  `cycle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`code_f`, `nom`, `abb`, `cycle_id`) VALUES
(1, 'Informatique de gestion', 'IG', 1),
(2, 'Reseaux et Telecoms', 'RT', 2),
(3, 'SECRETARIAT ET ASSISTANT DE DIRECTION', 'SAD', 1),
(4, 'LICENCE TECHNOLOGIQUE', 'LT', 2),
(5, 'Ingenierie petroliere', 'IP', NULL),
(6, 'Marketing et Publicite', 'MP', 2);

-- --------------------------------------------------------

--
-- Structure de la table `fruits`
--

CREATE TABLE `fruits` (
  `nom` varchar(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) DEFAULT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `jour` datetime DEFAULT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `etudiant_id`, `filiere_id`, `jour`, `niveau_id`, `annee_id`) VALUES
(1, 10, 1, '2021-10-11 14:51:13', 1, 3),
(5, 15, 2, '2021-10-12 00:00:00', 3, 3),
(6, 15, 2, '2020-10-22 00:00:00', 2, 2),
(8, 17, 3, '2021-10-12 00:00:00', 3, 3),
(9, 17, 3, '2020-10-22 00:00:00', 2, 2),
(12, 19, 2, '2021-10-23 10:23:12', 2, 3),
(13, 11, 2, '2021-10-24 11:43:11', 1, 3),
(14, 15, 2, '2021-10-24 10:53:11', 2, 3),
(15, 15, 2, '2020-10-24 10:53:11', 2, 2),
(18, 13, 1, '2020-10-24 11:13:11', NULL, 2),
(24, 15, 2, '2020-11-24 11:13:11', 1, NULL),
(25, 18, 3, '2020-11-24 11:10:11', 1, 1),
(26, 19, 2, '2020-11-24 11:40:41', 1, NULL),
(27, 16, 2, '2020-11-24 11:40:41', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `abb` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `nom`, `abb`) VALUES
(1, 'PREMIERE ANNEE', '1A'),
(2, 'DEUXIEME ANNEE', '2A'),
(3, 'TROISIEME ANNEE', '3A');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `code_s` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `nom`, `code_s`) VALUES
(1, 'IG', 1),
(2, 'RT', 1),
(3, 'SAD', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `code` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `code`) VALUES
(1, 'Congo Brazzaville', 'CG'),
(2, 'Congo Kinshasa', 'RDC'),
(3, 'Gabon', 'GB'),
(4, 'Senegal', 'SN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annees`
--
ALTER TABLE `annees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aut_p` (`nationalite`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`code_s`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`code_f`),
  ADD KEY `fk_cf` (`cycle_id`);

--
-- Index pour la table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`),
  ADD KEY `filiere_id` (`filiere_id`),
  ADD KEY `fk_insniv` (`niveau_id`),
  ADD KEY `fk_ins_an` (`annee_id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_s` (`code_s`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annees`
--
ALTER TABLE `annees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `auteurs` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD CONSTRAINT `fk_aut_p` FOREIGN KEY (`nationalite`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD CONSTRAINT `fk_cf` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`code_s`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `fk_insniv` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`),
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`matricule`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`filiere_id`) REFERENCES `filieres` (`code_f`);

--
-- Contraintes pour la table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`code_s`) REFERENCES `cycles` (`code_s`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
