DROP DATABASE IF EXISTS `database`;

CREATE DATABASE IF NOT EXISTS `database` CHARACTER SET `utf8mb4` COLLATE `utf8mb4_unicode_ci`;

USE `database`;

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
	`id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(`id`)
) ENGINE = 'InnoDB'
DEFAULT CHARACTER SET `utf8mb4`
DEFAULT COLLATE `utf8mb4_unicode_ci`;

INSERT INTO `Maritial` (`id`) VALUE (1);
INSERT INTO `Maritial` (`id`) VALUE (2);
INSERT INTO `Maritial` (`id`) VALUE (3);
INSERT INTO `Maritial` (`id`) VALUE (4);
INSERT INTO `Maritial` (`id`) VALUE (5);
