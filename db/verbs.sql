-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Mar 2020, 21:33
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `verbs`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  `groupAdditional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `groupName`, `groupAdditional`) VALUES
(33, 'Umiem na 100%', NULL),
(36, 'gruuup2', NULL),
(44, 'sad', NULL),
(45, 'xcc', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `verb`
--

CREATE TABLE `verb` (
  `id` int(11) NOT NULL,
  `pl` varchar(100) NOT NULL,
  `plAdditional` varchar(255) DEFAULT NULL,
  `inf` varchar(100) NOT NULL,
  `pastSimp1` varchar(100) NOT NULL,
  `pastSimp2` varchar(100) DEFAULT NULL,
  `pastPrac1` varchar(100) NOT NULL,
  `pastPrac2` varchar(100) DEFAULT NULL,
  `pronunciation` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `verb`
--

INSERT INTO `verb` (`id`, `pl`, `plAdditional`, `inf`, `pastSimp1`, `pastSimp2`, `pastPrac1`, `pastPrac2`, `pronunciation`, `status`) VALUES
(13, 'być', NULL, 'be', 'was', 'were', 'been', NULL, NULL, NULL),
(14, 'bić', NULL, 'beat', 'beat', NULL, 'beaten', NULL, NULL, NULL),
(15, 'stawać się', NULL, 'become', 'became', NULL, 'become', NULL, NULL, NULL),
(16, 'zaczynać', NULL, 'begin', 'began', NULL, 'begun', NULL, NULL, NULL),
(17, 'łamać', NULL, 'break', 'broke', NULL, 'broken', NULL, NULL, NULL),
(18, 'przynosić', NULL, 'bring', 'brought', NULL, 'brought', NULL, NULL, NULL),
(19, 'budować', NULL, 'build', 'built', NULL, 'built', NULL, NULL, NULL),
(20, 'spalić', NULL, 'burn', 'burnt', NULL, 'burnt', NULL, NULL, NULL),
(21, 'kupować', NULL, 'buy', 'bought', NULL, 'bought', NULL, NULL, NULL),
(22, 'wybuchać, pękać', NULL, 'burst', 'burst', NULL, 'burst', NULL, NULL, NULL),
(23, 'umieć, móc, potrafić', NULL, 'can', 'could', NULL, 'been able to', NULL, NULL, NULL),
(24, 'chwytać, łapać', NULL, 'catch', 'caught', NULL, 'caught', NULL, NULL, NULL),
(25, 'wybierać', NULL, 'choose', 'chose', NULL, 'chosen', NULL, NULL, NULL),
(26, 'przybywać', NULL, 'come', 'came', NULL, 'come', NULL, NULL, NULL),
(27, 'kosztować', NULL, 'cost', 'cost', NULL, 'cost', NULL, NULL, NULL),
(28, 'ciąć', NULL, 'cut', 'cut', NULL, 'cut', NULL, NULL, NULL),
(29, 'robić', NULL, 'do', 'did', NULL, 'done', NULL, NULL, NULL),
(30, 'śnić', NULL, 'dream', 'dreamt', NULL, 'dreamt', NULL, NULL, NULL),
(31, 'pić', NULL, 'drink', 'drank', NULL, 'drunk', NULL, NULL, NULL),
(32, 'wykopywać / kopać', NULL, 'dig', 'dug', NULL, 'dug', NULL, NULL, NULL),
(33, 'narysować / naszkicować', NULL, 'draw', 'drew', NULL, 'drawn', NULL, NULL, NULL),
(34, 'kierować', NULL, 'drive', 'drove', NULL, 'driven', NULL, NULL, NULL),
(35, 'jeść', NULL, 'eat', 'ate', NULL, 'eaten', NULL, NULL, NULL),
(36, 'upadać', NULL, 'fall', 'fell', NULL, 'fallen', NULL, NULL, NULL),
(37, 'żywić / karmić', NULL, 'feed', 'fed', NULL, 'fed', NULL, NULL, NULL),
(38, 'czuć', NULL, 'feel', 'felt', NULL, 'felt', NULL, NULL, NULL),
(39, 'walczyć', NULL, 'fight', 'fought', NULL, 'fought', NULL, NULL, NULL),
(40, 'znajdować', NULL, 'find', 'found', NULL, 'found', NULL, NULL, NULL),
(41, 'latać', NULL, 'fly', 'flew', NULL, 'flown', NULL, NULL, NULL),
(42, 'zapominać', NULL, 'forget', 'forgot', NULL, 'forgotten', NULL, NULL, NULL),
(43, 'wybaczać', NULL, 'forgive', 'forgave', NULL, 'forgiven', NULL, NULL, NULL),
(44, 'dostawać', NULL, 'get', 'got', NULL, 'got', NULL, NULL, NULL),
(45, 'dawać', NULL, 'give', 'gave', NULL, 'given', NULL, NULL, NULL),
(46, 'iść / jechać', NULL, 'go', 'went', NULL, 'gone/been', NULL, NULL, NULL),
(47, 'rosnąć', NULL, 'grow', 'grew', NULL, 'grown', NULL, NULL, NULL),
(48, 'wieszać / się (kogoś / coś)', NULL, 'hang', 'hanged/hung', NULL, 'hanged/hung', NULL, NULL, NULL),
(49, 'mieć', NULL, 'have', 'had', NULL, 'had', NULL, NULL, NULL),
(50, 'słyszeć', NULL, 'hear', 'heard', NULL, 'heard', NULL, NULL, NULL),
(51, 'ukrywać / się', NULL, 'hide', 'hid', NULL, 'hid', NULL, NULL, NULL),
(52, 'uderzać', NULL, 'hit', 'hit', NULL, 'hit', NULL, NULL, NULL),
(53, 'trzymać', NULL, 'hold', 'held', NULL, 'held', NULL, NULL, NULL),
(54, 'ranić', NULL, 'hurt', 'hurt', NULL, 'hurt', NULL, NULL, NULL),
(55, 'trzymać', NULL, 'keep', 'kept', NULL, 'kept', NULL, NULL, NULL),
(56, 'znać / wiedzieć', NULL, 'know', 'knew', NULL, 'known', NULL, NULL, NULL),
(57, 'prowadzić', NULL, 'lead', 'led', NULL, 'led', NULL, NULL, NULL),
(58, 'uczyc / się', NULL, 'learned', 'learned/learnt', NULL, 'learned / learnt', NULL, NULL, NULL),
(59, 'opuszczać/wyjeżdżać', NULL, 'leave', 'left', NULL, 'left', NULL, NULL, NULL),
(60, 'pożyczać / komuś', NULL, 'lend', 'lent', NULL, 'lent', NULL, NULL, NULL),
(61, 'pozwalać', NULL, 'let', 'let', NULL, 'let', NULL, NULL, NULL),
(62, 'leżeć', NULL, 'lie', 'lay', NULL, 'lain', NULL, NULL, NULL),
(63, 'zapalać / podpalać', NULL, 'light', 'lit', NULL, 'lighted', NULL, NULL, NULL),
(64, 'gubic/tracić', NULL, 'lose', 'lost', NULL, 'lost', NULL, NULL, NULL),
(65, 'robić', NULL, 'make', 'made', NULL, 'made', NULL, NULL, NULL),
(66, 'znaczyć', NULL, 'mean', 'mean', NULL, 'meant', NULL, NULL, NULL),
(67, 'spotykać', NULL, 'meet', 'met', NULL, 'met', NULL, NULL, NULL),
(68, 'musieć', NULL, 'must/have to', 'had to', NULL, 'had to', NULL, NULL, NULL),
(69, 'płacić', NULL, 'pay', 'paid', NULL, 'paid', NULL, NULL, NULL),
(70, 'kłaść', NULL, 'put', 'put', NULL, 'put', NULL, NULL, NULL),
(71, 'czytać', NULL, 'read', 'read', NULL, 'read', NULL, NULL, NULL),
(72, 'jeździć (na czymś)', NULL, 'ride', 'rode', NULL, 'ridden', NULL, NULL, NULL),
(73, 'dzwonić', NULL, 'ring', 'rang', NULL, 'rung', NULL, NULL, NULL),
(74, 'biec', NULL, 'run', 'ran', NULL, 'run', NULL, NULL, NULL),
(75, 'mówić', NULL, 'say', 'said', NULL, 'said', NULL, NULL, NULL),
(76, 'widzieć', NULL, 'see', 'saw', NULL, 'seen', NULL, NULL, NULL),
(77, 'sprzedawać', NULL, 'sell', 'sold', NULL, 'sold', NULL, NULL, NULL),
(78, 'wysyłać', NULL, 'send', 'sent', NULL, 'sent', NULL, NULL, NULL),
(79, 'umieszczać / postawić', NULL, 'set', 'set', NULL, 'set', NULL, NULL, NULL),
(80, 'zaświecić (czymś)', NULL, 'shine', 'shone', NULL, 'shone', NULL, NULL, NULL),
(81, 'pokazywać', NULL, 'show', 'showed', NULL, 'shown', NULL, NULL, NULL),
(82, 'zamykać / zatrzaskiwać', NULL, 'shut', 'shut', NULL, 'shut', NULL, NULL, NULL),
(83, 'śpiewać', NULL, 'sing', 'sang', NULL, 'sung', NULL, NULL, NULL),
(84, 'tonąć', NULL, 'sink', 'sank', NULL, 'sunk', NULL, NULL, NULL),
(85, 'siedzieć', NULL, 'sit', 'sat', NULL, 'sat', NULL, NULL, NULL),
(86, 'spać', NULL, 'sleep', 'slept', NULL, 'slept', NULL, NULL, NULL),
(87, 'wąchać / pachnieć', NULL, 'smell', 'smelled', NULL, 'smelt', NULL, NULL, NULL),
(88, 'mówić', NULL, 'speak', 'spoke', NULL, 'spoken', NULL, NULL, NULL),
(89, 'spędzać', NULL, 'spend', 'spent', NULL, 'spent', NULL, NULL, NULL),
(90, 'rozlewać', NULL, 'spill', 'spilt', NULL, 'spilled', NULL, NULL, NULL),
(91, 'stać', NULL, 'stand', 'stood', NULL, 'stood', NULL, NULL, NULL),
(92, 'kraść', NULL, 'steal', 'stole', NULL, 'stolen', NULL, NULL, NULL),
(93, 'pływać', NULL, 'swim', 'swam', NULL, 'swum', NULL, NULL, NULL),
(94, 'brać', NULL, 'take', 'took', NULL, 'taken', NULL, NULL, NULL),
(95, 'uczyć', NULL, 'teach', 'taught', NULL, 'taught', NULL, NULL, NULL),
(96, 'drzeć / rozrywać', NULL, 'tear', 'torn', NULL, 'torn', NULL, NULL, NULL),
(97, 'mówić', NULL, 'tell', 'told', NULL, 'told', NULL, NULL, NULL),
(98, 'mysleć', NULL, 'think', 'thought', NULL, 'thought', NULL, NULL, NULL),
(99, 'wyrzucać', NULL, 'throw', 'threw', NULL, 'thrown', NULL, NULL, NULL),
(100, 'rozumieć', NULL, 'understand', 'understood', NULL, 'understood', NULL, NULL, NULL),
(101, 'budzić się', NULL, 'wake', 'woke', NULL, 'woken', NULL, NULL, NULL),
(102, 'być ubranym w coś', NULL, 'wear', 'wore', NULL, 'wore', NULL, NULL, NULL),
(103, 'wygrywać', NULL, 'win', 'won', NULL, 'won', NULL, NULL, NULL),
(104, 'pisać', NULL, 'write', 'wrote', NULL, 'written', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `verb_group_relation`
--

CREATE TABLE `verb_group_relation` (
  `id` int(11) NOT NULL,
  `verb_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `verb_group_relation`
--

INSERT INTO `verb_group_relation` (`id`, `verb_id`, `group_id`) VALUES
(1, 0, 0),
(2, 0, 0),
(3, 3, 32),
(4, 9, 0),
(6, 9, 32),
(8, 9, 31),
(10, 9, 22),
(11, 9, 0),
(17, 5, 33),
(18, 5, 31),
(19, 5, 32),
(20, 4, 32),
(21, 4, 33),
(22, 4, 29),
(23, 6, 22),
(28, 9, 29),
(29, 7, 33),
(31, 7, 29),
(33, 2, 31),
(34, 2, 29),
(35, 2, 33),
(37, 10, 29),
(38, 2, 36),
(39, 10, 36),
(41, 6, 33),
(43, 7, 45);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `verb`
--
ALTER TABLE `verb`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `verb_group_relation`
--
ALTER TABLE `verb_group_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `verb`
--
ALTER TABLE `verb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT dla tabeli `verb_group_relation`
--
ALTER TABLE `verb_group_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
