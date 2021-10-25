-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 25 oct. 2021 à 11:43
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gym`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarif` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `nbrsemaine` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `label`, `tarif`, `duree`, `nbrsemaine`, `created_at`, `updated_at`) VALUES
(5, 'quatre fois par semaine', '4500', NULL, 4, '2021-03-27 16:33:00', '2021-03-27 16:33:00'),
(2, 'deux fois par semaine', '2000', NULL, 2, '2021-03-14 07:17:11', '2021-03-14 07:17:11'),
(3, 'trois fois par semaine', '3000', NULL, 3, '2021-03-16 08:27:28', '2021-03-16 08:27:28'),
(4, 'Cinq fois semaine', '6000', NULL, 5, '2021-03-16 18:28:43', '2021-03-16 18:28:43');

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solde` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`, `password_text`, `solde`) VALUES
(1, 'amine', 'labo', '$2y$10$owMlo3pyZ6TaUHPVL8i/4OaWpSrfFZ3Pmw24f9dFba.Z.KYa8MWyu', 0, 'cApSkwMZBH89hBimhzxOYP104sOlXiOtRn8bt20ENZGyFWS1c9rqIAiLNR4h', '2020-07-03 16:10:32', '2020-12-16 19:49:46', 'lsrapide', NULL),
(2, 'ali', 'ali', '$2y$10$AaQ/PffhbwomOajpdIJypeYEK1rrawIHXf/0hdKPah5YnL8XqUNii', 0, NULL, '2020-12-09 18:24:28', '2020-12-16 19:52:03', 'admin2020', NULL),
(4, 'omar omar', 'omar12', '$2y$10$9pNwsLLjwaiKV/7GwhLun.ZTZEQEtUNCodW7pmecBK57QCCq1vKVK', 0, NULL, '2020-12-19 18:33:22', '2020-12-19 18:33:22', 'omar', NULL),
(5, 'root', 'root', '$2y$10$USkYJu5LJtzkZE1JpYn1re/TJVHE2HF1P6A9uEa0cnE1pEgl6RUSe', 1, NULL, '2020-12-26 10:58:15', '2020-12-26 10:58:15', 'root', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `crenaus`
--

CREATE TABLE `crenaus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plage` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `crenaus`
--

INSERT INTO `crenaus` (`id`, `type`, `jour`, `plage`, `created_at`, `updated_at`) VALUES
(5, 'femme', 'homme', '[{\"debut\":\"03:01\",\"fin\":\"22:58\"}]', '2021-03-28 20:08:30', '2021-03-28 20:08:30'),
(6, 'mixte', 'lundi', '[{\"debut\":\"01:00\",\"fin\":\"19:00\"}]', '2021-03-28 20:13:53', '2021-03-28 20:13:53');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `reste` int(11) DEFAULT NULL,
  `nbsseance` int(11) DEFAULT NULL,
  `membre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abonnement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `remise` int(11) DEFAULT NULL,
  `nbrmois` int(11) DEFAULT NULL,
  `versement` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `debut`, `fin`, `reste`, `nbsseance`, `membre`, `abonnement`, `etat`, `total`, `remise`, `nbrmois`, `versement`, `created_at`, `updated_at`, `payment`) VALUES
(1, '2021-03-14', NULL, NULL, NULL, '3', '1', '1', NULL, NULL, NULL, NULL, '2021-03-14 06:31:05', '2021-03-14 06:31:05', NULL),
(2, '2021-03-14', NULL, NULL, NULL, '4', '1', '1', NULL, NULL, NULL, NULL, '2021-03-14 06:31:18', '2021-03-14 06:31:18', NULL),
(3, '2021-03-14', '2022-02-02', NULL, NULL, '6', '1', '1', NULL, 300, 1, NULL, '2021-03-14 07:07:38', '2021-03-14 07:07:38', NULL),
(4, '2021-03-14', NULL, NULL, NULL, '7', '{\"id\":2,\"label\":\"deux fois par semaine\",\"tarif\":\"2000\",\"duree\":null,\"nbrsemaine\":2,\"created_at\":\"2021-03-14 08:17:11\",\"updated_at\":\"2021-03-14 08:17:11\"}', '1', NULL, NULL, 2, NULL, '2021-03-14 07:38:14', '2021-03-14 07:38:14', NULL),
(5, '2021-03-14', NULL, NULL, NULL, '8', '2', '1', NULL, NULL, 1, NULL, '2021-03-14 07:40:17', '2021-03-14 07:40:17', NULL),
(6, '2021-03-14', '2021-12-14', NULL, NULL, '10', '2', '1', NULL, 0, 9, 18000, '2021-03-14 08:13:00', '2021-03-14 08:13:00', NULL),
(7, '2021-03-16', '2021-07-16', NULL, 48, '11', '3', '1', 12000, 0, 4, 12000, '2021-03-16 08:40:52', '2021-03-16 08:40:52', NULL),
(8, '2021-03-16', '2021-05-16', NULL, 24, '1', '3', '1', 6000, 0, 2, 6000, '2021-03-16 11:58:28', '2021-03-16 11:58:28', NULL),
(9, '2021-03-16', '2022-01-16', NULL, 200, '12', '4', '1', 60000, 1100, 10, 60000, '2021-03-16 18:44:28', '2021-03-16 18:44:28', NULL),
(10, '2021-03-18', '2021-07-18', NULL, 32, '13', '2', '1', 8000, 2000, 4, 8000, '2021-03-18 15:10:11', '2021-03-18 15:10:11', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `naissance` date DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2021_03_13_181551_create_membres_table', 3),
(7, '2021_03_13_194057_create_inscriptions_table', 4),
(5, '2021_03_13_194203_create_abonnements_table', 2),
(9, '2021_03_14_071452_create_presences_table', 5),
(14, '2021_03_25_215603_create_crenaus_table', 10),
(11, '2021_03_27_170753_add_sanguin_to_members_table', 7),
(13, '2021_03_27_171133_make_sang_null', 9);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `presences`
--

CREATE TABLE `presences` (
  `id` int(10) UNSIGNED NOT NULL,
  `inscription` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_unique` (`email`);

--
-- Index pour la table `crenaus`
--
ALTER TABLE `crenaus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `crenaus`
--
ALTER TABLE `crenaus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
