/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : quick

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2012-07-16 22:32:43
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_assoc_post_tags`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_assoc_post_tags`;
CREATE TABLE `tbl_assoc_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_post` int(11) DEFAULT NULL,
  `fk_tags` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `_fk_post` (`fk_post`),
  KEY `_fk_tags` (`fk_tags`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_assoc_post_tags
-- ----------------------------
INSERT INTO tbl_assoc_post_tags VALUES ('1', '1', '1');
INSERT INTO tbl_assoc_post_tags VALUES ('2', '1', '2');
INSERT INTO tbl_assoc_post_tags VALUES ('3', '2', '2');

-- ----------------------------
-- Table structure for `tbl_contato`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contato`;
CREATE TABLE `tbl_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `obs` varchar(200) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_contato
-- ----------------------------
INSERT INTO tbl_contato VALUES ('1', '45 33284578', '45 999-9999', 'hjagsdhgs', '3');
INSERT INTO tbl_contato VALUES ('2', '43 3333333', '43 9999999', 'dasd', '3');

-- ----------------------------
-- Table structure for `tbl_post`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_post
-- ----------------------------
INSERT INTO tbl_post VALUES ('1', 'Posts', 'JHG jhg jhsgd hjagsjhasjas ghj asjgasd glas');
INSERT INTO tbl_post VALUES ('3', 'Titulo do id 3', 'ajkshd jaksdjk asldh asd\r\nasdpay ouas dhasdas\r\naks hdkajashas\r\nasodua suhdakshdkaj\r\nasdokluy askghdkjasghjas dkhja skhdasjk d');
INSERT INTO tbl_post VALUES ('4', 'Post com Zend Form', 'JAKHSD jka sld lasj das\r\n aljshdjklas kl jasd\r\nas djh asklajksd as\r\nd asljhd kjashdlas dla sd\r\n');
INSERT INTO tbl_post VALUES ('5', 'Titulo do id 3', 'ajkshd jaksdjk asldh asd\r\nasdpay ouas dhasdas\r\naks hdkajashas\r\nasodua suhdakshdkaj\r\nasdokluy askghdkjasghjas dkhja skhdasjk d');
INSERT INTO tbl_post VALUES ('6', 'Teste titulo', 'Meu texto');

-- ----------------------------
-- Table structure for `tbl_tags`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tags`;
CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tags
-- ----------------------------
INSERT INTO tbl_tags VALUES ('1', 'teste');
INSERT INTO tbl_tags VALUES ('2', 'teste2');

-- ----------------------------
-- Table structure for `tbl_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `acesso` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_usuario
-- ----------------------------
INSERT INTO tbl_usuario VALUES ('1', 'felipe', 'felipe.girotti@gmail.com', 'felipe', 'N');
INSERT INTO tbl_usuario VALUES ('2', 'teste', 'teste@teste.com', 'teste', 'N');
INSERT INTO tbl_usuario VALUES ('3', 'Gtivideoaulas', 'gtivideoaulas@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Y');
