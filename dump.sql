SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
SET CHARACTER_SET_CLIENT = utf8mb4;
SET CHARACTER_SET_CONNECTION = utf8mb4;
SET CHARACTER_SET_DATABASE = utf8mb4;
SET CHARACTER_SET_RESULTS = utf8mb4;
SET CHARACTER_SET_SERVER = utf8mb4;
SET COLLATION_CONNECTION = utf8mb4_unicode_ci;
SET COLLATION_DATABASE = utf8mb4_unicode_ci;
SET COLLATION_SERVER = utf8mb4_unicode_ci;
SET NAMES utf8mb4;
SET CHARSET utf8;

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
-- Table structure for table `guest`
--
DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'guest ID',
  `username` varchar(20)  COLLATE  utf8mb4_unicode_ci DEFAULT 'guest' COMMENT 'username',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'guest email',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'At Created',
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'At Updated',
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'guest Session',
  `result` int(11) DEFAULT NULL COMMENT 'guest Result',
  PRIMARY KEY (`uid`), -- Kullanıcı ID'sinin benzersiz olmasını sağlar
  UNIQUE KEY `session` (`session`) -- Kullanıcı adının benzersiz olmasını sağlar
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `guest`
--
INSERT INTO `guests` (`username`, `email`, `session`, `result`, `createdAt`, `updatedAt`) VALUES
  ('guest', 'guest@okudumanladim.com', 'd831dc4d4cda6d77fd3ef4f69d985ad2','10', '2024-01-01 00:00:00', '2024-01-01 00:00:00');

--
-- Table structure for table `answer`
--
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `question_text` TEXT,
    `category` VARCHAR(255),
    `option_a` VARCHAR(255),
    `option_b` VARCHAR(255),
    `option_c` VARCHAR(255),
    `option_d` VARCHAR(255),
    `correct_answer` VARCHAR(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `answer`
--
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `uid` INT,
    `quid` INT,
    `answer` VARCHAR(1),
    FOREIGN KEY (`uid`) REFERENCES `guests`(`uid`),
    FOREIGN KEY (`quid`) REFERENCES `questions`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `answers`
 ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `guests` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Dumping data for table `questions`
--
INSERT INTO `questions` ( `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `category`, `correct_answer`)
VALUES
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'A'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'B'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'C'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'D'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'A'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'B'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'C'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'D'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'A'),
('Bu bir örnek sorudur?', 'A) Seçenek', 'B) Seçenek', 'C) Seçenek', 'D) Seçenek', 'Genel Kültür', 'B');


--
-- Dumping data for table `answers`
--
INSERT INTO `answers` (`uid`, `quid`, `answer`)
VALUES
(1, 1, 'A'),
(1, 2, 'B'),
(1, 3, 'C'),
(1, 4, 'D'),
(1, 5, 'A'),
(1, 6, 'B'),
(1, 7, 'C'),
(1, 8, 'D'),
(1, 9, 'A'),
(1, 10, 'B');



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- hash-MD5 : $2y$10$e10adc3949ba59abbe56e057f20f883e : 123456
-- hash-bcrypt : $2y$10$J7h8nA2Gvj74x4Ug6Trj9uHXt58KY4o5xFw1nUN9zYtxhRb1fr3tG : 123456
-- hash: $2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK : admin

