/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.24 : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `test`;

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `students` */

insert  into `students`(`id`,`name`,`email`,`phone`,`image`) values 
(1,'Student_1','std_1@std.edu',9985551,NULL),
(2,'Student_2','std_2@std.edu',9985552,NULL),
(3,'Student_3','std_3@std.edu',9985553,NULL),
(4,'Student_4','std_4@std.edu',9985554,NULL),
(5,'Student_5','std_5@std.edu',9985555,NULL),
(6,'Student_6','std_6@std.edu',9985556,NULL),
(7,'Student_7','std_7@std.edu',9985557,NULL),
(8,'Student_8','std_8@std.edu',9985558,NULL),
(9,'Student_9','std_9@std.edu',9985559,NULL),
(10,'Student_10','std_10@std.edu',99855510,NULL),
(11,'Student_11','std_11@std.edu',99855511,NULL),
(12,'Student_12','std_12@std.edu',99855512,NULL),
(13,'Student_13','std_13@std.edu',99855513,NULL),
(14,'Student_14','std_14@std.edu',99855514,NULL),
(15,'Student_15','std_15@std.edu',99855515,NULL),
(16,'maxresdefault.jpg','ali_12@hotmail.com',564150132,'564150132.jpg'),
(17,'maxresdefault.jpg','ali_12@hotmail.com',564150132,'564150132.jpg'),
(18,'ahmed','ahm@s.cp',516485,'516485.jpg'),
(19,'test','test2@test.net',913132132,NULL),
(20,'test','test2@test.net',913132132,NULL);

/*Table structure for table `user_tokens` */

DROP TABLE IF EXISTS `user_tokens`;

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `user_tokens` */

insert  into `user_tokens`(`id`,`user_id`,`token`) values 
(1,1,'Tz9X3EaOtKezCZy4qXREpJm9vVNVcDmPrqNbIqiP0cA8KRTVVZWy0HVRXzAb'),
(2,1,'gG9nSEiMgzieo1O4K67aipTQu2mWizgOc7NibgHKF6aZFdVoDJcMxcIvPKGo'),
(3,1,'mXpqcHoA61IJx3DFtmPKn3xPdIuessTO4QsVw0qoMvuzkrSj7qjWDx0jPnHL'),
(4,1,'vXOO1VkBmfX5X0U8ONU5oIaLEnqx3QReAIecI6JhpB6O7hxFQKL91518DUZW');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values 
(1,'magha','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
