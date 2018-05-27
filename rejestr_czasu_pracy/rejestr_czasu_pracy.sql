-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Maj 2018, 19:42
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rejestr_czasu_pracy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `pierwsze_imie` text COLLATE utf8_polish_ci NOT NULL,
  `drugie_imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `pesel` bigint(11) NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `id_umowy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `pierwsze_imie`, `drugie_imie`, `nazwisko`, `pesel`, `adres`, `id_umowy`) VALUES
(1, 'Maciek', 'brak', 'Kulak', 96847852212, 'Wrocław 54-321 reja 23/10\r\n', 1),
(2, 'Katarzyna', 'Ania', 'Rej', 93031405131, 'Konin 43-121', 2),
(3, 'Stroz', 'Brak', 'Nocny', 91031206142, 'Wierzbie 46-310', 4),
(4, 'Mariusz', 'Adam', 'Koza', 91031203135, 'Wroclaw 53-410', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `id_transakcji` int(11) NOT NULL,
  `id_pracownika` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `kierunek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `umowa`
--

CREATE TABLE `umowa` (
  `id_umowy` int(11) NOT NULL,
  `typ_umowy` text COLLATE utf8_polish_ci NOT NULL,
  `od` int(11) NOT NULL,
  `do` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `umowa`
--

INSERT INTO `umowa` (`id_umowy`, `typ_umowy`, `od`, `do`) VALUES
(1, 'Umowa o prace', 8, 16),
(2, 'Umowa o dzielo ', 8, 12),
(3, 'Umowa zlecenie', 8, 13),
(4, 'Stroz nocny', 20, 7);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`);

--
-- Indeksy dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id_transakcji`);

--
-- Indeksy dla tabeli `umowa`
--
ALTER TABLE `umowa`
  ADD PRIMARY KEY (`id_umowy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id_transakcji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `umowa`
--
ALTER TABLE `umowa`
  MODIFY `id_umowy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
