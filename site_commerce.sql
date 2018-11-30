-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 21 nov. 2018 à 15:15
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `mdp` varchar(32) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(20) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `civilite` varchar(1) CHARACTER SET latin1 NOT NULL,
  `ville` varchar(20) CHARACTER SET latin1 NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) CHARACTER SET latin1 NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(1, 'admin', 'admin', 'Gauthier', 'Mila', 'moi@moi.fr', 'f', 'VLG', 92300, '9 allée Saint-Exupéry', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` varchar(5) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `prix` float NOT NULL,
  `stock` int(3) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`, `id_produit`) VALUES
('0001', 'pantalon', 'Jean', 'jean bleu', 'bleu', 'S', 'f', 'ref0001-pantalon1.jpg', 89, 3, 1),
('0002', 'pantalon', 'pantalon blanc', 'pantalon blanc', 'blanc', 'S', 'f', 'ref0002-pantalon2.jpg', 74, 50, 2),
('0003', 'pull', 'pull blanc', 'pull blanc', 'blanc', 'S', 'f', 'ref0003-pull1.jpg', 50, 12, 3),
('0004', 'pull', 'pull gris', 'pull gris clair', 'gris', 'S', 'm', 'ref0004-pull2.jpg', 49, 36, 4),
('0005', 'robe', 'robe noire', 'pour vos soirées et cocktails', 'noir', 'S', 'f', 'ref0005-robe1.jpg', 99, 54, 5),
('0006', 'robe', 'robe rouge', 'robe de cocktail', 'rouge', 'S', 'f', 'ref0006-robe2.jpg', 79.9, 0, 6),
('0007', 'pull', 'pull', 'pull', 'blanc', 'L', 'm', 'ref0007-pull1.jpg', 49, 11, 7),
('0008', 'pantalon', 'pantalon flanelle', 'pantalon homme', 'noir', 'XL', 'm', 'ref0008-pull2.jpg', 39.5, 8, 8),
('0009', 'robe', 'robe de plage', 'robe de plage', 'bleu', 'M', 'f', 'ref009-robe1.jpg', 56, 4, 9),
('0010', 'robe', 'robe corail', 'robe orange corail', 'corail', 'L', 'f', 'ref0010-robe2.jpg', 67.8, 35, 10),
('0011', 'chaussure', 'tennis', 'tennis bleu et blanc', 'bleu', 'L', 'm', 'ref0011-pantalon2.jpg', 49.9, 8, 11),
('0012', 'chaussure', 'escarpins', 'chaussures élégantes', 'noir', 'S', 'f', 'ref0012-robe1.jpg', 46, 2, 12);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
