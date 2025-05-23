-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 31, 2025 at 09:15 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

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
(2, 18, 1, '00:00:42');

-- --------------------------------------------------------

--
-- 
--

CREATE TABLE `komentarz` (
  `id_komentarz` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `id_poziom` int(11) NOT NULL,
  `ocena` int(1) NOT NULL CHECK (`ocena` between 1 and 5),
  `komentarz` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 
--

CREATE TABLE `poziom` (
  `id_poziom` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `trudnosc` int(11) NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poziom`
--

INSERT INTO `poziom` (`id_poziom`, `nazwa`, `opis`, `trudnosc`, `autor`) VALUES
(1, 'dodawanie', 'pierwsze najlatwiejsze zadanie z dodawania', 1, 15),
(2, 'Mnożenie', 'Proste zadanie z mnożenia', 1, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ranking`
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
(2, 15, 100, 0, 312);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownik` int(11) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `ranking` int(11) DEFAULT 0,
  `rola` tinyint(1) NOT NULL DEFAULT 0,
  `plec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownik`, `nick`, `telefon`, `haslo`, `ranking`, `rola`, `plec`) VALUES
(15, 'Robert Lewandowski', '1', '$2y$10$V6ezUbW3DmTTZ8Vpg7rwu.jTODr/AuGYZj7PpH.Ftc1LynDvge0ey', 313, 0, 0),
(17, 'adsfsadfdsfdfsadafsasdasddasad', '1234', '$2y$10$PETQR9d10snc5JI.Reyt..fyk7sdgZexYWPDKpVB/kfUg/nlQnWe.', 0, 0, 0),
(18, 'Ewa Swoboda', '2', '$2y$10$FRsdxJbBnUxW4RiOVYzl2e2EcLC2IGac/epSdyfDmhDTv0NWyK8Ui', 312321, 0, 1),
(22, '1', '1231321123', '$2y$10$/1dT4/C7zSqFqAw8H83H3u1mGstrcr/0ni8XvXrkb1uVp91H7It3O', 0, 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czas`
--
ALTER TABLE `czas`
  ADD PRIMARY KEY (`id_czas`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_poziom` (`id_poziom`);

--
-- Indeksy dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`id_komentarz`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_poziom` (`id_poziom`);

--
-- Indeksy dla tabeli `poziom`
--
ALTER TABLE `poziom`
  ADD PRIMARY KEY (`id_poziom`),
  ADD KEY `autor` (`autor`);

--
-- Indeksy dla tabeli `ranking`
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
  MODIFY `id_czas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `id_komentarz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id_poziom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `poziom_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `uzytkownik` (`id_uzytkownik`);

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_uzytkownik`) REFERENCES `uzytkownik` (`id_uzytkownik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
