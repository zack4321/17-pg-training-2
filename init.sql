-- データベースの初期化

DROP DATABASE `database`;

CREATE DATABASE `database`;

CREATE TABLE `database`.`user`(
  `id` int AUTO_INCREMENT,
  `name` varchar(100),
  PRIMARY KEY (`id`)
);

CREATE TABLE `database`.`question`(
  `id` int AUTO_INCREMENT,
  `user_id` int,
  `image_file_name` varchar(100),
  `created_at` datetime,
  PRIMARY KEY (`id`)
);

INSERT INTO `database`.`user` (`name`) VALUES ('sossii');

INSERT INTO `database`.`question` (`user_id`, `image_file_name`, `created_at`) VALUES
  (0, '3rPeiTKt.png', '2017-04-13 00:00:00'),
  (1, '3rPeiTKt.png', '2017-04-13 01:00:00');
