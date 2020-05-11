-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `SectionHeaders`
--

DROP TABLE IF EXISTS `SectionHeaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SectionHeaders` (
  `ID` tinyint(4) DEFAULT NULL,
  `SUB_TYPE` tinyint(4) DEFAULT NULL,
  `SECTION_HEADER` varchar(26) DEFAULT NULL,
  `SECTION_DESCRIPTION` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SectionHeaders`
--

LOCK TABLES `SectionHeaders` WRITE;
/*!40000 ALTER TABLE `SectionHeaders` DISABLE KEYS */;
INSERT INTO `SectionHeaders` VALUES (1,1,'Раздел 1: Введение','Знакомство с предметом'),(2,1,'Раздел 2: Основные понятия','Правила и грамматика'),(3,1,'Раздел 3: Ну PCDOS','Оно работает');
/*!40000 ALTER TABLE `SectionHeaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TestData`
--

DROP TABLE IF EXISTS `TestData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TestData` (
  `ID` tinyint(4) DEFAULT NULL,
  `PARENT_ID` tinyint(4) DEFAULT NULL,
  `ANSWER_TYPE` varchar(7) DEFAULT NULL,
  `QUEST_STRING` varchar(69) DEFAULT NULL,
  `CORRECT_ANSWER` varchar(3) DEFAULT NULL,
  `ANSWER_COMMENT` varchar(5) DEFAULT NULL,
  `VAR0` varchar(2) DEFAULT NULL,
  `VAR1` varchar(2) DEFAULT NULL,
  `VAR2` varchar(2) DEFAULT NULL,
  `VAR3` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TestData`
--

LOCK TABLES `TestData` WRITE;
/*!40000 ALTER TABLE `TestData` DISABLE KEYS */;
INSERT INTO `TestData` VALUES (1,1,'LESSON','Добро пожаловать!\nЭто первый созданный урок в сиситеме тестирования!','','','','','',''),(2,2,'VARIANT','Беды с башкой?','0','Да :)','Да','Да','Да','Да'),(3,2,'TEXT','Пропушенное слово: \" Привет, _________ !\" ?','мир','','','','','');
/*!40000 ALTER TABLE `TestData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TestHeaders`
--

DROP TABLE IF EXISTS `TestHeaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TestHeaders` (
  `ID` tinyint(4) DEFAULT NULL,
  `SECTION_ID` tinyint(4) DEFAULT NULL,
  `TEST_TYPE` varchar(6) DEFAULT NULL,
  `TEST_NAME` varchar(26) DEFAULT NULL,
  `TEST_DESCR` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TestHeaders`
--

LOCK TABLES `TestHeaders` WRITE;
/*!40000 ALTER TABLE `TestHeaders` DISABLE KEYS */;
INSERT INTO `TestHeaders` VALUES (1,1,'LESSON','Приветствие','Первый созданный урок!'),(2,1,'TEST','Доброе утро!','Проснись, всё плохо!'),(3,1,'TEST\r\n','Добрый вечер!','Это конец....'),(4,2,'LESSON','Второооой мать его раздел!','Здесь пусто'),(5,2,'TEST','Здесь тоже пусто!','И здесь пусто...'),(6,2,'TEST','Да, да и здесь тоже','А чего ты ожидал?'),(7,2,'TEST','Здесь что-то есть','(нет)'),(8,3,'LESSON','ААААААА!','Не завидую тому кто это будет наполнять'),(9,3,'TEST','(^_^)','The end.');
/*!40000 ALTER TABLE `TestHeaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(14) DEFAULT NULL,
  `seq` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('SectionHeaders',3),('TestHeaders',9),('TestData',3);
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 15:20:26
