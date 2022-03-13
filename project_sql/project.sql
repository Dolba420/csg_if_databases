-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Match`
--

DROP TABLE IF EXISTS `Match`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Match` (
  `Ronde` text NOT NULL,
  `Werper 1` text NOT NULL,
  `Werper 2` text NOT NULL,
  `Datum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Match`
--

LOCK TABLES `Match` WRITE;
/*!40000 ALTER TABLE `Match` DISABLE KEYS */;
/*!40000 ALTER TABLE `Match` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `gebruikersnaam` text NOT NULL,
  `wachtwoord` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('Dolf','$2y$10$4xYzLLjLNz7H9NUuCT/RG.Dnx0Dbh9Z5aoHR5gaEyUDlVmC6gN.K2'),('Michel','$2y$10$rGVcXPLv/SFWR3Vcb.JbWuEQayt1NUpmuvgIL8sLqpHE50mjgNprS'),('VNR','$2y$10$L2s63iZTiqwIeIPwXCxYfeqY8dUyXYVWJf3T38dPOOuc3bLaT3Dx6'),('Dirk','$2y$10$IjevZin/cBapvDnP4862rO5HG/A91P/o4YMuZil3OMf4RqzqmFKu.'),('Tim','$2y$10$U8VsE3PTyA7eSsVJWYfsVO.RIq0ji7W1kZI5bFwhXw3b9rEazfqCe'),('Thomas05t','$2y$10$88AXxusu8F8d5QMZ9nlkyeViSBNlaF2Wx.6brfNmvb5XnuOV52AY.');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uitgooi`
--

DROP TABLE IF EXISTS `uitgooi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uitgooi` (
  `waarde` text NOT NULL,
  `uitgooi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uitgooi`
--

LOCK TABLES `uitgooi` WRITE;
/*!40000 ALTER TABLE `uitgooi` DISABLE KEYS */;
INSERT INTO `uitgooi` VALUES ('170','T20 T20 BULL'),('167','T20 T19 BULL'),('164','T20 T18 BULL'),('161','T20 T17 BULL'),('160','T20 T20 D20'),('158','T20 T20 D19'),('157','T20 T19 D20'),('156','T20 T20 D18'),('155','T20 T19 D19'),('154','T20 T18 D20'),('153','T20 T19 D18'),('152','T20 T20 D16'),('151','T20 T17 D20'),('150','T20 T18 D18'),('149','T20 T19 D16'),('148','T20 T20 D14'),('156','T20 T20 D18'),('155','T20 T19 D19'),('154','T20 T18 D20'),('153','T20 T19 D18'),('152','T20 T20 D16'),('151','T20 T17 D20'),('150','T20 T18 D18'),('149','T20 T19 D16'),('148','T20 T20 D14'),('147','T20 T17 D18'),('146','T20 T18 D16'),('145','T20 T19 D14'),('144','T20 T20 D12'),('143','T20 T17 D16'),('142','T20 T14 D20'),('141','T20 T19 D12'),('140','T20 T20 D10'),('139','T20 T13 D20'),('138','T20 T18 D12'),('137','T20 T15 D16'),('136','T20 T20 D8'),('135','25 T20 BULL'),('134','T20 T14 D16'),('133','T20 T19 D8'),('132','25 T19 BULL'),('131','T20 T13 D16'),('130','T20 T20 D5'),('129','T19 T12 D18'),('128','T18 T14 D16'),('127','T20 T17 D8'),('126','T19 T19 D6'),('125','T18 T13 D16'),('124','T20 T16 D8'),('123','T19 T16 D9'),('122','T18 T20 D4'),('121','T20 T11 D14'),('120','T20 20 D20'),('119','T19 T12 D13'),('118','T20 18 D20'),('117','T20 17 D20'),('116','T19 19 D20'),('115','T19 18 D20'),('114','T20 14 D20'),('113','T19 16 D20'),('112','T20 20 D16'),('111','T19 14 D20'),('110','T20 10 D20'),('109','T20 9 D20'),('108','T20 16 D16'),('107','T20 15 D16'),('106','T20 6 D20'),('105','T19 16 D16'),('104','T16 16 D20'),('103','19 6 D20'),('102','T20 10 D16'),('101','T20 9 D16'),('100','T20 D20'),('99','T19 10 D16'),('98','T20 D19'),('97','T19 D20'),('96','T20 D18'),('95','T19 D19'),('94','T18 D20'),('93','T19 D18'),('92','T20 D16'),('91','T17 D20'),('90','T20 D15'),('89','T19 D16'),('88','T20 D14'),('87','T17 D18'),('86','T18 D16'),('85','T15 D20'),('84','T20 D12'),('83','T17 D16'),('82','T14 D20'),('81','T19 D12'),('80','T20 D10'),('79','T19 D11'),('78','T18 D12'),('77','T19 D10'),('76','T16 D14'),('75','T17 D12'),('74','T14 D16'),('73','T19 D8'),('72','T16 D12'),('71','T13 D16'),('70','T18 D8'),('69','T19 D6'),('68','T16 D10'),('67','T9 D20'),('66','T10 D18'),('65','T11 D16'),('64','T16 D8'),('63','T17 D6'),('62','T10 D16'),('61','T15 D8'),('60','20 D20'),('59','19 D20'),('58','18 D20'),('57','17 D20'),('56','16 D20'),('55','15 D20'),('54','14 D20'),('53','13 D20'),('52','12 D20'),('51','11 D20'),('50','10 D20'),('49','9 D20'),('48','8 D20'),('47','15 D16'),('46','6 D20'),('45','13 D16'),('44','12 D16'),('43','11 D16'),('42','10 D16'),('41','9 D16'),('40','D20'),('39','7 D16'),('38','D19'),('37','5 D16'),('36','D18'),('35','3 D16'),('34','D17'),('33','1 D16'),('32','D16'),('31','7 D12'),('30','D15'),('29','5 D12'),('28','D14'),('27','5 D12'),('26','D13'),('25','1 D12'),('24','D12'),('23','7 D8'),('22','D11'),('21','5 D8'),('20','D10'),('19','3 D8'),('18','D9'),('17','9 D4'),('16','D8'),('15','7 D4'),('14','D7'),('13','5 D4'),('12','D6'),('11','3 D4'),('10','D5'),('9','1 D4'),('8','D4'),('7','3 D2'),('6','D3'),('5','1 D2'),('4','D2'),('3','1 D1'),('2','D1');
/*!40000 ALTER TABLE `uitgooi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worp`
--

DROP TABLE IF EXISTS `worp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worp` (
  `game_id` int DEFAULT NULL,
  `worp_id` text NOT NULL,
  `spelsoort` text NOT NULL,
  `speler` text NOT NULL,
  `worp_waarde` int DEFAULT NULL,
  `worpsoort` text NOT NULL,
  `datum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worp`
--

LOCK TABLES `worp` WRITE;
/*!40000 ALTER TABLE `worp` DISABLE KEYS */;
INSERT INTO `worp` VALUES (0,'0','Classic 501','Dolf',180,'eerste9','12/03/2022'),(0,'1','Classic 501','VNR',170,'eerste9','12/03/2022'),(0,'2','Classic 501','Dolf',90,'eerste9','12/03/2022'),(0,'3','Classic 501','VNR',110,'eerste9','12/03/2022'),(0,'4','Classic 501','Dolf',110,'eerste9','12/03/2022'),(0,'5','Classic 501','VNR',70,'eerste9','12/03/2022'),(0,'6','','Dolf',121,'uitgooi','12/03/2022'),(1,'0','Classic 501','Dolf',180,'eerste9','12/03/2022'),(1,'1','Classic 501','VNR',180,'eerste9','12/03/2022'),(1,'2','Classic 501','Dolf',180,'eerste9','12/03/2022'),(1,'3','Classic 501','VNR',180,'eerste9','12/03/2022'),(1,'4','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'5','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'6','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'7','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'8','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'9','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'10','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'11','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'12','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'13','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'14','Classic 501','Dolf',1,'uitgooi','12/03/2022'),(1,'15','Classic 501','VNR',1,'uitgooi','12/03/2022'),(1,'16','','Dolf',135,'uitgooi','12/03/2022'),(2,'0','Classic 501','Dolf',110,'eerste9','12/03/2022'),(2,'1','Classic 501','VNR',11,'eerste9','12/03/2022'),(2,'2','Classic 501','Dolf',12,'eerste9','12/03/2022'),(2,'3','Classic 501','VNR',51,'eerste9','12/03/2022'),(2,'4','Classic 501','Dolf',78,'eerste9','12/03/2022'),(2,'5','Classic 501','VNR',70,'eerste9','12/03/2022'),(2,'6','Classic 501','Dolf',11,'normaal','12/03/2022'),(2,'7','Classic 501','VNR',110,'normaal','12/03/2022'),(2,'8','Classic 501','Dolf',180,'normaal','12/03/2022'),(2,'9','Classic 501','VNR',11,'normaal','12/03/2022'),(2,'10','Classic 501','Dolf',60,'uitgooi','12/03/2022'),(2,'11','Classic 501','VNR',16,'normaal','12/03/2022'),(2,'12','','Dolf',50,'uitgooi','12/03/2022'),(3,'0','','Dolf',1,'eerste9','12/03/2022'),(3,'1','','VNR',1,'eerste9','12/03/2022'),(3,'0','125 uitgooien','Dolf',10,'125 uitgooien','12/03/2022'),(3,'1','125 uitgooien','VNR',50,'125 uitgooien','12/03/2022'),(3,'0','125 uitgooien','Dolf',11,'uitgooieneerste9','12/03/2022'),(3,'1','125 uitgooien','VNR',12,'uitgooieneerste9','12/03/2022'),(3,'2','125 uitgooien','Dolf',15,'uitgooieneerste9','12/03/2022'),(3,'3','125 uitgooien','VNR',99,'uitgooieneerste9','12/03/2022'),(3,'4','125 uitgooien','Dolf',52,'uitgooieneerste9','12/03/2022'),(4,'0','Classic 501','Dolf',180,'eerste9','12/03/2022'),(4,'1','Classic 501','VNR',180,'eerste9','12/03/2022'),(4,'2','Classic 501','Dolf',180,'eerste9','12/03/2022'),(4,'3','Classic 501','VNR',180,'eerste9','12/03/2022'),(4,'4','','Dolf',141,'uitgooi','12/03/2022'),(5,'0','','Dolf',125,'125 uitgooien','12/03/2022'),(6,'0','Classic 501','Dolf',180,'eerste9','12/03/2022'),(6,'1','Classic 501','VNR',180,'eerste9','12/03/2022'),(6,'2','Classic 501','Dolf',180,'eerste9','12/03/2022'),(6,'3','Classic 501','VNR',0,'eerste9','12/03/2022'),(6,'4','','Dolf',141,'uitgooi','12/03/2022'),(6,'6','Classic 501','VNR',180,'normaal','12/03/2022'),(6,'8','Classic 501','VNR',180,'normaal','12/03/2022'),(6,'9','','Dolf',141,'uitgooi','12/03/2022'),(7,'0','125 uitgooien','Dolf',100,'125 uitgooien','12/03/2022'),(8,'0','125 uitgooien','VNR',77,'125 uitgooien','12/03/2022'),(8,'1','125 uitgooien','Dolf',33,'125 uitgooien','12/03/2022'),(8,'2','','Dolf',92,'125 uitgooien','12/03/2022'),(9,'0','125 uitgooien','VNR',10,'125 uitgooien','12/03/2022'),(9,'1','','Dolf',125,'125 uitgooien','12/03/2022'),(9,'2','','Dolf',125,'125 uitgooien','12/03/2022'),(10,'0','125 uitgooien','Dolf',11,'125 uitgooien','12/03/2022'),(10,'1','','VNR',125,'125 uitgooien','12/03/2022'),(10,'0','','Dolf',125,'125 uitgooien','12/03/2022'),(10,'1','','Dolf',125,'125 uitgooien','12/03/2022'),(10,'2','','Dolf',125,'125 uitgooien','12/03/2022'),(10,'0','','Dolf',125,'125 uitgooien','12/03/2022'),(10,'1','125 uitgooien','Dolf',110,'125 uitgooien','12/03/2022'),(10,'2','','VNR',123,'125 uitgooien','12/03/2022'),(10,'3','','VNR',125,'125 uitgooien','12/03/2022'),(10,'4','','VNR',127,'125 uitgooien','12/03/2022'),(10,'0','','Dolf',125,'125 uitgooien','13/03/2022'),(10,'1','125 uitgooien','Dolf',125,'125 uitgooien','13/03/2022'),(10,'2','','VNR',123,'125 uitgooien','13/03/2022'),(10,'3','','VNR',125,'125 uitgooien','13/03/2022'),(10,'4','','VNR',127,'125 uitgooien','13/03/2022'),(10,'5','','VNR',129,'125 uitgooien','13/03/2022'),(10,'0','','Dolf',125,'125 uitgooien','13/03/2022'),(10,'1','','Dolf',127,'125 uitgooien','13/03/2022'),(10,'2','','Dolf',129,'125 uitgooien','13/03/2022'),(10,'0','','VNR',125,'125 uitgooien','13/03/2022'),(10,'1','','VNR',127,'125 uitgooien','13/03/2022'),(10,'2','','VNR',129,'125 uitgooien','13/03/2022'),(10,'0','','VNR',125,'125 uitgooien','13/03/2022'),(10,'1','','Dolf',123,'125 uitgooien','13/03/2022'),(10,'2','','VNR',125,'125 uitgooien','13/03/2022'),(10,'3','125 uitgooien','Dolf',11,'125 uitgooien','13/03/2022'),(10,'4','','VNR',127,'125 uitgooien','13/03/2022'),(10,'5','','Dolf',121,'125 uitgooien','13/03/2022'),(10,'6','','VNR',127,'125 uitgooien','13/03/2022'),(10,'7','','Dolf',121,'125 uitgooien','13/03/2022'),(10,'8','','VNR',127,'125 uitgooien','13/03/2022'),(10,'9','','Dolf',121,'125 uitgooien','13/03/2022'),(10,'10','','VNR',127,'125 uitgooien','13/03/2022'),(10,'11','125 uitgooien','Dolf',88,'125 uitgooien','13/03/2022'),(10,'12','','VNR',129,'125 uitgooien','13/03/2022'),(10,'0','125 uitgooienlegwin','VNR',125,'125 uitgooien','13/03/2022'),(10,'1','125 uitgooienlegwin','Dolf',123,'125 uitgooien','13/03/2022'),(10,'2','125 uitgooienlegwin','VNR',125,'125 uitgooien','13/03/2022'),(10,'0','125 uitgooienlegwin','Dolf',125,'125 uitgooien','13/03/2022'),(10,'1','125 uitgooienlegwin','VNR',123,'125 uitgooien','13/03/2022'),(10,'2','125 uitgooien','Dolf',77,'125 uitgooien','13/03/2022'),(10,'3','125 uitgooien','VNR',100,'125 uitgooien','13/03/2022'),(10,'4','125 uitgooienlegwin','Dolf',48,'125 uitgooien','13/03/2022'),(10,'0','Classic 501','Dolf',180,'eerste9','13/03/2022'),(10,'1','Classic 501','VNR',180,'eerste9','13/03/2022'),(10,'2','Classic 501','Dolf',180,'eerste9','13/03/2022'),(10,'3','Classic 501','VNR',180,'eerste9','13/03/2022'),(10,'4','Classic 501legwin','Dolf',141,'uitgooi','13/03/2022'),(10,'0','Classic 501','Dolf',180,'eerste9','13/03/2022'),(10,'1','Classic 501','VNR',180,'eerste9','13/03/2022'),(10,'2','Classic 501','Dolf',180,'eerste9','13/03/2022'),(10,'3','Classic 501','VNR',180,'eerste9','13/03/2022'),(10,'4','Classic 501legwin','Dolf',141,'uitgooi','13/03/2022'),(10,'0','Classic 501','VNR',180,'eerste9','13/03/2022'),(11,'0','Classic 501','Dolf',180,'eerste9','13/03/2022'),(11,'1','Classic 501','VNR',180,'eerste9','13/03/2022'),(11,'2','Classic 501','Dolf',180,'eerste9','13/03/2022'),(11,'3','Classic 501','VNR',180,'eerste9','13/03/2022'),(11,'4','Classic 501legwin','Dolf',141,'uitgooi','13/03/2022');
/*!40000 ALTER TABLE `worp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-13 10:06:32
