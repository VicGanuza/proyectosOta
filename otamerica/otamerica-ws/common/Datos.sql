-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.23 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla otamerica.access_types
CREATE TABLE IF NOT EXISTS `access_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `lang_key` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.access_types: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `access_types` DISABLE KEYS */;
INSERT INTO `access_types` (`id`, `name`, `lang_key`) VALUES
	(0, 'All Access Types', 'all'),
	(1, 'Tankers', 'tankers'),
	(2, 'Vessels', 'vessels'),
	(3, 'Barges', 'barges'),
	(4, 'Bunker Boats', 'bunkeBoats'),
	(5, 'Rail Cars', 'railCars'),
	(6, 'Tank Trucks', 'tankTrucks'),
	(7, 'Pipeline', 'pipeline'),
	(8, 'Jetty', 'jetty'),
	(9, 'Berth', 'berth'),
	(10, 'ISO Container', 'isoContainer'),
	(11, 'Tank-to-Tank', 'tankToTank');
/*!40000 ALTER TABLE `access_types` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.business_areas
CREATE TABLE IF NOT EXISTS `business_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `lang_key` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.business_areas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `business_areas` DISABLE KEYS */;
INSERT INTO `business_areas` (`id`, `name`, `lang_key`) VALUES
	(0, 'All Business Areas', 'all'),
	(1, 'Tank Storage Logistics (All Areas)', 'tankStorage'),
	(2, 'Petroleum Storage', 'petroleumStorage'),
	(3, 'Chemical Storage', 'chemicalStorage'),
	(4, 'Storage of Others Liquids', 'storageOfOthersLiquids'),
	(5, 'Gas Storage', 'gasStorage');
/*!40000 ALTER TABLE `business_areas` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.certification
CREATE TABLE IF NOT EXISTS `certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.certification: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `certification` DISABLE KEYS */;
INSERT INTO `certification` (`id`, `name`) VALUES
	(1, 'ISO 9001'),
	(2, 'ISO 14001'),
	(3, 'OHSAS 18001'),
	(4, 'ISO 45001');
/*!40000 ALTER TABLE `certification` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.certification_office
CREATE TABLE IF NOT EXISTS `certification_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certification_id` int(11) NOT NULL DEFAULT '0',
  `office_id` int(11) NOT NULL DEFAULT '0',
  `url` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_certification_office_certification` (`certification_id`),
  KEY `FK_certification_office_offices` (`office_id`),
  CONSTRAINT `FK_certification_office_certification` FOREIGN KEY (`certification_id`) REFERENCES `certification` (`id`),
  CONSTRAINT `FK_certification_office_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.certification_office: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `certification_office` DISABLE KEYS */;
