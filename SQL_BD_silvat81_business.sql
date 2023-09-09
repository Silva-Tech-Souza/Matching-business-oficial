-- Active: 1693851733409@@127.0.0.1@3306
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Set-2023 às 14:18
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `silvat81_business`
--

CREATE DATABASE silvat81_business;
USE silvat81_business;

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `ProcedureMestre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastroDeResultados`(
                            INOUT idSearchParam INT,
                            INOUT coreBussinessIDParam INT, 
                            INOUT idClientPesquisador INT, 
                            INOUT idBusinessParam INT, 
                            INOUT idCategoryParam INT, 
                            INOUT idCountryParam INT)
BEGIN

    DECLARE idClientResultado INT DEFAULT -1;

    DECLARE finished INTEGER DEFAULT 0;

    DECLARE cur CURSOR FOR
    SELECT  idClient FROM tbluserclients
    WHERE CoreBusinessId = coreBussinessIDParam AND SatBusinessId = idBusinessParam AND IdOperation = idCategoryParam AND idCountry = idCountryParam;

    -- declare NOT FOUND handler
	DECLARE CONTINUE HANDLER 
    FOR NOT FOUND SET finished = 1;

    -- Abra o cursor
    OPEN cur;

    -- Comece a iterar pelos resultados
    read_loop: LOOP
        -- Leia os valores do cursor e armazene nas variáveis
        FETCH cur INTO idClientResultado;

        IF finished = 1 THEN 
            LEAVE read_loop;
        END IF;

        INSERT INTO `tblSearchResults`(`idSearch`,`idClientPesquisador`,`idClientResultado`) 
        VALUES (idSearchParam,idClientPesquisador,idClientResultado);

        UPDATE `tblSearch` SET `Estado` = FALSE WHERE `idSearch` = idSearchParam;

    END LOOP;
    CLOSE cur;
END$$

DROP PROCEDURE IF EXISTS `ProcedureMestre`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ProcedureMestre` ()   BEGIN

    DECLARE idSearch int DEFAULT -1;
    DECLARE coreBussinessID int DEFAULT -1;
    DECLARE Nome VARCHAR(50) DEFAULT '';
    DECLARE idClient int DEFAULT -1;

    DECLARE idBusiness int DEFAULT -1;

    DECLARE idCategory int DEFAULT -1;

    DECLARE idCountry int DEFAULT -1;

    DECLARE Estado BOOLEAN DEFAULT FALSE;

    DECLARE finished INTEGER DEFAULT 0;
    
    DECLARE cur CURSOR FOR
    SELECT sc.`idSearch`, sc.`coreBussinessID`, sc.`idClient`, bs.`idBusiness`, sct.`idCategory`, sctr.`idCountry`, sc.`Estado` FROM `tblSearch` sc
    JOIN `tblsearchbusiness` bs ON bs.`idSearch` = sc.`idSearch`
    JOIN `tblsearchcategory` sct ON sct.`idSearch` = sc.`idSearch`
    JOIN `tblSearchCountry` sctr ON sctr.`idSearch` = sc.`idSearch`;

    -- declare NOT FOUND handler
	DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET finished = 1;

    -- Abra o cursor
    OPEN cur;

    -- Comece a iterar pelos resultados
    read_loop: LOOP
        -- Leia os valores do cursor e armazene nas variáveis
        FETCH cur INTO idSearch, coreBussinessID, idClient, idBusiness, idCategory, idCountry, Estado;

        IF finished = 1 THEN 
			LEAVE read_loop;
		END IF;

        IF Estado THEN
            CALL `cadastroDeResultados`(idSearch, coreBussinessID, idClient, idBusiness, idCategory, idCountry);
        END IF;

    END LOOP read_loop;
    CLOSE cur;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurtidas`
--

DROP TABLE IF EXISTS `tbcurtidas`;
CREATE TABLE IF NOT EXISTS `tbcurtidas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpost` int NOT NULL,
  `idusuario` int NOT NULL,
  `data` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `hora` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbcurtidas`
--

INSERT INTO `tbcurtidas` (`id`, `idpost`, `idusuario`, `data`, `hora`) VALUES
(2, 65, 617, '2023-07-16', '19:48'),
(3, 65, 617, '2023-07-16', '19:48'),
(4, 65, 617, '2023-07-16', '19:48'),
(5, 65, 617, '2023-07-16', '19:48'),
(6, 65, 617, '2023-07-16', '19:48'),
(7, 65, 617, '2023-07-16', '19:48'),
(8, 65, 617, '2023-07-16', '19:48'),
(9, 70, 629, '2023-07-16', '19:49'),
(10, 70, 617, '2023-07-16', '19:49'),
(11, 69, 629, '2023-07-16', '19:51'),
(13, 71, 617, '2023-07-18', '18:31'),
(15, 69, 617, '2023-07-20', '04:39'),
(16, 68, 617, '2023-07-20', '04:39'),
(17, 72, 617, '2023-07-20', '04:52'),
(18, 67, 617, '2023-07-20', '04:56'),
(19, 71, 2, '2023-07-24', '16:28'),
(20, 72, 1, '2023-07-26', '20:33'),
(21, 73, 1, '2023-07-28', '00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblaction`
--

