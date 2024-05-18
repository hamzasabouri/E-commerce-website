-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : sam. 18 mai 2024 à 22:13
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ajichri`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `Adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `name`, `username`, `telephone`, `Adress`) VALUES
(2, 'yassin', 'yassin02', 66669890, 'hay salam'),
(3, 'said', 'said003', 6666, 'sale');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `Adress` text NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `Adress`, `total_products`, `total_price`) VALUES
(7, 'Sabouri', 737474, 'admin@majhooltv.me', 'paypal', 'wwuwuwuwuwu', 'JACK & JONES 2 (1) , JACK & JONES (1) ', 61),
(9, 'Sabouri', 6666, 'hamzadsabouri@gmail.com', 'paypal', 'sale', 'ALANTOP (1) , Carolilly (1) ', 28);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `price`, `description`, `type`, `pic`) VALUES
(8, 'G-STAR RAW', 30, 'G-STAR RAW, Femme T-Shirt Basic V-Neck Cap Sleeve', 'women', '717WjTizOdL._AC_SX466_.jpg'),
(9, 'Essentials Sweatshirt', 16, 'Essentials Sweatshirt à Capuche Entièrement Zippé en Molleton et Éponge (Grandes Tailles Disponibles) Femme', 'women', '71z1bDdPr3L._AC_SX569_.jpg'),
(10, 'Ensemble Femme', 13, 'nsemble Femme 2 Pièces Coton et Lin Ete Pas Cher Chic Elegant Grande Taille T-Shirt Top + Pantalon Large Costume 2 Pièces Décontracté Sport Jogging Respirant Plage Tops + Pantalon 2 Piece Suit', 'women', '51BRVJXtqUL._AC_SX569_.jpg'),
(11, 'JACK & JONES', 41, 'JACK & JONES Jjerush Blocking Hood Bomber Jacket Homme', 'men', '51eJQLV3hFL._AC_SY606_.jpg'),
(12, 'JACK & JONES 2', 20, 'JACK & JONES hommes Jjemulti Bodywarmer matelassé Gilet sans manches', 'men', '51jw4ya9qpL._AC_SX569_.jpg'),
(13, 'Teddy Smith', 35, 'Teddy Smith Blouson léger à col montant - B-TERRY', 'men', '81xH3pSFD9L._AC_SX466_.jpg'),
(14, 'Chicco', 16, 'Chicco, Ensemble Enfant avec T-shirt et Short à Taille Élastique, avec Graphiques Modernes et à la Mode, 100% Coton, Lavable en Machine, Vêtements Enfant et Garçon, Conçu en Italie', 'kid', '71uaCKwvAoL._AC_SX569_.jpg'),
(15, 'ALANTOP', 17, 'ALANTOP Garçons décontracté survêtement sweats à capuche enfants 2 pièces tenue Cosplay super-héros araignée Costume ensemble à manches longues Sport costume sweat-shirt', 'kid', '61pgQrvAgwL._AC_SX569_.jpg'),
(16, 'Carolilly', 11, 'Carolilly Ensemble Vêtement Enfant Bébé Garçon de 2 Pièces, Sweats à Manches Longues + Pantalon Taille Elastique (0-3 Ans)', 'kid', '61mCV9Fns8L._AC_SX569_.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'hamza', 'hamzadsabouri@gmail.com', '3ba284df3ddd2af6ab1f3d848a3041e6', 'admin'),
(2, 'said', 'said@gmail.com', '3ba284df3ddd2af6ab1f3d848a3041e6', 'user'),
(3, 'yassin', 'yasssin@gmail.com', '3ba284df3ddd2af6ab1f3d848a3041e6', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