INSERT INTO `certification_office` (`id`, `certification_id`, `office_id`, `url`) VALUES
	(1, 1, 2, 'argentina/certificates/Brandsen, Buenos Aires_Certificate_ISO 9001.pdf'),
	(2, 2, 2, 'argentina/certificates/Oiltanking-Ebytem_Argentina_Puerto-Rosales_Brandsen_Certificate_ISO-14001.pdf'),
	(3, 4, 2, 'argentina/certificates/Oiltanking-Ebytem_Argentina_Puerto-Rosales_Brandsen_Certificate_ISO-45001.pdf'),
	(4, 1, 10, 'colombia/certificates/Oiltanking-Colombia_Colombia_Certificate_ISO-9001.pdf'),
	(5, 2, 10, 'colombia/certificates/Oiltanking-Colombia_Colombia_Certificate_ISO-14001.pdf'),
	(6, 3, 10, 'colombia/certificates/Oiltanking-Colombia_Colombia_Certificate_OHSAS-18001.pdf'),
	(7, 1, 13, 'panama/certificates/Oiltanking-COASSA_Panama_Certificate_ISO-9001.pdf'),
	(8, 1, 14, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-9001.pdf'),
	(9, 2, 14, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-14001.pdf'),
	(10, 3, 14, 'peru/certificates/Oiltanking-Peru_Certificate_OHSAS-18001.pdf'),
	(11, 1, 15, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-9001.pdf'),
	(12, 2, 15, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-14001.pdf'),
	(13, 3, 15, 'peru/certificates/Oiltanking-Peru_Certificate_OHSAS-18001.pdf'),
	(14, 1, 16, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-9001.pdf'),
	(15, 2, 16, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-14001.pdf'),
	(16, 3, 16, 'peru/certificates/Oiltanking-Peru_Certificate_OHSAS-18001.pdf'),
	(17, 1, 20, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-9001.pdf'),
	(18, 2, 20, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-14001.pdf'),
	(19, 3, 20, 'peru/certificates/Oiltanking-Peru_Certificate_OHSAS-18001.pdf'),
	(20, 1, 21, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-9001.pdf'),
	(21, 2, 21, 'peru/certificates/Oiltanking-Peru_Certificate_ISO-14001.pdf'),
	(22, 3, 21, 'peru/certificates/Oiltanking-Peru_Certificate_OHSAS-18001.pdf'),
	(23, 1, 3, 'argentina/certificates/Punta Alta, Buenos Aires_Certificate_ISO 9001.pdf'),
	(24, 2, 3, 'argentina/certificates/Oiltanking-Ebytem_Argentina_Puerto-Rosales_Brandsen_Certificate_ISO-14001.pdf'),
	(25, 4, 3, 'argentina/certificates/Oiltanking-Ebytem_Argentina_Puerto-Rosales_Brandsen_Certificate_ISO-45001.pdf'),
	(26, 4, 10, 'colombia/certificates/Oiltanking-Colombia_Colombia_Certificate_ISO-45001.pdf');
/*!40000 ALTER TABLE `certification_office` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.current_policies
CREATE TABLE IF NOT EXISTS `current_policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.current_policies: 2 rows
/*!40000 ALTER TABLE `current_policies` DISABLE KEYS */;
INSERT INTO `current_policies` (`id`, `name`, `url`) VALUES
	(1, 'Marquard-Bahls_Code-', 'policies/carnet conducir_ Victoria Ganuza.pdf'),
	(2, 'PolÃ­tica de Lucha Contra la CorrupciÃ³n Oiltanking AmÃ©rica', 'policies/Politica de Lucha contra la CorrupciÃ³n Oiltanking AmÃ©rica.pdf');
/*!40000 ALTER TABLE `current_policies` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.documentation
CREATE TABLE IF NOT EXISTS `documentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `url` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `office_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_documentation_offices` (`office_id`),
  CONSTRAINT `FK_documentation_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla otamerica.documentation: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `documentation` DISABLE KEYS */;
INSERT INTO `documentation` (`id`, `name`, `url`, `office_id`) VALUES
	(1, 'Brandsen Campana Pipeline', 'argentina/Oiltanking-Ebytem_Terminal-Brandsen_Campana-Pipeline_Public-Info.pdf', 2),
	(2, 'Petrobas Pipeline', 'argentina/Oiltanking-Ebytem_Puerto-Rosales_Petrobras-Pipeline_Public-Info.pdf', 3),
	(4, 'Manual de InformaciÃ³n General y Reglamento Portuario', 'argentina/Oiltanking-Ebytem_Argentina_Puerto-Rosales_Manual-de-Inf-Gral-Reglamento-Portuario.pdf', 3),
	(6, 'Res_1136_2019 RCTO Oiltanking Colombia', 'colombia/Res_1136_2019_RCTO_Oiltanking-Colombia.pdf', 10),
	(7, 'pepe corregido y editado', 'argentina/Punta Alta, Buenos Aires_Document_pepe corregido.pdf', 3);
/*!40000 ALTER TABLE `documentation` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.historical_movements
CREATE TABLE IF NOT EXISTS `historical_movements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `year` year(4) NOT NULL,
  `month` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'PDF',
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.historical_movements: ~142 rows (aproximadamente)
/*!40000 ALTER TABLE `historical_movements` DISABLE KEYS */;
INSERT INTO `historical_movements` (`id`, `date`, `year`, `month`, `name`, `url`, `size`, `type`, `updated`) VALUES
	(1, '2022-10-10', '2022', 10, 'MovimentaÃ§Ã£o a partir de Outubro de 2022', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-10.xls', '5 KB', 'EXCEL', '2023-07-25 13:30:35'),
	(2, '2021-12-10', '2021', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-12.pdf', '', 'PDF', NULL),
	(3, '2021-11-10', '2021', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-11.pdf', '', 'PDF', NULL),
	(4, '2021-10-10', '2021', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-10.pdf', '', 'PDF', NULL),
	(5, '2021-09-10', '2021', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-09.pdf', '', 'PDF', NULL),
	(6, '2021-08-10', '2021', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-08.pdf', '', 'PDF', NULL),
	(7, '2021-07-10', '2021', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-07.pdf', '', 'PDF', NULL),
	(8, '2021-06-10', '2021', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-06.pdf', '', 'PDF', NULL),
	(9, '2021-05-10', '2021', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-05.pdf', '', 'PDF', NULL),
	(10, '2021-04-10', '2021', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-04.pdf', '', 'PDF', NULL),
	(11, '2021-03-10', '2021', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-03.pdf', '', 'PDF', NULL),
	(12, '2021-02-10', '2021', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-02.pdf', '', 'PDF', NULL),
	(13, '2021-01-10', '2021', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2021-01.pdf', '', 'PDF', NULL),
	(14, '2020-12-10', '2020', 12, NULL, 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-12.pdf', '', 'PDF', NULL),
	(15, '2020-11-10', '2020', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-11.pdf', '', 'PDF', NULL),
	(16, '2020-10-10', '2020', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-10.pdf', '', 'PDF', NULL),
	(17, '2020-09-10', '2020', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-09.pdf', '', 'PDF', NULL),
	(18, '2020-08-10', '2020', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-08.pdf', '', 'PDF', NULL),
	(19, '2020-07-10', '2020', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-07.pdf', '', 'PDF', NULL),
	(20, '2020-06-10', '2020', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-06.pdf', '', 'PDF', NULL),
	(35, '2020-05-10', '2020', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-05.pdf', '', 'PDF', NULL),
	(36, '2020-04-10', '2020', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-04.pdf', '', 'PDF', NULL),
	(37, '2020-03-10', '2020', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-03.pdf', '', 'PDF', NULL),
	(38, '2020-02-10', '2020', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-02.pdf', '', 'PDF', NULL),
	(39, '2020-01-10', '2020', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2020-01.pdf', '', 'PDF', NULL),
	(40, '2019-12-10', '2019', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-12.pdf', '', 'PDF', NULL),
	(41, '2019-11-10', '2019', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-11.pdf', '', 'PDF', NULL),
	(42, '2019-10-10', '2019', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-10.pdf', '', 'PDF', NULL),
	(43, '2019-09-10', '2019', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-09.pdf', '', 'PDF', NULL),
	(44, '2019-08-10', '2019', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-08.pdf', '', 'PDF', NULL),
	(45, '2019-07-10', '2019', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-07.pdf', '', 'PDF', NULL),
	(46, '2019-06-10', '2019', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-06.pdf', '', 'PDF', NULL),
	(47, '2019-05-10', '2019', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-05.pdf', '', 'PDF', NULL),
	(48, '2019-04-10', '2019', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-04.pdf', '', 'PDF', NULL),
	(49, '2019-03-10', '2019', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-03.pdf', '', 'PDF', NULL),
	(50, '2019-02-10', '2019', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-02.pdf', '', 'PDF', NULL),
	(51, '2019-01-10', '2019', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2019-01.pdf', '', 'PDF', NULL),
	(52, '2018-12-10', '2018', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-12.pdf', '', 'PDF', NULL),
	(53, '2018-11-10', '2018', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-11.pdf', '', 'PDF', NULL),
	(54, '2018-10-10', '2018', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-10.pdf', '', 'PDF', NULL),
	(55, '2018-09-10', '2018', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-09.pdf', '', 'PDF', NULL),
	(56, '2018-08-10', '2018', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-08.pdf', '', 'PDF', NULL),
	(57, '2018-07-10', '2018', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-07.pdf', '', 'PDF', NULL),
	(58, '2018-06-10', '2018', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-06.pdf', '', 'PDF', NULL),
	(59, '2018-05-10', '2018', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-05.pdf', '', 'PDF', NULL),
	(60, '2018-04-10', '2018', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-04.pdf', '', 'PDF', NULL),
	(61, '2018-03-10', '2018', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-03.pdf', '', 'PDF', NULL),
	(62, '2018-02-10', '2018', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-02.pdf', '', 'PDF', NULL),
	(63, '2018-01-10', '2018', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2018-01.pdf', '', 'PDF', NULL),
	(64, '2017-12-10', '2017', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-12.pdf', '', 'PDF', NULL),
	(65, '2017-11-10', '2017', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-11.pdf', '', 'PDF', NULL),
	(66, '2017-10-10', '2017', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-10.pdf', '', 'PDF', NULL),
	(67, '2017-09-10', '2017', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-09.pdf', '', 'PDF', NULL),
	(68, '2017-08-10', '2017', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-08.pdf', '', 'PDF', NULL),
	(69, '2017-07-10', '2017', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-07.pdf', '', 'PDF', NULL),
	(70, '2017-06-10', '2017', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-06.pdf', '', 'PDF', NULL),
	(71, '2017-05-10', '2017', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-05.pdf', '', 'PDF', NULL),
	(72, '2017-04-10', '2017', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-04.pdf', '', 'PDF', NULL),
	(73, '2017-03-10', '2017', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-03.pdf', '', 'PDF', NULL),
	(74, '2017-02-10', '2017', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-02.pdf', '', 'PDF', NULL),
	(75, '2017-01-10', '2017', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2017-01.pdf', '', 'PDF', NULL),
	(76, '2016-12-10', '2016', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-12.pdf', '', 'PDF', NULL),
	(77, '2016-11-10', '2016', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-11.pdf', '', 'PDF', NULL),
	(78, '2016-10-10', '2016', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-10.pdf', '', 'PDF', NULL),
	(79, '2016-09-10', '2016', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-09.pdf', '', 'PDF', NULL),
	(80, '2016-08-10', '2016', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-08.pdf', '', 'PDF', NULL),
	(81, '2016-07-10', '2016', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-07.pdf', '', 'PDF', NULL),
	(82, '2016-06-10', '2016', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-06.pdf', '', 'PDF', NULL),
	(83, '2016-05-10', '2016', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-05.pdf', '', 'PDF', NULL),
	(84, '2016-04-10', '2016', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-04.pdf', '', 'PDF', NULL),
	(85, '2016-03-10', '2016', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-03.pdf', '', 'PDF', NULL),
	(86, '2016-02-10', '2016', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-02.pdf', '', 'PDF', NULL),
	(87, '2016-01-10', '2016', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2016-01.pdf', '', 'PDF', NULL),
	(88, '2015-12-10', '2015', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-12.pdf', '', 'PDF', NULL),
	(89, '2015-11-10', '2015', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-11.pdf', '', 'PDF', NULL),
	(90, '2015-10-10', '2015', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-10.pdf', '', 'PDF', NULL),
	(91, '2015-09-10', '2015', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-09.pdf', '', 'PDF', NULL),
	(92, '2015-08-10', '2015', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-08.pdf', '', 'PDF', NULL),
	(93, '2015-07-10', '2015', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-07.pdf', '', 'PDF', NULL),
	(94, '2015-06-10', '2015', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-06.pdf', '', 'PDF', NULL),
	(95, '2015-05-10', '2015', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-05.pdf', '', 'PDF', NULL),
	(96, '2015-04-10', '2015', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-04.pdf', '', 'PDF', NULL),
	(97, '2015-03-10', '2015', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-03.pdf', '', 'PDF', NULL),
	(98, '2015-02-10', '2015', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-02.pdf', '', 'PDF', NULL),
	(99, '2015-01-10', '2015', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2015-01.pdf', '', 'PDF', NULL),
	(100, '2014-12-10', '2014', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-12.pdf', '', 'PDF', NULL),
	(101, '2014-11-10', '2014', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-11.pdf', '', 'PDF', NULL),
	(102, '2014-10-10', '2014', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-10.pdf', '', 'PDF', NULL),
	(103, '2014-09-10', '2014', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-09.pdf', '', 'PDF', NULL),
	(104, '2014-08-10', '2014', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-08.pdf', '', 'PDF', NULL),
	(105, '2014-07-10', '2014', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-07.pdf', '', 'PDF', NULL),
	(106, '2014-06-10', '2014', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-06.pdf', '', 'PDF', NULL),
	(107, '2014-05-10', '2014', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-05.pdf', '', 'PDF', NULL),
	(108, '2014-04-10', '2014', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-04.pdf', '', 'PDF', NULL),
	(109, '2014-03-10', '2014', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-03.pdf', '', 'PDF', NULL),
	(110, '2014-02-10', '2014', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-02.pdf', '', 'PDF', NULL),
	(111, '2014-01-10', '2014', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2014-01.pdf', '', 'PDF', NULL),
	(112, '2013-12-10', '2013', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-12.pdf', '', 'PDF', NULL),
	(113, '2013-11-10', '2013', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-11.pdf', '', 'PDF', NULL),
	(114, '2013-10-10', '2013', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-10.pdf', '', 'PDF', NULL),
	(115, '2013-07-10', '2013', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-07.pdf', '', 'PDF', NULL),
	(116, '2013-06-10', '2013', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-06.pdf', '', 'PDF', NULL),
	(117, '2013-05-10', '2013', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-05.pdf', '', 'PDF', NULL),
	(118, '2013-04-10', '2013', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-04.pdf', '', 'PDF', NULL),
	(119, '2013-03-10', '2013', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-03.pdf', '', 'PDF', NULL),
	(120, '2013-02-10', '2013', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-02.pdf', '', 'PDF', NULL),
	(121, '2013-01-10', '2013', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2013-01.pdf', '', 'PDF', NULL),
	(122, '2012-12-10', '2012', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-12.pdf', '', 'PDF', NULL),
	(123, '2012-11-10', '2012', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-11.pdf', '', 'PDF', NULL),
	(124, '2012-10-10', '2012', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-10.pdf', '', 'PDF', NULL),
	(125, '2012-09-10', '2012', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-09.pdf', '', 'PDF', NULL),
	(126, '2012-08-10', '2012', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-08.pdf', '', 'PDF', NULL),
	(127, '2012-07-10', '2012', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-07.pdf', '', 'PDF', NULL),
	(128, '2012-06-10', '2012', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-06.pdf', '', 'PDF', NULL),
	(129, '2012-05-10', '2012', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-05.pdf', '', 'PDF', NULL),
	(130, '2012-04-10', '2012', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-04.pdf', '', 'PDF', NULL),
	(131, '2012-03-10', '2012', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-03.pdf', '', 'PDF', NULL),
	(132, '2012-02-10', '2012', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-02.pdf', '', 'PDF', NULL),
	(133, '2012-01-10', '2012', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2012-01.pdf', '', 'PDF', NULL),
	(134, '2011-12-10', '2011', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-12.pdf', '', 'PDF', NULL),
	(135, '2011-11-10', '2011', 11, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-11.pdf', '', 'PDF', NULL),
	(136, '2011-10-10', '2011', 10, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-10.pdf', '', 'PDF', NULL),
	(137, '2011-09-10', '2011', 9, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-09.pdf', '', 'PDF', NULL),
	(138, '2011-08-10', '2011', 8, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-08.pdf', '', 'PDF', NULL),
	(139, '2011-07-10', '2011', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-07.pdf', '', 'PDF', NULL),
	(140, '2011-06-10', '2011', 6, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-06.pdf', '', 'PDF', NULL),
	(141, '2011-05-10', '2011', 5, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-05.pdf', '', 'PDF', NULL),
	(142, '2011-04-10', '2011', 4, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-04.pdf', '', 'PDF', NULL),
	(143, '2011-03-10', '2011', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-03.pdf', '', 'PDF', NULL),
	(144, '2011-02-10', '2011', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-02.pdf', '', 'PDF', NULL),
	(145, '2011-01-10', '2011', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2011-01.pdf', '', 'PDF', NULL),
	(411, '2022-02-10', '2022', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-2.pdf', '269 KB', 'PDF', NULL),
	(412, '2022-03-10', '2022', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-03.pdf', '', 'PDF', NULL),
	(413, '2022-05-23', '1981', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-12.pdf', '', 'PDF', NULL),
	(415, '2022-05-23', '1981', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-12.pdf', '', 'PDF', NULL),
	(416, '2022-05-23', '1981', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-12.pdf', '', 'PDF', NULL),
	(417, '2022-05-23', '1981', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-12.pdf', '', 'PDF', NULL),
	(418, '2022-05-23', '1981', 12, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-12.pdf', '', 'PDF', NULL),
	(419, '2022-05-27', '1981', 3, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_1981-3.pdf', '', 'PDF', NULL),
	(420, '2022-07-10', '2022', 7, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-7.pdf', '6933 KB', 'PDF', NULL),
	(422, '2022-01-10', '2022', 1, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-1.xls', '5 KB', 'EXCEL', NULL),
	(423, '2022-02-10', '2022', 2, '', 'brasil/history/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_2022-2.xlsx', '1383 KB', 'EXCEL', NULL);
/*!40000 ALTER TABLE `historical_movements` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lang_key` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.locations: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `name`, `lang_key`) VALUES
	(0, 'All Regions', 'all'),
	(1, 'Argentina', 'argentina'),
	(2, 'Brazil', 'brazil'),
	(3, 'Colombia', 'colombia'),
	(4, 'Mexico', 'mexico'),
	(5, 'Panama', 'panama'),
	(6, 'Peru', 'peru');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.maritime_facilities
CREATE TABLE IF NOT EXISTS `maritime_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `dwt` int(11) DEFAULT NULL,
  `draught` float DEFAULT NULL,
  `loa` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `displacement` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_maritime_facilities_offices` (`office_id`),
  CONSTRAINT `FK_maritime_facilities_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.maritime_facilities: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `maritime_facilities` DISABLE KEYS */;
INSERT INTO `maritime_facilities` (`id`, `name`, `dwt`, `draught`, `loa`, `office_id`, `displacement`) VALUES
	(1, 'maritimeFacility.monobuoyPC', 106000, NULL, NULL, 3, NULL),
	(2, 'maritimeFacility.monobuoyPA', 70000, NULL, NULL, 3, NULL),
	(3, 'maritimeFacility.berth905', 50000, 10, 180, 9, NULL),
	(4, 'maritimeFacility.northBerth', 320000, 24.5, NULL, 8, NULL),
	(5, 'maritimeFacility.centralBerth', 32000, 24.5, NULL, 8, NULL),
	(6, 'maritimeFacility.southBerth', 200000, 18, NULL, 8, NULL),
	(7, 'maritimeFacility.jetty', 15000, 8.5, 150, 10, NULL),
	(9, 'maritimeFacility.vesselJettyNorth', 195000, 22, 280, 22, NULL),
	(10, 'maritimeFacility.vesselJettySouth', 104000, 18, 240, 22, NULL),
	(11, 'maritimeFacility.jetty', 52000, 12.8, NULL, 12, NULL),
	(12, 'maritimeFacility.berth3', 75000, 12.5, 228, 13, 1),
	(13, 'maritimeFacility.multiBouy', 35000, 11, 214, 15, NULL),
	(14, 'maritimeFacility.multiBouy', 25000, 7.6, 183, 21, NULL),
	(15, 'maritimeFacility.multiBouy', 25000, 7.6, 190, 16, NULL),
	(16, 'maritimeFacility.multiBouy', 35000, 12.1, 183, 20, NULL),
	(17, 'maritimeFacility.jetty', 35000, 11.5, 262, 14, NULL),
	(18, 'maritimeFacility.jetty', 25000, 9.75, 245, 17, NULL),
	(19, 'maritimeFacility.marineBerth', 56800, 12.5, 230, 19, NULL),
	(20, 'maritimeFacility.berth2', 75000, 5.9, 115, 13, 1),
	(21, 'maritimeFacility.berth14ForBargeMaintenance', NULL, NULL, NULL, 13, NULL),
	(22, 'maritimeFacility.bargeJettyNorth', NULL, 5, 80, 22, NULL),
	(23, 'maritimeFacility.bargeJettySouth', NULL, 3, 82, 22, NULL);
/*!40000 ALTER TABLE `maritime_facilities` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `readmore` varchar(150) NOT NULL,
  `external_url` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.news: 2 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `headline`, `date`, `image`, `readmore`, `external_url`) VALUES
	(1, 'jdpProgram', '2023-02-10', 'Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg', 'https://grupociadetalentos.com/Oiltanking2023/', 1),
	(2, 'terminalSuape', '2023-02-15', 'Oiltanking Logística Brasil.jpg', '/terminalSuape', 0);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices
CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `office_terminal_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gps_coordinates` varchar(50) DEFAULT NULL,
  `local_time` varchar(50) DEFAULT NULL,
  `area_plan` varchar(50) DEFAULT NULL,
  `site_plan` varchar(50) DEFAULT NULL,
  `railway_map` varchar(100) DEFAULT NULL,
  `terminal_data` varchar(100) DEFAULT NULL,
  `terminal_page_img` varchar(100) DEFAULT NULL,
  `office_page_img` varchar(100) DEFAULT NULL,
  `tank_capacity` int(11) DEFAULT NULL,
  `tanks` int(11) DEFAULT NULL,
  `tank_sizes_min` int(11) DEFAULT NULL,
  `tank_sizes_max` int(11) DEFAULT NULL,
  `terminal_page` tinyint(2) DEFAULT NULL,
  `google_location` varchar(200) NOT NULL,
  `activa` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_offices_offices_terminals` (`office_terminal_id`),
  KEY `FK_offices_loactions` (`location_id`),
  CONSTRAINT `FK_offices_loactions` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  CONSTRAINT `FK_offices_offices_terminals` FOREIGN KEY (`office_terminal_id`) REFERENCES `offices_terminals` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.offices: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT INTO `offices` (`id`, `name`, `office_terminal_id`, `address`, `city`, `region`, `location_id`, `phone`, `fax`, `email`, `gps_coordinates`, `local_time`, `area_plan`, `site_plan`, `railway_map`, `terminal_data`, `terminal_page_img`, `office_page_img`, `tank_capacity`, `tanks`, `tank_sizes_min`, `tank_sizes_max`, `terminal_page`, `google_location`, `activa`) VALUES
	(1, 'Oiltanking Ebytem S.A.', 1, 'Martin Lezica 3075', 'San Isidro', 'San Isidro, Buenos Aires', 1, '+54 11 52301100', '+54 11 52301111', 'argentina@otamerica.com', '-34.494758, -58.547415', '-03:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Argentina_BsAs.jpeg', NULL, NULL, NULL, NULL, NULL, '', 1),
	(2, 'Oiltanking Ebytem S.A.', 2, 'Ruta Prov. 29 Km 14', 'Jeppener, Provincia de Buenos Aires', 'Brandsen, Buenos Aires', 1, '+54 11 52301100', '+54 11 52301111', 'argentina@otamerica.com', '-35.270674, -58.254639', '-03:00', 'argentina/AR-brandsen-area.png', 'argentina/AR-brandsen-site.png', NULL, NULL, 'otSouthAmericaArgentinaBrandsenTerminal.jpg', 'Oiltanking_South-America_Argentina_Brandsen_Building-Outside_2010-01-15_014.jpg', 70638, 3, 23546, NULL, 1, 'https://goo.gl/maps/vEuKBDs3vPpT7xG29', 1),
	(3, 'Oiltanking Ebytem S.A.', 3, '', 'Bahia Blanca', 'Punta Alta, Buenos Aires', 1, '+54 11 52301100', '+54 11 52301111', 'argentina@otamerica.com', '-38.925351, -62.047419', '-03:00', NULL, 'argentina/AR-puerto-rosales-site.png', NULL, NULL, 'Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg', 'Oiltanking_South-America_Argentina_Puerto-Rosales_Building-Outside_2012-01-24_6584.jpg', 479994, 18, 15316, 51840, 1, 'https://goo.gl/maps/VFscewneDp3VEe5EA', 1),
	(4, 'Oiltanking Terminais Ltda. - Rio de Janeiro', 4, 'Av. Paisagista José Silva de Azevedo Neto, 200 Bloco 02, sala 104', 'Condomínio O2', 'Barra da Tijuca, Rio de Janeiro', 2, '+55 21 2516-2966', '+55 21 3122-0566', 'brasil@otamerica.com', '-22.988233, -43.359160', '-03:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Brasil_RJ.jpeg', NULL, NULL, NULL, NULL, NULL, '', 0),
	(5, 'Oiltanking Açu Serviços Ltda.', 1, 'Av. Paisagista José Silva de Azevedo Neto, 200 Bloco 02, sala 104', NULL, 'Barra da Tijuca, Rio de Janeiro', 2, '+55 21 2516-2966', '+55 21 2516-2966', 'brasil@otamerica.com', '-22.988233, -43.359071', '-03:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Brasil_RJ.jpeg', NULL, NULL, NULL, NULL, NULL, '', 1),
	(6, 'Oiltanking Logistica Brasil Ltda', 1, 'Av. Paisagista José Silva de Azevedo Neto, 200 Bloco 02, sala 104', 'Condomínio O2', 'Barra da Tijuca, Rio de Janeiro', 2, '+55 21 2516-2966', NULL, 'brasil@otamerica.com', '-22.988206, -43.359237', '-03:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Brasil_RJ.jpeg', NULL, NULL, NULL, NULL, NULL, '', 1),
	(7, 'Açu Petróleo S.A.', 1, 'Rua da Passagem, 123', '11st floor', 'Botafogo, Rio de Janeiro - RJ, 22.290-030', 2, '+55 21 35296719', NULL, 'brasil@otamerica.com', '-22.953812, -43.181298', '-03:00', NULL, NULL, NULL, NULL, NULL, 'Oiltanking_South-America_Argentina_Brandsen_Building-Outside_2010-01-15_014.jpg', NULL, NULL, NULL, NULL, NULL, '', 0),
	(8, 'Oiltanking Açu Serviços Ltda.', 5, 'Industrial Complex of Açu Port, Fazenda Saco Dantas, s/n\r\n', 'Predio toil Parte', 'São João da Barra, Rio de Janeiro', 2, '+55 21 2516-2966', '+55 21 3122-0566', 'brasil@otamerica.com', '-21.835728, -40.994410', '-03:00', NULL, NULL, NULL, NULL, 'Oiltanking_South-America_Port-Acu.jpg', 'Oiltanking_South-America_Port-Acu.jpg', NULL, 0, NULL, NULL, 1, 'https://goo.gl/maps/hp6dkVBuUtrjdTS6A', 1),
	(9, 'Oiltanking Terminais Ltda.', 6, 'Rua Vale do Rio Doce, s/n', NULL, 'Vila Velha, Espirito Santo', 2, '+55 27 32043999', '+55 27 32043987', 'brasil@otamerica.com', '-20.328040, -40.350128', '-03:00', NULL, 'brasil/BR-vitoria-site.png', 'brasil/BR-vitoria-railway.png', NULL, 'Oiltanking_South-America_Brazil_Vitoria_Truckloading_2012-06-29_0942.jpg', 'Oiltanking_South-America_Brazil_Vitoria_Truckloading_2012-06-29_0942.jpg', 70144, 23, 604, 5307, 1, 'https://goo.gl/maps/XMc8pe9w7k1iCeTX8', 1),
	(10, 'Oiltanking Colombia S.A.', 7, 'Km. 12', 'Vía Mamonal', 'Mamonal, Cartagena', 3, '+57 5 6475810', '+57 5 6475819', 'colombia@otamerica.com', '10.297829, -75.506878', '-05:00', 'colombia/CO-cartagena-area.png', 'colombia/CO-cartagena-site.png', NULL, NULL, 'Oiltanking_South-America_Colombia_Cartagena_Terminal-Aerial_2011-06-10.jpg', 'Oiltanking_South-America_Colombia_Cartagena_Terminal-Aerial_2011-06-10.jpg', 36710, 23, 189, 6520, 1, 'https://goo.gl/maps/8iDJVKgNVXmT1ugJ6', 1),
	(11, 'Oiltanking México S. de R.L. de C.V.', 4, 'Mariano Escobedo 476, Office 202', 'Col. Nueva Anzures - CP 11590', 'Miguel Hidalgo - CDMX', 4, '+52 55 4166-7800', NULL, 'mexico@otamerica.com', '19.433055, -99.181313', '-06:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Mexico.jpeg', NULL, NULL, NULL, NULL, NULL, '', 1),
	(12, 'Oiltanking México, S. de R.L. de C.V.', 8, 'Libramiento Portuario Km. 8.8', 'Santiago de la Peña', 'Tuxpan, Veracruz', 4, '+52 783 690 0600', NULL, 'mexico@otamerica.com', '20.954418, -97.338640', '-06:00', 'mexico/MEX_Tuxpan_area-plan.png', 'mexico/MEX_Tuxpan_site-plan.png', NULL, NULL, 'AMERICAS_Mexico_Tuxpan_Aerial_Tanks_2021-06_1920x550.jpg', 'AMERICAS_Mexico_Tuxpan_Aerial_Tanks_2021-06_1920x550.jpg', 220042, 6, 34780, 40461, 1, 'https://goo.gl/maps/PM3SRovPEJu3DfSx7', 1),
	(13, 'Colon Oil and Services S.A.', 9, 'Avenida Randolph', 'Coco Solo Norte', 'Colón', 5, '+507 4307330', '+507 4307335', 'panama@otamerica.com', '9.371183, -79.880472', '-05:00', 'panama/PA-colon-area.png', 'panama/PA-colon-site.png', NULL, NULL, 'image_ot-panama-coassa-colon_tanks1_1920px.jpg', 'image_ot-panama-coassa-colon_tanks1_1920px.jpg', 120409, 8, 8080, 23858, 1, 'https://goo.gl/maps/Gy8vX5XRZStWtaAz9', 1),
	(14, 'Terminales del Perú (O&M)', 10, 'Carretera Néstor Gambetta 1265', NULL, 'Callao', 6, '+51 1 6136200', NULL, 'peru@otamerica.com', '-12.041055, -77.131175', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-callao-site.png', NULL, NULL, 'Oiltanking_South-America_Peru_Callao_Tank_2010-01-26_1120391.jpg', 'Oiltanking_South-America_Peru_Callao_Tank_2010-01-26_1120391.jpg', 267415, 36, 79, 17211, 1, 'https://goo.gl/maps/TATLLn4GG9ErcBFm8', 1),
	(15, 'Terminales del Perú (O&M)', 11, 'Playa de Lobos s/n', NULL, 'Chiclayo', 6, '+51 74 414144', NULL, 'peru@otamerica.com', '-6.955514, -79.850985', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-eten-site.png', NULL, NULL, 'image_ot-peru-eten_tanks_1920px.jpg', 'image_ot-peru-eten_tanks_1920px.jpg', 63396, 13, 752, 10474, 1, 'https://goo.gl/maps/yZsyAh8dGcjGCLK99', 1),
	(16, 'Terminales del Perú (O&M)', 12, 'Avenida Brea y Pariñas s/n', NULL, 'Chimbote', 6, '+51 43 350753', NULL, 'peru@otamerica.com', '-9.105984, -78.564909', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-chimbote-site.png', NULL, NULL, 'Oiltanking_South-America_Peru_Chimbote_Tank_2016-10-13_1.jpg', 'Oiltanking_South-America_Peru_Chimbote_Tank_2016-10-13_1.jpg', 49311, 12, 652, 10435, 1, 'https://goo.gl/maps/kotrXEr2YHB5PJCJA', 1),
	(17, 'Logística de Químicos del Sur S.A.C. - LQS', 13, 'Terminal Portuario de Matarani s/n', 'Islay, Arequipa', 'Matarani', 6, '+51 01-2411933', '+51 01-2411933', 'peru@otamerica.com', '-17.008331, -72.108152', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-matarani-site.png', NULL, NULL, 'image_ot-peru-matarani_tanks1_1920px.jpg', 'image_ot-peru-matarani_tanks1_1920px.jpg', 9204, 6, 1534, NULL, 1, 'https://goo.gl/maps/vmTQKi2BCfnzHMks7', 1),
	(18, 'Oiltanking Peru S.A.C.', 4, 'Avenida Alfredo Benavides 768', 'Oficina 1105', 'Miraflores, Lima', 6, '+51 1 2415919', '+51 1 2411933', 'peru@otamerica.com', '-12.125338, -77.025222', '-05:00', NULL, NULL, NULL, NULL, NULL, 'Oficina Peru.jpeg', NULL, NULL, NULL, NULL, NULL, '', 1),
	(19, 'OTAS (O&M for the off-shore platform )', 14, 'Manzana H N° 2 Avenida José de San Martín', NULL, 'Paracas, Pisco', 6, '+51 56 581600', '+51 1 2411933', 'peru@otamerica.com', '-13.835696, -76.247869', '-05:00', NULL, NULL, NULL, NULL, 'image_ot-peru-andina-services_marine-platform1_1920px.jpg', 'image_ot-peru-andina-services_marine-platform1_1920px.jpg', NULL, 0, NULL, NULL, 1, 'https://goo.gl/maps/4LcJVZ9t9SVCu3Uc7', 1),
	(20, 'Terminales del Perú (O&M)', 15, 'Calle Callao 445 - 460', NULL, 'Supe', 6, '+51 1 2364116', NULL, 'peru@otamerica.com', '-10.797373, -77.742684', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-supe-site.png', NULL, NULL, 'image_ot-peru-supe_tanks_1920px.jpg', 'image_ot-peru-supe_tanks_1920px.jpg', 30598, 10, 481, 9209, 1, 'https://goo.gl/maps/Jx6zjSs69quhUy586', 1),
	(21, 'Terminales del Perú (O&M)', 16, 'Calle Felipe Santiago Salaverry 100 y 102', NULL, 'Trujillo', 6, '+51 44 437280', NULL, 'peru@otamerica.com', '-8.215826, -78.976063', '-05:00', 'peru/PE-peru-area.png', 'peru/PE-salaverry-site.png', NULL, NULL, 'image_ot-peru-salaverry_tanks2_1920px.jpg', 'image_ot-peru-salaverry_tanks2_1920px.jpg', 44432, 11, 694, 10447, 1, 'https://goo.gl/maps/433K5inCAsVGbg7AA', 1),
	(22, 'Oiltanking Colombia S.A.', 17, 'Km. 12', 'Vía Mamonal', 'Baru, Cartagena', 3, '+57 5 6475810', '+57 5 6475819', 'colombia@otamerica.com', '10.2824885, -75.5258452', '-05:00', NULL, NULL, NULL, NULL, 'Terminal Page Puerto Bahia.jpg', 'Terminal Page Puerto Bahia.jpg', 424160, 8, 53020, NULL, 1, 'https://goo.gl/maps/vdZrZTbQ7oHgUG2t5', 1);
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices_access_types
CREATE TABLE IF NOT EXISTS `offices_access_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `access_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_offices_access_types_offices` (`office_id`),
  KEY `FK_ffices_access_types_access_types` (`access_type_id`),
  CONSTRAINT `FK_ffices_access_types_access_types` FOREIGN KEY (`access_type_id`) REFERENCES `access_types` (`id`),
  CONSTRAINT `FK_offices_access_types_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.offices_access_types: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `offices_access_types` DISABLE KEYS */;
INSERT INTO `offices_access_types` (`id`, `office_id`, `access_type_id`) VALUES
	(3, 3, 2),
	(4, 8, 2),
	(5, 9, 2),
	(6, 10, 2),
	(7, 12, 2),
	(8, 13, 2),
	(9, 14, 2),
	(10, 15, 2),
	(11, 16, 2),
	(12, 17, 2),
	(14, 20, 2),
	(15, 21, 2),
	(16, 9, 3),
	(17, 10, 3),
	(18, 13, 3),
	(21, 9, 5),
	(22, 14, 5),
	(23, 3, 6),
	(24, 9, 6),
	(25, 10, 6),
	(26, 12, 6),
	(27, 13, 6),
	(28, 14, 6),
	(29, 15, 6),
	(30, 16, 6),
	(32, 20, 6),
	(33, 21, 6),
	(34, 2, 7),
	(35, 3, 7),
	(36, 10, 7),
	(58, 10, 10),
	(65, 22, 2),
	(66, 22, 3),
	(67, 22, 6);
/*!40000 ALTER TABLE `offices_access_types` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices_business_areas
CREATE TABLE IF NOT EXISTS `offices_business_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL DEFAULT '0',
  `business_area_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_offices_business_areas_offices` (`office_id`),
  KEY `FK_offices_business_areas_business_areas` (`business_area_id`),
  CONSTRAINT `FK_offices_business_areas_business_areas` FOREIGN KEY (`business_area_id`) REFERENCES `business_areas` (`id`),
  CONSTRAINT `FK_offices_business_areas_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.offices_business_areas: ~40 rows (aproximadamente)
/*!40000 ALTER TABLE `offices_business_areas` DISABLE KEYS */;
INSERT INTO `offices_business_areas` (`id`, `office_id`, `business_area_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 1),
	(6, 6, 1),
	(7, 7, 1),
	(8, 8, 1),
	(9, 9, 1),
	(10, 10, 1),
	(11, 11, 1),
	(12, 12, 1),
	(13, 13, 1),
	(14, 14, 1),
	(15, 15, 1),
	(16, 16, 1),
	(17, 17, 1),
	(18, 18, 1),
	(19, 19, 1),
	(20, 20, 1),
	(21, 21, 1),
	(22, 2, 2),
	(23, 3, 2),
	(24, 8, 2),
	(25, 9, 2),
	(26, 10, 2),
	(27, 12, 2),
	(28, 13, 2),
	(29, 14, 2),
	(30, 15, 2),
	(31, 16, 2),
	(32, 19, 2),
	(33, 20, 2),
	(34, 21, 2),
	(35, 9, 3),
	(36, 10, 3),
	(37, 17, 3),
	(38, 19, 4),
	(39, 9, 5),
	(40, 14, 5);
/*!40000 ALTER TABLE `offices_business_areas` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices_services_not_used
CREATE TABLE IF NOT EXISTS `offices_services_not_used` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.offices_services_not_used: ~92 rows (aproximadamente)
/*!40000 ALTER TABLE `offices_services_not_used` DISABLE KEYS */;
INSERT INTO `offices_services_not_used` (`id`, `office_id`, `service_id`) VALUES
	(5, 10, 43),
	(9, 13, 5),
	(12, 13, 7),
	(14, 10, 8),
	(15, 13, 8),
	(18, 10, 9),
	(19, 13, 9),
	(21, 15, 37),
	(22, 16, 37),
	(25, 20, 29),
	(26, 21, 29),
	(27, 12, 10),
	(31, 14, 18),
	(48, 14, 17),
	(53, 10, 19),
	(55, 13, 19),
	(57, 15, 29),
	(58, 16, 29),
	(60, 20, 37),
	(61, 21, 37),
	(64, 10, 20),
	(66, 13, 20),
	(67, 14, 37),
	(68, 15, 40),
	(74, 10, 22),
	(75, 10, 23),
	(76, 10, 24),
	(79, 10, 26),
	(82, 10, 28),
	(86, 10, 29),
	(87, 13, 29),
	(88, 14, 29),
	(99, 22, 12),
	(100, 2, 2),
	(101, 2, 33),
	(102, 3, 2),
	(103, 3, 5),
	(104, 3, 9),
	(106, 3, 19),
	(107, 3, 20),
	(108, 3, 21),
	(109, 3, 25),
	(110, 3, 29),
	(111, 3, 33),
	(112, 8, 6),
	(113, 8, 32),
	(114, 9, 8),
	(115, 9, 9),
	(116, 9, 17),
	(117, 9, 18),
	(118, 9, 19),
	(119, 9, 20),
	(120, 9, 21),
	(121, 9, 25),
	(122, 9, 29),
	(123, 9, 31),
	(126, 17, 19),
	(129, 19, 9),
	(130, 19, 27),
	(131, 14, 11),
	(132, 14, 9),
	(133, 14, 19),
	(134, 14, 20),
	(135, 16, 10),
	(136, 16, 19),
	(137, 16, 20),
	(138, 15, 10),
	(139, 15, 19),
	(140, 15, 20),
	(141, 17, 10),
	(142, 17, 13),
	(143, 21, 10),
	(144, 21, 19),
	(145, 21, 20),
	(146, 20, 12),
	(147, 20, 11),
	(148, 20, 19),
	(149, 20, 20),
	(150, 12, 19),
	(151, 12, 20),
	(152, 12, 28),
	(153, 12, 29),
	(154, 12, 5),
	(155, 22, 10),
	(156, 22, 8),
	(157, 22, 19),
	(158, 22, 20),
	(159, 22, 26),
	(160, 22, 28),
	(161, 22, 29),
	(162, 22, 41),
	(163, 22, 42);
/*!40000 ALTER TABLE `offices_services_not_used` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices_tank_types
CREATE TABLE IF NOT EXISTS `offices_tank_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) DEFAULT NULL,
  `tank_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_offices_tank_types_offices` (`office_id`),
  KEY `FK_offices_tank_types_tank_types` (`tank_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla otamerica.offices_tank_types: 17 rows
/*!40000 ALTER TABLE `offices_tank_types` DISABLE KEYS */;
INSERT INTO `offices_tank_types` (`id`, `office_id`, `tank_type_id`) VALUES
	(1, 2, 1),
	(2, 3, 1),
	(3, 9, 2),
	(4, 9, 3),
	(5, 10, 1),
	(6, 10, 4),
	(7, 12, 1),
	(8, 12, 4),
	(12, 13, 1),
	(10, 22, 1),
	(11, 22, 4),
	(13, 14, 1),
	(14, 16, 1),
	(15, 17, 1),
	(16, 20, 1),
	(17, 15, 1),
	(18, 21, 1);
/*!40000 ALTER TABLE `offices_tank_types` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.offices_terminals
CREATE TABLE IF NOT EXISTS `offices_terminals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `lang_key` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.offices_terminals: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `offices_terminals` DISABLE KEYS */;
INSERT INTO `offices_terminals` (`id`, `name`, `lang_key`) VALUES
	(1, 'Regional Office', 'regionalOffice'),
	(2, 'Terminal Brandsen', 'terminalBrandsen'),
	(3, 'Terminal MarÃ­tima Puerto Rosales', 'terminalMaritimaPuertoRosales'),
	(4, 'Representative Office', 'representativeOffice'),
	(5, 'AÃ§u Petroleo', 'acuPetroleo'),
	(6, 'VitÃ³ria Terminal', 'vitoriaTerminal'),
	(7, 'Terminal Cartagena', 'terminalCartagena'),
	(8, 'Tuxpan', 'tuxpan'),
	(9, 'Terminal & Representative Office', 'terminalAndRepresentativeOffice'),
	(10, 'Terminal Callao', 'terminalCallao'),
	(11, 'Terminal Eten', 'terminalEten'),
	(12, 'Terminal Chimbote', 'terminalChimbote'),
	(13, 'Terminal Matarani', 'terminalMatarani'),
	(14, 'Marine Platform Pisco-Camisea', 'marinePlatformPiscoCamisea'),
	(15, 'Terminal Supe', 'terminalSupe'),
	(16, 'Terminal Salaverry', 'terminalSalaverry'),
	(17, 'Puerto Bahia', 'puertoBahia');
/*!40000 ALTER TABLE `offices_terminals` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.office_services
CREATE TABLE IF NOT EXISTS `office_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `office_id` int(11) NOT NULL DEFAULT '0',
  `services_en` text,
  `services_es` text,
  `services_pt` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.office_services: 15 rows
/*!40000 ALTER TABLE `office_services` DISABLE KEYS */;
INSERT INTO `office_services` (`id`, `office_id`, `services_en`, `services_es`, `services_pt`) VALUES
	(1, 2, 'Pipeline connections to refineries and Fiscal warehouse', 'Conexiones de oleoductos a refinerías y Depósito Fiscal', NULL),
	(2, 3, 'Pipeline connections to refineries, Tank-to-tank transfer, Vessel loading and unloading, Truck loading and unloading, Truck weighing, Make & Break Bulk, Blending services, and Fiscal warehouse', 'Conexiones de oleoductos a refinerías, Transferencia de tanque a tanque, Carga y descarga de buque, Carga de camión, Descarga de camión, Pesaje de camión, Make & Break Bulk, Sistemas de mezcla y Depósito fiscal', NULL),
	(3, 8, 'Ship-to-ship transfer and Bonded warehouse', 'Transferencia barco a barco (STS) y Depósito aduanero', NULL),
	(4, 9, 'Vessel loading and unloading, Barge loading and unloading, Railcar loading and unloading, Truck loading and unloading, Truck weighing, Make & Break Bulk, Blending services, and Independent surveyor\'s lab on site', 'Carga y descarga de embarcaciones, Carga y descarga de barcazas, Carga y descarga de vagones de ferrocarril, Carga y descarga de camiones, Pesaje de camiones, Make & Break Bulk, Servicios de mezcla y Laboratorio de topógrafo independiente en el sitio', NULL),
	(5, 10, 'Pipeline distribution to offsite chemicals plants, vessel and barge loading and unloading, Truck and ISO containers loading and unloading, Drums and IBC filling, Nitrogen blanketing, Additivation services, Blending services.', 'Distribución por tubería a plantas químicas fuera del sitio, Carga y descarga de embarcaciones y barcazas, Carga y descarga de camiones y contenedores ISO, Llenado de tambores e IBC, Inertización de nitrógeno, Servicios de aditivación, Servicios de mezcla.', NULL),
	(6, 22, 'Vessel loading and unloading, Barge loading and unloading, Truck loading and unloading, Nitrogen Blanketing, Additivation Services, Blending Services, Cross Docking Transfers, and Heating.', 'Carga y descarga de embarcaciones, Carga y descarga de barcazas, Carga y descarga de camiones, Inertización de nitrógeno, Servicios de aditivación, Servicios de mezcla, Transferencias de cross-docking y Calefacción.', NULL),
	(7, 12, 'Vessel unloading, Truck loading and unloading, Additivation Services, Blending Services, and Tank to Tank Transfers.', 'Descarga de embarcaciones, Carga y descarga de camiones, Servicios de aditivación, Servicios de mezcla y Transferencias de tanque a tanque.', NULL),
	(8, 13, 'Vessel loading and unloading, Ship to ship transfer via shoreline, Barge loading and unloading, Truck loading and unloading, Blending Services, and Tank to Tank Transfers.', 'Carga y descarga de embarcaciones, Transferencia de barco a barco a través de la costa, Carga y descarga de barcazas, Carga y descarga de camiones, Servicios de mezcla y Transferencias de tanque a tanque.', NULL),
	(9, 14, 'Railcar loading and unloading, Blending services, Additive injection, Commingled and dedicated tanks, Vessel loading and unloading, and Truck loading and unloading', 'Carga y descarga de vagones, Servicios de mezcla, Inyección de aditivos, Tanques combinados y dedicados, Carga y descarga de embarcaciones, y Carga y descarga de camiones', NULL),
	(10, 15, 'Blending services, Additive injection, Filtering, Vessel unloading, and Truck loading and unloading', 'Servicios de mezcla, Inyección de aditivos, Filtrado, Descarga de embarcaciones y Carga y descarga de camiones', NULL),
	(11, 16, 'Blending services, Additive injection, Vessel unloading, and Truck loading and unloading', 'Servicios de mezcla, Inyección de aditivos, Descarga de embarcaciones y Carga y descarga de camiones', NULL),
	(12, 17, 'Vessel unloading, Truck loading, and Vapor recovery', 'Descarga de buques, Carga de camiones y Recuperación de vapor', NULL),
	(13, 19, 'Vessel loading and unloading and Vapor recovery or balancing', 'Carga y descarga de buques y Recuperación o equilibrado de vapores', NULL),
	(14, 20, 'Blending services, Additive injection, Commingled and dedicated tanks, Vessel unloading, and Truck loading and unloading', 'Servicios de mezcla, Inyección de aditivos, Tanques combinados y dedicados, Descarga de embarcaciones y Carga y descarga de camiones', NULL),
	(15, 21, 'Blending services, Additive injection, Vessel unloading, and Truck loading and unloading', 'Servicios de mezcla, Inyección de aditivos, Descarga de embarcaciones y Carga y descarga de camiones', NULL);
/*!40000 ALTER TABLE `office_services` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.personal
CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_personal_positions` (`position_id`),
  CONSTRAINT `FK_personal_positions` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.personal: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` (`id`, `name`, `position_id`) VALUES
	(1, 'Rolando Balsamello', 1),
	(2, 'Dario Di Luca ', 2),
	(3, 'Guillermo Blanco', 3),
	(4, 'Alvin Anaya', 4);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.personal_office
CREATE TABLE IF NOT EXISTS `personal_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) NOT NULL DEFAULT '0',
  `office_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_personal_office_offices` (`office_id`),
  KEY `FK_personal_office_personal` (`personal_id`),
  CONSTRAINT `FK_personal_office_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  CONSTRAINT `FK_personal_office_personal` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.personal_office: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_office` DISABLE KEYS */;
INSERT INTO `personal_office` (`id`, `personal_id`, `office_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 2, 4),
	(5, 2, 5),
	(6, 2, 6),
	(7, 2, 7),
	(8, 2, 8),
	(9, 2, 9),
	(10, 3, 10),
	(11, 3, 11),
	(12, 3, 12),
	(13, 3, 13),
	(14, 3, 22),
	(15, 4, 14),
	(16, 4, 15),
	(17, 4, 16),
	(18, 4, 17),
	(19, 4, 18),
	(20, 4, 19),
	(21, 4, 20),
	(22, 4, 21);
/*!40000 ALTER TABLE `personal_office` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.positions
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lang_key` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.positions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` (`id`, `name`, `lang_key`) VALUES
	(1, 'Vice President Argentina', 'vicePresidentArgentina'),
	(2, 'Vice President Brazil', 'vicePresidentBrazil'),
	(3, 'Vice President Middle America', 'vicePresidentMiddleAmerica'),
	(4, 'Vice President Peru', 'vicePresidentPeru');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lang_key` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.products: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `lang_key`) VALUES
	(0, 'All Products', 'all'),
	(1, 'Petroleum Products', 'petroleumProducts'),
	(2, 'Crude Oil', 'crudeOil'),
	(3, 'Fuel Oil', 'fuelOil'),
	(4, 'Chemicals', 'chemicals'),
	(5, 'Petrochemicals', 'petrochemicals'),
	(6, 'Jet Fuel', 'jetFuel'),
	(7, 'Biofuels', 'biofuels'),
	(8, 'LPG', 'lpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.products_office
CREATE TABLE IF NOT EXISTS `products_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_office_products` (`product_id`),
  KEY `FK_products_office_offices` (`office_id`),
  CONSTRAINT `FK_products_office_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  CONSTRAINT `FK_products_office_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.products_office: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `products_office` DISABLE KEYS */;
INSERT INTO `products_office` (`id`, `product_id`, `office_id`) VALUES
	(1, 2, 2),
	(2, 2, 3),
	(3, 2, 8),
	(6, 1, 9),
	(8, 7, 9),
	(9, 1, 10),
	(10, 5, 10),
	(11, 1, 12),
	(12, 1, 13),
	(13, 3, 13),
	(14, 1, 14),
	(15, 3, 14),
	(16, 7, 14),
	(17, 7, 15),
	(18, 1, 15),
	(19, 1, 16),
	(20, 7, 16),
	(21, 1, 19),
	(22, 8, 19),
	(24, 1, 20),
	(25, 7, 20),
	(26, 1, 21),
	(27, 7, 21),
	(28, 4, 17),
	(29, 4, 10),
	(30, 7, 10),
	(33, 2, 22),
	(34, 3, 22),
	(35, 1, 22),
	(37, 6, 12),
	(38, 6, 14),
	(39, 8, 14),
	(40, 3, 16),
	(41, 7, 19);
/*!40000 ALTER TABLE `products_office` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.public_access
CREATE TABLE IF NOT EXISTS `public_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `url` varchar(500) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `office_id` int(11) NOT NULL DEFAULT '0',
  `inter_page` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_public_access_offices` (`office_id`),
  CONSTRAINT `FK_public_access_offices` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.public_access: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `public_access` DISABLE KEYS */;
INSERT INTO `public_access` (`id`, `name`, `url`, `office_id`, `inter_page`) VALUES
	(1, 'Área de Cliente', 'http://www.unisolution.com.br/portal/emp_item_portal.asp?RazaoSoc=Oiltanking%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&CodEmpresa=4200&versaoportal=1', 9, 0),
	(2, 'Receita Federal', 'http://www.unisolution.com.br/WebSolutionAcesso.asp', 9, 0),
	(3, 'ANP -  Movimentação de Granéis Líquidos', 'bulkLiquidHandling', 9, 1),
	(4, 'Políticas', 'politics', 9, 1);
/*!40000 ALTER TABLE `public_access` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.public_access_documents
CREATE TABLE IF NOT EXISTS `public_access_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pdf` varchar(100) DEFAULT NULL,
  `excel` varchar(100) DEFAULT NULL,
  `public_access_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_public_access_documents_public_access` (`public_access_id`),
  CONSTRAINT `FK_public_access_documents_public_access` FOREIGN KEY (`public_access_id`) REFERENCES `public_access` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.public_access_documents: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `public_access_documents` DISABLE KEYS */;
INSERT INTO `public_access_documents` (`id`, `name`, `url`, `pdf`, `excel`, `public_access_id`) VALUES
	(1, 'A. Disponibilidades', NULL, 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Disponibilidade.pdf', NULL, 3),
	(2, 'B. Tarifas de ReferÃªncia', NULL, 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Tarifa-Referencia.pdf', 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Tarifa-Referencia.xls', 3),
	(3, 'C. CondiÃ§Ãµes Gerais', NULL, 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Condicoes-Gerais.pdf', NULL, 3),
	(4, 'C.1. ServiÃ§os DisponÃ­veis', NULL, 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Servicos-Disponiveis.pdf', NULL, 3),
	(5, 'PolÃ­tica de Qualidade', 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Politica-de-Qualidade.pdf', NULL, NULL, 4),
	(6, 'PolÃ­tica de HSSE', 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Politica-de-HSSE.pdf', NULL, NULL, 4),
	(7, 'Polí­tica de ProibiÃ§Ã£o de Ãlcool e Drogas', 'brasil/public_access/Oiltanking-Terminais_Brazil-Vitoria_Politica-de-Proibicao-e-Alcool-e-Drogas.pdf', NULL, NULL, 4),
	(11, 'D. Capacidade MÃ¡xima de MovimentaÃ§Ã£o', NULL, NULL, 'brasil/public_access/departamentos.xls', 3),
	(12, 'E. Formulário de Pedido de Acesso', NULL, 'brasil/public_access/C_POLORA_4009630_20200311_1506016_08521_470651015848000.pdf', NULL, 3),
	(13, 'pitúnie', NULL, NULL, 'else del extension', 3),
	(14, 'Lista Team', NULL, NULL, 'else del extension', 3),
	(15, 'Lista Team Editado', NULL, NULL, 'brasil/public_access/TeamViewer.xlsx', 3),
	(16, 'popo', NULL, NULL, 'else del extension', 3),
	(17, 'asd', NULL, NULL, 'else del extension', 3),
	(18, 'asd1', NULL, NULL, 'else del extension', 3),
	(19, 'asd', NULL, NULL, 'else del extension', 3),
	(20, 'pitúnie', NULL, NULL, 'else del extension', 3);
/*!40000 ALTER TABLE `public_access_documents` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.regulations
CREATE TABLE IF NOT EXISTS `regulations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.regulations: 5 rows
/*!40000 ALTER TABLE `regulations` DISABLE KEYS */;
INSERT INTO `regulations` (`id`, `name`, `url`) VALUES
	(1, 'Reglamento Interno Puerto Rosales', 'regulations/TÃ­tulo_Victoria_Ganuza.pdf'),
	(2, 'PRO-OPE-DC-001 Manual de Inf Gral y Reglamento Portuario OTE P Rosales', 'regulations/PRO-OPE-DC-001 Manual de Inf Gral y Reglamento Portuario OTE P Rosales.pdf.pdf'),
	(3, 'PRO-OPE-DC-001 M', '.pdf'),
	(4, 'julio', 'regulations/Oiltanking-Terminais_Brazil-Vitoria_Servicos-Disponiveis.pdf'),
	(5, 'otro nombre HabÃ­a', 'regulations/Oiltanking-Terminais_Brazil-Vitoria_Volumes-Movimentados_.pdf');
/*!40000 ALTER TABLE `regulations` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.section_admins
CREATE TABLE IF NOT EXISTS `section_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL DEFAULT '0',
  `section` varchar(50) NOT NULL DEFAULT '0',
  `section_lang_key` varchar(50) NOT NULL DEFAULT '0',
  `access` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_section_admins_locations` (`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla otamerica.section_admins: 10 rows
/*!40000 ALTER TABLE `section_admins` DISABLE KEYS */;
INSERT INTO `section_admins` (`id`, `location_id`, `section`, `section_lang_key`, `access`) VALUES
	(1, 2, 'Historical Movements', 'historicalMovements', '/historicalMovementsAdmin'),
	(2, 1, 'Certifications', 'certifications', '/certificationsAdmin'),
	(3, 3, 'Certifications', 'certifications', '/certificationsAdmin'),
	(4, 5, 'Certifications', 'certifications', '/certificationsAdmin'),
	(5, 6, 'Certifications', 'certifications', '/certificationsAdmin'),
	(6, 1, 'Documentations', 'documentations', '/documentationAdmin'),
	(7, 3, 'Documentations', 'documentations', '/documentationAdmin'),
	(8, 2, 'Public Access', 'publicAccess', '/publicAccessAdmin'),
	(9, 1, 'Current Policies', 'currentPolicies', '/currentPoliciesAdmin'),
	(10, 1, 'Regulations', 'regulations', '/regulationsAdmin');
/*!40000 ALTER TABLE `section_admins` ENABLE KEYS */;

-- Volcando estructura para tabla otamerica.tank_types
CREATE TABLE IF NOT EXISTS `tank_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `lang_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla otamerica.tank_types: 5 rows
/*!40000 ALTER TABLE `tank_types` DISABLE KEYS */;
INSERT INTO `tank_types` (`id`, `name`, `lang_key`) VALUES
	(1, 'Carbon steel', 'carbonSteel'),
	(2, 'Mild steel', 'mildSteel'),
	(3, 'Coated steel', 'coatedSteel'),
	(4, 'Coated carbon steel', 'coatedCarbonSteel'),
	(5, 'Internal floating roof', 'internalFloatingRoof');
/*!40000 ALTER TABLE `tank_types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
