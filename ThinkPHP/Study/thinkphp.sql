CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` CHAR(32) NOT NULL,
  `sex` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8  ;

INSERT INTO `tp_user` (`id`, `username`, `password`, `sex`) VALUES
(8, 'gege', '', 1),(7, 'gege', '', 1),(6, 'gege', '', 0),(4, '李四2', '', 1),(5, '王五', '', 1),(10, 'gege', '', 1),(11, 'gege', '', 1),
(12, 'gege', '', 1),(13, 'ztz3', '', 1),(14, 'gege', '', 1),(15, 'gege', '', 1),(16, 'gege', '', 1),(17, 'gege', '', 1),(18, 'gege', '', 1),
(19, 'gege', '', 1),(20, 'gege', '', 1),(21, 'gege', '', 1),(22, 'gege', '', 1),(23, 'gege', '', 1),(24, 'gege', '', 1),(25, 'gege', '', 1),
(26, 'gege', '', 1),(27, 'gege', '', 1),(28, 'gege', '', 1),(29, 'gege', '', 1),(30, 'gege', '', 1),(31, 'gege', '', 1),(32, 'tony', '123', 1);