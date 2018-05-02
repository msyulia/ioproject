-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Kwi 2018, 19:40
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `aplikacja_pracodawcy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historiazatrudnienia`
--

CREATE TABLE `historiazatrudnienia` (
  `ID` int(10) NOT NULL,
  `PracownikID` int(10) NOT NULL,
  `PracodawcaID` int(10) NOT NULL,
  `dataZatrudniena` date NOT NULL,
  `dataZwolnienia` date NOT NULL,
  `czyWystawionaOcena` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `historiazatrudnienia`
--

INSERT INTO `historiazatrudnienia` (`ID`, `PracownikID`, `PracodawcaID`, `dataZatrudniena`, `dataZwolnienia`, `czyWystawionaOcena`) VALUES
(1, 3, 7, '2016-05-01', '2016-11-01', 0),
(2, 3, 4, '2016-11-24', '2017-08-30', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `ID` int(10) NOT NULL,
  `Pracodawca` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pracownik` int(11) DEFAULT NULL,
  `Kat1` int(10) DEFAULT NULL,
  `Kat2` int(10) DEFAULT NULL,
  `Kat3` int(10) DEFAULT NULL,
  `Kat4` int(10) DEFAULT NULL,
  `Kat5` int(10) DEFAULT NULL,
  `Komentarz` text COLLATE utf8_polish_ci,
  `czyWidoczna` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`ID`, `Pracodawca`, `Pracownik`, `Kat1`, `Kat2`, `Kat3`, `Kat4`, `Kat5`, `Komentarz`, `czyWidoczna`) VALUES
(85, 'PRACODAWCA', 3, 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(88, 'SILOWNIA', 3, 1, 2, 3, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(89, 'SILOWNIA', 3, 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(90, 'SILOWNIA', 3, 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(91, 'PIEKARNIA', 3, 2, 3, 4, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(92, 'PIEKARNIA', 3, 1, 2, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(93, 'SILOWNIA', 3, 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(94, 'SILOWNIA', 0, 4, 4, 4, 3, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', 1),
(95, 'PIEKARNIA', 0, 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(100, 'PIEKARNIA', 0, 1, 2, 3, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(101, 'SILOWNIA', 3, 0, 0, 0, 0, 0, '', 0),
(102, 'PIEKARNIA', 3, 1, 2, 3, 4, 5, '1234', 0),
(103, 'PIEKARNIA', 3, 99, 99, 99, 99, 99, 'Siemson', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracodawcy`
--

CREATE TABLE `pracodawcy` (
  `ID` int(10) NOT NULL,
  `nazwa_firmy` varchar(255) CHARACTER SET utf8 NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracodawcy`
--

INSERT INTO `pracodawcy` (`ID`, `nazwa_firmy`, `opis`) VALUES
(1, 'ŻABKA', 'Opis firmy nr 11'),
(2, 'MYJNIA', 'Opis firmy nr 5'),
(3, 'STACJA PALIW', 'Opis firmy nr 9'),
(4, 'PIEKARNIA', 'Opis firmy nr 6'),
(5, 'DRUKARNIA', 'Opis firmy nr 2'),
(6, 'CUKIERNIA', 'Opis firmy nr 3'),
(7, 'SILOWNIA', 'Opis firmy nr 8'),
(8, 'GAZOWNIA', 'Opis firmy nr 4'),
(9, 'WODOCIAGI', 'Opis firmy nr 10'),
(10, 'BAR', 'Opis firmy nr 1'),
(11, 'RESTAURACJA', 'Opis firmy nr 7');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `ID` int(10) NOT NULL,
  `PESEL` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `Imie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_polish_ci NOT NULL,
  `firstlogin` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`ID`, `PESEL`, `Imie`, `Nazwisko`, `login`, `password`, `firstlogin`, `email`) VALUES
(3, '91071314764', 'Jan', 'Kowalski', 'janpierwszy', '$2y$10$OEeSCOuGexj77o0C1bjEBO64qpC9TS5yREoR.bFAywvlsV7RsJOX.', 0, 'janpierwszy@gmail.com'),
(4, '92071314764', 'Janina', 'Kowalska', 'jk', '123', 0, ''),
(5, '93071314764', 'John ', 'Doe', 'johndoe', '$2y$10$PPzWDHPSJLLQEnRgesXoxOPauAkY.JKspedrdu0R3VO73sNdB4mwe', 0, ''),
(6, '92071314764', 'Jenny', 'Doe', '', '', 1, ''),
(7, '92071314764', 'Jan', 'Nowak', 'jNowak', 'zxc', 0, ''),
(8, '92071314764', 'Janina', 'Nowak', 'janinan', 'raz', 0, ''),
(9, '92071314764', 'Piotr', 'Kowalski', '', '', 1, ''),
(10, '92071314764', 'Robert', 'Nowak', 'robert', '123', 0, ''),
(11, '92071314764', 'Alicja', 'Nowak', '', '', 1, ''),
(13, '92071314764', 'Izydor', 'Całka', '', '', 1, ''),
(14, '00000000012', 'Pole', 'Prostokątu', 'raz', 'raz', 0, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `historiazatrudnienia`
--
ALTER TABLE `historiazatrudnienia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PracownikID` (`PracownikID`),
  ADD KEY `PracodawcaID` (`PracodawcaID`);

--
-- Indexes for table `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pracodawcy`
--
ALTER TABLE `pracodawcy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `historiazatrudnienia`
--
ALTER TABLE `historiazatrudnienia`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT dla tabeli `pracodawcy`
--
ALTER TABLE `pracodawcy`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `historiazatrudnienia`
--
ALTER TABLE `historiazatrudnienia`
  ADD CONSTRAINT `historiazatrudnienia_ibfk_1` FOREIGN KEY (`PracownikID`) REFERENCES `pracownicy` (`ID`),
  ADD CONSTRAINT `historiazatrudnienia_ibfk_2` FOREIGN KEY (`PracodawcaID`) REFERENCES `pracodawcy` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
