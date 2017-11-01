CREATE DATABASE image_mg;
use image_mg

CREATE TABLE slide_img (
	slideid int(5) not null primary key auto_increment,
	name varchar(10) not null,
	image varchar(500) not null
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

INSERT INTO slide_img (slideid,name,image) VALUES
	(1,'NATURE','slide_img1.jpg'),
	(2,'FOOTBALL','slide_img2.jpg'),
	(3,'COUNTRY','slide_img3.jpg'),
	(4,'PLANET','slide_img4.jpg');

CREATE TABLE background_img (
	bgimgid int(100) not null primary key auto_increment,
	name varchar(50) not null,
	bgimage varchar(500) not null
	) ENGINE = InnoDB DEFAULT CHARSET=latin1;

INSERT INTO background_img (bgimgid,name,bgimage) VALUES
	(1,'background_global','background_global.jpg');

CREATE TABLE users (
	usersid int(100) not null auto_increment,
	username varchar(30) not null,
	password varchar(32) not null,
	primary key(usersid,username)
) ENGINE = InnoDB DEFAULT CHARSET=latin1;