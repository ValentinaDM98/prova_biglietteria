-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2023 alle 17:01
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biglietteria_on_line`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biglietti`
--

CREATE TABLE `biglietti` (
  `cod_operazione` varchar(4) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_replica` varchar(4) NOT NULL,
  `data_ora` datetime NOT NULL,
  `tipo_pagamento` varchar(20) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `cod_cliente` int(11) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`cod_cliente`, `cognome`, `nome`, `telefono`, `email`) VALUES
(1, 'Alfieri', 'Valeria', '011/4328346', 'alf@libero.it'),
(2, 'Bellotti', 'Cinzia', '011/79876658', 'bel@tin.it'),
(3, 'Morgeri', 'Giuseppe', '011/76547648', 'dig@email.it'),
(4, 'Bastioni', 'Gianluca', '011/76586548', 'fai@virgilio.it'),
(5, 'Francini', 'Massimiliano', '011/543326565', 'fra@libero.it'),
(6, 'Mattone', 'Fabrizio', '011/98765762', 'gat@tin.it'),
(7, 'Maistoni', 'Ivan', '011/5367548', 'mik@tin.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `repliche`
--

CREATE TABLE `repliche` (
  `cod_replica` varchar(4) NOT NULL,
  `cod_spettacolo` varchar(4) NOT NULL,
  `data_replica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `repliche`
--

INSERT INTO `repliche` (`cod_replica`, `cod_spettacolo`, `data_replica`) VALUES
('R001', 'S001', '2018-10-05'),
('R002', 'S001', '2018-10-06'),
('R003', 'S001', '2018-10-07'),
('R004', 'S001', '2018-10-08'),
('R005', 'S001', '2018-10-09'),
('R006', 'S002', '2018-11-12'),
('R007', 'S002', '2018-11-13'),
('R008', 'S002', '2018-11-14'),
('R009', 'S002', '2018-11-15'),
('R010', 'S002', '2018-11-16'),
('R011', 'S003', '2019-01-05'),
('R012', 'S003', '2019-01-06'),
('R013', 'S003', '2019-01-07'),
('R014', 'S003', '2019-01-08'),
('R015', 'S003', '2019-01-09'),
('R016', 'S004', '2019-01-12'),
('R017', 'S004', '2019-01-13'),
('R018', 'S004', '2019-01-14'),
('R019', 'S004', '2019-01-15'),
('R020', 'S004', '2019-01-16'),
('R021', 'S005', '2018-11-05'),
('R022', 'S005', '2018-11-06'),
('R023', 'S005', '2018-11-07'),
('R024', 'S005', '2018-11-18'),
('R025', 'S005', '2018-11-19'),
('R026', 'S006', '2018-12-12'),
('R027', 'S006', '2018-12-13'),
('R028', 'S006', '2018-12-14'),
('R029', 'S006', '2018-12-15'),
('R030', 'S006', '2018-12-16');

-- --------------------------------------------------------

--
-- Struttura della tabella `spettacoli`
--

CREATE TABLE `spettacoli` (
  `cod_spettacolo` varchar(4) NOT NULL,
  `titolo` varchar(40) NOT NULL,
  `autore` varchar(25) NOT NULL,
  `regista` varchar(25) NOT NULL,
  `prezzo` decimal(4,2) NOT NULL,
  `cod_teatro` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `spettacoli`
--

INSERT INTO `spettacoli` (`cod_spettacolo`, `titolo`, `autore`, `regista`, `prezzo`, `cod_teatro`) VALUES
('S001', 'Appunti per un film sulla lotta di class', 'Ascanio Celestini', 'Ascanio Celestini', '20.00', 'T001'),
('S002', 'Il birraio di Preston', 'Andrea Camilleri', 'Giuseppe Dipasquale', '20.00', 'T001'),
('S003', 'La Traviata', 'Giuseppe Verdi', 'Laurent Pelly', '40.00', 'T002'),
('S004', 'La Bohème', 'Giacomo Puccini', 'Giuseppe Patroni Griffi', '40.00', 'T002'),
('S005', 'Poveri, ma belli', 'Gianni Togni', 'Massimo Ranieri', '25.00', 'T003'),
('S006', 'Il sogno del piccolo imperatore', 'Gian Mesturino', 'Alberto Barbi', '25.00', 'T003');

-- --------------------------------------------------------

--
-- Struttura della tabella `teatri`
--

CREATE TABLE `teatri` (
  `cod_teatro` varchar(4) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `citta` varchar(25) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `posti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `teatri`
--

INSERT INTO `teatri` (`cod_teatro`, `nome`, `indirizzo`, `citta`, `provincia`, `telefono`, `posti`) VALUES
('T001', 'Teatro Carignano', 'Piazza Carignano 6', 'Torino', 'TO', '011/3456759', 875),
('T002', 'Teatro Regio', 'Piazza Castello 2', 'Torino', 'TO', '011/9870654', 1592),
('T003', 'Teatro Alfieri', 'Piazza Solferino 4', 'Torino', 'TO', '011/6574895', 1500);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biglietti`
--
ALTER TABLE `biglietti`
  ADD PRIMARY KEY (`cod_operazione`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_replica` (`cod_replica`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indici per le tabelle `repliche`
--
ALTER TABLE `repliche`
  ADD PRIMARY KEY (`cod_replica`),
  ADD KEY `cod_spettacolo` (`cod_spettacolo`);

--
-- Indici per le tabelle `spettacoli`
--
ALTER TABLE `spettacoli`
  ADD PRIMARY KEY (`cod_spettacolo`),
  ADD KEY `FK` (`cod_teatro`);

--
-- Indici per le tabelle `teatri`
--
ALTER TABLE `teatri`
  ADD PRIMARY KEY (`cod_teatro`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `biglietti`
--
ALTER TABLE `biglietti`
  ADD CONSTRAINT `biglietti_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `clienti` (`cod_cliente`),
  ADD CONSTRAINT `biglietti_ibfk_2` FOREIGN KEY (`cod_replica`) REFERENCES `repliche` (`cod_replica`);

--
-- Limiti per la tabella `repliche`
--
ALTER TABLE `repliche`
  ADD CONSTRAINT `repliche_ibfk_1` FOREIGN KEY (`cod_spettacolo`) REFERENCES `spettacoli` (`cod_spettacolo`);

--
-- Limiti per la tabella `spettacoli`
--
ALTER TABLE `spettacoli`
  ADD CONSTRAINT `FK` FOREIGN KEY (`cod_teatro`) REFERENCES `teatri` (`cod_teatro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
