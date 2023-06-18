-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 18 juin 2023 à 20:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festivoiturage`
--

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

DROP TABLE IF EXISTS `festival`;
CREATE TABLE IF NOT EXISTS `festival` (
  `id_festival` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `nom` varchar(50) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_festival`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `festival`
--

INSERT INTO `festival` (`id_festival`, `date`, `nom`, `localisation`, `photo`) VALUES
(2, '2023-07-15', 'Summer Music Festival', 'Paris', 'summer_music.jpg'),
(3, '2023-06-25', 'Rock Festival', 'Berlin', 'rock_festival.jpg'),
(4, '2023-07-03', 'Jazz in the Park', 'New York', 'jazz_park.jpg'),
(5, '2023-07-08', 'Electronic Beats', 'London', 'electronic_beats.jpg'),
(6, '2023-07-14', 'Folk Music Fest', 'Dublin', 'folk_music.jpg'),
(7, '2023-07-22', 'Reggae Vibes', 'Kingston', 'reggae_vibes.jpg'),
(8, '2023-07-30', 'Classical Melodies', 'Vienna', 'classical_melodies.jpg'),
(10, '2023-08-12', 'Salsa Fiesta', 'Havana', 'salsa_fiesta.jpg'),
(12, '2023-08-25', 'Hip Hop Extravaganza', 'Los Angeles', 'hip_hop_extravaganza.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `festivalier`
--

DROP TABLE IF EXISTS `festivalier`;
CREATE TABLE IF NOT EXISTS `festivalier` (
  `id_festivalier` int NOT NULL AUTO_INCREMENT,
  `nom_festivalier` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_presence` date NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,
  PRIMARY KEY (`id_festivalier`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `festivalier`
--

INSERT INTO `festivalier` (`id_festivalier`, `nom_festivalier`, `prenom`, `date_de_presence`, `pseudo`, `mot_de_passe`) VALUES
(1, 'JOHN', 'Doe', '2023-06-15', 'johnDoe', 'superjohn'),
(13, 'Dupont', 'Jean', '2023-07-01', 'jean.dupont', 'mdp123'),
(2, 'Martin', 'Sophie', '2023-07-02', 'sophie.martin', 'pass456'),
(3, 'Durand', 'Pierre', '2023-07-03', 'pierre.durand', 'secret789'),
(4, 'Lefebvre', 'Marie', '2023-07-04', 'marie.lefebvre', 'mdp123'),
(5, 'Garcia', 'Luis', '2023-07-05', 'luis.garcia', 'pass456'),
(6, 'Boucher', 'Emma', '2023-07-06', 'emma.boucher', 'secret789'),
(7, 'Roux', 'Thomas', '2023-07-07', 'thomas.roux', 'mdp123'),
(8, 'Leroy', 'Camille', '2023-07-08', 'camille.leroy', 'pass456'),
(9, 'Fernandez', 'Lucas', '2023-07-09', 'lucas.fernandez', 'secret789'),
(10, 'Moreau', 'Chloé', '2023-07-10', 'chloe.moreau', 'mdp123'),
(11, 'Lambert', 'Hugo', '2023-07-11', 'hugo.lambert', 'pass456'),
(12, 'Girard', 'Manon', '2023-07-12', 'manon.girard', 'secret789');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilis` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_utilis`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilis`, `login`, `mdp`, `role`) VALUES
(2, 'johnsmith', 'p@ssw0rd!', 'user'),
(3, 'janesmith', 'Ninj@C0de', 'user'),
(4, 'michaelscott', 'DunderMifflin', 'user'),
(5, 'pambeesly', 'Beets&Bears', 'user'),
(6, 'lisasimpson', 'Sax0phone', 'user'),
(7, 'harrypotter', 'Exp3lliarmus!', 'user'),
(8, 'hermionegranger', 'Levi0sa!', 'user'),
(9, 'ronweasley', 'WeasleyIsOurKing', 'user'),
(10, 'tonystark', 'I@mIronMan', 'user'),
(11, 'peterparker', 'FriendlyNeighborhood', 'user'),
(12, 'brucewayne', 'Batm@n', 'user'),
(14, 'Marya', 'marya2023', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule_festival` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `place` varchar(2) NOT NULL,
  `datealler` date NOT NULL,
  `dateretour` date DEFAULT NULL,
  PRIMARY KEY (`id_vehicule_festival`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule_festival`, `type`, `place`, `datealler`, `dateretour`) VALUES
(1, 'Cabriolet', '5', '2023-06-21', NULL),
(13, 'voiture', '4', '2023-06-15', '2023-06-20'),
(2, 'voiture', '4', '2023-06-15', '2023-06-20'),
(3, 'moto', '1', '2023-07-01', NULL),
(4, 'camion', '2', '2023-06-25', '2023-06-30'),
(5, 'voiture', '5', '2023-07-10', NULL),
(6, 'moto', '1', '2023-06-18', '2023-06-22'),
(7, 'voiture', '3', '2023-06-29', NULL),
(8, 'moto', '2', '2023-07-05', '2023-07-12'),
(9, 'camion', '4', '2023-06-20', NULL),
(10, 'voiture', '2', '2023-07-15', '2023-07-20'),
(11, 'moto', '1', '2023-06-30', NULL),
(16, 'RV', '2', '2023-06-23', '2023-06-26'),
(15, 'Van', '7', '2023-06-21', '2023-06-23'),
(14, 'Motorcycle', '1', '2023-06-22', '2023-06-24'),
(12, 'Car', '15', '2023-06-20', '2023-06-25'),
(17, 'Scooter', '1', '2023-06-24', '2023-06-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