DROP TABLE IF EXISTS `tblaction`;
CREATE TABLE IF NOT EXISTS `tblaction` (
  `IdAction` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblads`
--

DROP TABLE IF EXISTS `tblads`;
CREATE TABLE IF NOT EXISTS `tblads` (
  `IdAd` int NOT NULL AUTO_INCREMENT,
  `IdCustomer` int DEFAULT NULL,
  `AdLocal` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `AdOrder` int DEFAULT NULL,
  `AdPicturePath` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `AdLink` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `AdStartDate` datetime DEFAULT NULL,
  `AdEndDate` datetime DEFAULT NULL,
  `AdFlagActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdAd`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblads`
--

INSERT INTO `tblads` (`IdAd`, `IdCustomer`, `AdLocal`, `AdOrder`, `AdPicturePath`, `AdLink`, `AdStartDate`, `AdEndDate`, `AdFlagActive`) VALUES
(2, 1, '1', 1, 'View/img/publicidade/bioCompression.png', 'https://biocompression.com/', NULL, NULL, b'0'),
(3, 2, '1', 2, 'View/img/publicidade/Kestal.png', 'https://www.kestal.com.br/', NULL, NULL, b'0'),
(4, 3, '1', 3, 'View/img/publicidade/Kontour.png', 'http://www.kontourmedical.com/', NULL, NULL, b'0'),
(5, 4, '1', 4, 'View/img/publicidade/mediPlus.png', 'https://www.mediplusindia.com/', NULL, NULL, b'0'),
(6, 5, '1', 5, 'View/img/publicidade/phimed.jpg', 'https://phimedeurope.com/', NULL, NULL, b'1'),
(7, 6, '1', 6, 'View/img/publicidade/spineguard.png', 'https://www.spineguard.com/', NULL, NULL, b'0'),
(8, 7, '1', 7, 'View/img/publicidade/xny.png', 'http://www.xnymedical.com/', NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbladslocal`
--

DROP TABLE IF EXISTS `tbladslocal`;
CREATE TABLE IF NOT EXISTS `tbladslocal` (
  `AdLocalId` int NOT NULL AUTO_INCREMENT,
  `AdLocalCode` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `AdLocalObs` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AdLocalId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbladslocal`
--

INSERT INTO `tbladslocal` (`AdLocalId`, `AdLocalCode`, `AdLocalObs`) VALUES
(1, 'FEED_CARROSSEL', NULL),
(2, 'FEED_BOTTOMRIGHT', NULL),
(3, 'FEED_BOTTOMLEFT', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblbusiness`
--

DROP TABLE IF EXISTS `tblbusiness`;
CREATE TABLE IF NOT EXISTS `tblbusiness` (
  `idBusiness` int NOT NULL AUTO_INCREMENT,
  `NmBusiness` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `FlagOperation` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `IdOperation` int NOT NULL,
  PRIMARY KEY (`idBusiness`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblbusiness`
--

INSERT INTO `tblbusiness` (`idBusiness`, `NmBusiness`, `FlagOperation`, `IdOperation`) VALUES
(1, 'Disposables', '0', 0),
(2, 'Healthcare & General Services', '0', 0),
(3, 'Diagnosis / IVD / Imaging', '0', 0),
(4, 'Infrastructure', '0', 0),
(5, 'IT', '0', 0),
(6, 'Laboratory', '0', 0),
(7, 'Medical Equipment', '0', 0),
(8, 'Orthopedic Devices', '0', 0),
(9, 'Pharma/Nutrition', '0', 0),
(10, 'Physiotherapy/Rehabilitation/Mobility', '0', 0),
(11, 'Associations, Institutions, Societies', 'D', 10),
(12, 'Consultancy, Reports, Analysis', 'D', 11),
(13, 'Contract Manufacturing', 'D', 12),
(14, 'CRO', 'D', 23),
(15, 'Department Management (Laboratory, Pharmacy, Finance etc)', 'D', 13),
(16, 'Education, Training, Quality Management', 'D', 14),
(17, 'Facilities Management', 'D', 15),
(18, 'Finance, Investment', 'D', 16),
(19, 'Healthcare Authorities', 'D', 17),
(20, 'Healthcare Providers, Hospitals, Clinics, Public, Private', 'D', 18),
(21, 'HR, Recruitment', 'D', 19),
(22, 'Infrastructure & Assets', 'D', 7),
(23, 'Insurance, Compliance', 'D', 20),
(24, 'It Provider', 'D', 9),
(25, 'Laboratory Services', 'D', 8),
(26, 'Logistics, Supply Chain Management', 'D', 21),
(27, 'Publications, Marketing, Advertising, Communications', 'D', 22),
(28, 'Regulatory Agent', 'D', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblbusinesscategory`
--

DROP TABLE IF EXISTS `tblbusinesscategory`;
CREATE TABLE IF NOT EXISTS `tblbusinesscategory` (
  `idBusinessCategory` int NOT NULL AUTO_INCREMENT,
  `idBusiness` int NOT NULL,
  `NmBusinessCategory` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idBusinessCategory`),
  KEY `idBusiness` (`idBusiness`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblbusinesscategory`
--

INSERT INTO `tblbusinesscategory` (`idBusinessCategory`, `idBusiness`, `NmBusinessCategory`) VALUES
(1, 1, 'Disposables - General'),
(2, 1, 'Disposables/Consumables'),
(3, 1, 'Disposables/Delivery and Access'),
(4, 1, 'Disposables/Incontinence'),
(5, 1, 'Disposables/Textiles'),
(6, 1, 'Disposables/Wound Care'),
(7, 1, 'Disposables/Consumables'),
(8, 1, 'Baby Care Products'),
(9, 1, 'Bags, Sterile and Unsterile'),
(10, 1, 'Blades'),
(11, 1, 'Casting Materials'),
(12, 1, 'Condoms, STD Prevention, Hygiene Products'),
(13, 1, 'Cosmetics, Skin Care Products, Energising Creams'),
(14, 1, 'ECG Consumables, Electrodes'),
(15, 1, 'Gels, Liquids, Fluids'),
(16, 1, 'Gloves'),
(17, 1, 'Oral Care'),
(18, 1, 'Sterilising Products'),
(19, 1, 'Test Strips'),
(20, 1, 'Disposables/Delivery and Access'),
(21, 1, 'Cannulas, Syringes, Needles'),
(22, 1, 'Catheters, Tubes'),
(23, 1, 'Disposables/Incontinence'),
(24, 1, 'Diapers, Underpads'),
(25, 1, 'Ostomy Aids'),
(26, 1, 'Reusable Underwear'),
(27, 1, 'Disposables/Textiles'),
(28, 1, 'Bed Linen, Mattresses, Overlays'),
(29, 1, 'Compression Garments'),
(30, 1, 'Curtains'),
(31, 1, 'Gowns, Drapes, Towels'),
(32, 1, 'Protective Wear, Masks, Headwear, Footwear, Shoe Covers'),
(33, 1, 'Scrubs'),
(34, 1, 'Stockings'),
(35, 1, 'Disposables/Wound Care'),
(36, 1, 'Absorbents'),
(37, 1, 'Adhesive Bandages, Tapes, Dressings, Gauze'),
(38, 1, 'Antiseptic Wipes'),
(39, 1, 'Decubitus Prevention Products'),
(40, 1, 'Surgical Adhesives'),
(41, 3, 'Imaging - General'),
(42, 3, 'Imaging/Diagnostic and Therapy'),
(43, 3, 'Imaging/Radiation'),
(44, 3, 'Imaging/Diagnostic and Therapy'),
(45, 3, '3D Print Visualisation, Analysis'),
(46, 3, 'Biopsy Tracking Systems'),
(47, 3, 'Dark Room Equipment, Supplies'),
(48, 3, 'Dopplers, Fetal Monitors, Accessories'),
(49, 3, 'Functional Diagnostics (ECG, EEG, EMG, TCD, PSG, TMS etc)'),
(50, 3, 'Lithotripters'),
(51, 3, 'Quality Assurance, Safety Control'),
(52, 3, 'Radiation Therapy Machines'),
(53, 3, 'Ultrasound Machines'),
(54, 3, 'Imaging/Radiation'),
(55, 3, 'Bone Densitometers'),
(56, 3, 'Contrast Agent Injectors'),
(57, 3, 'MRI Machines'),
(58, 3, 'Nuclear Medicine'),
(59, 3, 'PET'),
(60, 3, 'Tubes, Accessories'),
(61, 3, 'X-Ray Machines, CT'),
(62, 4, 'Infrastructure - General'),
(63, 4, 'Infrastructure/Construction and Design'),
(64, 4, 'Infrastructure/Hygiene'),
(65, 4, 'Infrastructure/Interior and Furniture'),
(66, 4, 'Infrastructure/Kitchen'),
(67, 4, 'Infrastructure/Supply and Waste'),
(68, 4, 'Infrastructure/Transport'),
(69, 4, 'Infrastructure/Construction and Design'),
(70, 4, 'Architecture, Interior Design'),
(71, 4, 'Construction, Engineering'),
(72, 4, 'Infrastructure/Hygiene'),
(73, 4, 'Air Processing, Purification, Disinfection Systems'),
(74, 4, 'Gas Sterilisers'),
(75, 4, 'Hand Hygiene Systems, Equipment'),
(76, 4, 'Other Equipment for Hygiene, Sterilisation, Disinfection'),
(77, 4, 'Small Automated Sterilisers for Medical Practices'),
(78, 4, 'Sterilisation Disinfection Services'),
(79, 4, 'Sterilisation Equipment, Disinfection Equipment, Accessories, Autoclaves'),
(80, 4, 'Ultrasound Cleansing Equipment'),
(81, 4, 'Ultraviolet Disinfection Equipment'),
(82, 4, 'Washers, Disinfectors'),
(83, 4, 'Infrastructure/Interior and Furniture'),
(84, 4, 'Bathroom Fittings'),
(85, 4, 'Bed Headwall Systems'),
(86, 4, 'Beds, Stretchers, Homecare'),
(87, 4, 'Blood Donor Chairs'),
(88, 4, 'Cart, Trolley Systems'),
(89, 4, 'Ceiling Pendants'),
(90, 4, 'Doors'),
(91, 4, 'Examination, Operating Tables'),
(92, 4, 'IV Pole Stands'),
(93, 4, 'Lighting, Luminaries'),
(94, 4, 'Patient Entertainment'),
(95, 4, 'Revolving Chairs, Stools'),
(96, 4, 'Storage'),
(97, 4, 'Units, Cabinets'),
(98, 4, 'Waiting Room Seating, Benches'),
(99, 4, 'Infrastructure/Kitchen'),
(100, 4, 'Catering Trolleys'),
(101, 4, 'Kitchen Equipment'),
(102, 4, 'Kitchen Instruments'),
(103, 4, 'Infrastructure/Supply and Waste'),
(104, 4, 'Installation, Equipment for Supply Conduits (Gas, Compressed Air, Oxygen, Water, Electricity etc)'),
(105, 4, 'Waste Management'),
(106, 4, 'Infrastructure/Transport'),
(107, 4, 'Ambulances'),
(108, 5, 'IT - General'),
(109, 5, 'IT/Applications'),
(110, 5, 'IT/Bar Coding Solutions'),
(111, 5, 'IT/Cloud Security'),
(112, 5, 'IT/Data Analytics'),
(113, 5, 'IT/Data Warehousing'),
(114, 5, 'IT/Hardware'),
(115, 5, 'IT/Hospital Information Systems'),
(116, 5, 'IT/Laboratory Automation Systems'),
(117, 5, 'IT/Laboratory Data Management/Analysis'),
(118, 5, 'IT/Software and Mobile Content'),
(119, 5, 'IT/Telecom'),
(120, 5, 'IT/Applications'),
(121, 5, 'eHealth, Telemedicine, Telematics, Telemetry'),
(122, 5, 'mHealth, mobile IT, Wireless Technologies (Bluetooth, Wi-Fi)'),
(123, 5, 'Wearable Technologies, Smart Textiles'),
(124, 5, 'IT/Bar Coding Solutions'),
(125, 5, 'Readers for Patient Cards, Chip Cards, RFID Chips, Slips, Receipts'),
(126, 5, 'Tracking systems (RFID, RTLS)'),
(127, 5, 'IT/Cloud Security'),
(128, 5, 'Cloud Applications, Services'),
(129, 5, 'IT/Data Analytics'),
(130, 5, 'Big Data'),
(131, 5, 'Predictive Analytics'),
(132, 5, 'Real time Analytics'),
(133, 5, 'IT/Data Warehousing'),
(134, 5, 'Data Governance'),
(135, 5, 'Data Security'),
(136, 5, 'Document Management'),
(137, 5, 'Image Archiving, PACS'),
(138, 5, 'IT/Hardware'),
(139, 5, 'Handhelds, Laptops, PCs, Printers, Monitors, Screens'),
(140, 5, 'IT/Hospital Information Systems'),
(141, 5, 'Electronic Medical Record, Electronic Health Record Systems'),
(142, 5, 'Enterprise Resource Planning (ERP) Systems'),
(143, 5, 'Healthcare Information Systems, Software (HIS)'),
(144, 5, 'Video, Recording Systems'),
(145, 5, 'IT/Laboratory Automation Systems'),
(146, 5, 'Liquid Handling'),
(147, 5, 'Microplate Instrumentation'),
(148, 5, 'Robotics'),
(149, 5, 'Workflow Software'),
(150, 5, 'IT/Laboratory Data Management/ Analysis'),
(151, 5, 'Artificial Intelligence'),
(152, 5, 'Data Storage Solutions'),
(153, 5, 'Enterprise Informatics'),
(154, 5, 'Laboratory Big Data'),
(155, 5, 'Laboratory Information Management Systems'),
(156, 5, 'IT/Software and Mobile Content'),
(157, 5, 'App Providers'),
(158, 5, 'Diagnostic Software'),
(159, 5, 'eDischarge'),
(160, 5, 'ePrescribing, Pharma Management'),
(161, 5, 'GP Systems'),
(162, 5, 'Integration, Interoperability'),
(163, 5, 'Opensource'),
(164, 5, 'Patient Administration Systems, Clinical and Patient Portals'),
(165, 5, 'Security, Malware Vendors'),
(166, 5, 'IT/Telecom'),
(167, 5, '3G, 4G, 5G, Wi-Fi'),
(168, 5, 'Cybersecurity, Virus Protection, Intrusion Protection, Anti-Spa, Firewalls'),
(169, 5, 'VoIP Solutions'),
(170, 5, 'Web, Internet Solutions'),
(171, 6, 'Laboratory - General'),
(172, 6, 'Laboratory/Devices'),
(173, 6, 'Laboratory/Disposables'),
(174, 6, 'Laboratory/Equipment'),
(175, 6, 'Laboratory/Instruments'),
(176, 6, 'Laboratory/Reagents'),
(177, 6, 'Laboratory/Sterilisation'),
(178, 6, 'Laboratory/Tests'),
(179, 6, 'Laboratory/Devices'),
(180, 6, 'Anaerobic Systems'),
(181, 6, 'Calorimeters'),
(182, 6, 'Cell Counters'),
(183, 6, 'Centrifuges'),
(184, 6, 'Coagulators'),
(185, 6, 'Colorimeter, Light Measuring Devices'),
(186, 6, 'Electrochemistry Devices, Electrophoresis'),
(187, 6, 'Evaporators'),
(188, 6, 'Homogenisers'),
(189, 6, 'Laboratory Incubators'),
(190, 6, 'Membrane Dispensers'),
(191, 6, 'Point of Care Testing Device'),
(192, 6, 'Pumps'),
(193, 6, 'Refractometers'),
(194, 6, 'Titrators'),
(195, 6, 'Viscometers'),
(196, 6, 'Laboratory/Disposables'),
(197, 6, 'Blood Collection Equipment'),
(198, 6, 'Blood Transfusion Equipment'),
(199, 6, 'Labels, Tapes'),
(200, 6, 'Needles, Pipettes, Tips'),
(201, 6, 'Plastic Lab Containers'),
(202, 6, 'Swabs'),
(203, 6, 'Test Strips'),
(204, 6, 'Tissue Grinder Disposables'),
(205, 6, 'Laboratory/Equipment'),
(206, 6, 'Analysers'),
(207, 6, 'Blenders'),
(208, 6, 'Electrophoresis Systems'),
(209, 6, 'Filtration'),
(210, 6, 'Heating, Cooling Systems'),
(211, 6, 'Hot Plates'),
(212, 6, 'Lab Automation System'),
(213, 6, 'Lighting'),
(214, 6, 'Microscopes and Accessories'),
(215, 6, 'Microtomes and Paraffin Dispensers'),
(216, 6, 'Scales, Balances'),
(217, 6, 'Ventilated Enclosures'),
(218, 6, 'Water Baths'),
(219, 6, 'Laboratory/Instruments'),
(220, 6, 'Bottle Top Dispensers, Brushes, Bunsen Burners'),
(221, 6, 'Dilutors'),
(222, 6, 'Glassware, Plasticware, Steelware'),
(223, 6, 'Pipettors'),
(224, 6, 'Thermometers'),
(225, 6, 'Laboratory/Reagents'),
(226, 6, 'Acids, Solutions, Solvents'),
(227, 6, 'Culture Media'),
(228, 6, 'In Vitro Diagnostics Test Kits, Calibrators'),
(229, 6, 'Raw Materials'),
(230, 6, 'Salts, Minerals, Sugars, Stains, Dyes'),
(231, 6, 'Laboratory/Sterilisation'),
(232, 6, 'Autoclaves'),
(233, 6, 'Biosafety Cabinet'),
(234, 6, 'Lab Washers'),
(235, 6, 'Microbial Sensitivity Systems and Accessories'),
(236, 6, 'Laboratory/Tests'),
(237, 6, 'Drug Abuse Tests'),
(238, 6, 'Elisa Test Kits'),
(239, 6, 'Endotoxin Tests'),
(240, 6, 'Immunoassay Tests'),
(241, 6, 'In Vitro Diagnostic Tests'),
(242, 6, 'Molecular Diagnostic Tests'),
(243, 6, 'Point of Care Home Testing'),
(244, 6, 'Point of Care Professional Diagnostics'),
(245, 6, 'Rapid Allergy Tests'),
(246, 7, 'Medical Equipment - General'),
(247, 7, 'Medical Equipment/Aesthetic'),
(248, 7, 'Medical Equipment/Dental'),
(249, 7, 'Medical Equipment/Endoscopes'),
(250, 7, 'Medical Equipment/ENT'),
(251, 7, 'Medical Equipment/Infant Care'),
(252, 7, 'Medical Equipment/Life Support'),
(253, 7, 'Medical Equipment/Other'),
(254, 7, 'Medical Equipment/Patient Monitoring'),
(255, 7, 'Medical Equipment/Surgical Instruments'),
(256, 7, 'Medical Equipment/Dental'),
(257, 7, 'Dental Material, Cements, Amalgam'),
(258, 7, 'Endodontic Equipment'),
(259, 7, 'General Instruments'),
(260, 7, 'Laboratory Instruments'),
(261, 7, 'Prosthodontic Equipment'),
(262, 7, 'Medical Equipment/Aesthetic'),
(263, 7, 'Dermascope, Dermatoscope'),
(264, 7, 'Lasers'),
(265, 7, 'Lipo Reduction'),
(266, 7, 'Medical Equipment/Endoscopes'),
(267, 7, 'Prosthodontic Equipment'),
(268, 7, 'Balloon Dilators'),
(269, 7, 'Band Legators'),
(270, 7, 'Bronchoscopes'),
(271, 7, 'Colposcopes'),
(272, 7, 'Endoscopic Cameras, Accessories'),
(273, 7, 'Gastroscope, Duodenoscope, Colonoscopes, Sigmoidoscope'),
(274, 7, 'Laparoscopes'),
(275, 7, 'Laryngoscopes, Otoscopes, Pharyngoscopes'),
(276, 7, 'Ureteroscopes, Cytoscope'),
(277, 7, 'Medical Equipment/ENT'),
(278, 7, 'Cochlear Implants, Vestibular Sensory Systems'),
(279, 7, 'ENT Diagnostics'),
(280, 7, 'Hearing Aids, Accessories, Batteries'),
(281, 7, 'Medical Equipment/Infant Care'),
(282, 7, 'Incubators'),
(283, 7, 'Newborn Screening Tests'),
(284, 7, 'SIDS Monitors, Fetal Monitoring Belts'),
(285, 7, 'Stem Cell Collection'),
(286, 7, 'Medical Equipment/Life Support'),
(287, 7, 'Anaesthesia Machines'),
(288, 7, 'Breathing Filters'),
(289, 7, 'Connectors, Tubes'),
(290, 7, 'Emergency Training Devices, Emergency Bag, First Aid'),
(291, 7, 'Flowmeter, Spirometer, Vaporisers, Nebulisers'),
(292, 7, 'Guedel Airways and Oxygen Supplies'),
(293, 7, 'Heart Circulation Equipment'),
(294, 7, 'Pacemakers'),
(295, 7, 'Resuscitators, Defibrillators'),
(296, 7, 'Ventilators'),
(297, 7, 'Medical Equipment/Other'),
(298, 7, '3D Printers, Simulators'),
(299, 7, 'Dialysis Machine'),
(300, 7, 'Filtration, Purification Systems'),
(301, 7, 'Fridges, Freezers'),
(302, 7, 'Patient Warming, Cooling Systems'),
(303, 7, 'Piercing Systems'),
(304, 7, 'Stress Test Machine'),
(305, 7, 'Suction, Infusion Pumps'),
(306, 7, 'Surgical Navigation Systems'),
(307, 7, 'Sutures, Sealing Devices'),
(308, 7, 'Used Medical Equipment'),
(309, 7, 'Medical Equipment/Patient Monitoring'),
(310, 7, 'Blood Glucose Monitors'),
(311, 7, 'Blood Pressure Monitors'),
(312, 7, 'Clinical Review Monitors'),
(313, 7, 'Diagnostic Monitors'),
(314, 7, 'Haemoglobin Meters'),
(315, 7, 'Multi Modality Monitors'),
(316, 7, 'Patient Weighing Systems'),
(317, 7, 'Pulsoximeters'),
(318, 7, 'Retinoscopes, Ophthalmoscopes'),
(319, 7, 'Stethoscopes'),
(320, 7, 'Surgical Monitors'),
(321, 7, 'Thermometers'),
(322, 7, 'Transcutaneous Monitors'),
(323, 7, 'Vital Monitoring Systems'),
(324, 7, 'Medical Equipment/Surgical Instruments'),
(325, 7, 'Abdominal Surgery'),
(326, 7, 'Cardiac and Thoracic Surgery'),
(327, 7, 'Dermatology and Cosmetic Surgery'),
(328, 7, 'Electrosurgical Instruments (HF)'),
(329, 7, 'General Surgery'),
(330, 7, 'Microsurgical Instruments'),
(331, 7, 'Minimal-Invasive Surgery (MIS)'),
(332, 7, 'Neurosurgical Instruments, Equipment'),
(333, 7, 'Ophthalmology'),
(334, 7, 'Vascular Surgical Instruments, Accessories'),
(335, 8, 'Orthopaedic Devices - General'),
(336, 8, 'Orthopaedic Devices/Compression'),
(337, 8, 'Orthopaedic Devices/Equipment'),
(338, 8, 'Orthopaedic Devices/Compression'),
(339, 8, 'Pneumatic Tourniquets, Bands'),
(340, 8, 'Orthopaedic Devices/Equipment'),
(341, 8, 'Implants, Prosthetics'),
(342, 8, 'Internal, External Fixation, Support Immobilisers'),
(343, 8, 'Orthopaedic Feet Aids, Shoes, Insoles'),
(344, 8, 'Orthopaedic Shockwave Therapy Equipment'),
(345, 9, 'Pharma/Nutrition - General'),
(346, 9, 'Food for Medical Purposes'),
(347, 9, 'Pharmaceutical Machinery, Equipment'),
(348, 9, 'Pharmaceutical Products, OTC'),
(349, 9, 'Pharmaceutical Products, Prescriptions'),
(350, 9, 'Supplements, Vitamins, Herbals'),
(351, 10, 'Physiotherapy/Rehabilitation/Mobility - General'),
(352, 10, 'Patient Lifts, Hoists'),
(353, 10, 'Physiotherapeutic Massage Equipment'),
(354, 10, 'Rehabilitation Equipment, Devices'),
(355, 10, 'Scooters, Rollators, Walkers, Wheelchairs'),
(356, 10, 'Support Handles'),
(357, 10, 'Thermotherapy'),
(358, 10, 'Transfer Rolls, Pivot Disks'),
(359, 2, 'Healthcare & General Services'),
(360, 11, 'Associations, Institutions, Societies'),
(361, 12, 'Consultancy, Reports, Analysis'),
(362, 13, 'Contract Manufacturing'),
(363, 14, 'CRO'),
(364, 15, 'Department Management (Laboratory, Pharmacy, Finance etc)'),
(365, 16, 'Education, Training, Quality Management'),
(366, 17, 'Facilities Management'),
(367, 18, 'Finance, Investment'),
(368, 19, 'Healthcare Authorities'),
(369, 20, 'Healthcare Providers, Hospitals, Clinics, Public, Private'),
(370, 21, 'HR, Recruitment'),
(371, 22, 'Infrastructure & Assets'),
(372, 23, 'Insurance, Compliance'),
(373, 24, 'It Provider'),
(374, 25, 'Laboratory Services'),
(375, 26, 'Logistics, Supply Chain Management'),
(376, 27, 'Publications, Marketing, Advertising, Communications'),
(377, 28, 'Regulatory Agent'),
(391, 8, 'Spine & Craneo Implant');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblchat`
--

DROP TABLE IF EXISTS `tblchat`;
CREATE TABLE IF NOT EXISTS `tblchat` (
  `idChat` bigint NOT NULL AUTO_INCREMENT,
  `ClientChatId` int DEFAULT NULL,
  `ChatText` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ChatTextDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idClients` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'recebe os ids de dois clientes, separados po |\nEx ',
  PRIMARY KEY (`idChat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblclientchatid`
--

DROP TABLE IF EXISTS `tblclientchatid`;
CREATE TABLE IF NOT EXISTS `tblclientchatid` (
  `ClientChatId` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `idClienteTo` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `idChat` int NOT NULL,
  `ClientChatDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ClientChatId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblclientscontracts`
--

DROP TABLE IF EXISTS `tblclientscontracts`;
CREATE TABLE IF NOT EXISTS `tblclientscontracts` (
  `IdClientContract` int NOT NULL AUTO_INCREMENT,
  `IdClient` int NOT NULL,
  `idContract` int NOT NULL,
  `DateOfContract` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IdClientContract`),
  KEY `IdClient` (`IdClient`),
  KEY `idContract` (`idContract`)
) ENGINE=InnoDB AUTO_INCREMENT=508 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblclientscontracts`
--

INSERT INTO `tblclientscontracts` (`IdClientContract`, `IdClient`, `idContract`, `DateOfContract`) VALUES
(2, 1, 1, '2023-02-09 16:45:09'),
(3, 2, 1, '2023-02-09 16:45:16'),
(19, 46, 2, '2023-02-24 12:56:42'),
(21, 48, 2, '2023-02-24 13:41:12'),
(139, 213, 2, '2023-04-19 10:21:58'),
(140, 214, 2, '2023-04-19 10:22:04'),
(141, 215, 2, '2023-04-19 10:22:05'),
(142, 216, 2, '2023-04-19 10:22:06'),
(143, 217, 2, '2023-04-19 10:22:08'),
(144, 218, 2, '2023-04-19 10:22:09'),
(145, 219, 2, '2023-04-19 10:22:10'),
(146, 220, 2, '2023-04-19 10:22:11'),
(147, 221, 2, '2023-04-19 10:22:12'),
(148, 222, 2, '2023-04-19 10:38:05'),
(149, 223, 2, '2023-04-19 10:38:06'),
(150, 224, 2, '2023-04-19 10:38:08'),
(151, 225, 2, '2023-04-19 10:38:09'),
(152, 226, 2, '2023-04-19 10:38:10'),
(153, 227, 2, '2023-04-19 10:38:11'),
(154, 228, 2, '2023-04-19 10:38:12'),
(155, 229, 2, '2023-04-19 10:38:13'),
(156, 230, 2, '2023-04-19 10:38:14'),
(157, 231, 2, '2023-04-19 10:41:03'),
(158, 232, 2, '2023-04-19 10:41:05'),
(159, 233, 2, '2023-04-19 10:41:06'),
(160, 234, 2, '2023-04-19 10:41:07'),
(161, 235, 2, '2023-04-19 10:41:08'),
(162, 236, 2, '2023-04-19 10:41:09'),
(163, 237, 2, '2023-04-19 10:41:10'),
(164, 238, 2, '2023-04-19 10:41:11'),
(165, 239, 2, '2023-04-19 10:41:13'),
(166, 240, 2, '2023-04-19 10:42:51'),
(167, 241, 2, '2023-04-19 10:42:52'),
(168, 242, 2, '2023-04-19 10:42:54'),
(169, 243, 2, '2023-04-19 10:42:55'),
(170, 244, 2, '2023-04-19 10:42:56'),
(171, 245, 2, '2023-04-19 10:42:57'),
(172, 246, 2, '2023-04-19 10:42:58'),
(173, 247, 2, '2023-04-19 10:42:59'),
(174, 248, 2, '2023-04-19 10:43:00'),
(175, 249, 2, '2023-04-19 10:48:37'),
(176, 250, 2, '2023-04-19 10:48:39'),
(177, 251, 2, '2023-04-19 10:48:40'),
(178, 252, 2, '2023-04-19 10:48:42'),
(179, 253, 2, '2023-04-19 10:48:43'),
(180, 254, 2, '2023-04-19 10:48:45'),
(181, 255, 2, '2023-04-19 10:48:46'),
(182, 256, 2, '2023-04-19 10:48:48'),
(183, 257, 2, '2023-04-19 10:48:49'),
(184, 258, 2, '2023-04-19 10:48:50'),
(185, 259, 2, '2023-04-19 10:48:52'),
(186, 260, 2, '2023-04-19 10:48:54'),
(187, 261, 2, '2023-04-19 10:48:55'),
(188, 262, 2, '2023-04-19 10:48:57'),
(189, 263, 2, '2023-04-19 10:48:58'),
(190, 264, 2, '2023-04-19 10:49:00'),
(191, 265, 2, '2023-04-19 10:49:01'),
(192, 266, 2, '2023-04-19 10:49:02'),
(193, 267, 2, '2023-04-19 10:49:04'),
(194, 268, 2, '2023-04-19 10:54:42'),
(195, 269, 2, '2023-04-19 10:54:44'),
(196, 270, 2, '2023-04-19 10:56:10'),
(197, 271, 2, '2023-04-19 10:56:11'),
(198, 272, 2, '2023-04-19 10:56:13'),
(199, 273, 2, '2023-04-19 10:56:14'),
(200, 274, 2, '2023-04-19 10:56:15'),
(201, 275, 2, '2023-04-19 10:56:17'),
(202, 276, 2, '2023-04-19 10:56:18'),
(203, 277, 2, '2023-04-19 10:56:20'),
(204, 278, 2, '2023-04-19 10:56:21'),
(205, 279, 2, '2023-04-19 10:56:22'),
(206, 280, 2, '2023-04-19 10:56:23'),
(207, 281, 2, '2023-04-19 10:56:24'),
(208, 282, 2, '2023-04-19 10:56:26'),
(209, 283, 2, '2023-04-19 10:56:27'),
(210, 284, 2, '2023-04-19 10:56:28'),
(211, 285, 2, '2023-04-19 10:56:29'),
(212, 286, 2, '2023-04-19 10:56:30'),
(213, 287, 2, '2023-04-19 10:56:31'),
(214, 288, 2, '2023-04-19 10:56:33'),
(215, 289, 2, '2023-04-19 10:56:34'),
(216, 290, 2, '2023-04-19 10:56:35'),
(217, 291, 2, '2023-04-19 10:56:36'),
(218, 292, 2, '2023-04-19 10:58:28'),
(219, 293, 2, '2023-04-19 10:58:29'),
(220, 294, 2, '2023-04-19 10:58:30'),
(221, 295, 2, '2023-04-19 10:58:32'),
(222, 296, 2, '2023-04-19 10:58:33'),
(223, 297, 2, '2023-04-19 10:58:34'),
(224, 298, 2, '2023-04-19 10:58:35'),
(225, 299, 2, '2023-04-19 10:58:36'),
(226, 300, 2, '2023-04-19 10:58:38'),
(227, 301, 2, '2023-04-19 11:00:50'),
(228, 302, 2, '2023-04-19 11:00:51'),
(229, 303, 2, '2023-04-19 11:00:53'),
(230, 304, 2, '2023-04-19 11:00:54'),
(231, 305, 2, '2023-04-19 11:00:55'),
(232, 306, 2, '2023-04-19 11:00:56'),
(233, 307, 2, '2023-04-19 11:00:57'),
(234, 308, 2, '2023-04-19 11:00:58'),
(235, 309, 2, '2023-04-19 11:00:59'),
(236, 310, 2, '2023-04-19 11:01:01'),
(237, 311, 2, '2023-04-19 11:01:02'),
(238, 312, 2, '2023-04-19 11:01:03'),
(239, 313, 2, '2023-04-19 11:01:04'),
(240, 314, 2, '2023-04-19 11:01:05'),
(241, 315, 2, '2023-04-19 11:01:06'),
(242, 316, 2, '2023-04-19 11:01:07'),
(243, 317, 2, '2023-04-19 11:01:09'),
(244, 318, 2, '2023-04-19 11:01:10'),
(245, 319, 2, '2023-04-19 11:01:11'),
(246, 320, 2, '2023-04-19 11:01:12'),
(247, 321, 2, '2023-04-19 11:01:13'),
(248, 322, 2, '2023-04-19 11:01:55'),
(249, 323, 2, '2023-04-19 11:01:56'),
(250, 324, 2, '2023-04-19 11:01:57'),
(251, 325, 2, '2023-04-19 11:01:58'),
(252, 326, 2, '2023-04-19 11:02:00'),
(253, 327, 2, '2023-04-19 11:02:01'),
(254, 328, 2, '2023-04-19 11:02:02'),
(255, 329, 2, '2023-04-19 11:02:03'),
(256, 330, 2, '2023-04-19 11:03:46'),
(257, 331, 2, '2023-04-19 11:03:48'),
(258, 332, 2, '2023-04-19 11:03:49'),
(259, 333, 2, '2023-04-19 11:03:50'),
(260, 334, 2, '2023-04-19 11:03:51'),
(261, 335, 2, '2023-04-19 11:03:52'),
(262, 336, 2, '2023-04-19 11:03:53'),
(263, 337, 2, '2023-04-19 11:03:55'),
(264, 338, 2, '2023-04-19 11:03:56'),
(265, 339, 2, '2023-04-19 11:03:57'),
(266, 340, 2, '2023-04-19 11:03:58'),
(267, 341, 2, '2023-04-19 11:03:59'),
(268, 342, 2, '2023-04-19 11:04:00'),
(269, 343, 2, '2023-04-19 11:04:02'),
(270, 344, 2, '2023-04-19 11:04:03'),
(271, 345, 2, '2023-04-19 11:04:04'),
(272, 346, 2, '2023-04-19 11:04:05'),
(273, 347, 2, '2023-04-19 11:04:07'),
(274, 348, 2, '2023-04-19 11:04:08'),
(275, 349, 2, '2023-04-19 11:04:09'),
(276, 350, 2, '2023-04-19 11:04:10'),
(277, 351, 2, '2023-04-19 11:04:11'),
(278, 352, 2, '2023-04-19 11:04:12'),
(279, 353, 2, '2023-04-19 11:04:14'),
(280, 354, 2, '2023-04-19 11:04:15'),
(281, 355, 2, '2023-04-19 11:04:16'),
(282, 356, 2, '2023-04-19 11:04:17'),
(283, 357, 2, '2023-04-19 11:04:18'),
(284, 358, 2, '2023-04-19 11:04:19'),
(285, 359, 2, '2023-04-20 11:24:21'),
(286, 360, 2, '2023-04-20 11:24:23'),
(287, 361, 2, '2023-04-20 11:24:24'),
(288, 362, 2, '2023-04-20 11:24:25'),
(289, 363, 2, '2023-04-20 11:24:26'),
(290, 364, 2, '2023-04-20 11:24:27'),
(291, 365, 2, '2023-04-20 11:24:29'),
(292, 366, 2, '2023-04-20 11:24:30'),
(293, 367, 2, '2023-04-20 11:24:31'),
(294, 368, 2, '2023-04-20 11:24:32'),
(295, 369, 2, '2023-04-20 11:24:34'),
(296, 370, 2, '2023-04-20 11:24:35'),
(297, 371, 2, '2023-04-20 11:24:36'),
(298, 372, 2, '2023-04-20 11:24:37'),
(299, 373, 2, '2023-04-20 11:26:23'),
(300, 374, 2, '2023-04-20 11:26:24'),
(301, 375, 2, '2023-04-20 11:26:26'),
(302, 376, 2, '2023-04-20 11:26:27'),
(303, 377, 2, '2023-04-20 11:26:28'),
(304, 378, 2, '2023-04-20 11:26:29'),
(305, 379, 2, '2023-04-20 11:26:31'),
(306, 380, 2, '2023-04-20 11:26:32'),
(307, 381, 2, '2023-04-20 11:26:33'),
(308, 382, 2, '2023-04-20 11:26:34'),
(309, 383, 2, '2023-04-20 11:26:35'),
(310, 384, 2, '2023-04-20 11:26:36'),
(311, 385, 2, '2023-04-20 11:26:38'),
(312, 386, 2, '2023-04-20 11:26:39'),
(313, 387, 2, '2023-04-20 11:36:23'),
(314, 388, 2, '2023-04-20 11:36:24'),
(315, 389, 2, '2023-04-20 11:36:25'),
(316, 390, 2, '2023-04-20 11:36:26'),
(317, 391, 2, '2023-04-20 11:36:28'),
(318, 392, 2, '2023-04-20 11:36:29'),
(319, 393, 2, '2023-04-20 11:36:31'),
(320, 394, 2, '2023-04-20 11:36:32'),
(321, 395, 2, '2023-04-20 11:36:33'),
(322, 396, 2, '2023-04-20 11:36:34'),
(323, 397, 2, '2023-04-20 11:36:36'),
(324, 398, 2, '2023-04-20 11:36:37'),
(325, 399, 2, '2023-04-20 11:36:38'),
(326, 400, 2, '2023-04-20 11:36:39'),
(327, 401, 2, '2023-04-20 11:36:40'),
(328, 402, 2, '2023-04-20 11:36:41'),
(329, 403, 2, '2023-04-20 11:36:43'),
(330, 404, 2, '2023-04-20 11:37:30'),
(331, 405, 2, '2023-04-20 11:37:32'),
(332, 406, 2, '2023-04-20 11:37:33'),
(333, 407, 2, '2023-04-20 11:37:34'),
(334, 408, 2, '2023-04-20 11:37:35'),
(335, 409, 2, '2023-04-20 11:37:36'),
(336, 410, 2, '2023-04-20 11:37:37'),
(337, 411, 2, '2023-04-20 11:37:38'),
(338, 412, 2, '2023-04-20 11:37:40'),
(339, 413, 2, '2023-04-20 11:37:41'),
(340, 414, 2, '2023-04-20 11:37:42'),
(341, 415, 2, '2023-04-20 11:37:43'),
(342, 416, 2, '2023-04-20 11:37:44'),
(343, 417, 2, '2023-04-20 11:37:45'),
(344, 418, 2, '2023-04-20 11:37:47'),
(345, 419, 2, '2023-04-20 11:37:48'),
(346, 420, 2, '2023-04-20 11:37:49'),
(347, 421, 2, '2023-04-20 11:37:50'),
(348, 422, 2, '2023-04-20 11:37:51'),
(349, 423, 2, '2023-04-20 11:37:52'),
(350, 424, 2, '2023-04-20 11:37:53'),
(351, 425, 2, '2023-04-20 11:37:55'),
(352, 426, 2, '2023-04-20 11:37:56'),
(353, 427, 2, '2023-04-20 11:37:57'),
(354, 428, 2, '2023-04-20 11:37:58'),
(355, 429, 2, '2023-04-20 11:37:59'),
(356, 430, 2, '2023-04-20 11:38:00'),
(357, 431, 2, '2023-04-20 11:38:02'),
(358, 432, 2, '2023-04-20 11:38:03'),
(359, 433, 2, '2023-04-20 11:38:04'),
(360, 434, 2, '2023-04-20 11:38:06'),
(361, 435, 2, '2023-04-20 11:38:07'),
(362, 436, 2, '2023-04-20 11:38:08'),
(363, 437, 2, '2023-04-20 11:38:09'),
(364, 438, 2, '2023-04-20 11:38:10'),
(365, 439, 2, '2023-04-20 11:38:11'),
(366, 440, 2, '2023-04-20 11:38:13'),
(367, 441, 2, '2023-04-20 11:38:14'),
(368, 442, 2, '2023-04-20 11:38:15'),
(369, 443, 2, '2023-04-20 11:38:16'),
(370, 444, 2, '2023-04-20 11:38:18'),
(371, 445, 2, '2023-04-20 11:38:19'),
(372, 446, 2, '2023-04-20 11:38:20'),
(373, 447, 2, '2023-04-20 11:38:21'),
(374, 448, 2, '2023-04-20 11:38:22'),
(375, 449, 2, '2023-04-20 11:38:23'),
(376, 450, 2, '2023-04-20 11:40:31'),
(377, 451, 2, '2023-04-20 11:40:32'),
(378, 452, 2, '2023-04-20 11:40:33'),
(379, 453, 2, '2023-04-20 11:40:35'),
(380, 454, 2, '2023-04-20 11:40:36'),
(381, 455, 2, '2023-04-20 11:40:37'),
(382, 456, 2, '2023-04-20 11:40:38'),
(383, 457, 2, '2023-04-20 11:40:39'),
(384, 458, 2, '2023-04-20 11:40:40'),
(385, 459, 2, '2023-04-20 11:40:42'),
(386, 460, 2, '2023-04-20 11:40:43'),
(387, 461, 2, '2023-04-20 11:40:44'),
(388, 462, 2, '2023-04-20 11:40:45'),
(389, 463, 2, '2023-04-20 11:40:46'),
(390, 464, 2, '2023-04-20 11:40:48'),
(391, 465, 2, '2023-04-20 11:40:49'),
(392, 466, 2, '2023-04-20 11:40:50'),
(393, 467, 2, '2023-04-20 11:40:51'),
(394, 468, 2, '2023-04-20 11:40:52'),
(395, 469, 2, '2023-04-20 11:40:53'),
(396, 470, 2, '2023-04-20 11:40:55'),
(397, 471, 2, '2023-04-20 11:40:56'),
(398, 472, 2, '2023-04-20 11:40:57'),
(399, 473, 2, '2023-04-20 11:40:58'),
(400, 474, 2, '2023-04-20 11:40:59'),
(401, 475, 2, '2023-04-20 11:41:00'),
(402, 476, 2, '2023-04-20 11:41:02'),
(403, 477, 2, '2023-04-20 11:41:03'),
(404, 478, 2, '2023-04-20 11:41:04'),
(405, 479, 2, '2023-04-20 11:41:05'),
(406, 480, 2, '2023-04-20 11:41:06'),
(407, 481, 2, '2023-04-20 11:41:07'),
(408, 482, 2, '2023-04-20 11:55:45'),
(409, 483, 2, '2023-04-20 11:55:46'),
(410, 484, 2, '2023-04-20 11:55:47'),
(411, 485, 2, '2023-04-20 11:55:49'),
(412, 486, 2, '2023-04-20 11:55:50'),
(413, 487, 2, '2023-04-20 11:55:51'),
(414, 488, 2, '2023-04-20 11:55:52'),
(415, 489, 2, '2023-04-20 11:55:53'),
(416, 490, 2, '2023-04-20 11:55:54'),
(417, 491, 2, '2023-04-20 11:55:55'),
(418, 492, 2, '2023-04-20 11:55:57'),
(419, 493, 2, '2023-04-20 11:55:58'),
(420, 494, 2, '2023-04-20 11:55:59'),
(421, 495, 2, '2023-04-20 11:56:00'),
(422, 496, 2, '2023-04-20 11:56:01'),
(423, 497, 2, '2023-04-20 11:56:02'),
(424, 498, 2, '2023-04-28 12:03:32'),
(426, 501, 2, '2023-04-30 17:38:09'),
(427, 504, 2, '2023-04-30 18:36:34'),
(428, 516, 2, '2023-05-01 16:24:58'),
(429, 517, 2, '2023-05-01 16:25:00'),
(430, 518, 2, '2023-05-01 16:25:01'),
(431, 519, 2, '2023-05-01 16:25:02'),
(432, 520, 2, '2023-05-01 16:25:03'),
(433, 521, 2, '2023-05-01 16:25:04'),
(434, 522, 2, '2023-05-01 16:25:06'),
(435, 523, 2, '2023-05-01 16:25:07'),
(436, 524, 2, '2023-05-01 16:25:08'),
(437, 525, 2, '2023-05-01 16:25:09'),
(438, 526, 2, '2023-05-01 16:25:10'),
(439, 528, 2, '2023-05-01 16:25:11'),
(440, 529, 2, '2023-05-01 16:25:13'),
(441, 530, 2, '2023-05-01 16:25:14'),
(442, 531, 2, '2023-05-01 16:25:15'),
(443, 532, 2, '2023-05-01 16:25:16'),
(444, 533, 2, '2023-05-01 16:25:17'),
(445, 534, 2, '2023-05-01 16:25:19'),
(446, 535, 2, '2023-05-01 16:25:20'),
(447, 536, 2, '2023-05-01 16:25:21'),
(448, 537, 2, '2023-05-01 16:25:22'),
(449, 538, 2, '2023-05-01 16:25:23'),
(450, 539, 2, '2023-05-01 16:25:24'),
(451, 540, 2, '2023-05-01 16:25:26'),
(452, 541, 2, '2023-05-01 16:25:27'),
(453, 542, 2, '2023-05-01 16:25:28'),
(454, 543, 2, '2023-05-01 16:25:29'),
(455, 544, 2, '2023-05-01 16:25:30'),
(456, 545, 2, '2023-05-01 16:25:32'),
(457, 546, 2, '2023-05-01 16:25:33'),
(458, 547, 2, '2023-05-01 16:25:34'),
(459, 548, 2, '2023-05-01 16:25:35'),
(460, 549, 2, '2023-05-01 16:25:37'),
(461, 550, 2, '2023-05-01 16:25:38'),
(462, 551, 2, '2023-05-01 16:25:39'),
(463, 552, 2, '2023-05-01 16:25:40'),
(464, 553, 2, '2023-05-01 16:25:42'),
(465, 554, 2, '2023-05-01 16:25:43'),
(466, 555, 2, '2023-05-01 16:25:44'),
(467, 556, 2, '2023-05-01 16:25:45'),
(468, 557, 2, '2023-05-01 16:25:46'),
(469, 558, 2, '2023-05-01 16:25:48'),
(470, 559, 2, '2023-05-01 16:25:49'),
(471, 560, 2, '2023-05-01 16:25:50'),
(472, 561, 2, '2023-05-01 16:25:51'),
(473, 562, 2, '2023-05-01 16:25:52'),
(474, 569, 2, '2023-05-02 12:04:07'),
(475, 570, 2, '2023-05-02 12:19:51'),
(478, 579, 2, '2023-05-04 16:26:33'),
(479, 583, 2, '2023-05-05 13:41:27'),
(480, 573, 2, '2023-05-05 16:21:30'),
(481, 584, 2, '2023-05-07 15:01:56'),
(482, 586, 2, '2023-05-11 14:25:19'),
(483, 587, 2, '2023-05-12 13:41:03'),
(484, 583, 2, '2023-05-16 11:06:11'),
(485, 588, 2, '2023-05-16 11:10:22'),
(486, 583, 2, '2023-05-16 11:16:00'),
(487, 590, 2, '2023-05-17 13:37:39'),
(488, 591, 2, '2023-05-17 14:03:03'),
(489, 592, 2, '2023-05-17 17:44:00'),
(490, 593, 2, '2023-05-18 10:31:13'),
(491, 598, 2, '2023-05-18 14:23:51'),
(492, 599, 2, '2023-05-18 14:26:49'),
(493, 600, 2, '2023-05-18 14:33:25'),
(494, 601, 2, '2023-05-18 15:49:06'),
(495, 602, 2, '2023-05-18 15:51:24'),
(496, 603, 2, '2023-05-18 16:00:02'),
(497, 604, 2, '2023-05-18 17:49:20'),
(498, 594, 2, '2023-05-22 13:25:23'),
(499, 610, 2, '2023-06-01 16:47:58'),
(500, 611, 2, '2023-06-02 11:26:03'),
(501, 612, 2, '2023-06-02 12:02:36'),
(502, 613, 2, '2023-06-08 10:39:23'),
(503, 615, 2, '2023-06-19 15:52:51'),
(504, 617, 2, '2023-06-19 23:29:58'),
(505, 623, 1, '2023-06-25 14:45:15'),
(506, 622, 1, '2023-07-05 16:28:09'),
(507, 624, 1, '2023-07-05 16:36:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblconect`
--

DROP TABLE IF EXISTS `tblconect`;
CREATE TABLE IF NOT EXISTS `tblconect` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUserPed` int NOT NULL,
  `idUserReceb` int NOT NULL,
  `datapedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblconect`
--

INSERT INTO `tblconect` (`id`, `idUserPed`, `idUserReceb`, `datapedido`, `status`) VALUES
(4, 1, 1, '2023-08-22 01:45:58', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcontract`
--

DROP TABLE IF EXISTS `tblcontract`;
CREATE TABLE IF NOT EXISTS `tblcontract` (
  `idContract` int NOT NULL AUTO_INCREMENT,
  `IdContractType` int NOT NULL DEFAULT '1',
  `ContractText` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ContractFlagAtive` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idContract`),
  KEY `IdContractType` (`IdContractType`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblcontract`
--

INSERT INTO `tblcontract` (`idContract`, `IdContractType`, `ContractText`, `ContractFlagAtive`) VALUES
(1, 1, 'Ao utilizar os nossos Serviços, você concorda com todos estes termos. A sua utilização dos Serviços do MacthBusiness também está sujeita à nossa Política de Cookies e Política de Privacidade, que abrangem o modo como coletamos, utilizamos, compartilhamos e armazenamos suas informações.', b'1'),
(2, 1, 'We are a social networking platform for companies and professionals who want to connect with like-minded individuals. Our platform provides a space in a business ecosystem for users to match with others who share their interests and expertise.\r\nTo use our platform, our registered users (also referred to as ) must agree to share their professional identities with other Members. This allows Members with the same interest to engage, exchange knowledge and insights, post and view relevant content, and find business opportunities within our platform.\r\nWe understand the importance of keeping personal data private, and all data is securely stored until the user authorizes its sharing with other members. We take great care to protect your personal information from any misuse by other users that goes against the main purpose of our platform, which is to connect people with similar interests. Our platform is designed to match users based on shared interests, and we are committed to maintaining the privacy and security of our userspersonal data.\r\n</br>\r\nTo read our complete <a href=\"https://testes.matchingbusiness.online/privacyPolicyOut\" target=\"_blank\">Privacy Policy, please click here.</a>', b'1'),
(6, 2, 'This Privacy Policy outlines how we collect, use, and protect your personal information when you visit and interact with our website. We understand the importance of safeguarding your privacy and are committed to ensuring that your information is secure.\n\nInformation Collection and Use:\nWhen you visit our website, we may collect certain information about you, such as your name, email address, and browsing activity. This information is solely used to improve your experience on our website and to provide you with relevant content and services. We do not share or sell your personal information to third parties unless required by law or with your explicit consent.\n\nData Security:\nWe have implemented industry-standard security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction. However, please be awareThis Privacy Policy outlines how we collect, use, and protect your personal information when you visit and interact with our website. We understand the importance of safeguarding your privacy and are committed to ensuring that your information is secure.\n\n', b'0'),
(7, 3, '© 2023 LABD Business DevelopmentAll rights reserved.\n\"The content, design, and graphics on this website are protected by copyright law. Any unauthorized use, reproduction, or distribution is strictly prohibited.\"\n\n\"All trademarks, logos, and service marks displayed on this website are the property of their respective owners.\"\n\n\"This website may contain links to external websites. We are not responsible for the content or privacy practices of those sites.\"', b'0'),
(8, 4, 'We use cookies on our website to provide you with a more relevant experience. By clicking \"Accept\" or continuing to browse, you consent to the use of all cookies and the terms of use. Learn more in our privacy policies.', b'0'),
(11, 9, 'We use cookies on our website to provide you with a more relevant experience. By clicking \'Accept\' or continuing to browse, you consent to the use of all cookies and the terms of use. Learn more in our privacy policy.', b'0'),
(12, 10, 'We are a social networking platform for companies and professionals who want to connect with like-minded individuals. Our platform provides a space in a business ecosystem for users to match with others who share their interests and expertise.We are a social networking platform for companies and professionals who want to connect with like-minded individuals. Our platform provides a space in a business ecosystem for users to match with others who share their interests and expertise.', b'0'),
(14, 11, 'The international business landscape in the \'Old World vs. LATAM\' for medical device markets has undergone significant transformations in the past 10-15 years. Traditional business models, such as manufacturer-distributor, have been impacted by pricing pressures, margin protection, misalignment between manufacturer expectations and distributor needs, ineffective training programs, and a disconnect between the industry and its technical-demanding audience.', b'0'),
(15, 12, 'Our mission at MBO - Matching Business Online is to facilitate connections among professionals worldwide, empowering them to enhance their productivity and achieve success. Our range of services is designed to foster economic opportunities for our members, enabling them to network, exchange ideas, learn, discover business prospects, and make informed decisions within a network of trusted relationships.', b'0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcontracttypes`
--

DROP TABLE IF EXISTS `tblcontracttypes`;
CREATE TABLE IF NOT EXISTS `tblcontracttypes` (
  `IdContractType` int NOT NULL AUTO_INCREMENT,
  `ContractType` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ContractText` mediumtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`IdContractType`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblcontracttypes`
--

INSERT INTO `tblcontracttypes` (`IdContractType`, `ContractType`, `ContractText`) VALUES
(1, 'Contrato', NULL),
(2, 'Privacy Police', NULL),
(3, 'Copyright Policy', NULL),
(4, 'Cookie Policy', NULL),
(9, 'Cookie Message', NULL),
(10, 'Assinante', NULL),
(11, 'About', NULL),
(12, 'UserAgreement', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcountry`
--

DROP TABLE IF EXISTS `tblcountry`;
CREATE TABLE IF NOT EXISTS `tblcountry` (
  `idCountry` int NOT NULL AUTO_INCREMENT,
  `NmCountry` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Continent` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idCountry`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblcountry`
--

INSERT INTO `tblcountry` (`idCountry`, `NmCountry`, `Continent`) VALUES
(360, 'Afghanistan', NULL),
(361, 'Albania', NULL),
(362, 'Algeria', NULL),
(363, 'American Samoa', NULL),
(364, 'Andorra', NULL),
(365, 'Angola', NULL),
(366, 'Argentina', NULL),
(367, 'Armenia', NULL),
(368, 'Australia', NULL),
(369, 'Austria', NULL),
(370, 'Azerbaijan', NULL),
(371, 'Bahamas', NULL),
(372, 'Bahrain', NULL),
(373, 'Bangladesh', NULL),
(374, 'Barbados', NULL),
(375, 'Belarus', NULL),
(376, 'Belgium', NULL),
(377, 'Belize', NULL),
(378, 'Benin', NULL),
(379, 'Bermuda', NULL),
(380, 'Bhutan', NULL),
(381, 'Bolivia', NULL),
(382, 'Bosnia And Herzegovina', NULL),
(383, 'Botswana', NULL),
(384, 'Brazil', NULL),
(385, 'Bulgaria', NULL),
(386, 'Burkina Faso', NULL),
(387, 'Burundi', NULL),
(388, 'Cambodia', NULL),
(389, 'Cameroon', NULL),
(390, 'Canada', NULL),
(391, 'Cape Verde Islands', NULL),
(392, 'Chad', NULL),
(393, 'Chile', NULL),
(394, 'China', NULL),
(395, 'Colombia', NULL),
(396, 'Congo', NULL),
(397, 'Costa Rica', NULL),
(398, 'Croatia', NULL),
(399, 'Cuba', NULL),
(400, 'Cyprus', NULL),
(401, 'Czech Republic', NULL),
(402, 'Denmark', NULL),
(403, 'Djibouti', NULL),
(404, 'Dominica', NULL),
(405, 'Dominican Republic', NULL),
(406, 'Ecuador', NULL),
(407, 'Egypt', NULL),
(408, 'El Salvador', NULL),
(409, 'Eritrea', NULL),
(410, 'Estonia', NULL),
(411, 'Ethiopia', NULL),
(412, 'Fiji', NULL),
(413, 'Finland', NULL),
(414, 'France', NULL),
(415, 'French Polynesia', NULL),
(416, 'Gabon', NULL),
(417, 'Gambia', NULL),
(418, 'Georgia', NULL),
(419, 'Germany', NULL),
(420, 'Ghana', NULL),
(421, 'Greece', NULL),
(422, 'Grenada', NULL),
(423, 'Guatemala', NULL),
(424, 'Guinea', NULL),
(425, 'Guyana', NULL),
(426, 'Haiti', NULL),
(427, 'Honduras', NULL),
(428, 'Hungary', NULL),
(429, 'Iceland', NULL),
(430, 'India', NULL),
(431, 'Indonesia', NULL),
(432, 'Iran', NULL),
(433, 'Iraq', NULL),
(434, 'Ireland', NULL),
(435, 'Israel', NULL),
(436, 'Italy', NULL),
(437, 'Jamaica', NULL),
(438, 'Japan', NULL),
(439, 'Jordan', NULL),
(440, 'Kazakhstan', NULL),
(441, 'Kenya', NULL),
(442, 'Korea', NULL),
(443, 'Korea', NULL),
(444, 'Kuwait', NULL),
(445, 'Latvia', NULL),
(446, 'Lebanon', NULL),
(447, 'Liberia', NULL),
(448, 'Libya', NULL),
(449, 'Lithuania', NULL),
(450, 'Luxembourg', NULL),
(451, 'Madagascar', NULL),
(452, 'Malawi', NULL),
(453, 'Malaysia', NULL),
(454, 'Maldives', NULL),
(455, 'Mali', NULL),
(456, 'Malta', NULL),
(457, 'Mauritania', NULL),
(458, 'Mauritius', NULL),
(459, 'Mexico', NULL),
(460, 'Monaco', NULL),
(461, 'Mongolia', NULL),
(462, 'Montenegro', NULL),
(463, 'Morocco', NULL),
(464, 'Mozambique', NULL),
(465, 'Namibia', NULL),
(466, 'Nepal', NULL),
(467, 'Netherlands', NULL),
(468, 'New Zealand', NULL),
(469, 'Nicaragua', NULL),
(470, 'Niger', NULL),
(471, 'Nigeria', NULL),
(472, 'Norway', NULL),
(473, 'Oman', NULL),
(474, 'Pakistan', NULL),
(475, 'Panama', NULL),
(476, 'Papua New Guinea', NULL),
(477, 'Paraguay', NULL),
(478, 'Peru', NULL),
(479, 'Philippines', NULL),
(480, 'Poland', NULL),
(481, 'Portugal', NULL),
(482, 'Qatar', NULL),
(483, 'Romania', NULL),
(484, 'Rwanda', NULL),
(485, 'Saudi Arabia', NULL),
(486, 'Senegal', NULL),
(487, 'Serbia', NULL),
(488, 'Sierra Leone', NULL),
(489, 'Singapore', NULL),
(490, 'Slovakia', NULL),
(491, 'Slovenia', NULL),
(492, 'Solomon Islands', NULL),
(493, 'Somalia', NULL),
(494, 'South Africa', NULL),
(495, 'Spain', NULL),
(496, 'Sri Lanka', NULL),
(497, 'Sudan', NULL),
(498, 'Suriname', NULL),
(499, 'Swaziland', NULL),
(500, 'Sweden', NULL),
(501, 'Switzerland', NULL),
(502, 'Taiwan', NULL),
(503, 'Tajikistan', NULL),
(504, 'Thailand', NULL),
(505, 'Togo', NULL),
(506, 'Trinidad And Tobago', NULL),
(507, 'Tunisia', NULL),
(508, 'Turkey', NULL),
(509, 'Turkmenistan', NULL),
(510, 'Tuvalu', NULL),
(511, 'Uganda', NULL),
(512, 'Ukraine', NULL),
(513, 'United Arab Emirates', NULL),
(514, 'United Kingdom', NULL),
(515, 'United States', NULL),
(516, 'Uruguay', NULL),
(517, 'Uzbekistan', NULL),
(518, 'Vanuatu', NULL),
(519, 'Venezuela', NULL),
(520, 'Viet Nam', NULL),
(521, 'Yemen', NULL),
(522, 'Zambia', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcustomer`
--

DROP TABLE IF EXISTS `tblcustomer`;
CREATE TABLE IF NOT EXISTS `tblcustomer` (
  `IdCustomer` int NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `CustomerObs` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IdCustomer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblcustomer`
--

INSERT INTO `tblcustomer` (`IdCustomer`, `CustomerName`, `CustomerObs`) VALUES
(1, 'BIOCOMPRESSION', NULL),
(2, 'KESTAL', NULL),
(3, 'KONTOUR', NULL),
(4, 'MEDIPLUS', NULL),
(5, 'PHIMED', NULL),
(6, 'SPINEGUARD', NULL),
(7, 'XNY', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfeeds`
--

DROP TABLE IF EXISTS `tblfeeds`;
CREATE TABLE IF NOT EXISTS `tblfeeds` (
  `IdFeed` int NOT NULL AUTO_INCREMENT,
  `IdClient` int NOT NULL,
  `Published_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Image` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Video` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IdFeed`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblfeeds`
--

INSERT INTO `tblfeeds` (`IdFeed`, `IdClient`, `Published_at`, `Title`, `Text`, `Image`, `Video`) VALUES
(72, 617, '2023-07-20 04:44:16', '384', 'Teste', '../../../assets/img/feed/617/Post_617_2023-07-20044416.jpeg', NULL),
(73, 1, '2023-07-27 15:27:53', '384', 'asdasdasdasdasd', '../../../assets/img/feed/1/Post_1_2023-07-27152753.jpeg', NULL),
(74, 617, '2023-07-20 04:44:16', '384', 'Teste', '../../../assets/img/feed/617/Post_617_2023-07-20044416.jpeg', NULL),
(75, 1, '2023-07-27 15:27:53', '384', 'asdasdasdasdasd', '../../../assets/img/feed/1/Post_1_2023-07-27152753.jpeg', NULL),
(76, 617, '2023-07-20 04:44:16', '384', 'Teste', '../../../assets/img/feed/617/Post_617_2023-07-20044416.jpeg', NULL),
(77, 1, '2023-07-27 15:27:53', '384', 'asdasdasdasdasd', '../../../assets/img/feed/1/Post_1_2023-07-27152753.jpeg', NULL),
(78, 617, '2023-07-20 04:44:16', '384', 'Teste', '../../../assets/img/feed/617/Post_617_2023-07-20044416.jpeg', NULL),
(79, 1, '2023-07-27 15:27:53', '384', 'asdasdasdasdasd', '../../../assets/img/feed/1/Post_1_2023-07-27152753.jpeg', NULL),
(80, 1, '2023-08-31 13:13:16', 'tttttttttttttttttttttttttttttttt', 'tttttttttttttttttttttttttttttttt', '', ''),
(81, 1, '2023-08-31 13:13:17', 'tttttttttttttttttttttttttttttttt', 'tttttttttttttttttttttttttttttttt', '', ''),
(82, 1, '2023-08-31 13:15:31', 'teste', 'teste', '', ''),
(83, 1, '2023-08-31 13:15:32', 'teste', 'teste', '', ''),
(84, 1, '2023-08-31 13:16:33', '', '', 'assets/img/feed/1/Post_1_2023-08-31131633.jpeg', ''),
(85, 1, '2023-08-31 13:16:33', '', '', 'assets/img/feed/1/Post_1_2023-08-31131633.jpeg', ''),
(86, 1, '2023-08-31 13:22:25', '', '', 'assets/img/feed/1/Post_1_2023-08-31132225.jpeg', ''),
(87, 1, '2023-08-31 13:22:25', '', '', 'assets/img/feed/1/Post_1_2023-08-31132225.jpeg', ''),
(88, 1, '2023-08-31 13:27:10', '', '', 'assets/img/feed/1/Post_1_2023-08-31132709.jpeg', ''),
(89, 1, '2023-08-31 13:27:10', '', '', 'assets/img/feed/1/Post_1_2023-08-31132709.jpeg', ''),
(90, 1, '2023-08-31 13:32:38', '', '', 'assets/img/feed/1/Post_1_2023-08-31133238.jpeg', ''),
(91, 1, '2023-08-31 13:32:39', '', '', 'assets/img/feed/1/Post_1_2023-08-31133238.jpeg', ''),
(92, 1, '2023-08-31 13:33:10', '', '', 'assets/img/feed/1/Post_1_2023-08-31133309.jpg', ''),
(93, 1, '2023-08-31 13:33:10', '', '', 'assets/img/feed/1/Post_1_2023-08-31133309.jpg', ''),
(94, 1, '2023-08-31 13:36:43', '', '', '', ''),
(95, 1, '2023-08-31 13:36:43', '', '', '', ''),
(96, 1, '2023-08-31 13:37:59', '', '', '', ''),
(97, 1, '2023-08-31 13:37:59', '', '', '', ''),
(98, 1, '2023-09-01 13:07:04', 'asdasdsad', 'asdasdsad', '', ''),
(99, 1, '2023-09-01 13:07:04', 'asdasdsad', 'asdasdsad', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblflagstatuscadastro`
--

DROP TABLE IF EXISTS `tblflagstatuscadastro`;
CREATE TABLE IF NOT EXISTS `tblflagstatuscadastro` (
  `idFlagStatusCadastro` int NOT NULL AUTO_INCREMENT,
  `NmFlagStatusCadastro` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Contexto` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idFlagStatusCadastro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblflagstatuscadastro`
--

INSERT INTO `tblflagstatuscadastro` (`idFlagStatusCadastro`, `NmFlagStatusCadastro`, `Contexto`) VALUES
(1, 'OK ', 'CADASTRO BÁSICO'),
(2, 'NOK', 'PRÉ- CADASTRO BÁSICO'),
(3, 'NOK', 'CADASTRO QUALIFICAÇÂO'),
(4, 'OK', 'CADASTRO QUALIFICAÇÃO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblhelp`
--

DROP TABLE IF EXISTS `tblhelp`;
CREATE TABLE IF NOT EXISTS `tblhelp` (
  `idHelp` int NOT NULL AUTO_INCREMENT,
  `IdCodLocal` int NOT NULL,
  `HelpText` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idHelp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogaction`
--

DROP TABLE IF EXISTS `tbllogaction`;
CREATE TABLE IF NOT EXISTS `tbllogaction` (
  `idLogAction` int NOT NULL AUTO_INCREMENT,
  `DescLogAction` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idLogAction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogactivity`
--

DROP TABLE IF EXISTS `tbllogactivity`;
CREATE TABLE IF NOT EXISTS `tbllogactivity` (
  `idLogActivity` int NOT NULL AUTO_INCREMENT,
  `IdModule` int NOT NULL,
  `idClient` int NOT NULL,
  `idLogAction` int NOT NULL,
  `LogDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LogAuxText` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`idLogActivity`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbllogactivity`
--

INSERT INTO `tbllogactivity` (`idLogActivity`, `IdModule`, `idClient`, `idLogAction`, `LogDate`, `LogAuxText`) VALUES
(139, 39, 2, 0, '2023-06-30 16:25:21', 'INSERT INTO tblSearchProfile_Results ( SearchProfileNameId, idClient_Founded, idClient_DateFounded, ResultsID_StatusMatch)  SELECT distinct 39 as SearchProfileID, vw.IdClient_Founded, NOW(),  0 from vw_SP_AllClients vw WHERE ( idOperation = 2 ) AND ( idBusiness = 1 ) AND ( IdBusinessCategory = 36) AND vw.idClient_Founded <> 2 AND NOT (SELECT COUNT(idClient_Founded)\n																 FROM tblSearchProfile_Results \n																WHERE SearchProfileNameId = 39 AND \n																	  idClient_Founded    = vw.idClient_Founded ) > 0 ;'),
(140, 40, 2, 0, '2023-06-30 16:25:21', 'INSERT INTO tblSearchProfile_Results ( SearchProfileNameId, idClient_Founded, idClient_DateFounded, ResultsID_StatusMatch)  SELECT distinct 40 as SearchProfileID, vw.IdClient_Founded, NOW(),  0 from vw_SP_AllClients vw WHERE ( idOperation = 2) AND vw.idClient_Founded <> 2 AND NOT (SELECT COUNT(idClient_Founded)\n																 FROM tblSearchProfile_Results \n																WHERE SearchProfileNameId = 40 AND \n																	  idClient_Founded    = vw.idClient_Founded ) > 0 ;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogerror`
--

DROP TABLE IF EXISTS `tbllogerror`;
CREATE TABLE IF NOT EXISTS `tbllogerror` (
  `idLogError` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `IdModule` int NOT NULL,
  `IdError` int NOT NULL,
  `ErrorDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ErrAuxMsg` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`idLogError`),
  KEY `IdError` (`IdError`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogerrorcode`
--

DROP TABLE IF EXISTS `tbllogerrorcode`;
CREATE TABLE IF NOT EXISTS `tbllogerrorcode` (
  `idLogErrorCode` int NOT NULL AUTO_INCREMENT,
  `DescLogError` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idLogErrorCode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbllogerrorcode`
--

INSERT INTO `tbllogerrorcode` (`idLogErrorCode`, `DescLogError`) VALUES
(1, 'ERRO GENÉRICO'),
(2, 'ERRO NA EXECUÇÃO DA SP_MOTORSEARCHPROFILEALL'),
(3, 'ERRO NA EXECUÇÃO DA SP_SEARCHPROFILE_USERID');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbllogmodules`
--

DROP TABLE IF EXISTS `tbllogmodules`;
CREATE TABLE IF NOT EXISTS `tbllogmodules` (
  `idLogModules` int NOT NULL AUTO_INCREMENT,
  `DescLogModule` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idLogModules`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmatch`
--

DROP TABLE IF EXISTS `tblmatch`;
CREATE TABLE IF NOT EXISTS `tblmatch` (
  `IdMatch` int NOT NULL AUTO_INCREMENT,
  `IdClientSource` int NOT NULL,
  `IdClientMatched` int NOT NULL,
  `MatchStatus` int NOT NULL COMMENT 'ok (1)  / nok (0)\n',
  `SearchProfileNameId` int DEFAULT NULL,
  `DateOfSearchProfileMacth` datetime DEFAULT NULL,
  `idRespSPid` int DEFAULT NULL COMMENT '1	Waiting\n2	Acepeted\n3	Deinied\n4              Founded',
  `TextOfInvite` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `DateOfInvite` datetime DEFAULT NULL,
  `idRespInviteId` int DEFAULT NULL COMMENT '1	Waiting\n2	Acepeted\n3	Deinied',
  `DateOfResponse` datetime DEFAULT NULL,
  `ChatId` int DEFAULT NULL,
  `DateVisualization` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IdMatch`)
) ENGINE=InnoDB AUTO_INCREMENT=365 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblmatch`
--

INSERT INTO `tblmatch` (`IdMatch`, `IdClientSource`, `IdClientMatched`, `MatchStatus`, `SearchProfileNameId`, `DateOfSearchProfileMacth`, `idRespSPid`, `TextOfInvite`, `DateOfInvite`, `idRespInviteId`, `DateOfResponse`, `ChatId`, `DateVisualization`) VALUES
(295, 2, 584, 2, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, 2, 587, 2, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, 2, 590, 2, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, 2, 602, 2, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, 2, 1, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, 2, 292, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 2, 293, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 2, 294, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 2, 295, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 2, 296, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 2, 297, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 2, 298, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 2, 299, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 2, 300, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 2, 301, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 2, 302, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 2, 303, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 2, 304, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(316, 2, 305, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(317, 2, 306, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 2, 307, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 2, 308, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(320, 2, 309, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 2, 310, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(322, 2, 311, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 2, 312, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(324, 2, 313, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(325, 2, 314, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(326, 2, 315, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(327, 2, 316, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 2, 317, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(329, 2, 318, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(330, 2, 319, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(331, 2, 320, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(332, 2, 321, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(333, 2, 322, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(334, 2, 323, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(335, 2, 324, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(336, 2, 325, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(337, 2, 326, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(338, 2, 327, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(339, 2, 328, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 2, 329, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(341, 2, 573, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(342, 2, 579, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(343, 2, 584, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(344, 2, 587, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 2, 590, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(346, 2, 591, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(347, 2, 600, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, 2, 601, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(349, 2, 602, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(350, 2, 603, 2, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmatchstatusid`
--

DROP TABLE IF EXISTS `tblmatchstatusid`;
CREATE TABLE IF NOT EXISTS `tblmatchstatusid` (
  `MatchStatusId` int NOT NULL AUTO_INCREMENT,
  `MatchStatusDesc` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MatchStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblmatchstatusid`
--

INSERT INTO `tblmatchstatusid` (`MatchStatusId`, `MatchStatusDesc`) VALUES
(1, 'Matched'),
(2, 'Founded'),
(3, 'Invited'),
(4, 'Viewed');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmessage_results`
--

DROP TABLE IF EXISTS `tblmessage_results`;
CREATE TABLE IF NOT EXISTS `tblmessage_results` (
  `MessageID` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `idClient_Sender` int NOT NULL,
  `Message Text` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MessageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='										';

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblniveloperacao`
--

DROP TABLE IF EXISTS `tblniveloperacao`;
CREATE TABLE IF NOT EXISTS `tblniveloperacao` (
  `idNivelOperacao` int NOT NULL AUTO_INCREMENT,
  `DescNivelOperacao` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idNivelOperacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblniveloperacao`
--

INSERT INTO `tblniveloperacao` (`idNivelOperacao`, `DescNivelOperacao`) VALUES
(1, 'Global'),
(2, 'National Wide');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnotificationstypes`
--

DROP TABLE IF EXISTS `tblnotificationstypes`;
CREATE TABLE IF NOT EXISTS `tblnotificationstypes` (
  `idTypeNotifcation` int NOT NULL AUTO_INCREMENT,
  `textNotifcation` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `iconNotifcation` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `descricaoType` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idTypeNotifcation`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblnotificationstypes`
--

INSERT INTO `tblnotificationstypes` (`idTypeNotifcation`, `textNotifcation`, `iconNotifcation`, `descricaoType`) VALUES
(1, 'Profile Found', 'notf.jpeg', 'Quando um perfil é encontrado no motor de busca'),
(2, 'Your profile has been viewed by the user', 'notf.jpeg', 'Quando alguém visualiza o perfil'),
(3, 'You received a message', 'notf.jpeg', 'Quando um user receber mensagem'),
(4, 'You have been inveited', 'notf.jpeg', 'Quando alguém convida para ser match'),
(5, 'Curtiu sua Publicação', 'fav', 'Quando alguem curte seu post'),
(6, 'accepted your connection', 'notf.jpeg', 'quando aceita a conexão'),
(7, 'coments', 'nav', 'comentou em seu post');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnumempregados`
--

DROP TABLE IF EXISTS `tblnumempregados`;
CREATE TABLE IF NOT EXISTS `tblnumempregados` (
  `idNumEmpregados` int NOT NULL AUTO_INCREMENT,
  `ValorInicial` int DEFAULT NULL,
  `Valor Final` int DEFAULT NULL,
  `DescNumEmpregados` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idNumEmpregados`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblnumempregados`
--

INSERT INTO `tblnumempregados` (`idNumEmpregados`, `ValorInicial`, `Valor Final`, `DescNumEmpregados`) VALUES
(1, 0, 50, 'up to  50'),
(2, 51, 100, '51 - 100'),
(3, 101, 500, '101 - 500'),
(4, 501, 999999999, 'more than 500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbloperations`
--

DROP TABLE IF EXISTS `tbloperations`;
CREATE TABLE IF NOT EXISTS `tbloperations` (
  `idOperation` int NOT NULL AUTO_INCREMENT,
  `NmOperation` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `FlagOperation` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idOperation`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbloperations`
--

INSERT INTO `tbloperations` (`idOperation`, `NmOperation`, `FlagOperation`) VALUES
(1, 'To Be Defined', '0'),
(2, 'Manufacturer', 'A'),
(3, 'Master Distributor', 'B'),
(4, 'Sub Distributor', 'B'),
(5, 'Row Material Supplier', 'C'),
(6, 'Regulatory Agent', 'D'),
(7, 'Infrastructure & Assets', 'D'),
(8, 'Laboratory Services', 'D'),
(9, 'IT Provider', 'D'),
(10, 'Associations, Institutions, Societies', 'D'),
(11, 'Consultancy, Reports, Analysis', 'D'),
(12, 'Contract Manufacturing', 'D'),
(13, 'Department Management (Laboratory, Pharmacy, Finance etc)', 'D'),
(14, 'Education, Training, Quality Management', 'D'),
(15, 'Facilities Management', 'D'),
(16, 'Finance, Investment', 'D'),
(17, 'Healthcare Authorities', 'D'),
(18, 'Healthcare Providers, Hospitals, Clinics, Public, Private', 'D'),
(19, 'HR, Recruitment', 'D'),
(20, 'Insurance, Compliance', 'D'),
(21, 'Logistics, Supply Chain Management', 'D'),
(22, 'Publications, Marketing, Advertising, Communications', 'D'),
(23, 'CRO', 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblproductpictures`
--

DROP TABLE IF EXISTS `tblproductpictures`;
CREATE TABLE IF NOT EXISTS `tblproductpictures` (
  `idProductPicture` int NOT NULL AUTO_INCREMENT,
  `idProduct` int NOT NULL,
  `tblProductPicturePath` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idProductPicture`),
  KEY `idProduct` (`idProduct`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblproductpictures`
--

INSERT INTO `tblproductpictures` (`idProductPicture`, `idProduct`, `tblProductPicturePath`) VALUES
(9, 1, 'assets/img/1/Produto_1_1.png'),
(10, 2, 'assets/img/1/Produto_2_1.png'),
(11, 3, 'assets/img/1/Produto_3_1.png'),
(12, 4, 'assets/img/1/Produto_4_1.png'),
(13, 5, 'assets/img/2/Produto_5_2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `idProduct` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `idBusinessCategory` int NOT NULL,
  `ProductName` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ProdcuctDescription` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ProdcuctEspecification` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `flagExcluido` int NOT NULL DEFAULT '0',
  `Category` int DEFAULT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `idBusinessCategory` (`idBusinessCategory`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblproducts`
--

INSERT INTO `tblproducts` (`idProduct`, `idClient`, `idBusinessCategory`, `ProductName`, `ProdcuctDescription`, `ProdcuctEspecification`, `flagExcluido`, `Category`) VALUES
(6, 1, 3, 'Luvas', 'São Luvas', 'Luvas, Mãos', 0, 3),
(7, 1, 3, 'Ciringa', 'São Ciringa', 'Luvas, Mãos', 0, 3),
(8, 1, 3, 'Eletro', 'São Ciringa', 'Luvas, Mãos', 0, 3),
(9, 1, 3, 'Cardio', 'São Ciringa', 'Luvas, Mãos', 0, 3),
(10, 1, 3, 'Pulso', 'São Ciringa', 'Luvas, Mãos', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblqualificationcb`
--

DROP TABLE IF EXISTS `tblqualificationcb`;
CREATE TABLE IF NOT EXISTS `tblqualificationcb` (
  `idQualificationCB` int NOT NULL AUTO_INCREMENT,
  `IdClient` int NOT NULL,
  `IdBusinessCategory` int NOT NULL,
  `FlagDeletado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '0',
  `FlagSB` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '0',
  PRIMARY KEY (`idQualificationCB`),
  KEY `IdClient` (`IdClient`),
  KEY `IdBusinessCategory` (`IdBusinessCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=946 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblqualificationcb`
--

INSERT INTO `tblqualificationcb` (`idQualificationCB`, `IdClient`, `IdBusinessCategory`, `FlagDeletado`, `FlagSB`) VALUES
(311, 213, 351, '0', '0'),
(312, 213, 354, '0', '0'),
(314, 214, 351, '0', '0'),
(315, 214, 354, '0', '0'),
(317, 215, 351, '0', '0'),
(318, 215, 354, '0', '0'),
(320, 216, 351, '0', '0'),
(321, 216, 354, '0', '0'),
(323, 217, 351, '0', '0'),
(324, 217, 354, '0', '0'),
(326, 218, 351, '0', '0'),
(327, 218, 354, '0', '0'),
(329, 219, 351, '0', '0'),
(330, 219, 354, '0', '0'),
(332, 220, 351, '0', '0'),
(333, 220, 354, '0', '0'),
(335, 221, 351, '0', '0'),
(336, 221, 354, '0', '0'),
(338, 222, 1, '0', '0'),
(339, 223, 1, '0', '0'),
(340, 224, 1, '0', '0'),
(341, 225, 1, '0', '0'),
(342, 226, 1, '0', '0'),
(343, 227, 1, '0', '0'),
(344, 228, 1, '0', '0'),
(345, 229, 1, '0', '0'),
(346, 230, 1, '0', '0'),
(347, 231, 1, '0', '0'),
(348, 232, 1, '0', '0'),
(349, 233, 1, '0', '0'),
(350, 234, 1, '0', '0'),
(351, 235, 1, '0', '0'),
(352, 236, 1, '0', '0'),
(353, 237, 1, '0', '0'),
(354, 238, 1, '0', '0'),
(355, 239, 1, '0', '0'),
(356, 240, 359, '0', '0'),
(357, 241, 359, '0', '0'),
(358, 242, 359, '0', '0'),
(359, 243, 359, '0', '0'),
(360, 244, 359, '0', '0'),
(361, 245, 359, '0', '0'),
(362, 246, 359, '0', '0'),
(363, 247, 359, '0', '0'),
(364, 248, 359, '0', '0'),
(365, 249, 335, '0', '0'),
(366, 249, 341, '0', '0'),
(368, 250, 335, '0', '0'),
(369, 250, 341, '0', '0'),
(371, 251, 335, '0', '0'),
(372, 251, 341, '0', '0'),
(374, 252, 335, '0', '0'),
(375, 252, 341, '0', '0'),
(377, 253, 335, '0', '0'),
(378, 253, 341, '0', '0'),
(380, 254, 335, '0', '0'),
(381, 254, 341, '0', '0'),
(383, 255, 335, '0', '0'),
(384, 255, 341, '0', '0'),
(386, 256, 335, '0', '0'),
(387, 256, 341, '0', '0'),
(389, 257, 335, '0', '0'),
(390, 257, 341, '0', '0'),
(392, 258, 335, '0', '0'),
(393, 258, 341, '0', '0'),
(395, 259, 335, '0', '0'),
(396, 259, 341, '0', '0'),
(398, 260, 335, '0', '0'),
(399, 260, 341, '0', '0'),
(401, 261, 335, '0', '0'),
(402, 261, 341, '0', '0'),
(404, 262, 335, '0', '0'),
(405, 262, 341, '0', '0'),
(407, 263, 335, '0', '0'),
(408, 263, 341, '0', '0'),
(410, 264, 335, '0', '0'),
(411, 264, 341, '0', '0'),
(413, 265, 335, '0', '0'),
(414, 265, 341, '0', '0'),
(416, 266, 335, '0', '0'),
(417, 266, 341, '0', '0'),
(419, 267, 335, '0', '0'),
(420, 267, 341, '0', '0'),
(422, 268, 335, '0', '0'),
(423, 268, 341, '0', '0'),
(425, 269, 335, '0', '0'),
(426, 269, 341, '0', '0'),
(428, 270, 335, '0', '0'),
(429, 270, 341, '0', '0'),
(431, 271, 335, '0', '0'),
(432, 271, 341, '0', '0'),
(434, 272, 335, '0', '0'),
(435, 272, 341, '0', '0'),
(437, 273, 335, '0', '0'),
(438, 273, 341, '0', '0'),
(440, 274, 335, '0', '0'),
(441, 274, 341, '0', '0'),
(443, 275, 335, '0', '0'),
(444, 275, 341, '0', '0'),
(446, 276, 335, '0', '0'),
(447, 276, 341, '0', '0'),
(449, 277, 335, '0', '0'),
(450, 277, 341, '0', '0'),
(452, 278, 335, '0', '0'),
(453, 278, 341, '0', '0'),
(455, 279, 335, '0', '0'),
(456, 279, 341, '0', '0'),
(458, 280, 335, '0', '0'),
(459, 280, 341, '0', '0'),
(461, 281, 335, '0', '0'),
(462, 281, 341, '0', '0'),
(464, 282, 335, '0', '0'),
(465, 282, 341, '0', '0'),
(467, 283, 335, '0', '0'),
(468, 283, 341, '0', '0'),
(470, 284, 335, '0', '0'),
(471, 284, 341, '0', '0'),
(473, 285, 335, '0', '0'),
(474, 285, 341, '0', '0'),
(476, 286, 335, '0', '0'),
(477, 286, 341, '0', '0'),
(479, 287, 335, '0', '0'),
(480, 287, 341, '0', '0'),
(482, 288, 335, '0', '0'),
(483, 288, 341, '0', '0'),
(485, 289, 335, '0', '0'),
(486, 289, 341, '0', '0'),
(488, 290, 335, '0', '0'),
(489, 290, 341, '0', '0'),
(491, 291, 335, '0', '0'),
(492, 291, 341, '0', '0'),
(494, 292, 359, '0', '0'),
(495, 293, 359, '0', '0'),
(496, 294, 359, '0', '0'),
(497, 295, 359, '0', '0'),
(498, 296, 359, '0', '0'),
(499, 297, 359, '0', '0'),
(500, 298, 359, '0', '0'),
(501, 299, 359, '0', '0'),
(502, 300, 359, '0', '0'),
(503, 301, 286, '0', '0'),
(504, 301, 311, '0', '0'),
(505, 301, 329, '0', '0'),
(506, 302, 286, '0', '0'),
(507, 302, 311, '0', '0'),
(508, 302, 329, '0', '0'),
(509, 303, 286, '0', '0'),
(510, 303, 311, '0', '0'),
(511, 303, 329, '0', '0'),
(512, 304, 286, '0', '0'),
(513, 304, 311, '0', '0'),
(514, 304, 329, '0', '0'),
(515, 305, 286, '0', '0'),
(516, 305, 311, '0', '0'),
(517, 305, 329, '0', '0'),
(518, 306, 286, '0', '0'),
(519, 306, 311, '0', '0'),
(520, 306, 329, '0', '0'),
(521, 307, 286, '0', '0'),
(522, 307, 311, '0', '0'),
(523, 307, 329, '0', '0'),
(524, 308, 286, '0', '0'),
(525, 308, 311, '0', '0'),
(526, 308, 329, '0', '0'),
(527, 309, 286, '0', '0'),
(528, 309, 311, '0', '0'),
(529, 309, 329, '0', '0'),
(530, 310, 286, '0', '0'),
(531, 310, 311, '0', '0'),
(532, 310, 329, '0', '0'),
(533, 311, 286, '0', '0'),
(534, 311, 311, '0', '0'),
(535, 311, 329, '0', '0'),
(536, 312, 286, '0', '0'),
(537, 312, 311, '0', '0'),
(538, 312, 329, '0', '0'),
(539, 313, 286, '0', '0'),
(540, 313, 311, '0', '0'),
(541, 313, 329, '0', '0'),
(542, 314, 286, '0', '0'),
(543, 314, 311, '0', '0'),
(544, 314, 329, '0', '0'),
(545, 315, 286, '0', '0'),
(546, 315, 311, '0', '0'),
(547, 315, 329, '0', '0'),
(548, 316, 286, '0', '0'),
(549, 316, 311, '0', '0'),
(550, 316, 329, '0', '0'),
(551, 317, 286, '0', '0'),
(552, 317, 311, '0', '0'),
(553, 317, 329, '0', '0'),
(554, 318, 286, '0', '0'),
(555, 318, 311, '0', '0'),
(556, 318, 329, '0', '0'),
(557, 319, 286, '0', '0'),
(558, 319, 311, '0', '0'),
(559, 319, 329, '0', '0'),
(560, 320, 286, '0', '0'),
(561, 320, 311, '0', '0'),
(562, 320, 329, '0', '0'),
(563, 321, 286, '0', '0'),
(564, 321, 311, '0', '0'),
(565, 321, 329, '0', '0'),
(566, 322, 286, '0', '0'),
(567, 322, 311, '0', '0'),
(568, 322, 329, '0', '0'),
(569, 323, 286, '0', '0'),
(570, 323, 311, '0', '0'),
(571, 323, 329, '0', '0'),
(572, 324, 286, '0', '0'),
(573, 324, 311, '0', '0'),
(574, 324, 329, '0', '0'),
(575, 325, 286, '0', '0'),
(576, 325, 311, '0', '0'),
(577, 325, 329, '0', '0'),
(578, 326, 286, '0', '0'),
(579, 326, 311, '0', '0'),
(580, 326, 329, '0', '0'),
(581, 327, 286, '0', '0'),
(582, 327, 311, '0', '0'),
(583, 327, 329, '0', '0'),
(584, 328, 286, '0', '0'),
(585, 328, 311, '0', '0'),
(586, 328, 329, '0', '0'),
(587, 329, 286, '0', '0'),
(588, 329, 311, '0', '0'),
(589, 329, 329, '0', '0'),
(590, 330, 24, '0', '0'),
(591, 331, 24, '0', '0'),
(592, 332, 24, '0', '0'),
(593, 333, 24, '0', '0'),
(594, 334, 24, '0', '0'),
(595, 335, 24, '0', '0'),
(596, 336, 24, '0', '0'),
(597, 337, 24, '0', '0'),
(598, 338, 24, '0', '0'),
(599, 339, 24, '0', '0'),
(600, 340, 24, '0', '0'),
(601, 341, 24, '0', '0'),
(602, 342, 24, '0', '0'),
(603, 343, 24, '0', '0'),
(604, 344, 24, '0', '0'),
(605, 345, 24, '0', '0'),
(606, 346, 24, '0', '0'),
(607, 347, 24, '0', '0'),
(608, 348, 24, '0', '0'),
(609, 349, 24, '0', '0'),
(610, 350, 24, '0', '0'),
(611, 351, 24, '0', '0'),
(612, 352, 24, '0', '0'),
(613, 353, 24, '0', '0'),
(614, 354, 24, '0', '0'),
(615, 355, 24, '0', '0'),
(616, 356, 24, '0', '0'),
(617, 357, 24, '0', '0'),
(618, 358, 24, '0', '0'),
(619, 359, 14, '0', '0'),
(620, 360, 14, '0', '0'),
(621, 361, 14, '0', '0'),
(622, 362, 14, '0', '0'),
(623, 363, 14, '0', '0'),
(624, 364, 14, '0', '0'),
(625, 365, 14, '0', '0'),
(626, 366, 14, '0', '0'),
(627, 367, 14, '0', '0'),
(628, 368, 14, '0', '0'),
(629, 369, 14, '0', '0'),
(630, 370, 14, '0', '0'),
(631, 371, 14, '0', '0'),
(632, 372, 14, '0', '0'),
(633, 373, 27, '0', '0'),
(634, 374, 27, '0', '0'),
(635, 375, 27, '0', '0'),
(636, 376, 27, '0', '0'),
(637, 377, 27, '0', '0'),
(638, 378, 27, '0', '0'),
(639, 379, 27, '0', '0'),
(640, 380, 27, '0', '0'),
(641, 381, 27, '0', '0'),
(642, 382, 27, '0', '0'),
(643, 383, 27, '0', '0'),
(644, 384, 27, '0', '0'),
(645, 385, 27, '0', '0'),
(646, 386, 27, '0', '0'),
(647, 387, 26, '0', '0'),
(648, 388, 26, '0', '0'),
(649, 389, 26, '0', '0'),
(650, 390, 26, '0', '0'),
(651, 391, 26, '0', '0'),
(652, 392, 26, '0', '0'),
(653, 393, 26, '0', '0'),
(654, 394, 26, '0', '0'),
(655, 395, 26, '0', '0'),
(656, 396, 26, '0', '0'),
(657, 397, 26, '0', '0'),
(658, 398, 26, '0', '0'),
(659, 399, 26, '0', '0'),
(660, 400, 26, '0', '0'),
(661, 401, 26, '0', '0'),
(662, 402, 26, '0', '0'),
(663, 403, 26, '0', '0'),
(664, 404, 28, '0', '0'),
(665, 405, 28, '0', '0'),
(666, 406, 28, '0', '0'),
(667, 407, 28, '0', '0'),
(668, 408, 28, '0', '0'),
(669, 409, 28, '0', '0'),
(670, 410, 28, '0', '0'),
(671, 411, 28, '0', '0'),
(672, 412, 28, '0', '0'),
(673, 413, 28, '0', '0'),
(674, 414, 28, '0', '0'),
(675, 415, 28, '0', '0'),
(676, 416, 28, '0', '0'),
(677, 417, 28, '0', '0'),
(678, 418, 28, '0', '0'),
(679, 419, 28, '0', '0'),
(680, 420, 28, '0', '0'),
(681, 421, 28, '0', '0'),
(682, 422, 28, '0', '0'),
(683, 423, 28, '0', '0'),
(684, 424, 28, '0', '0'),
(685, 425, 28, '0', '0'),
(686, 426, 28, '0', '0'),
(687, 427, 28, '0', '0'),
(688, 428, 28, '0', '0'),
(689, 429, 28, '0', '0'),
(690, 430, 28, '0', '0'),
(691, 431, 28, '0', '0'),
(692, 432, 28, '0', '0'),
(693, 433, 28, '0', '0'),
(694, 434, 28, '0', '0'),
(695, 435, 28, '0', '0'),
(696, 436, 28, '0', '0'),
(697, 437, 28, '0', '0'),
(698, 438, 28, '0', '0'),
(699, 439, 28, '0', '0'),
(700, 440, 28, '0', '0'),
(701, 441, 28, '0', '0'),
(702, 442, 28, '0', '0'),
(703, 443, 28, '0', '0'),
(704, 444, 28, '0', '0'),
(705, 445, 28, '0', '0'),
(706, 446, 28, '0', '0'),
(707, 447, 28, '0', '0'),
(708, 448, 28, '0', '0'),
(709, 449, 28, '0', '0'),
(710, 450, 20, '0', '0'),
(711, 451, 20, '0', '0'),
(712, 452, 20, '0', '0'),
(713, 453, 20, '0', '0'),
(714, 454, 20, '0', '0'),
(715, 455, 20, '0', '0'),
(716, 456, 20, '0', '0'),
(717, 457, 20, '0', '0'),
(718, 458, 20, '0', '0'),
(719, 459, 20, '0', '0'),
(720, 460, 20, '0', '0'),
(721, 461, 20, '0', '0'),
(722, 462, 20, '0', '0'),
(723, 463, 20, '0', '0'),
(724, 464, 20, '0', '0'),
(725, 465, 20, '0', '0'),
(726, 466, 20, '0', '0'),
(727, 467, 20, '0', '0'),
(728, 468, 20, '0', '0'),
(729, 469, 20, '0', '0'),
(730, 470, 20, '0', '0'),
(731, 471, 20, '0', '0'),
(732, 472, 20, '0', '0'),
(733, 473, 20, '0', '0'),
(734, 474, 20, '0', '0'),
(735, 475, 20, '0', '0'),
(736, 476, 20, '0', '0'),
(737, 477, 20, '0', '0'),
(738, 478, 20, '0', '0'),
(739, 479, 20, '0', '0'),
(740, 480, 20, '0', '0'),
(741, 481, 20, '0', '0'),
(742, 482, 19, '0', '0'),
(743, 483, 19, '0', '0'),
(744, 484, 19, '0', '0'),
(745, 485, 19, '0', '0'),
(746, 486, 19, '0', '0'),
(747, 487, 19, '0', '0'),
(748, 488, 19, '0', '0'),
(749, 489, 19, '0', '0'),
(750, 490, 19, '0', '0'),
(751, 491, 19, '0', '0'),
(752, 492, 19, '0', '0'),
(753, 493, 19, '0', '0'),
(754, 494, 19, '0', '0'),
(755, 495, 19, '0', '0'),
(756, 496, 19, '0', '0'),
(757, 497, 19, '0', '0'),
(758, 49, 36, '0', '0'),
(759, 49, 38, '0', '0'),
(760, 49, 36, '0', '0'),
(761, 49, 37, '0', '0'),
(763, 501, 36, '0', '0'),
(764, 504, 36, '0', '0'),
(765, 504, 37, '0', '0'),
(766, 516, 19, '0', '0'),
(767, 517, 19, '0', '0'),
(768, 518, 19, '0', '0'),
(769, 519, 19, '0', '0'),
(770, 520, 19, '0', '0'),
(771, 521, 19, '0', '0'),
(772, 522, 19, '0', '0'),
(773, 523, 19, '0', '0'),
(774, 524, 19, '0', '0'),
(775, 525, 19, '0', '0'),
(776, 526, 19, '0', '0'),
(777, 528, 19, '0', '0'),
(778, 529, 19, '0', '0'),
(779, 530, 19, '0', '0'),
(780, 531, 19, '0', '0'),
(781, 532, 19, '0', '0'),
(782, 533, 19, '0', '0'),
(783, 534, 19, '0', '0'),
(784, 535, 19, '0', '0'),
(785, 536, 19, '0', '0'),
(786, 537, 19, '0', '0'),
(787, 538, 19, '0', '0'),
(788, 539, 19, '0', '0'),
(789, 540, 19, '0', '0'),
(790, 541, 19, '0', '0'),
(791, 542, 19, '0', '0'),
(792, 543, 19, '0', '0'),
(793, 544, 19, '0', '0'),
(794, 545, 19, '0', '0'),
(795, 546, 19, '0', '0'),
(796, 547, 19, '0', '0'),
(797, 548, 19, '0', '0'),
(798, 549, 19, '0', '0'),
(799, 550, 19, '0', '0'),
(800, 551, 19, '0', '0'),
(801, 552, 19, '0', '0'),
(802, 553, 19, '0', '0'),
(803, 554, 19, '0', '0'),
(804, 555, 19, '0', '0'),
(805, 556, 19, '0', '0'),
(806, 557, 19, '0', '0'),
(807, 558, 19, '0', '0'),
(808, 559, 19, '0', '0'),
(809, 560, 19, '0', '0'),
(810, 561, 19, '0', '0'),
(811, 562, 19, '0', '0'),
(812, 569, 362, '0', '0'),
(813, 570, 363, '0', '0'),
(815, 573, 38, '0', '0'),
(821, 583, 36, '0', '0'),
(822, 583, 37, '0', '0'),
(823, 583, 9, '0', '0'),
(824, 573, 22, '0', '0'),
(825, 573, 29, '0', '0'),
(826, 573, 335, '0', '0'),
(827, 584, 37, '0', '0'),
(828, 584, 8, '0', '0'),
(829, 584, 343, '0', '0'),
(830, 584, 339, '0', '0'),
(831, 584, 369, '0', '0'),
(833, 584, 36, '0', '0'),
(834, 587, 36, '0', '0'),
(835, 583, 37, '0', '0'),
(836, 588, 341, '0', '0'),
(837, 590, 36, '0', '0'),
(838, 591, 37, '0', '0'),
(839, 593, 37, '0', '0'),
(840, 594, 373, '0', '0'),
(842, 600, 341, '0', '0'),
(843, 601, 341, '0', '0'),
(844, 602, 36, '0', '0'),
(845, 603, 37, '0', '0'),
(846, 604, 335, '0', '0'),
(847, 604, 369, '0', '0'),
(848, 604, 232, '0', '0'),
(849, 604, 36, '0', '0'),
(850, 604, 36, '0', '0'),
(854, 604, 36, '0', '0'),
(858, 611, 37, '0', '0'),
(859, 611, 38, '0', '0'),
(860, 611, 36, '0', '0'),
(861, 612, 36, '1', '0'),
(862, 2, 38, '1', '0'),
(863, 2, 8, '1', '0'),
(865, 2, 107, '1', '0'),
(866, 2, 87, '1', '0'),
(867, 2, 363, '1', '0'),
(868, 2, 37, '1', '0'),
(869, 2, 37, '1', '0'),
(870, 2, 37, '1', '0'),
(871, 2, 37, '1', '0'),
(872, 2, 37, '1', '0'),
(873, 2, 370, '1', '0'),
(874, 612, 36, '1', '0'),
(875, 2, 370, '1', '0'),
(876, 2, 370, '1', '0'),
(877, 2, 370, '1', '0'),
(878, 2, 370, '1', '0'),
(879, 2, 370, '1', '0'),
(880, 2, 36, '1', '0'),
(881, 2, 38, '1', '0'),
(882, 2, 8, '1', '0'),
(883, 2, 12, '1', '0'),
(884, 2, 36, '1', '0'),
(885, 2, 38, '1', '0'),
(886, 2, 8, '1', '0'),
(887, 2, 12, '1', '0'),
(888, 2, 36, '1', '0'),
(889, 2, 38, '1', '0'),
(890, 2, 8, '1', '0'),
(891, 2, 12, '1', '0'),
(892, 612, 36, '1', '0'),
(893, 2, 36, '1', '0'),
(894, 2, 38, '1', '0'),
(895, 2, 8, '1', '0'),
(896, 2, 12, '1', '0'),
(897, 2, 36, '1', '0'),
(898, 2, 38, '1', '0'),
(899, 2, 8, '1', '0'),
(900, 2, 12, '1', '0'),
(901, 2, 36, '1', '0'),
(902, 2, 38, '1', '0'),
(903, 2, 8, '1', '0'),
(904, 2, 12, '1', '0'),
(905, 2, 36, '1', '0'),
(906, 2, 38, '1', '0'),
(907, 2, 8, '1', '0'),
(908, 2, 12, '1', '0'),
(909, 2, 36, '1', '0'),
(910, 2, 38, '1', '0'),
(911, 2, 8, '1', '0'),
(912, 2, 12, '1', '0'),
(913, 2, 36, '1', '0'),
(914, 2, 38, '1', '0'),
(915, 2, 8, '1', '0'),
(916, 2, 12, '1', '0'),
(917, 2, 36, '1', '0'),
(918, 2, 38, '1', '0'),
(919, 2, 8, '1', '0'),
(920, 2, 12, '1', '0'),
(921, 2, 36, '1', '0'),
(922, 2, 38, '1', '0'),
(923, 2, 8, '1', '0'),
(924, 2, 12, '1', '0'),
(925, 2, 36, '1', '0'),
(926, 2, 38, '1', '0'),
(927, 2, 8, '1', '0'),
(928, 2, 12, '1', '0'),
(929, 612, 36, '1', '0'),
(930, 612, 361, '1', '0'),
(931, 612, 391, '1', '0'),
(932, 612, 362, '1', '0'),
(933, 612, 366, '0', '0'),
(934, 2, 36, '1', '0'),
(935, 2, 38, '1', '0'),
(936, 2, 8, '1', '0'),
(937, 2, 12, '1', '0'),
(938, 2, 36, '1', '0'),
(939, 2, 36, '1', '0'),
(940, 2, 36, '1', '0'),
(941, 2, 36, '1', '0'),
(942, 2, 36, '1', '0'),
(943, 2, 36, '0', '0'),
(944, 1, 161, '0', '0'),
(945, 1, 133, '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblqualificationsb`
--

DROP TABLE IF EXISTS `tblqualificationsb`;
CREATE TABLE IF NOT EXISTS `tblqualificationsb` (
  `idQualificationSB` int NOT NULL AUTO_INCREMENT,
  `IdClient` int NOT NULL,
  `IdBusinessCategory` int NOT NULL,
  `FlagDeletado` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idQualificationSB`),
  KEY `IdClient` (`IdClient`),
  KEY `IdBusinessCategory` (`IdBusinessCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblqualificationsb`
--

INSERT INTO `tblqualificationsb` (`idQualificationSB`, `IdClient`, `IdBusinessCategory`, `FlagDeletado`) VALUES
(9, 48, 55, NULL),
(10, 48, 206, NULL),
(11, 48, 207, NULL),
(201, 249, 335, '0'),
(202, 249, 341, '0'),
(204, 250, 335, '0'),
(205, 250, 341, '0'),
(207, 251, 335, '0'),
(208, 251, 341, '0'),
(210, 252, 335, '0'),
(211, 252, 341, '0'),
(213, 253, 335, '0'),
(214, 253, 341, '0'),
(216, 254, 335, '0'),
(217, 254, 341, '0'),
(219, 255, 335, '0'),
(220, 255, 341, '0'),
(222, 256, 335, '0'),
(223, 256, 341, '0'),
(225, 257, 335, '0'),
(226, 257, 341, '0'),
(228, 258, 335, '0'),
(229, 258, 341, '0'),
(231, 259, 335, '0'),
(232, 259, 341, '0'),
(234, 260, 335, '0'),
(235, 260, 341, '0'),
(237, 261, 335, '0'),
(238, 261, 341, '0'),
(240, 262, 335, '0'),
(241, 262, 341, '0'),
(243, 263, 335, '0'),
(244, 263, 341, '0'),
(246, 264, 335, '0'),
(247, 264, 341, '0'),
(249, 265, 335, '0'),
(250, 265, 341, '0'),
(252, 266, 335, '0'),
(253, 266, 341, '0'),
(255, 267, 335, '0'),
(256, 267, 341, '0'),
(259, 590, 55, NULL),
(260, 2, 359, '1'),
(261, 2, 206, '1'),
(262, 2, 182, '1'),
(263, 2, 48, '1'),
(264, 2, 46, '1'),
(265, 2, 53, '1'),
(266, 2, 46, '1'),
(267, 2, 46, '1'),
(268, 2, 107, '1'),
(269, 2, 84, '1'),
(270, 2, 107, '1'),
(271, 2, 84, '1'),
(272, 2, 157, '1'),
(273, 2, 157, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblrangevalues`
--

DROP TABLE IF EXISTS `tblrangevalues`;
CREATE TABLE IF NOT EXISTS `tblrangevalues` (
  `idlRangeValue` int NOT NULL AUTO_INCREMENT,
  `ValorInicial` bigint NOT NULL,
  `ValorFinal` bigint NOT NULL,
  `DescricaoRangeValue` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idlRangeValue`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='		';

--
-- Extraindo dados da tabela `tblrangevalues`
--

INSERT INTO `tblrangevalues` (`idlRangeValue`, `ValorInicial`, `ValorFinal`, `DescricaoRangeValue`) VALUES
(1, 10000, 50000, 'USD10.000 - USD50.000'),
(2, 50000, 100000, 'USD50.000 - USD100.000'),
(3, 100000, 200000, 'USD100.000 - USD200.000'),
(4, 200000, 500000, 'USD200.000 - USD500.000'),
(5, 500000, 1000000, 'USD500.000 - USD1.000.000'),
(6, 1000000, 3000000, 'USD1.000.000 - USD3.000.000'),
(7, 3000000, 5000000, 'USD3.000.000 - USD5.000.000'),
(8, 5000000, 10000000, 'USD5.000.000 - USD10.000.000'),
(9, 10000000, 9999999999, '> USD10.000.000'),
(10, 0, 0, 'Value Not Provided');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblresponseid`
--

DROP TABLE IF EXISTS `tblresponseid`;
CREATE TABLE IF NOT EXISTS `tblresponseid` (
  `ResponseId` int NOT NULL AUTO_INCREMENT,
  `ResponseDesc` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ResponseId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblresponseid`
--

INSERT INTO `tblresponseid` (`ResponseId`, `ResponseDesc`) VALUES
(1, 'Waiting'),
(2, 'Acepeted'),
(3, 'Deinied');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearch`
--

DROP TABLE IF EXISTS `tblsearch`;
CREATE TABLE IF NOT EXISTS `tblsearch` (
  `idSearch` int NOT NULL AUTO_INCREMENT,
  `coreBussinessID` int NOT NULL,
  `Nome` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `idClient` int NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSearch`),
  KEY `coreBussinessID` (`coreBussinessID`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchbusiness`
--

DROP TABLE IF EXISTS `tblsearchbusiness`;
CREATE TABLE IF NOT EXISTS `tblsearchbusiness` (
  `idSearchBusiness` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idBusiness` int NOT NULL,
  PRIMARY KEY (`idSearchBusiness`),
  KEY `idSearch` (`idSearch`),
  KEY `idBusiness` (`idBusiness`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchcategory`
--

DROP TABLE IF EXISTS `tblsearchcategory`;
CREATE TABLE IF NOT EXISTS `tblsearchcategory` (
  `idSearchCategory` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idCategory` int DEFAULT NULL,
  PRIMARY KEY (`idSearchCategory`),
  KEY `idSearch` (`idSearch`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchcountry`
--

DROP TABLE IF EXISTS `tblsearchcountry`;
CREATE TABLE IF NOT EXISTS `tblsearchcountry` (
  `idSearchCountry` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idCountry` int DEFAULT NULL,
  PRIMARY KEY (`idSearchCountry`),
  KEY `idSearch` (`idSearch`),
  KEY `idCountry` (`idCountry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchespecificationtag`
--

DROP TABLE IF EXISTS `tblsearchespecificationtag`;
CREATE TABLE IF NOT EXISTS `tblsearchespecificationtag` (
  `idSearchEspecificationTag` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idTagKeys` int DEFAULT NULL,
  `Keys` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idSearchEspecificationTag`),
  KEY `idSearch` (`idSearch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchprofiles`
--

DROP TABLE IF EXISTS `tblsearchprofiles`;
CREATE TABLE IF NOT EXISTS `tblsearchprofiles` (
  `SearchProfilesId` int NOT NULL AUTO_INCREMENT,
  `SearchProfileNameId` int DEFAULT NULL,
  `ClientId` int NOT NULL,
  `SearchFieldID` int NOT NULL,
  `Value` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Concatenator` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `FlagDeleted` int DEFAULT '0',
  PRIMARY KEY (`SearchProfilesId`),
  KEY `SearchProfileNameId` (`SearchProfileNameId`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblsearchprofiles`
--

INSERT INTO `tblsearchprofiles` (`SearchProfilesId`, `SearchProfileNameId`, `ClientId`, `SearchFieldID`, `Value`, `Concatenator`, `FlagDeleted`) VALUES
(1, 38, 612, 10, 'PRODUTO', NULL, 0),
(41, 6, 49, 1, '3', NULL, 0),
(42, 6, 49, 2, '1', NULL, 0),
(43, 6, 49, 3, '36', NULL, 0),
(44, 6, 49, 3, '38', NULL, 0),
(45, 6, 49, 4, '19', NULL, 0),
(46, 6, 49, 4, '26', NULL, 0),
(77, 13, 2, 1, '8', NULL, 0),
(78, 13, 2, 2, '25', NULL, 0),
(79, 13, 2, 3, '374', NULL, 0),
(80, 13, 2, 7, '10 | 20', NULL, 0),
(82, 13, 2, 9, 'teste', NULL, 0),
(83, 13, 2, 4, '362', NULL, 0),
(84, 13, 2, 4, '378', NULL, 0),
(85, 14, 2, 1, '2', NULL, 0),
(86, 14, 2, 2, '1', NULL, 0),
(87, 14, 2, 3, '37', NULL, 0),
(88, 14, 2, 3, '9', NULL, 0),
(95, 14, 2, 4, '370', NULL, 0),
(96, 14, 2, 4, '372', NULL, 0),
(97, 14, 2, 4, '364', NULL, 0),
(98, 15, 2, 1, '3', NULL, 0),
(99, 15, 2, 2, '1', NULL, 0),
(100, 15, 2, 4, '360', NULL, 0),
(101, 15, 2, 4, '364', NULL, 0),
(102, 16, 2, 1, '3', NULL, 0),
(103, 16, 2, 2, '3', NULL, 0),
(104, 16, 2, 4, '360', NULL, 0),
(105, 17, 2, 1, '3', NULL, 0),
(106, 17, 2, 2, '3', NULL, 0),
(107, 17, 2, 4, '360', NULL, 0),
(108, 18, 2, 1, '4', NULL, 0),
(109, 18, 2, 2, '3', NULL, 0),
(110, 18, 2, 3, '48', NULL, 0),
(111, 18, 2, 3, '59', NULL, 0),
(112, 18, 2, 5, '11111.11 | 22222.22', NULL, 0),
(114, 18, 2, 7, '333 | 666', NULL, 0),
(116, 18, 2, 4, '360', NULL, 0),
(117, 18, 2, 4, '445', NULL, 0),
(118, 19, 2, 1, '4', NULL, 0),
(119, 19, 2, 2, '3', NULL, 0),
(120, 19, 2, 3, '48', NULL, 0),
(121, 19, 2, 3, '59', NULL, 0),
(122, 19, 2, 5, '11111.11 | 22222', NULL, 0),
(124, 19, 2, 7, '123 | 456', NULL, 0),
(126, 19, 2, 4, '360', NULL, 0),
(127, 19, 2, 4, '445', NULL, 0),
(128, 20, 587, 1, '3', NULL, 0),
(129, 20, 587, 2, '8', NULL, 0),
(130, 20, 587, 3, '341', NULL, 0),
(131, 20, 587, 3, '344', NULL, 0),
(132, 20, 587, 5, '123 | 455', NULL, 0),
(134, 20, 587, 7, '10000 | 2000', NULL, 0),
(136, 20, 587, 4, '393', NULL, 0),
(137, 20, 587, 4, '384', NULL, 0),
(138, 21, 588, 1, '3', NULL, 0),
(139, 21, 588, 2, '1', NULL, 0),
(140, 21, 588, 3, '9', NULL, 0),
(141, 21, 588, 3, '12', NULL, 0),
(142, 21, 588, 5, '1000000.00 | 1500000.00', NULL, 0),
(144, 21, 588, 7, '200000.00 | 300000.00', NULL, 0),
(146, 22, 591, 1, '2', NULL, 0),
(147, 22, 591, 2, '1', NULL, 0),
(148, 22, 591, 3, '37', NULL, 0),
(149, 22, 591, 4, '361', NULL, 0),
(150, 23, 603, 1, '2', NULL, 0),
(151, 23, 603, 2, '8', NULL, 0),
(152, 23, 603, 3, '337', NULL, 0),
(153, 24, 604, 1, '2', NULL, 0),
(154, 24, 604, 2, '2', NULL, 0),
(155, 24, 604, 3, '359', NULL, 0),
(156, 25, 604, 1, '3', NULL, 0),
(157, 25, 604, 2, '1', NULL, 0),
(158, 25, 604, 3, '36', NULL, 0),
(159, 25, 604, 5, '10000 | 50000', NULL, 0),
(161, 25, 604, 7, '700 | 2000', NULL, 0),
(163, 26, 588, 1, '3', NULL, 0),
(164, 26, 588, 2, '6', NULL, 0),
(165, 26, 588, 3, '197', NULL, 0),
(166, 26, 588, 3, '241', NULL, 0),
(167, 26, 588, 5, '1000000.00 | 2000000.00', NULL, 0),
(169, 26, 588, 7, '250000.00 | 500000.00', NULL, 0),
(171, 26, 588, 4, '366', NULL, 0),
(172, 26, 588, 4, '381', NULL, 0),
(173, 26, 588, 4, '385', NULL, 0),
(174, 27, 588, 1, '23', NULL, 0),
(175, 27, 588, 2, '14', NULL, 0),
(176, 27, 588, 3, '363', NULL, 0),
(177, 27, 588, 9, 'RA', NULL, 0),
(178, 27, 588, 10, 'RA', NULL, 0),
(179, 27, 588, 11, 'RA', NULL, 0),
(180, 27, 588, 4, '366', NULL, 0),
(181, 28, 2, 1, '2', NULL, 0),
(182, 28, 2, 2, '1', NULL, 0),
(183, 28, 2, 3, '36', NULL, 0),
(184, 28, 2, 3, '9', NULL, 0),
(185, 28, 2, 3, '21', NULL, 0),
(186, 28, 2, 9, 'esse', NULL, 0),
(187, 28, 2, 10, 'esse', NULL, 0),
(188, 28, 2, 11, 'esse', NULL, 0),
(189, 28, 2, 9, 'aqui', NULL, 0),
(190, 28, 2, 10, 'aqui', NULL, 0),
(191, 28, 2, 11, 'aqui', NULL, 0),
(192, 28, 2, 9, 'ali', NULL, 0),
(193, 28, 2, 10, 'ali', NULL, 0),
(194, 28, 2, 11, 'ali', NULL, 0),
(195, 28, 2, 4, '361', NULL, 0),
(196, 28, 2, 4, '366', NULL, 0),
(197, 28, 2, 4, '368', NULL, 0),
(198, 29, 2, 1, '3', NULL, 0),
(199, 29, 2, 2, '1', NULL, 0),
(200, 29, 2, 3, '36', NULL, 0),
(201, 29, 2, 3, '10', NULL, 0),
(202, 29, 2, 3, '39', NULL, 0),
(203, 29, 2, 5, '10.00 | 1000', NULL, 0),
(205, 29, 2, 7, '550.00 | 700', NULL, 0),
(207, 29, 2, 4, '362', NULL, 0),
(208, 29, 2, 4, '469', NULL, 0),
(209, 29, 2, 4, '519', NULL, 0),
(210, 30, 2, 1, '3', NULL, 0),
(211, 30, 2, 2, '1', NULL, 0),
(212, 30, 2, 3, '36', NULL, 0),
(213, 30, 2, 5, '1000.00 | 10000', NULL, 0),
(215, 30, 2, 7, '125 | 225', NULL, 0),
(217, 30, 2, 4, '361', NULL, 0),
(218, 31, 2, 1, '19', NULL, 0),
(219, 31, 2, 2, '21', NULL, 0),
(220, 31, 2, 3, '370', NULL, 0),
(221, 31, 2, 9, 'sla', NULL, 0),
(222, 31, 2, 10, 'sla', NULL, 0),
(223, 31, 2, 11, 'sla', NULL, 0),
(224, 32, 611, 1, '2', NULL, 0),
(225, 32, 611, 2, '1', NULL, 0),
(226, 32, 611, 3, '11', NULL, 0),
(227, 32, 611, 3, '24', NULL, 0),
(228, 32, 611, 4, '459', NULL, 0),
(229, 32, 611, 4, '395', NULL, 0),
(230, 33, 2, 1, '3', NULL, 0),
(231, 33, 2, 2, '1', NULL, 0),
(232, 33, 2, 3, '36', NULL, 0),
(233, 33, 2, 5, '11.11|22.22', NULL, 0),
(234, 33, 2, 7, '3|3', NULL, 0),
(235, 34, 2, 1, '3', NULL, 0),
(236, 34, 2, 2, '1', NULL, 0),
(237, 34, 2, 3, '38', NULL, 0),
(238, 34, 2, 5, '11111.11|22.22', NULL, 0),
(239, 34, 2, 7, '33.33|44.44', NULL, 0),
(240, 35, 2, 1, '2', NULL, 0),
(241, 35, 2, 9, 'ali', NULL, 0),
(242, 35, 2, 10, 'ali', NULL, 0),
(243, 35, 2, 11, 'ali', NULL, 0),
(244, 35, 2, 4, '360', NULL, 0),
(245, 36, 2, 1, '2', NULL, 0),
(246, 37, 612, 1, '2', NULL, 0),
(247, 37, 612, 2, '1', NULL, 0),
(248, 37, 612, 3, '38', NULL, 0),
(249, 37, 612, 9, 'teste', NULL, 0),
(250, 37, 612, 10, 'teste', NULL, 0),
(251, 37, 612, 11, 'teste', NULL, 0),
(252, 38, 612, 1, '2', NULL, 0),
(253, 38, 612, 9, 'PRODUTO', NULL, 0),
(255, 38, 612, 11, 'PRODUTO', NULL, 0),
(256, 38, 612, 4, '366', NULL, 0),
(257, 39, 2, 1, '2', NULL, 1),
(258, 39, 2, 2, '1', NULL, 1),
(259, 39, 2, 3, '36', NULL, 1),
(260, 40, 612, 1, '2', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchprofile_nameid`
--

DROP TABLE IF EXISTS `tblsearchprofile_nameid`;
CREATE TABLE IF NOT EXISTS `tblsearchprofile_nameid` (
  `SearchProfileNameId` int NOT NULL AUTO_INCREMENT,
  `idClient` int NOT NULL,
  `SearchProfileName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `SearchProfileStatus` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `SearchProfile_CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SearchProfile_LastChange` datetime DEFAULT NULL,
  PRIMARY KEY (`SearchProfileNameId`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblsearchprofile_nameid`
--

INSERT INTO `tblsearchprofile_nameid` (`SearchProfileNameId`, `idClient`, `SearchProfileName`, `SearchProfileStatus`, `SearchProfile_CreatedAt`, `SearchProfile_LastChange`) VALUES
(6, 49, 'SP Edu 001', '1', '2023-04-27 08:50:04', NULL),
(13, 2, 'teste', '1', '2023-05-08 13:28:15', NULL),
(14, 2, 'TesteAC', '1', '2023-05-08 14:32:38', NULL),
(15, 2, 'testeDistri', '1', '2023-05-09 12:19:41', NULL),
(16, 2, 'fgdgfgdfg', '1', '2023-05-09 12:21:50', NULL),
(17, 2, 'fgdgfgdfg', '1', '2023-05-09 12:22:12', NULL),
(18, 2, 'testeDistributor', '1', '2023-05-09 12:30:51', NULL),
(19, 2, 'testeDistributor', '1', '2023-05-09 12:48:33', NULL),
(20, 587, 'SP teste Edu Brasil Chile', '1', '2023-05-12 14:18:59', NULL),
(21, 588, 'Bla', '1', '2023-05-17 13:05:39', NULL),
(22, 591, 'namefsdfsdf', '1', '2023-05-17 14:08:29', NULL),
(23, 603, 'SP 01', '1', '2023-05-18 16:57:54', NULL),
(24, 604, 'SP Edu 01', '1', '2023-05-18 18:12:33', NULL),
(25, 604, 'Edu SP 02', '1', '2023-05-18 18:13:34', NULL),
(26, 588, 'Biosys', '1', '2023-05-19 10:28:01', NULL),
(27, 588, 'amsnfd', '1', '2023-05-19 13:44:51', NULL),
(28, 2, 'Tipo A', '1', '2023-05-19 15:32:54', NULL),
(29, 2, 'Tipo B', '1', '2023-05-19 15:41:11', NULL),
(30, 2, 'olavo', '1', '2023-05-22 10:02:58', NULL),
(31, 2, 'd', '1', '2023-05-22 10:26:18', NULL),
(32, 611, 'Edu Profile 01', '1', '2023-06-02 11:29:24', NULL),
(33, 2, 'teseOct', '1', '2023-06-12 11:47:52', NULL),
(34, 2, 'teste2', '1', '2023-06-12 11:56:00', NULL),
(35, 2, 'testes10', '1', '2023-06-12 15:12:18', NULL),
(36, 2, 'edfgsdfsdf', '1', '2023-06-12 15:15:11', NULL),
(37, 612, 'A| B = Dips | Wipes | Tes', '1', '2023-06-13 12:37:58', NULL),
(38, 612, 'TESTE COM TODOS', '1', '2023-06-14 11:13:48', NULL),
(39, 2, 'TESTE 2', '0', '2023-06-14 11:42:53', NULL),
(40, 2, 'TESTE 999', '0', '2023-06-14 11:46:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchprofile_results`
--

DROP TABLE IF EXISTS `tblsearchprofile_results`;
CREATE TABLE IF NOT EXISTS `tblsearchprofile_results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int DEFAULT NULL,
  `idClienteEncontrado` int DEFAULT NULL,
  `datahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `idTipoNotif` int NOT NULL DEFAULT '1',
  `postId` int DEFAULT NULL,
  `url` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `estadoNotif` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblsearchprofile_results`
--

INSERT INTO `tblsearchprofile_results` (`id`, `idUsuario`, `idClienteEncontrado`, `datahora`, `idTipoNotif`, `postId`, `url`, `estadoNotif`) VALUES
(1, 1, 2, '2023-08-04 22:03:32', 2, NULL, 'viewProfile.php?profile=2', 0),
(2, 2, 3, '2023-08-06 09:20:18', 2, NULL, 'viewProfile.php?profile=3', 0),
(3, 2, 1, '2023-08-06 09:21:27', 2, NULL, 'viewProfile.php?profile=1', 1),
(4, 1, 1, '2023-08-22 01:45:54', 2, NULL, 'viewProfile.php?profile=1', 1),
(5, 1, 1, '2023-08-22 01:45:58', 4, NULL, 'viewProfile.php?profile=1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchprofile_results2`
--

DROP TABLE IF EXISTS `tblsearchprofile_results2`;
CREATE TABLE IF NOT EXISTS `tblsearchprofile_results2` (
  `SearchProfile_ResultsID` int NOT NULL AUTO_INCREMENT,
  `SearchProfileNameId` int NOT NULL,
  `idClient_Founded` int NOT NULL,
  `idClient_DateFounded` datetime DEFAULT CURRENT_TIMESTAMP,
  `ResultsID_StatusMatch` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ResultsID_DateMatch` datetime DEFAULT NULL,
  `idTypeNotifcation` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`SearchProfile_ResultsID`)
) ENGINE=InnoDB AUTO_INCREMENT=1849 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='										';

--
-- Extraindo dados da tabela `tblsearchprofile_results2`
--

INSERT INTO `tblsearchprofile_results2` (`SearchProfile_ResultsID`, `SearchProfileNameId`, `idClient_Founded`, `idClient_DateFounded`, `ResultsID_StatusMatch`, `ResultsID_DateMatch`, `idTypeNotifcation`) VALUES
(1779, 39, 584, '2023-06-30 16:25:21', NULL, NULL, 1),
(1780, 39, 587, '2023-06-30 16:25:21', NULL, NULL, 1),
(1781, 39, 590, '2023-06-30 16:25:21', NULL, NULL, 1),
(1782, 39, 602, '2023-06-30 16:25:21', NULL, NULL, 1),
(1786, 40, 1, '2023-06-30 16:25:21', NULL, NULL, 1),
(1787, 40, 292, '2023-06-30 16:25:21', NULL, NULL, 1),
(1788, 40, 293, '2023-06-30 16:25:21', NULL, NULL, 1),
(1789, 40, 294, '2023-06-30 16:25:21', NULL, NULL, 1),
(1790, 40, 295, '2023-06-30 16:25:21', NULL, NULL, 1),
(1791, 40, 296, '2023-06-30 16:25:21', NULL, NULL, 1),
(1792, 40, 297, '2023-06-30 16:25:21', NULL, NULL, 1),
(1793, 40, 298, '2023-06-30 16:25:21', NULL, NULL, 1),
(1794, 40, 299, '2023-06-30 16:25:21', NULL, NULL, 1),
(1795, 40, 300, '2023-06-30 16:25:21', NULL, NULL, 1),
(1796, 40, 301, '2023-06-30 16:25:21', NULL, NULL, 1),
(1797, 40, 302, '2023-06-30 16:25:21', NULL, NULL, 1),
(1798, 40, 303, '2023-06-30 16:25:21', NULL, NULL, 1),
(1799, 40, 304, '2023-06-30 16:25:21', NULL, NULL, 1),
(1800, 40, 305, '2023-06-30 16:25:21', NULL, NULL, 1),
(1801, 40, 306, '2023-06-30 16:25:21', NULL, NULL, 1),
(1802, 40, 307, '2023-06-30 16:25:21', NULL, NULL, 1),
(1803, 40, 308, '2023-06-30 16:25:21', NULL, NULL, 1),
(1804, 40, 309, '2023-06-30 16:25:21', NULL, NULL, 1),
(1805, 40, 310, '2023-06-30 16:25:21', NULL, NULL, 1),
(1806, 40, 311, '2023-06-30 16:25:21', NULL, NULL, 1),
(1807, 40, 312, '2023-06-30 16:25:21', NULL, NULL, 1),
(1808, 40, 313, '2023-06-30 16:25:21', NULL, NULL, 1),
(1809, 40, 314, '2023-06-30 16:25:21', NULL, NULL, 1),
(1810, 40, 315, '2023-06-30 16:25:21', NULL, NULL, 1),
(1811, 40, 316, '2023-06-30 16:25:21', NULL, NULL, 1),
(1812, 40, 317, '2023-06-30 16:25:21', NULL, NULL, 1),
(1813, 40, 318, '2023-06-30 16:25:21', NULL, NULL, 1),
(1814, 40, 319, '2023-06-30 16:25:21', NULL, NULL, 1),
(1815, 40, 320, '2023-06-30 16:25:21', NULL, NULL, 1),
(1816, 40, 321, '2023-06-30 16:25:21', NULL, NULL, 1),
(1817, 40, 322, '2023-06-30 16:25:21', NULL, NULL, 1),
(1818, 40, 323, '2023-06-30 16:25:21', NULL, NULL, 1),
(1819, 40, 324, '2023-06-30 16:25:21', NULL, NULL, 1),
(1820, 40, 325, '2023-06-30 16:25:21', NULL, NULL, 1),
(1821, 40, 326, '2023-06-30 16:25:21', NULL, NULL, 1),
(1822, 40, 327, '2023-06-30 16:25:21', NULL, NULL, 1),
(1823, 40, 328, '2023-06-30 16:25:21', NULL, NULL, 1),
(1824, 40, 329, '2023-06-30 16:25:21', NULL, NULL, 1),
(1825, 40, 573, '2023-06-30 16:25:21', NULL, NULL, 1),
(1826, 40, 579, '2023-06-30 16:25:21', NULL, NULL, 1),
(1827, 40, 584, '2023-06-30 16:25:21', NULL, NULL, 1),
(1828, 40, 587, '2023-06-30 16:25:21', NULL, NULL, 1),
(1829, 40, 590, '2023-06-30 16:25:21', NULL, NULL, 1),
(1830, 40, 591, '2023-06-30 16:25:21', NULL, NULL, 1),
(1831, 40, 600, '2023-06-30 16:25:21', NULL, NULL, 1),
(1832, 40, 601, '2023-06-30 16:25:21', NULL, NULL, 1),
(1833, 40, 602, '2023-06-30 16:25:21', NULL, NULL, 1),
(1834, 40, 603, '2023-06-30 16:25:21', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchprofile_resultshistorylog`
--

DROP TABLE IF EXISTS `tblsearchprofile_resultshistorylog`;
CREATE TABLE IF NOT EXISTS `tblsearchprofile_resultshistorylog` (
  `SearchProfile_ResultsHistoryID` int NOT NULL AUTO_INCREMENT,
  `SearchProfile_OriginalUserResultsID` int NOT NULL,
  `SearchProfileNameId` int NOT NULL,
  `idClient_Founded` int NOT NULL,
  `idClient_DateFounded` datetime DEFAULT NULL,
  `UserResultsID_StatusMatch` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `UserResultsID_DateMatch` datetime DEFAULT NULL,
  `ResultsHistoryLogDate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`SearchProfile_ResultsHistoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='										';

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchresults`
--

DROP TABLE IF EXISTS `tblsearchresults`;
CREATE TABLE IF NOT EXISTS `tblsearchresults` (
  `idSearchResults` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idClientPesquisador` int NOT NULL,
  `idClientResultado` int NOT NULL,
  PRIMARY KEY (`idSearchResults`),
  KEY `idSearch` (`idSearch`),
  KEY `idClientPesquisador` (`idClientPesquisador`),
  KEY `idClientResultado` (`idClientResultado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchspecification`
--

DROP TABLE IF EXISTS `tblsearchspecification`;
CREATE TABLE IF NOT EXISTS `tblsearchspecification` (
  `idSearchSpecification` int NOT NULL AUTO_INCREMENT,
  `idSearch` int NOT NULL,
  `idNumEmpregados` int DEFAULT NULL,
  `idlRangeValue` int DEFAULT NULL,
  `idNivelOperacao` int DEFAULT NULL,
  `DataDeAbertura` date DEFAULT NULL,
  PRIMARY KEY (`idSearchSpecification`),
  KEY `idSearch` (`idSearch`),
  KEY `idNumEmpregados` (`idNumEmpregados`),
  KEY `idlRangeValue` (`idlRangeValue`),
  KEY `idNivelOperacao` (`idNivelOperacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblsearchstructure`
--

DROP TABLE IF EXISTS `tblsearchstructure`;
CREATE TABLE IF NOT EXISTS `tblsearchstructure` (
  `SearchFieldID` int NOT NULL AUTO_INCREMENT,
  `PKTable` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `PKField` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `DescTableField` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `SearcheFieldNameForUser` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `OrderByExpression` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `TypeOfSearch` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `LinkStatement` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SearchFieldID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblsearchstructure`
--

INSERT INTO `tblsearchstructure` (`SearchFieldID`, `PKTable`, `PKField`, `DescTableField`, `SearcheFieldNameForUser`, `OrderByExpression`, `TypeOfSearch`, `LinkStatement`) VALUES
(1, 'tblOperations', 'idOperation', 'NmOperation', 'Operation', ' FlagOperation , NmOperation', 'PK', NULL),
(2, 'tblBusiness', 'idBusiness', 'NmBusiness', 'Business', 'NmBusiness', 'PK', '01 - IdBusinessCategory'),
(3, 'tblBusinessCategory', 'IdBusinessCategory', 'NmBusinessCategory', 'Category', 'NmBusinessCategory', 'PK', '02 - IdBusinessCategory'),
(4, 'tblCountry', 'IdCountry', 'NmCountry', 'Country', 'NmCountry', 'PK', NULL),
(5, 'tblDistributorProfile', 'TotalRevenue', 'TotalRevenue', 'TotalRevenue', 'TotalRevenue', 'BETWEEN', 'FROM'),
(7, 'tblDistributorProfile', 'TotalImports', 'TotalImports', 'TotalImports', 'TotalImports', 'BETWEEN', 'FROM'),
(9, 'tblProducts', 'ProductName', 'ProductName', 'Nome do Produto', 'ProductName', 'LIKE', NULL),
(10, 'tblProducts', 'ProdcuctDescription', 'ProdcuctDescription', 'Descrição do Produto', 'ProdcuctDescription', 'LIKE', NULL),
(11, 'tblProducts', 'ProdcuctEspecification', 'ProdcuctEspecification', 'Especificação do Produto', 'ProdcuctEspecification', 'LIKE', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbluserclients`
--

DROP TABLE IF EXISTS `tbluserclients`;
CREATE TABLE IF NOT EXISTS `tbluserclients` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `MiddleName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `LastName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `JobTitle` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idCountry` int NOT NULL,
  `CompanyName` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `CoreBusinessId` int NOT NULL,
  `SatBusinessId` int DEFAULT NULL,
  `IdOperation` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idFlagStatusCadastro` int NOT NULL,
  `idPerfilUsuario` int NOT NULL DEFAULT '1',
  `PersonalUserPicturePath` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `LogoPicturePath` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `WhatsAppNumber` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `descricao` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `taxid` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `AnoFundacao` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `NumEmpregados` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `NumVendedores` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `NivelOperacao` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `DetalheRegiao` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Fob_3Y` int DEFAULT NULL,
  `Vol_3Y` int DEFAULT NULL,
  `Fob_2Y` int DEFAULT NULL,
  `Vol_2Y` int DEFAULT NULL,
  `Fob_1Y` int DEFAULT NULL,
  `Vol_1Y` int DEFAULT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `taxid` (`taxid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbluserclients`
--

INSERT INTO `tbluserclients` (`idClient`, `FirstName`, `MiddleName`, `LastName`, `JobTitle`, `idCountry`, `CompanyName`, `Password`, `created_at`, `CoreBusinessId`, `SatBusinessId`, `IdOperation`, `email`, `idFlagStatusCadastro`, `idPerfilUsuario`, `PersonalUserPicturePath`, `LogoPicturePath`, `WhatsAppNumber`, `descricao`, `taxid`, `AnoFundacao`, `NumEmpregados`, `NumVendedores`, `NivelOperacao`, `DetalheRegiao`, `Fob_3Y`, `Vol_3Y`, `Fob_2Y`, `Vol_2Y`, `Fob_1Y`, `Vol_1Y`) VALUES
(1, 'Lucas S', NULL, 'Souza', 'CEO', 384, 'SILVA TECH SOUZA', '25f9e794323b453885f5181f1b624d0b', '2023-07-24 15:12:25', 3, 3, 0, 'llucas.silva2235@gmail.com', 4, 1, 'assets/img/1/PersonalUser_1.png', '1/LogoPicture_1.png', '11911601652', 'teste 5\r\n', '11111111111', '2023', '1', '1', '1', NULL, 2022, 1, 2021, 1, 2020, 1),
(2, 'Marcelo', NULL, 'Carvalho', 'CEO', 384, 'LABD', 'be6bf34f00a53923f785f67bbc2fea0a', '2023-07-24 19:57:54', 11, 12, 0, 'marcelo.carvalho@latambd.com.br', 1, 1, 'assets/img/2/PersonalUser_2.jpg', NULL, '+5511991860812', 'LABD is a specialist in the healthcare market, encompassing all business processes, from the registration strategies, and market approach to sales & marketing management.\r\n \r\n\r\nOur goal is more than sales, but mainly, introducing new business consistently, positioning the brand adding value, and bui', '1573289000101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Victor', NULL, 'Camargo', 'LATAM Business Development Coordinator', 384, 'XNY MEDICAL', 'fa81d1804dff962e5a4d254251720fac', '2023-07-25 13:22:44', 2, 1, 1, 'victor@xnystaplers.com', 1, 1, NULL, NULL, '+5511976480701', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Alissia ', NULL, 'Maia', 'SpineGuard SA', 384, 'SPINEGUARD', '3db948e4a21d0f664bb7dd1cc5b09255', '2023-07-25 13:24:51', 2, NULL, 1, 'sales.latam.1@latambd.com.br', 1, 1, 'assets/img/4/PersonalUser_4.png', NULL, '+55 11 943310303', 'SpineGuard is an innovative company deploying its proprietary radiation-free real time sensing technology DSG® (Dynamic Surgical Guidance) to secure and streamline the placement of implants in the skeleton.', '15732890000101', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Miquely', NULL, 'Zacarias', 'KESTAL INDUSTRIA, COMERCIO E IMPORTACAO LTDA', 384, 'KESTAL', 'd229680577c5d9dd57a0e9d2ac3539a3', '2023-07-25 14:16:28', 23, 14, 1, 'sales.latam.2@latambd.com.br', 1, 1, 'assets/img/5/PersonalUser_5.jpg', NULL, '+55 11 91555-0327', 'Our range of orthopaedic products and accessories is developed with cutting-edge technology, innovation and research. Each item is carefully designed to provide comfort, support and relief to those in need.', '09.408.413/0001-84', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Alissia ', NULL, 'Maia', 'SPINEGUARD SA', 0, 'SPINEGUARD', '3db948e4a21d0f664bb7dd1cc5b09255', '2023-07-25 14:30:39', 2, NULL, 1, 'sales.latam.1@latambd.com.br', 1, 1, 'assets/img/6/PersonalUser_6.png', NULL, ' +55 11 94331-0303', 'SpineGuard is an innovative company deploying its proprietary radiation-free real time sensing technology DSG® (Dynamic Surgical Guidance) to secure and streamline the placement of implants in the skeleton.', '510 179 559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Renan ', NULL, 'Costa', 'Bio Compression', 384, 'Bio Compression Systems, Inc.', '697be2c3101139247b0316436706be82', '2023-07-25 15:02:26', 23, 14, 1, 'renan.costa@latambd.com.br', 1, 1, 'assets/img/7/PersonalUser_7.png', NULL, '+55 19981326983', 'Bio Compression Systems has been the leading manufacturer of pneumatic compression devices for over 30 years. Compression therapy is used for the treatment of lymphedema, venous insufficiency, lipedema, phlebolymphedema, non-healing wounds, DVT prophylaxis, post-op edema and sports injuries. Based i', '22-246-9976', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'teste', NULL, 'teste1', 'teste', 376, 'teste', '', '2023-08-15 18:45:29', 0, NULL, 1, 'tenishi1cn@gmail.com', 2, 1, NULL, NULL, '+55 19 933008615', NULL, 'Developer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'teste', NULL, 'teste1', 'teste', 384, 'teste', '', '2023-08-15 18:54:51', 0, NULL, 1, 'tenishi1cn@gmail.com', 2, 1, NULL, NULL, '+55 19 933008615', NULL, 'teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Name', NULL, 'teste1', 'teste', 432, 'Developer', '', '2023-08-15 19:04:36', 0, NULL, 1, 'julio.costa-nunes@unesp.br', 2, 1, NULL, NULL, '+55 19 933008615', NULL, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Lucas', NULL, 'Souza', 'CEO', 384, 'SILVA TECH SOUZA', '', '2023-08-29 17:46:55', 0, NULL, 1, 'llucas.silva2231@gmail.com', 2, 1, NULL, NULL, '11996589020', NULL, 'sadasdasdasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbluserperfil`
--

DROP TABLE IF EXISTS `tbluserperfil`;
CREATE TABLE IF NOT EXISTS `tbluserperfil` (
  `idPerfilUsuario` int NOT NULL AUTO_INCREMENT,
  `NmPerfil` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `NumMeses` int DEFAULT '0',
  `DataInicio` datetime DEFAULT NULL,
  `DataFinal` datetime DEFAULT NULL,
  PRIMARY KEY (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbluserperfil`
--

INSERT INTO `tbluserperfil` (`idPerfilUsuario`, `NmPerfil`, `NumMeses`, `DataInicio`, `DataFinal`) VALUES
(1, 'ASSINANTE', 0, NULL, NULL),
(2, 'VISITANTE', 0, NULL, NULL),
(3, 'PROMO 01', 0, NULL, NULL),
(4, 'PROMO 02', 0, NULL, NULL),
(5, 'PROMO 03', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblviews`
--

DROP TABLE IF EXISTS `tblviews`;
CREATE TABLE IF NOT EXISTS `tblviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `idView` int NOT NULL,
  `datacriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tblviews`
--

INSERT INTO `tblviews` (`id`, `idUser`, `idView`, `datacriacao`) VALUES
(1, 1, 2, '2023-08-04 22:03:32'),
(2, 2, 3, '2023-08-06 09:20:18'),
(3, 2, 1, '2023-08-06 09:21:27'),
(4, 1, 1, '2023-08-22 01:45:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpostcoment`
--

DROP TABLE IF EXISTS `tbpostcoment`;
CREATE TABLE IF NOT EXISTS `tbpostcoment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpost` int DEFAULT NULL,
  `texto` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `datahora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tbpostcoment`
--

INSERT INTO `tbpostcoment` (`id`, `idpost`, `texto`, `datahora`, `iduser`) VALUES
(1, 73, 'teste', '2023-07-31 16:26:14', 1),
(2, 72, 'teste', '2023-07-31 19:21:25', 1),
(3, 72, 'teste', '2023-07-31 19:24:16', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `idTeste` int NOT NULL AUTO_INCREMENT,
  `slaTeste` int NOT NULL,
  `mensagemTeste` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `hora` datetime NOT NULL,
  PRIMARY KEY (`idTeste`)
) ENGINE=InnoDB AUTO_INCREMENT=782 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`idTeste`, `slaTeste`, `mensagemTeste`, `hora`) VALUES
(107, 4, 'teste cron', '2023-06-23 10:45:02'),
(108, 4, 'teste cron', '2023-06-23 11:00:04'),
(109, 4, 'teste cron', '2023-06-23 11:15:02'),
(110, 4, 'teste cron', '2023-06-23 11:30:03'),
(111, 4, 'teste cron', '2023-06-23 11:45:03'),
(112, 4, 'teste cron', '2023-06-23 12:00:04'),
(113, 4, 'teste cron', '2023-06-23 12:15:02'),
(114, 4, 'teste cron', '2023-06-23 12:30:02'),
(115, 4, 'teste cron', '2023-06-23 12:45:02'),
(116, 4, 'teste cron', '2023-06-23 13:00:03'),
(117, 4, 'teste cron', '2023-06-23 13:15:02'),
(118, 4, 'teste cron', '2023-06-23 13:30:02'),
(119, 4, 'teste cron', '2023-06-23 13:45:02'),
(120, 4, 'teste cron', '2023-06-23 14:00:04'),
(121, 4, 'teste cron', '2023-06-23 14:15:02'),
(122, 4, 'teste cron', '2023-06-23 14:30:02'),
(123, 4, 'teste cron', '2023-06-23 14:45:02'),
(124, 4, 'teste cron', '2023-06-23 15:00:03'),
(125, 4, 'teste cron', '2023-06-23 15:15:02'),
(126, 4, 'teste cron', '2023-06-23 15:30:03'),
(127, 4, 'teste cron', '2023-06-23 15:45:02'),
(128, 4, 'teste cron', '2023-06-23 16:00:02'),
(129, 4, 'teste cron', '2023-06-23 16:15:02'),
(130, 4, 'teste cron', '2023-06-23 16:30:02'),
(131, 4, 'teste cron', '2023-06-23 16:45:03'),
(132, 4, 'teste cron', '2023-06-23 17:00:03'),
(133, 4, 'teste cron', '2023-06-23 17:15:03'),
(134, 4, 'teste cron', '2023-06-23 17:30:03'),
(135, 4, 'teste cron', '2023-06-23 17:45:02'),
(136, 4, 'teste cron', '2023-06-23 18:00:03'),
(137, 4, 'teste cron', '2023-06-23 18:15:03'),
(138, 4, 'teste cron', '2023-06-23 18:30:03'),
(139, 4, 'teste cron', '2023-06-23 18:45:02'),
(140, 4, 'teste cron', '2023-06-23 19:00:04'),
(141, 4, 'teste cron', '2023-06-23 19:15:03'),
(142, 4, 'teste cron', '2023-06-23 19:30:03'),
(143, 4, 'teste cron', '2023-06-23 19:45:02'),
(144, 4, 'teste cron', '2023-06-23 20:00:04'),
(145, 4, 'teste cron', '2023-06-23 20:15:02'),
(146, 4, 'teste cron', '2023-06-23 20:30:03'),
(147, 4, 'teste cron', '2023-06-23 20:45:02'),
(148, 4, 'teste cron', '2023-06-23 21:00:03'),
(149, 4, 'teste cron', '2023-06-23 21:15:03'),
(150, 4, 'teste cron', '2023-06-23 21:30:03'),
(151, 4, 'teste cron', '2023-06-23 21:45:02'),
(152, 4, 'teste cron', '2023-06-23 22:00:03'),
(153, 4, 'teste cron', '2023-06-23 22:15:03'),
(154, 4, 'teste cron', '2023-06-23 22:30:03'),
(155, 4, 'teste cron', '2023-06-23 22:45:02'),
(156, 4, 'teste cron', '2023-06-23 23:00:03'),
(157, 4, 'teste cron', '2023-06-23 23:15:02'),
(158, 4, 'teste cron', '2023-06-23 23:30:02'),
(159, 4, 'teste cron', '2023-06-23 23:45:03'),
(160, 4, 'teste cron', '2023-06-24 00:00:04'),
(161, 4, 'teste cron', '2023-06-24 00:15:03'),
(162, 4, 'teste cron', '2023-06-24 00:30:03'),
(163, 4, 'teste cron', '2023-06-24 00:45:02'),
(164, 4, 'teste cron', '2023-06-24 01:00:03'),
(165, 4, 'teste cron', '2023-06-24 01:15:03'),
(166, 4, 'teste cron', '2023-06-24 01:30:02'),
(167, 4, 'teste cron', '2023-06-24 01:45:03'),
(168, 4, 'teste cron', '2023-06-24 02:00:04'),
(169, 4, 'teste cron', '2023-06-24 02:15:03'),
(170, 4, 'teste cron', '2023-06-24 02:30:03'),
(171, 4, 'teste cron', '2023-06-24 02:45:02'),
(172, 4, 'teste cron', '2023-06-24 03:00:03'),
(173, 4, 'teste cron', '2023-06-24 03:15:03'),
(174, 4, 'teste cron', '2023-06-24 03:30:03'),
(175, 4, 'teste cron', '2023-06-24 03:45:03'),
(176, 4, 'teste cron', '2023-06-24 04:00:03'),
(177, 4, 'teste cron', '2023-06-24 04:15:03'),
(178, 4, 'teste cron', '2023-06-24 04:30:03'),
(179, 4, 'teste cron', '2023-06-24 04:45:02'),
(180, 4, 'teste cron', '2023-06-24 05:00:03'),
(181, 4, 'teste cron', '2023-06-24 05:15:02'),
(182, 4, 'teste cron', '2023-06-24 05:30:03'),
(183, 4, 'teste cron', '2023-06-24 05:45:03'),
(184, 4, 'teste cron', '2023-06-24 06:00:03'),
(185, 4, 'teste cron', '2023-06-24 06:15:02'),
(186, 4, 'teste cron', '2023-06-24 06:30:03'),
(187, 4, 'teste cron', '2023-06-24 06:45:02'),
(188, 4, 'teste cron', '2023-06-24 07:00:04'),
(189, 4, 'teste cron', '2023-06-24 07:15:02'),
(190, 4, 'teste cron', '2023-06-24 07:30:03'),
(191, 4, 'teste cron', '2023-06-24 07:45:03'),
(192, 4, 'teste cron', '2023-06-24 08:00:04'),
(193, 4, 'teste cron', '2023-06-24 08:15:02'),
(194, 4, 'teste cron', '2023-06-24 08:30:03'),
(195, 4, 'teste cron', '2023-06-24 08:45:03'),
(196, 4, 'teste cron', '2023-06-24 09:00:03'),
(197, 4, 'teste cron', '2023-06-24 09:15:02'),
(198, 4, 'teste cron', '2023-06-24 09:30:03'),
(199, 4, 'teste cron', '2023-06-24 09:45:02'),
(200, 4, 'teste cron', '2023-06-24 10:00:04'),
(201, 4, 'teste cron', '2023-06-24 10:15:02'),
(202, 4, 'teste cron', '2023-06-24 10:30:03'),
(203, 4, 'teste cron', '2023-06-24 10:45:03'),
(204, 4, 'teste cron', '2023-06-24 11:00:04'),
(205, 4, 'teste cron', '2023-06-24 11:15:02'),
(206, 4, 'teste cron', '2023-06-24 11:30:03'),
(207, 4, 'teste cron', '2023-06-24 11:45:02'),
(208, 4, 'teste cron', '2023-06-24 12:00:03'),
(209, 4, 'teste cron', '2023-06-24 12:15:03'),
(210, 4, 'teste cron', '2023-06-24 12:30:03'),
(211, 4, 'teste cron', '2023-06-24 12:45:02'),
(212, 4, 'teste cron', '2023-06-24 13:00:04'),
(213, 4, 'teste cron', '2023-06-24 13:15:02'),
(214, 4, 'teste cron', '2023-06-24 13:30:02'),
(215, 4, 'teste cron', '2023-06-24 13:45:03'),
(216, 4, 'teste cron', '2023-06-24 14:00:04'),
(217, 4, 'teste cron', '2023-06-24 14:15:02'),
(218, 4, 'teste cron', '2023-06-24 14:30:04'),
(219, 4, 'teste cron', '2023-06-24 14:45:03'),
(220, 4, 'teste cron', '2023-06-24 15:00:04'),
(221, 4, 'teste cron', '2023-06-24 15:15:03'),
(222, 4, 'teste cron', '2023-06-24 15:30:03'),
(223, 4, 'teste cron', '2023-06-24 15:45:02'),
(224, 4, 'teste cron', '2023-06-24 16:00:04'),
(225, 4, 'teste cron', '2023-06-24 16:15:02'),
(226, 4, 'teste cron', '2023-06-24 16:30:02'),
(227, 4, 'teste cron', '2023-06-24 16:45:03'),
(228, 4, 'teste cron', '2023-06-24 17:00:03'),
(229, 4, 'teste cron', '2023-06-24 17:15:03'),
(230, 4, 'teste cron', '2023-06-24 17:30:02'),
(231, 4, 'teste cron', '2023-06-24 17:45:03'),
(232, 4, 'teste cron', '2023-06-24 18:00:03'),
(233, 4, 'teste cron', '2023-06-24 18:15:03'),
(234, 4, 'teste cron', '2023-06-24 18:30:03'),
(235, 4, 'teste cron', '2023-06-24 18:45:02'),
(236, 4, 'teste cron', '2023-06-24 19:00:03'),
(237, 4, 'teste cron', '2023-06-24 19:15:02'),
(238, 4, 'teste cron', '2023-06-24 19:30:03'),
(239, 4, 'teste cron', '2023-06-24 19:45:02'),
(240, 4, 'teste cron', '2023-06-24 20:00:03'),
(241, 4, 'teste cron', '2023-06-24 20:15:01'),
(242, 4, 'teste cron', '2023-06-24 20:30:03'),
(243, 4, 'teste cron', '2023-06-24 20:45:02'),
(244, 4, 'teste cron', '2023-06-24 21:00:03'),
(245, 4, 'teste cron', '2023-06-24 21:15:03'),
(246, 4, 'teste cron', '2023-06-24 21:30:03'),
(247, 4, 'teste cron', '2023-06-24 21:45:03'),
(248, 4, 'teste cron', '2023-06-24 22:00:02'),
(249, 4, 'teste cron', '2023-06-24 22:15:02'),
(250, 4, 'teste cron', '2023-06-24 22:30:03'),
(251, 4, 'teste cron', '2023-06-24 22:45:02'),
(252, 4, 'teste cron', '2023-06-24 23:00:03'),
(253, 4, 'teste cron', '2023-06-24 23:15:02'),
(254, 4, 'teste cron', '2023-06-24 23:30:02'),
(255, 4, 'teste cron', '2023-06-24 23:45:03'),
(256, 4, 'teste cron', '2023-06-25 00:00:04'),
(257, 4, 'teste cron', '2023-06-25 00:15:03'),
(258, 4, 'teste cron', '2023-06-25 00:30:03'),
(259, 4, 'teste cron', '2023-06-25 00:45:02'),
(260, 4, 'teste cron', '2023-06-25 01:00:03'),
(261, 4, 'teste cron', '2023-06-25 01:15:02'),
(262, 4, 'teste cron', '2023-06-25 01:30:03'),
(263, 4, 'teste cron', '2023-06-25 01:45:03'),
(264, 4, 'teste cron', '2023-06-25 02:00:04'),
(265, 4, 'teste cron', '2023-06-25 02:15:02'),
(266, 4, 'teste cron', '2023-06-25 02:30:03'),
(267, 4, 'teste cron', '2023-06-25 02:45:03'),
(268, 4, 'teste cron', '2023-06-25 03:00:03'),
(269, 4, 'teste cron', '2023-06-25 03:15:03'),
(270, 4, 'teste cron', '2023-06-25 03:30:03'),
(271, 4, 'teste cron', '2023-06-25 03:45:03'),
(272, 4, 'teste cron', '2023-06-25 04:00:03'),
(273, 4, 'teste cron', '2023-06-25 04:15:02'),
(274, 4, 'teste cron', '2023-06-25 04:30:04'),
(275, 4, 'teste cron', '2023-06-25 04:45:02'),
(276, 4, 'teste cron', '2023-06-25 05:00:03'),
(277, 4, 'teste cron', '2023-06-25 05:15:02'),
(278, 4, 'teste cron', '2023-06-25 05:30:02'),
(279, 4, 'teste cron', '2023-06-25 05:45:03'),
(280, 4, 'teste cron', '2023-06-25 06:00:03'),
(281, 4, 'teste cron', '2023-06-25 06:15:02'),
(282, 4, 'teste cron', '2023-06-25 06:30:02'),
(283, 4, 'teste cron', '2023-06-25 06:45:02'),
(284, 4, 'teste cron', '2023-06-25 07:00:03'),
(285, 4, 'teste cron', '2023-06-25 07:15:03'),
(286, 4, 'teste cron', '2023-06-25 07:30:03'),
(287, 4, 'teste cron', '2023-06-25 07:45:03'),
(288, 4, 'teste cron', '2023-06-25 08:00:05'),
(289, 4, 'teste cron', '2023-06-25 08:15:03'),
(290, 4, 'teste cron', '2023-06-25 08:30:03'),
(291, 4, 'teste cron', '2023-06-25 08:45:03'),
(292, 4, 'teste cron', '2023-06-25 09:00:03'),
(293, 4, 'teste cron', '2023-06-25 09:15:03'),
(294, 4, 'teste cron', '2023-06-25 09:30:04'),
(295, 4, 'teste cron', '2023-06-25 09:45:03'),
(296, 4, 'teste cron', '2023-06-25 10:00:04'),
(297, 4, 'teste cron', '2023-06-25 10:15:03'),
(298, 4, 'teste cron', '2023-06-25 10:30:03'),
(299, 4, 'teste cron', '2023-06-25 10:45:02'),
(300, 4, 'teste cron', '2023-06-25 11:00:03'),
(301, 4, 'teste cron', '2023-06-25 11:15:02'),
(302, 4, 'teste cron', '2023-06-25 11:30:02'),
(303, 4, 'teste cron', '2023-06-25 11:45:02'),
(304, 4, 'teste cron', '2023-06-25 12:00:04'),
(305, 4, 'teste cron', '2023-06-25 12:15:03'),
(306, 4, 'teste cron', '2023-06-25 12:30:02'),
(307, 4, 'teste cron', '2023-06-25 12:45:03'),
(308, 4, 'teste cron', '2023-06-25 13:00:03'),
(309, 4, 'teste cron', '2023-06-25 13:15:02'),
(310, 4, 'teste cron', '2023-06-25 13:30:03'),
(311, 4, 'teste cron', '2023-06-25 13:45:03'),
(312, 4, 'teste cron', '2023-06-25 14:00:04'),
(313, 4, 'teste cron', '2023-06-25 14:15:03'),
(314, 4, 'teste cron', '2023-06-25 14:30:02'),
(315, 4, 'teste cron', '2023-06-25 14:45:01'),
(316, 4, 'teste cron', '2023-06-25 15:00:04'),
(317, 4, 'teste cron', '2023-06-25 15:15:03'),
(318, 4, 'teste cron', '2023-06-25 15:30:03'),
(319, 4, 'teste cron', '2023-06-25 15:45:03'),
(320, 4, 'teste cron', '2023-06-25 16:00:04'),
(321, 4, 'teste cron', '2023-06-25 16:15:03'),
(322, 4, 'teste cron', '2023-06-25 16:30:03'),
(323, 4, 'teste cron', '2023-06-25 16:45:03'),
(324, 4, 'teste cron', '2023-06-25 17:00:04'),
(325, 4, 'teste cron', '2023-06-25 17:15:03'),
(326, 4, 'teste cron', '2023-06-25 17:30:03'),
(327, 4, 'teste cron', '2023-06-25 17:45:03'),
(328, 4, 'teste cron', '2023-06-25 18:00:03'),
(329, 4, 'teste cron', '2023-06-25 18:15:03'),
(330, 4, 'teste cron', '2023-06-25 18:30:03'),
(331, 4, 'teste cron', '2023-06-25 18:45:02'),
(332, 4, 'teste cron', '2023-06-25 19:00:04'),
(333, 4, 'teste cron', '2023-06-25 19:15:03'),
(334, 4, 'teste cron', '2023-06-25 19:30:03'),
(335, 4, 'teste cron', '2023-06-25 19:45:03'),
(336, 4, 'teste cron', '2023-06-25 20:00:03'),
(337, 4, 'teste cron', '2023-06-25 20:15:02'),
(338, 4, 'teste cron', '2023-06-25 20:30:03'),
(339, 4, 'teste cron', '2023-06-25 20:45:02'),
(340, 4, 'teste cron', '2023-06-25 21:00:03'),
(341, 4, 'teste cron', '2023-06-25 21:15:02'),
(342, 4, 'teste cron', '2023-06-25 21:30:02'),
(343, 4, 'teste cron', '2023-06-25 21:45:03'),
(344, 4, 'teste cron', '2023-06-25 22:00:03'),
(345, 4, 'teste cron', '2023-06-25 22:15:03'),
(346, 4, 'teste cron', '2023-06-25 22:30:03'),
(347, 4, 'teste cron', '2023-06-25 22:45:02'),
(348, 4, 'teste cron', '2023-06-25 23:00:04'),
(349, 4, 'teste cron', '2023-06-25 23:15:02'),
(350, 4, 'teste cron', '2023-06-25 23:30:03'),
(351, 4, 'teste cron', '2023-06-25 23:45:03'),
(352, 4, 'teste cron', '2023-06-26 00:00:03'),
(353, 4, 'teste cron', '2023-06-26 00:15:03'),
(354, 4, 'teste cron', '2023-06-26 00:30:02'),
(355, 4, 'teste cron', '2023-06-26 00:45:03'),
(356, 4, 'teste cron', '2023-06-26 01:00:04'),
(357, 4, 'teste cron', '2023-06-26 01:15:03'),
(358, 4, 'teste cron', '2023-06-26 01:30:02'),
(359, 4, 'teste cron', '2023-06-26 01:45:03'),
(360, 4, 'teste cron', '2023-06-26 02:00:03'),
(361, 4, 'teste cron', '2023-06-26 02:15:02'),
(362, 4, 'teste cron', '2023-06-26 02:30:04'),
(363, 4, 'teste cron', '2023-06-26 02:45:03'),
(364, 4, 'teste cron', '2023-06-26 03:00:03'),
(365, 4, 'teste cron', '2023-06-26 03:15:03'),
(366, 4, 'teste cron', '2023-06-26 03:30:02'),
(367, 4, 'teste cron', '2023-06-26 03:45:02'),
(368, 4, 'teste cron', '2023-06-26 04:00:04'),
(369, 4, 'teste cron', '2023-06-26 04:15:02'),
(370, 4, 'teste cron', '2023-06-26 04:30:03'),
(371, 4, 'teste cron', '2023-06-26 04:45:02'),
(372, 4, 'teste cron', '2023-06-26 05:00:03'),
(373, 4, 'teste cron', '2023-06-26 05:15:02'),
(374, 4, 'teste cron', '2023-06-26 05:30:02'),
(375, 4, 'teste cron', '2023-06-26 05:45:03'),
(376, 4, 'teste cron', '2023-06-26 06:00:04'),
(377, 4, 'teste cron', '2023-06-26 06:15:03'),
(378, 4, 'teste cron', '2023-06-26 06:30:03'),
(379, 4, 'teste cron', '2023-06-26 06:45:02'),
(380, 4, 'teste cron', '2023-06-26 07:00:03'),
(381, 4, 'teste cron', '2023-06-26 07:15:02'),
(382, 4, 'teste cron', '2023-06-26 07:30:03'),
(383, 4, 'teste cron', '2023-06-26 07:45:03'),
(384, 4, 'teste cron', '2023-06-26 08:00:04'),
(385, 4, 'teste cron', '2023-06-26 08:15:03'),
(386, 4, 'teste cron', '2023-06-26 08:30:03'),
(387, 4, 'teste cron', '2023-06-26 08:45:02'),
(388, 4, 'teste cron', '2023-06-26 09:00:04'),
(389, 4, 'teste cron', '2023-06-26 09:15:02'),
(390, 4, 'teste cron', '2023-06-26 09:30:03'),
(391, 4, 'teste cron', '2023-06-26 09:45:03'),
(392, 4, 'teste cron', '2023-06-26 10:00:04'),
(393, 4, 'teste cron', '2023-06-26 10:15:02'),
(394, 4, 'teste cron', '2023-06-26 10:30:03'),
(395, 4, 'teste cron', '2023-06-26 10:45:02'),
(396, 4, 'teste cron', '2023-06-26 11:00:03'),
(397, 4, 'teste cron', '2023-06-26 11:15:03'),
(398, 4, 'teste cron', '2023-06-26 11:30:03'),
(399, 4, 'teste cron', '2023-06-26 11:45:02'),
(400, 4, 'teste cron', '2023-06-26 12:00:04'),
(401, 4, 'teste cron', '2023-06-26 12:15:02'),
(402, 4, 'teste cron', '2023-06-26 12:30:03'),
(403, 4, 'teste cron', '2023-06-26 12:45:02'),
(404, 4, 'teste cron', '2023-06-26 13:00:03'),
(405, 4, 'teste cron', '2023-06-26 13:15:02'),
(406, 4, 'teste cron', '2023-06-26 13:30:03'),
(407, 4, 'teste cron', '2023-06-26 13:45:02'),
(408, 4, 'teste cron', '2023-06-26 14:00:04'),
(409, 4, 'teste cron', '2023-06-26 14:15:02'),
(410, 4, 'teste cron', '2023-06-26 14:30:03'),
(411, 4, 'teste cron', '2023-06-26 14:45:03'),
(412, 4, 'teste cron', '2023-06-26 15:00:04'),
(413, 4, 'teste cron', '2023-06-26 15:15:02'),
(414, 4, 'teste cron', '2023-06-26 15:30:03'),
(415, 4, 'teste cron', '2023-06-26 15:45:02'),
(416, 4, 'teste cron', '2023-06-26 16:00:04'),
(417, 4, 'teste cron', '2023-06-26 16:15:02'),
(418, 4, 'teste cron', '2023-06-26 16:30:03'),
(419, 4, 'teste cron', '2023-06-26 16:45:02'),
(420, 4, 'teste cron', '2023-06-26 17:00:03'),
(421, 4, 'teste cron', '2023-06-26 17:15:02'),
(422, 4, 'teste cron', '2023-06-26 17:30:03'),
(423, 4, 'teste cron', '2023-06-26 17:45:02'),
(424, 4, 'teste cron', '2023-06-26 18:00:04'),
(425, 4, 'teste cron', '2023-06-26 18:15:03'),
(426, 4, 'teste cron', '2023-06-26 18:30:03'),
(427, 4, 'teste cron', '2023-06-26 18:45:03'),
(428, 4, 'teste cron', '2023-06-26 19:00:04'),
(429, 4, 'teste cron', '2023-06-26 19:15:03'),
(430, 4, 'teste cron', '2023-06-26 19:30:03'),
(431, 4, 'teste cron', '2023-06-26 19:45:03'),
(432, 4, 'teste cron', '2023-06-26 20:00:04'),
(433, 4, 'teste cron', '2023-06-26 20:15:02'),
(434, 4, 'teste cron', '2023-06-26 20:30:03'),
(435, 4, 'teste cron', '2023-06-26 20:45:02'),
(436, 4, 'teste cron', '2023-06-26 21:00:04'),
(437, 4, 'teste cron', '2023-06-26 21:15:03'),
(438, 4, 'teste cron', '2023-06-26 21:30:03'),
(439, 4, 'teste cron', '2023-06-26 21:45:03'),
(440, 4, 'teste cron', '2023-06-26 22:00:04'),
(441, 4, 'teste cron', '2023-06-26 22:15:03'),
(442, 4, 'teste cron', '2023-06-26 22:30:02'),
(443, 4, 'teste cron', '2023-06-26 22:45:03'),
(444, 4, 'teste cron', '2023-06-26 23:00:04'),
(445, 4, 'teste cron', '2023-06-26 23:15:02'),
(446, 4, 'teste cron', '2023-06-26 23:30:03'),
(447, 4, 'teste cron', '2023-06-26 23:45:03'),
(448, 4, 'teste cron', '2023-06-27 00:00:03'),
(449, 4, 'teste cron', '2023-06-27 00:15:03'),
(450, 4, 'teste cron', '2023-06-27 00:30:03'),
(451, 4, 'teste cron', '2023-06-27 00:45:03'),
(452, 4, 'teste cron', '2023-06-27 01:00:03'),
(453, 4, 'teste cron', '2023-06-27 01:15:03'),
(454, 4, 'teste cron', '2023-06-27 01:30:03'),
(455, 4, 'teste cron', '2023-06-27 01:45:02'),
(456, 4, 'teste cron', '2023-06-27 02:00:04'),
(457, 4, 'teste cron', '2023-06-27 02:15:02'),
(458, 4, 'teste cron', '2023-06-27 02:30:03'),
(459, 4, 'teste cron', '2023-06-27 02:45:01'),
(460, 4, 'teste cron', '2023-06-27 03:00:03'),
(461, 4, 'teste cron', '2023-06-27 03:15:03'),
(462, 4, 'teste cron', '2023-06-27 03:30:03'),
(463, 4, 'teste cron', '2023-06-27 03:45:02'),
(464, 4, 'teste cron', '2023-06-27 04:00:03'),
(465, 4, 'teste cron', '2023-06-27 04:15:03'),
(466, 4, 'teste cron', '2023-06-27 04:30:04'),
(467, 4, 'teste cron', '2023-06-27 04:45:03'),
(468, 4, 'teste cron', '2023-06-27 05:00:03'),
(469, 4, 'teste cron', '2023-06-27 05:15:03'),
(470, 4, 'teste cron', '2023-06-27 05:30:03'),
(471, 4, 'teste cron', '2023-06-27 05:45:02'),
(472, 4, 'teste cron', '2023-06-27 06:00:03'),
(473, 4, 'teste cron', '2023-06-27 06:15:03'),
(474, 4, 'teste cron', '2023-06-27 06:30:03'),
(475, 4, 'teste cron', '2023-06-27 06:45:02'),
(476, 4, 'teste cron', '2023-06-27 07:00:03'),
(477, 4, 'teste cron', '2023-06-27 07:15:03'),
(478, 4, 'teste cron', '2023-06-27 07:30:03'),
(479, 4, 'teste cron', '2023-06-27 07:45:03'),
(480, 4, 'teste cron', '2023-06-27 08:00:04'),
(481, 4, 'teste cron', '2023-06-27 08:15:02'),
(482, 4, 'teste cron', '2023-06-27 08:30:03'),
(483, 4, 'teste cron', '2023-06-27 08:45:02'),
(484, 4, 'teste cron', '2023-06-27 09:00:03'),
(485, 4, 'teste cron', '2023-06-27 09:15:02'),
(486, 4, 'teste cron', '2023-06-27 09:30:03'),
(487, 4, 'teste cron', '2023-06-27 09:45:03'),
(488, 4, 'teste cron', '2023-06-27 10:00:03'),
(489, 4, 'teste cron', '2023-06-27 10:15:02'),
(490, 4, 'teste cron', '2023-06-27 10:30:03'),
(491, 4, 'teste cron', '2023-06-27 10:45:02'),
(492, 4, 'teste cron', '2023-06-27 11:00:04'),
(493, 4, 'teste cron', '2023-06-27 11:15:02'),
(494, 4, 'teste cron', '2023-06-27 11:30:03'),
(495, 4, 'teste cron', '2023-06-27 11:45:02'),
(496, 4, 'teste cron', '2023-06-27 12:00:03'),
(497, 4, 'teste cron', '2023-06-27 12:15:02'),
(498, 4, 'teste cron', '2023-06-27 12:30:03'),
(499, 4, 'teste cron', '2023-06-27 12:45:02'),
(500, 4, 'teste cron', '2023-06-27 13:00:03'),
(501, 4, 'teste cron', '2023-06-27 13:15:03'),
(502, 4, 'teste cron', '2023-06-27 13:30:02'),
(503, 4, 'teste cron', '2023-06-27 13:45:02'),
(504, 4, 'teste cron', '2023-06-27 14:00:04'),
(505, 4, 'teste cron', '2023-06-27 14:15:02'),
(506, 4, 'teste cron', '2023-06-27 14:30:03'),
(507, 4, 'teste cron', '2023-06-27 14:45:02'),
(508, 4, 'teste cron', '2023-06-27 15:00:03'),
(509, 4, 'teste cron', '2023-06-27 15:15:02'),
(510, 4, 'teste cron', '2023-06-27 15:30:03'),
(511, 4, 'teste cron', '2023-06-27 15:45:02'),
(512, 4, 'teste cron', '2023-06-27 16:00:03'),
(513, 4, 'teste cron', '2023-06-27 16:15:02'),
(514, 4, 'teste cron', '2023-06-27 16:30:03'),
(515, 4, 'teste cron', '2023-06-27 16:45:03'),
(516, 4, 'teste cron', '2023-06-27 17:00:03'),
(517, 4, 'teste cron', '2023-06-27 17:15:02'),
(518, 4, 'teste cron', '2023-06-27 17:30:03'),
(519, 4, 'teste cron', '2023-06-27 17:45:03'),
(520, 4, 'teste cron', '2023-06-27 18:00:04'),
(521, 4, 'teste cron', '2023-06-27 18:15:02'),
(522, 4, 'teste cron', '2023-06-27 18:30:03'),
(523, 4, 'teste cron', '2023-06-27 18:45:03'),
(524, 4, 'teste cron', '2023-06-27 19:00:03'),
(525, 4, 'teste cron', '2023-06-27 19:15:03'),
(526, 4, 'teste cron', '2023-06-27 19:30:02'),
(527, 4, 'teste cron', '2023-06-27 19:45:02'),
(528, 4, 'teste cron', '2023-06-27 20:00:05'),
(529, 4, 'teste cron', '2023-06-27 20:15:02'),
(530, 4, 'teste cron', '2023-06-27 20:30:03'),
(531, 4, 'teste cron', '2023-06-27 20:45:02'),
(532, 4, 'teste cron', '2023-06-27 21:00:02'),
(533, 4, 'teste cron', '2023-06-27 21:15:03'),
(534, 4, 'teste cron', '2023-06-27 21:30:03'),
(535, 4, 'teste cron', '2023-06-27 21:45:03'),
(536, 4, 'teste cron', '2023-06-27 22:00:04'),
(537, 4, 'teste cron', '2023-06-27 22:15:02'),
(538, 4, 'teste cron', '2023-06-27 22:30:03'),
(539, 4, 'teste cron', '2023-06-27 22:45:03'),
(540, 4, 'teste cron', '2023-06-27 23:00:04'),
(541, 4, 'teste cron', '2023-06-27 23:15:02'),
(542, 4, 'teste cron', '2023-06-27 23:30:03'),
(543, 4, 'teste cron', '2023-06-27 23:45:02'),
(544, 4, 'teste cron', '2023-06-28 00:00:03'),
(545, 4, 'teste cron', '2023-06-28 00:15:02'),
(546, 4, 'teste cron', '2023-06-28 00:30:03'),
(547, 4, 'teste cron', '2023-06-28 00:45:02'),
(548, 4, 'teste cron', '2023-06-28 01:00:04'),
(549, 4, 'teste cron', '2023-06-28 01:15:03'),
(550, 4, 'teste cron', '2023-06-28 01:30:03'),
(551, 4, 'teste cron', '2023-06-28 01:45:02'),
(552, 4, 'teste cron', '2023-06-28 02:00:03'),
(553, 4, 'teste cron', '2023-06-28 02:15:02'),
(554, 4, 'teste cron', '2023-06-28 02:30:03'),
(555, 4, 'teste cron', '2023-06-28 02:45:02'),
(556, 4, 'teste cron', '2023-06-28 03:00:03'),
(557, 4, 'teste cron', '2023-06-28 03:15:03'),
(558, 4, 'teste cron', '2023-06-28 03:30:03'),
(559, 4, 'teste cron', '2023-06-28 03:45:02'),
(560, 4, 'teste cron', '2023-06-28 04:00:03'),
(561, 4, 'teste cron', '2023-06-28 04:15:03'),
(562, 4, 'teste cron', '2023-06-28 04:30:03'),
(563, 4, 'teste cron', '2023-06-28 04:45:03'),
(564, 4, 'teste cron', '2023-06-28 05:00:03'),
(565, 4, 'teste cron', '2023-06-28 05:15:03'),
(566, 4, 'teste cron', '2023-06-28 05:30:03'),
(567, 4, 'teste cron', '2023-06-28 05:45:02'),
(568, 4, 'teste cron', '2023-06-28 06:00:04'),
(569, 4, 'teste cron', '2023-06-28 06:15:03'),
(570, 4, 'teste cron', '2023-06-28 06:30:02'),
(571, 4, 'teste cron', '2023-06-28 06:45:03'),
(572, 4, 'teste cron', '2023-06-28 07:00:03'),
(573, 4, 'teste cron', '2023-06-28 07:15:02'),
(574, 4, 'teste cron', '2023-06-28 07:30:02'),
(575, 4, 'teste cron', '2023-06-28 07:45:02'),
(576, 4, 'teste cron', '2023-06-28 08:00:04'),
(577, 4, 'teste cron', '2023-06-28 08:15:03'),
(578, 4, 'teste cron', '2023-06-28 08:30:03'),
(579, 4, 'teste cron', '2023-06-28 08:45:02'),
(580, 4, 'teste cron', '2023-06-28 09:00:03'),
(581, 4, 'teste cron', '2023-06-28 09:15:02'),
(582, 4, 'teste cron', '2023-06-28 09:30:03'),
(583, 4, 'teste cron', '2023-06-28 09:45:03'),
(584, 4, 'teste cron', '2023-06-28 10:00:03'),
(585, 4, 'teste cron', '2023-06-28 10:15:02'),
(586, 4, 'teste cron', '2023-06-28 10:30:03'),
(587, 4, 'teste cron', '2023-06-28 10:45:02'),
(588, 4, 'teste cron', '2023-06-28 11:00:04'),
(589, 4, 'teste cron', '2023-06-28 11:15:02'),
(590, 4, 'teste cron', '2023-06-28 11:30:03'),
(591, 4, 'teste cron', '2023-06-28 11:45:02'),
(592, 4, 'teste cron', '2023-06-28 12:00:03'),
(593, 4, 'teste cron', '2023-06-28 12:15:02'),
(594, 4, 'teste cron', '2023-06-28 12:30:03'),
(595, 4, 'teste cron', '2023-06-28 12:45:02'),
(596, 4, 'teste cron', '2023-06-28 13:00:03'),
(597, 4, 'teste cron', '2023-06-28 13:15:01'),
(598, 4, 'teste cron', '2023-06-28 13:30:03'),
(599, 4, 'teste cron', '2023-06-28 13:45:02'),
(600, 4, 'teste cron', '2023-06-28 14:00:02'),
(601, 4, 'teste cron', '2023-06-28 14:15:03'),
(602, 4, 'teste cron', '2023-06-28 14:30:03'),
(603, 4, 'teste cron', '2023-06-28 14:45:02'),
(604, 4, 'teste cron', '2023-06-28 15:00:04'),
(605, 4, 'teste cron', '2023-06-28 15:15:02'),
(606, 4, 'teste cron', '2023-06-28 15:30:03'),
(607, 4, 'teste cron', '2023-06-28 15:45:02'),
(608, 4, 'teste cron', '2023-06-28 16:00:03'),
(609, 4, 'teste cron', '2023-06-28 16:15:03'),
(610, 4, 'teste cron', '2023-06-28 16:30:03'),
(611, 4, 'teste cron', '2023-06-28 16:45:03'),
(612, 4, 'teste cron', '2023-06-28 17:00:03'),
(613, 4, 'teste cron', '2023-06-28 17:15:02'),
(614, 4, 'teste cron', '2023-06-28 17:30:03'),
(615, 4, 'teste cron', '2023-06-28 17:45:02'),
(616, 4, 'teste cron', '2023-06-28 18:00:04'),
(617, 4, 'teste cron', '2023-06-28 18:15:02'),
(618, 4, 'teste cron', '2023-06-28 18:30:02'),
(619, 4, 'teste cron', '2023-06-28 18:45:02'),
(620, 4, 'teste cron', '2023-06-28 19:00:03'),
(621, 4, 'teste cron', '2023-06-28 19:15:03'),
(622, 4, 'teste cron', '2023-06-28 19:30:03'),
(623, 4, 'teste cron', '2023-06-28 19:45:03'),
(624, 4, 'teste cron', '2023-06-28 20:00:04'),
(625, 4, 'teste cron', '2023-06-28 20:15:03'),
(626, 4, 'teste cron', '2023-06-28 20:30:03'),
(627, 4, 'teste cron', '2023-06-28 20:45:03'),
(628, 4, 'teste cron', '2023-06-28 21:00:03'),
(629, 4, 'teste cron', '2023-06-28 21:15:03'),
(630, 4, 'teste cron', '2023-06-28 21:30:02'),
(631, 4, 'teste cron', '2023-06-28 21:45:02'),
(632, 4, 'teste cron', '2023-06-28 22:00:04'),
(633, 4, 'teste cron', '2023-06-28 22:15:03'),
(634, 4, 'teste cron', '2023-06-28 22:30:03'),
(635, 4, 'teste cron', '2023-06-28 22:45:03'),
(636, 4, 'teste cron', '2023-06-28 23:00:04'),
(637, 4, 'teste cron', '2023-06-28 23:15:01'),
(638, 4, 'teste cron', '2023-06-28 23:30:02'),
(639, 4, 'teste cron', '2023-06-28 23:45:03'),
(640, 4, 'teste cron', '2023-06-29 00:00:03'),
(641, 4, 'teste cron', '2023-06-29 00:15:02'),
(642, 4, 'teste cron', '2023-06-29 00:30:03'),
(643, 4, 'teste cron', '2023-06-29 00:45:02'),
(644, 4, 'teste cron', '2023-06-29 01:00:04'),
(645, 4, 'teste cron', '2023-06-29 01:15:02'),
(646, 4, 'teste cron', '2023-06-29 01:30:03'),
(647, 4, 'teste cron', '2023-06-29 01:45:02'),
(648, 4, 'teste cron', '2023-06-29 02:00:03'),
(649, 4, 'teste cron', '2023-06-29 02:15:03'),
(650, 4, 'teste cron', '2023-06-29 02:30:03'),
(651, 4, 'teste cron', '2023-06-29 02:45:02'),
(652, 4, 'teste cron', '2023-06-29 03:00:04'),
(653, 4, 'teste cron', '2023-06-29 03:15:02'),
(654, 4, 'teste cron', '2023-06-29 03:30:03'),
(655, 4, 'teste cron', '2023-06-29 03:45:02'),
(656, 4, 'teste cron', '2023-06-29 04:00:03'),
(657, 4, 'teste cron', '2023-06-29 04:15:02'),
(658, 4, 'teste cron', '2023-06-29 04:30:04'),
(659, 4, 'teste cron', '2023-06-29 04:45:03'),
(660, 4, 'teste cron', '2023-06-29 05:00:03'),
(661, 4, 'teste cron', '2023-06-29 05:15:02'),
(662, 4, 'teste cron', '2023-06-29 05:30:03'),
(663, 4, 'teste cron', '2023-06-29 05:45:02'),
(664, 4, 'teste cron', '2023-06-29 06:00:04'),
(665, 4, 'teste cron', '2023-06-29 06:15:02'),
(666, 4, 'teste cron', '2023-06-29 06:30:02'),
(667, 4, 'teste cron', '2023-06-29 06:45:02'),
(668, 4, 'teste cron', '2023-06-29 07:00:03'),
(669, 4, 'teste cron', '2023-06-29 07:15:03'),
(670, 4, 'teste cron', '2023-06-29 07:30:02'),
(671, 4, 'teste cron', '2023-06-29 07:45:02'),
(672, 4, 'teste cron', '2023-06-29 08:00:04'),
(673, 4, 'teste cron', '2023-06-29 08:15:02'),
(674, 4, 'teste cron', '2023-06-29 08:30:03'),
(675, 4, 'teste cron', '2023-06-29 08:45:02'),
(676, 4, 'teste cron', '2023-06-29 09:00:04'),
(677, 4, 'teste cron', '2023-06-29 09:15:02'),
(678, 4, 'teste cron', '2023-06-29 09:30:03'),
(679, 4, 'teste cron', '2023-06-29 09:45:02'),
(680, 4, 'teste cron', '2023-06-29 10:00:03'),
(681, 4, 'teste cron', '2023-06-29 10:15:02'),
(682, 4, 'teste cron', '2023-06-29 10:30:04'),
(683, 4, 'teste cron', '2023-06-29 10:45:02'),
(684, 4, 'teste cron', '2023-06-29 11:00:03'),
(685, 4, 'teste cron', '2023-06-29 11:15:02'),
(686, 4, 'teste cron', '2023-06-29 11:30:03'),
(687, 4, 'teste cron', '2023-06-29 11:45:03'),
(688, 4, 'teste cron', '2023-06-29 12:00:03'),
(689, 4, 'teste cron', '2023-06-29 12:15:02'),
(690, 4, 'teste cron', '2023-06-29 12:30:03'),
(691, 4, 'teste cron', '2023-06-29 12:45:02'),
(692, 4, 'teste cron', '2023-06-29 13:00:03'),
(693, 4, 'teste cron', '2023-06-29 13:15:02'),
(694, 4, 'teste cron', '2023-06-29 13:30:03'),
(695, 4, 'teste cron', '2023-06-29 13:45:03'),
(696, 4, 'teste cron', '2023-06-29 14:00:04'),
(697, 4, 'teste cron', '2023-06-29 14:15:02'),
(698, 4, 'teste cron', '2023-06-29 14:30:03'),
(699, 4, 'teste cron', '2023-06-29 14:45:02'),
(700, 4, 'teste cron', '2023-06-29 15:00:04'),
(701, 4, 'teste cron', '2023-06-29 15:15:02'),
(702, 4, 'teste cron', '2023-06-29 15:30:03'),
(703, 4, 'teste cron', '2023-06-29 15:45:02'),
(704, 4, 'teste cron', '2023-06-29 16:00:04'),
(705, 4, 'teste cron', '2023-06-29 16:15:02'),
(706, 4, 'teste cron', '2023-06-29 16:30:03'),
(707, 4, 'teste cron', '2023-06-29 16:45:03'),
(708, 4, 'teste cron', '2023-06-29 17:00:04'),
(709, 4, 'teste cron', '2023-06-29 17:15:02'),
(710, 4, 'teste cron', '2023-06-29 17:30:02'),
(711, 4, 'teste cron', '2023-06-29 17:45:03'),
(712, 4, 'teste cron', '2023-06-29 18:00:03'),
(713, 4, 'teste cron', '2023-06-29 18:15:03'),
(714, 4, 'teste cron', '2023-06-29 18:30:02'),
(715, 4, 'teste cron', '2023-06-29 18:45:02'),
(716, 4, 'teste cron', '2023-06-29 19:00:04'),
(717, 4, 'teste cron', '2023-06-29 19:15:02'),
(718, 4, 'teste cron', '2023-06-29 19:30:03'),
(719, 4, 'teste cron', '2023-06-29 19:45:03'),
(720, 4, 'teste cron', '2023-06-29 20:00:03'),
(721, 4, 'teste cron', '2023-06-29 20:15:03'),
(722, 4, 'teste cron', '2023-06-29 20:30:03'),
(723, 4, 'teste cron', '2023-06-29 20:45:03'),
(724, 4, 'teste cron', '2023-06-29 21:00:03'),
(725, 4, 'teste cron', '2023-06-29 21:15:02'),
(726, 4, 'teste cron', '2023-06-29 21:30:03'),
(727, 4, 'teste cron', '2023-06-29 21:45:02'),
(728, 4, 'teste cron', '2023-06-29 22:00:03'),
(729, 4, 'teste cron', '2023-06-29 22:15:03'),
(730, 4, 'teste cron', '2023-06-29 22:30:03'),
(731, 4, 'teste cron', '2023-06-29 22:45:02'),
(732, 4, 'teste cron', '2023-06-29 23:00:03'),
(733, 4, 'teste cron', '2023-06-29 23:15:02'),
(734, 4, 'teste cron', '2023-06-29 23:30:03'),
(735, 4, 'teste cron', '2023-06-29 23:45:02'),
(736, 4, 'teste cron', '2023-06-30 00:00:04'),
(737, 4, 'teste cron', '2023-06-30 00:15:02'),
(738, 4, 'teste cron', '2023-06-30 00:30:03'),
(739, 4, 'teste cron', '2023-06-30 00:45:02'),
(740, 4, 'teste cron', '2023-06-30 01:00:04'),
(741, 4, 'teste cron', '2023-06-30 01:15:03'),
(742, 4, 'teste cron', '2023-06-30 01:30:03'),
(743, 4, 'teste cron', '2023-06-30 01:45:02'),
(744, 4, 'teste cron', '2023-06-30 02:00:04'),
(745, 4, 'teste cron', '2023-06-30 02:15:02'),
(746, 4, 'teste cron', '2023-06-30 02:30:03'),
(747, 4, 'teste cron', '2023-06-30 02:45:03'),
(748, 4, 'teste cron', '2023-06-30 03:00:03'),
(749, 4, 'teste cron', '2023-06-30 03:15:03'),
(750, 4, 'teste cron', '2023-06-30 03:30:03'),
(751, 4, 'teste cron', '2023-06-30 03:45:03'),
(752, 4, 'teste cron', '2023-06-30 04:00:04'),
(753, 4, 'teste cron', '2023-06-30 04:15:03'),
(754, 4, 'teste cron', '2023-06-30 04:30:04'),
(755, 4, 'teste cron', '2023-06-30 04:45:02'),
(756, 4, 'teste cron', '2023-06-30 05:00:03'),
(757, 4, 'teste cron', '2023-06-30 05:15:03'),
(758, 4, 'teste cron', '2023-06-30 05:30:03'),
(759, 4, 'teste cron', '2023-06-30 05:45:03'),
(760, 4, 'teste cron', '2023-06-30 06:00:04'),
(761, 4, 'teste cron', '2023-06-30 06:15:03'),
(762, 4, 'teste cron', '2023-06-30 06:30:02'),
(763, 4, 'teste cron', '2023-06-30 06:45:03'),
(764, 4, 'teste cron', '2023-06-30 07:00:02'),
(765, 4, 'teste cron', '2023-06-30 07:15:02'),
(766, 4, 'teste cron', '2023-06-30 07:30:03'),
(767, 4, 'teste cron', '2023-06-30 07:45:03'),
(768, 4, 'teste cron', '2023-06-30 08:00:03'),
(769, 4, 'teste cron', '2023-06-30 08:15:03'),
(770, 4, 'teste cron', '2023-06-30 08:30:03'),
(771, 4, 'teste cron', '2023-06-30 08:45:02'),
(772, 4, 'teste cron', '2023-06-30 09:00:03'),
(773, 4, 'teste cron', '2023-06-30 09:15:02'),
(774, 4, 'teste cron', '2023-06-30 09:30:03'),
(775, 4, 'teste cron', '2023-06-30 09:45:02'),
(776, 4, 'teste cron', '2023-06-30 10:00:04'),
(777, 4, 'teste cron', '2023-06-30 10:15:02'),
(778, 4, 'teste cron', '2023-06-30 10:30:02'),
(779, 4, 'teste cron', '2023-06-30 10:45:03'),
(780, 4, 'teste cron', '2023-06-30 11:00:04'),
(781, 4, 'teste cron', '2023-06-30 11:15:02');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblbusinesscategory`
--
ALTER TABLE `tblbusinesscategory`
  ADD CONSTRAINT `tblBusinessCategory_ibfk_1` FOREIGN KEY (`idBusiness`) REFERENCES `tblbusiness` (`idBusiness`);

--
-- Limitadores para a tabela `tblcontract`
--
ALTER TABLE `tblcontract`
  ADD CONSTRAINT `tblContract_ibfk_1` FOREIGN KEY (`IdContractType`) REFERENCES `tblcontracttypes` (`IdContractType`);

--
-- Limitadores para a tabela `tbllogerror`
--
ALTER TABLE `tbllogerror`
  ADD CONSTRAINT `tblLogError_ibfk_1` FOREIGN KEY (`IdError`) REFERENCES `tbllogerrorcode` (`idLogErrorCode`);

--
-- Limitadores para a tabela `tblsearch`
--
ALTER TABLE `tblsearch`
  ADD CONSTRAINT `tblsearch_ibfk_1` FOREIGN KEY (`coreBussinessID`) REFERENCES `tbloperations` (`idOperation`),
  ADD CONSTRAINT `tblsearch_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `tbluserclients` (`idClient`);

--
-- Limitadores para a tabela `tblsearchbusiness`
--
ALTER TABLE `tblsearchbusiness`
  ADD CONSTRAINT `tblsearchbusiness_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`),
  ADD CONSTRAINT `tblsearchbusiness_ibfk_2` FOREIGN KEY (`idBusiness`) REFERENCES `tblbusiness` (`idBusiness`);

--
-- Limitadores para a tabela `tblsearchcategory`
--
ALTER TABLE `tblsearchcategory`
  ADD CONSTRAINT `tblsearchcategory_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`),
  ADD CONSTRAINT `tblsearchcategory_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `tblbusinesscategory` (`idBusinessCategory`);

--
-- Limitadores para a tabela `tblsearchcountry`
--
ALTER TABLE `tblsearchcountry`
  ADD CONSTRAINT `tblsearchcountry_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`),
  ADD CONSTRAINT `tblsearchcountry_ibfk_2` FOREIGN KEY (`idCountry`) REFERENCES `tblcountry` (`idCountry`);

--
-- Limitadores para a tabela `tblsearchespecificationtag`
--
ALTER TABLE `tblsearchespecificationtag`
  ADD CONSTRAINT `tblsearchespecificationtag_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`);

--
-- Limitadores para a tabela `tblsearchresults`
--
ALTER TABLE `tblsearchresults`
  ADD CONSTRAINT `tblsearchresults_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`),
  ADD CONSTRAINT `tblsearchresults_ibfk_2` FOREIGN KEY (`idClientPesquisador`) REFERENCES `tbluserclients` (`idClient`),
  ADD CONSTRAINT `tblsearchresults_ibfk_3` FOREIGN KEY (`idClientResultado`) REFERENCES `tbluserclients` (`idClient`);

--
-- Limitadores para a tabela `tblsearchspecification`
--
ALTER TABLE `tblsearchspecification`
  ADD CONSTRAINT `tblsearchspecification_ibfk_1` FOREIGN KEY (`idSearch`) REFERENCES `tblsearch` (`idSearch`),
  ADD CONSTRAINT `tblsearchspecification_ibfk_2` FOREIGN KEY (`idNumEmpregados`) REFERENCES `tblnumempregados` (`idNumEmpregados`),
  ADD CONSTRAINT `tblsearchspecification_ibfk_3` FOREIGN KEY (`idlRangeValue`) REFERENCES `tblrangevalues` (`idlRangeValue`),
  ADD CONSTRAINT `tblsearchspecification_ibfk_4` FOREIGN KEY (`idNivelOperacao`) REFERENCES `tblniveloperacao` (`idNivelOperacao`);

DELIMITER $$
--
-- Eventos
--
DROP EVENT IF EXISTS `teste`$$
CREATE DEFINER=`root`@`localhost` EVENT `teste` ON SCHEDULE EVERY 10 SECOND STARTS '2023-09-08 10:51:29' ON COMPLETION PRESERVE ENABLE DO CALL ProcedureMestre()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
