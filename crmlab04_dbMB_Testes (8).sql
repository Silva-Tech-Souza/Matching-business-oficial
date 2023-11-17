-- Active: 1694553335993@@127.0.0.1@3306@crmlab04_dbmb_testes
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/11/2023 às 13:24
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.16

USE crmlab04_dbmb_testes;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crmlab04_dbMB_Testes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcurtidas`
--

CREATE TABLE `tbcurtidas` (
  `id` int(11) NOT NULL,
  `idpost` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `data` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hora` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbcurtidas`
--

INSERT INTO `tbcurtidas` (`id`, `idpost`, `idusuario`, `data`, `hora`) VALUES
(83, 301, 30, '2023-11-01', '15:04'),
(84, 305, 30, '2023-11-01', '15:04'),
(85, 303, 30, '2023-11-01', '15:04'),
(86, 304, 30, '2023-11-01', '15:04'),
(87, 302, 30, '2023-11-01', '15:04'),
(88, 300, 30, '2023-11-01', '15:04'),
(89, 306, 30, '2023-11-01', '15:04'),
(90, 308, 31, '2023-11-01', '15:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblAction`
--

CREATE TABLE `tblAction` (
  `IdAction` int(11) NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblAds`
--

CREATE TABLE `tblAds` (
  `IdAd` int(11) NOT NULL,
  `IdCustomer` int(11) DEFAULT NULL,
  `AdLocal` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdOrder` int(11) DEFAULT NULL,
  `AdPicturePath` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdLink` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdStartDate` datetime DEFAULT NULL,
  `AdEndDate` datetime DEFAULT NULL,
  `AdFlagActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblAds`
--

INSERT INTO `tblAds` (`IdAd`, `IdCustomer`, `AdLocal`, `AdOrder`, `AdPicturePath`, `AdLink`, `AdStartDate`, `AdEndDate`, `AdFlagActive`) VALUES
(2, 1, '1', 1, 'View/img/publicidade/bioCompression.png', 'https://biocompression.com/', NULL, NULL, b'0'),
(3, 2, '1', 2, 'View/img/publicidade/Kestal.png', 'https://www.kestal.com.br/', NULL, NULL, b'0'),
(4, 3, '1', 3, 'View/img/publicidade/Kontour.png', 'http://www.kontourmedical.com/', NULL, NULL, b'0'),
(5, 4, '1', 4, 'View/img/publicidade/mediPlus.png', 'https://www.mediplusindia.com/', NULL, NULL, b'0'),
(6, 5, '1', 5, 'View/img/publicidade/phimed.jpg', 'https://phimedeurope.com/', NULL, NULL, b'1'),
(7, 6, '1', 6, 'View/img/publicidade/spineguard.png', 'https://www.spineguard.com/', NULL, NULL, b'0'),
(8, 7, '1', 7, 'View/img/publicidade/xny.png', 'http://www.xnymedical.com/', NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblAdsLocal`
--

CREATE TABLE `tblAdsLocal` (
  `AdLocalId` int(11) NOT NULL,
  `AdLocalCode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AdLocalObs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblAdsLocal`
--

INSERT INTO `tblAdsLocal` (`AdLocalId`, `AdLocalCode`, `AdLocalObs`) VALUES
(1, 'FEED_CARROSSEL', NULL),
(2, 'FEED_BOTTOMRIGHT', NULL),
(3, 'FEED_BOTTOMLEFT', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblBusiness`
--

CREATE TABLE `tblBusiness` (
  `idBusiness` int(11) NOT NULL,
  `NmBusiness` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FlagOperation` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `IdOperation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblBusiness`
--

INSERT INTO `tblBusiness` (`idBusiness`, `NmBusiness`, `FlagOperation`, `IdOperation`) VALUES
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
-- Estrutura para tabela `tblBusinessCategory`
--

CREATE TABLE `tblBusinessCategory` (
  `idBusinessCategory` int(11) NOT NULL,
  `idBusiness` int(11) NOT NULL,
  `NmBusinessCategory` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblBusinessCategory`
--

INSERT INTO `tblBusinessCategory` (`idBusinessCategory`, `idBusiness`, `NmBusinessCategory`) VALUES
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
(391, 8, 'Spine & Craneo Implant'),
(392, 3, 'Functional Diagnostics Diabetic Foot');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblChat`
--

CREATE TABLE `tblChat` (
  `idChat` int(11) NOT NULL,
  `Text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idClient` int(11) NOT NULL,
  `idClientEnviado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblChat`
--

INSERT INTO `tblChat` (`idChat`, `Text`, `Date`, `idClient`, `idClientEnviado`) VALUES
(126, 'oi', '2023-11-01 17:00:30', 30, 28),
(127, 'lucas', '2023-11-01 17:00:40', 28, 30),
(128, 'dfgdfgaFGDFdfsdfsdf', '2023-11-01 17:01:01', 28, 30),
(129, 'testeeeeeeeeeeee', '2023-11-01 17:01:12', 30, 28),
(130, 'dfsdfsdf', '2023-11-01 17:03:20', 28, 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblClientsContracts`
--

CREATE TABLE `tblClientsContracts` (
  `IdClientContract` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `idContract` int(11) NOT NULL,
  `DateOfContract` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblconect`
--

CREATE TABLE `tblconect` (
  `id` int(11) NOT NULL,
  `idUserPed` int(11) NOT NULL,
  `idUserReceb` int(11) NOT NULL,
  `datapedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblconect`
--

INSERT INTO `tblconect` (`id`, `idUserPed`, `idUserReceb`, `datapedido`, `status`) VALUES
(44, 31, 28, '2023-11-01 16:58:57', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblContract`
--

CREATE TABLE `tblContract` (
  `idContract` int(11) NOT NULL,
  `IdContractType` int(11) NOT NULL DEFAULT '1',
  `ContractText` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ContractFlagAtive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblContract`
--

INSERT INTO `tblContract` (`idContract`, `IdContractType`, `ContractText`, `ContractFlagAtive`) VALUES
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
-- Estrutura para tabela `tblContractTypes`
--

CREATE TABLE `tblContractTypes` (
  `IdContractType` int(11) NOT NULL,
  `ContractType` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ContractText` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblContractTypes`
--

INSERT INTO `tblContractTypes` (`IdContractType`, `ContractType`, `ContractText`) VALUES
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
-- Estrutura para tabela `tblCountry`
--

CREATE TABLE `tblCountry` (
  `idCountry` int(11) NOT NULL,
  `NmCountry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Continent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblCountry`
--

INSERT INTO `tblCountry` (`idCountry`, `NmCountry`, `Continent`) VALUES
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
-- Estrutura para tabela `tblCustomer`
--

CREATE TABLE `tblCustomer` (
  `IdCustomer` int(11) NOT NULL,
  `CustomerName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CustomerObs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblCustomer`
--

INSERT INTO `tblCustomer` (`IdCustomer`, `CustomerName`, `CustomerObs`) VALUES
(1, 'BIOCOMPRESSION', NULL),
(2, 'KESTAL', NULL),
(3, 'KONTOUR', NULL),
(4, 'MEDIPLUS', NULL),
(5, 'PHIMED', NULL),
(6, 'SPINEGUARD', NULL),
(7, 'XNY', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblDistributorProfile`
--

CREATE TABLE `tblDistributorProfile` (
  `idDistributorProfile` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `AnoFundacao` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumEmpregados` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumVendedores` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NivelOperacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DetalheRegiao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fob_3Y` int(11) DEFAULT NULL,
  `Vol_3Y` int(11) DEFAULT NULL,
  `Fob_2Y` int(11) DEFAULT NULL,
  `Vol_2Y` int(11) DEFAULT NULL,
  `Fob_1Y` int(11) DEFAULT NULL,
  `Vol_1Y` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='		';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblEmpresas`
--

CREATE TABLE `tblEmpresas` (
  `id` int(11) NOT NULL,
  `nome` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `taxid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idClient` int(11) NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fotoperfil` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fotobanner` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redesocial` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site` varchar(130) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colab1` int(11) NOT NULL DEFAULT '0',
  `colab2` int(11) NOT NULL DEFAULT '0',
  `colab3` int(11) NOT NULL DEFAULT '0',
  `colab4` int(11) NOT NULL DEFAULT '0',
  `colab5` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblEmpresas`
--

INSERT INTO `tblEmpresas` (`id`, `nome`, `taxid`, `idClient`, `descricao`, `fotoperfil`, `fotobanner`, `redesocial`, `site`, `pais`, `email`, `numero`, `colab1`, `colab2`, `colab3`, `colab4`, `colab5`) VALUES
(22, 'SILVA TECH SOUZA', '51.517.599/0001-76', 28, 'Nossa jornada começou em 2019, num quarto com um computador e uma chama inextinguível. O que parecia improvável tornou-se nossa faísca, inflamando a paixão pela criação de soluções inteligentes e intuitivas. Embora não dispuséssemos das ferramentas mais avançadas, a determinação transbordava. A cada obstáculo, vislumbramos uma oportunidade para inovar, para moldar o futuro digital. Hoje, a Silva Tech Souza é a materialização desses esforços incansáveis. Uma equipe unida e diversificada, movida p', 'assets/img/22/PersonalUser_22.png', 'assets/img/22/LogoPicture_22.png', ' @silvatechsouza', '  @SILVATECHSOUZA', 384, NULL, NULL, 28, 0, 0, 0, 0),
(23, 'youtube.com', '5651151611561516516', 29, NULL, NULL, NULL, NULL, NULL, 384, NULL, NULL, 29, 0, 0, 0, 0),
(24, 'NTECH', '51.888.999/0001-98', 30, NULL, NULL, NULL, NULL, NULL, 384, NULL, NULL, 30, 0, 0, 0, 0),
(25, 'STS', '151956119561596', 31, NULL, NULL, NULL, NULL, NULL, 384, NULL, NULL, 31, 0, 0, 0, 0),
(26, 'SOUZA SILVA TECH', 'sadasdasdasda', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblFeeds`
--

CREATE TABLE `tblFeeds` (
  `IdFeed` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `Published_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Text` text COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Video` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblFeeds`
--

INSERT INTO `tblFeeds` (`IdFeed`, `IdClient`, `Published_at`, `Title`, `Text`, `Image`, `Video`) VALUES
(300, 30, '2023-11-01 14:29:28', 'teste\r\n', 'teste\r\n', '', ''),
(304, 31, '2023-11-01 15:04:16', '..\r\n', '..\r\n', '', ''),
(305, 31, '2023-11-01 15:04:20', '--', '--', '', ''),
(306, 31, '2023-11-01 15:04:26', '..007', '..007', '', ''),
(307, 31, '2023-11-01 15:10:51', 'teste teste', 'teste teste', '', ''),
(308, 31, '2023-11-01 15:11:19', 'Conheça o Natysa Braids', 'Conheça o Natysa Braids', 'assets/img/feed/31/Post_31_675b10e0128f17d810a1284a73b5a2a0.png', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblFlagStatusCadastro`
--

CREATE TABLE `tblFlagStatusCadastro` (
  `idFlagStatusCadastro` int(11) NOT NULL,
  `NmFlagStatusCadastro` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Contexto` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblFlagStatusCadastro`
--

INSERT INTO `tblFlagStatusCadastro` (`idFlagStatusCadastro`, `NmFlagStatusCadastro`, `Contexto`) VALUES
(1, 'OK ', 'CADASTRO BÁSICO'),
(2, 'NOK', 'PRÉ- CADASTRO BÁSICO'),
(3, 'NOK', 'CADASTRO QUALIFICAÇÂO'),
(4, 'OK', 'CADASTRO QUALIFICAÇÃO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblHelp`
--

CREATE TABLE `tblHelp` (
  `idHelp` int(11) NOT NULL,
  `IdCodLocal` int(11) NOT NULL,
  `HelpText` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblLogAction`
--

CREATE TABLE `tblLogAction` (
  `idLogAction` int(11) NOT NULL,
  `DescLogAction` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblLogActivity`
--

CREATE TABLE `tblLogActivity` (
  `idLogActivity` int(11) NOT NULL,
  `IdModule` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idLogAction` int(11) NOT NULL,
  `LogDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LogAuxText` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblLogActivity`
--

INSERT INTO `tblLogActivity` (`idLogActivity`, `IdModule`, `idClient`, `idLogAction`, `LogDate`, `LogAuxText`) VALUES
(139, 39, 2, 0, '2023-06-30 16:25:21', 'INSERT INTO tblSearchProfile_Results ( SearchProfileNameId, idClient_Founded, idClient_DateFounded, ResultsID_StatusMatch)  SELECT distinct 39 as SearchProfileID, vw.IdClient_Founded, NOW(),  0 from vw_SP_AllClients vw WHERE ( idOperation = 2 ) AND ( idBusiness = 1 ) AND ( IdBusinessCategory = 36) AND vw.idClient_Founded <> 2 AND NOT (SELECT COUNT(idClient_Founded)\n																 FROM tblSearchProfile_Results \n																WHERE SearchProfileNameId = 39 AND \n																	  idClient_Founded    = vw.idClient_Founded ) > 0 ;'),
(140, 40, 2, 0, '2023-06-30 16:25:21', 'INSERT INTO tblSearchProfile_Results ( SearchProfileNameId, idClient_Founded, idClient_DateFounded, ResultsID_StatusMatch)  SELECT distinct 40 as SearchProfileID, vw.IdClient_Founded, NOW(),  0 from vw_SP_AllClients vw WHERE ( idOperation = 2) AND vw.idClient_Founded <> 2 AND NOT (SELECT COUNT(idClient_Founded)\n																 FROM tblSearchProfile_Results \n																WHERE SearchProfileNameId = 40 AND \n																	  idClient_Founded    = vw.idClient_Founded ) > 0 ;');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblLogError`
--

CREATE TABLE `tblLogError` (
  `idLogError` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `IdModule` int(11) NOT NULL,
  `IdError` int(11) NOT NULL,
  `ErrorDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ErrAuxMsg` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblLogErrorCode`
--

CREATE TABLE `tblLogErrorCode` (
  `idLogErrorCode` int(11) NOT NULL,
  `DescLogError` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Momento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblLogErrorCode`
--

INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(1, 'ERRO GENÉRICO', '2023-10-31 17:54:26'),
(2, 'ERRO NA EXECUÇÃO DA SP_MOTORSEARCHPROFILEALL', '2023-10-31 17:54:26'),
(3, 'ERRO NA EXECUÇÃO DA SP_SEARCHPROFILE_USERID', '2023-10-31 17:54:26'),
(4, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(5, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(6, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(7, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(8, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(9, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(10, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(11, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(12, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(13, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(14, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(15, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(16, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(17, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(18, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(19, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(20, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(21, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(22, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(23, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(24, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(25, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(26, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(27, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(28, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(29, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(30, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 11', '2023-10-31 17:54:26'),
(31, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 11', '2023-10-31 17:54:26'),
(32, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 14', '2023-10-31 17:54:26'),
(33, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(34, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(35, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(36, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(37, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 11', '2023-10-31 17:54:26'),
(38, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 11', '2023-10-31 17:54:26'),
(39, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/listcompani.php\nLinha: 14', '2023-10-31 17:54:26'),
(40, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(41, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(42, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(43, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(44, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(45, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(46, 'Undefined variable: textNotif\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 328', '2023-10-31 17:54:26'),
(47, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(48, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(49, 'Undefined variable: textNotif\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 328', '2023-10-31 17:54:26'),
(50, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(51, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(52, 'Undefined variable: textNotif\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 328', '2023-10-31 17:54:26'),
(53, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(54, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(55, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(56, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(57, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(58, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(59, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(60, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(61, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(62, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(63, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(64, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(65, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(66, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(67, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(68, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(69, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 15', '2023-10-31 17:54:26'),
(70, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 56', '2023-10-31 17:54:26'),
(71, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(72, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(73, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(74, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(75, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 539', '2023-10-31 17:54:26'),
(76, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 539', '2023-10-31 17:54:26'),
(77, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 547', '2023-10-31 17:54:26'),
(78, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 547', '2023-10-31 17:54:26'),
(79, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 554', '2023-10-31 17:54:26'),
(80, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 555', '2023-10-31 17:54:26'),
(81, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 555', '2023-10-31 17:54:26'),
(82, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(83, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(84, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(85, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(86, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(87, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(88, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(89, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(90, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(91, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(92, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(93, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(94, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(95, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(96, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(97, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(98, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(99, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(100, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(101, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(102, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(103, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(104, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(105, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(106, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(107, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(108, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(109, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(110, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(111, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(112, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(113, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(114, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(115, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(116, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(117, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(118, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(119, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(120, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(121, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(122, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(123, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(124, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(125, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(126, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(127, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(128, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(129, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(130, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(131, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(132, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(133, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(134, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(135, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(136, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(137, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(138, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(139, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(140, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(141, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(142, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(143, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(144, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(145, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(146, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(147, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(148, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(149, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(150, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(151, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(152, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(153, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(154, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(155, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(156, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(157, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(158, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(159, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(160, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(161, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(162, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 839', '2023-10-31 17:54:26'),
(163, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(164, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(165, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(166, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(167, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(168, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(169, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(170, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(171, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(172, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(173, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(174, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(175, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(176, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(177, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(178, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(179, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(180, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(181, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(182, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(183, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(184, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(185, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(186, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(187, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(188, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(189, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(190, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(191, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(192, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(193, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(194, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(195, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(196, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(197, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(198, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(199, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(200, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(201, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(202, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(203, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(204, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(205, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(206, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(207, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(208, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(209, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(210, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(211, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(212, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(213, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(214, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(215, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(216, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(217, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(218, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(219, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(220, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(221, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(222, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(223, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(224, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(225, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(226, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(227, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(228, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(229, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(230, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(231, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(232, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(233, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(234, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(235, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(236, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(237, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(238, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(239, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(240, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(241, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(242, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(243, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(244, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(245, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(246, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(247, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(248, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(249, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(250, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(251, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(252, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(253, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(254, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(255, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(256, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(257, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(258, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(259, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(260, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(261, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(262, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(263, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(264, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(265, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(266, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(267, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(268, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(269, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(270, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(271, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(272, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(273, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(274, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(275, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(276, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(277, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(278, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(279, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(280, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(281, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(282, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(283, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(284, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(285, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(286, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(287, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(288, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(289, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(290, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(291, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(292, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(293, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(294, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(295, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(296, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(297, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(298, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(299, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(300, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(301, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(302, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(303, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(304, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(305, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(306, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(307, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(308, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(309, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(310, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(311, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 847', '2023-10-31 17:54:26'),
(312, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 847', '2023-10-31 17:54:26'),
(313, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 858', '2023-10-31 17:54:26'),
(314, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 874', '2023-10-31 17:54:26'),
(315, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(316, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 847', '2023-10-31 17:54:26'),
(317, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 847', '2023-10-31 17:54:26'),
(318, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 858', '2023-10-31 17:54:26'),
(319, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 874', '2023-10-31 17:54:26'),
(320, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(321, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(322, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(323, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(324, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(325, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(326, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(327, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(328, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(329, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(330, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(331, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(332, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(333, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(334, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(335, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(336, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(337, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(338, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(339, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(340, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(341, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(342, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(343, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(344, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(345, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(346, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(347, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(348, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(349, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(350, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(351, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(352, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(353, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(354, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1174', '2023-10-31 17:54:26'),
(355, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(356, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(357, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(358, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(359, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(360, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(361, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(362, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(363, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(364, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(365, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(366, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(367, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(368, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(369, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(370, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(371, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(372, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(373, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(374, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(375, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(376, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(377, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(378, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(379, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(380, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(381, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(382, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(383, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(384, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(385, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(386, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(387, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(388, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(389, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(390, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(391, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(392, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(393, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(394, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(395, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(396, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(397, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(398, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(399, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(400, 'Undefined variable: AnoFundacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 482', '2023-10-31 17:54:26'),
(401, 'Undefined variable: numEmpregados\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 490', '2023-10-31 17:54:26'),
(402, 'Undefined variable: numVendedores\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 498', '2023-10-31 17:54:26'),
(403, 'Undefined variable: NivelOperacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 506', '2023-10-31 17:54:26'),
(404, 'Undefined variable: DetalheRegiao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 514', '2023-10-31 17:54:26'),
(405, 'Undefined variable: Fob3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 518', '2023-10-31 17:54:26'),
(406, 'Undefined variable: Vol3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 522', '2023-10-31 17:54:26'),
(407, 'Undefined variable: Fob2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 525', '2023-10-31 17:54:26'),
(408, 'Undefined variable: Vol2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 529', '2023-10-31 17:54:26'),
(409, 'Undefined variable: Fob1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 532', '2023-10-31 17:54:26'),
(410, 'Undefined variable: Vol1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 536', '2023-10-31 17:54:26'),
(411, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(412, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(413, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(414, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 113', '2023-10-31 17:54:26'),
(415, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 136', '2023-10-31 17:54:26'),
(416, 'Undefined variable: satBusinessId\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 157', '2023-10-31 17:54:26'),
(417, 'Undefined variable: idoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 186', '2023-10-31 17:54:26'),
(418, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 752', '2023-10-31 17:54:26'),
(419, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 752', '2023-10-31 17:54:26'),
(420, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 760', '2023-10-31 17:54:26'),
(421, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 760', '2023-10-31 17:54:26'),
(422, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 767', '2023-10-31 17:54:26'),
(423, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 768', '2023-10-31 17:54:26'),
(424, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 768', '2023-10-31 17:54:26'),
(425, 'Undefined variable: pais\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 777', '2023-10-31 17:54:26'),
(426, 'Undefined variable: email\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 788', '2023-10-31 17:54:26'),
(427, 'Undefined variable: numberfone\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 797', '2023-10-31 17:54:26'),
(428, 'Undefined variable: NmBusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 806', '2023-10-31 17:54:26'),
(429, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 812', '2023-10-31 17:54:26'),
(430, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 812', '2023-10-31 17:54:26'),
(431, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 812', '2023-10-31 17:54:26'),
(432, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 812', '2023-10-31 17:54:26'),
(433, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 812', '2023-10-31 17:54:26'),
(434, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 839', '2023-10-31 17:54:26'),
(435, 'Undefined variable: descricao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 863', '2023-10-31 17:54:26'),
(436, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 878', '2023-10-31 17:54:26'),
(437, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 878', '2023-10-31 17:54:26'),
(438, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(439, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(440, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(441, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(442, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(443, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(444, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(445, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(446, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(447, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(448, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(449, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(450, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(451, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(452, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(453, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(454, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(455, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(456, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(457, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(458, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(459, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(460, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(461, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(462, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(463, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(464, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(465, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(466, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(467, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(468, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(469, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(470, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(471, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(472, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(473, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(474, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1009', '2023-10-31 17:54:26'),
(475, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1020', '2023-10-31 17:54:26'),
(476, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1036', '2023-10-31 17:54:26'),
(477, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(478, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(479, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(480, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(481, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(482, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(483, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(484, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(485, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(486, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(487, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(488, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(489, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(490, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(491, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(492, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(493, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(494, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(495, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(496, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(497, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(498, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 15', '2023-10-31 17:54:26'),
(499, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 56', '2023-10-31 17:54:26'),
(500, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(501, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(502, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(503, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(504, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 539', '2023-10-31 17:54:26'),
(505, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 539', '2023-10-31 17:54:26'),
(506, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 547', '2023-10-31 17:54:26'),
(507, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 547', '2023-10-31 17:54:26'),
(508, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 554', '2023-10-31 17:54:26'),
(509, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 555', '2023-10-31 17:54:26'),
(510, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 555', '2023-10-31 17:54:26'),
(511, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(512, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(513, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(514, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(515, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(516, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(517, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(518, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(519, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(520, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(521, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(522, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(523, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(524, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(525, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(526, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(527, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(528, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(529, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(530, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(531, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(532, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(533, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(534, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(535, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(536, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(537, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(538, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(539, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(540, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(541, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(542, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(543, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(544, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(545, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(546, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(547, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(548, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(549, 'Undefined variable: AnoFundacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 482', '2023-10-31 17:54:26'),
(550, 'Undefined variable: numEmpregados\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 490', '2023-10-31 17:54:26'),
(551, 'Undefined variable: numVendedores\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 498', '2023-10-31 17:54:26'),
(552, 'Undefined variable: NivelOperacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 506', '2023-10-31 17:54:26'),
(553, 'Undefined variable: DetalheRegiao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 514', '2023-10-31 17:54:26'),
(554, 'Undefined variable: Fob3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 518', '2023-10-31 17:54:26'),
(555, 'Undefined variable: Vol3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 522', '2023-10-31 17:54:26'),
(556, 'Undefined variable: Fob2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 525', '2023-10-31 17:54:26'),
(557, 'Undefined variable: Vol2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 529', '2023-10-31 17:54:26'),
(558, 'Undefined variable: Fob1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 532', '2023-10-31 17:54:26'),
(559, 'Undefined variable: Vol1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 536', '2023-10-31 17:54:26'),
(560, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(561, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(562, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(563, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(564, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(565, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(566, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(567, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(568, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(569, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(570, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(571, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(572, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(573, 'Trying to get property \'FlagOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(574, 'Undefined variable: rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(575, 'Trying to get property \'NmOperation\' of non-object\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(576, 'Undefined variable: AnoFundacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 482', '2023-10-31 17:54:26'),
(577, 'Undefined variable: numEmpregados\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 490', '2023-10-31 17:54:26'),
(578, 'Undefined variable: numVendedores\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 498', '2023-10-31 17:54:26'),
(579, 'Undefined variable: NivelOperacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 506', '2023-10-31 17:54:26'),
(580, 'Undefined variable: DetalheRegiao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 514', '2023-10-31 17:54:26'),
(581, 'Undefined variable: Fob3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 518', '2023-10-31 17:54:26'),
(582, 'Undefined variable: Vol3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 522', '2023-10-31 17:54:26'),
(583, 'Undefined variable: Fob2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 525', '2023-10-31 17:54:26'),
(584, 'Undefined variable: Vol2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 529', '2023-10-31 17:54:26'),
(585, 'Undefined variable: Fob1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 532', '2023-10-31 17:54:26'),
(586, 'Undefined variable: Vol1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 536', '2023-10-31 17:54:26'),
(587, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(588, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(589, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(590, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(591, 'Undefined variable: AnoFundacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 482', '2023-10-31 17:54:26'),
(592, 'Undefined variable: numEmpregados\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 490', '2023-10-31 17:54:26'),
(593, 'Undefined variable: numVendedores\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 498', '2023-10-31 17:54:26'),
(594, 'Undefined variable: NivelOperacao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 506', '2023-10-31 17:54:26'),
(595, 'Undefined variable: DetalheRegiao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 514', '2023-10-31 17:54:26'),
(596, 'Undefined variable: Fob3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 518', '2023-10-31 17:54:26'),
(597, 'Undefined variable: Vol3\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 522', '2023-10-31 17:54:26'),
(598, 'Undefined variable: Fob2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 525', '2023-10-31 17:54:26'),
(599, 'Undefined variable: Vol2\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 529', '2023-10-31 17:54:26'),
(600, 'Undefined variable: Fob1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 532', '2023-10-31 17:54:26'),
(601, 'Undefined variable: Vol1\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 536', '2023-10-31 17:54:26'),
(602, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(603, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(604, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(605, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(606, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(607, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(608, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 13', '2023-10-31 17:54:26'),
(609, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 54', '2023-10-31 17:54:26'),
(610, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(611, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 108', '2023-10-31 17:54:26'),
(612, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(613, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 160', '2023-10-31 17:54:26'),
(614, 'Undefined index: id\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 361', '2023-10-31 17:54:26'),
(615, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 364', '2023-10-31 17:54:26'),
(616, 'Undefined variable: Flag\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 371', '2023-10-31 17:54:26'),
(617, 'Undefined variable: Flag\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 375', '2023-10-31 17:54:26'),
(618, 'Undefined variable: Flag\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 375', '2023-10-31 17:54:26'),
(619, 'Undefined variable: Flag\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 379', '2023-10-31 17:54:26'),
(620, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 537', '2023-10-31 17:54:26'),
(621, 'Undefined variable: imgcapa\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 537', '2023-10-31 17:54:26'),
(622, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 545', '2023-10-31 17:54:26'),
(623, 'Undefined variable: imgperfil\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 545', '2023-10-31 17:54:26'),
(624, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 552', '2023-10-31 17:54:26'),
(625, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 553', '2023-10-31 17:54:26'),
(626, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 553', '2023-10-31 17:54:26'),
(627, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(628, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(629, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(630, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(631, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(632, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(633, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(634, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblCurtidas.php\nLinha: 93', '2023-10-31 17:54:26'),
(635, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(636, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(637, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(638, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(639, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(640, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(641, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(642, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(643, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(644, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(645, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(646, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(647, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(648, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(649, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(650, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(651, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(652, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(653, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(654, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(655, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(656, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(657, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(658, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(659, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(660, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(661, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(662, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(663, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(664, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(665, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(666, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(667, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(668, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(669, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(670, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(671, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(672, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(673, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(674, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(675, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(676, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(677, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(678, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(679, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(680, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(681, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(682, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(683, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(684, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(685, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(686, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(687, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(688, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(689, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(690, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(691, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(692, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(693, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(694, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(695, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(696, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(697, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(698, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(699, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(700, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(701, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(702, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(703, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(704, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(705, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(706, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(707, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(708, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(709, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(710, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(711, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(712, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(713, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(714, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(715, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(716, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(717, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(718, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(719, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(720, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(721, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(722, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(723, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(724, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(725, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(726, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(727, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(728, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(729, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(730, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(731, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(732, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(733, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(734, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(735, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(736, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(737, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(738, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(739, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(740, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(741, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(742, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(743, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(744, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(745, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(746, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(747, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(748, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(749, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(750, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(751, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(752, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(753, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(754, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(755, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(756, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(757, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(758, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(759, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(760, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(761, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(762, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(763, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(764, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 111', '2023-10-31 17:54:26'),
(765, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 134', '2023-10-31 17:54:26'),
(766, 'Undefined variable: satBusinessId\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 155', '2023-10-31 17:54:26'),
(767, 'Undefined variable: idoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 184', '2023-10-31 17:54:26'),
(768, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(769, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(770, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(771, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(772, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(773, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(774, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(775, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(776, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(777, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(778, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(779, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(780, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(781, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 765', '2023-10-31 17:54:26'),
(782, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(783, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(784, 'Undefined variable: pais\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 775', '2023-10-31 17:54:26'),
(785, 'Undefined variable: email\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 786', '2023-10-31 17:54:26'),
(786, 'Undefined variable: numberfone\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 795', '2023-10-31 17:54:26'),
(787, 'Undefined variable: NmBusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 804', '2023-10-31 17:54:26'),
(788, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(789, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(790, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(791, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(792, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(793, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(794, 'Undefined variable: descricao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 864', '2023-10-31 17:54:26'),
(795, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(796, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(797, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1010', '2023-10-31 17:54:26'),
(798, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1010', '2023-10-31 17:54:26'),
(799, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1021', '2023-10-31 17:54:26'),
(800, 'Undefined variable: idpostoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 1037', '2023-10-31 17:54:26'),
(801, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblOperations.php\nLinha: 75', '2023-10-31 17:54:26'),
(802, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(803, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(804, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(805, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(806, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(807, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(808, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(809, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(810, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(811, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(812, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(813, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(814, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(815, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(816, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(817, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(818, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(819, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(820, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(821, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(822, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(823, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(824, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(825, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(826, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(827, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(828, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(829, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(830, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(831, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(832, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(833, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(834, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(835, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(836, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 265', '2023-10-31 17:54:26'),
(837, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(838, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(839, 'Undefined variable: usernamepost\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 263', '2023-10-31 17:54:26'),
(840, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(841, 'Undefined variable: imgpostuser\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/navbar.php\nLinha: 318', '2023-10-31 17:54:26'),
(842, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(843, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(844, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(845, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(846, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(847, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(848, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php\nLinha: 390', '2023-10-31 17:54:26'),
(849, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(850, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(851, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(852, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(853, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(854, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(855, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(856, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(857, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(858, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(859, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(860, 'Undefined variable: NmBusinesscor\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/editarperfil.php\nLinha: 114', '2023-10-31 17:54:26'),
(861, 'Undefined variable: resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(862, 'Invalid argument supplied for foreach()\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(863, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(864, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(865, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(866, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(867, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(868, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(869, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(870, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(871, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(872, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(873, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(874, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(875, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(876, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(877, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(878, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(879, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(880, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(881, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(882, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(883, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(884, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(885, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(886, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(887, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(888, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(889, 'Undefined variable: NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(890, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(891, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(892, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(893, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(894, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(895, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(896, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(897, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(898, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(899, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(900, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(901, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(902, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(903, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(904, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(905, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(906, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(907, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(908, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(909, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(910, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(911, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(912, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(913, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(914, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(915, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(916, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(917, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(918, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(919, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(920, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(921, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(922, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(923, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(924, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(925, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(926, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(927, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(928, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(929, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(930, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(931, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(932, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(933, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(934, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(935, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(936, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(937, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(938, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(939, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(940, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(941, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(942, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(943, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(944, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(945, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(946, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(947, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(948, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(949, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(950, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(951, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(952, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1291', '2023-10-31 17:54:26'),
(953, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(954, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(955, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(956, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(957, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(958, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(959, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(960, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(961, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(962, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(963, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(964, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(965, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(966, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(967, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(968, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1180', '2023-10-31 17:54:26'),
(969, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(970, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(971, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(972, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(973, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(974, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(975, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(976, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(977, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(978, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(979, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(980, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(981, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1187', '2023-10-31 17:54:26'),
(982, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1187', '2023-10-31 17:54:26'),
(983, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1187', '2023-10-31 17:54:26'),
(984, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1187', '2023-10-31 17:54:26'),
(985, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(986, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(987, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(988, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(989, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(990, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(991, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(992, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(993, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(994, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(995, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(996, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(997, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(998, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(999, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1000, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1001, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1002, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1003, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1004, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1005, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 111', '2023-10-31 17:54:26'),
(1006, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 134', '2023-10-31 17:54:26'),
(1007, 'Undefined variable: satBusinessId\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 155', '2023-10-31 17:54:26'),
(1008, 'Undefined variable: idoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 184', '2023-10-31 17:54:26'),
(1009, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 85', '2023-10-31 17:54:26'),
(1010, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 59', '2023-10-31 17:54:26'),
(1011, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblSearchProfile_Results.php\nLinha: ', '2023-10-31 17:54:26'),
(1012, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblConect.php\nLinha: 81', '2023-10-31 17:54:26'),
(1013, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1014, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1015, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1016, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1017, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 765', '2023-10-31 17:54:26'),
(1018, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1019, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1020, 'Undefined variable: pais\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 775', '2023-10-31 17:54:26'),
(1021, 'Undefined variable: email\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 786', '2023-10-31 17:54:26'),
(1022, 'Undefined variable: numberfone\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 795', '2023-10-31 17:54:26'),
(1023, 'Undefined variable: NmBusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 804', '2023-10-31 17:54:26'),
(1024, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1025, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1026, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1027, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1028, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1029, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1030, 'Undefined variable: descricao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 864', '2023-10-31 17:54:26'),
(1031, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(1032, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(1033, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 111', '2023-10-31 17:54:26'),
(1034, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 134', '2023-10-31 17:54:26'),
(1035, 'Undefined variable: satBusinessId\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 155', '2023-10-31 17:54:26'),
(1036, 'Undefined variable: idoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 184', '2023-10-31 17:54:26'),
(1037, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 85', '2023-10-31 17:54:26'),
(1038, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 59', '2023-10-31 17:54:26'),
(1039, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblSearchProfile_Results.php\nLinha: ', '2023-10-31 17:54:26'),
(1040, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblConect.php\nLinha: 81', '2023-10-31 17:54:26'),
(1041, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1042, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1043, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1044, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1045, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 765', '2023-10-31 17:54:26'),
(1046, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1047, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1048, 'Undefined variable: pais\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 775', '2023-10-31 17:54:26'),
(1049, 'Undefined variable: email\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 786', '2023-10-31 17:54:26'),
(1050, 'Undefined variable: numberfone\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 795', '2023-10-31 17:54:26'),
(1051, 'Undefined variable: NmBusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 804', '2023-10-31 17:54:26'),
(1052, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1053, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1054, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1055, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1056, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1057, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1058, 'Undefined variable: descricao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 864', '2023-10-31 17:54:26'),
(1059, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(1060, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(1061, 'Undefined variable: idcountry\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 111', '2023-10-31 17:54:26'),
(1062, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 134', '2023-10-31 17:54:26'),
(1063, 'Undefined variable: satBusinessId\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 155', '2023-10-31 17:54:26'),
(1064, 'Undefined variable: idoperation\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 184', '2023-10-31 17:54:26'),
(1065, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 85', '2023-10-31 17:54:26'),
(1066, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblViews.php\nLinha: 59', '2023-10-31 17:54:26'),
(1067, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblSearchProfile_Results.php\nLinha: ', '2023-10-31 17:54:26'),
(1068, 'PDOStatement::execute(): SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/model/classes/tblConect.php\nLinha: 81', '2023-10-31 17:54:26'),
(1069, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1070, 'Undefined variable: imgcapas\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 750', '2023-10-31 17:54:26'),
(1071, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1072, 'Undefined variable: imgperfils\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 758', '2023-10-31 17:54:26'),
(1073, 'Undefined variable: username\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 765', '2023-10-31 17:54:26'),
(1074, 'Undefined variable: jobtitle\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1075, 'Undefined variable: companyname\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 766', '2023-10-31 17:54:26'),
(1076, 'Undefined variable: pais\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 775', '2023-10-31 17:54:26'),
(1077, 'Undefined variable: email\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 786', '2023-10-31 17:54:26'),
(1078, 'Undefined variable: numberfone\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 795', '2023-10-31 17:54:26'),
(1079, 'Undefined variable: NmBusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 804', '2023-10-31 17:54:26'),
(1080, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1081, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1082, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1083, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1084, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 810', '2023-10-31 17:54:26'),
(1085, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1086, 'Undefined variable: descricao\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 864', '2023-10-31 17:54:26'),
(1087, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(1088, 'Undefined variable: corebusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 879', '2023-10-31 17:54:26'),
(1089, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1090, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1091, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1092, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1093, 'Undefined variable: idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1094, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1095, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1096, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1097, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1098, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1099, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1100, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1101, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1102, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1103, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1104, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1105, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1106, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1107, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1108, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1109, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1110, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1111, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1112, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1113, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1114, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1115, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1116, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1117, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1118, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1119, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1120, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1121, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1122, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1123, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1124, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1125, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1126, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1127, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1128, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1129, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1130, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1131, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1132, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1133, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1134, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1135, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1136, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(1137, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(1138, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 13', '2023-10-31 17:54:26'),
(1139, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(1140, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1141, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1142, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1143, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1144, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1145, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1146, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1147, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idOperation\' at line 1 in /home1/cr', '2023-10-31 17:54:26'),
(1148, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1149, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1150, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1151, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1152, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1153, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1154, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(1155, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(1156, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 13', '2023-10-31 17:54:26'),
(1157, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(1158, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1159, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1160, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1161, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1162, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1163, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1164, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1165, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1166, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1167, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1168, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1169, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1170, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1171, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1172, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1173, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1174, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1175, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1176, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1177, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1178, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1179, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1180, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1181, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1182, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1183, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1184, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1185, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1186, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1187, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1188, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1189, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1190, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1191, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(1192, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1193, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1194, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1195, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1196, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1197, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1198, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1299', '2023-10-31 17:54:26'),
(1199, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1299', '2023-10-31 17:54:26'),
(1200, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1201, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1202, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1203, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1204, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1205, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1206, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1207, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1208, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1209, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1210, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1211, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1212, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1213, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1214, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1215, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1216, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1217, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1218, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1219, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1220, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1221, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1222, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1223, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1224, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1225, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1226, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1227, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1228, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1229, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1230, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1231, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1232, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1233, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1234, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1235, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1236, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1237, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1238, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1239, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1240, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1241, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1242, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1243, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1244, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1245, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1246, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1247, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1248, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1249, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1250, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1251, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1252, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1253, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1254, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1255, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1256, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1257, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1258, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1259, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1260, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1261, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1262, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1263, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1264, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1265, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1266, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1267, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1268, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1269, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1270, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1271, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1272, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1273, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1274, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1275, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1276, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1277, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1278, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1279, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1280, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1281, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1282, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1283, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1284, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1285, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1286, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1287, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1288, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1289, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1290, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1291, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1292, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1293, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1294, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1295, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1296, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1297, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1298, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1299, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1300, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1301, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1302, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1303, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1304, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1305, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1306, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1307, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1308, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1309, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1310, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1311, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1312, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1313, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1314, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1315, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1316, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1317, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1318, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1319, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1320, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1321, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1322, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1323, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1324, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1325, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1326, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1327, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1328, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1329, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1330, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1331, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1332, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1333, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1334, 'Attempt to read property \"FlagOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 51', '2023-10-31 17:54:26'),
(1335, 'Undefined variable $rowbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1336, 'Attempt to read property \"NmOperation\" on null\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 52', '2023-10-31 17:54:26'),
(1337, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1338, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1339, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1340, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1341, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1342, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1343, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1344, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1345, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1346, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1347, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1348, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1349, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1350, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1351, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1352, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1353, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(1354, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1355, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1356, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1357, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1358, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1359, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1360, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1361, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1362, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1363, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1364, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1365, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1366, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1367, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1368, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1369, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1370, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1371, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1372, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1373, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1374, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1375, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1376, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1377, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1378, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1379, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1380, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1381, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1382, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1383, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1384, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1385, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(1386, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1387, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1388, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1389, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1390, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1391, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1392, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1393, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1394, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1395, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1396, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1397, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1398, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1399, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1400, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1401, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1402, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1403, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1404, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1405, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1406, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1407, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1408, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1409, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1410, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1411, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1412, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1413, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1414, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1415, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1416, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1417, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1418, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1419, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1420, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1421, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1422, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1423, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1424, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1425, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1426, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1427, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1188', '2023-10-31 17:54:26'),
(1428, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1429, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1430, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1431, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1432, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1433, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1434, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1435, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1436, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1437, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1438, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1439, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1440, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1441, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1442, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1443, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1444, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1445, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1446, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1447, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1448, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1449, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1450, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1451, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1452, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1453, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1454, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1455, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1456, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1457, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1458, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1459, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1460, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1461, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1462, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1463, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1464, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1465, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1466, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1467, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1468, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1469, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1470, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1471, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1472, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1473, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1474, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1475, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1476, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1477, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1478, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1479, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1480, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1481, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1482, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1483, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1484, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1485, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1486, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1487, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1488, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1489, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1490, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1491, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1492, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1493, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1494, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1495, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1496, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1497, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1498, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1499, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1500, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1501, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1502, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1503, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1504, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1505, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1506, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1507, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1508, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1509, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1510, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1511, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1512, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1513, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1514, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1515, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1516, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1517, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1518, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1519, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1520, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1521, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1522, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1523, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1524, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1525, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1526, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1527, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1528, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1529, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1530, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1531, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1532, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1533, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1534, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1535, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1536, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1537, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1538, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1539, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1540, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1541, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1542, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1543, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1544, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1545, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1546, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1547, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1548, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1549, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1550, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1551, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1552, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1553, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1554, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1555, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1556, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1557, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1558, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1559, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1560, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(1561, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(1562, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(1563, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(1564, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1565, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1566, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1567, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1568, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1569, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1570, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1571, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1572, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1573, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1574, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1575, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1576, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1577, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1578, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1579, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1580, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1581, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1582, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1583, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1584, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1585, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1586, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1587, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1588, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1589, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1590, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1591, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1592, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1593, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1594, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1595, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1596, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1597, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1598, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1599, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1600, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1601, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1602, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1603, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1604, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1605, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1606, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1607, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1608, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1609, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1610, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1611, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1612, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1613, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1614, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1615, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1616, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(1617, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1618, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1619, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1620, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1621, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1622, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1623, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1624, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1625, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1626, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1627, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1628, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1629, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1630, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1631, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1632, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1633, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1634, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1635, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1636, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1637, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1638, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1639, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1640, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1641, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1642, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1643, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1644, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1645, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1646, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1647, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1648, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1649, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1650, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1651, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1652, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1653, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1654, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1655, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1656, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1657, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1658, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1659, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1660, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1661, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1662, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1663, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1664, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1665, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1666, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1667, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1668, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1669, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1670, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1671, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1672, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1673, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1674, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1675, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1676, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1677, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1678, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1679, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1680, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1681, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1682, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1683, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1684, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1685, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1686, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1687, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1688, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1689, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1690, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1691, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1692, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1693, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1694, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1695, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1696, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1697, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1698, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1699, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1700, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1701, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1702, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1703, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1704, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1705, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1706, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1707, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1708, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1709, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1710, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1711, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1712, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1713, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1714, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1715, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1716, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1717, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1718, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1719, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1720, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1721, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1722, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1723, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1724, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1725, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1726, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1727, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1728, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1729, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1730, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1731, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1732, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1733, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1734, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1735, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1736, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1737, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1738, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1739, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1740, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1741, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1742, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1743, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1744, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1745, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1746, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1747, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1748, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1749, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1750, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1751, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1752, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1753, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1754, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1755, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1756, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1757, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1758, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1759, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1760, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1761, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1762, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1763, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1764, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1765, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1766, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1767, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1768, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1769, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1770, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1771, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1772, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1773, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1774, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1775, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1776, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1777, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1778, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1779, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1780, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1781, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1782, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1783, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1784, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1785, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1786, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1787, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1788, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1789, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1790, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1791, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1792, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1793, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1794, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1795, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1796, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1797, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1798, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1799, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1800, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1801, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1802, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1803, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1804, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1805, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1806, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1807, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1808, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1809, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1810, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1811, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1812, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1813, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1814, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1815, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1816, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1817, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1818, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1819, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1820, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1821, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1822, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1823, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1824, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1825, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1826, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1827, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1828, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1829, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1830, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1831, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1832, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1833, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1834, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1835, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1836, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1837, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1838, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1839, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1840, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1841, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1842, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1843, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1844, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1845, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1846, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1847, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1848, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1849, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1850, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1851, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1852, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1853, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1854, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1855, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1856, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1857, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1858, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1859, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1860, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1861, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1862, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1863, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1864, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1865, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1866, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1867, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1868, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1869, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1870, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1871, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1872, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1873, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1874, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1875, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1876, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1877, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1878, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1879, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1880, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(1881, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1882, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1883, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1884, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1885, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1886, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1887, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1888, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1889, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1890, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1891, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1892, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1893, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1894, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1895, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1896, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1897, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1898, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1899, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1900, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1901, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1902, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1903, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1904, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1905, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1906, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1907, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1908, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1909, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1910, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1911, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1912, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1913, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1914, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1915, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1916, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1917, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1918, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1919, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1920, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1921, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1922, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1923, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1924, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1925, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1926, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1927, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1928, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1929, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1930, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1931, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1932, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1933, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1934, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1935, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1936, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1937, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1938, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1939, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1940, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1941, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1942, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1943, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1944, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1945, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1946, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1947, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1948, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1949, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1950, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1951, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1952, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1953, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1954, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1955, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1956, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1957, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1958, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1959, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1960, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1961, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1962, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1963, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1964, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1965, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1966, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1967, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1968, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1969, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1970, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1971, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1972, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1973, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1974, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1975, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1976, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1977, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1978, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1979, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1980, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1981, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1982, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1983, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1984, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1985, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1986, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1987, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1988, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1989, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1990, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1991, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1992, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1993, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1994, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1995, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1996, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1997, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1998, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(1999, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2000, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2001, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2002, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2003, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2004, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2005, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2006, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2007, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2008, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2009, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2010, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2011, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2012, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2013, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2014, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2015, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2016, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2017, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2018, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2019, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2020, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2021, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2022, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2023, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2024, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2025, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2026, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2027, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2028, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2029, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2030, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2031, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2032, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2033, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2034, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2035, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2036, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2037, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2038, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2039, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2040, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2041, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2042, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2043, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2044, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2045, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2046, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2047, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2048, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2049, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2050, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2051, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2052, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2053, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2054, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2055, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2056, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2057, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2058, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2059, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2060, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2061, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2062, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2063, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2064, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2065, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2066, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2067, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2068, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2069, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2070, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2071, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2072, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2073, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2074, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2075, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2076, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2077, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2078, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2079, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2080, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2081, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2082, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2083, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2084, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2085, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2086, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2087, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2088, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2089, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2090, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2091, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2092, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2093, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2094, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2095, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2096, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2097, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2098, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2099, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2100, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2101, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2102, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2103, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2104, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2105, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2106, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2107, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2108, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2109, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2110, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2111, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2112, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2113, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2114, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2115, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2116, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2117, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2118, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2119, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2120, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2121, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2122, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2123, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2124, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2125, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2126, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2127, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2128, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2129, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2130, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2131, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2132, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2133, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2134, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2135, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2136, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2137, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2138, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2139, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2140, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2141, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2142, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2143, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2144, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(2145, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2146, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2147, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2148, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2149, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2150, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2151, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2152, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2153, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2154, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2155, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2156, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2157, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2158, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2159, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2160, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2161, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2162, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2163, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2164, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2165, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2166, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2167, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2168, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2169, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2170, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2171, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2172, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2173, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2174, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2175, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2176, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2177, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2178, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2179, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2180, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2181, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2182, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(2183, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 10', '2023-10-31 17:54:26'),
(2184, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 13', '2023-10-31 17:54:26'),
(2185, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2186, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2187, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2188, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2189, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2190, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2191, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2192, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2193, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2194, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2195, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2196, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2197, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2198, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2199, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2200, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2201, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2202, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2203, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1192', '2023-10-31 17:54:26'),
(2204, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2205, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2206, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2207, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2208, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2209, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2210, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2211, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2212, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2213, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2214, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2215, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2216, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2217, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2218, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2219, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2220, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2221, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2222, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2223, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2224, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2225, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2226, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2227, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2228, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2229, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2230, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2231, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2232, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2233, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2234, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2235, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2236, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2237, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2238, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2239, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2240, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2241, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2242, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2243, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2244, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2245, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2246, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2247, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2248, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2249, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2250, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2251, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2252, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2253, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2254, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2255, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2256, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2257, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2258, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2259, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2260, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2261, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2262, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2263, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2264, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2265, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2266, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2267, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2268, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2269, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2270, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2271, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2272, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2273, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2274, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2275, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2276, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2277, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2278, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2279, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2280, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2281, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2282, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2283, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2284, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2285, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2286, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2287, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2288, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2289, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2290, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2291, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2292, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2293, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2294, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2295, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2296, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2297, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2298, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2299, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2300, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2301, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2302, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2303, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2304, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2305, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2306, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2307, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2308, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2309, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2310, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2311, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2312, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2313, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2314, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2315, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2316, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2317, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2318, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 11', '2023-10-31 17:54:26'),
(2319, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 11', '2023-10-31 17:54:26'),
(2320, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 14', '2023-10-31 17:54:26'),
(2321, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2322, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2323, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2324, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2325, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2326, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2327, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2328, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2329, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2330, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2331, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2332, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2333, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2334, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2335, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2336, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2337, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2338, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2339, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2340, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2341, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2342, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2343, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2344, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2345, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2346, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2347, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2348, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2349, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2350, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2351, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2352, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2353, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2354, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2355, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2356, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2357, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2358, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2359, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2360, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2361, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2362, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2363, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1189', '2023-10-31 17:54:26'),
(2364, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2365, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2366, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(2367, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2368, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2369, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2370, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2371, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2372, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2373, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2374, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2375, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2376, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2377, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2378, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2379, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2380, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2381, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2382, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2383, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2384, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2385, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2386, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2387, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2388, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2389, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2390, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2391, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2392, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2393, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2394, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2395, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2396, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2397, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2398, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2399, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2400, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2401, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2402, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2403, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2404, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2405, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2406, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2407, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2408, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(2409, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2410, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2411, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2412, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2413, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2414, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2415, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2416, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2417, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2418, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2419, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2420, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2421, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2422, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2423, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2424, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2425, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2426, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2427, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2428, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2429, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2430, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2431, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2432, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2433, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2434, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2435, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2436, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2437, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2438, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2439, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2440, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2441, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2442, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2443, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2444, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2445, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2446, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2447, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2448, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2449, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2450, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2451, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2452, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2453, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2454, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2455, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2456, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2457, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2458, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2459, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2460, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2461, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2462, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2463, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2464, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2465, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2466, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2467, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2468, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2469, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2470, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2471, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2472, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2473, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2474, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2475, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2476, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2477, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2478, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2479, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2480, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2481, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2482, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2483, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2484, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2485, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2486, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2487, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2488, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2489, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2490, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2491, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2492, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2493, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2494, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2495, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2496, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2497, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2498, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2499, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2500, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2501, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2502, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2503, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2504, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2505, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2506, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2507, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2508, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2509, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2510, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2511, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2512, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2513, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2514, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2515, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2516, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2517, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2518, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2519, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2520, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2521, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2522, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2523, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2524, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2525, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2526, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2527, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2528, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2529, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2530, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2531, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2532, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2533, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2534, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2535, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2536, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2537, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2538, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2539, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2540, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2541, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2542, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2543, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2544, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2545, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2546, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2547, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2548, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2549, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2550, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2551, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2552, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2553, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2554, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2555, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2556, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2557, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2558, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2559, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2560, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2561, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2562, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2563, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2564, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2565, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2566, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2567, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2568, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2569, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2570, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2571, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2572, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2573, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2574, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2575, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2576, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2577, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2578, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2579, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2580, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2581, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2582, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2583, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2584, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2585, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2586, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2587, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2588, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2589, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2590, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2591, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2592, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2593, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2594, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2595, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2596, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2597, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2598, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2599, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2600, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2601, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2602, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2603, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2604, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2605, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2606, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2607, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2608, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2609, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2610, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2611, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2612, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2613, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2614, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2615, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2616, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(2617, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2618, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2619, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2620, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2621, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2622, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2623, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2624, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2625, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2626, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2627, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2628, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2629, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2630, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2631, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2632, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2633, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2634, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2635, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2636, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2637, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2638, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2639, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2640, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2641, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2642, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2643, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2644, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2645, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2646, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2647, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2648, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2649, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2650, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(2651, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2652, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2653, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2654, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2655, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2656, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2657, 'Undefined property: stdClass::$PersonalUserPicturePath\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1204', '2023-10-31 17:54:26'),
(2658, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2659, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2660, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2661, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2662, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2663, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2664, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2665, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2666, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2667, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2668, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2669, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26');
INSERT INTO `tblLogErrorCode` (`idLogErrorCode`, `DescLogError`, `Momento`) VALUES
(2670, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2671, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2672, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2673, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2674, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2675, 'Undefined variable $dbh\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1124', '2023-10-31 17:54:26'),
(2676, 'Uncaught Error: Call to a member function prepare() on null in /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php:1124\nStack trace:\n#0 {main}\n  thrown\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.onli', '2023-10-31 17:54:26'),
(2677, 'Undefined variable $dbh\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 1124', '2023-10-31 17:54:26'),
(2678, 'Uncaught Error: Call to a member function prepare() on null in /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php:1124\nStack trace:\n#0 {main}\n  thrown\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.onli', '2023-10-31 17:54:26'),
(2679, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2680, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2681, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(2682, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2683, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2684, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2685, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2686, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2687, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2688, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 9', '2023-10-31 17:54:26'),
(2689, 'Undefined array key \"id\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/home.php\nLinha: 12', '2023-10-31 17:54:26'),
(2690, 'Uncaught PDOException: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near \':idClient\' at line 1 in /home1/crmla', '2023-10-31 17:54:26'),
(2691, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2692, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2693, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2694, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2695, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2696, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2697, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2698, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2699, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2700, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2701, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2702, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2703, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2704, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2705, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2706, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2707, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2708, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2709, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2710, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2711, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2712, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2713, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2714, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2715, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2716, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2717, 'Undefined variable $NmBusinessCategory\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 826', '2023-10-31 17:54:26'),
(2718, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2719, 'Undefined variable $idconect\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/viewProfile.php\nLinha: 837', '2023-10-31 17:54:26'),
(2720, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2721, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2722, 'Undefined array key \"envarmsg\"\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/chatPage.php\nLinha: 235', '2023-10-31 17:54:26'),
(2723, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2724, 'Cannot modify header information - headers already sent by (output started at /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/profile.php:94)\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/', '2023-10-31 17:54:26'),
(2725, 'Undefined variable $resultscorbusiness\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26'),
(2726, 'foreach() argument must be of type array|object, null given\nArquivo: /home1/crmlab04/public_html/sites/visual.matchingbusiness.online/view/widget/produto.php\nLinha: 45', '2023-10-31 17:54:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblLogModules`
--

CREATE TABLE `tblLogModules` (
  `idLogModules` int(11) NOT NULL,
  `DescLogModule` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblMatch`
--

CREATE TABLE `tblMatch` (
  `IdMatch` int(11) NOT NULL,
  `IdClientSource` int(11) NOT NULL,
  `IdClientMatched` int(11) NOT NULL,
  `MatchStatus` int(11) NOT NULL COMMENT 'ok (1)  / nok (0)\n',
  `SearchProfileNameId` int(11) DEFAULT NULL,
  `DateOfSearchProfileMacth` datetime DEFAULT NULL,
  `idRespSPid` int(11) DEFAULT NULL COMMENT '1	Waiting\n2	Acepeted\n3	Deinied\n4              Founded',
  `TextOfInvite` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateOfInvite` datetime DEFAULT NULL,
  `idRespInviteId` int(11) DEFAULT NULL COMMENT '1	Waiting\n2	Acepeted\n3	Deinied',
  `DateOfResponse` datetime DEFAULT NULL,
  `ChatId` int(11) DEFAULT NULL,
  `DateVisualization` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblMatchStatusId`
--

CREATE TABLE `tblMatchStatusId` (
  `MatchStatusId` int(11) NOT NULL,
  `MatchStatusDesc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblMatchStatusId`
--

INSERT INTO `tblMatchStatusId` (`MatchStatusId`, `MatchStatusDesc`) VALUES
(1, 'Matched'),
(2, 'Founded'),
(3, 'Invited'),
(4, 'Viewed');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblMessage_Results`
--

CREATE TABLE `tblMessage_Results` (
  `MessageID` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idClient_Sender` int(11) NOT NULL,
  `Message Text` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='										';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblNivelOperacao`
--

CREATE TABLE `tblNivelOperacao` (
  `idNivelOperacao` int(11) NOT NULL,
  `DescNivelOperacao` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblNivelOperacao`
--

INSERT INTO `tblNivelOperacao` (`idNivelOperacao`, `DescNivelOperacao`) VALUES
(1, 'Global'),
(2, 'National Wide');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblNotificationsTypes`
--

CREATE TABLE `tblNotificationsTypes` (
  `idTypeNotifcation` int(11) NOT NULL,
  `textNotifcation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iconNotifcation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricaoType` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblNotificationsTypes`
--

INSERT INTO `tblNotificationsTypes` (`idTypeNotifcation`, `textNotifcation`, `iconNotifcation`, `descricaoType`) VALUES
(1, 'Profile Found', 'notf.jpeg', 'Quando um perfil é encontrado no motor de busca'),
(2, 'Your profile has been viewed by the user', 'notf.jpeg', 'Quando alguém visualiza o perfil'),
(3, 'You received a message', 'notf.jpeg', 'Quando um user receber mensagem'),
(4, 'You have been inveited', 'notf.jpeg', 'Quando alguém convida para ser match'),
(5, 'Curtiu sua Publicação', 'fav', 'Quando alguem curte seu post'),
(6, 'accepted your connection', 'notf.jpeg', 'quando aceita a conexão'),
(7, 'coments', 'nav', 'comentou em seu post'),
(8, 'seache profile', 'nav', 'encontrou o perfil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblNumEmpregados`
--

CREATE TABLE `tblNumEmpregados` (
  `idNumEmpregados` int(11) NOT NULL,
  `ValorInicial` int(11) DEFAULT NULL,
  `Valor Final` int(11) DEFAULT NULL,
  `DescNumEmpregados` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblNumEmpregados`
--

INSERT INTO `tblNumEmpregados` (`idNumEmpregados`, `ValorInicial`, `Valor Final`, `DescNumEmpregados`) VALUES
(1, 0, 50, 'up to  50'),
(2, 51, 100, '51 - 100'),
(3, 101, 500, '101 - 500'),
(4, 501, 999999999, 'more than 500');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblOperations`
--

CREATE TABLE `tblOperations` (
  `idOperation` int(11) NOT NULL,
  `NmOperation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FlagOperation` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblOperations`
--

INSERT INTO `tblOperations` (`idOperation`, `NmOperation`, `FlagOperation`) VALUES
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
-- Estrutura para tabela `tblProductPictures`
--

CREATE TABLE `tblProductPictures` (
  `idProductPicture` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `tblProductPicturePath` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblProductPictures`
--

INSERT INTO `tblProductPictures` (`idProductPicture`, `idProduct`, `tblProductPicturePath`) VALUES
(52, 64, 'assets/img/28/Produto_64_28_0.png'),
(53, 64, 'assets/img/28/Produto_64_28_1.png'),
(54, 64, 'assets/img/28/Produto_64_28_2.png'),
(55, 65, 'assets/img/28/Produto_65_28_0.jpg'),
(56, 65, 'assets/img/28/Produto_65_28_1.jpg'),
(57, 65, 'assets/img/28/Produto_65_28_2.png'),
(58, 66, 'assets/img/28/Produto_66_28_0.jpg'),
(59, 66, 'assets/img/28/Produto_66_28_1.jpg'),
(60, 66, 'assets/img/28/Produto_66_28_2.png'),
(61, 67, 'assets/img/28/Produto_67_28_0.jpg'),
(62, 67, 'assets/img/28/Produto_67_28_1.jpg'),
(63, 67, 'assets/img/28/Produto_67_28_2.png'),
(64, 68, 'assets/img/28/Produto_68_28_0.jpg'),
(65, 68, 'assets/img/28/Produto_68_28_1.jpg'),
(66, 68, 'assets/img/28/Produto_68_28_2.png'),
(67, 69, 'assets/img/28/Produto_69_28_0.jpg'),
(68, 69, 'assets/img/28/Produto_69_28_1.jpg'),
(69, 69, 'assets/img/28/Produto_69_28_2.png'),
(70, 70, 'assets/img/28/Produto_70_28_0.jpg'),
(71, 70, 'assets/img/28/Produto_70_28_1.jpg'),
(72, 70, 'assets/img/28/Produto_70_28_2.png'),
(73, 71, 'assets/img/28/Produto_71_28_0.jpg'),
(74, 71, 'assets/img/28/Produto_71_28_1.jpg'),
(75, 71, 'assets/img/28/Produto_71_28_2.png'),
(76, 72, 'assets/img/28/Produto_72_28_0.jpg'),
(77, 72, 'assets/img/28/Produto_72_28_1.jpg'),
(78, 72, 'assets/img/28/Produto_72_28_2.png'),
(79, 73, 'assets/img/28/Produto_73_28_0.jpg'),
(80, 73, 'assets/img/28/Produto_73_28_1.jpg'),
(81, 73, 'assets/img/28/Produto_73_28_2.png'),
(82, 74, 'assets/img/30/Produto_74_30_0.png'),
(83, 75, 'assets/img/30/Produto_75_30_0.png'),
(84, 76, 'assets/img/30/Produto_76_30_0.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblProducts`
--

CREATE TABLE `tblProducts` (
  `idProduct` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idBusinessCategory` int(11) NOT NULL,
  `ProductName` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `ProdcuctDescription` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `ProdcuctEspecification` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flagExcluido` int(11) NOT NULL DEFAULT '0',
  `Category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblProducts`
--

INSERT INTO `tblProducts` (`idProduct`, `idClient`, `idBusinessCategory`, `ProductName`, `ProdcuctDescription`, `ProdcuctEspecification`, `flagExcluido`, `Category`) VALUES
(64, 28, 2, 'Produto teste 1', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(65, 28, 2, 'teste 2 ', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(66, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(67, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(68, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(69, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(70, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(71, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(72, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(73, 28, 2, 'teste 3', 'É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE É APENAS UM TESTE', '', 0, 1),
(74, 30, 9, 'teste', 'teste', '', 0, 9),
(75, 30, 9, 'teste', 'teste', '', 0, 9),
(76, 30, 9, 'testeEEEE', 'TESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEETESTEEEEE', '', 0, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblQualificationCB`
--

CREATE TABLE `tblQualificationCB` (
  `idQualificationCB` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdBusinessCategory` int(11) NOT NULL,
  `FlagDeletado` varchar(1) COLLATE utf8_unicode_ci DEFAULT '0',
  `FlagSB` varchar(1) COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblQualificationCB`
--

INSERT INTO `tblQualificationCB` (`idQualificationCB`, `IdClient`, `IdBusinessCategory`, `FlagDeletado`, `FlagSB`) VALUES
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
-- Estrutura para tabela `tblQualificationSB`
--

CREATE TABLE `tblQualificationSB` (
  `idQualificationSB` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdBusinessCategory` int(11) NOT NULL,
  `FlagDeletado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblQualificationSB`
--

INSERT INTO `tblQualificationSB` (`idQualificationSB`, `IdClient`, `IdBusinessCategory`, `FlagDeletado`) VALUES
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
-- Estrutura para tabela `tblRangeValues`
--

CREATE TABLE `tblRangeValues` (
  `idlRangeValue` int(11) NOT NULL,
  `ValorInicial` bigint(20) NOT NULL,
  `ValorFinal` bigint(20) NOT NULL,
  `DescricaoRangeValue` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='		';

--
-- Despejando dados para a tabela `tblRangeValues`
--

INSERT INTO `tblRangeValues` (`idlRangeValue`, `ValorInicial`, `ValorFinal`, `DescricaoRangeValue`) VALUES
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
-- Estrutura para tabela `tblResponseId`
--

CREATE TABLE `tblResponseId` (
  `ResponseId` int(11) NOT NULL,
  `ResponseDesc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblResponseId`
--

INSERT INTO `tblResponseId` (`ResponseId`, `ResponseDesc`) VALUES
(1, 'Waiting'),
(2, 'Acepeted'),
(3, 'Deinied');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearch`
--

CREATE TABLE `tblSearch` (
  `idSearch` int(11) NOT NULL,
  `coreBussinessID` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idClient` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchBusiness`
--

CREATE TABLE `tblSearchBusiness` (
  `idSearchBusiness` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idBusiness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchCategory`
--

CREATE TABLE `tblSearchCategory` (
  `idSearchCategory` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idCategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchCountry`
--

CREATE TABLE `tblSearchCountry` (
  `idSearchCountry` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idCountry` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchEspecificationTag`
--

CREATE TABLE `tblSearchEspecificationTag` (
  `idSearchEspecificationTag` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idTagKeys` int(11) DEFAULT NULL,
  `Keys` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchProfile_NameID`
--

CREATE TABLE `tblSearchProfile_NameID` (
  `SearchProfileNameId` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `SearchProfileName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SearchProfileStatus` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `SearchProfile_CreatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SearchProfile_LastChange` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblsearchprofile_results`
--

CREATE TABLE `tblsearchprofile_results` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idClienteEncontrado` int(11) DEFAULT NULL,
  `datahora` datetime DEFAULT CURRENT_TIMESTAMP,
  `idTipoNotif` int(11) NOT NULL DEFAULT '1',
  `postId` int(11) DEFAULT NULL,
  `url` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estadoNotif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblsearchprofile_results`
--

INSERT INTO `tblsearchprofile_results` (`id`, `idUsuario`, `idClienteEncontrado`, `datahora`, `idTipoNotif`, `postId`, `url`, `estadoNotif`) VALUES
(344, 30, 30, '2023-11-01 14:29:31', 2, 0, 'viewProfile.php?profile=30', 1),
(345, 30, 28, '2023-11-01 15:03:55', 5, 301, 'viewPost.php?post=301', 1),
(346, 30, 28, '2023-11-01 15:04:04', 5, 301, 'viewPost.php?post=301', 1),
(347, 30, 28, '2023-11-01 15:04:08', 5, 301, 'viewPost.php?post=301', 1),
(348, 30, 28, '2023-11-01 15:04:09', 5, 301, 'viewPost.php?post=301', 1),
(349, 30, 28, '2023-11-01 15:04:09', 5, 301, 'viewPost.php?post=301', 1),
(350, 30, 28, '2023-11-01 15:04:15', 5, 301, 'viewPost.php?post=301', 1),
(351, 30, 28, '2023-11-01 15:04:15', 5, 301, 'viewPost.php?post=301', 1),
(352, 30, 28, '2023-11-01 15:04:15', 5, 301, 'viewPost.php?post=301', 1),
(353, 30, 28, '2023-11-01 15:04:16', 5, 301, 'viewPost.php?post=301', 1),
(354, 30, 28, '2023-11-01 15:04:16', 5, 301, 'viewPost.php?post=301', 1),
(355, 30, 28, '2023-11-01 15:04:16', 5, 301, 'viewPost.php?post=301', 1),
(356, 30, 28, '2023-11-01 15:04:17', 5, 301, 'viewPost.php?post=301', 1),
(357, 30, 28, '2023-11-01 15:04:17', 5, 301, 'viewPost.php?post=301', 1),
(358, 30, 28, '2023-11-01 15:04:17', 5, 301, 'viewPost.php?post=301', 1),
(359, 30, 28, '2023-11-01 15:04:17', 5, 301, 'viewPost.php?post=301', 1),
(360, 30, 28, '2023-11-01 15:04:19', 5, 301, 'viewPost.php?post=301', 1),
(361, 30, 31, '2023-11-01 15:04:36', 5, 305, 'viewPost.php?post=305', 1),
(362, 30, 28, '2023-11-01 15:04:37', 5, 303, 'viewPost.php?post=303', 1),
(363, 30, 31, '2023-11-01 15:04:38', 5, 304, 'viewPost.php?post=304', 1),
(364, 30, 28, '2023-11-01 15:04:39', 5, 302, 'viewPost.php?post=302', 1),
(365, 30, 30, '2023-11-01 15:04:43', 5, 300, 'viewPost.php?post=300', 1),
(366, 30, 31, '2023-11-01 15:04:45', 5, 306, 'viewPost.php?post=306', 1),
(367, 31, 31, '2023-11-01 15:27:41', 5, 308, 'viewPost.php?post=308', 1),
(368, 28, 31, '2023-11-01 15:49:35', 2, 0, 'viewProfile.php?profile=28', 1),
(369, 28, 30, '2023-11-01 15:49:38', 2, 0, 'viewProfile.php?profile=28', 1),
(370, 30, 28, '2023-11-01 15:50:28', 2, 0, 'viewProfile.php?profile=30', 1),
(371, 31, 28, '2023-11-01 16:47:48', 2, 0, 'viewProfile.php?profile=31', 1),
(372, 31, 28, '2023-11-01 16:47:50', 4, 0, 'viewProfile.php?profile=28', 1),
(373, 30, 28, '2023-11-01 16:47:53', 4, 0, 'viewProfile.php?profile=28', 1),
(374, 28, 28, '2023-11-01 16:48:53', 2, 0, 'viewProfile.php?profile=28', 1),
(375, 30, 28, '2023-11-01 16:58:57', 4, 0, 'viewProfile.php?profile=30', 1),
(376, 31, 28, '2023-11-01 16:58:59', 4, 0, 'viewProfile.php?profile=31', 1),
(377, 28, 31, '2023-11-01 17:00:10', 8, 0, 'viewProfile.php?profile=28', 0),
(378, 28, 30, '2023-11-01 17:00:12', 8, 0, 'viewProfile.php?profile=28', 1),
(379, 28, 31, '2023-11-03 19:24:16', 2, 0, 'viewProfile.php?profile=28', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchProfile_Results2`
--

CREATE TABLE `tblSearchProfile_Results2` (
  `SearchProfile_ResultsID` int(11) NOT NULL,
  `SearchProfileNameId` int(11) NOT NULL,
  `idClient_Founded` int(11) NOT NULL,
  `idClient_DateFounded` datetime DEFAULT CURRENT_TIMESTAMP,
  `ResultsID_StatusMatch` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ResultsID_DateMatch` datetime DEFAULT NULL,
  `idTypeNotifcation` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='										';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchProfile_ResultsHistoryLog`
--

CREATE TABLE `tblSearchProfile_ResultsHistoryLog` (
  `SearchProfile_ResultsHistoryID` int(11) NOT NULL,
  `SearchProfile_OriginalUserResultsID` int(11) NOT NULL,
  `SearchProfileNameId` int(11) NOT NULL,
  `idClient_Founded` int(11) NOT NULL,
  `idClient_DateFounded` datetime DEFAULT NULL,
  `UserResultsID_StatusMatch` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserResultsID_DateMatch` datetime DEFAULT NULL,
  `ResultsHistoryLogDate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='										';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchResults`
--

CREATE TABLE `tblSearchResults` (
  `idSearchResults` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idClientPesquisador` int(11) NOT NULL,
  `idClientResultado` int(11) NOT NULL,
  `Data_Resultado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchSpecification`
--

CREATE TABLE `tblSearchSpecification` (
  `idSearchSpecification` int(11) NOT NULL,
  `idSearch` int(11) NOT NULL,
  `idNumEmpregados` int(11) DEFAULT NULL,
  `idlRangeValue` int(11) DEFAULT NULL,
  `idNivelOperacao` int(11) DEFAULT NULL,
  `DataDeAbertura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblSearchSpecification`
--

INSERT INTO `tblSearchSpecification` (`idSearchSpecification`, `idSearch`, `idNumEmpregados`, `idlRangeValue`, `idNivelOperacao`, `DataDeAbertura`) VALUES
(27, 47, 1, 1, 1, '2002-01-05'),
(28, 48, 1, 3, 2, '2023-11-01'),
(29, 49, 1, 1, 1, '2023-11-09'),
(30, 50, 1, 1, 1, '2023-11-01'),
(31, 51, 1, 1, 1, '2023-11-16'),
(32, 52, 1, 1, 1, '2023-11-01'),
(33, 53, 1, 2, 1, '2023-11-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblSearchStructure`
--

CREATE TABLE `tblSearchStructure` (
  `SearchFieldID` int(11) NOT NULL,
  `PKTable` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PKField` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DescTableField` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `SearcheFieldNameForUser` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `OrderByExpression` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TypeOfSearch` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `LinkStatement` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblUserClients`
--

CREATE TABLE `tblUserClients` (
  `idClient` int(11) NOT NULL,
  `FirstName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MiddleName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `JobTitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idCountry` int(11) NOT NULL,
  `CompanyName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `CoreBusinessId` int(11) NOT NULL,
  `SatBusinessId` int(11) DEFAULT NULL,
  `IdOperation` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idFlagStatusCadastro` int(11) NOT NULL,
  `idPerfilUsuario` int(11) NOT NULL DEFAULT '1',
  `PersonalUserPicturePath` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoPicturePath` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WhatsAppNumber` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxid` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `AnoFundacao` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumEmpregados` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NumVendedores` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NivelOperacao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DetalheRegiao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fob_3Y` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vol_3Y` int(11) DEFAULT NULL,
  `Fob_2Y` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vol_2Y` int(11) DEFAULT NULL,
  `Fob_1Y` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vol_1Y` int(11) DEFAULT NULL,
  `idemrpesa` int(11) DEFAULT NULL,
  `cargoEmpresa` int(11) DEFAULT NULL,
  `Pontos` int(15) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblUserClients`
--

INSERT INTO `tblUserClients` (`idClient`, `FirstName`, `MiddleName`, `LastName`, `JobTitle`, `idCountry`, `CompanyName`, `Password`, `created_at`, `CoreBusinessId`, `SatBusinessId`, `IdOperation`, `email`, `idFlagStatusCadastro`, `idPerfilUsuario`, `PersonalUserPicturePath`, `LogoPicturePath`, `WhatsAppNumber`, `descricao`, `taxid`, `AnoFundacao`, `NumEmpregados`, `NumVendedores`, `NivelOperacao`, `DetalheRegiao`, `Fob_3Y`, `Vol_3Y`, `Fob_2Y`, `Vol_2Y`, `Fob_1Y`, `Vol_1Y`, `idemrpesa`, `cargoEmpresa`, `Pontos`) VALUES
(28, 'lucas', NULL, 'souza', 'CEO', 384, 'SILVA TECH SOUZA', 'decef631657ea1ca91e58fade7c89794', '2023-11-01 13:12:46', 2, 5, 135, 'representante.sts@silvatechsouza.com.br', 1, 1, 'assets/img/28/PersonalUser_28.png', 'assets/img/28/LogoPicture_28.jpg', '+5511911601652', 'Nossa jornada começou em 2019, num quarto com um computador e uma chama inextinguível. O que parecia improvável tornou-se nossa faísca, inflamando a paixão pela criação de soluções inteligentes e intuitivas. Embora não dispuséssemos das ferramentas mais avançadas, a determinação transbordava. A cada obstáculo, vislumbramos uma oportunidade para inovar, para moldar o futuro digital. Hoje, a Silva Tech Souza é a materialização desses esforços incansáveis. Uma equipe unida e diversificada, movida por uma visão: democratizar a complexidade e tornar a inovação tangível. Reconhecemos o poder de transformar uma ideia numa jornada digital excepcional. Criamos aplicativos que transcendem códigos, abrindo portais para conquistas', '51.517.599/0001-76', '2023', '1', '1', '1', NULL, '2022', 1, '2021', 1, '2020', 1, NULL, NULL, 24200),
(30, 'RAFAEL', NULL, 'GUSTAVO', 'CEO', 384, 'NTECH', 'd05a1df73a3db5b3693c95da4bb8d522', '2023-11-01 13:48:50', 9, 9, 0, 'representante@silvatechsouza.com.br', 1, 1, NULL, NULL, '+5511996589020', 'testes', '51.888.999/0001-98', '2023', '1', '1', '2', NULL, '2022', 1, '2021', 1, '2020', 1, NULL, NULL, 3720),
(31, 'Julio', NULL, 'costa nunes', 'Developer', 384, 'STS', '9b405d4408c38aeaab25d8e77bd3baad', '2023-11-01 14:02:15', 15, 15, 0, 'julio.costa-nunes@unesp.br', 1, 1, 'assets/img/31/PersonalUser_31.png', 'assets/img/31/LogoPicture_31.png', '65106561561615615616', 'dzfghfghjfgjfdgh', '151956119561596', '2002', '1', '4', '1', NULL, '2022', 4, '2021', 5, '2020', 5, NULL, NULL, 2910);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblUserPerfil`
--

CREATE TABLE `tblUserPerfil` (
  `idPerfilUsuario` int(11) NOT NULL,
  `NmPerfil` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `NumMeses` int(11) DEFAULT '0',
  `DataInicio` datetime DEFAULT NULL,
  `DataFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblUserPerfil`
--

INSERT INTO `tblUserPerfil` (`idPerfilUsuario`, `NmPerfil`, `NumMeses`, `DataInicio`, `DataFinal`) VALUES
(1, 'ASSINANTE', 0, NULL, NULL),
(2, 'VISITANTE', 0, NULL, NULL),
(3, 'PROMO 01', 0, NULL, NULL),
(4, 'PROMO 02', 0, NULL, NULL),
(5, 'PROMO 03', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblviews`
--

CREATE TABLE `tblviews` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idView` int(11) NOT NULL,
  `datacriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tblviews`
--

INSERT INTO `tblviews` (`id`, `idUser`, `idView`, `datacriacao`) VALUES
(13, 1, 1, '2023-09-18 00:00:00'),
(14, 2, 6, '2023-09-18 00:00:00'),
(15, 2, 3, '2023-09-19 00:00:00'),
(16, 1, 1, '2023-09-19 00:00:00'),
(17, 1, 2, '2023-09-19 00:00:00'),
(18, 13, 1, '2023-09-19 00:00:00'),
(19, 1, 2, '2023-09-19 00:00:00'),
(20, 1, 2, '2023-09-19 00:00:00'),
(21, 1, 2, '2023-09-19 00:00:00'),
(22, 1, 2, '2023-09-19 00:00:00'),
(23, 1, 2, '2023-09-19 00:00:00'),
(24, 13, 13, '2023-09-19 00:00:00'),
(25, 13, 1, '2023-09-19 00:00:00'),
(26, 13, 1, '2023-09-19 00:00:00'),
(27, 1, 13, '2023-09-19 00:00:00'),
(28, 2, 13, '2023-09-19 00:00:00'),
(29, 1, 7, '2023-09-19 00:00:00'),
(30, 9, 1, '2023-09-19 00:00:00'),
(31, 1, 2, '2023-09-26 00:00:00'),
(32, 1, 2, '2023-09-27 00:00:00'),
(33, 1, 9, '2023-09-27 00:00:00'),
(34, 1, 1, '2023-09-29 00:00:00'),
(35, 1, 3, '2023-09-29 00:00:00'),
(36, 17, 17, '2023-10-02 00:00:00'),
(37, 17, 3, '2023-10-02 00:00:00'),
(38, 17, 16, '2023-10-02 00:00:00'),
(39, 17, 2, '2023-10-02 00:00:00'),
(40, 17, 16, '2023-10-03 00:00:00'),
(41, 17, 17, '2023-10-05 00:00:00'),
(42, 17, 1, '2023-10-05 00:00:00'),
(43, 1, 2, '2023-10-05 00:00:00'),
(44, 1, 1, '2023-10-05 00:00:00'),
(45, 22, 2, '2023-10-05 00:00:00'),
(46, 22, 22, '2023-10-05 00:00:00'),
(47, 22, 11, '2023-10-05 00:00:00'),
(48, 21, 1, '2023-10-13 00:00:00'),
(49, 21, 2, '2023-10-13 00:00:00'),
(50, 21, 21, '2023-10-13 00:00:00'),
(51, 21, 22, '2023-10-13 00:00:00'),
(52, 21, 20, '2023-10-13 00:00:00'),
(53, 16, 17, '2023-10-15 00:00:00'),
(54, 21, 26, '2023-10-15 00:00:00'),
(55, 26, 21, '2023-10-15 00:00:00'),
(56, 26, 26, '2023-10-15 00:00:00'),
(57, 21, 16, '2023-10-16 00:00:00'),
(58, 21, 16, '2023-10-18 00:00:00'),
(59, 21, 21, '2023-10-18 00:00:00'),
(60, 21, 20, '2023-10-18 00:00:00'),
(61, 20, 20, '2023-10-18 00:00:00'),
(62, 21, 26, '2023-10-23 00:00:00'),
(63, 21, 27, '2023-10-23 00:00:00'),
(64, 16, 3, '2023-10-25 00:00:00'),
(65, 26, 26, '2023-10-25 00:00:00'),
(66, 21, 26, '2023-10-25 00:00:00'),
(67, 21, 16, '2023-10-25 00:00:00'),
(68, 21, 2, '2023-10-25 00:00:00'),
(69, 21, 16, '2023-10-26 00:00:00'),
(70, 21, 21, '2023-10-27 00:00:00'),
(71, 21, 27, '2023-10-27 00:00:00'),
(72, 21, 3, '2023-10-27 00:00:00'),
(73, 27, 27, '2023-10-27 00:00:00'),
(74, 16, 27, '2023-10-27 00:00:00'),
(75, 16, 21, '2023-10-27 00:00:00'),
(76, 16, 6, '2023-10-28 00:00:00'),
(77, 21, 16, '2023-10-28 00:00:00'),
(78, 21, 21, '2023-10-30 00:00:00'),
(79, 21, 21, '2023-10-31 00:00:00'),
(80, 21, 16, '2023-10-31 00:00:00'),
(81, 27, 27, '2023-10-31 00:00:00'),
(82, 21, 26, '2023-10-31 00:00:00'),
(83, 21, 27, '2023-10-31 00:00:00'),
(84, 27, 26, '2023-10-31 00:00:00'),
(85, 27, 16, '2023-10-31 00:00:00'),
(86, 26, 27, '2023-10-31 00:00:00'),
(87, 26, 21, '2023-10-31 00:00:00'),
(88, 30, 30, '2023-11-01 00:00:00'),
(89, 28, 31, '2023-11-01 00:00:00'),
(90, 28, 30, '2023-11-01 00:00:00'),
(91, 30, 28, '2023-11-01 00:00:00'),
(92, 31, 28, '2023-11-01 00:00:00'),
(93, 28, 28, '2023-11-01 00:00:00'),
(94, 28, 31, '2023-11-03 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpostcoment`
--

CREATE TABLE `tbpostcoment` (
  `id` int(11) NOT NULL,
  `idpost` int(11) DEFAULT NULL,
  `texto` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datahora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbpostcoment`
--

INSERT INTO `tbpostcoment` (`id`, `idpost`, `texto`, `datahora`, `iduser`) VALUES
(1, 73, 'teste', '2023-07-31 16:26:14', 1),
(2, 72, 'teste', '2023-07-31 19:21:25', 1),
(3, 72, 'teste', '2023-07-31 19:24:16', 1),
(4, 115, 'dfsdfsdf', '2023-09-07 01:44:26', 1),
(5, 115, 'teste', '2023-09-07 02:12:07', 1),
(6, 114, 'Comentario\n', '2023-09-19 15:29:38', 1),
(7, 113, 'Comentario', '2023-09-19 15:29:55', 1),
(8, 118, 'asdasd', '2023-09-19 16:06:42', 13),
(9, 118, 'Post bem feito', '2023-09-19 16:16:57', 1),
(10, 121, 'comentario', '2023-09-19 17:12:58', 1),
(11, 121, 'texte', '2023-09-19 17:13:03', 1),
(12, 121, 'djvnsnv \n', '2023-09-19 17:13:08', 1),
(13, 121, 'vsdvsv', '2023-09-19 17:13:09', 1),
(14, 121, 'sdvsdv', '2023-09-19 17:13:11', 1),
(15, 121, 'sdvdvdsvsdvd', '2023-09-19 17:13:14', 1),
(16, 121, 'sdvdvsvdvd', '2023-09-19 17:13:18', 1),
(17, 124, 'efsd', '2023-09-19 17:14:10', 1),
(18, 127, 'Vamos fazer negócios no Brasil?', '2023-09-19 20:51:52', 2),
(19, 127, 'teste', '2023-09-29 09:48:03', 1),
(20, 129, 'teste', '2023-09-29 09:57:00', 1),
(21, 136, 'Lucas picareta..... sem vergonha, tem trabalho dobrado o fim de semana\n', '2023-09-29 18:37:54', 16),
(22, 131, 'jlhjk', '2023-10-02 16:21:50', 17),
(23, 138, 'teste', '2023-10-05 07:41:26', 17),
(24, 137, 'TESTE', '2023-10-05 14:59:12', 1),
(25, 140, 'Hhghhjh', '2023-10-10 14:27:38', 16),
(26, 142, 'bom trabalho ', '2023-10-13 16:23:14', 21),
(27, 146, 'teste', '2023-10-13 17:25:11', 21),
(28, 157, 'Foto invertida, câmera self celular com camera virado para esquerda ', '2023-10-15 15:52:45', 16),
(29, 168, 'Tirei uma foto mas não publicou', '2023-10-18 07:12:58', 16),
(30, 279, 'TESTE DE COMENTARIOS', '2023-10-22 12:35:28', 21),
(31, 278, 'Agora os comentários são exibidos ', '2023-10-22 12:35:51', 21),
(32, 273, 'teste unico', '2023-10-22 12:36:38', 21),
(33, 282, 'oi teste', '2023-10-23 03:32:46', 21),
(34, 284, 'teste', '2023-10-23 03:42:17', 21),
(35, 285, 'agora  aparece aqui', '2023-10-23 04:31:04', 21),
(36, 291, 'oi', '2023-10-23 13:03:52', 21),
(37, 292, 'belo site', '2023-10-23 13:05:28', 21),
(38, 293, 'precisamos ter um botão de edição da postagem\n', '2023-10-25 17:14:02', 26),
(39, 295, 'oi', '2023-10-25 20:26:40', 21),
(40, 295, 'dfgzdfgzdfg', '2023-10-25 20:26:54', 21),
(41, 296, 'SAFASFAS', '2023-10-27 12:39:28', 21),
(42, 297, 'cb\\dfhdf', '2023-10-28 10:01:24', 21),
(43, 298, 'Picareta', '2023-10-31 19:24:33', 16),
(44, 299, 'vão trabalhar no feriado?\n', '2023-10-31 19:34:11', 26),
(45, 299, 'comentario', '2023-10-31 19:34:36', 27),
(46, 299, 'oi\n', '2023-10-31 19:35:07', 27),
(47, 303, 'oi', '2023-11-01 15:05:00', 30),
(48, 303, 'teste', '2023-11-01 15:06:46', 30),
(49, 308, 'oi\n', '2023-11-01 15:19:30', 31),
(50, 308, 'oii', '2023-11-01 15:19:39', 30),
(51, 308, 'Tenho interrese\n', '2023-11-01 15:19:43', 31),
(52, 307, 'teste', '2023-11-01 15:25:46', 28),
(54, 308, 'teste', '2023-11-01 16:19:39', 30),
(55, 307, 'xvxcvxcv', '2023-11-01 16:20:00', 28),
(57, 308, 'teste', '2023-11-01 19:00:53', 28),
(58, 309, 'teste', '2023-11-02 00:31:56', 28);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste`
--

CREATE TABLE `teste` (
  `idTeste` int(11) NOT NULL,
  `slaTeste` int(11) NOT NULL,
  `mensagemTeste` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `teste`
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
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcurtidas`
--
ALTER TABLE `tbcurtidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblAction`
--
ALTER TABLE `tblAction`
  ADD PRIMARY KEY (`IdAction`);

--
-- Índices de tabela `tblAds`
--
ALTER TABLE `tblAds`
  ADD PRIMARY KEY (`IdAd`);

--
-- Índices de tabela `tblAdsLocal`
--
ALTER TABLE `tblAdsLocal`
  ADD PRIMARY KEY (`AdLocalId`);

--
-- Índices de tabela `tblBusiness`
--
ALTER TABLE `tblBusiness`
  ADD PRIMARY KEY (`idBusiness`);

--
-- Índices de tabela `tblBusinessCategory`
--
ALTER TABLE `tblBusinessCategory`
  ADD PRIMARY KEY (`idBusinessCategory`),
  ADD KEY `idBusiness` (`idBusiness`);

--
-- Índices de tabela `tblChat`
--
ALTER TABLE `tblChat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idClientEnviado` (`idClientEnviado`);

--
-- Índices de tabela `tblClientsContracts`
--
ALTER TABLE `tblClientsContracts`
  ADD PRIMARY KEY (`IdClientContract`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `idContract` (`idContract`);

--
-- Índices de tabela `tblconect`
--
ALTER TABLE `tblconect`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblContract`
--
ALTER TABLE `tblContract`
  ADD PRIMARY KEY (`idContract`),
  ADD KEY `IdContractType` (`IdContractType`);

--
-- Índices de tabela `tblContractTypes`
--
ALTER TABLE `tblContractTypes`
  ADD PRIMARY KEY (`IdContractType`);

--
-- Índices de tabela `tblCountry`
--
ALTER TABLE `tblCountry`
  ADD PRIMARY KEY (`idCountry`);

--
-- Índices de tabela `tblCustomer`
--
ALTER TABLE `tblCustomer`
  ADD PRIMARY KEY (`IdCustomer`);

--
-- Índices de tabela `tblDistributorProfile`
--
ALTER TABLE `tblDistributorProfile`
  ADD PRIMARY KEY (`idDistributorProfile`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices de tabela `tblEmpresas`
--
ALTER TABLE `tblEmpresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `taxid` (`taxid`);

--
-- Índices de tabela `tblFeeds`
--
ALTER TABLE `tblFeeds`
  ADD PRIMARY KEY (`IdFeed`);

--
-- Índices de tabela `tblFlagStatusCadastro`
--
ALTER TABLE `tblFlagStatusCadastro`
  ADD PRIMARY KEY (`idFlagStatusCadastro`);

--
-- Índices de tabela `tblHelp`
--
ALTER TABLE `tblHelp`
  ADD PRIMARY KEY (`idHelp`);

--
-- Índices de tabela `tblLogAction`
--
ALTER TABLE `tblLogAction`
  ADD PRIMARY KEY (`idLogAction`);

--
-- Índices de tabela `tblLogActivity`
--
ALTER TABLE `tblLogActivity`
  ADD PRIMARY KEY (`idLogActivity`);

--
-- Índices de tabela `tblLogError`
--
ALTER TABLE `tblLogError`
  ADD PRIMARY KEY (`idLogError`),
  ADD KEY `IdError` (`IdError`);

--
-- Índices de tabela `tblLogErrorCode`
--
ALTER TABLE `tblLogErrorCode`
  ADD PRIMARY KEY (`idLogErrorCode`);

--
-- Índices de tabela `tblLogModules`
--
ALTER TABLE `tblLogModules`
  ADD PRIMARY KEY (`idLogModules`);

--
-- Índices de tabela `tblMatch`
--
ALTER TABLE `tblMatch`
  ADD PRIMARY KEY (`IdMatch`);

--
-- Índices de tabela `tblMatchStatusId`
--
ALTER TABLE `tblMatchStatusId`
  ADD PRIMARY KEY (`MatchStatusId`);

--
-- Índices de tabela `tblMessage_Results`
--
ALTER TABLE `tblMessage_Results`
  ADD PRIMARY KEY (`MessageID`);

--
-- Índices de tabela `tblNivelOperacao`
--
ALTER TABLE `tblNivelOperacao`
  ADD PRIMARY KEY (`idNivelOperacao`);

--
-- Índices de tabela `tblNotificationsTypes`
--
ALTER TABLE `tblNotificationsTypes`
  ADD PRIMARY KEY (`idTypeNotifcation`);

--
-- Índices de tabela `tblNumEmpregados`
--
ALTER TABLE `tblNumEmpregados`
  ADD PRIMARY KEY (`idNumEmpregados`);

--
-- Índices de tabela `tblOperations`
--
ALTER TABLE `tblOperations`
  ADD PRIMARY KEY (`idOperation`);

--
-- Índices de tabela `tblProductPictures`
--
ALTER TABLE `tblProductPictures`
  ADD PRIMARY KEY (`idProductPicture`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Índices de tabela `tblProducts`
--
ALTER TABLE `tblProducts`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idBusinessCategory` (`idBusinessCategory`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices de tabela `tblQualificationCB`
--
ALTER TABLE `tblQualificationCB`
  ADD PRIMARY KEY (`idQualificationCB`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `IdBusinessCategory` (`IdBusinessCategory`);

--
-- Índices de tabela `tblQualificationSB`
--
ALTER TABLE `tblQualificationSB`
  ADD PRIMARY KEY (`idQualificationSB`),
  ADD KEY `IdClient` (`IdClient`),
  ADD KEY `IdBusinessCategory` (`IdBusinessCategory`);

--
-- Índices de tabela `tblRangeValues`
--
ALTER TABLE `tblRangeValues`
  ADD PRIMARY KEY (`idlRangeValue`);

--
-- Índices de tabela `tblResponseId`
--
ALTER TABLE `tblResponseId`
  ADD PRIMARY KEY (`ResponseId`);

--
-- Índices de tabela `tblSearch`
--
ALTER TABLE `tblSearch`
  ADD PRIMARY KEY (`idSearch`),
  ADD KEY `coreBussinessID` (`coreBussinessID`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices de tabela `tblSearchBusiness`
--
ALTER TABLE `tblSearchBusiness`
  ADD PRIMARY KEY (`idSearchBusiness`),
  ADD KEY `idSearch` (`idSearch`),
  ADD KEY `idBusiness` (`idBusiness`);

--
-- Índices de tabela `tblSearchCategory`
--
ALTER TABLE `tblSearchCategory`
  ADD PRIMARY KEY (`idSearchCategory`),
  ADD KEY `idSearch` (`idSearch`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Índices de tabela `tblSearchCountry`
--
ALTER TABLE `tblSearchCountry`
  ADD PRIMARY KEY (`idSearchCountry`),
  ADD KEY `idSearch` (`idSearch`),
  ADD KEY `idCountry` (`idCountry`);

--
-- Índices de tabela `tblSearchEspecificationTag`
--
ALTER TABLE `tblSearchEspecificationTag`
  ADD PRIMARY KEY (`idSearchEspecificationTag`),
  ADD KEY `idSearch` (`idSearch`);

--
-- Índices de tabela `tblSearchProfile_NameID`
--
ALTER TABLE `tblSearchProfile_NameID`
  ADD PRIMARY KEY (`SearchProfileNameId`),
  ADD KEY `idClient` (`idClient`);

--
-- Índices de tabela `tblsearchprofile_results`
--
ALTER TABLE `tblsearchprofile_results`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tblSearchProfile_Results2`
--
ALTER TABLE `tblSearchProfile_Results2`
  ADD PRIMARY KEY (`SearchProfile_ResultsID`);

--
-- Índices de tabela `tblSearchProfile_ResultsHistoryLog`
--
ALTER TABLE `tblSearchProfile_ResultsHistoryLog`
  ADD PRIMARY KEY (`SearchProfile_ResultsHistoryID`);

--
-- Índices de tabela `tblSearchResults`
--
ALTER TABLE `tblSearchResults`
  ADD PRIMARY KEY (`idSearchResults`),
  ADD KEY `idSearch` (`idSearch`),
  ADD KEY `idClientPesquisador` (`idClientPesquisador`),
  ADD KEY `idClientResultado` (`idClientResultado`);

--
-- Índices de tabela `tblSearchSpecification`
--
ALTER TABLE `tblSearchSpecification`
  ADD PRIMARY KEY (`idSearchSpecification`),
  ADD KEY `idSearch` (`idSearch`),
  ADD KEY `idNumEmpregados` (`idNumEmpregados`),
  ADD KEY `idlRangeValue` (`idlRangeValue`),
  ADD KEY `idNivelOperacao` (`idNivelOperacao`);

--
-- Índices de tabela `tblSearchStructure`
--
ALTER TABLE `tblSearchStructure`
  ADD PRIMARY KEY (`SearchFieldID`);

--
-- Índices de tabela `tblUserClients`
--
ALTER TABLE `tblUserClients`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `tblUserPerfil`
--
ALTER TABLE `tblUserPerfil`
  ADD PRIMARY KEY (`idPerfilUsuario`);

--
-- Índices de tabela `tblviews`
--
ALTER TABLE `tblviews`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbpostcoment`
--
ALTER TABLE `tbpostcoment`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`idTeste`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcurtidas`
--
ALTER TABLE `tbcurtidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `tblAction`
--
ALTER TABLE `tblAction`
  MODIFY `IdAction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblAds`
--
ALTER TABLE `tblAds`
  MODIFY `IdAd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tblAdsLocal`
--
ALTER TABLE `tblAdsLocal`
  MODIFY `AdLocalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblBusiness`
--
ALTER TABLE `tblBusiness`
  MODIFY `idBusiness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tblBusinessCategory`
--
ALTER TABLE `tblBusinessCategory`
  MODIFY `idBusinessCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT de tabela `tblChat`
--
ALTER TABLE `tblChat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de tabela `tblClientsContracts`
--
ALTER TABLE `tblClientsContracts`
  MODIFY `IdClientContract` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblconect`
--
ALTER TABLE `tblconect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tblContract`
--
ALTER TABLE `tblContract`
  MODIFY `idContract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tblContractTypes`
--
ALTER TABLE `tblContractTypes`
  MODIFY `IdContractType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tblCountry`
--
ALTER TABLE `tblCountry`
  MODIFY `idCountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT de tabela `tblCustomer`
--
ALTER TABLE `tblCustomer`
  MODIFY `IdCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tblDistributorProfile`
--
ALTER TABLE `tblDistributorProfile`
  MODIFY `idDistributorProfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tblEmpresas`
--
ALTER TABLE `tblEmpresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tblFeeds`
--
ALTER TABLE `tblFeeds`
  MODIFY `IdFeed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT de tabela `tblFlagStatusCadastro`
--
ALTER TABLE `tblFlagStatusCadastro`
  MODIFY `idFlagStatusCadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblHelp`
--
ALTER TABLE `tblHelp`
  MODIFY `idHelp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblLogAction`
--
ALTER TABLE `tblLogAction`
  MODIFY `idLogAction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblLogActivity`
--
ALTER TABLE `tblLogActivity`
  MODIFY `idLogActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de tabela `tblLogError`
--
ALTER TABLE `tblLogError`
  MODIFY `idLogError` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblLogErrorCode`
--
ALTER TABLE `tblLogErrorCode`
  MODIFY `idLogErrorCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2727;

--
-- AUTO_INCREMENT de tabela `tblLogModules`
--
ALTER TABLE `tblLogModules`
  MODIFY `idLogModules` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblMatch`
--
ALTER TABLE `tblMatch`
  MODIFY `IdMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT de tabela `tblMatchStatusId`
--
ALTER TABLE `tblMatchStatusId`
  MODIFY `MatchStatusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblMessage_Results`
--
ALTER TABLE `tblMessage_Results`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblNivelOperacao`
--
ALTER TABLE `tblNivelOperacao`
  MODIFY `idNivelOperacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblNotificationsTypes`
--
ALTER TABLE `tblNotificationsTypes`
  MODIFY `idTypeNotifcation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tblNumEmpregados`
--
ALTER TABLE `tblNumEmpregados`
  MODIFY `idNumEmpregados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblOperations`
--
ALTER TABLE `tblOperations`
  MODIFY `idOperation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tblProductPictures`
--
ALTER TABLE `tblProductPictures`
  MODIFY `idProductPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `tblProducts`
--
ALTER TABLE `tblProducts`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tblQualificationCB`
--
ALTER TABLE `tblQualificationCB`
  MODIFY `idQualificationCB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;

--
-- AUTO_INCREMENT de tabela `tblQualificationSB`
--
ALTER TABLE `tblQualificationSB`
  MODIFY `idQualificationSB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT de tabela `tblRangeValues`
--
ALTER TABLE `tblRangeValues`
  MODIFY `idlRangeValue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tblResponseId`
--
ALTER TABLE `tblResponseId`
  MODIFY `ResponseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblSearch`
--
ALTER TABLE `tblSearch`
  MODIFY `idSearch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `tblSearchBusiness`
--
ALTER TABLE `tblSearchBusiness`
  MODIFY `idSearchBusiness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de tabela `tblSearchCategory`
--
ALTER TABLE `tblSearchCategory`
  MODIFY `idSearchCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblSearchCountry`
--
ALTER TABLE `tblSearchCountry`
  MODIFY `idSearchCountry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblSearchEspecificationTag`
--
ALTER TABLE `tblSearchEspecificationTag`
  MODIFY `idSearchEspecificationTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tblSearchProfile_NameID`
--
ALTER TABLE `tblSearchProfile_NameID`
  MODIFY `SearchProfileNameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tblsearchprofile_results`
--
ALTER TABLE `tblsearchprofile_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT de tabela `tblSearchProfile_Results2`
--
ALTER TABLE `tblSearchProfile_Results2`
  MODIFY `SearchProfile_ResultsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1835;

--
-- AUTO_INCREMENT de tabela `tblSearchProfile_ResultsHistoryLog`
--
ALTER TABLE `tblSearchProfile_ResultsHistoryLog`
  MODIFY `SearchProfile_ResultsHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblSearchResults`
--
ALTER TABLE `tblSearchResults`
  MODIFY `idSearchResults` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=374;

--
-- AUTO_INCREMENT de tabela `tblSearchSpecification`
--
ALTER TABLE `tblSearchSpecification`
  MODIFY `idSearchSpecification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tblSearchStructure`
--
ALTER TABLE `tblSearchStructure`
  MODIFY `SearchFieldID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tblUserClients`
--
ALTER TABLE `tblUserClients`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tblUserPerfil`
--
ALTER TABLE `tblUserPerfil`
  MODIFY `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tblviews`
--
ALTER TABLE `tblviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `tbpostcoment`
--
ALTER TABLE `tbpostcoment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `teste`
--
ALTER TABLE `teste`
  MODIFY `idTeste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=782;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblBusinessCategory`
--
ALTER TABLE `tblBusinessCategory`
  ADD CONSTRAINT `tblBusinessCategory_ibfk_1` FOREIGN KEY (`idBusiness`) REFERENCES `tblBusiness` (`idBusiness`);

--
-- Restrições para tabelas `tblChat`
--
ALTER TABLE `tblChat`
  ADD CONSTRAINT `tblChat_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tblUserClients` (`idClient`),
  ADD CONSTRAINT `tblChat_ibfk_2` FOREIGN KEY (`idClientEnviado`) REFERENCES `tblUserClients` (`idClient`);

--
-- Restrições para tabelas `tblContract`
--
ALTER TABLE `tblContract`
  ADD CONSTRAINT `tblContract_ibfk_1` FOREIGN KEY (`IdContractType`) REFERENCES `tblContractTypes` (`IdContractType`);

--
-- Restrições para tabelas `tblLogError`
--
ALTER TABLE `tblLogError`
  ADD CONSTRAINT `tblLogError_ibfk_1` FOREIGN KEY (`IdError`) REFERENCES `tblLogErrorCode` (`idLogErrorCode`);

--
-- Restrições para tabelas `tblSearch`
--
ALTER TABLE `tblSearch`
  ADD CONSTRAINT `tblSearch_ibfk_1` FOREIGN KEY (`coreBussinessID`) REFERENCES `tblOperations` (`idOperation`),
  ADD CONSTRAINT `tblSearch_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `tblUserClients` (`idClient`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `Pesquisa Event` ON SCHEDULE EVERY 20 SECOND STARTS '2023-10-27 12:52:14' ON COMPLETION PRESERVE ENABLE DO CALL `ProcedureMestre`()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
