/*CREATE TABLE email (
  id     INT         NOT NULL AUTO_INCREMENT,
  uid    INT         NOT NULL DEFAULT 0,
  title  VARCHAR(80) NOT NULL DEFAULT '',
  ptime  INT         NOT NULL DEFAULT 0,
  nobody VARCHAR(100)         DEFAULT '',
  PRIMARY KEY (id)
)
  ENGINE =innodb, DEFAULT CHARACTER SET utf8;

INSERT INTO email (uid, title, ptime, nobody) VALUES (1, '11111', 14456998, '1111111');
INSERT INTO email (uid, title, ptime, nobody) VALUES (1, '22222', 14456998, '2222222');
INSERT INTO email (uid, title, ptime, nobody) VALUES (1, '33333', 14456998, '3333333');
INSERT INTO email (uid, title, ptime, nobody) VALUES (1, '44444', 14456998, '4444444');

INSERT INTO email (uid, title, ptime, nobody) VALUES (2, 'aaaaa', 14456998, '1111111');
INSERT INTO email (uid, title, ptime, nobody) VALUES (2, 'bbbbb', 14456998, '2222222');
INSERT INTO email (uid, title, ptime, nobody) VALUES (2, 'ccccc', 14456998, '3333333');

INSERT INTO email (uid, title, ptime, nobody) VALUES (3, 'aaaa44444', 14456998, '4444444');
INSERT INTO email (uid, title, ptime, nobody) VALUES (3, 'bbbbb44444', 14456998, '4444444');
INSERT INTO email (uid, title, ptime, nobody) VALUES (3, 'cccc44444', 14456998, '4444444');
INSERT INTO email (uid, title, ptime, nobody) VALUES (3, 'dddd44444', 14456998, '4444444');
INSERT INTO email (uid, title, ptime, nobody) VALUES (3, 'eeee44444', 14456998, '4444444');*/

/*
session(建议使用内存表)
1、记录session id  sid
2、修改时间         utime
3、session数据     sdate
4、ip              uip
5、user_agent 浏览器  uagent
*/
CREATE TABLE session (
  sid    CHAR(32)     NOT NULL DEFAULT '',
  utime  INT          NOT NULL DEFAULT 0,
  sdata  VARCHAR(200),
  ip     CHAR(15),
  uagent VARCHAR(200) NOT NULL DEFAULT '',
  INDEX session_sid(sid)
);

