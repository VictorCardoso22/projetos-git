/*
SQLyog Community v12.09 (32 bit)
MySQL - 5.5.49-0ubuntu0.14.04.1 : Database - curso_msqli
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`curso_msqli` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `curso_msqli`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(60) DEFAULT NULL,
  `ativo_categoria` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

insert  into `categoria`(`id_categoria`,`categoria`,`ativo_categoria`) values (4,'Programação','S'),(5,'Banco de dados','N'),(6,'Office','S'),(7,'Margeting','S');

UNLOCK TABLES;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

LOCK TABLES `cliente` WRITE;

insert  into `cliente`(`id_cliente`,`cliente`,`email`,`fone`,`endereco`) values (1,'Victor','victor@gmail.com','999-999','rua santo antonio'),(2,'JoÃ£o','joao@gmail.com','0000-888','rua sÃ£o jose');

UNLOCK TABLES;

/*Table structure for table `produto` */

DROP TABLE IF EXISTS `produto`;

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `produto` varchar(150) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `ativo_produto` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `produto` */

LOCK TABLES `produto` WRITE;

insert  into `produto`(`id_produto`,`id_categoria`,`produto`,`preco`,`descricao`,`ativo_produto`) values (1,4,'Logica de Programação','1000.00',' Test 2 ','S'),(2,5,'Formação MySQLi ','350.00','teste MYSQLI ','S'),(4,4,'PHP','300.00',' akdnfakj','S'),(5,4,'JAVA','500.00','açodfno','S'),(6,5,'PostGree','230.00',' djfnaçe','U'),(7,5,'SQL','200.00',' andfç','N'),(8,6,'Word','234.00',' adf','S'),(9,6,'EXcel','321.00',' afk','N'),(10,6,'PPT','93.00',' asjdfn','a');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
