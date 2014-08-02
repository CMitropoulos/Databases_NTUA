-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 09:29 PM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Changes_log`
--

CREATE TABLE IF NOT EXISTS `Changes_log` (
  `Change_code` int(11) NOT NULL AUTO_INCREMENT,
  `Action` varchar(10) NOT NULL,
  `Table_name` varchar(20) NOT NULL,
  `Date_of_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Change_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Changes_log`
--

INSERT INTO `Changes_log` (`Change_code`, `Action`, `Table_name`, `Date_of_change`) VALUES
(8, 'Insert', 'Pelatis', '2014-05-06 15:14:44'),
(9, 'Insert', 'Pelatis', '2014-05-06 20:40:41'),
(10, 'Insert', 'Pelatis', '2014-05-07 00:33:45'),
(11, 'Delete', 'Pelatis', '2014-05-07 10:06:25'),
(12, 'Delete', 'Pelatis', '2014-05-07 10:06:33'),
(13, 'Delete', 'Pelatis', '2014-05-07 10:06:43'),
(14, 'Update', 'Pelatis', '2014-05-07 10:07:07'),
(15, 'Update', 'Pelatis', '2014-05-07 10:07:48'),
(16, 'Update', 'Pelatis', '2014-05-07 10:08:14'),
(17, 'Update', 'Pelatis', '2014-05-07 10:08:37'),
(18, 'Update', 'Pelatis', '2014-05-07 10:08:55'),
(19, 'Update', 'Pelatis', '2014-05-07 10:09:09'),
(20, 'Update', 'Pelatis', '2014-05-07 10:09:24'),
(21, 'Insert', 'Pelatis', '2014-05-07 12:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `Domatio`
--

CREATE TABLE IF NOT EXISTS `Domatio` (
  `kwdikos_dwmatiou` int(11) NOT NULL AUTO_INCREMENT,
  `Arithmos` int(100) NOT NULL,
  `Kwdikos_Ksenodoxeiou` int(11) NOT NULL,
  `Tupos` text NOT NULL,
  `Timi` int(10) NOT NULL,
  PRIMARY KEY (`kwdikos_dwmatiou`),
  KEY `Kwdikos_Ksenodoxeiou` (`Kwdikos_Ksenodoxeiou`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=616 ;

--
-- Dumping data for table `Domatio`
--

INSERT INTO `Domatio` (`kwdikos_dwmatiou`, `Arithmos`, `Kwdikos_Ksenodoxeiou`, `Tupos`, `Timi`) VALUES
(1, 101, 1, '2bed', 60),
(2, 210, 1, '3bed', 80),
(3, 206, 2, '4bed', 100),
(4, 104, 3, '2bed', 70),
(5, 401, 3, 'Suite', 160),
(6, 101, 5, '2bed', 55),
(7, 102, 6, '3bed', 90),
(8, 203, 6, '1bed', 40),
(9, 205, 2, '3bed', 85),
(10, 100, 2, '1bed', 40),
(11, 103, 3, '2bed', 70),
(12, 102, 3, '1bed', 55),
(13, 102, 5, '3bed', 75),
(14, 201, 5, '4bed', 95),
(15, 301, 3, '2bed', 70),
(16, 302, 3, '3bed', 100),
(17, 101, 4, '2bed', 60),
(18, 201, 4, '2bed', 60),
(615, 500, 1, '6bed', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `Kratisi`
--

CREATE TABLE IF NOT EXISTS `Kratisi` (
  `Kwdikos` int(11) NOT NULL AUTO_INCREMENT,
  `Hm.Kratisis` date NOT NULL,
  `Hm.Enarksis` date NOT NULL,
  `Hm.Liksis` date NOT NULL,
  `Tropos plirwmis` text NOT NULL,
  `Kwdikos_Pelati` int(11) NOT NULL,
  `Kwdikos_Ksenodoxeiou` int(11) NOT NULL,
  `kwdikos_dwmatiou` int(11) NOT NULL,
  PRIMARY KEY (`Kwdikos`),
  KEY `Kwdikos_Pelati` (`Kwdikos_Pelati`),
  KEY `Kwdikos_Ksenodoxeiou` (`Kwdikos_Ksenodoxeiou`),
  KEY `Arithmos_Dwmatiou` (`kwdikos_dwmatiou`),
  KEY `Arithmos_Dwmatiou_2` (`kwdikos_dwmatiou`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Kratisi`
