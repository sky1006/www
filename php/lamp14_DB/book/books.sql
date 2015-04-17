<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/16
 * Time: 16:57
 */
 CREATE database if NOT EXISTS boostore;
 DROP TABLE if EXISTS  books;
 CREATE TABLE books(
  id int not null auto_increment,
  bookname VARCHAR (50) NOT NULL DEFAULT '',
  publisher VARCHAR (80)  NOT null DEFAULT '',
  author VARCHAR (30) NOT NULL DEFAULT '',
  price DOUBLE NOT NULL DEFAULT 0.00,
  ptime INT NOT NULL DEFAULT 0,
  pic VARCHAR (40) NOT NULL DEFAULT '',
  detail VARCHAR (200),
  PRIMARY KEY (id)
 );