
CREATE DATABASE IF NOT EXISTS `be-userstory-1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `be-userstory-1`;

DROP PROCEDURE IF EXISTS `readInstrecteurInDienst`;
CREATE DEFINER=`root`@`localhost` PROCEDURE `readInstrecteurInDienst` ()   BEGIN
SELECT ins.Voornaam,
	ins.Tussenvoegsel,
    ins.Achternaam,
    ins.Mobiel,
    ins.DatumInDienst,
    ins.AantalSterren
    FROM Instructeur AS ins;
END;

DROP TABLE IF EXISTS `Instructeur`;
CREATE TABLE IF NOT EXISTS `Instructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(100) NOT NULL,
  `Tussenvoegsel` varchar(100) DEFAULT NULL,
  `Achternaam` varchar(100) NOT NULL,
  `Mobiel` int(11) NOT NULL,
  `DatumInDienst` date NOT NULL,
  `AantalSterren` varchar(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO `Instructeur` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Mobiel`, `DatumInDienst`, `AantalSterren`) VALUES
(1, 'Li', NULL, 'Zhan', 628493827, '2015-04-17', '***'),
(2, 'Leroy', NULL, 'Boerhaven', 639398734, '2018-06-25', '*'),
(3, 'Youri', 'Van', 'Veen', 624383291, '2010-05-12', '***'),
(4, 'Bert', 'Van', 'Sali', 648293823, '2023-01-10', '****'),
(5, 'Mohammed', 'El', 'Yassidi', 634291234, '2010-06-14', '*****');


DROP TABLE IF EXISTS `TypeVoertuig`;
CREATE TABLE IF NOT EXISTS `TypeVoertuig` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeVoertuig` varchar(100) NOT NULL,
  `Rijbewijscategorie` varchar(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `TypeVoertuig` (`Id`, `TypeVoertuig`, `Rijbewijscategorie`) VALUES
(1, 'PersonenAuto', 'B'),
(2, 'Vrachtwagen', 'C'),
(3, 'Bus', 'D'),
(4, 'Bromfiets', 'AM');

DROP TABLE IF EXISTS `Voertuig`;
CREATE TABLE IF NOT EXISTS `Voertuig` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Kenteken` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Bouwjaar` date NOT NULL,
  `Brandstof` varchar(100) NOT NULL,
  `TypeVoertuigId` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `Voertuig` (`Id`, `Kenteken`, `Type`, `Bouwjaar`, `Brandstof`, `TypeVoertuigId`) VALUES
(1, 'AU-67-IO', 'Golf', '2017-06-12', 'Diesel', 1),
(2, 'TR-24-OP', 'DAF', '2019-05-23', 'Diesel', 2),
(3, 'TH-78-KL', 'Mercedes', '2023-01-01', 'Benzine', 1),
(4, '90-KL-TR', 'Fiat 500', '2021-09-12', 'Benzine', 1),
(5, '34-TK-LP', 'Scania', '2015-03-13', 'Diesel', 2),
(6, 'YY-OP-78', 'BMW M5', '2022-05-13', 'Diesel', 1),
(7, 'UU-HH-JK', 'M.A.N', '2017-12-03', 'Diesel', 2),
(8, 'ST-FZ-28', 'Citroën', '2018-01-20', 'Elektries', 1),
(9, '123-FR-T', 'Piaggio Zip', '2021-02-01', 'Benzine', 4),
(10, 'DRS-52-P', 'Vespa', '2022-03-21', 'Benzine', 4),
(11, 'STP-12-U', 'Kymco', '2022-03-21', 'Benzine', 4),
(12, '45-SD-23', 'Renault', '2022-07-02', 'Diesel', 3);

DROP TABLE IF EXISTS `VoertuigInstructeur`;
CREATE TABLE IF NOT EXISTS `VoertuigInstructeur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `VoertuigId` int(11) NOT NULL,
  `InstructeurId` int(11) NOT NULL,
  `DatumToegevoegt` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `VoertuigInstructeur` (`Id`, `VoertuigId`, `InstructeurId`, `DatumToegevoegt`) VALUES
(1, 1, 5, '2017-06-18'),
(2, 3, 1, '2021-09-26'),
(3, 9, 1, '2021-09-21'),
(4, 3, 4, '2022-08-01'),
(5, 5, 1, '2019-08-30'),
(6, 10, 5, '2020-02-02');



