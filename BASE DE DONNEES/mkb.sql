-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 avr. 2020 à 22:30
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mkb`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL,
  `idTypeChambre` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `numero`, `adresse`, `montant`, `idTypeChambre`, `idUser`) VALUES
(1, 'MKB_CH_0001', 'FASS', 15000, 1, 1),
(2, 'MKB_CH_0002', 'MEDINA 27 X 24', 75000, 2, 1),
(3, 'MKB_CH_0003', 'Medina rue 14 X 27', 80000, 2, 1),
(4, 'MKB_CH_0004', 'MEDINA RUE 15 X 14', 35000, 1, 1),
(5, 'MKB_CH_0005', 'Médina rue 15 X 22', 105000, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `locataire`
--

CREATE TABLE `locataire` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `locataire`
--

INSERT INTO `locataire` (`id`, `numero`, `nom`, `prenom`, `tel`) VALUES
(1, 'MKB_CL_0001', 'NOM', 'PRENOM', '+221770000000'),
(2, 'MKB_CL_0002', 'NOM2', 'PRENOM2', '+221770000001'),
(3, 'MKB_CL_0003', 'NOM', 'PRENOM3', '+221770000002'),
(4, 'MKB_CL_0004', 'Nom5', 'Pren5', '+221770000000'),
(5, 'MKB_CL_0005', 'Nom5', 'Prenom5', '+221770000000');

-- --------------------------------------------------------

--
-- Structure de la table `louer`
--

CREATE TABLE `louer` (
  `id` int(11) NOT NULL,
  `idLocataire` int(11) NOT NULL,
  `idChambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `louer`
--

INSERT INTO `louer` (`id`, `idLocataire`, `idChambre`) VALUES
(1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `occuper`
--

CREATE TABLE `occuper` (
  `id` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `montant` int(11) NOT NULL,
  `idLocataire` int(11) NOT NULL,
  `idChambre` int(11) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `occuper`
--

INSERT INTO `occuper` (`id`, `dateDebut`, `dateFin`, `montant`, `idLocataire`, `idChambre`, `statut`) VALUES
(1, '2020-02-12', '2020-02-22', 150000, 1, 1, 0),
(2, '2020-02-04', '2020-02-21', 595000, 3, 4, 0),
(3, '0000-00-00', '0000-00-00', 0, 4, 4, 0),
(4, '2020-03-12', '2020-03-22', 350000, 5, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `typechambre`
--

CREATE TABLE `typechambre` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typechambre`
--

INSERT INTO `typechambre` (`id`, `libelle`) VALUES
(1, 'meublé'),
(2, 'non meublé');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `fonction` varchar(100) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `mdp`, `fonction`, `statut`) VALUES
(1, 'VICH', 'TITO', 'vich', '$2y$10$0bI9ulbFumJLkV85vKIfw.lIvnKDEExvb8TZgRiZ3qaFQn5c.7u6S', 'admin', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTypeChambre` (`idTypeChambre`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `locataire`
--
ALTER TABLE `locataire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Index pour la table `louer`
--
ALTER TABLE `louer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idLocataire`),
  ADD KEY `idChambre` (`idChambre`);

--
-- Index pour la table `occuper`
--
ALTER TABLE `occuper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLocataire` (`idLocataire`),
  ADD KEY `idChambre` (`idChambre`);

--
-- Index pour la table `typechambre`
--
ALTER TABLE `typechambre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `locataire`
--
ALTER TABLE `locataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `occuper`
--
ALTER TABLE `occuper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `typechambre`
--
ALTER TABLE `typechambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`idTypeChambre`) REFERENCES `typechambre` (`id`),
  ADD CONSTRAINT `chambre_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `louer`
--
ALTER TABLE `louer`
  ADD CONSTRAINT `louer_ibfk_1` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`id`),
  ADD CONSTRAINT `louer_ibfk_2` FOREIGN KEY (`idLocataire`) REFERENCES `locataire` (`id`);

--
-- Contraintes pour la table `occuper`
--
ALTER TABLE `occuper`
  ADD CONSTRAINT `occuper_ibfk_1` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`id`),
  ADD CONSTRAINT `occuper_ibfk_2` FOREIGN KEY (`idLocataire`) REFERENCES `locataire` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
