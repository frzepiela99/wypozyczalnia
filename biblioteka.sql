-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2021, 22:53
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnik`
--

CREATE TABLE `czytelnik` (
  `Id_czytelnik` int(11) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Haslo` varchar(255) NOT NULL,
  `Nr_telefonu` int(9) NOT NULL,
  `Miejscowosc` varchar(255) NOT NULL,
  `Ulica` varchar(255) NOT NULL,
  `Nr_domu` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `czytelnik`
--

INSERT INTO `czytelnik` (`Id_czytelnik`, `Imie`, `Nazwisko`, `Mail`, `Haslo`, `Nr_telefonu`, `Miejscowosc`, `Ulica`, `Nr_domu`) VALUES
(1, 'Filip', 'Rzepiela', 'filiprzepiela@interia.pl', 'asasyn12', 587, 'Ropica Polska', '', '587'),
(2, 'Filip', 'Rzepiela', 'filiprzepiela@gmail.com', '$2y$10$Xd9fU4lAWn3UEgYf5iyf5ufXmpFYT1xBtH/W5CHS760g5wD6H6Ynu', 123456789, 'Gorlice', 'Kwiatowa', '587'),
(3, 'Piotr', 'Piecuch', 'piotrekp2999@gmail.com', '$2y$10$jeJhEOlqrwS3RozKfpodlOX5LXJdBAM60e5rkizzQpkmSS.FDDnHO', 123456789, 'Łużna', 'Łużna', '303'),
(4, 'Michał', 'Pawlikowski', 'michal0725@gmail.com', '$2y$10$ijP74fZDjEU3YoYbYXScu.cMk/Cq4Q917/HkDWj223HRhQcjBFnoq', 123123123, 'edwe', 'dfwwfwe', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `gatunek` varchar(255) NOT NULL,
  `wydawnictwo` varchar(255) NOT NULL,
  `rok_wydania` varchar(255) NOT NULL,
  `zdjecie` varchar(255) NOT NULL,
  `stan` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `tytul`, `autor`, `gatunek`, `wydawnictwo`, `rok_wydania`, `zdjecie`, `stan`, `ilosc`) VALUES
(1, 'Moja walka', 'Michał Pawlikowski', 'SCi-fi', 'Nowa era', '2005', 'ziel.png', 0, 3),
(2, 'Harry Filip', 'dewf', 'SCi-fi', 'Nowa era', '2005', 'ziel.png', 0, 3),
(3, 'Harry Pjoter', 'j.k Rowlingwefwef', 'SCi-fi', 'Nowa era', '2002', 'ziel.png', 1, 0),
(4, 'Harry Damian', 'j.k Rowling', 'SCi-fi', 'Nowa era', '2001', 'ziel.png', 2, 0),
(5, 'Prawdziwa Twarz Filipa', 'Michał Pawlikowski ', 'Dramat', 'PWSZ', '2021', 'filip.png', 0, 2),
(6, 'Lepszy ja', 'Michał Pawlikowski', 'Bajka', 'Operon', '2021', 'filip1.png', 0, 3),
(7, 'Pan Tadeusz', 'Adam Mieckiewicz', 'Poezja epicka', 'Nowa Era', '1834', 'pan.png', 0, 2),
(8, 'Lalka', 'Bolesław Prus', 'powieść', 'XYZ', '1889', 'lalka.png', 0, 2),
(9, 'Lalka', 'Bolesław Prus', 'powieść', 'XYZ', '1889', 'lalka.png', 0, 2),
(10, 'Lalka', 'Bolesław Prus', 'powieść', 'XYZ', '1889', 'lalka.png', 0, 2),
(11, 'O psie który jeździł koleją', 'Roman Pisarski', 'opowiadanie dla dzieci', 'Biuro Wydawnicze „RUCH”', '1967', '11.png', 0, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownik`
--

CREATE TABLE `pracownik` (
  `Id_pracownik` int(11) NOT NULL,
  `Imie` varchar(255) NOT NULL,
  `Nazwisko` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `Nr_telefonu` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownik`
--

INSERT INTO `pracownik` (`Id_pracownik`, `Imie`, `Nazwisko`, `Mail`, `haslo`, `Nr_telefonu`) VALUES
(1, 'Filip', 'Rzepiela', 'filiprzepiela@o2.pl', '$2y$10$Xd9fU4lAWn3UEgYf5iyf5ufXmpFYT1xBtH/W5CHS760g5wD6H6Ynu', 123456789),
(2, 'Piotr', 'Piecuch', 'piotrekpp2999@gmail.com', '$2y$10$15P5RD/uq8jyjazHaht/L.vIoLm0V43UAgzQVcbyrU1CMqfGR.K0a', 123456789),
(3, 'mic', 'dew', 'mp0725@gmail.com', '$2y$10$ijP74fZDjEU3YoYbYXScu.cMk/Cq4Q917/HkDWj223HRhQcjBFnoq', 123123123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id_rez` int(11) NOT NULL,
  `id_czytelnik` int(11) NOT NULL,
  `id_ksiazki` int(11) NOT NULL,
  `data_rez` date NOT NULL,
  `data_k_rez` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`id_rez`, `id_czytelnik`, `id_ksiazki`, `data_rez`, `data_k_rez`) VALUES
(1, 3, 2, '2021-11-02', '2021-11-04'),
(2, 3, 1, '2021-11-02', '2021-11-10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wyp` int(11) NOT NULL,
  `id_czytelnik` int(11) NOT NULL,
  `id_ksiazki` int(11) NOT NULL,
  `data_wyp` date NOT NULL,
  `data_zwrotu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wyp`, `id_czytelnik`, `id_ksiazki`, `data_wyp`, `data_zwrotu`) VALUES
(3, 3, 2, '2021-11-02', '2021-11-03'),
(4, 3, 2, '2021-11-01', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
  ADD PRIMARY KEY (`Id_czytelnik`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id_ksiazki`);

--
-- Indeksy dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  ADD PRIMARY KEY (`Id_pracownik`);

--
-- Indeksy dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id_rez`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wyp`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `czytelnik`
--
ALTER TABLE `czytelnik`
  MODIFY `Id_czytelnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `Id_pracownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id_rez` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wyp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
