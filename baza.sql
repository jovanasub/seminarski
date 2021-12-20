/*
SQLyog Community
MySQL - 10.4.11-MariaDB : Database - seminarski_iteh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`seminarski_iteh` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `seminarski_iteh`;

/*Table structure for table `ispit` */

DROP TABLE IF EXISTS `ispit`;

CREATE TABLE `ispit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) DEFAULT NULL,
  `skraceno` varchar(5) DEFAULT NULL,
  `espb` int(11) DEFAULT NULL,
  `semestar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ispit` */

insert  into `ispit`(`id`,`naziv`,`skraceno`,`espb`,`semestar`) values 
(1,'matematika 2','mat2',6,2),
(3,'menadzment','men',6,1),
(4,'operaciona 1','oi1',6,5),
(5,'adfs','565',45,3),
(6,'afs','ad',3,3);

/*Table structure for table `seminarski` */

DROP TABLE IF EXISTS `seminarski`;

CREATE TABLE `seminarski` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(40) DEFAULT NULL,
  `broj_poena` int(11) DEFAULT NULL,
  `obavezan` bit(1) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `ispit` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ispit` (`ispit`),
  CONSTRAINT `seminarski_ibfk_1` FOREIGN KEY (`ispit`) REFERENCES `ispit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `seminarski` */

insert  into `seminarski`(`id`,`naziv`,`broj_poena`,`obavezan`,`opis`,`ispit`) values 
(1,'prvi domaci',30,'','fdsafs',1),
(2,'izmena',34,'','afds',3),
(3,'dafsg',23,'','ads',1),
(4,'afds',4,'','afds',3),
(6,'fsgd',34,'','afsg',1),
(7,'fsgd',34,'','afsg',1),
(8,'IPHONE X',345,'','afsd',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
