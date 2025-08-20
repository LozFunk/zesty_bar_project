-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jul 2025 um 14:32
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zesty_bar_project`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$1HtXRM5jo2RbBMIOT3CjkOeqJEwVQSf5FMrosEEk1ZsaxN9m33i1q');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `guest_feedback`
--

CREATE TABLE `guest_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `guest_feedback`
--

INSERT INTO `guest_feedback` (`id`, `name`, `email`, `phone_num`, `message`, `created_at`) VALUES
(1, 'Tom', 'tom@tom.de', 0, 'Everything was perfect!!!', '2025-07-15 11:23:37'),
(2, 'Tom', 'tom@tom.de', 0, 'Everything was perfect!!!', '2025-07-15 11:26:14'),
(3, 'Alexandros', 'alex@alex.de', 0, 'Best cocktails ever!', '2025-07-15 11:37:10'),
(4, 'Alexandros', 'alex@alex.de', 0, 'Best cocktails ever!', '2025-07-15 11:38:21'),
(5, 'Hugo', 'hugo@hugo.de', 1234556794, 'I liked the atmosphere ', '2025-07-15 11:41:06'),
(6, 'Hugo', 'hugo@hugo.de', 1234556794, 'I liked the atmosphere ', '2025-07-15 11:41:14'),
(7, 'Helene', 'helene@helene.de', 0, 'Everything is double', '2025-07-15 11:43:34');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `cocktail_category` varchar(255) NOT NULL,
  `cocktail_name` varchar(255) NOT NULL,
  `ingredients` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `menu`
--

INSERT INTO `menu` (`id`, `cocktail_category`, `cocktail_name`, `ingredients`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bright & Botanical', 'Velvet Citrus', 'Gin, bergamot liqueur, rosemary syrup, grapefruit zest', 'Clean and refreshing with a herbal finish — our signature opener.', '2025-07-15 14:08:35', '2025-07-15 14:29:20'),
(2, 'Bright & Botanical', 'Garden No. 9', 'Vodka, cucumber, elderflower, mint, tonic mist', 'A light botanical pour, like spring in a glass.', '2025-07-15 14:08:35', NULL),
(3, 'Bright & Botanical', 'Yuzu Whisper', 'Shochu, yuzu, jasmine tea cordial, lemon oil', 'Delicate yet punchy — floral, citrusy, and unexpected.', '2025-07-15 14:08:35', NULL),
(4, 'Smoked & Stirred', 'Charred Negroni', 'Mezcal, vermouth, campari, burnt orange peel', 'A bold take on a classic with deep smoke and bite.', '2025-07-15 14:08:35', NULL),
(5, 'Smoked & Stirred', 'Fig & Ember', 'Bourbon, fig reduction, black walnut bitters, cinnamon smoke', 'Dark, rich, and warmly spiced — a fireside favorite.', '2025-07-15 14:08:35', NULL),
(6, 'Smoked & Stirred', 'Old Soul', 'Rye whiskey, oloroso sherry, honey, angostura, clove mist', 'Complex and brooding with a soft, soul-stirring finish.', '2025-07-15 14:08:35', NULL),
(7, 'After Dark', 'Zesty No. 5', 'Vodka, white tea, yuzu, elderflower, prosecco float', 'Effervescent and elegant — subtle sweetness with a floral lift.', '2025-07-15 14:08:35', NULL),
(8, 'After Dark', 'Espresso Bloom', 'Espresso, vodka, coffee liqueur, vanilla bean foam', 'Our refined take on the espresso martini — smooth, balanced, and creamy.', '2025-07-15 14:08:35', NULL),
(9, 'After Dark', 'Night Shift', 'Tequila, amaro, chocolate bitters, smoked sea salt rim', 'Bold and bitter with depth and edge — made for the late hours.', '2025-07-15 14:08:35', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` int(20) DEFAULT NULL,
  `res_date` date NOT NULL,
  `res_time` time NOT NULL,
  `num_guests` int(11) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `email`, `phone_num`, `res_date`, `res_time`, `num_guests`, `notes`, `created_at`) VALUES
(1, 'Alexandros', 'Iosifidis', 'alex@alex.de', 0, '2025-07-20', '20:00:00', 2, 'A nice table please!', '2025-07-15 12:44:05'),
(2, 'Hugo', 'Boss', 'hugo@hugo.de', 2147483647, '2025-07-25', '19:45:00', 6, 'Drinks only', '2025-07-15 12:45:25');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indizes für die Tabelle `guest_feedback`
--
ALTER TABLE `guest_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `guest_feedback`
--
ALTER TABLE `guest_feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
