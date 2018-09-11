CREATE DATABASE  IF NOT EXISTS `pibic_transporte` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pibic_transporte`;
-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: pibic_transporte
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) DEFAULT NULL,
  `codCurso` int(11) DEFAULT NULL,
  `usaOnibus` char(1) DEFAULT NULL,
  `ip_aluno` varchar(45) DEFAULT NULL,
  `host_aluno` varchar(200) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`codigo`),
  KEY `fk_pesquisa_2_idx` (`codCurso`),
  CONSTRAINT `fk_pesquisa_2` FOREIGN KEY (`codCurso`) REFERENCES `curso` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46885 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (46875,'jusara',1,'S','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 13:59:45'),(46876,'654',8,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 16:45:51'),(46877,'654',10,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 16:47:47'),(46878,'654',10,'S','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 16:47:54'),(46879,'654',17,'S','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 16:50:36'),(46880,'345646',8,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 16:53:59'),(46881,'fgdsf',2,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-15 18:09:38'),(46882,'tretert',10,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-18 17:04:19'),(46883,'tretert',10,'N','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-18 17:26:52'),(46884,'gsdfgdsgd',1,'S','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:59.0) Gecko/20100101 Firefox/59.0','2018-06-25 15:54:19');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bairro`
--

DROP TABLE IF EXISTS `bairro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairro` (
  `bairro` varchar(300) NOT NULL,
  `codigo_cidade` int(11) NOT NULL,
  `codigo_bairro` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo_bairro`),
  KEY `fk_bairro_1_idx` (`codigo_cidade`),
  CONSTRAINT `fk_bairro_1` FOREIGN KEY (`codigo_cidade`) REFERENCES `cidade` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairro`
--

LOCK TABLES `bairro` WRITE;
/*!40000 ALTER TABLE `bairro` DISABLE KEYS */;
INSERT INTO `bairro` VALUES ('Água Verde',2,1),('Águas Negras',1,2),('Alto Baú',3,3),('Alto Braço do Baú',3,4),('Arraial Alto',1,5),('Badenfurt',2,6),('Barra de Luis Alves',3,7),('Barracão',1,8),('Bateias',1,9),('Baú Baixo',3,10),('Baú Central',3,11),('Baú Seco',3,12),('Belchior',1,13),('Boa Vista',2,14),('Boa Vista',3,15),('Bom Retiro',2,16),('Braço do Baú',3,17),('Centro',1,18),('Centro',2,19),('Centro',3,20),('Coloninha',1,21),('Da Glória',2,22),('Do Salto',2,23),('Escola Agrícola',2,24),('Fidélis',2,25),('Figueira',1,26),('Fortaleza',2,27),('Fortaleza Alta',2,28),('Garcia',2,29),('Gaspar Alto',1,30),('Gaspar Grande',1,31),('Gaspar Mirim',1,32),('Gasparinho',1,33),('Itoupava Central',2,34),('Itoupava Norte',2,35),('Itoupava Seca',2,36),('Itoupavazinha',2,37),('Jardim Blumenau',2,38),('Lagoa',1,39),('Macuco',1,40),('Margem Esquerda',1,41),('Morro Grande',1,42),('Nova Esperança',2,43),('Passo Manso',2,44),('Pocinho',1,45),('Poço Grande',1,46),('Ponta Aguda',2,47),('Porto Arraial',1,48),('Progresso',2,49),('Ribeirão Fresco',2,50),('Salto do Norte',2,51),('Salto Weissbach',2,52),('Santa Terezinha',1,53),('São Pedro',1,54),('Sertão Verde',1,55),('Sete de Setembro',1,56),('Tabuleiro',3,57),('Testo Alto',2,58),('Tribess',2,59),('Valparaíso',2,60),('Velha',2,61),('Velha Central',2,62),('Velha Grande',2,63),('Victor Konder',2,64),('Vila Formosa',2,65),('Vila Itoupava',2,66),('Vila Nova',2,67),('Ilhotinha',3,68),('Minas',3,69),('Missões',3,70),('Pedra de Amolar',3,71),('São João',3,72),('Vila Nova',3,73),('Barranco Alto',3,74),('Pocinho',3,75),('Laranjeiras',3,76),('Águas Claras',4,77),('Azambuja',4,78),('Bateas',4,79),('Cedrinho',4,80),('Cedro Alto',4,81),('Centro',4,82),('Dom Joaquim',4,83),('Guarani',4,84),('Limeiras',4,85),('Maluche',4,86),('Nova Brasília',4,87),('Paquetá',4,88),('Perímetro Rural',4,89),('Poço Fundo',4,90),('Ponta Russa',4,91),('Rio Branco',4,92),('Santa Luzia',4,93),('Santa Rita',4,94),('São Leopoldo',4,95),('São Luis',4,96),('São Pedro',4,97),('Souza Cruz',4,98),('Santa Terezinha',4,99),('Steffen',4,100),('Tomaz Coelho',4,101),('Volta Grande',4,102),('Braço Paula Ramos',5,103),('Braço Serafim',5,104),('Alto Serafim',5,105),('Braço Francês',5,106),('Ribeirão do Máximo',5,107),('Braço Joaquim',5,108),('Braço da Costa',5,109),('Ribeirão do Bugre',5,110),('Ribeirão da Onça',5,111),('Baixo Máximo',5,112),('Braço Belga',5,113),('Laranjeiras',5,114),('Boa Vista',5,115),('Garuvinha',5,116),('Garuva',5,117),('Vila do Salto',5,118),('Braço Comprido',5,119),('Ribeirão do Padre',5,120),('Vila Nova',5,121),('Rio do Peixe',5,122),('Rio Novo',5,123),('Baixo Canoas',5,124),('Braço Cunha',5,125),('Centro Ribeirão Miguel',5,126),('Braço Miguel',5,127),('Braço Elza',5,128),('Rio Canoas',5,129),('Serrinha',5,130),('Braço Gavião',5,131),('Braço Arataca',5,132),('Alto Rio Canoas',5,133),('Araponguinhas',6,134),('Fritz Lorenz',6,135),('Vila Germer',6,136),('Quintino',6,137),('Imigrantes',6,138),('Centro',6,139),('Estados',6,140),('Martinho Stein',6,141),('Dona Clara',6,142),('Capitais',6,143),('Nações',6,144),('São Roque',6,145),('Pomeranos',6,146),('Tiroleses',6,147),('Testo Alto',7,148),('Pomerode Fundos',7,149),('Rega',7,150),('Wunderwald',7,151),('Testo Central',7,152),('Vale de Selke Grande',7,153),('Centro',7,154),('Ribeirão Solto',7,155),('Ribeirão Herdt',7,156),('Vale Selke Pequeno',7,157),('Ribeirão Luebke',7,158),('Ribeirão Areia',7,159),('Testo Rega',7,160),('Ribeirão Clara',7,161),('Testo Central Alto',7,162),('Tapajós',8,163),('Rio Morto',8,164),('Carijós',8,165),('Estrada das Areias',8,166),('Encano de Norte',8,167),('Dos Estados',8,168),('Encano Baixo',8,169),('Mulde',8,170),('Das Nações',8,171),('Warnow',8,172),('João Paulo II',8,173),('Indaial',8,174),('Do Sol',8,175),('Ribeirão das Pedras',8,176),('Benedito',8,177),('Centro',8,178),('Estradinha',8,179),('Arapongas',8,180),('Bela Vista',1,181);
/*!40000 ALTER TABLE `bairro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `cidade` varchar(150) NOT NULL,
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `cidade_UNIQUE` (`cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES ('Blumenau',2),('Brusque',4),('Gaspar',1),('Ilhota',3),('Indaial',8),('Luis Alvez',5),('Passo Fundo',9),('Pomerode',7),('Timbó',6);
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Análise e Desenvolvimento de Sistemas'),(2,'Design de Moda'),(3,'Processos Gerenciais'),(4,'Artesão e Bordado a Mão'),(5,'Técnico Integrado em Informática'),(6,'Técnico Integrado em Química'),(7,'Pesquisas e Práticas Pedagógicas'),(8,'Auxiliar de Recursos Humanos'),(9,'Comunicação e Atendimento ao Cliente'),(10,'Confecção de Bolsas e Acessórios em Tecido'),(11,'Estratégias de Marketing e Varejo'),(12,'Informática Básica e Mídias Sociais'),(13,'Introdução à Modelagem Tridimensional'),(14,'Língua Portuguesa e Cultura Brasileira para Estrangeiros - Intermediário'),(15,'Manutenção de Máquinas e Costura Industrial'),(16,'Modelagem do Vestuário'),(17,'Administração');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `empresa` varchar(150) NOT NULL,
  `cod_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_empresa`),
  KEY `fk_empresas_onibus_1_idx` (`cod_cidade`),
  CONSTRAINT `fk_empresas_onibus_1` FOREIGN KEY (`cod_cidade`) REFERENCES `cidade` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES ('Coletivo Caturani',1,1),('Viação Verde Vale ',2,1),('Blumob',3,2),('Coletivo Rodovel',4,2),('Lancatur',5,7),('Santa Terezinha',9,1),('Rainha',10,8),('Veículo particular',11,NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itinerario`
--

DROP TABLE IF EXISTS `itinerario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itinerario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_aluno` int(11) NOT NULL,
  `bairro` int(11) DEFAULT NULL,
  `local` char(1) DEFAULT NULL,
  `linha` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `trajetoria` char(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigo_aluno_idx` (`codigo_aluno`,`linha`),
  KEY `fk_itinerario_1_idx` (`linha`),
  KEY `fk_itinerario_3_idx` (`bairro`),
  CONSTRAINT `fk_itinerario_1` FOREIGN KEY (`linha`) REFERENCES `linhas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itinerario_2` FOREIGN KEY (`codigo_aluno`) REFERENCES `aluno` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itinerario_3` FOREIGN KEY (`bairro`) REFERENCES `bairro` (`codigo_bairro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itinerario`
--

LOCK TABLES `itinerario` WRITE;
/*!40000 ALTER TABLE `itinerario` DISABLE KEYS */;
INSERT INTO `itinerario` VALUES (318,46875,1,'T',1,'13:59:00','C'),(319,46875,1,'C',16,'13:59:00','S'),(320,46884,165,'O',207,'15:54:00','C'),(321,46884,5,'C',128,'15:54:00','S');
/*!40000 ALTER TABLE `itinerario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linhas`
--

DROP TABLE IF EXISTS `linhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linhas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linha` varchar(300) NOT NULL,
  `cod_empresa` int(11) NOT NULL,
  `cod_linha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_linhas_1_idx` (`cod_empresa`),
  CONSTRAINT `fk_linhas_1` FOREIGN KEY (`cod_empresa`) REFERENCES `empresas` (`cod_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linhas`
--

LOCK TABLES `linhas` WRITE;
/*!40000 ALTER TABLE `linhas` DISABLE KEYS */;
INSERT INTO `linhas` VALUES (1,'Bela Vista',1,1),(2,'Figueira',1,2),(3,'Barracão',1,4),(4,'Óleo Grande',1,4),(5,'Lagoa',1,7),(6,'Belchior',1,10),(7,'Gaspar Grande',1,11),(8,'Gasparinho',1,13),(9,'Ervino Venturi',1,14),(10,'Coloninha',1,15),(11,'Poço Grande',1,16),(12,'Pocinho',1,17),(13,'Morro Grande (BR-470)',1,18),(14,'Blumenau/Bela Vista',1,199),(15,'Águas Negras',1,2),(16,'7 de Setembro',1,3),(17,'Santa Terezinha',1,4),(18,'Gaspar Mirim',1,5),(19,'Arraial Alto',1,6),(20,'Macuco',1,8),(21,'Sertão Verde',1,8),(22,'Gaspar - Blumenau',2,1),(23,'Ilhota - Blumenau',2,2),(24,'Blumenau - Gaspar',2,3),(25,'Blumenau - Ilhota',2,4),(26,'Baú - Blumenau',2,5),(27,'Blumenau - Baú',2,6),(28,'Baú - Gaspar',2,7),(29,'Gaspar - Baú',2,8),(30,'Troncal Via Rua São Paulo',3,10),(31,'Troncal Via 2 de Setembro',3,11),(32,'Troncal Via Escola Agrícola',3,12),(33,'Troncal Via Ponte Tamarindo',3,15),(34,'Troncal Via Rua das Missões',3,17),(35,'Troncal Via Gov. Jorge Lacerda',3,30),(36,'Troncal Via Rua dos Caçadores',3,31),(37,'Troncal Via Água Verde',3,32),(38,'Fidélis (Circular)',3,101),(39,'Margem Esquerda (Circular)',3,102),(40,'Vila Itoupava (Circular)',3,104),(41,'Itoupava Central (Circular)',3,106),(42,'Alvorada (Circular)',3,108),(43,'Erich Belz (Circular)',3,109),(44,'Saxônia (Circular)',3,110),(45,'Santa Clara (Circular)',3,111),(46,'Botuverá (Circular)',3,112),(47,'Jardim Germânico (Circular)',3,120),(48,'Distrito Industrial (Circular)',3,121),(49,'Via Moinho (Circular)',3,122),(50,'Itoupavazinha (Circular)',3,123),(51,'Felipe Bauler (Circular)',3,124),(52,'Franz Volles (Circular)',3,125),(53,'Libertadores (Circular)',3,126),(54,'Testo Salto (Circular)',3,151),(55,'Ribeirão Schelter (Circular)',3,152),(56,'Salto do Norte (Circular)',3,153),(57,'Divisa Indaial (Circular)',3,154),(58,'Badenfurt (Circular)',3,155),(59,'Oscar Dickmann (Circular)',3,158),(60,'Madrugueira Via Rua São Paulo',3,210),(61,'Cidadão III (Circular)',3,214),(62,'Madrugueira Via Rua dos Caçadores',3,231),(63,'Interbairros Via Rua Bahia',3,300),(64,'Girassol (Circular)',3,301),(65,'Ristow (Circular)',3,302),(66,'Franz Muller (Circular)',3,303),(67,'Hermann Kratz (Circular)',3,305),(68,'Bruno Ruediger (Circular)',3,306),(69,'Francisco Becker (Circular)',3,307),(70,'Bernardo Reiter (Circular)',3,308),(71,'Interbairros II Via Água Verde',3,310),(72,'Dona Edith (Circular)',3,311),(73,'Hermann Barthel (Circular)',3,312),(74,'Emilio Tallmann',3,401),(75,'Rui Barbosa (Circular)',3,402),(76,'Progresso (Circular)',3,403),(77,'Nova Rússia (Circular)',3,404),(78,'Jordão (Circular)',3,405),(79,'Leopoldo Heringer (Circular)',3,406),(80,'Manoel Salvador (Circular)',3,407),(81,'André Nicoletti (Circular)',3,408),(82,'Santa Maria (Circular)',3,409),(83,'Belo Horizonte (Circular)',3,421),(84,'Rua Brusque (Circular)',3,422),(85,'Grevsmuehl (Circular)',3,423),(86,'Bom Retiro (Circular)',3,501),(87,'Pedro Krauss (Circular)',3,503),(88,'Araranguá (Circular)',3,504),(89,'Itapuí (Circular)',3,505),(90,'Pastor O. Hesse (Circular)',3,506),(91,'Vorstadt (Circular)',3,507),(92,'República Argentina (Circular)',3,508),(93,'Zendron (Circular)',3,509),(94,'Oscar Burger (Circular)',3,510),(95,'Santa Fé (Circular)',3,511),(96,'Fortaleza (Circular)',3,601),(97,'Fritz Koegler (Circular)',3,602),(98,'Tribess (Circular)',3,603),(99,'São João',3,604),(100,'Rodoviária Via Ponte Tamarindo',3,605),(101,'Romário Badia',3,606),(102,'Nova Esperança (Circular)',3,607),(103,'25 de Julho',3,616),(104,'Vila Nova (Circular)',3,702),(105,'Ribeirão Branco (Circular)',3,703),(106,'Passo Manso (Circular)',3,704),(107,'Ponte do Salto (Circular)',3,705),(108,'25 de Agosto (Circular)',3,706),(109,'Corcórdia (Circular)',3,707),(110,'Coripós (Circular)',3,708),(111,'Boa Vista (Circular)',3,709),(112,'Divinópolis (Circular)',3,901),(113,'Loteamento Primavera (Circular)',3,902),(114,'Eça de Queiróz (Circular)',3,903),(115,'Lúcio Esteves (Circular)',3,904),(116,'Troncal Via Rua São Paulo',4,10),(117,'Troncal Via 2 de Setembro',4,11),(118,'Troncal Via Escola Agrícola',4,12),(119,'Troncal Via Ponte Tamarindo',4,15),(120,'Troncal Via Rua das Missões',4,17),(121,'Troncal Via Gov. Jorge Lacerda',4,30),(122,'Troncal Via Rua dos Caçadores',4,31),(123,'Troncal Via Água Verde',4,32),(124,'Fidélis (Circular)',4,101),(125,'Margem Esquerda (Circular)',4,102),(126,'Vila Itoupava (Circular)',4,104),(127,'Itoupava Central (Circular)',4,106),(128,'Alvorada (Circular)',4,108),(129,'Erich Belz (Circular)',4,109),(130,'Saxônia (Circular)',4,110),(131,'Santa Clara (Circular)',4,111),(132,'Botuverá (Circular)',4,112),(133,'Jardim Germânico (Circular)',4,120),(134,'Distrito Industrial (Circular)',4,121),(135,'Via Moinho (Circular)',4,122),(136,'Itoupavazinha (Circular)',4,123),(137,'Felipe Bauler (Circular)',4,124),(138,'Franz Volles (Circular)',4,125),(139,'Libertadores (Circular)',4,126),(140,'Testo Salto (Circular)',4,151),(141,'Ribeirão Schelter (Circular)',4,152),(142,'Salto do Norte (Circular)',4,153),(143,'Divisa Indaial (Circular)',4,154),(144,'Badenfurt (Circular)',4,155),(145,'Oscar Dickmann (Circular)',4,158),(146,'Madrugueira Via Rua São Paulo',4,210),(147,'Cidadão III',4,214),(148,'Madrugueira Via Rua dos Caçadores',4,231),(149,'Interbairros Via Rua Bahia',4,300),(150,'Girassol (Circular)',4,301),(151,'Ristow (Circular)',4,302),(152,'Franz Muller (Circular)',4,303),(153,'Hermann Kratz (Circular)',4,305),(154,'Bruno Ruediger (Circular)',4,306),(155,'Francisco Becker (Circular)',4,307),(156,'Bernardo Reiter (Circular)',4,308),(157,'Interbairros II Via Água Verde',4,310),(158,'Dona Edith (Circular)',4,311),(159,'Hermann Barthel (Circular)',4,312),(160,'Emilio Tallmann (Circular)',4,401),(161,'Rui Barbosa (Circular)',4,402),(162,'Progresso (Circular)',4,403),(163,'Nova Rússia (Circular)',4,404),(164,'Jordão (Circular)',4,405),(165,'Leopoldo Heringer (Circular)',4,406),(166,'Manoel Salvador (Circular)',4,407),(167,'André Nicoletti (Circular)',4,408),(168,'Santa Maria (Circular)',4,409),(169,'Belo Horizonte (Circular)',4,421),(170,'Rua Brusque (Circular)',4,422),(171,'Grevsmuehl (Circular)',4,423),(172,'Bom Retiro (Circular)',4,501),(173,'Pedro Krauss (Circular)',4,503),(174,'Ararangué (Circular)',4,504),(175,'Itapuí (Circular)',4,505),(176,'Pastor O. Hesse (Circular)',4,506),(177,'Vorstadt (Circular)',4,507),(178,'República Argentina (Circular)',4,508),(179,'Zendron (Circular)',4,509),(180,'Oscar Burger (Circular)',4,510),(181,'Santa Fé (Circular)',4,511),(182,'Fortaleza (Circular)',4,601),(183,'Fritz Koegler (Circular)',4,602),(184,'Tribess (Circular)',4,603),(185,'São João',4,604),(186,'Rodoviária Via Ponte Tamarindo',4,605),(187,'Romário Badia',4,606),(188,'Nova Esperança (Circular)',4,607),(189,'25 de Julho',4,616),(190,'Vila Nova (Circular)',4,702),(191,'Ribeirão Branco (Circular)',4,703),(192,'Passo Manso (Circular)',4,704),(193,'Ponte do Salto (Circular)',4,705),(194,'25 de Agosto (Circular)',4,706),(195,'Concórdia (Circular)',4,707),(196,'Coripós (Circular)',4,708),(197,'Boa Vista (Circular)',4,709),(198,'Divinópolis (Circular)',4,901),(199,'Loteamento Primavera (Circular)',4,902),(200,'Eça de Queiróz (Circular)',4,903),(201,'Lúcio Esteves (Circular)',4,904),(202,'Terminal para Rodoviária',5,1),(203,'Rodoviária para Terminal',5,2),(204,'Botânico',5,3),(205,'Cedrinho Nações',5,4),(206,'Quintino Vila Germer',5,5),(207,'Dona Clara',5,6),(208,'Mulde',5,7),(209,'São Roque',5,8),(210,'Tiroleses',5,9),(211,'Martinho Stein',5,10),(230,'Jardim Pinheiros (Kobrasol)',9,9000),(231,'Continente Park Europeu',9,NULL),(232,'Coqueiros, Angelina, Betania e Rancho Queimado',9,5530),(233,'Flor de Napólis e Santo André',9,1750),(234,'Santana (Florianópolis)',9,1781),(235,'Santana (Kobrasol)',9,9010),(236,'São Pedro de Alcântara (Florianópolis)',9,177),(237,'Sertão do Maruim (Florianópolis)',9,5540),(238,'Univali',9,5541),(239,'Vila Formosa (Florianópolis)',9,5541),(240,'Encano Central - Terminal (Circular)',10,NULL),(241,'Encano do Norte - Terminal (Circular)',10,NULL),(242,'Estrada de Areias - Terminal (Circular)',10,NULL),(243,'Polaquia - Terminal (Circular)',10,NULL),(244,'Rib. das Pedras - Terminal (Circular)',10,NULL),(245,'Terminal - Carijós - Terminal (Circular)',10,NULL),(246,'Terminal - Encano Central (Circular)',10,NULL),(247,'Terminal - Encano do Norte (Circular)',10,NULL),(248,'Terminal - Estrada das Areias (Circular)',10,NULL),(249,'Terminal - J. Paulo II - R. Morto - Terminal (Circular)',10,NULL),(250,'Terminal - Polaquia (Circular)',10,NULL),(251,'Terminal - Rib. das Pedras (Circular)',10,NULL),(252,'Terminal - Warnow (Circular)',10,NULL),(253,'Warnow - Terminal (Circular)',10,NULL),(254,'Blumenau - Indaial',10,NULL),(255,'Indaial - Blumenau',10,NULL),(256,'Trajetória própria',11,NULL);
/*!40000 ALTER TABLE `linhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pibic_transporte'
--

--
-- Dumping routines for database 'pibic_transporte'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-26 13:25:47
