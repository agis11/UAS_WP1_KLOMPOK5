/*
SQLyog Professional v12.4.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - db_futsal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`) values 
(1,'admin','admin');

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `lapangan` int(2) DEFAULT NULL,
  `jam_mulai` varchar(30) DEFAULT NULL,
  `jam_selesai` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`id_booking`,`username`,`lapangan`,`jam_mulai`,`jam_selesai`,`date`) values 
(25,'rani',1,'8','9','2017-12-16'),
(26,'frans',1,'8','8','2018-01-20');

/*Table structure for table `bukti` */

DROP TABLE IF EXISTS `bukti`;

CREATE TABLE `bukti` (
  `id_bukti` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `atasnama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bukti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bukti` */

/*Table structure for table `lapangan` */

DROP TABLE IF EXISTS `lapangan`;

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id_lapangan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `lapangan` */

insert  into `lapangan`(`id_lapangan`,`image`,`detail`) values 
(4,'futsal2.jpg','detail lapangan 211'),
(6,'Capture.PNG','');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`no_hp`,`alamat`) values 
(1,'frans','frans',NULL,NULL),
(2,'ajim','ajim',NULL,NULL),
(3,'edo','edo',NULL,NULL),
(4,'tes','tes',NULL,NULL),
(5,'adi','adi','0819282929','jalan raya no 17 tangerang'),
(6,'rani','rani','08918191','jln raya no 21'),
(7,'andi','andi','0819181918','jln abdffjl');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
