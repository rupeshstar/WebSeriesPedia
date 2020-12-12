-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: WebSeries
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES ('19mcmc58','','19mcmc58','19mcmc58@gmail.com','user'),('19mcmc59','','19mcmc59','19mcmc59@gmail.com','user'),('19mcmc61','','19mcmc61','19mcmc61@gmail.com','user'),('19mcmc62','','19mcmc62','19mcmc62@gmail.com','user'),('rajaa','rajaa','user123','user@gmail.com','user'),('rupesh','rupesh','rupesh123','rupesh@gmail.com','admin'),('virat k','virat virat','virat1','virataa@gmail.com','admin');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `series` (
  `name` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `path` varchar(50) DEFAULT NULL,
  `intro` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES ('Daredevil','Action fiction','image/daredevil.jpeg','Matt Murdock manages to overcome the challenges that he faces due to him being blind since childhood and fights criminals as a lawyer and Daredevil.'),('demon slayer','anime','image/demons.jpg','A youth begins a quest to fight demons and save his sister after finding his family slaughtered and his sister turned into a demon.'),('Game Of Throns','Action','image/got.jpg','Nine noble families wage war against each other in order to gain control over the mythical land of Westeros. Meanwhile, a force is rising after millenniums and threatens the existence of living men.'),('kota factory','drama','image/kota.jpg','Kota Factory is an 2019 Indian Hindi-language web series directed by Raghav Subbu for The Viral Fever.'),('Narcos','drama','image/narcos.jpg','Netflix chronicles the rise of the cocaine trade in Colombia and the gripping real-life stories of drug kingpins of the late 80s in this raw, gritty original series. '),('Naruto','Anime','image/naruto.jpg','Naruto is a Japanese manga series written and illustrated by Masashi Kishimoto. It tells the story of Naruto Uzumaki, a young ninja who seeks recognition from his peers'),('One Piece','Anime','image/one.jpg','One Piece is a Japanese manga series written and illustrated by Eiichiro Oda. It has been serialized in Shueishas Weekly Shonen Jump magazine since July 1997, with its individual chapters compiled into 97 tankobon volumes as of September 2020.'),('Stranger','Thriller','image/Strangerst.jpg','In 1980s Indiana, a group of young friends witness supernatural forces and secret government exploits. As they search for answers, the children unravel a series of extraordinary mysteries.'),('The defenders','Action','image/defenders.jpg','Four of Marvel biggest heroes are each working individually but have one common goal in mind -- to save New York City.'),('The Witcher','Adventure','image/TheWitcherWitcher.jpg','The witcher Geralt, a mutated monster hunter, struggles to find his place in a world in which people often prove more wicked than beasts.');
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-12 21:19:00
