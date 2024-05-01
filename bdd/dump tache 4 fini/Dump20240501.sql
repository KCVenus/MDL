-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: mdl
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atelier`
--

DROP TABLE IF EXISTS `atelier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atelier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_places_maxi` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atelier`
--

LOCK TABLES `atelier` WRITE;
/*!40000 ALTER TABLE `atelier` DISABLE KEYS */;
INSERT INTO `atelier` VALUES (1,'Le club et son projet',0),(2,'Le fonctionnement du club',0),(3,'Les outils à disposition et remis aux clubs',0),(4,'Observatoire des métiers de l’escrime',0),(5,'I.F.F.E',0),(6,'Développement durable',0);
/*!40000 ALTER TABLE `atelier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atelier_inscription`
--

DROP TABLE IF EXISTS `atelier_inscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atelier_inscription` (
  `atelier_id` int NOT NULL,
  `inscription_id` int NOT NULL,
  PRIMARY KEY (`atelier_id`,`inscription_id`),
  KEY `IDX_20EC8DC882E2CF35` (`atelier_id`),
  KEY `IDX_20EC8DC85DAC5993` (`inscription_id`),
  CONSTRAINT `FK_20EC8DC85DAC5993` FOREIGN KEY (`inscription_id`) REFERENCES `inscription` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_20EC8DC882E2CF35` FOREIGN KEY (`atelier_id`) REFERENCES `atelier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atelier_inscription`
--

LOCK TABLES `atelier_inscription` WRITE;
/*!40000 ALTER TABLE `atelier_inscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `atelier_inscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atelier_theme`
--

DROP TABLE IF EXISTS `atelier_theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atelier_theme` (
  `atelier_id` int NOT NULL,
  `theme_id` int NOT NULL,
  PRIMARY KEY (`atelier_id`,`theme_id`),
  KEY `IDX_AEB6D34382E2CF35` (`atelier_id`),
  KEY `IDX_AEB6D34359027487` (`theme_id`),
  CONSTRAINT `FK_AEB6D34359027487` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AEB6D34382E2CF35` FOREIGN KEY (`atelier_id`) REFERENCES `atelier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atelier_theme`
--

LOCK TABLES `atelier_theme` WRITE;
/*!40000 ALTER TABLE `atelier_theme` DISABLE KEYS */;
INSERT INTO `atelier_theme` VALUES (1,1),(1,2),(1,4),(1,5),(1,6),(2,7),(2,8),(2,9),(2,10),(2,11),(3,12),(3,13),(3,14),(3,15),(3,16),(3,17),(4,18),(4,19),(4,20),(4,21),(4,22),(5,4),(5,23),(5,24),(5,25),(5,26),(6,27),(6,28),(6,29),(6,30);
/*!40000 ALTER TABLE `atelier_theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_chambre`
--

DROP TABLE IF EXISTS `categorie_chambre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie_chambre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_chambre`
--

LOCK TABLES `categorie_chambre` WRITE;
/*!40000 ALTER TABLE `categorie_chambre` DISABLE KEYS */;
INSERT INTO `categorie_chambre` VALUES (1,'Single'),(2,'Double');
/*!40000 ALTER TABLE `categorie_chambre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse1` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse2` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20240315130732','2024-04-29 20:54:05',1745),('DoctrineMigrations\\Version20240430144541','2024-04-30 14:46:26',79),('DoctrineMigrations\\Version20240501161721','2024-05-01 16:18:18',149);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pnom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse1` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` VALUES (1,'ibis Styles Lille Centre Gare Beffroi','172 Rue Pierre Mauroy',NULL,'59000','Lille','0320300054','H1384@accor.com'),(2,'Ibis Budget Lille Gares Vieux-Lille','10, Rue De Courtrai',NULL,'59000','Lille','0892683078','H5208@accor.com');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dateinscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscription`
--

LOCK TABLES `inscription` WRITE;
/*!40000 ALTER TABLE `inscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencie`
--

DROP TABLE IF EXISTS `licencie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `licencie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numlicence` bigint NOT NULL,
  `nom` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` char(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateadhesion` date NOT NULL,
  `idclub` double NOT NULL,
  `idqualite` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencie`
--

LOCK TABLES `licencie` WRITE;
/*!40000 ALTER TABLE `licencie` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nuite`
--

DROP TABLE IF EXISTS `nuite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nuite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int DEFAULT NULL,
  `date_nuite` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D4CB7153243BB18` (`hotel_id`),
  CONSTRAINT `FK_8D4CB7153243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nuite`
--

LOCK TABLES `nuite` WRITE;
/*!40000 ALTER TABLE `nuite` DISABLE KEYS */;
/*!40000 ALTER TABLE `nuite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proposer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int DEFAULT NULL,
  `categorie_id` int DEFAULT NULL,
  `tarif_nuite` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_21866C153243BB18` (`hotel_id`),
  KEY `IDX_21866C15BCF5E72D` (`categorie_id`),
  CONSTRAINT `FK_21866C153243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`),
  CONSTRAINT `FK_21866C15BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie_chambre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposer`
--

LOCK TABLES `proposer` WRITE;
/*!40000 ALTER TABLE `proposer` DISABLE KEYS */;
INSERT INTO `proposer` VALUES (1,1,1,95),(2,1,2,105),(3,2,1,70),(4,2,2,80);
/*!40000 ALTER TABLE `proposer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password_request`
--

LOCK TABLES `reset_password_request` WRITE;
/*!40000 ALTER TABLE `reset_password_request` DISABLE KEYS */;
INSERT INTO `reset_password_request` VALUES (3,8,'8xkdaHLiEDSw84XWkAQp','HjwNWXnpSHiyECQ4w8+WBiUCNyxhRNnzQ2pUp/zSWZ8=','2024-05-01 16:50:57','2024-05-01 17:50:57');
/*!40000 ALTER TABLE `reset_password_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restauration`
--

DROP TABLE IF EXISTS `restauration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `restauration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inscription_id` int DEFAULT NULL,
  `date_restauration` date NOT NULL,
  `type_repas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_898B1EF15DAC5993` (`inscription_id`),
  CONSTRAINT `FK_898B1EF15DAC5993` FOREIGN KEY (`inscription_id`) REFERENCES `inscription` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restauration`
--

LOCK TABLES `restauration` WRITE;
/*!40000 ALTER TABLE `restauration` DISABLE KEYS */;
/*!40000 ALTER TABLE `restauration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (1,'Diagnostic et identification des critères du club'),(2,'Analyse systémique de l’environnement et méthodologie de mise en œuvre du projet'),(3,'Actions solidaires et innovantes'),(4,'Financements'),(5,'Outils et documentation'),(6,'Valoriser et communiquer sur le projet'),(7,'Création – Obligations légales'),(8,'Gestion du personnel, de la structure et des conflits'),(9,'Relations internes, externes et avec le Comité départemental, la Ligue et la Fédération'),(10,'Conventions'),(11,'Partenariats'),(12,'Logiciel FFE de gestion des compétitions (présentation et formation)'),(13,'Présentation du document « L’arbitrage en images »'),(14,'Plaquette & guide projet du club'),(15,'Labelisation du club'),(16,'Aménagement des équipements'),(17,'Assurances'),(18,'Observations et analyses sur l’encadrement actuel'),(19,'Propositions de nouveaux schémas d’organisation'),(20,'Profils types et pratiques innovantes'),(21,'Critères et seuils nécessaires à la pérennité de l’emploi'),(22,'Exercice du métier d’enseignant (avantages et inconvénients)'),(23,'Présentation'),(24,'Fonctionnement'),(25,'Objectifs'),(26,'Nouveaux diplômes'),(27,'Les enjeux climatiques, énergétiques et économiques'),(28,'Sport et développement durable'),(29,'Démarche fédérale'),(30,'Échange');
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscription_id` int DEFAULT NULL,
  `isverified` tinyint(1) NOT NULL,
  `numlicence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D6495DAC5993` (`inscription_id`),
  CONSTRAINT `FK_8D93D6495DAC5993` FOREIGN KEY (`inscription_id`) REFERENCES `inscription` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (8,'mauris.rhoncus.id@aliquetsem.ca','[]','$2y$13$WpFFupWazN31lkMrEEj.huNOTIXKuAfUfRo2NB7Mclp8EeMhQn8ky',NULL,1,'16011206072'),(9,'Cras@adipiscingelit.net','[]','$2y$13$oEw8.3CEpV4v5F9kkVQhTeyoPk/Xb4EfRXrPlIrL2cl/qERtLWB4u',NULL,1,'16000529542');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vacation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `atelier_id` int NOT NULL,
  `dateheure_debut` datetime NOT NULL,
  `dateheure_fin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E3DADF7582E2CF35` (`atelier_id`),
  CONSTRAINT `FK_E3DADF7582E2CF35` FOREIGN KEY (`atelier_id`) REFERENCES `atelier` (`id`),
  CONSTRAINT `check_dates` CHECK ((`dateheure_fin` > `dateheure_debut`))
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacation`
--

LOCK TABLES `vacation` WRITE;
/*!40000 ALTER TABLE `vacation` DISABLE KEYS */;
INSERT INTO `vacation` VALUES (1,1,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(2,1,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(3,1,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(4,1,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(5,1,'2024-09-09 11:00:00','2024-09-09 12:30:00'),(6,2,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(7,2,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(8,2,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(9,2,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(10,2,'2024-09-09 11:00:00','2024-09-09 12:30:00'),(11,3,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(12,3,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(13,3,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(14,3,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(15,3,'2024-09-09 11:00:00','2024-09-09 12:30:00'),(16,4,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(17,4,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(18,4,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(19,4,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(20,4,'2024-09-09 11:00:00','2024-09-09 12:30:00'),(21,5,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(22,5,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(23,5,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(24,5,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(25,5,'2024-09-09 11:00:00','2024-09-09 12:30:00'),(26,6,'2024-09-08 11:00:00','2024-09-08 12:30:00'),(27,6,'2024-09-08 14:00:00','2024-09-08 15:30:00'),(28,6,'2024-09-08 16:00:00','2024-09-08 17:30:00'),(29,6,'2024-09-09 09:00:00','2024-09-09 10:30:00'),(30,6,'2024-09-09 11:00:00','2024-09-09 12:30:00');
/*!40000 ALTER TABLE `vacation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-01 20:17:48
