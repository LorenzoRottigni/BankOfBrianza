-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 20, 2021 alle 10:58
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankofbrianza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bankaccount`
--

CREATE TABLE `bankaccount` (
  `idB` varchar(34) NOT NULL,
  `balanceB` decimal(9,2) NOT NULL,
  `pwB` varchar(100) NOT NULL,
  `signDateB` date NOT NULL,
  `cvcB` varchar(3) NOT NULL,
  `pinB` varchar(5) NOT NULL,
  `codC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bankaccount`
--

INSERT INTO `bankaccount` (`idB`, `balanceB`, `pwB`, `signDateB`, `cvcB`, `pinB`, `codC`) VALUES
('IT06054280000001358', '20661.85', '76d80224611fc919a5d54f0ff9fba446', '2021-05-19', '761', '25894', 1358),
('IT07054280000001340', '69877.79', '1c42f9c1ca2f65441465b43cd9339d6c', '2021-05-19', '944', '77300', 1340),
('IT11054280000001365', '103093.65', '3691308f2a4c2f6983f2880d32e29c84', '2021-05-19', '623', '72756', 1365),
('IT22054280000001361', '69578.84', 'fd2cc6c54239c40495a0d3a93b6380eb', '2021-05-19', '682', '72486', 1361),
('IT23054280000001343', '5181.76', '76d80224611fc919a5d54f0ff9fba446', '2021-05-19', '410', '17035', 1343),
('IT25054280000001016', '50490.11', '76d80224611fc919a5d54f0ff9fba446', '2021-05-18', '479', '12879', 1016),
('IT25054280000001337', '9999999.99', 'c5bd49af1f55c8fc93489e4fd4a4b370', '2021-05-17', '232', '12634', 1337),
('IT34054280000001339', '58645.46', '76d80224611fc919a5d54f0ff9fba446', '2021-05-19', '912', '84498', 1339),
('IT38054280000001364', '19838.36', 'acad82ade3436b3b7e170625e2fe1e70', '2021-05-19', '639', '39662', 1364),
('IT49054280000001360', '45360.30', '56fb167809cddf32a68168c0511c654d', '2021-05-19', '270', '68872', 1360),
('IT50054280000001342', '73750.93', '81dc9bdb52d04dc20036dbd8313ed055', '2021-05-19', '530', '38349', 1342),
('IT52054280000001015', '54526.49', '739fda440202e2578be2909d91eb0734', '2021-05-18', '538', '83973', 1015),
('IT54054280000001367', '52114.58', 'ad57484016654da87125db86f4227ea3', '2021-05-20', '165', '10280', 1367),
('IT61054280000001338', '57144.92', '81a367b1c4a3d7b216ec4d0ad4dfd5a5', '2021-05-18', '274', '51296', 1338),
('IT65054280000001363', '68213.07', '040b7cf4a55014e185813e0644502ea9', '2021-05-19', '287', '85619', 1363),
('IT76054280000001359', '34079.06', '962012d09b8170d912f0669f6d7d9d07', '2021-05-19', '549', '86197', 1359),
('IT76054280000BNKBRZ', '9999999.99', '', '2021-05-17', '000', '00000', 1337),
('IT79054280000065616', '0.00', '006d2143154327a64d86a264aea225f3', '2021-05-20', '705', '25032', 1367),
('IT92054280000001362', '39175.78', '3691308f2a4c2f6983f2880d32e29c84', '2021-05-19', '377', '24861', 1362),
('IT95054280000001017', '52419.09', '739fda440202e2578be2909d91eb0734', '2021-05-18', '812', '64891', 1017);

-- --------------------------------------------------------

--
-- Struttura della tabella `client`
--

CREATE TABLE `client` (
  `idC` int(11) NOT NULL,
  `nameC` varchar(30) NOT NULL,
  `surnameC` varchar(30) NOT NULL,
  `cfC` varchar(16) NOT NULL,
  `areaCodeC` varchar(3) NOT NULL,
  `p_numberC` varchar(10) NOT NULL,
  `birthC` date NOT NULL,
  `addressC` varchar(50) NOT NULL,
  `capCodeC` varchar(5) NOT NULL,
  `citizenshipC` enum('europe','america','other') NOT NULL,
  `professionC` varchar(30) NOT NULL,
  `mailC` varchar(60) NOT NULL,
  `salaryC` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`idC`, `nameC`, `surnameC`, `cfC`, `areaCodeC`, `p_numberC`, `birthC`, `addressC`, `capCodeC`, `citizenshipC`, `professionC`, `mailC`, `salaryC`) VALUES
(1015, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2000-12-24', 'Via Turati 12', '20836', 'europe', 'Impiegato', 'gianlucca.rossi@gmail.com', '40000.00'),
(1016, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2000-12-24', 'via turati 12', '20873', 'america', ' studente', 'LORENZO@ROTTIGNI.NET', '500.00'),
(1017, 'Lorenzo', 'Rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2000-12-24', 'Via Turati 12', '20875', 'europe', 'Web designer', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1337, 'Lorenzo', 'Rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2000-12-24', 'Via Turati 12', '20823', 'america', 'web developer', 'lorenzo@rottigni.net', '5000.00'),
(1338, 'gianluca', 'rossi', 'SRRLRC08E12C351S', '+39', '3318348339', '1998-06-21', 'via de amicis 15', '20816', 'europe', 'Troubleshooter', 'gianlucca.rossi@gmail.com', '5000.00'),
(1339, 'lorenzo', 'crescini', 'SRRLRC08E12C351S', '+39', '3336976732', '2000-12-24', 'Via Turati 12', '20831', 'europe', 'Impiegato', 'Christian.bertoletti@libero.it', '40000.00'),
(1340, 'Andrea', ' Brigano', 'RTTMRC70L28F205Y', '+39', '345666123', '2002-06-12', 'Piazza primo levi 1', '20864', 'europe', 'STUDENTE', 'andrea.brigano@gmail.com', '0.00'),
(1342, 'Francesca', 'Ducati', 'GNlROS8J54F205Y', '+39', '3488591791', '1890-03-12', 'via turati 12', '20867', 'europe', 'Web designer', 'gianlucca.rossi@gmail.com', '500.00'),
(1343, 'SDD', 'rottigni', 'RTTMRC70L28F205Y', '+39', '3318348339', '1960-01-01', 'VIA TURATI 12', '20857', 'europe', 'Web designer', 'Christian.bertoletti@libero.it', '40000.00'),
(1344, 'lorenzo', 'Borda', 'MNNCTN08S57A944B', '+39', '3808694700', '0050-05-12', 'via de amicis 15', '20864', 'other', ' studente', 'gianlucca.rossi@gmail.com', '500000.00'),
(1345, 'lorenzo', 'Borda', 'MNNCTN08S57A944B', '+39', '3808694700', '0050-05-12', 'via de amicis 15', '20864', 'other', ' studente', 'gianlucca.rossi@gmail.com', '500000.00'),
(1346, 'lorenzo', 'Borda', 'MNNCTN08S57A944B', '+39', '3808694700', '0050-05-12', 'via de amicis 15', '20864', 'other', ' studente', 'gianlucca.rossi@gmail.com', '500000.00'),
(1347, 'Giovanni', 'Antonio', 'RTTLNZ00T24F704Y', '+39', '3314354334', '2005-01-01', 'Via del crocefisso 10', '20813', 'america', 'Impiegato', 'gianlucca.rossi@gmail.com', '200.00'),
(1348, 'Giovanni', 'Antonio', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20886', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1349, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1350, 'gianluca', 'rossi', 'CCOQNT03E01F205F', '+39', '3488591791', '2021-12-31', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1351, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20886', 'europe', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1352, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20886', 'europe', 'e', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1353, 'lorenzo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20886', 'europe', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1354, 'rrr', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1355, ' marco', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1356, 'jelo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1357, 'rrr', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '48038409', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1358, 'OraVa', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1359, 'carlo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1360, 'lollo', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1361, 'nowYes', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1362, 'ggwp', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1363, 'Francesca', 'Zara', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-12-31', 'VIA TURATI 12', '20886', 'europe', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1364, 'Allessia', 'Bosisio', 'BSSLSS99L56E507D', '+39', '3408123098', '1999-07-16', 'Piaazzale Tolstoj, 3', '20871', 'europe', 'RECEPTIONIST', 'alebosisio@icloud.com', '800.00'),
(1365, 'gianluca', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-01-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00'),
(1366, 'simone', 'colombo', 'CLMSMN00S22F704E', '+39', '3924237165', '2000-11-22', 'vIA MAZZINI 87', '20864', 'europe', 'TECNICO', 'COLO221100@GMAIL.COM', '20000.00'),
(1367, 'User', 'rottigni', 'RTTLNZ00T24F704Y', '+39', '3806947004', '2021-02-01', 'VIA TURATI 12', '20864', 'america', 'STUDENTE', 'LORENZO@ROTTIGNI.NET', '500000.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `movement`
--

CREATE TABLE `movement` (
  `idM` int(11) NOT NULL,
  `typeM` enum('transfer','payment','withdrawal','tax payment') NOT NULL,
  `dateM` date NOT NULL,
  `causalM` varchar(60) NOT NULL,
  `targetIBAN` varchar(34) DEFAULT NULL,
  `amountM` decimal(9,2) NOT NULL,
  `codB` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `movement`
--

INSERT INTO `movement` (`idM`, `typeM`, `dateM`, `causalM`, `targetIBAN`, `amountM`, `codB`) VALUES
(121, 'payment', '2021-05-11', 'nc', 'IT25054280000001016', '500.00', 'IT52054280000001015'),
(123, 'transfer', '2021-05-18', 'Donation', 'IT95054280000001017', '200.00', 'IT95054280000001017'),
(124, 'transfer', '2021-05-18', 'Donation', 'IT95054280000001017', '200.00', 'IT95054280000001017'),
(125, 'transfer', '2021-05-18', 'Donation', 'IT95054280000001017', '200.00', 'IT95054280000001017'),
(126, 'transfer', '2021-05-18', 'Donation', 'IT95054280000001017', '200.00', 'IT95054280000001017'),
(127, 'transfer', '2021-05-18', 'Donation', 'IT95054280000001017', '200.00', 'IT95054280000001017'),
(130, 'transfer', '2021-05-19', 'bank gift', 'IT50054280000001342', '73750.93', 'IT76054280000BNKBRZ'),
(131, 'transfer', '2021-05-19', 'bank gift', 'IT23054280000001343', '3981.76', 'IT76054280000BNKBRZ'),
(133, 'transfer', '2021-05-19', 'causale', 'IT23054280000001343', '100.00', 'IT23054280000001343'),
(134, 'transfer', '2021-05-19', 'causale', 'IT23054280000001343', '100.00', 'IT23054280000001343'),
(135, 'transfer', '2021-05-19', 'causale', 'IT23054280000001343', '500.00', 'IT23054280000001343'),
(136, 'transfer', '2021-05-19', 'causale', 'IT23054280000001343', '500.00', 'IT23054280000001343'),
(137, 'transfer', '2021-05-19', 'bank gift', 'IT06054280000001358', '20661.85', 'IT76054280000BNKBRZ'),
(138, 'transfer', '2021-05-19', 'bank gift', 'IT76054280000001359', '34079.06', 'IT76054280000BNKBRZ'),
(139, 'transfer', '2021-05-19', 'bank gift', 'IT49054280000001360', '45360.30', 'IT76054280000BNKBRZ'),
(140, 'transfer', '2021-05-19', 'bank gift', 'IT22054280000001361', '69578.84', 'IT76054280000BNKBRZ'),
(141, 'transfer', '2021-05-19', 'bank gift', 'IT92054280000001362', '39175.78', 'IT76054280000BNKBRZ'),
(142, 'transfer', '2021-05-19', 'bank gift', 'IT65054280000001363', '68213.07', 'IT76054280000BNKBRZ'),
(143, 'transfer', '2021-05-19', 'bank gift', 'IT38054280000001364', '19838.36', 'IT76054280000BNKBRZ'),
(144, 'transfer', '2021-05-19', 'bank gift', 'IT11054280000001365', '93941.65', 'IT76054280000BNKBRZ'),
(146, 'transfer', '2021-05-19', 'causale', 'IT11054280000001365', '4566.00', 'IT11054280000001365'),
(147, 'transfer', '2021-05-19', 'causale', 'IT11054280000001365', '4566.00', 'IT11054280000001365'),
(148, 'transfer', '2021-05-19', 'causaleporco dio', 'IT11054280000001365', '10.00', 'IT11054280000001365'),
(149, 'transfer', '2021-05-19', 'causaleporco dio', 'IT11054280000001365', '10.00', 'IT11054280000001365'),
(150, 'transfer', '2021-05-20', 'bank gift', 'IT54054280000001367', '52114.58', 'IT76054280000BNKBRZ');

-- --------------------------------------------------------

--
-- Struttura della tabella `town`
--

CREATE TABLE `town` (
  `capT` varchar(5) NOT NULL,
  `nameT` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `town`
--

INSERT INTO `town` (`capT`, `nameT`) VALUES
('20802', 'Barlassina'),
('20811', 'Cesano Maderno'),
('20812', 'Limbiate'),
('20813', 'Bovisio-Masciago'),
('20814', 'Varedo'),
('20815', 'Cogliate'),
('20816', 'Ceriano Laghetto'),
('20821', 'Meda'),
('20822', 'Seveso'),
('20823', 'Lentante sul Seveso'),
('20824', 'Lazzate'),
('20826', 'Misinto'),
('20831', '20831'),
('20832', 'Desio'),
('20833', 'Giussano'),
('20834', 'Nova Milanese'),
('20835', 'Muggiò'),
('20836', 'Briosco'),
('20837', 'Veduggio con Colzano'),
('20838', 'Renate'),
('20841', 'Carate Brianza'),
('20842', 'Besana in Brianza'),
('20843', 'Verano Brianza'),
('20844', 'Triuggio'),
('20845', 'Sovico'),
('20846', 'Macherio'),
('20847', 'Albiate'),
('20851', 'Lissone'),
('20852', 'Villasanta'),
('20853', 'Biassono'),
('20854', 'Vedano al Lambro'),
('20855', 'Lesmo'),
('20857', 'Camparada'),
('20861', 'Brugherio'),
('20862', 'Arcore'),
('20863', 'Concorezzo'),
('20864', 'Agrate Brianza'),
('20865', 'Usmate Velate'),
('20867', 'Caponago'),
('20871', 'Vimercate'),
('20872', 'Cornate d\'Adda'),
('20873', 'Cavenago di Brianza'),
('20874', 'Busnago'),
('20875', 'Burago di Molgora'),
('20876', 'Ornago'),
('20877', 'Roncello'),
('20881', 'Bernareggio'),
('20882', 'Bellusco'),
('20883', 'Mezzago'),
('20884', 'Sulbiate'),
('20885', 'Ronco Briantino'),
('20886', 'Aicurzio'),
('20900', 'Monza');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`idB`),
  ADD KEY `codC` (`codC`);

--
-- Indici per le tabelle `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idC`),
  ADD KEY `capCodeC` (`capCodeC`);

--
-- Indici per le tabelle `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`idM`),
  ADD KEY `targetIBAN` (`targetIBAN`),
  ADD KEY `codB` (`codB`);

--
-- Indici per le tabelle `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`capT`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `client`
--
ALTER TABLE `client`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1368;

--
-- AUTO_INCREMENT per la tabella `movement`
--
ALTER TABLE `movement`
  MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD CONSTRAINT `bankaccount_ibfk_1` FOREIGN KEY (`codC`) REFERENCES `client` (`idC`);

--
-- Limiti per la tabella `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`capCodeC`) REFERENCES `town` (`capT`);

--
-- Limiti per la tabella `movement`
--
ALTER TABLE `movement`
  ADD CONSTRAINT `movement_ibfk_1` FOREIGN KEY (`targetIBAN`) REFERENCES `bankaccount` (`idB`),
  ADD CONSTRAINT `movement_ibfk_2` FOREIGN KEY (`codB`) REFERENCES `bankaccount` (`idB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
