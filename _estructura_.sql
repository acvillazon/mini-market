-- -------------------------------------------------------------
-- TablePlus 3.6.2(322)
--
-- https://tableplus.com/
--
-- Database: todoapp
-- Generation Time: 2020-07-26 08:26:36.9030
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `state_product` tinyint(4) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `historical` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_product`),
  UNIQUE KEY `id` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(50) NOT NULL,
  `state` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_role`),
  UNIQUE KEY `id` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id_sale` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_sales` int(50) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_sale`),
  UNIQUE KEY `id` (`id_sale`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `type_product`;
CREATE TABLE `type_product` (
  `id_type` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`),
  UNIQUE KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '1',
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT '2',
  `password` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id` (`id_user`),
  UNIQUE KEY `unique_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;