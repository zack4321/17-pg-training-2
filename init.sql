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

CREATE TABLE `database`.`answer`(
  `id` int AUTO_INCREMENT,
  `user_id` int,
  `question_id` int,
  `text` varchar(500),
  `created_at` datetime,
  PRIMARY KEY (`id`)
);

INSERT INTO `database`.`user` (`name`) VALUES
  ('sossii'),
  ('soshio');

INSERT INTO `database`.`question` (`user_id`, `image_file_name`, `created_at`) VALUES
  (1, '00000000000000000000000000000000.png', '2017-04-13 00:00:00'),
  (2, '00000000000000000000000000000001.png', '2017-04-13 01:00:00');

INSERT INTO `database`.`answer` (`user_id`, `question_id`, `text`, `created_at`) VALUES
  (1, 1,'答えです', '2017-04-14 00:00:00'),
  (2, 1, '答えです2', '2017-04-14 01:00:00'),
  (2, 1, '答えです3', '2017-04-14 02:00:00');
