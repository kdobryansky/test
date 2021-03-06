DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `script_name` VARCHAR(25) NOT NULL DEFAULT '',
  `start_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `sort_index` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `result` VARCHAR(128) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=Myisam DEFAULT CHARSET=utf8;