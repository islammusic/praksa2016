-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 14, 2012 at 07:36 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `rentacar`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `avtomobili`
-- 

CREATE TABLE `avtomobili` (
  `id_avtomobili` int(11) NOT NULL auto_increment,
  `znamka` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `letnik` int(11) NOT NULL,
  `barva` varchar(50) NOT NULL,
  `opis` text,
  `ccm` int(11) default NULL,
  `kw` int(11) default NULL,
  `km` int(11) default NULL,
  `sedezi` int(11) NOT NULL,
  `registracija` varchar(20) default NULL,
  `id_uporabniki` int(11) NOT NULL,
  `id_tipi` int(11) NOT NULL,
  `id_goriva` int(11) NOT NULL,
  PRIMARY KEY  (`id_avtomobili`),
  KEY `id_uporabniki` (`id_uporabniki`),
  KEY `id_goriva` (`id_goriva`),
  KEY `id_tipi` (`id_tipi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `avtomobili`
-- 

INSERT INTO `avtomobili` VALUES (2, 'Renault*****', 'Scenic', 2010, 'Črna', 'asdfkl', 1600, 100, 30000, 5, 'CE ZL-294', 6, 3, 1);
INSERT INTO `avtomobili` VALUES (3, 'Renault', 'Scenic', 2010, 'Črna', 'asdfkl', 1600, 100, 30000, 5, 'CE ZL-294', 6, 3, 1);
INSERT INTO `avtomobili` VALUES (4, 'Renault', 'Scenic', 2012, 'Črna', '', 1600, 100, 30000, 5, 'CE ZL-294', 6, 4, 1);
INSERT INTO `avtomobili` VALUES (5, 'Renault', 'Scenic', 2012, 'Črna', 'asfffsd', 1600, 100, 30000, 5, 'CE ZL-294', 4, 1, 3);
INSERT INTO `avtomobili` VALUES (6, 'Renault', 'Scenic', 2012, 'Črna', '', 1600, 100, 30000, 5, 'CE ZL-294', 4, 2, 4);
INSERT INTO `avtomobili` VALUES (7, 'Renault', 'Scenic', 2012, 'Črna', '', 1600, 100, 30000, 5, 'CE ZL-294', 5, 3, 4);
INSERT INTO `avtomobili` VALUES (8, 'Renault', 'Scenic', 2012, 'Črna', '', 1600, 100, 30000, 5, 'CE ZL-294', 5, 4, 1);
INSERT INTO `avtomobili` VALUES (9, 'Renault', 'Scenic', 2012, 'Črna', '', 1600, 100, 30000, 5, 'CE ZL-294', 5, 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `goriva`
-- 

CREATE TABLE `goriva` (
  `id_goriva` int(11) NOT NULL auto_increment,
  `ime` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_goriva`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `goriva`
-- 

INSERT INTO `goriva` VALUES (1, 'Bencin');
INSERT INTO `goriva` VALUES (2, 'Diesel');
INSERT INTO `goriva` VALUES (3, 'Plin');
INSERT INTO `goriva` VALUES (4, 'Elektrika');

-- --------------------------------------------------------

-- 
-- Table structure for table `oglasi`
-- 

CREATE TABLE `oglasi` (
  `id_oglasi` int(11) NOT NULL auto_increment,
  `datum_z` datetime NOT NULL,
  `datum_k` datetime NOT NULL,
  `naslov` varchar(50) NOT NULL,
  `cena` float(7,2) NOT NULL,
  `id_avtomobili` int(11) NOT NULL,
  `id_poste` int(11) NOT NULL,
  `id_uporabniki` int(11) default NULL,
  PRIMARY KEY  (`id_oglasi`),
  KEY `id_uporabniki` (`id_uporabniki`),
  KEY `id_avtomobili` (`id_avtomobili`),
  KEY `id_poste` (`id_poste`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `oglasi`
-- 

INSERT INTO `oglasi` VALUES (2, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 2, 4, 4);
INSERT INTO `oglasi` VALUES (3, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 3, 4, NULL);
INSERT INTO `oglasi` VALUES (4, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 4, 4, NULL);
INSERT INTO `oglasi` VALUES (5, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 5, 4, NULL);
INSERT INTO `oglasi` VALUES (6, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 5, 4, 5);
INSERT INTO `oglasi` VALUES (7, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 6, 4, NULL);
INSERT INTO `oglasi` VALUES (8, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'l', 1000.00, 7, 4, NULL);
INSERT INTO `oglasi` VALUES (9, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'l', 1000.00, 9, 4, NULL);
INSERT INTO `oglasi` VALUES (10, '2012-03-12 00:00:00', '2012-03-15 00:00:00', 'Goriška c. 63', 1000.00, 8, 4, 4);

-- --------------------------------------------------------

-- 
-- Table structure for table `poste`
-- 

CREATE TABLE `poste` (
  `id_poste` int(11) NOT NULL auto_increment,
  `ime` varchar(50) NOT NULL,
  `postna_stevilka` varchar(4) NOT NULL,
  PRIMARY KEY  (`id_poste`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `poste`
-- 

INSERT INTO `poste` VALUES (1, 'Velenje', '3320');
INSERT INTO `poste` VALUES (2, 'Ljubljana', '1000');
INSERT INTO `poste` VALUES (3, 'Maribor', '200');
INSERT INTO `poste` VALUES (4, 'Celje', '3000');
INSERT INTO `poste` VALUES (5, 'Kranj', '4000');

-- --------------------------------------------------------

-- 
-- Table structure for table `slike`
-- 

CREATE TABLE `slike` (
  `id_slike` int(11) NOT NULL auto_increment,
  `url` varchar(255) NOT NULL,
  `id_avtomobili` int(11) NOT NULL,
  PRIMARY KEY  (`id_slike`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `slike`
-- 

INSERT INTO `slike` VALUES (14, 'slike/8-20120314060312-60359480.jpg', 8);
INSERT INTO `slike` VALUES (13, 'slike/7-20120314060346-Sunset.jpg', 7);
INSERT INTO `slike` VALUES (12, 'slike/6-20120314060306-Sunset.jpg', 6);
INSERT INTO `slike` VALUES (11, 'slike/5-20120314060322-Water lilies.jpg', 5);
INSERT INTO `slike` VALUES (10, 'slike/4-20120308070333-Sunset.jpg', 4);
INSERT INTO `slike` VALUES (9, 'slike/3-20120308070326-Winter.jpg', 3);
INSERT INTO `slike` VALUES (8, 'slike/2-20120308070319-Blue hills.jpg', 2);
INSERT INTO `slike` VALUES (15, 'slike/9-20120314060342-60299845.jpg', 9);

-- --------------------------------------------------------

-- 
-- Table structure for table `tipi`
-- 

CREATE TABLE `tipi` (
  `id_tipi` int(11) NOT NULL auto_increment,
  `ime` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_tipi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `tipi`
-- 

INSERT INTO `tipi` VALUES (1, 'Limuzina');
INSERT INTO `tipi` VALUES (2, 'Kombi');
INSERT INTO `tipi` VALUES (3, 'Karavan');
INSERT INTO `tipi` VALUES (4, 'Kabriolet');

-- --------------------------------------------------------

-- 
-- Table structure for table `uporabniki`
-- 

CREATE TABLE `uporabniki` (
  `id_uporabniki` int(11) NOT NULL auto_increment,
  `ime` varchar(50) NOT NULL,
  `priimek` varchar(50) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `geslo` varchar(50) NOT NULL,
  `slika` varchar(200) default NULL,
  `id_poste` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_uporabniki`),
  UNIQUE KEY `email` (`email`),
  KEY `id_poste` (`id_poste`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `uporabniki`
-- 

INSERT INTO `uporabniki` VALUES (1, 'Islam', 'Mušić', 'Goriška c. 63', '230987', 'islammusic', 'pazi', NULL, 1, 'islam.music@gmail.com');
INSERT INTO `uporabniki` VALUES (2, 'Islam', 'Mušić', 'Goriška c. 63', '230987', 'q', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', NULL, 1, 'q');
INSERT INTO `uporabniki` VALUES (3, 'ttt', 'ttt', 'ttt', 'ttt', 'ttt', '99ebdbd711b0e1854a6c2e93f759efc2af291fd0', NULL, 1, 'ttt');
INSERT INTO `uporabniki` VALUES (4, 'Dejan', 'Zavec', 'p', 'p', 'p', '516b9783fca517eecbd1d064da2d165310b19759', NULL, 1, 'p');
INSERT INTO `uporabniki` VALUES (5, 'Mojca', 'Mavec', 'm', 'm', 'm', '6b0d31c0d563223024da45691584643ac78c96e8', NULL, 4, 'm');
INSERT INTO `uporabniki` VALUES (6, 'Tomaž', 'Menciger', 'n', 'n', 'n', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', NULL, 4, 'n');
INSERT INTO `uporabniki` VALUES (7, 'Islam', 'Mušić', 'Goriška c. 63', '0457889', 'islammusic', '0f315d32ad05a7148f0eb1aaf054599c1712198f', NULL, 4, 'islam.music@gmail1.com');