--

INSERT INTO `Kratisi` (`Kwdikos`, `Hm.Kratisis`, `Hm.Enarksis`, `Hm.Liksis`, `Tropos plirwmis`, `Kwdikos_Pelati`, `Kwdikos_Ksenodoxeiou`, `kwdikos_dwmatiou`) VALUES
(20, '2014-05-04', '2014-10-16', '2014-10-18', 'credit card', 3, 5, 6),
(21, '2014-04-09', '2014-08-15', '2014-08-22', 'Karta', 1, 1, 1),
(23, '2014-04-26', '2014-05-20', '2014-06-30', 'Metrita', 2, 2, 3),
(24, '2014-04-30', '2014-07-24', '2014-07-29', 'Karta', 10, 1, 1),
(25, '2014-04-28', '2014-12-25', '2015-01-02', 'Metrita', 9, 6, 8),
(26, '2014-05-02', '2014-05-22', '2014-05-25', 'Credit_Card', 3, 3, 5),
(28, '2014-05-01', '2014-05-10', '2014-05-17', 'Credit Card', 2, 2, 2),
(30, '2014-05-07', '2014-05-08', '2014-05-11', 'Credit Card', 25, 3, 2),
(31, '2014-05-07', '2014-05-07', '2014-05-09', 'Cash', 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Ksenodoxeio`
--

CREATE TABLE IF NOT EXISTS `Ksenodoxeio` (
  `kodikos` int(11) NOT NULL AUTO_INCREMENT,
  `Onoma` text NOT NULL,
  `Odos` text NOT NULL,
  `Arithmos` int(11) NOT NULL,
  `TK` bigint(20) NOT NULL,
  `Poli` text NOT NULL,
  `Tilefwno` text NOT NULL,
  `Ipiresia` text NOT NULL,
  `Vathmologia` int(11) NOT NULL,
  `Etos_kataskevis` int(11) NOT NULL,
  `Etos_Anakataskevis` int(11) NOT NULL,
  PRIMARY KEY (`kodikos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Ksenodoxeio`
--

INSERT INTO `Ksenodoxeio` (`kodikos`, `Onoma`, `Odos`, `Arithmos`, `TK`, `Poli`, `Tilefwno`, `Ipiresia`, `Vathmologia`, `Etos_kataskevis`, `Etos_Anakataskevis`) VALUES
(1, 'Grand Resort Lagonisi', 'Lagonisiou', 91, 19563, 'Athina', '2109201002', 'Pisina,Tennis', 5, 1965, 2010),
(2, 'Afrodit', 'Olubias', 30, 17404, 'Peiraias', '2109087087', 'Air Condition,Wifi', 4, 1996, 2001),
(3, 'Lux Deluxe', 'Atlantos', 19, 17563, 'Athina', '2109876555', 'Pisina,Wifi,Tennis,Hamam,Tzakouzi,Sauna,Gym,BBQ,Live Nights', 5, 2014, 2014),
(4, 'Dionysus', 'Poseidonos', 110, 17560, 'Athina', '2109845940', 'Air Condition,Wifi,Sauna', 4, 2010, 0),
(5, 'Filip', 'Alexandrou', 11, 18092, 'Kavala', '2109530412', 'Wifi,Air Condition,TV', 3, 1999, 1999),
(6, 'Arabica', 'Ignatias', 15, 11053, 'Thessaloniki', '2108923400', 'Wifi,Pisina', 4, 1993, 1993),
(10, 'mmmMMM', 'MMMM', 3, 3333, 'FAFA', '333', 'KHKH', 3, 311, 33);

-- --------------------------------------------------------

--
-- Stand-in structure for view `non_updatable_view_for_total_charge`
--
CREATE TABLE IF NOT EXISTS `non_updatable_view_for_total_charge` (
`Onoma` text
,`Epwnumo` text
,`Kwdikos` int(11)
,`d.Timi * ABS( DATEDIFF( ``k``.``Hm.Enarksis`` , ``k``.``Hm.Liksis`` ) )` bigint(17)
);
-- --------------------------------------------------------

--
-- Table structure for table `Pelatis`
--

CREATE TABLE IF NOT EXISTS `Pelatis` (
  `Kwdikos_Pelati` int(11) NOT NULL AUTO_INCREMENT,
  `AT` text NOT NULL,
  `Onoma` text NOT NULL,
  `Epwnumo` text NOT NULL,
  `Odos` text NOT NULL,
  `Arithmos` int(11) NOT NULL,
  `TK` bigint(20) NOT NULL,
  `Poli` text NOT NULL,
  `Arithmos_Pistwtikis_Kartas` text NOT NULL,
  PRIMARY KEY (`Kwdikos_Pelati`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `Pelatis`
--

INSERT INTO `Pelatis` (`Kwdikos_Pelati`, `AT`, `Onoma`, `Epwnumo`, `Odos`, `Arithmos`, `TK`, `Poli`, `Arithmos_Pistwtikis_Kartas`) VALUES
(1, 'AB0019', 'Christos', 'Mitropoulos', 'Makrigianis', 13, 17561, 'Athina', 'asdf1111'),
(2, 'AB2344', 'Omiros', 'Pantazis', 'Alkionis', 89, 17563, 'Athina', 'asdf1000'),
(3, 'AB7191', 'Giorgos', 'Chantzialexiou', 'Atlantos', 10, 17562, 'Athina', 'asdf1110'),
(9, 'AB7009', 'Thanasis', 'Anastasiou', 'Evagelistrias', 88, 17560, 'Athina', 'asdf1001'),
(10, 'AB7341', 'Dimitris', 'Starovas', 'Aristotelous', 3, 80012, 'Thessaloniki', 'asdf0110'),
(19, 'AB5953', 'Georgios', 'Tzanetos', 'Tzaneriwn', 12, 19012, 'Skiathos', 'asdf0101'),
(25, 'AB3333', 'Elvis', 'Presley', 'Madison', 111, 80002, 'Las Vegas', 'asdf1111'),
(27, '1836', 'Antonis', 'Xenakis', 'Poseidwnos', 54, 17561, 'Athens', 'fdsafds');

--
-- Triggers `Pelatis`
--
DROP TRIGGER IF EXISTS `after_insert_pelatis`;
DELIMITER //
CREATE TRIGGER `after_insert_pelatis` AFTER INSERT ON `Pelatis`
 FOR EACH ROW BEGIN
    INSERT INTO Changes_log SET Action='Insert', Table_name='Pelatis' ;
  
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_pelatis`;
DELIMITER //
CREATE TRIGGER `after_update_pelatis` AFTER UPDATE ON `Pelatis`
 FOR EACH ROW BEGIN
    INSERT INTO Changes_log SET Action='Update', Table_name='Pelatis' ;
  
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_delete_pelatis`;
DELIMITER //
CREATE TRIGGER `after_delete_pelatis` AFTER DELETE ON `Pelatis`
 FOR EACH ROW BEGIN
    INSERT INTO Changes_log SET Action='Delete', Table_name='Pelatis' ;
  
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `updatable_view_for_workers_in_lagonisi`
--
CREATE TABLE IF NOT EXISTS `updatable_view_for_workers_in_lagonisi` (
`Onoma` text
,`Epwnumo` text
);
-- --------------------------------------------------------

--
-- Table structure for table `Ypallilos`
--

CREATE TABLE IF NOT EXISTS `Ypallilos` (
  `Kwdikos_Ypallilou` int(11) NOT NULL AUTO_INCREMENT,
  `AFM` text NOT NULL,
  `Onoma` text NOT NULL,
  `Epwnumo` text NOT NULL,
  `Odos` text NOT NULL,
  `Arithmos` int(11) NOT NULL,
  `TK` bigint(20) NOT NULL,
  `Poli` text NOT NULL,
  `Kwdikos_Ksenodoxeiou` int(11) NOT NULL,
  `Hm_Enarksis` date NOT NULL,
  `Hm_Liksis` date NOT NULL,
  `Misthos` bigint(20) NOT NULL,
  `Armodiotita` varchar(30) NOT NULL,
  PRIMARY KEY (`Kwdikos_Ypallilou`),
  KEY `Kwdikos_Ksenodoxeiou` (`Kwdikos_Ksenodoxeiou`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `Ypallilos`
--

INSERT INTO `Ypallilos` (`Kwdikos_Ypallilou`, `AFM`, `Onoma`, `Epwnumo`, `Odos`, `Arithmos`, `TK`, `Poli`, `Kwdikos_Ksenodoxeiou`, `Hm_Enarksis`, `Hm_Liksis`, `Misthos`, `Armodiotita`) VALUES
(1, 'test', 'Amaryllis', 'Litsiou', 'Megarou', 14, 10041, 'Athina', 1, '2014-05-03', '2014-05-31', 4500, 'Manager'),
(2, 'el1000', 'Marw', 'Kokkinou', 'Konstantinoupoleos', 11, 17001, 'Athina', 3, '2009-01-01', '0000-00-00', 600, 'waiter\n'),
(3, 'el9001', 'Theofilia', 'Belba', 'Agias Varvaras', 10, 1763, 'Athina', 1, '2012-02-29', '0000-00-00', 300, 'waiter\n'),
(6, 'el2000', 'Kostas', 'Boudas', 'Patisiwn', 65, 17002, 'Athina', 4, '2008-04-16', '0000-00-00', 900, 'front desk'),
(11, 'el0002', 'John', 'Kaniouras', 'Kopsaxeilas', 7, 54249, 'Thessaloniki', 6, '2004-12-25', '0000-00-00', 1200, 'pool cleaning');

-- --------------------------------------------------------

--
-- Structure for view `non_updatable_view_for_total_charge`
--
DROP TABLE IF EXISTS `non_updatable_view_for_total_charge`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `non_updatable_view_for_total_charge` AS select distinct `p`.`Onoma` AS `Onoma`,`p`.`Epwnumo` AS `Epwnumo`,`k`.`Kwdikos` AS `Kwdikos`,(`d`.`Timi` * abs((to_days(`k`.`Hm.Enarksis`) - to_days(`k`.`Hm.Liksis`)))) AS `d.Timi * ABS( DATEDIFF( ``k``.``Hm.Enarksis`` , ``k``.``Hm.Liksis`` ) )` from (`Pelatis` join ((`Domatio` `d` join `Kratisi` `k` on((`k`.`kwdikos_dwmatiou` = `d`.`kwdikos_dwmatiou`))) join `Pelatis` `p` on((`p`.`Kwdikos_Pelati` = `k`.`Kwdikos_Pelati`))));

-- --------------------------------------------------------

--
-- Structure for view `updatable_view_for_workers_in_lagonisi`
--
DROP TABLE IF EXISTS `updatable_view_for_workers_in_lagonisi`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `updatable_view_for_workers_in_lagonisi` AS select `Ypallilos`.`Onoma` AS `Onoma`,`Ypallilos`.`Epwnumo` AS `Epwnumo` from (`Ypallilos` join `Ksenodoxeio`) where ((`Ypallilos`.`Kwdikos_Ksenodoxeiou` = `Ksenodoxeio`.`kodikos`) and (`Ksenodoxeio`.`Onoma` = 'Grand Resort Lagonisi')) WITH CASCADED CHECK OPTION;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Domatio`
--
ALTER TABLE `Domatio`
  ADD CONSTRAINT `Domatio_ibfk_1` FOREIGN KEY (`Kwdikos_Ksenodoxeiou`) REFERENCES `Ksenodoxeio` (`kodikos`) ON UPDATE CASCADE;

--
-- Constraints for table `Kratisi`
--
ALTER TABLE `Kratisi`
  ADD CONSTRAINT `Kratisi_ibfk_7` FOREIGN KEY (`Kwdikos_Pelati`) REFERENCES `Pelatis` (`Kwdikos_Pelati`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Kratisi_ibfk_5` FOREIGN KEY (`Kwdikos_Ksenodoxeiou`) REFERENCES `Ksenodoxeio` (`kodikos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Kratisi_ibfk_6` FOREIGN KEY (`kwdikos_dwmatiou`) REFERENCES `Domatio` (`kwdikos_dwmatiou`) ON UPDATE CASCADE;

--
-- Constraints for table `Ypallilos`
--
ALTER TABLE `Ypallilos`
  ADD CONSTRAINT `Ypallilos_ibfk_1` FOREIGN KEY (`Kwdikos_Ksenodoxeiou`) REFERENCES `Ksenodoxeio` (`kodikos`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
