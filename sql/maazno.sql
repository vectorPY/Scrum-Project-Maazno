-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Mrz 2022 um 19:22
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `maazno`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `preis` float NOT NULL,
  `bild` longblob NOT NULL,
  `beschreibung` varchar(1000) NOT NULL,
  `kategorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `im_warenkorb`
--

CREATE TABLE `im_warenkorb` (
  `artikel_id` int(11) NOT NULL,
  `warenkorb_id` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL,
  `nutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `kategorie_id` int(11) NOT NULL,
  `kategorie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kauft`
--

CREATE TABLE `kauft` (
  `kauf_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `nutzer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `land`
--

CREATE TABLE `land` (
  `land_id` int(11) NOT NULL,
  `land` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `nutzer_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `vorname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL UNIQUE,
  `telefon` varchar(32) NOT NULL,
  `straße` varchar(32) NOT NULL,
  `hausnummer` int(11) NOT NULL,
  `passwort` varchar(128) NOT NULL,
  `ort_id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ort`
--

CREATE TABLE `ort` (
  `ort_id` int(11) NOT NULL,
  `ort` varchar(32) NOT NULL,
  `plz` varchar(32) NOT NULL,
  `land_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`),
  ADD KEY `kategorie_id` (`kategorie_id`);

--
-- Indizes für die Tabelle `im_warenkorb`
--
ALTER TABLE `im_warenkorb`
  ADD PRIMARY KEY (`warenkorb_id`),
  ADD KEY `nutzer_id` (`nutzer_id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategorie_id`);

--
-- Indizes für die Tabelle `kauft`
--
ALTER TABLE `kauft`
  ADD PRIMARY KEY (`kauf_id`),
  ADD KEY `artikel:id` (`artikel_id`),
  ADD KEY `nutzer_id` (`nutzer_id`);

--
-- Indizes für die Tabelle `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`nutzer_id`),
  ADD KEY `nutzer_ibfk_1` (`ort_id`);

--
-- Indizes für die Tabelle `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`ort_id`),
  ADD KEY `land_id` (`land_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `im_warenkorb`
--
ALTER TABLE `im_warenkorb`
  MODIFY `warenkorb_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategorie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kauft`
--
ALTER TABLE `kauft`
  MODIFY `kauf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `nutzer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `ort`
--
ALTER TABLE `ort`
  MODIFY `ort_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`kategorie_id`) REFERENCES `kategorie` (`kategorie_id`);

--
-- Constraints der Tabelle `im_warenkorb`
--
ALTER TABLE `im_warenkorb`
  ADD CONSTRAINT `artikel_id` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`),
  ADD CONSTRAINT `nutzer_id` FOREIGN KEY (`nutzer_id`) REFERENCES `nutzer` (`nutzer_id`);

--
-- Constraints der Tabelle `kauft`
--
ALTER TABLE `kauft`
  ADD CONSTRAINT `artikel:id` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`artikel_id`),
  ADD CONSTRAINT `kauft_ibfk_1` FOREIGN KEY (`nutzer_id`) REFERENCES `nutzer` (`nutzer_id`);

--
-- Constraints der Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD CONSTRAINT `nutzer_ibfk_1` FOREIGN KEY (`ort_id`) REFERENCES `ort` (`ort_id`);

--
-- Constraints der Tabelle `ort`
--
ALTER TABLE `ort`
  ADD CONSTRAINT `ort_ibfk_1` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
