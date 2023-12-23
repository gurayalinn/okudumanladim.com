SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_RESULTS = utf8;
SET COLLATION_CONNECTION = "utf8_general_ci";
SET NAMES utf8;
SET CHARSET utf8;

START TRANSACTION;
SET time_zone = "+00:00";

/* CREATE DATABASE IF NOT EXISTS oku1f5anladicom_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;*/
USE oku1f5anladicom_db;

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int PRIMARY KEY COMMENT 'ROLE ID',
  `role` VARCHAR(20) NOT NULL COMMENT 'ROLE NAME'
);

INSERT INTO `roles` (`id`, `role`) VALUES
('1', 'admin'),
('2', 'user');

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'User ID',
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL UNIQUE,
  `user_email` varchar(254) NOT NULL UNIQUE,
  `user_password` varchar(255) NOT NULL COMMENT 'User Password Hash',
  `user_role` int NOT NULL DEFAULT '2' COMMENT '1:admin, 2:user',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:active, 0:passive',
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'User Created At',
  `user_updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'User Updated At',
  foreign key (user_role) references roles(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`user_role`,`user_name`, `user_email`, `user_password`, `user_fname`, `user_lname`) VALUES
('1','admin', 'info@okudumanladim.com', '123456', 'Admin', 'Account');

INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_fname`, `user_lname`) VALUES
('user', 'user@okudumanladim.com', '123456', 'User', 'Account');

COMMIT;

/* hash-MD5 : 21232f297a57a5a743894a0e4a801fc3 : admin
hash-MD5 : e10adc3949ba59abbe56e057f20f883e : 123456
 */
