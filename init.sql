-- データベースの初期化

DROP DATABASE `database`;

CREATE DATABASE `database`;

CREATE TABLE `database`.`user`(
  `id` int AUTO_INCREMENT,
  `name` varchar(100),
  PRIMARY KEY (`id`)
);

CREATE TABLE `database`.`toot`(
  `id` int AUTO_INCREMENT,
  `user_id` int,
  `text` varchar(500),
  `image_file_name` varchar(100),
  `created_at` datetime,
  PRIMARY KEY (`id`)
);

INSERT INTO `database`.`user` (`name`) VALUES
  ('sossii'),
  ('そしお');

INSERT INTO `database`.`toot` (`user_id`, `text`,`image_file_name`, `created_at`) VALUES
  (1, 'わっしょい', '00000000000000000000000000000000.png', '2017-04-13 00:00:00'),
  (2, '最高', '', '2017-04-13 01:00:00'),
  (2, 'みそしる', '', '2017-04-13 01:00:00');

