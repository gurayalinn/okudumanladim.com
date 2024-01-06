SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
-- SET CHARACTER_SET_CLIENT = utf8mb4;
-- SET CHARACTER_SET_CONNECTION = utf8mb4;
-- SET CHARACTER_SET_DATABASE = utf8mb4;
-- SET CHARACTER_SET_RESULTS = utf8mb4;
-- SET CHARACTER_SET_SERVER = utf8mb4;
-- SET COLLATION_CONNECTION = utf8mb4_unicode_ci;
-- SET COLLATION_DATABASE = utf8mb4_unicode_ci;
-- SET COLLATION_SERVER = utf8mb4_unicode_ci;
-- SET NAMES utf8mb4;
-- SET CHARSET utf8;

START TRANSACTION;
SET time_zone = "+00:00";
USE `db`;

-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------
-- USERS TABLES
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `username` varchar(20)  COLLATE  utf8mb4_unicode_ci NOT NULL COMMENT 'User Name',
  `password` varchar(255) NOT NULL COMMENT 'User Password Hash',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'User Email',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'User at Created',
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'User at Updated',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'User: 0, Admin: 1',
  PRIMARY KEY (`uid`), -- Kullanıcı ID'sinin benzersiz olmasını sağlar
  UNIQUE KEY `username` (`username`), -- Kullanıcı adının benzersiz olmasını sağlar
  UNIQUE KEY `email` (`email`), -- E-posta adresinin benzersiz olmasını sağlar
  KEY `admin` (`admin`) -- User: 0, Admin: 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`admin`,`username`, `password`, `email`, `createdAt`) VALUES
  (1, 'admin', '$2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK', 'info@okudumanladim.com', '2024-01-01 00:00:00');

INSERT INTO `users` (`admin`,`username`, `password`, `email`, `createdAt`) VALUES
  (0, 'user', '$2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK', 'user@okudumanladim.com', '2024-01-01 00:00:00');

--
-- CHECK TABLE `users`
--

-- Harf veya rakam ile başlamalı, sadece harf, rakam, _ ve - içerebilir
ALTER TABLE `users`
ADD CONSTRAINT `check_username`
CHECK (`username` REGEXP '^[a-zA-Z0-9][a-zA-Z0-9_-]*$'
      COLLATE utf8mb4_unicode_ci
      AND LENGTH(`username`) >= 3
      AND LENGTH(`username`) <= 20);

-- E-posta adresinin geçerli olmasını sağlar
ALTER TABLE `users`
ADD CONSTRAINT `check_email`
CHECK (`email` REGEXP '^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'
      COLLATE utf8mb4_unicode_ci
      AND LENGTH(`email`) <= 255);

-- --------------------------------------------------------
-- SURVEY TABLES
-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Question',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:active, 0:passive',
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Updated',
  PRIMARY KEY (`id`),
  UNIQUE KEY `question` (`question`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ALTER TABLE `users_answer`
--  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`question`) VALUES
  ('What is your favorite browser?'),
  ('What is your favorite password manager?'),
  ('What is your favorite programming language?');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- hash-MD5 : $2y$10$e10adc3949ba59abbe56e057f20f883e : 123456
-- hash-bcrypt : $2y$10$J7h8nA2Gvj74x4Ug6Trj9uHXt58KY4o5xFw1nUN9zYtxhRb1fr3tG : 123456
-- hash: $2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK : admin

