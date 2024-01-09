SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;

START TRANSACTION;
SET time_zone = "+00:00";
USE `oku323anladicom_db`;

-- --------------------------------------------------------

--
-- Database: `oku323anladicom_db`
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
  PRIMARY KEY (`uid`) -- Kullanıcı ID'sinin benzersiz olmasını sağlar
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`admin`,`username`, `password`, `email`, `createdAt`) VALUES
  (1, 'gurayalin', '$2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK', 'info@okudumanladim.com', '2024-01-01 00:00:00');

-- --------------------------------------------------------
-- SURVEY TABLES
-- --------------------------------------------------------

--
-- Table structure for table `guest`
--
DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'guest ID',
  `username` varchar(20) NOT NULL COLLATE  utf8mb4_unicode_ci COMMENT 'User Name',
  `email` varchar(255) DEFAULT NULL COLLATE  utf8mb4_unicode_ci COMMENT 'guest email',
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'At Created',
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'At Updated',
  `session` varchar(255) DEFAULT NULL COMMENT 'guest Session',
  `result` int(11) DEFAULT '0' COMMENT 'guest Result',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'User: 0, Admin: 1',

  PRIMARY KEY (`uid`)
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `guests` (`username`, `email`, `session`, `result`, `createdAt`, `updatedAt`) VALUES
  ('guest', 'info@okudumanladim.com', 'guest-0000-0000-0000', 100, '2024-01-01 00:00:00', '2024-01-01 00:00:00');

--
-- Table structure for table `answer`
--
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Soru ID',
    `question_text` TEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT 'Soru Metni',
    `category` VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci DEFAULT 'Genel' COMMENT 'Kategori',
    `option_a` VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci DEFAULT 'A) Seçenek' COMMENT 'Seçenek A',
    `option_b` VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci DEFAULT 'B) Seçenek' COMMENT 'Seçenek B',
    `option_c` VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci DEFAULT 'C) Seçenek' COMMENT 'Seçenek C',
    `option_d` VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci DEFAULT 'D) Seçenek' COMMENT 'Seçenek D',
    `correct_answer` VARCHAR(1) NOT NULL DEFAULT 'A' COMMENT 'Doğru Cevap'
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;


--
-- Table structure for table `answer`
-- --
-- DROP TABLE IF EXISTS `answers`;
-- CREATE TABLE IF NOT EXISTS `answers` (
--     `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     `uid` INT,
--     `quid` INT,
--     `answer` VARCHAR(1),
--     FOREIGN KEY (`uid`) REFERENCES `guests`(`uid`),
--     FOREIGN KEY (`quid`) REFERENCES `questions`(`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

-- INSERT INTO `answers` (`uid`, `quid`, `answer`) VALUES
--   (1, 1, 'A'),
--   (1, 2, 'B'),
--   (1, 3, 'C'),
--   (1, 4, 'D'),
--   (1, 5, 'A'),
--   (1, 6, 'B'),
--   (1, 7, 'C'),
--   (1, 8, 'D'),
--   (1, 9, 'A'),
--   (1, 10, 'B');

COMMIT;

-- hash: $2y$10$7wOzYc.AXpXc1nE/b0IqLOsP2w1cK9LZXDUi6hoSyuWBDj3DoBjOK : admin

