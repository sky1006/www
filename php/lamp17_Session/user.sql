CREATE TABLE user (
  id       INT         NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL DEFAULT '',
  password CHAR(32)    NOT NULL DEFAULT '',
  email    VARCHAR(80) NOT NULL DEFAULT '',
  allow_1  SMALLINT    NOT NULL DEFAULT 0,
  allow_2  SMALLINT    NOT NULL DEFAULT 0,
  allow_3  SMALLINT    NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
)
  ENGINE =innodb, CHARSET =utf8;

INSERT INTO user (username, password, email, allow_1, allow_2, allow_3)
VALUES ('yanzi', md5('123'), 'yz@163.com', 0, 1, 1);
INSERT INTO user (username, password, email, allow_1, allow_2, allow_3)
VALUES ('qiangge', md5('123'), 'yz@163.com', 0, 0, 0);
INSERT INTO user (username, password, email, allow_1, allow_2, allow_3)
VALUES ('admin', md5('123'), 'yz@163.com', 1, 1, 1);