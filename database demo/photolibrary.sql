-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 17, 2017 lúc 09:30 SA
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `photolibrary`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--
CREATE DATABASE photolibrary;
USE photolibrary;

CREATE TABLE admin(
  aid int(10) not null primary key auto_increment,
  username varchar(10) not null,
  password varchar(10) not null
);

INSERT INTO admin(aid,username,password) VALUES(1,'admin','admin');



CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `photoId` int(5) NOT NULL,
  `userId` int(3) NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photo`
--

CREATE TABLE `photo` (
  `photoId` int(5) NOT NULL,
  `photoName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date NOT NULL,
  `albumID` int(3) NOT NULL,
  `photoDescription` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photo_tag`
--

CREATE TABLE `photo_tag` (
  `Id` int(11) NOT NULL,
  `photoId` int(5) NOT NULL,
  `tagId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `tagId` int(3) NOT NULL,
  `tagName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
CREATE TABLE album (
  albumID int(5) NOT NULL PRIMARY KEY,
  albumName varchar(50) NOT NULL,
  createdDate date NOT NULL,
  image varchar(500),
  userId int(3),
  aid int(10),
  CONSTRAINT fk_fk2 FOREIGN KEY (aid) REFERENCES admin(aid)
);

INSERT INTO album(albumName,createdDate,image,aid) VALUES 
('NATURE',now(),'slide_img1.jpg',1),
('FOOTBALL',now(),'slide_img2.jpg',1),
('COUNTRY',now(),'slide_img3.jpg',1),
('PLANET',now(),'slide_img4.jpg',1);
--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userId` int(3) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fullName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bornedDate` date NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY(userId),
  UNIQUE (username),
  UNIQUE (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `photoId` (`photoId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `albumId` (`albumId`);

--
-- Chỉ mục cho bảng `photo_tag`
--
ALTER TABLE `photo_tag`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tagId` (`tagId`),
  ADD KEY `photoId` (`photoId`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagId`);


--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `photo`
--
ALTER TABLE `photo`
  MODIFY `photoId` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `photo_tag`
--
ALTER TABLE `photo_tag`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `tagId` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

ALTER TABLE album
  MODIFY albumID int(5) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`photoId`) REFERENCES `photo` (`photoId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Các ràng buộc cho bảng `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`albumId`) REFERENCES `album` (`albumId`);

ALTER TABLE album ADD CONSTRAINT album_ibfk_1 FOREIGN KEY(userID) REFERENCES user(userID);
--
-- Các ràng buộc cho bảng `photo_tag`
--
ALTER TABLE `photo_tag`
  ADD CONSTRAINT `photo_tag_ibfk_1` FOREIGN KEY (`tagId`) REFERENCES `tag` (`tagId`),
  ADD CONSTRAINT `photo_tag_ibfk_2` FOREIGN KEY (`photoId`) REFERENCES `photo` (`photoId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;