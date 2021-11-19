-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lis 2021, 11:58
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
(4, 'Michał', 'Pawlikowski', 'michal0725@gmail.com', '$2y$10$ijP74fZDjEU3YoYbYXScu.cMk/Cq4Q917/HkDWj223HRhQcjBFnoq', 123123123, 'edwe', 'dfwwfwe', '3'),
(5, 'siema', 'siema', 'siema@gmail.com', '$2y$10$sFI37gQfeHjtfwMuNY59OuW4RTUFRMGwLjwkBkWclqkQEEg9BgCv6', 123123123, 'wef', 'wef', '12');

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
  `ilosc` int(11) NOT NULL,
  `opis` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `tytul`, `autor`, `gatunek`, `wydawnictwo`, `rok_wydania`, `zdjecie`, `stan`, `ilosc`, `opis`) VALUES
(1, 'Podstawy programowania w języku C++', 'Józef Zieliński', 'Programowanie', 'Impuls', '2013', '1.png', 0, 5, 'W książce przedstawiono ważniejsze konstrukcje języka C++ stosowane w programowaniu imperatywnym. Konstrukcje języka są ilustrowane przykładami algorytmów o stopniowanej trudności, od algorytmów arytmetycznych do zadań z zagranicznych olimpiad. W przykładowych algorytmach stosowane jest szerokie spektrum operatorów języka C++, w tym rzadziej spotykany operator przecinkowy. Używanie różnych operatorów pozwala na bardzo zwięzłe tworzenie programów w języku C++. Pokazano również powstawanie błędów obliczeń, wynikających z obliczeń zmiennopozycyjnych.'),
(2, 'W pustyni i w puszczy', 'Henryk Sienkiewicz', 'Powieść', 'Greg', '2015', '2.png', 0, 3, ''),
(3, 'Harry Potter i Kamień Filozoficzny. Tom 1', 'J.K Rowling', 'Fantastycznt', 'Media Rodzina', '2016', '3.png', 0, 15, ''),
(4, 'Harry Potter i Komnata Tajemnic', 'J.K Rowling', 'Fantastyczny', 'Media Rodzina', '2016', '4.png', 0, 3, ''),
(5, 'Krzyżacy', 'Henryk Sienkiewicz', 'Powieść', 'Greg', '2010', '5.png', 0, 2, ''),
(6, 'Dzieci z Bullerbyn', 'Astrid Lindgren', 'Bajka', 'Wydawnictwo Nasza Księgarnia', '2021', '6.png', 0, 3, ''),
(7, 'Pan Tadeusz', 'Adam Mieckiewicz', 'Poezja epicka', 'Nowa Era', '1834', '7.png', 0, 2, ''),
(8, 'Lalka', 'Bolesław Prus', 'powieść', 'XYZ', '1889', '8.png', 0, 6, ''),
(11, 'O psie który jeździł koleją', 'Roman Pisarski', 'opowiadanie dla dzieci', 'Biuro Wydawnicze „RUCH”', '1967', '11.png', 0, 2, ''),
(12, 'Wiedźmin: Krew Elfów', 'Andrzej Sapkowski', 'Fanstastyka', 'SuperNowa', '2005', '12.png', 0, 5, ''),
(13, 'Wiedźmin: Czas Pogardy', 'Andrzej Sapkowski', 'Fantastyka', 'Libros', '2006', '13.png', 0, 5, ''),
(14, 'Wiedźmin: Wieża Jaskółki', 'Andrzej Sapkowski', 'Fantastyka', 'SuperNowa', '2006', '14.png', 0, 5, ''),
(15, 'Wiedźmin: Ostatnie Życzenie', 'Andrzej Sapkowski', 'Fantastyka', 'SuperNowa', '2007', '15.png', 0, 10, ''),
(16, 'Wiedźmin: Miecz Przeznaczenia', 'Andrzej Sapkowski', 'Fantasyka', 'SuperNowa', '2007', '16.png', 0, 8, ''),
(17, 'Wiedźmin: Chrzest Ognia', 'Andrzej Sapkowski', 'Fantastyka', 'SuperNowa', '2006', '17.png', 0, 5, ''),
(18, 'Lśnienie', 'Stephen King', 'Horror', 'Diam', '1977', '18.png', 0, 15, ''),
(19, 'Wiedźmin: Pani Jeziora', 'A. Sapkowski', 'Fantastyka', 'SuperNowa', '2006', '19.png', 0, 4, ''),
(20, 'Wiedźmin: Sezon Burz', 'A. Sapkowski', 'Fantastyka', 'SuperNowa', '2008', '20.png', 0, 10, ''),
(21, 'To', 'Stephen King', 'Horror', 'Diamond', '1986', '21.png', 0, 28, ''),
(22, 'Bastion', 'Stephen King', 'Horror', 'Diam', '1978', '22.png', 0, 18, ''),
(23, 'Zielona Mila', 'Stephen King', 'powieść', 'NBBA', '1996', '23.png', 0, 22, ''),
(24, 'Doktor Sen', 'Stephen King', 'Horror', 'Stephen King', '2013', '24.png', 0, 20, ''),
(25, 'The Outsider', 'Stephen King', 'Powieść grozy', 'Stephen king', '2018', '25.png', 0, 15, ''),
(26, 'Encyklopedia Popularna', 'Praca Zbiorowa', 'Edukacja', 'PWN', '2020', '26.png', 0, 20, ''),
(27, 'JĘZYK KOREAŃSKI - KURS PODSTAWOWY', 'Gunn-Young Choi, Halina Ogarek-Czoj, Romuald Huszcza', 'Edukacja', 'Dialog', '2020', '27.png', 0, 20, ''),
(28, 'Nauka angielskiego Angielski Kurs dla początkujących', 'Praca Zbiorowa', 'Edukacja', 'Edgard', '2012', '28.png', 2, 0, ''),
(29, 'Angielski Intensywny kurs języka angielskiego', 'Praca Zbiorowa', 'Edukacja', 'Olesiejuk', '2019', '29.png', 2, 0, ''),
(30, 'Harry Potter i przeklęte dziecko', 'J.K. Rowling, Jack Thorne i John Tiffany', 'Fantastyka', 'J.K Rowling', '2016', '30.png', 0, 10, ''),
(31, 'Harry Potter i Książę Półkrwi', 'J.K Rowling', 'Fantastyka', 'Media Rodzina', '2008', '31.png', 0, 1, ''),
(32, 'Harry Potter i Czara Ognia', 'J.K Rowling', 'Fantastyka', 'Media Rodzina', '2005', '32.png', 0, 20, ''),
(33, 'Harry Potter i Insygnia Śmierci cz.1', 'J.K Rowling', 'Fantastyka', 'J.K Rowling', '2008', '33.png', 0, 5, ''),
(34, 'Władca Pierścieni: Drużyna Pierścienia', 'Tolkien John Ronald Reuel', 'Fantastyka', 'Wydawnictwo Amber', '2009', '34.png', 0, 18, ''),
(35, 'Władca Pierścieni: Powrót Króla', 'Tolkien John Ronald Reuel', 'Fantastyka', 'Amber', '2010', '35.png', 0, 22, ''),
(36, 'Władca Pierścieni: Dwie Wieże', 'Tolkien John Ronald Reuel', 'Fantastyka', 'Amber', '2009', '36.png', 0, 20, ''),
(37, 'Hobbit czyli tam i z powrotem', 'J.R.R Tolkien', 'Fantastyka', 'Amber', '2014', '37.png', 0, 10, ''),
(38, 'Hobbit albo tam i z powrotem', 'J.R.R Tolkien', 'Fantastyka', 'Amber', '2014', '38.png', 0, 15, ''),
(39, 'Hobbit i filozofia. Prawdziwa historia tam i z powrotem', 'Gregory Bassham, Eric Bronson, William Irwin', 'Fantastyka', 'Editio', '2010', '39.png', 2, 0, ''),
(40, 'Dziady', 'Adam Mickiewicz', 'dramat', 'Siedmioróg', '2002', '40.png', 0, 30, ''),
(41, 'II wojna światowa. Historia wydarzeń', 'Artur Jabłoński', 'Historia', 'SBM', '2019', '41.png', 0, 6, ''),
(42, 'Opowieści z Narnii: Lew, czarownica i stara szafa', 'C.S. Lewis', 'Fantastyka', 'C.S.S', '2005', '42.png', 0, 10, ''),
(43, 'Opowieści z Narnii: Siostrzeniec Czarodzieja', 'C.S. Lewis', 'Fantastyka', 'Amber', '2007', '43.png', 0, 16, ''),
(44, 'Opowieści z Narnii: Podróż Wędrowca do Świtu', 'C.S Lewis', 'Fantastyka', 'Media Rodzina', '2008', '44.png', 0, 15, ''),
(45, 'Opowieści z Narnii: Książę Kaspian', 'C.S Lewis', 'Fantastyka', 'Media Rodzina', '2010', '45.png', 2, 0, ''),
(46, 'Opowieści z Narnii: Srebrne krzesło', 'C.S Lewis', 'Fantastyka', 'Media Rodzina', '2011', '46.png', 0, 20, ''),
(47, 'Opowieści z Narnii: Koń i Jego Chłopiec', 'C.S Lewis', 'Fantastyka', 'Media Rodzina', '2009', '47.png', 0, 15, ''),
(48, 'Opowieści z Narnii: Ostatnia Bitwa', 'C.S Lewis', 'Fantastyka', 'Media Rodzina', '2010', '48.png', 0, 7, ''),
(49, 'Koszmarny Karolek i tajny klub', 'Francesca Simon', 'Powieść', 'Amber', '2007', '49.png', 2, 0, ''),
(50, 'Koszmarny Karolek i wizyta królowej', 'Francesca Simon', 'Powieść', 'Amber', '2004', '50.png', 0, 6, ''),
(51, 'Pierwsze przygody Mikołajka', 'Rene Goscinny Jean Jacques Sempe', 'Klasyka Dla Dzieci', 'Nasza Księgarnia', '2015', '51.png', 2, 0, ''),
(52, 'Mały Książę', 'Antoine de Saint-Exupery', 'Bajka', 'SuperNowa', '2007', '52.png', 0, 10, ''),
(53, 'Zemsta', 'Aleksander Fredro', 'dramat', 'Wydawnictwo GREG', '2005', '53.png', 0, 10, ''),
(54, 'Cierpienia młodego Wertera', 'Johann Wolfgang von Goethe', 'dramat', 'GREG', '2000', '54.png', 0, 10, ''),
(55, 'Tom Clancy: Tęcza Sześć', 'Tom Clancy', 'Kryminał', 'Adamski I Bieliński', '2006', '55.png', 0, 10, ''),
(56, 'Tom Clancy Stan zagrożenia', 'Tom Clancy', 'Thriller', 'Adamski I Bieliński', '2001', '56.png', 0, 6, ''),
(57, 'Tom Clancy Przeciw Wszystkim Wrogom', 'Tom Clancy', 'Kryminał', 'Adamski i Bieliński', '2006', '57.png', 0, 10, ''),
(58, 'Tom Clancy Czerwony Królik', 'Tom Clancy', 'Kryminał', 'Adamski i Bieliński', '2007', '58.png', 0, 6, ''),
(59, 'Tom Clancy Suma Wszystkich Strachów', 'Tom Clancy', 'Kryminał', 'Adamski i Bieliński', '2007', '59.png', 0, 10, ''),
(60, 'Tom Clancy Bez skrupułów', 'Tom Clancy', 'Kryminał', 'Adamski i Bieliński', '2007', '60.png', 0, 10, ''),
(61, 'Biblia Tysiąclecia Pismo Święte Starego i Nowego Testamentu', 'Praca Zbiorowa', 'Tekst Religijny', 'Wydawnictwo Pallottinum', '2010', '61.png', 0, 10, ''),
(62, 'Nieznane Przygody Mikołajka', 'René Goscinny , Jean-Jacques Sempé', 'Bajka', 'Znak', '2008', '62.png', 2, 0, ''),
(63, 'Nowe Przygody Mikołajka', 'René Goscinny , Jean-Jacques Sempé', 'Bajka', 'Znak', '2009', '63.png', 0, 10, ''),
(64, 'Świat Według Clarksona', 'Jeremy Clarkson', 'Literatura faktu', 'Clarkson', '2012', '64.png', 0, 5, ''),
(65, 'Eona - Ostatni lord Smocze Oko', 'Alison Goodman', 'Fantastyka', 'Wydawnictwo Telbit', '2016', '65.png', 0, 5, ''),
(66, 'Eon - Powrót Lustrzanego Smoka', 'Alison Goodman', 'Fantastyka', 'Wydawnictwo Telbit', '2015', '66.png', 0, 10, ''),
(67, 'Początek', 'Dan Brown', 'Thriller', 'Talib', '2015', '67.png', 0, 10, ''),
(68, 'Ania z Zielonego Wzgórza: Ania z Avonlea', 'L.M Montgomery', 'Powieść', 'bellona', '2006', '68.png', 0, 15, ''),
(69, 'Assasin\'s Creed: Renesans', 'Olivier Bowden', 'Powieść', 'Nice', '2016', '69.png', 0, 5, ''),
(70, 'Assasin\'s Creed: Tajemna Krucjata', 'Olivier Bowden', 'Powieść', 'Bow', '2017', '70.png', 0, 6, ''),
(71, 'Miasteczko Salem', 'Stephen King', 'Horror', 'Bilos', '2005', '71.png', 0, 10, ''),
(72, 'Carrie', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2001', '72.png', 0, 5, ''),
(73, 'Cmentarz dla Zwierząt', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2002', '73.png', 0, 10, ''),
(74, 'Pan Mercedes', 'Stephen King', 'Thriller', 'Prószyński i S-ka', '2003', '74.png', 0, 10, ''),
(75, 'Cztery pory roku', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2000', '75.png', 0, 10, ''),
(76, 'Stukostrachy', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2002', '76.png', 2, 0, ''),
(77, 'Znalezione nie kradzione', 'Stephen King', 'Horror', 'Albatros', '2005', '77.png', 0, 5, ''),
(78, 'Czarny Dom', 'Stephen King', 'Horror', 'Proszyński i S-ka', '2001', '78.png', 0, 5, ''),
(79, 'Ręka mistrza', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2002', '79.png', 0, 5, ''),
(80, 'Mroczna połowa', 'Stephen King', 'Horror', 'Prószyński i S-ka', '2004', '80.png', 0, 5, ''),
(81, 'Igrzyska śmierci', 'Suzanne Collins', 'Powieść', 'Media Rodzina', '2010', '81.png', 0, 5, ''),
(82, 'Osobliwy dom pani Peregrine', 'Ransom Riggs', 'Powieść', 'Media Rodzina', '2016', '82.png', 0, 7, ''),
(83, 'Okrutny książę', 'Holly Black', 'Fantastyka', 'Media Rodzina', '2006', '83.png', 0, 10, ''),
(84, 'Felix, Net i Nika oraz Gang Niewidzialnych Ludzi', 'Rafał Kosik', 'Fantastyka', 'Media Rodzina', '2016', '84.png', 0, 6, ''),
(85, 'Skrzynia Władcy Piorunów', 'Marcin Kozioł', 'Powieść', 'Prószyński i Spółka', '2010', '85.png', 0, 6, ''),
(86, 'Szukając Alaski', 'John Green', 'Powieść', 'Bukowy Las', '2018', '86.png', 2, 0, ''),
(87, 'Trzy metry nad niebem', 'Federico Moccia', 'Romans', 'SuperNowa', '2019', '87.png', 2, 0, ''),
(88, 'Ten obcy', 'Irena Jurgielewiczowa', 'Powieść', 'Libros', '2018', '88.png', 0, 15, ''),
(89, 'Tego nie mogę ci powiedzieć', 'Justyna Sznajder', 'Romans', 'Libros', '2021', '89.png', 0, 5, ''),
(90, 'Wyspa Złoczyńców', 'Zbigniew Nienacki', 'Powieść', 'SuperNowa', '2001', '90.png', 2, 0, ''),
(91, 'Zadanie domowe', 'Liza Wiemer', 'powieść', 'Edmond', '2016', '91.png', 0, 5, ''),
(92, 'Proces', 'Franz Kafka', 'powieść', 'Świat książki', '2006', '92.png', 2, 0, ''),
(93, 'Niech pana Bóg błogosławi, panie Rosewater', 'Kurt Vonnegut', 'Satyra polityczna', 'Nimu', '2006', '93.png', 0, 5, ''),
(94, 'Quo vadis', 'Henryk Sienkiewicz', 'powieść historyczna', 'Klasyka Polska', '2007', '94.png', 0, 10, ''),
(95, 'Droga królów', 'Brandon Sanderson', 'Fantastyka', 'Wydawnictwo MAG', '2006', '95.png', 0, 10, ''),
(96, 'Starcie królów', 'George R. R. Martin', 'Fantastyka', 'Wydawnictwo MAG', '', '96.png', 0, 6, ''),
(97, 'Stary człowiek i morze', 'Ernest Hemingway', 'Powieść marynistyczna', 'Galeria', '2005', '97.png', 0, 10, ''),
(98, 'W drodze', 'Jack Kerouac Huysmans', 'Powieść', 'Klasyka', '2000', '98.png', 0, 4, ''),
(99, 'Opowieść podręcznej', 'Margaret Atwood', 'Powieść ', 'Wielka Litera', '2005', '99.png', 0, 8, ''),
(100, 'Podstawy sieci komputerowych', 'Bradford Russell', 'Edukacja', 'Wydawnictwa Komunikacji i Łączności', '2012', '100.png', 1, 0, '');

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
(2, 3, 1, '2021-11-02', '2021-11-10'),
(48, 2, 98, '2021-11-18', '2021-11-25');

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
(4, 3, 2, '2021-11-01', NULL),
(5, 2, 97, '2021-11-14', '2021-11-14'),
(6, 2, 95, '2021-11-14', '2021-11-14'),
(7, 2, 83, '2021-11-14', '2021-11-14'),
(8, 2, 79, '2021-11-14', '2021-11-14'),
(9, 2, 96, '2021-11-14', '2021-11-14'),
(10, 2, 97, '2021-11-14', '2021-11-14'),
(11, 2, 79, '2021-11-14', '2021-11-14'),
(12, 2, 83, '2021-11-14', '2021-11-14'),
(13, 2, 95, '2021-11-14', '2021-11-14'),
(14, 2, 96, '2021-11-14', '2021-11-14'),
(15, 2, 2, '2021-11-14', '2021-11-14'),
(16, 2, 11, '2021-11-14', '2021-11-14'),
(17, 2, 100, '2021-11-14', '2021-11-14'),
(18, 2, 99, '2021-11-14', '2021-11-14'),
(19, 2, 97, '2021-11-14', NULL),
(20, 2, 98, '2021-11-14', NULL),
(21, 2, 5, '2021-11-15', '2021-11-15'),
(22, 2, 3, '2021-11-18', NULL),
(23, 2, 3, '2021-11-18', NULL),
(24, 2, 3, '2021-11-18', NULL),
(25, 2, 3, '2021-11-18', NULL),
(26, 2, 3, '2021-11-18', NULL),
(27, 2, 3, '2021-11-18', NULL),
(28, 2, 3, '2021-11-18', NULL),
(29, 2, 3, '2021-11-18', NULL),
(30, 2, 27, '2021-11-18', NULL);

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
  MODIFY `Id_czytelnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT dla tabeli `pracownik`
--
ALTER TABLE `pracownik`
  MODIFY `Id_pracownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id_rez` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wyp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
