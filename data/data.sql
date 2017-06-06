alter table imooc_user add activeFlag  tinyint(1) default 0;
alter table imooc_user add email varchar(50) not null;


CREATE DATABASE IF NOT EXISTS `shoopImooc`;
USE `shoopImooc`;
--����Ա��
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
	`id` tinyint unsigned auto_increment key,
	`username` varchar(20) not null unique,
	`password` char(32) not null,
	`email`  varchar(50) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

--�����
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
`id` smallint unsigned auto_increment key,
`cName` varchar(50) unique
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


--��Ʒ��
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
`id` int unsigned auto_increment key,
`pName` varchar(50) not null unique,
`pSn` varchar(50) not null,
`pNum` int unsigned default 1,
`mPrice` decimal(10,2) not null,
`iPrice` decimal(10,2) not null,
`pDesc` text,
`pImg` varchar(50) not null,
`pubTime` int unsigned not null,
`isShow` tinyint(1) default 1,
`isHot` tinyint(1) default 0,
`cId` smallint  unsigned not null
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
 
 --�û���
 DROP TABLE IF EXISTS `imooc_user`;
 CREATE TABLE `imooc_user`(
 `id` int unsigned auto_increment key,
 `username` varchar(20) not null unique,
 `password` char(32) not null,
 `sex` enum('��','Ů','����') not null default '����',
 `face`varchar(50) not null,
 `regTime` int unsigned not null
 )ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
 
 --����
 DROP TABLE IF EXISTS `imooc_album`;
 CREATE TABLE `imooc_album`(
 `id` int unsigned auto_increment key,
 `pid` int unsigned not null,
 `albumPath` varchar(50) not null
 )ENGINE=InnoDB DEFAULT CHARSET=utf8 ;
 
 
 
 insert imooc_admin(username,password,email) values ('dons','7b25d98323d59dec58d5a61bb8cbda1c','123@qq.com') 