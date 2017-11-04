/*
Navicat MySQL Data Transfer

Source Server         : MyPad
Source Server Version : 50617
Source Host           : 192.168.155.3:3306
Source Database       : news_system

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-09-09 18:53:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `news_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES ('9', '啊算法阿三', '2017-09-09 10:30:01');
INSERT INTO `chat` VALUES ('23', '撒旦富士达啊撒旦啊是', '2017-09-09 12:44:23');
INSERT INTO `chat` VALUES ('22', '啊算法啊算法阿三', '2017-09-09 12:50:54');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `opened` int(11) NOT NULL,
  `information` mediumtext NOT NULL,
  `state` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '乐视美国官网下线，称系统升级一周后恢复', '2017-09-09 08:46:35', '2', '', '1', null);
INSERT INTO `news` VALUES ('2', '啊师傅嘎斯阿三啊算法', '2017-09-09 08:50:36', '1', '', '1', null);
INSERT INTO `news` VALUES ('3', '啊沙发上发送发送', '2017-09-09 08:52:18', '1', '', '1', null);
INSERT INTO `news` VALUES ('4', '啊飞洒大概撒旦', '2017-09-09 08:55:59', '2', '', '1', null);
INSERT INTO `news` VALUES ('5', '啊师傅撒啊发生', '2017-09-09 08:59:31', '4', '', '1', null);
INSERT INTO `news` VALUES ('6', '啊算法撒飞洒', '2017-09-09 10:06:43', '1', '<p><strong>啊师傅</strong><em>撒啊算</em><u>法阿三</u><span data-fr-verified=\"true\" style=\"background-color: #FF9900;\">萨芬撒</span>飞洒</p>', '1', null);
INSERT INTO `news` VALUES ('7', '啊算法撒飞洒', '2017-09-09 10:07:00', '2', '<p><strong>撒萨芬</strong><em>阿三发</em><u>撒法撒</u>阿<span data-fr-verified=\"true\" style=\"background-color: #FFFF00;\">三撒啊</span>撒</p>', '1', null);
INSERT INTO `news` VALUES ('8', '啊算法撒飞洒', '2017-09-09 10:07:34', '3', '<p><strong>撒萨芬</strong><em>阿三发</em><u>撒法撒</u>阿<span data-fr-verified=\"true\" style=\"background-color: #FFFF00;\">三撒啊</span>撒</p>', '1', null);
INSERT INTO `news` VALUES ('9', '卧槽算法发送法撒旦国内进口了来呼叫客服撒大窟窿回家考虑看就了撒法的发 sa', '2017-09-09 10:22:54', '7', '<pre> a撒旦发大<span data-fr-verified=\"true\" style=\"background-color: #FF9900;\">水撒旦富士达撒旦分<span data-fr-verified=\"true\" style=\"font-family: Times New Roman,Times;\"></span>撒旦手动阀的撒富士</span><span data-fr-verified=\"true\" style=\"background-color: #FF9900; color: #666666;\">达手动阀歌诗达富</span><span data-fr-verified=\"true\" style=\"background-color: #FF9900;\">士达的撒法的撒撒旦</span><span data-fr-verified=\"true\" style=\"background-color: #F3F3F3;\">十大富士</span><span data-fr-verified=\"true\" style=\"background-color: #F3F3F3; color: #FF00FF;\">达十大</span></pre>', '1', null);
INSERT INTO `news` VALUES ('10', '十大十大g', '2017-09-09 10:31:01', '0', '<p>十大十大g<span data-fr-verified=\"true\" style=\"background-color: #FFFF00;\">​</span></p>', '1', null);
INSERT INTO `news` VALUES ('11', '但是我发给士大夫', '2017-09-09 10:31:31', '2', '<p>十大范德萨的撒阿三</p>', '1', null);
INSERT INTO `news` VALUES ('12', '暗室逢灯的撒法十大啊', '2017-09-09 11:38:54', '0', '<p>啊算法发送阿三</p>', '1', null);
INSERT INTO `news` VALUES ('13', '阿飞阿三发撒', '2017-09-09 11:40:33', '0', '<p>啊算法阿三</p>', '1', null);
INSERT INTO `news` VALUES ('14', '士大夫十大富士达', '2017-09-09 11:48:17', '0', '<p>啊算法飒飒</p>', '1', null);
INSERT INTO `news` VALUES ('15', '士大夫十大富士达', '2017-09-09 11:51:30', '0', '<p>啊算法飒飒</p>', '1', null);
INSERT INTO `news` VALUES ('16', '士大夫十大富士达', '2017-09-09 11:53:47', '0', '<p>啊算法</p>', '1', null);
INSERT INTO `news` VALUES ('17', '士大夫十大富士达', '2017-09-09 11:54:31', '0', '<p>啊算法</p>', '1', null);
INSERT INTO `news` VALUES ('18', '士大夫十大富士达', '2017-09-09 11:57:42', '0', '<p>啊算法</p>', '1', null);
INSERT INTO `news` VALUES ('19', '啊发生阿三', '2017-09-09 12:02:53', '0', '<p>啊算法阿三</p>', '1', null);
INSERT INTO `news` VALUES ('20', '啊发生阿三', '2017-09-09 12:03:21', '0', '<p>的撒 的撒d</p>', '1', null);
INSERT INTO `news` VALUES ('21', '啊沙发沙发啊算法啊阿三发', '2017-09-09 12:28:18', '0', '<p>啊沙发沙发阿三阿三</p>', '1', null);
INSERT INTO `news` VALUES ('22', '手动阀十大撒旦', '2017-09-09 12:34:23', '2', '<p>水岸东方十大四方达</p>', '1', 'upload/20170909123423oW2pBcBA579e6602-d8c3-4ddc-815f-d78966d01eff.jpg');
INSERT INTO `news` VALUES ('23', '阿发是否阿三', '2017-09-09 12:36:31', '10', '<p>a啊算法</p>', '1', 'upload/20170909123631XKCE7FUs221e1e57-d4b3-4269-b4ad-e93dae7c08ed.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'leafspace', '123456');
