-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 août 2022 à 08:01
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pizzeria`
--

-- --------------------------------------------------------

--
-- Structure de la table `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE IF NOT EXISTS `pizzas` (
  `id_pizza` int(11) NOT NULL AUTO_INCREMENT,
  `name_pizza` varchar(100) NOT NULL,
  `description_pizza` varchar(500) NOT NULL,
  `price_pizza` int(255) NOT NULL,
  `img_pizza` varchar(150) NOT NULL,
  `base_pizza` varchar(50) NOT NULL,
  `promo_pizza` varchar(50) NOT NULL,
  `quantity_pizza` int(20) NOT NULL,
  PRIMARY KEY (`id_pizza`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pizzas`
--

INSERT INTO `pizzas` (`id_pizza`, `name_pizza`, `description_pizza`, `price_pizza`, `img_pizza`, `base_pizza`, `promo_pizza`, `quantity_pizza`) VALUES
(1, 'Pizza 1', 'Base créme, fromage, choriso, rondelles d\'olives.', 6, 'img/home-img-1.png', 'Créme', 'Non', 10),
(2, 'Pizza 2', 'Base créme, fromage, jambon, poivrons.', 6, 'img/home-img-2.png', 'Créme', 'Non', 10),
(3, 'Pizza 3', 'test', 6, 'img/home-img-1.png', 'creme', 'non', 6),
(12, 'Pizza 6 ', 'Spéciale a base de nutella', 800, 'img/home-img-3.png', 'Nutella', 'Non', 1),
(10, 'Pizza 4', 'test', 20, 'img/home-img-2.png', 'créme', 'non', 50),
(11, 'Pizza 5', 'Base tomate, fromage, jambon', 6, 'img/home-img-1.png', 'Tomate', 'Non', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `email_user`, `password_user`) VALUES
(1, 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
