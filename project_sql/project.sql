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
-- Table structure for table `worp`
--

DROP TABLE IF EXISTS `worp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worp` (
  `game_id` text NOT NULL,
  `worp_id` text NOT NULL,
  `speler` text NOT NULL,
  `worp_waarde` text NOT NULL,
  `worpsoort` text NOT NULL,
  `datum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worp`
--

LOCK TABLES `worp` WRITE;
/*!40000 ALTER TABLE `worp` DISABLE KEYS */;
INSERT INTO `worp` VALUES ('0','0','Dolf','180','','26/02/2022'),('0','1','VNR','180','','26/02/2022'),('1','0','Dolf','180','eerste91','26/02/2022'),('1','1','VNR','180','eerste92','26/02/2022'),('1','2','Dolf','180','eerste91','26/02/2022'),('2','0','Dolf','180','eerste9','26/02/2022'),('2','0','Dolf','180','eerste9','26/02/2022'),('2','1','VNR','180','eerste9','26/02/2022'),('2','2','Dolf','10','eerste9','26/02/2022'),('2','3','VNR','10','eerste9','26/02/2022'),('2','4','Dolf','10','eerste9','26/02/2022'),('2','5','VNR','10','eerste9','26/02/2022'),('2','6','Dolf','10','eerste9','26/02/2022'),('2','7','VNR','100','eerste9','26/02/2022'),('2','8','Dolf','10','eerste9','26/02/2022'),('3','0','Dolf','180','eerste9','26/02/2022'),('3','1','VNR','180','eerste9','26/02/2022'),('3','2','Dolf','10','eerste9','26/02/2022'),('3','3','VNR','10','eerste9','26/02/2022'),('3','4','Dolf','10','eerste9','26/02/2022'),('3','5','VNR','10','eerste9','26/02/2022'),('3','6','Dolf','10','eerste9','26/02/2022'),('3','7','VNR','10','eerste9','26/02/2022'),('3','8','Dolf','10','normaal','26/02/2022'),('3','9','VNR','10','normaal','26/02/2022'),('3','10','Dolf','10','normaal','26/02/2022'),('3','0','Dolf','180','eerste9','26/02/2022'),('3','1','VNR','10','eerste9','26/02/2022'),('3','2','Dolf','10','eerste9','26/02/2022'),('3','3','VNR','10','eerste9','26/02/2022'),('3','4','Dolf','10','eerste9','26/02/2022'),('3','5','VNR','10','eerste9','26/02/2022'),('3','6','Dolf','10','normaal','26/02/2022'),('3','7','VNR','10','normaal','26/02/2022'),('3','8','Dolf','10','normaal','26/02/2022'),('4','0','Dolf','180','eerste9','26/02/2022'),('4','1','VNR','10','eerste9','26/02/2022'),('4','2','Dolf','10','eerste9','26/02/2022'),('4','3','VNR','10','eerste9','26/02/2022'),('4','4','Dolf','10','eerste9','26/02/2022'),('4','5','VNR','10','eerste9','26/02/2022'),('4','6','Dolf','10','normaal','26/02/2022'),('4','7','VNR','10','normaal','26/02/2022'),('4','8','Dolf','10','normaal','26/02/2022'),('4','9','VNR','10','normaal','26/02/2022'),('4','10','Dolf','10','normaal','26/02/2022'),('4','11','VNR','10','normaal','26/02/2022'),('4','12','Dolf','10','normaal','26/02/2022'),('4','13','VNR','1','normaal','26/02/2022'),('4','14','Dolf','1','normaal','26/02/2022'),('4','15','VNR','1','normaal','26/02/2022'),('4','16','Dolf','1','normaal','26/02/2022'),('4','17','VNR','1','normaal','26/02/2022'),('4','18','Dolf','1','normaal','26/02/2022'),('4','19','VNR','1','normaal','26/02/2022'),('4','20','Dolf','1','normaal','26/02/2022'),('4','21','VNR','1','normaal','26/02/2022'),('4','22','Dolf','1','normaal','26/02/2022'),('4','23','VNR','1','normaal','26/02/2022'),('4','24','Dolf','1','normaal','26/02/2022'),('4','25','VNR','1','normaal','26/02/2022');
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

-- Dump completed on 2022-02-26  8:12:31
