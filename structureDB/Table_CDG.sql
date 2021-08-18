-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 août 2021 à 16:55
-- Version du serveur :  10.3.29-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zxbkuypj_CDG`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandesClients`
--

CREATE TABLE `commandesClients` (
  `id` int(11) NOT NULL,
  `tokenCommande` varchar(6) NOT NULL,
  `totalPanier` float NOT NULL DEFAULT 0,
  `nbrArticle` tinyint(4) NOT NULL DEFAULT 0,
  `panier` longtext DEFAULT NULL,
  `numeroTable` tinyint(4) NOT NULL,
  `valide` tinyint(4) NOT NULL DEFAULT 0,
  `dateHeure` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `composition`
--

CREATE TABLE `composition` (
  `idComposition` int(11) NOT NULL,
  `nomComposition` varchar(60) NOT NULL,
  `prixComposition` float NOT NULL,
  `image` varchar(60) NOT NULL,
  `typeComposition` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inc`
--

CREATE TABLE `inc` (
  `adresse` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `siret` varchar(50) NOT NULL,
  `ouvert` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `navigator`
--

CREATE TABLE `navigator` (
  `idNavigator` int(11) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `description` varchar(60) NOT NULL,
  `acreditation` tinyint(4) NOT NULL,
  `illustration` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Produits`
--

CREATE TABLE `Produits` (
  `idProduits` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `idTypeProduit` int(11) NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `prixUnitaire` float NOT NULL,
  `composition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `idCompositionRecette` int(11) NOT NULL,
  `idProduitRecette` int(11) NOT NULL,
  `nombre` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typePorduits`
--

CREATE TABLE `typePorduits` (
  `idTypeProduits` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `speudo` varchar(60) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `autorisation` tinyint(2) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp(),
  `valide` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandesClients`
--
ALTER TABLE `commandesClients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `composition`
--
ALTER TABLE `composition`
  ADD PRIMARY KEY (`idComposition`);

--
-- Index pour la table `navigator`
--
ALTER TABLE `navigator`
  ADD PRIMARY KEY (`idNavigator`);

--
-- Index pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`idProduits`),
  ADD KEY `lienProduit` (`idTypeProduit`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `composition_id` (`idCompositionRecette`),
  ADD KEY `produits_id` (`idProduitRecette`);

--
-- Index pour la table `typePorduits`
--
ALTER TABLE `typePorduits`
  ADD PRIMARY KEY (`idTypeProduits`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandesClients`
--
ALTER TABLE `commandesClients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `composition`
--
ALTER TABLE `composition`
  MODIFY `idComposition` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `navigator`
--
ALTER TABLE `navigator`
  MODIFY `idNavigator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `idProduits` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `typePorduits`
--
ALTER TABLE `typePorduits`
  MODIFY `idTypeProduits` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Produits`
--
ALTER TABLE `Produits`
  ADD CONSTRAINT `idType_typePorduits` FOREIGN KEY (`idTypeProduit`) REFERENCES `typePorduits` (`idTypeProduits`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lienProduit` FOREIGN KEY (`idTypeProduit`) REFERENCES `typePorduits` (`idTypeProduits`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `composition_id` FOREIGN KEY (`idCompositionRecette`) REFERENCES `composition` (`idComposition`),
  ADD CONSTRAINT `produits_id` FOREIGN KEY (`idProduitRecette`) REFERENCES `Produits` (`idProduits`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
