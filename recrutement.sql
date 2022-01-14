-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: recrutement
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

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
-- Current Database: `recrutement`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `recrutement` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `recrutement`;

--
-- Table structure for table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annonces` (
  `poste` varchar(100) DEFAULT NULL,
  `lieuDeTravail` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `approuver` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonces`
--

LOCK TABLES `annonces` WRITE;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` (`poste`, `lieuDeTravail`, `description`, `approuver`) VALUES ('Commis de cuisine - H/F','Paris','    RÃ©alisation des prÃ©parations prÃ©liminaires (Ã©pluchage des lÃ©gumes, fonds, courts bouillonsâ€¦)\r\n    RÃ©alisation de mets simples\r\n    Organisation du poste de travail\r\n    Dressage, distribution\r\n    Entretien de la cuisine et des locaux annexe\r\n    pas d\'exigeance Ã  ce niveau\r\n\r\n    CAP Â« Cuisine Â».\r\n    CQP Â« Cuisine Â».','oui'),('Responsable de Restaurant','montpellier','RHEA, cabinet de recrutement spÃ©cialisÃ© dans les mÃ©tiers de l\'HÃ´tellerie et de la Restauration recrute:    RESPONSABLE DE RESTAURANT (H/F)Ã  montpellier ,Groupe en pleine expansion Brasserie parisienne moderne offre un cadre vÃ©gÃ©tal','oui'),('RÃ©ceptionniste polyvalent(e) de nuit (H/F)','Lyon','    PÃ©riodes de Travail de 10 Heures\r\n    Travail de Nuit\r\nRÃ©munÃ©ration supplÃ©mentaire :\r\n\r\n    Heures supplÃ©mentaires majorÃ©es\r\n\r\nMesures COVID-19:\r\nPort du masque obligatoire pendant la pandemie.\r\n                  ','oui');
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listecandidats`
--

DROP TABLE IF EXISTS `listecandidats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listecandidats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poste` varchar(50) DEFAULT NULL,
  `candidats` varchar(50) DEFAULT NULL,
  `confirmer` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listecandidats`
--

LOCK TABLES `listecandidats` WRITE;
/*!40000 ALTER TABLE `listecandidats` DISABLE KEYS */;
INSERT INTO `listecandidats` (`id`, `poste`, `candidats`, `confirmer`) VALUES (2,'RÃ©ceptionniste polyvalent(e) de nuit (H/F)','manon@test.com','oui'),(3,'Responsable de Restaurant','billechauffeur@test.com','oui'),(4,'RÃ©ceptionniste polyvalent(e) de nuit (H/F)','billechauffeur@test.com','oui'),(5,'Responsable de Restaurant','DuboisDurand@test.com','oui'),(6,'RÃ©ceptionniste polyvalent(e) de nuit (H/F)','DuboisDurand@test.com','oui'),(7,'Responsable de Restaurant','PetitBernard@test.com','oui'),(8,'Commis de cuisine - H/F','billechauffeur@test.com','non'),(9,'Commis de cuisine - H/F','manon@test.com','non'),(10,'Commis de cuisine - H/F','DuboisDurand@test.com','non');
/*!40000 ALTER TABLE `listecandidats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `consultant` varchar(30) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `confirmer` varchar(5) DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `admin`, `email`, `password`, `nom`, `prenom`, `role`, `consultant`, `adresse`, `confirmer`, `cv`) VALUES (4,1,'fran@gmail.com','$2y$10$zBwZg2FTDGl0VMLnG8yKfOUvnKZdNlSDFeDZy.AVzw0JEV1bLlQGe','virginius',NULL,'Admin','non',NULL,'oui',NULL),(5,NULL,'mariacorp@organisation.com','$2y$10$waVbNxJOOd3wcDofh4pvyeDcoyMLDarc7eCLqMBp7lRf7Fd.NMd5W','mariacorp',NULL,'recruteurs','oui','1 Rue de la Colombe','oui',NULL),(6,NULL,'billechauffeur@test.com','$2y$10$ghbhbuCXCzlGU0ytp348tO52ewlf2JvP4VIJP.YdAb8.I4bA22hXy','chauffeur','bille','candidats',NULL,NULL,'oui',NULL),(7,NULL,'manon@test.com','$2y$10$gfqVx0LDD2qukoZRKpbH3OF.bQkMKAn0qAauroDUPtw2VtoiC6wB.','jacob','manon','candidats',NULL,NULL,'oui','CV_2021-12-29_francis_virginius.pdf'),(8,NULL,'ThomasRichard@test.com','$2y$10$vA2ZvlOYMeIRxIrCJ71nheJ.W6HUCaXCxFI/lHnRGE3DAZN7WrMlC','MJ hotel',NULL,'recruteurs',NULL,'22 Rue Gustave Eiffel NÃ®mes','oui',NULL),(9,NULL,'DuboisDurand@test.com','$2y$10$Tb.frwa5CMzlLXpNbE6ER.7NX/pftFYLWh0usBAVadYFmEgJeCPj6','Dubois','Durand','candidats',NULL,NULL,'oui',NULL),(10,NULL,'PetitBernard@test.com','$2y$10$gAVJoJ3MCMGqoQg0oPfEVuKlBN9lwTyWxGffcf8pNRb1uqLk22qay','Petit','Bernard','candidats',NULL,NULL,'oui',NULL),(11,NULL,'SimonleRoux@test.com','$2y$10$gVXstp5IhceO34RUa4wXt.xDHWGG3N8vIRMcY2sVv3kRtv2fTxVli','Restaurant Le Lunel',NULL,'recruteurs',NULL,'20 Quai Lunel,  Marseille','oui',NULL),(12,NULL,'Biarritz@test.com','$2y$10$2kasJrWWHQfcxeMevRijyu4DBYQ9boc1W12u3URFjuvil78f6EMKy','A L\'hotel',NULL,'recruteurs','oui','15 Rue Lamartine, Paris','oui',NULL),(13,NULL,'B&b@test.com','$2y$10$fDgA9bG2IPUcj6HmBH8pwOQC.9RE6WraUM10ZtTC1OXMuwuWUchF.','BPM',NULL,'recruteurs',NULL,'21 Rue Pagezy, 34000 Montpellier','oui',NULL),(14,NULL,'hotel75@test.com','$2y$10$s61GcqwQjgVA9jEg7X7esuKGg4fCQ/7n8UHR1snrpV139b1xxJd4u','O\'Restaurants',NULL,'recruteurs',NULL,'146 All. Hector Pintus, 06610 La Gaude','oui',NULL),(16,NULL,'serveurman@test.com','$2y$10$fbzjW2LWeqVDG.X5B6qu6.d3jYDbzQXUiauDLKfINZ3RYOsJKIEBm','Cabri','fred ','candidats',NULL,NULL,'non',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-14 18:28:12
