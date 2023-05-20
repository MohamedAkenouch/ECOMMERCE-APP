-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 fév. 2021 à 20:02
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(2000) NOT NULL,
  `article_body` mediumtext NOT NULL,
  `article_image` varchar(2000) DEFAULT NULL,
  `articles_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_body`, `article_image`, `articles_date`) VALUES
(15, 'clothes', 'When it comes to headgear, nothing seems more standard and natural than a baseball cap. While originally an American phenomenon, the popularity of baseball caps has exploded across the world and societal classes. It can be worn as a fashion statement, to identify one’s loyalty to a sports team, or to block out the glare of the Sun  and hold one’s hair out of their face while working. For these reasons it, has been referred to as the “Common Man’s Crown,” and it is no wonder why baseball caps are worn by almost everybody.', '3.jpg', '2021-02-04 14:20:57');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `email`, `password`, `phone_number`) VALUES
(1, 'administrateur shop', 'administration_shop@gmail.com', '$2y$10$I2cJOa9N5uVR5MLGEp8Que5xBqNpkcZT90/XAB5SQ0b.uxGbdD4TG', '0620002393'),
(5, 'ami rbah', 'amin_rbah@gmail.com', '$2y$10$e4zQgRfaILCi3zazqlEoNeg1A3wsZa/W06tT.1ghR/7nOwFVfVfZu', '0689384949');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `commande_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `stat` varchar(50) DEFAULT 'non commander',
  `date_commande` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`commande_id`, `fk_client_id`, `fk_product_id`, `quantity`, `stat`, `date_commande`) VALUES
(22, 5, 40, 3, 'validate', '2021-02-09');

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id` int(11) NOT NULL,
  `expediteur` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(400) COLLATE utf8mb4_bin DEFAULT NULL,
  `message` text COLLATE utf8mb4_bin NOT NULL,
  `etat` varchar(200) COLLATE utf8mb4_bin NOT NULL DEFAULT 'non_lu'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `expediteur`, `subject`, `email`, `message`, `etat`) VALUES
(3, 'HOUDA AKENOUCH', 'suggestions', 'houdaakn@gmail.com', 'brooooojola sdo', 'Message est Lu');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category` varchar(20) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_color` varchar(200) NOT NULL,
  `product_size` char(1) NOT NULL,
  `product_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_desc` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `product_price`, `product_image`, `product_quantity`, `product_color`, `product_size`, `product_date`, `product_desc`) VALUES
(39, 'Long Sleeve Crew Neck Printed Sweatshirt blue', 'FEMME', 50.00, 'Green Vintage Shirts And Tops Tunics.jpg', 7, '#1b5705', 'S', '2021-02-04 13:42:06', ''),
(40, 'Vintage Wool Blend Shawl Neck Outerwear gray', 'HOMME', 20.00, 'Vintage Wool Blend Shawl Neck Outerwear gray.jpg', 7, '#707070', 'L', '2021-02-04 13:43:29', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`commande_id`),
  ADD KEY `fk_product_id` (`fk_product_id`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`fk_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`fk_client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
