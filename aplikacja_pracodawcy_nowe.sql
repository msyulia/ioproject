-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2018, 11:35
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(4, 15, 1, '2018-05-07', '2018-05-31', 1),
(5, 15, 2, '2018-01-01', '2018-02-27', 1),
(6, 15, 4, '2017-09-03', '2018-07-26', 0),
(7, 16, 3, '2017-11-05', '2018-07-25', 1),
(8, 16, 1, '2014-11-06', '2016-11-06', 1),
(9, 17, 4, '2017-12-01', '2018-01-24', 0),
(10, 17, 1, '2018-03-04', '2018-04-24', 1),
(11, 17, 3, '2017-09-03', '2017-10-22', 1),
(12, 18, 2, '2018-03-01', '2018-05-01', 1);

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
(110, 'MYJNIA', 15, 4, 3, 4, 3, 2, 'Bardzo polecam tego pracodawcę!', 0),
(111, 'ŻABKA', 16, 4, 4, 4, 4, 4, 'Świetna atmosfera, ogólnie super!', 0),
(112, 'STACJA PALIW', 16, 4, 4, 4, 4, 4, 'Nigdy więcej, ale ocena wysoka.', 0);

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
(4, 'PIEKARNIA', 'Opis firmy nr 6');

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
(15, '93010500510', 'Jan', 'Nowak', 'JNowak', '$2y$10$Pt6f.xoCMPbZArZeIlhZm.ID2F7BwauUegDKXuwrzlVVQCaknZN42', 0, ''),
(16, '98060593800', 'Jenny', 'Doe', 'JDoe', '$2y$10$sQ/qRzC10yOOWbU2DjDKE.oSx6ZzFat7guBqGDdI7ELNkYbpIdIWG', 0, 'jdoe@gmail.com'),
(17, '91062568317', 'Mariusz', 'Kowalski', '', '', 1, ''),
(18, '89110175019', 'Anna', 'Kowalska', '', '', 1, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `historiazatrudnienia`
--
ALTER TABLE `historiazatrudnienia`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PracownikID` (`PracownikID`),
  ADD KEY `PracodawcaID` (`PracodawcaID`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `pracodawcy`
--
ALTER TABLE `pracodawcy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `pracownicy`
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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT dla tabeli `pracodawcy`
--
ALTER TABLE `pracodawcy`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `historiazatrudnienia`
--
ALTER TABLE `historiazatrudnienia`
  ADD CONSTRAINT `historiazatrudnienia_ibfk_1` FOREIGN KEY (`PracownikID`) REFERENCES `pracownicy` (`ID`),
  ADD CONSTRAINT `historiazatrudnienia_ibfk_2` FOREIGN KEY (`PracodawcaID`) REFERENCES `pracodawcy` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
