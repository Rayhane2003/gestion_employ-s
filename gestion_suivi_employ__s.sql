-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 avr. 2025 à 23:33
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_suivi_employés`
--

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE `conge` (
  `idConge` int(11) NOT NULL,
  `typeConge` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `documentsJustification` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conge`
--

INSERT INTO `conge` (`idConge`, `typeConge`, `dateDebut`, `dateFin`, `documentsJustification`, `id`, `created_at`, `updated_at`) VALUES
(11, 'Maladie', '2025-04-01', '2025-04-30', 'DiagrammeFinal.drawio.png', 1, '2025-04-16', '2025-04-16'),
(12, 'Annuel', '2025-04-01', '2025-05-08', '1.png', 58, '2025-04-16', '2025-04-16'),
(13, 'Maternite', '2025-04-01', '2025-07-01', 'DiagrammeFinal.drawio.png', 52, '2025-04-16', '2025-04-16'),
(14, 'Maladie', '2025-04-01', '2025-04-20', '1.png', 53, '2025-04-16', '2025-04-16');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(100) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `salaire` decimal(10,0) NOT NULL,
  `dateEmbauche` date NOT NULL,
  `statut` varchar(255) NOT NULL,
  `typeContrat` varchar(255) NOT NULL,
  `photoProfil` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prénom`, `dateNaissance`, `adresse`, `telephone`, `email`, `poste`, `salaire`, `dateEmbauche`, `statut`, `typeContrat`, `photoProfil`, `created_at`, `updated_at`) VALUES
(1, 'exemple', 'emp', '1985-04-01', 'dely ibramim', 678954356, 'emp1@gmail.com', 'ingénieur réseaux', 1300000, '2025-04-01', 'Actif', 'CDI', '1.png', NULL, '2025-04-16'),
(51, 'exemple', 'emp', '1979-06-09', 'hydra', 664567807, 'emp2@gmail.com', 'ingénieur', 1400000, '2025-04-03', 'Actif', 'CDD', '2.png', '2025-04-16', '2025-04-16'),
(52, 'exemp', 'emp', '1990-11-09', 'Deli irahim', 789654323, 'emp3@gmail.com', 'web designer', 1400000, '2025-04-04', 'Actif', 'CDI', '2.png', '2025-04-16', '2025-04-16'),
(53, 'exemp', 'emp', '1990-11-09', 'Deli irahim', 789654323, 'emp3@gmail.com', 'web designer', 1400000, '2025-04-04', 'Inactif', 'CDI', '2.png', '2025-04-16', '2025-04-16'),
(54, 'exemple', 'emp', '1982-06-03', 'dely ibramim', 660869607, 'emp5@gmail.com', 'ingénieur réseaux', 1400000, '2025-04-05', 'Actif', 'CDD', '1.png', '2025-04-16', '2025-04-16'),
(55, 'exemple', 'emp', '1998-06-03', 'hydra', 567438290, 'emp6@gmail.com', 'web designer', 1400000, '2025-04-08', 'Actif', 'CDI', '2.png', '2025-04-16', '2025-04-16'),
(56, 'exemple', 'emp', '2000-06-09', 'hydra', 789564039, 'emp7@gmail.com', 'ingénieur réseaux', 1400000, '2025-04-08', 'Actif', 'CDD', '2.png', '2025-04-16', '2025-04-16'),
(57, 'exemple', 'emp', '1997-07-11', 'hydra', 567349087, 'emp8@gmail.com', 'web designer', 1400000, '2025-04-09', 'Actif', 'CDI', '1.png', '2025-04-16', '2025-04-16'),
(58, 'exemple', 'emp', '1995-03-02', 'hydra', 789564789, 'emp9@gmail.com', 'web designer', 13000000, '2025-04-10', 'Actif', 'CDI', '1.png', '2025-04-16', '2025-04-16'),
(59, 'exemple', 'emp', '1997-07-10', 'dely ibramim', 665784390, 'emp11@gmail.com', 'web designer', 13000000, '2025-04-10', 'Actif', 'CDI', '', '2025-04-16', '2025-04-16');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `IdEnreprise` int(11) NOT NULL,
  `NomEntreprise` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Telephone` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SiteWeb` varchar(255) NOT NULL,
  `Capital` varchar(255) NOT NULL,
  `ChiffreAffaires` int(11) NOT NULL,
  `DateCreation` date NOT NULL,
  `CEO` varchar(255) NOT NULL,
  `SecteurActive` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `IdEquipe` int(11) NOT NULL,
  `NomEquipe` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DateCreation` date NOT NULL,
  `Responsable` varchar(255) NOT NULL,
  `NombreEmployees` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `idJour` int(11) NOT NULL,
  `heureEntree` time NOT NULL,
  `heureSortie` time NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`idJour`, `heureEntree`, `heureSortie`, `created_at`, `updated_at`) VALUES
(1, '09:16:00', '15:20:00', '2025-04-16', '2025-04-16'),
(2, '09:20:00', '09:31:00', '2025-04-16', '2025-04-16'),
(3, '09:22:00', '15:22:00', '2025-04-16', '2025-04-16'),
(4, '09:52:00', '17:52:00', '2025-04-16', '2025-04-16'),
(5, '09:13:00', '12:17:00', '2025-04-16', '2025-04-16'),
(6, '09:14:00', '17:14:00', '2025-04-16', '2025-04-16'),
(7, '09:14:00', '17:18:00', '2025-04-16', '2025-04-16'),
(8, '12:13:00', '14:18:00', '2025-04-18', '2025-04-18');

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE `pointage` (
  `idPointage` int(11) NOT NULL,
  `dateJour` date NOT NULL,
  `id_employe` int(11) NOT NULL,
  `idJour` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pointage`
--

INSERT INTO `pointage` (`idPointage`, `dateJour`, `id_employe`, `idJour`, `created_at`, `updated_at`) VALUES
(1, '2025-04-16', 53, 4, '2025-04-16', '2025-04-16'),
(2, '2025-04-16', 51, 7, '2025-04-16', '2025-04-16'),
(3, '2025-04-18', 55, 8, '2025-04-18', '2025-04-18');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `Id_Projet` int(11) NOT NULL,
  `NomProjet` mediumtext NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Priorite` varchar(255) NOT NULL,
  `Budget` decimal(10,0) NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  `Responsable` varchar(255) NOT NULL,
  `Id_Equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `Id_Rapport` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `DateCreation` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Contenu` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`idConge`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`IdEnreprise`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`IdEquipe`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`idJour`);

--
-- Index pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD PRIMARY KEY (`idPointage`),
  ADD KEY `id` (`id_employe`),
  ADD KEY `idJour` (`idJour`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`Id_Projet`),
  ADD KEY `Id_Equipe` (`Id_Equipe`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`Id_Rapport`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conge`
--
ALTER TABLE `conge`
  MODIFY `idConge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `IdEnreprise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `IdEquipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `idJour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `pointage`
--
ALTER TABLE `pointage`
  MODIFY `idPointage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `Id_Projet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `Id_Rapport` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `conge_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employe` (`id`);

--
-- Contraintes pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD CONSTRAINT `pointage_ibfk_1` FOREIGN KEY (`idJour`) REFERENCES `jour` (`IdJour`),
  ADD CONSTRAINT `pointage_ibfk_2` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`Id_Equipe`) REFERENCES `equipe` (`IdEquipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
