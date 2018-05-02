-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Kwi 2018, 16:56
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
(2, 3, 4, '2016-11-24', '2017-08-30', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `ID` int(10) NOT NULL,
  `Pracodawca` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Pracownik` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
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
(85, 'PRACODAWCA', 'Leonidas', 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(88, 'SILOWNIA', 'Edek', 1, 2, 3, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(89, 'SILOWNIA', 'Wariat', 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(90, 'SILOWNIA', 'Janusz', 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(91, 'PIEKARNIA', 'Janusz', 2, 3, 4, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(92, 'PIEKARNIA', 'Jan Jan', 1, 2, 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(93, 'SILOWNIA', 'Jan Kowalski', 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(94, 'SILOWNIA', 'Jan Kowalski', 999, 999, 999, 999, 9999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', 1),
(95, 'PIEKARNIA', 'Jan Kowalski', 1, 2, 3, 4, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(100, 'PIEKARNIA', 'Jan Kowalski', 123, 123, 321, 321, 213, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracodawcy`
--

CREATE TABLE `pracodawcy` (
  `ID` int(10) NOT NULL,
  `nazwa_firmy` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracodawcy`
--

INSERT INTO `pracodawcy` (`ID`, `nazwa_firmy`) VALUES
(1, 'ŻABKA'),
(2, 'MYJNIA'),
(3, 'STACJA PALIW'),
(4, 'PIEKARNIA'),
(5, 'DRUKARNIA'),
(6, 'CUKIERNIA'),
(7, 'SILOWNIA'),
(8, 'GAZOWNIA'),
(9, 'WODOCIAGI'),
(10, 'BAR'),
(11, 'RESTAURACJA');

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
  `password` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `firstlogin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`ID`, `PESEL`, `Imie`, `Nazwisko`, `login`, `password`, `firstlogin`) VALUES
(3, '00000000001', 'Jan', 'Kowalski', 'janpierwszy', 'raz', 0),
(4, '00000000002', 'Janina', 'Kowalska', 'jk', '123', 0),
(5, '00000000003', 'John ', 'Doe', '', '', 1),
(6, '00000000004', 'Jenny', 'Doe', '', '', 1),
(7, '00000000005', 'Jan', 'Nowak', 'jNowak', 'zxc', 0),
(8, '00000000006', 'Janina', 'Nowak', 'janinan', 'raz', 0),
(9, '00000000007', 'Piotr', 'Kowalski', '', '', 1),
(10, '00000000008', 'Robert', 'Nowak', 'robert', '123', 0),
(11, '00000000009', 'Alicja', 'Nowak', '', '', 1),
(13, '00000000011', 'Izydor', 'Całka', '', '', 1),
(14, '00000000012', 'Pole', 'Prostokątu', 'raz', 'raz', 0);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
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
