-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 24, 2025 at 12:24 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matematyczna_gra`
--

-- --------------------------------------------------------

--
--

CREATE TABLE `czas` (
  `id_czas` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_poziom` int(11) NOT NULL,
  `czas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `czas`
--

INSERT INTO `czas` (`id_czas`, `id_uzytkownik`, `id_poziom`, `czas`) VALUES
(40, 15, 1, '00:00:06'),
(41, 15, 2, '00:00:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE `komentarz` (
  `id_komentarz` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_poziom` int(11) NOT NULL,
  `ocena` int(1) NOT NULL CHECK (`ocena` between 1 and 5),
  `komentarz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarz`
--

INSERT INTO `komentarz` (`id_komentarz`, `id_uzytkownik`, `id_poziom`, `ocena`, `komentarz`) VALUES
(1, 15, 1, 4, 'slaby poziom nie moge przejsc'),
(2, 18, 1, 5, 'wow super poziom przeszlam w 2sekund'),
(12, 1, 1, 2, 'Super poziom, mega mi sie podoba'),
(22, 15, 2, 5, 'super poziom, troche ciężki, ale z pomocą ChatGPT dalem rade go przejsc! 💪💪'),
(23, 18, 2, 5, 'fajny'),
(24, 15, 3, 5, 'very nice level '),
(25, 15, 4, 2, 'ciezkie'),
(26, 15, 5, 5, 'proste'),
(27, 15, 6, 5, 'latwe'),
(28, 15, 7, 5, 'latwiutkie'),
(29, 15, 8, 5, ''),
(32, 18, 3, 5, 'nnmm'),
(33, 15, 9, 4, 'proste'),
(35, 28, 1, 4, 'mega');

-- --------------------------------------------------------

--
--

CREATE TABLE `poziom` (
  `id_poziom` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `trudnosc` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poziom`
--

INSERT INTO `poziom` (`id_poziom`, `nazwa`, `opis`, `trudnosc`, `id_autor`) VALUES
(1, 'dodawanie', 'pierwsze najlatwiejsze zadanie z dodawania', 1, 15),
(2, 'Mnożenie', 'Proste zadanie z mnożenia', 1, 18),
(3, '48:3', 'prosty poziom z dzieleniem', 0, 1),
(4, '(3 + 5) × 2', 'Poziom z mnożeniem, średni poziom trudności.', 0, 1),
(5, '2 + 3', 'Prosty poziom z dodawaniem.', 0, 15),
(6, '7 × 6', 'Ćwiczenie mnożenia dla średniozaawansowanych.', 0, 18),
(7, '15 ÷ 3', 'Podstawowe dzielenie liczb całkowitych.', 0, 15),
(8, '(4 + 5) × 2', 'Działanie z nawiasami i mnożeniem.', 0, 1),
(9, 'poziom 9', 'mega hard poziom', 4, 18);

-- --------------------------------------------------------

--
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `wygrane` int(11) NOT NULL DEFAULT 0,
  `przegrane` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `id_uzytkownik`, `wygrane`, `przegrane`, `ranking`) VALUES
(2, 15, 100, 0, 312),
(3, 18, 0, 1203, -400);

-- --------------------------------------------------------

--
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownik` int(11) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `ranking` int(11) DEFAULT 0,
  `rola` tinyint(1) NOT NULL DEFAULT 0,
  `plec` tinyint(1) NOT NULL,
  `poziom` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownik`, `nick`, `telefon`, `haslo`, `ranking`, `rola`, `plec`, `poziom`) VALUES
(1, 'piotrek', '720767261', '$2y$10$OEWPx8EFc6Az4NXF9ifPyeeUdjqgQmtbpeJecfij42c/og4rfUdkS', 0, 1, 0, 1),
(15, 'Robert Lewandowski', '1', '$2y$10$V6ezUbW3DmTTZ8Vpg7rwu.jTODr/AuGYZj7PpH.Ftc1LynDvge0ey', 313, 0, 0, 3),
(18, 'Ewa Swoboda', '2', '$2y$10$FRsdxJbBnUxW4RiOVYzl2e2EcLC2IGac/epSdyfDmhDTv0NWyK8Ui', 312321, 0, 1, 1),
(25, '9 zer', '000000000', '123', 0, 0, 1, 1),
(27, 'testowekonto', '12', '123', 0, 0, 1, 1),
(28, 'supertest', '123123123', '$2y$10$ScI.ITm.YypkMdJX0duruOfVe5QANJBzbuLZ52PJs2weJitteZzl6', 0, 0, 0, 1),
(29, 'fftswedf', '344555553', '$2y$10$yYWatF1/uX2lWHYMr6Zlc.2TiRSgIKgZwgP2ZFB2cj1mzWf.taHOy', 0, 0, 1, 1),
(30, 'aleks', '312312132', '$2y$10$TU3GFATfp897JKzyAmR2AOJn6/r9vzYaYuSKbemKfJDFdof0G/gYu', 0, 0, 0, 1);

--
-- Indeksy dla zrzutów tabel
--

--
--
ALTER TABLE `czas`
  ADD PRIMARY KEY (`id_czas`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_poziom` (`id_poziom`);

--
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`id_komentarz`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_poziom` (`id_poziom`);

--
--
ALTER TABLE `poziom`
  ADD PRIMARY KEY (`id_poziom`),
  ADD KEY `autor` (`id_autor`);

--
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `czas`
--
ALTER TABLE `czas`
  MODIFY `id_czas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `id_komentarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id_poziom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `czas`
--
ALTER TABLE `czas`
  ADD CONSTRAINT `czas_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id_uzytkownik`),
  ADD CONSTRAINT `czas_ibfk_2` FOREIGN KEY (`id_poziom`) REFERENCES `poziom` (`id_poziom`);

--
-- Constraints for table `komentarz`
--
ALTER TABLE `komentarz`
  ADD CONSTRAINT `komentarz_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id_uzytkownik`),
  ADD CONSTRAINT `komentarz_ibfk_2` FOREIGN KEY (`id_poziom`) REFERENCES `poziom` (`id_poziom`);

--
-- Constraints for table `poziom`
--
ALTER TABLE `poziom`
  ADD CONSTRAINT `poziom_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `uzytkownik` (`id_uzytkownik`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id_uzytkownik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
