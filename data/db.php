<?php
$datas = array();
//公众号相关
$datas[] = "
-- ----------------------------
-- Table structure for ims_account
-- ----------------------------
DROP TABLE IF EXISTS `ims_account`;
CREATE TABLE `ims_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `isconnect` tinyint(4) NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account
-- ----------------------------
INSERT INTO `ims_account` VALUES ('1', '1', 'uRr8qvQV', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for ims_account_phoneapp
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_phoneapp`;
CREATE TABLE `ims_account_phoneapp` (
  `acid` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_phoneapp
-- ----------------------------

-- ----------------------------
-- Table structure for ims_account_webapp
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_webapp`;
CREATE TABLE `ims_account_webapp` (
  `acid` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_webapp
-- ----------------------------

-- ----------------------------
-- Table structure for ims_account_wechats
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_wechats`;
CREATE TABLE `ims_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `access_token` varchar(1000) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `level` tinyint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `subscribeurl` varchar(120) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_wechats
-- ----------------------------
INSERT INTO `ims_account_wechats` VALUES ('1', '1', 'omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP', '', '', '4', '智放科技', '', '', '', '', '', '', '', '', '0', '', '', '1', '', '');

-- ----------------------------
-- Table structure for ims_account_wxapp
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_wxapp`;
CREATE TABLE `ims_account_wxapp` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(43) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `appdomain` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_wxapp
-- ----------------------------

-- ----------------------------
-- Table structure for ims_activity_clerks
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_clerks`;
CREATE TABLE `ims_activity_clerks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关联users表uid',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `password` (`password`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分兑换店员表';

-- ----------------------------
-- Records of ims_activity_clerks
-- ----------------------------

-- ----------------------------
-- Table structure for ims_activity_clerk_menu
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_clerk_menu`;
CREATE TABLE `ims_activity_clerk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` int(4) NOT NULL,
  `pid` int(6) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `system` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_clerk_menu
-- ----------------------------
INSERT INTO `ims_activity_clerk_menu` VALUES ('1', '0', '0', '0', 'mc', '快捷交易', '', '', '', 'mc_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('2', '0', '0', '1', '', '积分充值', 'fa fa-money', 'credit1', 'modal', 'mc_credit1', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('3', '0', '0', '1', '', '余额充值', 'fa fa-cny', 'credit2', 'modal', 'mc_credit2', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('4', '0', '0', '1', '', '消费', 'fa fa-usd', 'consume', 'modal', 'mc_consume', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('5', '0', '0', '1', '', '发放会员卡', 'fa fa-credit-card', 'card', 'modal', 'mc_card', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('6', '0', '0', '0', 'stat', '数据统计', '', '', '', 'stat_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('7', '0', '0', '6', '', '积分统计', 'fa fa-bar-chart', './index.php?c=site&a=entry&op=chart&do=statcredit1&m=we7_coupon', 'url', 'stat_credit1', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('8', '0', '0', '6', '', '余额统计', 'fa fa-bar-chart', './index.php?c=site&a=entry&op=chart&do=statcredit2&m=we7_coupon', 'url', 'stat_credit2', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('9', '0', '0', '6', '', '现金消费统计', 'fa fa-bar-chart', './index.php?c=site&a=entry&op=chart&do=statcash&m=we7_coupon', 'url', 'stat_cash', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('10', '0', '0', '6', '', '会员卡统计', 'fa fa-bar-chart', './index.php?c=site&a=entry&op=chart&do=statcard&m=we7_coupon', 'url', 'stat_card', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('11', '0', '0', '6', '', '收银台收款统计', 'fa fa-bar-chart', './index.php?c=site&a=entry&op=chart&do=statpaycenter&m=we7_coupon', 'url', 'stat_paycenter', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('12', '0', '0', '0', 'activity', '卡券核销', '', '', '', 'activity_card_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('16', '0', '0', '12', '', '卡券核销', 'fa fa-money', 'cardconsume', 'modal', 'coupon_consume', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('17', '0', '0', '0', 'paycenter', '收银台', '', '', '', 'paycenter_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('18', '0', '0', '17', '', '微信刷卡收款', 'fa fa-money', './index.php?c=paycenter&a=wxmicro&do=pay', 'url', 'paycenter_wxmicro_pay', '1');

-- ----------------------------
-- Table structure for ims_activity_exchange
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange`;
CREATE TABLE `ims_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `extra` (`extra`(333))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_exchange
-- ----------------------------

-- ----------------------------
-- Table structure for ims_activity_exchange_trades
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange_trades`;
CREATE TABLE `ims_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL COMMENT '统一公号',
  `uid` int(10) unsigned NOT NULL COMMENT '用户(粉丝)id',
  `exid` int(10) unsigned NOT NULL COMMENT '兑换产品 exchangeid',
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '交换记录创建时间',
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='真实物品兑换记录表';

-- ----------------------------
-- Records of ims_activity_exchange_trades
-- ----------------------------

-- ----------------------------
-- Table structure for ims_activity_exchange_trades_shipping
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange_trades_shipping`;
CREATE TABLE `ims_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态，0为正常，-1为关闭，1为已发货，2为已完成',
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL COMMENT '收件人',
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='真实物品兑换发货表';

-- ----------------------------
-- Records of ims_activity_exchange_trades_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for ims_activity_stores
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_stores`;
CREATE TABLE `ims_activity_stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL COMMENT '1 审核通过 2 审核中 3审核未通过',
  `source` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1为系统门店，2为微信门店',
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `location_id` (`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ims_activity_stores
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_category`;
CREATE TABLE `ims_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_news
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_news`;
CREATE TABLE `ims_article_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_news
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_notice
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_notice`;
CREATE TABLE `ims_article_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `style` varchar(200) NOT NULL DEFAULT '',
  `group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_notice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_article_unread_notice
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_unread_notice`;
CREATE TABLE `ims_article_unread_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_unread_notice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_attachment_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_attachment_group`;
CREATE TABLE `ims_attachment_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_attachment_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_basic_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_basic_reply`;
CREATE TABLE `ims_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_basic_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_business
-- ----------------------------
DROP TABLE IF EXISTS `ims_business`;
CREATE TABLE `ims_business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `industry1` varchar(10) NOT NULL,
  `industry2` varchar(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lat_lng` (`lng`,`lat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_business
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_attachment
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_attachment`;
CREATE TABLE `ims_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `module_upload_dir` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_cache
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cache`;
CREATE TABLE `ims_core_cache` (
  `key` varchar(50) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cache
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_cron
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron`;
CREATE TABLE `ims_core_cron` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cloudid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `lastruntime` int(10) unsigned NOT NULL,
  `nextruntime` int(10) unsigned NOT NULL,
  `weekday` tinyint(3) NOT NULL,
  `day` tinyint(3) NOT NULL,
  `hour` tinyint(3) NOT NULL,
  `minute` varchar(255) NOT NULL,
  `extra` varchar(5000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createtime` (`createtime`),
  KEY `nextruntime` (`nextruntime`),
  KEY `uniacid` (`uniacid`),
  KEY `cloudid` (`cloudid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_cron_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron_record`;
CREATE TABLE `ims_core_cron_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `tid` (`tid`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_job
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_job`;
CREATE TABLE `ims_core_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `payload` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `title` varchar(22) NOT NULL,
  `handled` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `isdeleted` tinyint(1) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_job
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_menu
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_menu`;
CREATE TABLE `ims_core_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `append_title` varchar(30) NOT NULL,
  `append_url` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `group_name` varchar(30) NOT NULL DEFAULT '',
  `icon` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_menu
-- ----------------------------
INSERT INTO `ims_core_menu` VALUES ('1', '0', '基础设置', 'platform', '', 'fa fa-cog', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('2', '1', '基本功能', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_basic_function', '', '');
INSERT INTO `ims_core_menu` VALUES ('3', '2', '文字回复', 'platform', './index.php?c=platform&a=reply&m=basic', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=basic', '0', 'url', '1', '1', 'platform_reply_basic', '', '');
INSERT INTO `ims_core_menu` VALUES ('4', '2', '图文回复', 'platform', './index.php?c=platform&a=reply&m=news', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=news', '0', 'url', '1', '1', 'platform_reply_news', '', '');
INSERT INTO `ims_core_menu` VALUES ('5', '2', '音乐回复', 'platform', './index.php?c=platform&a=reply&m=music', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=music', '0', 'url', '1', '1', 'platform_reply_music', '', '');
INSERT INTO `ims_core_menu` VALUES ('6', '2', '图片回复', 'platform', './index.php?c=platform&a=reply&m=images', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=images', '0', 'url', '1', '1', 'platform_reply_images', '', '');
INSERT INTO `ims_core_menu` VALUES ('7', '2', '语音回复', 'platform', './index.php?c=platform&a=reply&m=voice', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=voice', '0', 'url', '1', '1', 'platform_reply_voice', '', '');
INSERT INTO `ims_core_menu` VALUES ('8', '2', '视频回复', 'platform', './index.php?c=platform&a=reply&m=video', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=video', '0', 'url', '1', '1', 'platform_reply_video', '', '');
INSERT INTO `ims_core_menu` VALUES ('9', '2', '微信卡券回复', 'platform', './index.php?c=platform&a=reply&m=wxcard', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=wxcard', '0', 'url', '1', '1', 'platform_reply_wxcard', '', '');
INSERT INTO `ims_core_menu` VALUES ('10', '2', '自定义接口回复', 'platform', './index.php?c=platform&a=reply&m=userapi', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=userapi', '0', 'url', '1', '1', 'platform_reply_userapi', '', '');
INSERT INTO `ims_core_menu` VALUES ('11', '2', '系统回复', 'platform', './index.php?c=platform&a=special&do=display&', '', '', '0', 'url', '1', '1', 'platform_reply_system', '', '');
INSERT INTO `ims_core_menu` VALUES ('12', '1', '高级功能', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_high_function', '', '');
INSERT INTO `ims_core_menu` VALUES ('13', '12', '常用服务接入', 'platform', './index.php?c=platform&a=service&do=switch&', '', '', '0', 'url', '1', '1', 'platform_service', '', '');
INSERT INTO `ims_core_menu` VALUES ('14', '12', '自定义菜单', 'platform', './index.php?c=platform&a=menu&', '', '', '0', 'url', '1', '1', 'platform_menu', '', '');
INSERT INTO `ims_core_menu` VALUES ('15', '12', '特殊消息回复', 'platform', './index.php?c=platform&a=special&do=message&', '', '', '0', 'url', '1', '1', 'platform_special', '', '');
INSERT INTO `ims_core_menu` VALUES ('16', '12', '二维码管理', 'platform', './index.php?c=platform&a=qr&', '', '', '0', 'url', '1', '1', 'platform_qr', '', '');
INSERT INTO `ims_core_menu` VALUES ('17', '12', '多客服接入', 'platform', './index.php?c=platform&a=reply&m=custom', '', '', '0', 'url', '1', '1', 'platform_reply_custom', '', '');
INSERT INTO `ims_core_menu` VALUES ('18', '12', '长链接二维码', 'platform', './index.php?c=platform&a=url2qr&', '', '', '0', 'url', '1', '1', 'platform_url2qr', '', '');
INSERT INTO `ims_core_menu` VALUES ('19', '1', '数据统计', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_stat', '', '');
INSERT INTO `ims_core_menu` VALUES ('20', '19', '聊天记录', 'platform', './index.php?c=platform&a=stat&do=history&', '', '', '0', 'url', '1', '1', 'platform_stat_history', '', '');
INSERT INTO `ims_core_menu` VALUES ('21', '19', '回复规则使用情况', 'platform', './index.php?c=platform&a=stat&do=rule&', '', '', '0', 'url', '1', '1', 'platform_stat_rule', '', '');
INSERT INTO `ims_core_menu` VALUES ('22', '19', '关键字命中情况', 'platform', './index.php?c=platform&a=stat&do=keyword&', '', '', '0', 'url', '1', '1', 'platform_stat_keyword', '', '');
INSERT INTO `ims_core_menu` VALUES ('23', '19', '参数', 'platform', './index.php?c=platform&a=stat&do=setting&', '', '', '0', 'url', '1', '1', 'platform_stat_setting', '', '');
INSERT INTO `ims_core_menu` VALUES ('24', '0', '微站功能', 'site', '', 'fa fa-life-bouy', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('25', '24', '微站管理', 'site', '', '', '', '0', 'url', '1', '1', 'site_manage', '', '');
INSERT INTO `ims_core_menu` VALUES ('26', '25', '站点管理', 'site', './index.php?c=site&a=multi&do=display&', 'fa fa-plus', './index.php?c=site&a=multi&do=post&', '0', 'url', '1', '1', 'site_multi_display', '', '');
INSERT INTO `ims_core_menu` VALUES ('27', '25', '站点添加/编辑', 'site', '', '', '', '0', 'permission', '0', '1', 'site_multi_post', '', '');
INSERT INTO `ims_core_menu` VALUES ('28', '25', '站点删除', 'site', '', '', '', '0', 'permission', '0', '1', 'site_multi_del', '', '');
INSERT INTO `ims_core_menu` VALUES ('29', '25', '模板管理', 'site', './index.php?c=site&a=style&do=template&', '', '', '0', 'url', '1', '1', 'site_style_template', '', '');
INSERT INTO `ims_core_menu` VALUES ('30', '25', '模块模板扩展', 'site', './index.php?c=site&a=style&do=module&', '', '', '0', 'url', '1', '1', 'site_style_module', '', '');
INSERT INTO `ims_core_menu` VALUES ('31', '24', '特殊页面管理', 'site', '', '', '', '0', 'url', '1', '1', 'site_special_page', '', '');
INSERT INTO `ims_core_menu` VALUES ('32', '31', '会员中心', 'site', './index.php?c=site&a=editor&do=uc&', '', '', '0', 'url', '1', '1', 'site_editor_uc', '', '');
INSERT INTO `ims_core_menu` VALUES ('33', '31', '专题页面', 'site', './index.php?c=site&a=editor&do=page&', 'fa fa-plus', './index.php?c=site&a=editor&do=design&', '0', 'url', '1', '1', 'site_editor_page', '', '');
INSERT INTO `ims_core_menu` VALUES ('34', '24', '功能组件', 'site', '', '', '', '0', 'url', '1', '1', 'site_widget', '', '');
INSERT INTO `ims_core_menu` VALUES ('35', '34', '分类设置', 'site', './index.php?c=site&a=category&', '', '', '0', 'url', '1', '1', 'site_category', '', '');
INSERT INTO `ims_core_menu` VALUES ('36', '34', '文章管理', 'site', './index.php?c=site&a=article&', '', '', '0', 'url', '1', '1', 'site_article', '', '');
INSERT INTO `ims_core_menu` VALUES ('37', '0', '粉丝营销', 'mc', '', 'fa fa-gift', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('38', '37', '粉丝管理', 'mc', '', '', '', '0', 'url', '1', '1', 'mc_fans_manage', '', '');
INSERT INTO `ims_core_menu` VALUES ('39', '38', '粉丝分组', 'mc', './index.php?c=mc&a=fangroup&', '', '', '0', 'url', '1', '1', 'mc_fangroup', '', '');
INSERT INTO `ims_core_menu` VALUES ('40', '38', '粉丝', 'mc', './index.php?c=mc&a=fans&', '', '', '0', 'url', '1', '1', 'mc_fans', '', '');
INSERT INTO `ims_core_menu` VALUES ('41', '37', '会员中心', 'mc', '', '', '', '0', 'url', '1', '1', 'mc_members_manage', '', '');
INSERT INTO `ims_core_menu` VALUES ('42', '41', '会员中心关键字', 'mc', './index.php?c=platform&a=cover&do=mc&', '', '', '0', 'url', '1', '1', 'platform_cover_mc', '', '');
INSERT INTO `ims_core_menu` VALUES ('43', '41', '会员', 'mc', './index.php?c=mc&a=member&', 'fa fa-plus', './index.php?c=mc&a=member&do=add&', '0', 'url', '1', '1', 'mc_member', '', '');
INSERT INTO `ims_core_menu` VALUES ('44', '41', '会员组', 'mc', './index.php?c=mc&a=group&', '', '', '0', 'url', '1', '1', 'mc_group', '', '');
INSERT INTO `ims_core_menu` VALUES ('45', '37', '微信素材&群发', 'mc', '', '', '', '0', 'url', '1', '1', 'material_manage', '', '');
INSERT INTO `ims_core_menu` VALUES ('46', '45', '素材&群发', 'mc', './index.php?c=material&a=display&', '', '', '0', 'url', '1', '1', 'material_display', '', '');
INSERT INTO `ims_core_menu` VALUES ('47', '45', '定时群发', 'mc', './index.php?c=material&a=mass&', '', '', '0', 'url', '1', '1', 'material_mass', '', '');
INSERT INTO `ims_core_menu` VALUES ('48', '37', '统计中心', 'mc', '', '', '', '0', 'url', '1', '1', 'stat_center', '', '');
INSERT INTO `ims_core_menu` VALUES ('49', '48', '会员积分统计', 'mc', './index.php?c=stat&a=credit1&', '', '', '0', 'url', '1', '1', 'stat_credit1', '', '');
INSERT INTO `ims_core_menu` VALUES ('50', '48', '会员余额统计', 'mc', './index.php?c=stat&a=credit2&', '', '', '0', 'url', '1', '1', 'stat_credit2', '', '');
INSERT INTO `ims_core_menu` VALUES ('51', '0', '功能选项', 'setting', '', 'fa fa-umbrella', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('52', '51', '公众号选项', 'setting', '', '', '', '0', 'url', '1', '1', 'account_setting', '', '');
INSERT INTO `ims_core_menu` VALUES ('53', '52', '支付参数', 'setting', './index.php?c=profile&a=payment&', '', '', '0', 'url', '1', '1', 'profile_payment', '', '');
INSERT INTO `ims_core_menu` VALUES ('54', '52', '借用 oAuth 权限', 'setting', './index.php?c=mc&a=passport&do=oauth&', '', '', '0', 'url', '1', '1', 'mc_passport_oauth', '', '');
INSERT INTO `ims_core_menu` VALUES ('55', '52', '借用 JS 分享权限', 'setting', './index.php?c=profile&a=jsauth&', '', '', '0', 'url', '1', '1', 'profile_jsauth', '', '');
INSERT INTO `ims_core_menu` VALUES ('56', '52', '会员字段管理', 'setting', './index.php?c=mc&a=fields&', '', '', '0', 'url', '1', '1', 'mc_fields', '', '');
INSERT INTO `ims_core_menu` VALUES ('57', '52', '微信通知设置', 'setting', './index.php?c=mc&a=tplnotice&', '', '', '0', 'url', '1', '1', 'mc_tplnotice', '', '');
INSERT INTO `ims_core_menu` VALUES ('58', '51', '会员及粉丝选项', 'setting', '', '', '', '0', 'url', '1', '1', 'mc_setting', '', '');
INSERT INTO `ims_core_menu` VALUES ('59', '58', '积分设置', 'setting', './index.php?c=mc&a=credit&', '', '', '0', 'url', '1', '1', 'mc_credit', '', '');
INSERT INTO `ims_core_menu` VALUES ('60', '58', '注册设置', 'setting', './index.php?c=mc&a=passport&do=passport&', '', '', '0', 'url', '1', '1', 'mc_passport_passport', '', '');
INSERT INTO `ims_core_menu` VALUES ('61', '58', '粉丝同步设置', 'setting', './index.php?c=mc&a=passport&do=sync&', '', '', '0', 'url', '1', '1', 'mc_passport_sync', '', '');
INSERT INTO `ims_core_menu` VALUES ('62', '58', 'UC站点整合', 'setting', './index.php?c=mc&a=uc&', '', '', '0', 'url', '1', '1', 'mc_uc', '', '');
INSERT INTO `ims_core_menu` VALUES ('63', '51', '其他功能选项', 'setting', '', '', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('64', '0', '扩展功能', 'ext', '', 'fa fa-cubes', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('65', '64', '管理', 'ext', '', '', '', '0', 'url', '1', '1', '', '', '');
INSERT INTO `ims_core_menu` VALUES ('66', '65', '扩展功能管理', 'ext', './index.php?c=profile&a=module&', '', '', '0', 'url', '1', '1', 'profile_module', '', '');
INSERT INTO `ims_core_menu` VALUES ('67', '58', '邮件通知参数', 'setting', './index.php?c=profile&a=notify&', '', '', '0', 'url', '1', '1', 'profile_notify', '', '');
INSERT INTO `ims_core_menu` VALUES ('68', '0', '', '', '', '', '', '0', 'url', '1', '1', 'store', 'frame', '');
INSERT INTO `ims_core_menu` VALUES ('69', '0', '', '', '', '', '', '0', '', '0', '1', 'phoneapp', 'frame', '');

-- ----------------------------
-- Table structure for ims_core_paylog
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_paylog`;
CREATE TABLE `ims_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `acid` int(10) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `tid` varchar(128) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `tag` varchar(2000) NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_performance
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_performance`;
CREATE TABLE `ims_core_performance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `runurl` varchar(512) NOT NULL,
  `runsql` varchar(512) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_performance
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_queue
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_queue`;
CREATE TABLE `ims_core_queue` (
  `qid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `message` varchar(2000) NOT NULL,
  `params` varchar(1000) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `module` (`module`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_queue
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_refundlog
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_refundlog`;
CREATE TABLE `ims_core_refundlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `refund_uniontid` varchar(64) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `refund_uniontid` (`refund_uniontid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_refundlog
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_resource
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_resource`;
CREATE TABLE `ims_core_resource` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `trunk` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `acid` (`uniacid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_resource
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_sendsms_log
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_sendsms_log`;
CREATE TABLE `ims_core_sendsms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_sendsms_log
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_sessions`;
CREATE TABLE `ims_core_sessions` (
  `sid` char(32) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `data` varchar(5000) NOT NULL,
  `expiretime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for ims_core_settings
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_settings`;
CREATE TABLE `ims_core_settings` (
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_settings
-- ----------------------------
INSERT INTO `ims_core_settings` VALUES ('copyright', 'a:32:{s:6:\"status\";i:0;s:10:\"verifycode\";i:0;s:6:\"reason\";s:15:\"站点维护中\";s:8:\"sitename\";s:0:\"\";s:3:\"url\";s:7:\"http://\";s:8:\"statcode\";s:0:\"\";s:10:\"footerleft\";s:0:\"\";s:11:\"footerright\";s:0:\"\";s:4:\"icon\";s:0:\"\";s:5:\"flogo\";s:0:\"\";s:14:\"background_img\";s:0:\"\";s:6:\"slides\";s:216:\"a:3:{i:0;s:58:\"https://img.alicdn.com/tps/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg\";i:1;s:58:\"https://img.alicdn.com/tps/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg\";i:2;s:58:\"https://img.alicdn.com/tps/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg\";}\";s:6:\"notice\";s:0:\"\";s:5:\"blogo\";s:0:\"\";s:8:\"baidumap\";a:2:{s:3:\"lng\";s:0:\"\";s:3:\"lat\";s:0:\"\";}s:7:\"company\";s:0:\"\";s:14:\"companyprofile\";s:0:\"\";s:7:\"address\";s:0:\"\";s:6:\"person\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:2:\"qq\";s:0:\"\";s:5:\"email\";s:0:\"\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"showhomepage\";i:0;s:13:\"leftmenufixed\";i:0;s:13:\"mobile_status\";s:1:\"0\";s:10:\"login_type\";s:1:\"0\";s:10:\"log_status\";i:0;s:14:\"develop_status\";i:0;s:3:\"icp\";s:0:\"\";s:4:\"bind\";s:0:\"\";}');
INSERT INTO `ims_core_settings` VALUES ('authmode', 'i:1;');
INSERT INTO `ims_core_settings` VALUES ('close', 'a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}');
INSERT INTO `ims_core_settings` VALUES ('register', 'a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('site', 's:0:\"\";');
INSERT INTO `ims_core_settings` VALUES ('cloudip', 'a:2:{s:2:\"ip\";s:14:\"106.15.203.187\";s:6:\"expire\";i:1527568459;}');
INSERT INTO `ims_core_settings` VALUES ('module_ban', 'a:0:{}');
INSERT INTO `ims_core_settings` VALUES ('module_upgrade', 'a:0:{}');
INSERT INTO `ims_core_settings` VALUES ('platform', 'a:5:{s:5:\"token\";s:32:\"F5I3958H55I2ZH982yo1Y42O2a6423hZ\";s:14:\"encodingaeskey\";s:43:\"l49hho531u3z8d22UZQTa2449364HMbzm1345ZM2Qu2\";s:9:\"appsecret\";s:0:\"\";s:5:\"appid\";s:0:\"\";s:9:\"authstate\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('module_receive_ban', 'a:1:{s:30:\"wn_storex_plugin_hotel_service\";s:30:\"wn_storex_plugin_hotel_service\";}');
INSERT INTO `ims_core_settings` VALUES ('store', 'a:1:{s:6:\"status\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('basic', 'a:1:{s:8:\"template\";s:7:\"default\";}');

-- ----------------------------
-- Table structure for ims_coupon
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon`;
CREATE TABLE `ims_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `acid` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL COMMENT '卡券类型',
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'code类型（二维码/条形码/code码）',
  `brand_name` varchar(15) NOT NULL COMMENT '商家名称',
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL COMMENT '使用说明',
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL COMMENT '使用期限',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '总库存',
  `use_custom_code` tinyint(3) NOT NULL DEFAULT '0',
  `bind_openid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `can_share` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否可分享',
  `can_give_friend` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否可转赠给朋友',
  `get_limit` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '每人领取限制',
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1:审核中,2:未通过,3:已通过,4:卡券被商户删除,5:未知',
  `is_display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架',
  `is_selfconsume` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否开启自助核销',
  `promotion_url_name` varchar(10) NOT NULL,
  `promotion_url` varchar(100) NOT NULL,
  `promotion_url_sub_title` varchar(10) NOT NULL,
  `source` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `dosage` int(10) unsigned DEFAULT '0' COMMENT '已领取数量',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_activity`;
CREATE TABLE `ims_coupon_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '1 发送系统卡券 2发送微信卡券',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `coupons` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '‘’',
  `members` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_groups
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_groups`;
CREATE TABLE `ims_coupon_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL DEFAULT '',
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_groups
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_location
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_location`;
CREATE TABLE `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_location
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_modules
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_modules`;
CREATE TABLE `ims_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL DEFAULT '0',
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`couponid`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_modules
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_record`;
CREATE TABLE `ims_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_coupon_store
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_store`;
CREATE TABLE `ims_coupon_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL DEFAULT '',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_store
-- ----------------------------

-- ----------------------------
-- Table structure for ims_cover_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_cover_reply`;
CREATE TABLE `ims_cover_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `do` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_cover_reply
-- ----------------------------
INSERT INTO `ims_cover_reply` VALUES ('1', '1', '0', '7', 'mc', '', '进入个人中心', '', '', './index.php?c=mc&a=home&i=1');
INSERT INTO `ims_cover_reply` VALUES ('2', '1', '1', '8', 'site', '', '进入首页', '', '', './index.php?c=home&i=1&t=1');

-- ----------------------------
-- Table structure for ims_custom_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_custom_reply`;
CREATE TABLE `ims_custom_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `start1` int(10) NOT NULL,
  `end1` int(10) NOT NULL,
  `start2` int(10) NOT NULL,
  `end2` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_custom_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_images_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_images_reply`;
CREATE TABLE `ims_images_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_images_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_job
-- ----------------------------
DROP TABLE IF EXISTS `ims_job`;
CREATE TABLE `ims_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `payload` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `title` varchar(22) NOT NULL,
  `handled` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_job
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card`;
CREATE TABLE `ims_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '会员卡名称',
  `color` varchar(255) NOT NULL DEFAULT '' COMMENT '会员卡字颜色',
  `background` varchar(1000) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'logo图片',
  `format_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否用手机号作为会员卡号',
  `format` varchar(50) NOT NULL DEFAULT '' COMMENT '会员卡卡号规则',
  `description` varchar(512) NOT NULL DEFAULT '' COMMENT '会员卡说明',
  `fields` varchar(1000) NOT NULL DEFAULT '' COMMENT '会员卡资料',
  `snpos` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用1:启用0:关闭',
  `business` text NOT NULL,
  `discount_type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '折扣类型.1:满减,2:折扣',
  `discount` varchar(3000) NOT NULL DEFAULT '' COMMENT '各个会员组的优惠详情',
  `grant` varchar(3000) NOT NULL COMMENT '领卡赠送:积分,余额,优惠券',
  `grant_rate` varchar(20) NOT NULL DEFAULT '0' COMMENT '消费返积分比率',
  `offset_rate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分抵现比例',
  `offset_max` int(10) NOT NULL DEFAULT '0' COMMENT '每单最多可抵现金数量',
  `nums_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '计次是否开启，0为关闭，1为开启',
  `nums_text` varchar(15) NOT NULL COMMENT '计次名称',
  `nums` varchar(1000) NOT NULL DEFAULT '' COMMENT '计次规则',
  `times_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '计时是否开启，0为关闭，1为开启',
  `times_text` varchar(15) NOT NULL COMMENT '计时名称',
  `times` varchar(1000) NOT NULL DEFAULT '' COMMENT '计时规则',
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `recommend_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sign_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '签到功能是否开启，0为关闭，1为开启',
  `brand_name` varchar(128) NOT NULL DEFAULT '' COMMENT '商户名字,',
  `notice` varchar(48) NOT NULL DEFAULT '' COMMENT '卡券使用提醒',
  `quantity` int(10) NOT NULL DEFAULT '0' COMMENT '会员卡库存',
  `max_increase_bonus` int(10) NOT NULL DEFAULT '0' COMMENT '用户单次可获取的积分上限',
  `least_money_to_use_bonus` int(10) NOT NULL DEFAULT '0' COMMENT '抵扣条件',
  `source` int(1) NOT NULL DEFAULT '1' COMMENT '1.系统会员卡，2微信会员卡',
  `card_id` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_credit_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_credit_set`;
CREATE TABLE `ims_mc_card_credit_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `sign` varchar(1000) NOT NULL,
  `share` varchar(500) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_credit_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_members
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_members`;
CREATE TABLE `ims_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `openid` varchar(50) NOT NULL,
  `cid` int(10) NOT NULL DEFAULT '0',
  `cardsn` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `nums` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_members
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_notices
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_notices`;
CREATE TABLE `ims_mc_card_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1:公共消息，2:个人消息',
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `groupid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '通知会员组。默认为所有会员',
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_notices
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_notices_unread
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_notices_unread`;
CREATE TABLE `ims_mc_card_notices_unread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `notice_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1:公共通知，2：个人通知',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_notices_unread
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_record`;
CREATE TABLE `ims_mc_card_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `model` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `tag` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_card_sign_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_sign_record`;
CREATE TABLE `ims_mc_card_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `is_grant` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_sign_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_cash_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_cash_record`;
CREATE TABLE `ims_mc_cash_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `return_cash` decimal(10,2) unsigned NOT NULL,
  `final_cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `trade_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_cash_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_chats_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_chats_record`;
CREATE TABLE `ims_mc_chats_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL,
  `openid` varchar(32) NOT NULL,
  `msgtype` varchar(15) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `openid` (`openid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_chats_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_credits_recharge
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_recharge`;
CREATE TABLE `ims_mc_credits_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `tid` varchar(64) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `backtype` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid_uid` (`uniacid`,`uid`),
  KEY `idx_tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_recharge
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_credits_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_record`;
CREATE TABLE `ims_mc_credits_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL,
  `real_uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_fans_groups
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_fans_groups`;
CREATE TABLE `ims_mc_fans_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groups` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_fans_groups
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_fans_tag_mapping
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_fans_tag_mapping`;
CREATE TABLE `ims_mc_fans_tag_mapping` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fanid` int(11) unsigned NOT NULL,
  `tagid` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mapping` (`fanid`,`tagid`),
  KEY `fanid_index` (`fanid`),
  KEY `tagid_index` (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_fans_tag_mapping
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_groups
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_groups`;
CREATE TABLE `ims_mc_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `isdefault` tinyint(4) NOT NULL,
  PRIMARY KEY (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_groups
-- ----------------------------
INSERT INTO `ims_mc_groups` VALUES ('1', '1', '默认会员组', '0', '1');

-- ----------------------------
-- Table structure for ims_mc_handsel
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_handsel`;
CREATE TABLE `ims_mc_handsel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `touid` int(10) unsigned NOT NULL,
  `fromuid` varchar(32) NOT NULL,
  `module` varchar(30) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `action` varchar(20) NOT NULL,
  `credit_value` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`touid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_handsel
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mapping_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_fans`;
CREATE TABLE `ims_mc_mapping_fans` (
  `fanid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `groupid` varchar(30) NOT NULL,
  `salt` char(8) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL,
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  `unionid` varchar(64) NOT NULL,
  PRIMARY KEY (`fanid`),
  UNIQUE KEY `openid` (`openid`),
  KEY `acid` (`acid`),
  KEY `uniacid` (`uniacid`),
  KEY `nickname` (`nickname`),
  KEY `updatetime` (`updatetime`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_fans
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mapping_ucenter
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_ucenter`;
CREATE TABLE `ims_mc_mapping_ucenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `centeruid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_ucenter
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_mass_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mass_record`;
CREATE TABLE `ims_mc_mass_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `fansnum` int(10) unsigned NOT NULL,
  `msgtype` varchar(10) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `group` int(10) NOT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `cron_id` int(10) unsigned NOT NULL,
  `sendtime` int(10) unsigned NOT NULL,
  `finalsendtime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mass_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_members
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_members`;
CREATE TABLE `ims_mc_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `groupid` int(11) NOT NULL,
  `credit1` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `credit3` decimal(10,2) unsigned NOT NULL,
  `credit4` decimal(10,2) unsigned NOT NULL,
  `credit5` decimal(10,2) unsigned NOT NULL,
  `credit6` decimal(10,2) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `pay_password` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `groupid` (`groupid`),
  KEY `uniacid` (`uniacid`),
  KEY `email` (`email`),
  KEY `mobile` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_members
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_address
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_address`;
CREATE TABLE `ims_mc_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_fields
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_fields`;
CREATE TABLE `ims_mc_member_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `fieldid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fieldid` (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_fields
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_member_property
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_property`;
CREATE TABLE `ims_mc_member_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `property` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_property
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mc_oauth_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_oauth_fans`;
CREATE TABLE `ims_mc_oauth_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_openid` varchar(50) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_oauthopenid_acid` (`oauth_openid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_oauth_fans
-- ----------------------------

-- ----------------------------
-- Table structure for ims_menu_event
-- ----------------------------
DROP TABLE IF EXISTS `ims_menu_event`;
CREATE TABLE `ims_menu_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `picmd5` varchar(32) NOT NULL,
  `openid` varchar(128) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `picmd5` (`picmd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_menu_event
-- ----------------------------

-- ----------------------------
-- Table structure for ims_message_notice_log
-- ----------------------------
DROP TABLE IF EXISTS `ims_message_notice_log`;
CREATE TABLE `ims_message_notice_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL DEFAULT '',
  `is_read` tinyint(3) NOT NULL,
  `uid` int(11) NOT NULL,
  `sign` varchar(22) NOT NULL DEFAULT '',
  `type` tinyint(3) NOT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_message_notice_log
-- ----------------------------

-- ----------------------------
-- Table structure for ims_mobilenumber
-- ----------------------------
DROP TABLE IF EXISTS `ims_mobilenumber`;
CREATE TABLE `ims_mobilenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mobilenumber
-- ----------------------------

-- ----------------------------
-- Table structure for ims_modules
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules`;
CREATE TABLE `ims_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `version` varchar(15) NOT NULL,
  `ability` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `settings` tinyint(1) NOT NULL,
  `subscribes` varchar(500) NOT NULL,
  `handles` varchar(500) NOT NULL,
  `isrulefields` tinyint(1) NOT NULL,
  `issystem` tinyint(1) unsigned NOT NULL,
  `target` int(10) unsigned NOT NULL,
  `iscard` tinyint(3) unsigned NOT NULL,
  `permissions` varchar(5000) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `wxapp_support` tinyint(1) NOT NULL,
  `app_support` tinyint(1) NOT NULL,
  `welcome_support` int(2) NOT NULL,
  `oauth_type` tinyint(1) NOT NULL,
  `webapp_support` tinyint(1) NOT NULL,
  `phoneapp_support` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules
-- ----------------------------
INSERT INTO `ims_modules` VALUES ('1', 'basic', 'system', '基本文字回复', '1.0', '和您进行简单对话', '一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('2', 'news', 'system', '基本混合图文回复', '1.0', '为你提供生动的图文资讯', '一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('3', 'music', 'system', '基本音乐回复', '1.0', '提供语音、音乐等音频类回复', '在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('4', 'userapi', 'system', '自定义接口回复', '1.1', '更方便的第三方接口设置', '自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'Z', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('5', 'recharge', 'system', '会员中心充值模块', '1.0', '提供会员充值功能', '', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '0', '1', '0', '0', '', 'H', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('6', 'custom', 'system', '多客服转接', '1.0.0', '用来接入腾讯的多客服系统', '', 'WeEngine Team', 'http://bbs.we7.cc', '0', 'a:0:{}', 'a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}', '1', '1', '0', '0', '', 'D', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('7', 'images', 'system', '基本图片回复', '1.0', '提供图片回复', '在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('8', 'video', 'system', '基本视频回复', '1.0', '提供图片回复', '在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('9', 'voice', 'system', '基本语音回复', '1.0', '提供语音回复', '在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'J', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('10', 'chats', 'system', '发送客服消息', '1.0', '公众号可以在粉丝最后发送消息的48小时内无限制发送消息', '', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '0', '1', '0', '0', '', 'F', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('11', 'wxcard', 'system', '微信卡券回复', '1.0', '微信卡券回复', '微信卡券回复', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'W', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('12', 'paycenter', 'system', '收银台', '1.0', '收银台', '收银台', 'WeEngine Team', 'http://www.we7.cc/', '0', '', '', '1', '1', '0', '0', '', 'S', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('17', 'wn_storex', 'business', '万能小店', '3.0.3', '万能小店', '万能小店', '亲测网', 'https://www.qincewang.com', '0', 'a:3:{i:0;s:13:\"user_get_card\";i:1;s:13:\"user_del_card\";i:2;s:17:\"user_consume_card\";}', 'a:1:{i:0;s:4:\"text\";}', '1', '0', '0', '0', 'a:0:{}', 'W', '2', '2', '1', '1', '1', '1');
INSERT INTO `ims_modules` VALUES ('18', 'we7_coupon', 'business', '系统卡券', '7.6', '微擎卡券', '微擎卡券', '亲测网', 'https://www.qincewang.com', '1', 'a:3:{i:0;s:13:\"user_get_card\";i:1;s:13:\"user_del_card\";i:2;s:17:\"user_consume_card\";}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'X', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('20', 'store', 'business', '站内商城', '1.0', '站内商城', '站内商城', 'we7', '', '0', '', '', '0', '1', '0', '0', '', 'Z', '1', '2', '1', '0', '1', '0');
INSERT INTO `ims_modules` VALUES ('27', 'wn_storex_plugin_bargain', 'business', '万能小店砍价', '1.0', '万能小店砍价', '万能小店砍价', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('28', 'sudu8_page', 'biz', '万能门店小程序', '6.4.1', '本地商户门店小程序，比官方微信门店功能更强大', '本地商户门店小程序，比官方微信门店功能更强大', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '2', '1', '1', '1', '1', '1');
INSERT INTO `ims_modules` VALUES ('29', 'wn_storex_plugin_credit_mall', 'business', '万能小店积分商城', '1.8', '万能小店积分商城', '万能小店积分商城', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('30', 'wn_storex_plugin_group', 'business', '万能小店拼团', '1.5', '万能小店拼团', '万能小店拼团', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('31', 'wn_storex_plugin_hotel_service', 'business', '万能小店酒店服务', '1.2', '万能小店酒店服务插件', '万能小店酒店服务插件', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('32', 'wn_storex_plugin_printer', 'business', '万能小店小票打印', '1.3', '万能小店小票打印', '万能小店小票打印', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');
INSERT INTO `ims_modules` VALUES ('33', 'wn_storex_plugin_sms', 'business', '万能小店短信服务', '1.1', '万能小店短信服务', '万能小店短信服务', '亲测网', 'https://www.qincewang.com', '0', 'a:0:{}', 'a:0:{}', '0', '0', '0', '0', 'a:0:{}', 'W', '1', '2', '0', '1', '0', '0');

-- ----------------------------
-- Table structure for ims_modules_bindings
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_bindings`;
CREATE TABLE `ims_modules_bindings` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  `entry` varchar(30) NOT NULL,
  `call` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `do` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `direct` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `displayorder` tinyint(255) unsigned NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_bindings
-- ----------------------------
INSERT INTO `ims_modules_bindings` VALUES ('146', 'wn_storex', 'menu', '', '店铺管理', 'storeprofile', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('102', 'wn_storex', 'menu', '', '基本设置', 'hotelset', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('103', 'wn_storex', 'menu', '', '扩展功能', 'extend', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('104', 'we7_coupon', 'cover', '', '会员卡入口设置', 'card', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('105', 'we7_coupon', 'cover', '', '收银台入口设置', 'clerk', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('106', 'we7_coupon', 'menu', '', '会员卡设置', 'membercard', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('107', 'we7_coupon', 'menu', '', '会员卡管理', 'cardmanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('108', 'we7_coupon', 'menu', '', '会员属性', 'memberproperty', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('109', 'we7_coupon', 'menu', '', '优惠券管理', 'couponmanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('110', 'we7_coupon', 'menu', '', '优惠券核销', 'couponconsume', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('111', 'we7_coupon', 'menu', '', '优惠券派发', 'couponmarket', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('112', 'we7_coupon', 'menu', '', '兑换优惠券', 'couponexchange', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('113', 'we7_coupon', 'menu', '', '兑换真实物品', 'goodsexchange', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('114', 'we7_coupon', 'menu', '', '门店管理', 'storelist', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('115', 'we7_coupon', 'menu', '', '店员管理', 'clerklist', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('116', 'we7_coupon', 'menu', '', '门店收银台', 'paycenter', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('118', 'we7_coupon', 'menu', '', '签到管理', 'signmanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('119', 'we7_coupon', 'menu', '', '通知管理', 'noticemanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('120', 'we7_coupon', 'menu', '', '会员积分统计', 'statcredit1', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('121', 'we7_coupon', 'menu', '', '会员余额统计', 'statcredit2', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('122', 'we7_coupon', 'menu', '', '会员现金消费统计', 'statcash', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('123', 'we7_coupon', 'menu', '', '会员卡统计', 'statcard', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('124', 'we7_coupon', 'menu', '', '收银台收款统计', 'statpaycenter', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('125', 'we7_coupon', 'menu', '', '微信卡券回复', 'wxcardreply', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('126', 'we7_coupon', 'profile', '', '会员卡', 'card', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('127', 'we7_coupon', 'profile', '', '兑换商城', 'activity', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('132', 'we7_coupon', 'menu', '', '店员工作台', 'clerkdeskwelcome', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('143', 'wn_storex', 'page', '', '首页', '/wn_storex/pages/index/index', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('144', 'wn_storex', 'page', '', '我的', '/wn_storex/pages/home/index', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('145', 'wn_storex', 'cover', '', '入口设置', 'display', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('151', 'sudu8_page', 'menu', '', '基础信息', 'base', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('150', 'wn_storex_plugin_bargain', 'menu', '', '店铺砍价设置', 'storexbargain', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('152', 'sudu8_page', 'menu', '', '预约管理', 'forms', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('153', 'sudu8_page', 'menu', '', '样式DIY', 'diy', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('154', 'sudu8_page', 'menu', '', '栏目管理', 'cate', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('155', 'sudu8_page', 'menu', '', '公司介绍', 'about', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('156', 'sudu8_page', 'menu', '', '首页导航栏', 'nav', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('157', 'sudu8_page', 'menu', '', '底部菜单栏', 'tabbar', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('158', 'sudu8_page', 'menu', '', '内容--文章', 'items', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('159', 'sudu8_page', 'menu', '', '内容--组图', 'pics', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('160', 'sudu8_page', 'menu', '', '内容--小程序', 'wxapps', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('161', 'sudu8_page', 'menu', '', '内容--商品', 'products', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('162', 'sudu8_page', 'menu', '', '订单管理', 'orders', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('163', 'sudu8_page', 'menu', '', '用户管理', 'user', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('164', 'sudu8_page', 'menu', '', '版权参数管理', 'copyright', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('165', 'sudu8_page', 'menu', '', '优惠券管理', 'coupon', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('166', 'sudu8_page', 'page', '', '首页', '/sudu8_page/index/index', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('167', 'wn_storex_plugin_credit_mall', 'menu', '', '卡券兑换', 'couponexchange', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('168', 'wn_storex_plugin_credit_mall', 'menu', '', '真实物品兑换', 'goodsexchange', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('169', 'wn_storex_plugin_group', 'menu', '', '店铺拼团设置', 'Storexgroup', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('170', 'wn_storex_plugin_hotel_service', 'cover', '', '用户服务入口', 'hotelservice', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('171', 'wn_storex_plugin_hotel_service', 'menu', '', 'WIFI管理', 'wifimanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('172', 'wn_storex_plugin_hotel_service', 'menu', '', '电话管理', 'telmanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('173', 'wn_storex_plugin_hotel_service', 'menu', '', '客房管理', 'roommanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('174', 'wn_storex_plugin_hotel_service', 'menu', '', '订餐管理', 'foodmanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('175', 'wn_storex_plugin_printer', 'menu', '', '打印机设置', 'printermanage', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('176', 'wn_storex_plugin_printer', 'menu', '', '店铺设置', 'printerset', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('177', 'wn_storex_plugin_sms', 'menu', '', '短信消息', 'smsnotice', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('178', 'wn_storex_plugin_sms', 'menu', '', '短信接入', 'smsset', '', '0', '', '', '0');

-- ----------------------------
-- Table structure for ims_modules_plugin
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_plugin`;
CREATE TABLE `ims_modules_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `main_module` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `main_module` (`main_module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_plugin
-- ----------------------------

-- ----------------------------
-- Table structure for ims_modules_rank
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_rank`;
CREATE TABLE `ims_modules_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL,
  `rank` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_name` (`module_name`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_rank
-- ----------------------------

-- ----------------------------
-- Table structure for ims_modules_recycle
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_recycle`;
CREATE TABLE `ims_modules_recycle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modulename` (`modulename`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_recycle
-- ----------------------------

-- ----------------------------
-- Table structure for ims_music_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_music_reply`;
CREATE TABLE `ims_music_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `hqurl` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_music_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_news_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_news_reply`;
CREATE TABLE `ims_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `media_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_news_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_paycenter_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_paycenter_order`;
CREATE TABLE `ims_paycenter_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `clerk_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `clerk_type` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `uniontid` varchar(40) NOT NULL,
  `transaction_id` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT '支付方式',
  `trade_type` varchar(10) NOT NULL COMMENT '支付类型:刷卡支付,扫描支付',
  `body` varchar(255) NOT NULL COMMENT '商品信息',
  `fee` varchar(15) NOT NULL COMMENT '商品费用',
  `final_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '优惠后应付价格',
  `credit1` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '抵消积分',
  `credit1_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '积分抵消金额',
  `credit2` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '余额支付金额',
  `cash` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '线上支付金额',
  `remark` varchar(255) NOT NULL,
  `auth_code` varchar(30) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL COMMENT '付款人',
  `follow` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否关注公众号',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '线上支付状态',
  `credit_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '积分,余额的交易状态.0:未扣除,1:已扣除',
  `paytime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_paycenter_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_phoneapp_versions
-- ----------------------------
DROP TABLE IF EXISTS `ims_phoneapp_versions`;
CREATE TABLE `ims_phoneapp_versions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `version` varchar(20) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `modules` text,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `version` (`version`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_phoneapp_versions
-- ----------------------------

-- ----------------------------
-- Table structure for ims_profile_fields
-- ----------------------------
DROP TABLE IF EXISTS `ims_profile_fields`;
CREATE TABLE `ims_profile_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `unchangeable` tinyint(1) NOT NULL,
  `showinregister` tinyint(1) NOT NULL,
  `field_length` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_profile_fields
-- ----------------------------
INSERT INTO `ims_profile_fields` VALUES ('1', 'realname', '1', '真实姓名', '', '0', '1', '1', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('2', 'nickname', '1', '昵称', '', '1', '1', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('3', 'avatar', '1', '头像', '', '1', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('4', 'qq', '1', 'QQ号', '', '0', '0', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('5', 'mobile', '1', '手机号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('6', 'vip', '1', 'VIP级别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('7', 'gender', '1', '性别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('8', 'birthyear', '1', '出生生日', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('9', 'constellation', '1', '星座', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('10', 'zodiac', '1', '生肖', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('11', 'telephone', '1', '固定电话', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('12', 'idcard', '1', '证件号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('13', 'studentid', '1', '学号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('14', 'grade', '1', '班级', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('15', 'address', '1', '邮寄地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('16', 'zipcode', '1', '邮编', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('17', 'nationality', '1', '国籍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('18', 'resideprovince', '1', '居住地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('19', 'graduateschool', '1', '毕业学校', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('20', 'company', '1', '公司', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('21', 'education', '1', '学历', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('22', 'occupation', '1', '职业', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('23', 'position', '1', '职位', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('24', 'revenue', '1', '年收入', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('25', 'affectivestatus', '1', '情感状态', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('26', 'lookingfor', '1', ' 交友目的', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('27', 'bloodtype', '1', '血型', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('28', 'height', '1', '身高', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('29', 'weight', '1', '体重', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('30', 'alipay', '1', '支付宝帐号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('31', 'msn', '1', 'MSN', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('32', 'email', '1', '电子邮箱', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('33', 'taobao', '1', '阿里旺旺', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('34', 'site', '1', '主页', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('35', 'bio', '1', '自我介绍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('36', 'interest', '1', '兴趣爱好', '', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ims_qrcode
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode`;
CREATE TABLE `ims_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `extra` int(10) unsigned NOT NULL,
  `qrcid` bigint(20) NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `model` tinyint(1) unsigned NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `url` varchar(256) NOT NULL,
  `expire` int(10) unsigned NOT NULL,
  `subnum` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`),
  KEY `uniacid` (`uniacid`),
  KEY `ticket` (`ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode
-- ----------------------------

-- ----------------------------
-- Table structure for ims_qrcode_stat
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode_stat`;
CREATE TABLE `ims_qrcode_stat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `qrcid` bigint(20) unsigned NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode_stat
-- ----------------------------

-- ----------------------------
-- Table structure for ims_rule
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule`;
CREATE TABLE `ims_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `containtype` varchar(100) NOT NULL,
  `reply_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule
-- ----------------------------
INSERT INTO `ims_rule` VALUES ('1', '0', '城市天气', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('2', '0', '百度百科', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('3', '0', '即时翻译', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('4', '0', '今日老黄历', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('5', '0', '看新闻', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('6', '0', '快递查询', 'userapi', '255', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('7', '1', '个人中心入口设置', 'cover', '0', '1', '', '0');
INSERT INTO `ims_rule` VALUES ('8', '1', '微擎团队入口设置', 'cover', '0', '1', '', '0');

-- ----------------------------
-- Table structure for ims_rule_keyword
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule_keyword`;
CREATE TABLE `ims_rule_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_content` (`content`),
  KEY `idx_rid` (`rid`),
  KEY `idx_uniacid_type_content` (`uniacid`,`type`,`content`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule_keyword
-- ----------------------------
INSERT INTO `ims_rule_keyword` VALUES ('1', '1', '0', 'userapi', '^.+天气$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('2', '2', '0', 'userapi', '^百科.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('3', '2', '0', 'userapi', '^定义.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('4', '3', '0', 'userapi', '^@.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('5', '4', '0', 'userapi', '日历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('6', '4', '0', 'userapi', '万年历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('7', '4', '0', 'userapi', '黄历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('8', '4', '0', 'userapi', '几号', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('9', '5', '0', 'userapi', '新闻', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('10', '6', '0', 'userapi', '^(申通|圆通|中通|汇通|韵达|顺丰|EMS) *[a-z0-9]{1,}$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('11', '7', '1', 'cover', '个人中心', '1', '0', '1');
INSERT INTO `ims_rule_keyword` VALUES ('12', '8', '1', 'cover', '首页', '1', '0', '1');
INSERT INTO `ims_rule_keyword` VALUES ('13', '9', '1', 'cover', '代理', '1', '0', '1');

-- ----------------------------
-- Table structure for ims_site_article
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_article`;
CREATE TABLE `ims_site_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL,
  `ccate` int(10) unsigned NOT NULL,
  `template` varchar(300) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `edittime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_article
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_article_comment
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_article_comment`;
CREATE TABLE `ims_site_article_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `articleid` int(10) NOT NULL,
  `parentid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `content` text,
  `is_read` tinyint(1) NOT NULL,
  `iscomment` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `articleid` (`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_article_comment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_category`;
CREATE TABLE `ims_site_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `icon` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `ishomepage` tinyint(1) NOT NULL,
  `icontype` tinyint(1) unsigned NOT NULL,
  `css` varchar(500) NOT NULL,
  `multiid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_category
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_multi
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_multi`;
CREATE TABLE `ims_site_multi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `site_info` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `bindhost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `bindhost` (`bindhost`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_multi
-- ----------------------------
INSERT INTO `ims_site_multi` VALUES ('1', '1', '微擎团队', '1', '', '1', '');

-- ----------------------------
-- Table structure for ims_site_nav
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_nav`;
CREATE TABLE `ims_site_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `section` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` smallint(5) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `css` varchar(1000) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_nav
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_page
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_page`;
CREATE TABLE `ims_site_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `multipage` longtext NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodnum` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_page
-- ----------------------------
INSERT INTO `ims_site_page` VALUES ('1', '1', '0', '快捷菜单', '', '{\"navStyle\":\"2\",\"bgColor\":\"#f4f4f4\",\"menus\":[{\"title\":\"\\u4f1a\\u5458\\u5361\",\"url\":\".\\/index.php?c=mc&a=bond&do=card&i=1\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-credit-card\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]},{\"title\":\"\\u5151\\u6362\",\"url\":\".\\/index.php?c=activity&a=coupon&do=display&&i=1\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-money\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]},{\"title\":\"\\u4ed8\\u6b3e\",\"url\":\"\\\" data-target=\\\"#scan\\\" data-toggle=\\\"modal\\\" href=\\\"javascript:void();\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-qrcode\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":\"\"},{\"title\":\"\\u4e2a\\u4eba\\u4e2d\\u5fc3\",\"url\":\".\\/index.php?i=1&c=mc&\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-user\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]}],\"extend\":[],\"position\":{\"homepage\":true,\"usercenter\":true,\"page\":true,\"article\":true},\"ignoreModules\":[]}', '<div style=\"background-color: rgb(244, 244, 244);\" class=\"js-quickmenu nav-menu-app has-nav-0  has-nav-4\"   ><ul class=\"nav-group clearfix\"><li class=\"nav-group-item \" ><a href=\"./index.php?c=mc&a=bond&do=card&i=1\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-credit-card\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">会员卡</span></a></li><li class=\"nav-group-item \" ><a href=\"./index.php?c=activity&a=coupon&do=display&&i=1\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-money\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">兑换</span></a></li><li class=\"nav-group-item \" ><a href=\"\" data-target=\"#scan\" data-toggle=\"modal\" href=\"javascript:void();\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-qrcode\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">付款</span></a></li><li class=\"nav-group-item \" ><a href=\"./index.php?i=1&c=mc&\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-user\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">个人中心</span></a></li></ul></div>', '', '4', '1', '1440242655', '0');

-- ----------------------------
-- Table structure for ims_site_slide
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_slide`;
CREATE TABLE `ims_site_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_slide
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_store_create_account
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_store_create_account`;
CREATE TABLE `ims_site_store_create_account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `uniacid` int(10) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `endtime` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_store_create_account
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_store_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_store_goods`;
CREATE TABLE `ims_site_store_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `module` varchar(50) NOT NULL,
  `account_num` int(10) NOT NULL,
  `wxapp_num` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `slide` varchar(1000) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `module_group` int(10) NOT NULL,
  `api_num` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`),
  KEY `category_id` (`category_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_store_goods
-- ----------------------------
INSERT INTO `ims_site_store_goods` VALUES ('1', '5', '', '', '0', '0', '10.00', 'month', '', '0', '', '2', '1505976342', '', '', '1', '0');
INSERT INTO `ims_site_store_goods` VALUES ('2', '1', '万能小店酒店服务', 'wn_storex_plugin_hotel_service', '0', '0', '10.00', 'month', '', '0', 'W', '2', '1505976355', '万能小店酒店服务插件', '万能小店酒店服务插件', '0', '0');

-- ----------------------------
-- Table structure for ims_site_store_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_store_order`;
CREATE TABLE `ims_site_store_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(28) NOT NULL,
  `goodsid` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `buyerid` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `changeprice` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `uniacid` int(10) NOT NULL,
  `endtime` int(15) NOT NULL,
  `wxapp` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goodid` (`goodsid`),
  KEY `buyerid` (`buyerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_store_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_styles
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles`;
CREATE TABLE `ims_site_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles
-- ----------------------------
INSERT INTO `ims_site_styles` VALUES ('1', '1', '1', '微站默认模板_gC5C');

-- ----------------------------
-- Table structure for ims_site_styles_vars
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles_vars`;
CREATE TABLE `ims_site_styles_vars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles_vars
-- ----------------------------

-- ----------------------------
-- Table structure for ims_site_templates
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_templates`;
CREATE TABLE `ims_site_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sections` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_templates
-- ----------------------------
INSERT INTO `ims_site_templates` VALUES ('1', 'default', '微站默认模板', '', '由微擎提供默认微站模板套系', '微擎团队', 'http://we7.cc', '1', '0');
INSERT INTO `ims_site_templates` VALUES ('4', 'style31', '微赞style31', '', '由微赞提供默认微站模板套系', '微赞', 'http://bbs.012wz.com', 'drink', '0');

-- ----------------------------
-- Table structure for ims_stat_fans
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_fans`;
CREATE TABLE `ims_stat_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `new` int(10) unsigned NOT NULL,
  `cancel` int(10) unsigned NOT NULL,
  `cumulate` int(10) NOT NULL,
  `date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_fans
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_keyword
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_keyword`;
CREATE TABLE `ims_stat_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` varchar(10) NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_keyword
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_msg_history
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_msg_history`;
CREATE TABLE `ims_stat_msg_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_msg_history
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_rule
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_rule`;
CREATE TABLE `ims_stat_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_rule
-- ----------------------------

-- ----------------------------
-- Table structure for ims_stat_visit
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_visit`;
CREATE TABLE `ims_stat_visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `module` varchar(100) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `module` (`module`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_visit
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_clerks
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_clerks`;
CREATE TABLE `ims_storex_activity_clerks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `password` (`password`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_clerks
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_clerk_menu
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_clerk_menu`;
CREATE TABLE `ims_storex_activity_clerk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` int(4) NOT NULL,
  `pid` int(6) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `system` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_clerk_menu
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_exchange
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_exchange`;
CREATE TABLE `ims_storex_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL DEFAULT '',
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `extra` (`extra`(333))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_exchange
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_exchange_comment
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_exchange_comment`;
CREATE TABLE `ims_storex_activity_exchange_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `exid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `star` int(2) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_exchange_comment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_exchange_trades
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_exchange_trades`;
CREATE TABLE `ims_storex_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_exchange_trades
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_exchange_trades_shipping
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_exchange_trades_shipping`;
CREATE TABLE `ims_storex_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `num` int(11) NOT NULL,
  `iscomment` tinyint(2) NOT NULL,
  `express_type` varchar(100) NOT NULL,
  `express_number` varchar(100) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_exchange_trades_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_activity_stores
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_activity_stores`;
CREATE TABLE `ims_storex_activity_stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `source` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `message` varchar(500) NOT NULL,
  `store_base_id` int(11) NOT NULL,
  `sosomap_poi_uid` varchar(50) NOT NULL DEFAULT '',
  `card_id` varchar(50) NOT NULL DEFAULT '',
  `business_avatar` varchar(255) NOT NULL DEFAULT '',
  `license_no` varchar(30) NOT NULL DEFAULT '',
  `license_name` varchar(100) NOT NULL DEFAULT '',
  `license_image` varchar(255) NOT NULL DEFAULT '',
  `category_qualification` text NOT NULL,
  `other_files` text NOT NULL,
  `is_business` tinyint(1) NOT NULL DEFAULT '2',
  `audit_id` varchar(50) NOT NULL DEFAULT '',
  `on_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `location_id` (`location_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_activity_stores
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_admin_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_admin_logs`;
CREATE TABLE `ims_storex_admin_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `op` varchar(24) NOT NULL,
  `do` varchar(24) NOT NULL,
  `url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_admin_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_agent_apply
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_agent_apply`;
CREATE TABLE `ims_storex_agent_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `openid` varchar(50) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `orderids` longtext,
  `status` tinyint(3) DEFAULT '0',
  `applytime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `refusetime` int(11) DEFAULT '0',
  `income` decimal(10,2) DEFAULT '0.00',
  `outcome` decimal(10,2) NOT NULL DEFAULT '0.00',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `reason` varchar(50) NOT NULL DEFAULT '',
  `level` int(10) unsigned DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_agent_apply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_agent_apply_log
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_agent_apply_log`;
CREATE TABLE `ims_storex_agent_apply_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `ordersn` varchar(30) NOT NULL,
  `agentid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `time` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `mngtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_agent_apply_log
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_agent_level
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_agent_level`;
CREATE TABLE `ims_storex_agent_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `title` varchar(24) NOT NULL,
  `need` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `isdefault` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_agent_level
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_agent_log
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_agent_log`;
CREATE TABLE `ims_storex_agent_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `agentid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `goodid` int(11) NOT NULL,
  `sumprice` decimal(10,2) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_agent_log
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_article
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_article`;
CREATE TABLE `ims_storex_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `source` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `click` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT '',
  `credit` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_article
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_article_category
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_article_category`;
CREATE TABLE `ims_storex_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_bases
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_bases`;
CREATE TABLE `ims_storex_bases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `lng` decimal(10,6) DEFAULT '0.000000',
  `lat` decimal(10,6) DEFAULT '0.000000',
  `address` varchar(255) DEFAULT '',
  `location_p` varchar(50) DEFAULT '',
  `location_c` varchar(50) DEFAULT '',
  `location_a` varchar(50) DEFAULT '',
  `status` int(11) DEFAULT '0',
  `phone` varchar(255) DEFAULT '',
  `mail` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `thumborder` varchar(255) DEFAULT '',
  `description` text,
  `content` text,
  `store_info` text,
  `traffic` text,
  `thumbs` text,
  `detail_thumbs` text,
  `displayorder` int(11) DEFAULT '0',
  `store_type` int(8) NOT NULL DEFAULT '0',
  `timestart` varchar(50) NOT NULL DEFAULT '0' COMMENT '运营开始时间',
  `timeend` varchar(50) NOT NULL DEFAULT '0' COMMENT '运营结束时间',
  `distance` int(11) NOT NULL,
  `skin_style` varchar(48) NOT NULL DEFAULT 'display',
  `refund` tinyint(4) NOT NULL DEFAULT '1',
  `emails` varchar(200) NOT NULL,
  `phones` varchar(200) NOT NULL,
  `openids` varchar(200) NOT NULL,
  `market_status` int(10) unsigned NOT NULL DEFAULT '0',
  `max_replace` decimal(10,2) NOT NULL,
  `pick_up_mode` varchar(100) NOT NULL,
  `express` varchar(200) NOT NULL COMMENT '购物车统一结算运费',
  `goods_express` int(2) NOT NULL DEFAULT '1',
  `agent_status` tinyint(2) NOT NULL DEFAULT '2',
  `credit_pay` tinyint(2) NOT NULL DEFAULT '2',
  `credit_ratio` int(11) NOT NULL,
  `template` text NOT NULL,
  `color` varchar(24) NOT NULL,
  `return_info` text NOT NULL,
  `auto_receipt` int(4) NOT NULL,
  `stock_warning` int(11) NOT NULL,
  `auto_close` int(6) NOT NULL,
  `service` tinyint(2) NOT NULL DEFAULT '2',
  `cancel` tinyint(2) NOT NULL DEFAULT '2',
  `max_room_num` int(6) NOT NULL DEFAULT '0',
  `max_room_day` int(6) NOT NULL DEFAULT '0',
  `category_lv` tinyint(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_bases
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_blast_message
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_blast_message`;
CREATE TABLE `ims_storex_blast_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `type` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(600) NOT NULL,
  `status` int(11) NOT NULL,
  `clerkid` int(11) NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_blast_message
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_blast_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_blast_set`;
CREATE TABLE `ims_storex_blast_set` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL,
  `storeid` int(11) unsigned NOT NULL,
  `bg_image` varchar(500) NOT NULL,
  `tail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_blast_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_blast_stat
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_blast_stat`;
CREATE TABLE `ims_storex_blast_stat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `clerkid` int(11) NOT NULL,
  `msgid` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `date` varchar(8) NOT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_blast_stat
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_blast_user
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_blast_user`;
CREATE TABLE `ims_storex_blast_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `clerkid` int(10) unsigned NOT NULL,
  `time` int(11) DEFAULT NULL,
  `uuid` varchar(255) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `redirect_uri` varchar(500) NOT NULL,
  `wxuin` varchar(500) NOT NULL,
  `wxsid` varchar(500) NOT NULL,
  `pass_ticket` varchar(1000) NOT NULL,
  `post_url_header` varchar(800) NOT NULL,
  `synckey` varchar(1000) NOT NULL,
  `username` varchar(400) NOT NULL DEFAULT '',
  `skey` varchar(500) NOT NULL,
  `contact` longtext NOT NULL,
  `cookie` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_blast_user
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_booking_list
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_booking_list`;
CREATE TABLE `ims_storex_booking_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `booking_time` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_booking_list
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_booking_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_booking_set`;
CREATE TABLE `ims_storex_booking_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `text` text NOT NULL,
  `prompt` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_booking_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_brand
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_brand`;
CREATE TABLE `ims_storex_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_brand
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_business
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_business`;
CREATE TABLE `ims_storex_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `location_p` varchar(255) DEFAULT '',
  `location_c` varchar(255) DEFAULT '',
  `location_a` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_business
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_cart
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_cart`;
CREATE TABLE `ims_storex_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `goods` varchar(1000) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `total_price` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_cart
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_categorys
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_categorys`;
CREATE TABLE `ims_storex_categorys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `store_base_id` int(11) NOT NULL,
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `category_type` tinyint(2) NOT NULL DEFAULT '1',
  `spec` varchar(1500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_categorys
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_clerk
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_clerk`;
CREATE TABLE `ims_storex_clerk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `from_user` varchar(50) DEFAULT '',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `score` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `userbind` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `username` varchar(30) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `permission` text NOT NULL,
  `storeid` int(11) NOT NULL DEFAULT '0',
  `wn_permission` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_clerk
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_clerk_pay
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_clerk_pay`;
CREATE TABLE `ims_storex_clerk_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `clerkid` int(11) NOT NULL,
  `type` varchar(24) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_clerk_pay
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_code
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_code`;
CREATE TABLE `ims_storex_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `code` varchar(6) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '1未使用，2已使用',
  `createtime` int(10) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `send_status` tinyint(2) NOT NULL DEFAULT '1',
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_code
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_collection_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_collection_goods`;
CREATE TABLE `ims_storex_collection_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_collection_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_comment
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_comment`;
CREATE TABLE `ims_storex_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `hotelid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `comment` varchar(255) DEFAULT '',
  `goodsid` int(11) NOT NULL,
  `comment_level` tinyint(11) NOT NULL,
  `type` int(10) unsigned DEFAULT '1',
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL,
  `thumb` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_comment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_comment_clerk
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_comment_clerk`;
CREATE TABLE `ims_storex_comment_clerk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `hotelid` int(11) DEFAULT '0',
  `orderid` int(25) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `comment` varchar(255) DEFAULT '',
  `clerkid` int(11) DEFAULT '0',
  `realname` varchar(20) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_comment_clerk
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon`;
CREATE TABLE `ims_storex_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `acid` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `brand_name` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `use_custom_code` tinyint(3) NOT NULL DEFAULT '0',
  `bind_openid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `can_share` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `can_give_friend` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `get_limit` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_display` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_selfconsume` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `promotion_url_name` varchar(10) NOT NULL,
  `promotion_url` varchar(100) NOT NULL,
  `promotion_url_sub_title` varchar(10) NOT NULL,
  `source` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `dosage` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon_activity`;
CREATE TABLE `ims_storex_coupon_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` int(3) NOT NULL DEFAULT '0',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `coupons` int(11) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '‘’',
  `members` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon_give_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon_give_activity`;
CREATE TABLE `ims_storex_coupon_give_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `couponid` int(11) NOT NULL,
  `type` varchar(24) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '2',
  `goodsid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `send_num` int(11) NOT NULL,
  `limit_num` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `give_node` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon_give_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon_give_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon_give_record`;
CREATE TABLE `ims_storex_coupon_give_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `orderid` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `couponid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `node` tinyint(2) NOT NULL,
  `recordid` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon_give_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon_record`;
CREATE TABLE `ims_storex_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `granttype` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_coupon_store
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_coupon_store`;
CREATE TABLE `ims_storex_coupon_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL DEFAULT '',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_coupon_store
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_customservice
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_customservice`;
CREATE TABLE `ims_storex_customservice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `kf_account` varchar(255) DEFAULT '',
  `kf_nick` varchar(255) DEFAULT '',
  `kf_headimgurl` varchar(500) DEFAULT '',
  `kf_wx` varchar(500) DEFAULT '',
  `kf_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_customservice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_discount_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_discount_set`;
CREATE TABLE `ims_storex_discount_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `uplevel` tinyint(2) NOT NULL DEFAULT '2',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `discount` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_discount_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_dispatch
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_dispatch`;
CREATE TABLE `ims_storex_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `express` varchar(250) DEFAULT NULL,
  `default_first` int(11) DEFAULT '0',
  `default_firstprice` decimal(10,2) DEFAULT '0.00',
  `default_second` int(11) DEFAULT '0',
  `default_secondprice` decimal(10,2) DEFAULT '0.00',
  `default_nopostage` int(11) DEFAULT '0',
  `content` text,
  `calculate_type` tinyint(1) DEFAULT '1',
  `isdispatcharea` tinyint(1) DEFAULT '1',
  `selectedareas_code` text,
  `status` tinyint(1) DEFAULT '1',
  `isdefault` tinyint(1) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods`;
CREATE TABLE `ims_storex_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_base_id` int(11) DEFAULT '0',
  `weid` int(11) DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `oprice` decimal(10,2) DEFAULT '0.00',
  `cprice` decimal(10,2) DEFAULT '0.00',
  `thumbs` text,
  `device` text,
  `reserve_device` text,
  `status` int(11) DEFAULT '0',
  `sales` text,
  `can_reserve` int(11) NOT NULL DEFAULT '1',
  `can_buy` int(11) NOT NULL DEFAULT '1',
  `isshow` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `sortid` int(11) DEFAULT '0',
  `sold_num` int(11) NOT NULL DEFAULT '0',
  `store_type` int(8) NOT NULL DEFAULT '0',
  `express_set` text NOT NULL,
  `sub_title` varchar(12) NOT NULL,
  `tag` int(11) NOT NULL,
  `unit` varchar(12) NOT NULL,
  `weight` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '-1',
  `stock_control` tinyint(4) NOT NULL DEFAULT '1',
  `min_buy` int(11) NOT NULL DEFAULT '1',
  `max_buy` int(11) NOT NULL DEFAULT '-1',
  `agent_ratio` varchar(300) NOT NULL,
  `recycle` tinyint(2) NOT NULL DEFAULT '2',
  `fprice` decimal(10,2) NOT NULL,
  `fact_sold_num` int(11) NOT NULL,
  `visit_times` int(11) NOT NULL,
  `isrecommend` tinyint(4) NOT NULL DEFAULT '2',
  `isnew` tinyint(4) NOT NULL DEFAULT '2',
  `ishot` tinyint(4) NOT NULL DEFAULT '2',
  `isnopostage` tinyint(4) NOT NULL DEFAULT '2',
  `dispatchid` int(10) unsigned NOT NULL,
  `virtual` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_activity`;
CREATE TABLE `ims_storex_goods_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `nums` int(10) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `type` tinyint(1) DEFAULT '1',
  `status` int(11) DEFAULT '1',
  `is_spec` tinyint(1) DEFAULT '1',
  `specid` int(10) unsigned NOT NULL,
  `sell_nums` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_extend
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_extend`;
CREATE TABLE `ims_storex_goods_extend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `defined` text NOT NULL,
  `goodsid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `goods_table` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_extend
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_gift_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_gift_activity`;
CREATE TABLE `ims_storex_goods_gift_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type_money` decimal(10,2) NOT NULL,
  `type_goods` int(11) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `gift_goods` text NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_gift_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_package
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_package`;
CREATE TABLE `ims_storex_goods_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packageid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_package
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_profit
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_profit`;
CREATE TABLE `ims_storex_goods_profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `order_time` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_profit
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_goods_visit
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_goods_visit`;
CREATE TABLE `ims_storex_goods_visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_goods_visit
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_homepage
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_homepage`;
CREATE TABLE `ims_storex_homepage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(100) NOT NULL COMMENT '首页块类型',
  `items` longtext NOT NULL,
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `is_wxapp` tinyint(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_homepage
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_hotel
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_hotel`;
CREATE TABLE `ims_storex_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_base_id` int(11) NOT NULL,
  `weid` int(11) DEFAULT '0',
  `roomcount` int(11) DEFAULT '0',
  `device` text,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_hotel
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_market
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_market`;
CREATE TABLE `ims_storex_market` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL DEFAULT '0',
  `storeid` int(11) unsigned NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `items` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `starttime` int(11) unsigned NOT NULL,
  `endtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_market
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_mc_card
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_mc_card`;
CREATE TABLE `ims_storex_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '',
  `color` varchar(255) NOT NULL DEFAULT '',
  `background` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `format_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `format` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(512) NOT NULL DEFAULT '',
  `fields` varchar(1000) NOT NULL DEFAULT '',
  `snpos` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `business` text NOT NULL,
  `discount_type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `discount` varchar(3000) NOT NULL DEFAULT '',
  `grant` varchar(3000) NOT NULL,
  `grant_rate` varchar(20) NOT NULL DEFAULT '0',
  `offset_rate` int(10) unsigned NOT NULL DEFAULT '0',
  `offset_max` int(10) NOT NULL DEFAULT '0',
  `nums_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nums_text` varchar(15) NOT NULL,
  `nums` varchar(1000) NOT NULL DEFAULT '',
  `times_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `times_text` varchar(15) NOT NULL,
  `times` varchar(1000) NOT NULL DEFAULT '',
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `recommend_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sign_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `brand_name` varchar(128) NOT NULL DEFAULT '',
  `notice` varchar(48) NOT NULL DEFAULT '',
  `quantity` int(10) NOT NULL DEFAULT '0',
  `max_increase_bonus` int(10) NOT NULL DEFAULT '0',
  `least_money_to_use_bonus` int(10) NOT NULL DEFAULT '0',
  `source` int(1) NOT NULL DEFAULT '1',
  `card_id` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_mc_card
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_mc_card_members
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_mc_card_members`;
CREATE TABLE `ims_storex_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `openid` varchar(50) NOT NULL,
  `cid` int(10) NOT NULL DEFAULT '0',
  `cardsn` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `nums` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `fields` varchar(2500) NOT NULL,
  `binding_phone` varchar(11) NOT NULL,
  `binding_times` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_mc_card_members
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_mc_card_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_mc_card_record`;
CREATE TABLE `ims_storex_mc_card_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `model` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `tag` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_mc_card_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_mc_member_property
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_mc_member_property`;
CREATE TABLE `ims_storex_mc_member_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `property` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_mc_member_property
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_member
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_member`;
CREATE TABLE `ims_storex_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `userid` varchar(50) DEFAULT '',
  `from_user` varchar(50) DEFAULT '',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `score` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `userbind` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `clerk` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(30) DEFAULT '',
  `password` varchar(200) DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `islogin` tinyint(3) NOT NULL DEFAULT '0',
  `isauto` tinyint(1) NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `credit_password` varchar(200) NOT NULL,
  `credit_salt` varchar(8) NOT NULL,
  `password_lock` varchar(24) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `agentid` int(10) unsigned NOT NULL,
  `member_group` text NOT NULL,
  `cost_money` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_member
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_member_address
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_member_address`;
CREATE TABLE `ims_storex_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `citycode` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_member_agent
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_member_agent`;
CREATE TABLE `ims_storex_member_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `memberid` int(11) NOT NULL,
  `agentid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_member_agent
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_member_level
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_member_level`;
CREATE TABLE `ims_storex_member_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `title` varchar(24) NOT NULL,
  `ask` int(11) NOT NULL,
  `level` int(8) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `default` tinyint(2) NOT NULL DEFAULT '2',
  `g_default` tinyint(2) NOT NULL DEFAULT '2',
  `discount` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_notices
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_notices`;
CREATE TABLE `ims_storex_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `groupid` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_notices
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_notices_unread
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_notices_unread`;
CREATE TABLE `ims_storex_notices_unread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `notice_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `is_new` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_notices_unread
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_order`;
CREATE TABLE `ims_storex_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `hotelid` int(11) DEFAULT '0',
  `roomid` int(11) DEFAULT '0',
  `memberid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `remark` varchar(255) DEFAULT '',
  `btime` int(11) DEFAULT '0',
  `etime` int(11) DEFAULT '0',
  `style` varchar(255) DEFAULT '',
  `nums` int(11) DEFAULT '0',
  `oprice` decimal(10,2) DEFAULT '0.00',
  `cprice` decimal(10,2) DEFAULT '0.00',
  `info` text,
  `time` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `mode_distribute` int(11) NOT NULL,
  `order_time` int(11) NOT NULL DEFAULT '0',
  `addressid` int(11) NOT NULL,
  `goods_status` int(11) NOT NULL,
  `paytype` varchar(20) NOT NULL DEFAULT '',
  `paystatus` int(11) DEFAULT '0',
  `comment` int(3) NOT NULL DEFAULT '0',
  `msg` text,
  `mngtime` int(11) DEFAULT '0',
  `contact_name` varchar(30) NOT NULL DEFAULT '',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `sum_price` decimal(10,2) DEFAULT '0.00',
  `ordersn` varchar(30) DEFAULT '',
  `clerkcomment` int(11) DEFAULT '0',
  `track_number` varchar(64) NOT NULL,
  `express_name` varchar(50) NOT NULL,
  `coupon` int(11) NOT NULL,
  `static_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `refund_status` tinyint(2) NOT NULL,
  `roomitemid` varchar(200) NOT NULL COMMENT '房间号ID',
  `newuser` int(4) NOT NULL,
  `market_types` varchar(48) NOT NULL,
  `agentid` int(11) NOT NULL,
  `is_package` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `spec_id` int(11) NOT NULL,
  `spec_info` text NOT NULL,
  `cost_credit` decimal(10,2) NOT NULL,
  `replace_money` decimal(10,2) NOT NULL,
  `cart` text NOT NULL,
  `group_goodsid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `wechat_address` text NOT NULL,
  `express_type` varchar(100) NOT NULL DEFAULT '',
  `over_time` int(11) NOT NULL,
  `shipped_time` int(11) NOT NULL,
  `bargainid` int(11) NOT NULL,
  `clerkid` int(11) NOT NULL,
  `add_time` int(11) NOT NULL,
  `gift_goods` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_hotelid` (`hotelid`),
  KEY `indx_weid` (`weid`),
  KEY `indx_roomid` (`roomid`),
  KEY `indx_memberid` (`memberid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_order_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_order_logs`;
CREATE TABLE `ims_storex_order_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `before_change` tinyint(2) NOT NULL,
  `after_change` tinyint(2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `uid` int(10) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `clerk_type` tinyint(3) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_order_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_paycenter_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_paycenter_order`;
CREATE TABLE `ims_storex_paycenter_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `clerk_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `clerk_type` tinyint(3) unsigned NOT NULL DEFAULT '2',
  `uniontid` varchar(40) NOT NULL,
  `transaction_id` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `trade_type` varchar(10) NOT NULL,
  `body` varchar(255) NOT NULL,
  `fee` varchar(15) NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit1` int(10) unsigned NOT NULL DEFAULT '0',
  `credit1_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `credit2` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `cash` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `remark` varchar(255) NOT NULL,
  `auth_code` varchar(30) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `follow` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `paytime` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_paycenter_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_activity_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_activity_goods`;
CREATE TABLE `ims_storex_plugin_activity_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `group_activity` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `spec_cprice` text NOT NULL,
  `is_spec` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_activity_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_bargain
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_bargain`;
CREATE TABLE `ims_storex_plugin_bargain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `is_spec` tinyint(2) NOT NULL,
  `endprice` decimal(10,2) DEFAULT '0.00',
  `totaltime` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `rand` varchar(1000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_bargain
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_bargain_list
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_bargain_list`;
CREATE TABLE `ims_storex_plugin_bargain_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `bargainid` int(11) NOT NULL,
  `cprice` decimal(10,2) NOT NULL,
  `time` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `times` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_bargain_list
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_bargain_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_bargain_logs`;
CREATE TABLE `ims_storex_plugin_bargain_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `bargain_list_id` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `oprice` decimal(10,2) NOT NULL,
  `cprice` decimal(10,2) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `time` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_bargain_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_bargain_setting
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_bargain_setting`;
CREATE TABLE `ims_storex_plugin_bargain_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `rules` mediumtext NOT NULL,
  `thumbs` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_bargain_setting
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_foods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_foods`;
CREATE TABLE `ims_storex_plugin_foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sold_num` int(11) NOT NULL,
  `thumbs` text NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `foods_set` varchar(200) NOT NULL,
  `weid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_foods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_foods_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_foods_order`;
CREATE TABLE `ims_storex_plugin_foods_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `weid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `eattime` int(11) NOT NULL,
  `place` varchar(48) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `mngtime` int(11) NOT NULL,
  `foods` text NOT NULL,
  `status` int(2) NOT NULL,
  `sumprice` decimal(10,2) NOT NULL,
  `ordersn` varchar(30) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `paystatus` tinyint(2) NOT NULL,
  `paytype` varchar(20) NOT NULL,
  `foods_set` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_foods_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_foods_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_foods_set`;
CREATE TABLE `ims_storex_plugin_foods_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `place` varchar(500) NOT NULL,
  `foods_set` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_foods_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_group`;
CREATE TABLE `ims_storex_plugin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `group_activity_id` int(11) NOT NULL,
  `activity_goodsid` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `member` text NOT NULL,
  `start_time` int(11) NOT NULL,
  `over` tinyint(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_group_activity
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_group_activity`;
CREATE TABLE `ims_storex_plugin_group_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `rule` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_group_activity
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_printer
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_printer`;
CREATE TABLE `ims_storex_plugin_printer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL,
  `name` varchar(40) NOT NULL,
  `user` varchar(80) NOT NULL,
  `key` varchar(50) NOT NULL,
  `sn` varchar(100) NOT NULL,
  `header` varchar(50) NOT NULL,
  `footer` varchar(50) NOT NULL,
  `qrcode` varchar(1000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_printer
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_printer_mode
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_printer_mode`;
CREATE TABLE `ims_storex_plugin_printer_mode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL,
  `defaultid` int(10) unsigned NOT NULL,
  `print_mode` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_printer_mode
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_printer_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_printer_set`;
CREATE TABLE `ims_storex_plugin_printer_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL,
  `printerids` varchar(800) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_printer_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_print_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_print_logs`;
CREATE TABLE `ims_storex_plugin_print_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `message` varchar(800) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_print_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_room_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_room_goods`;
CREATE TABLE `ims_storex_plugin_room_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_room_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_room_item
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_room_item`;
CREATE TABLE `ims_storex_plugin_room_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `items` varchar(1000) DEFAULT '',
  `storeid` int(11) DEFAULT NULL,
  `openid` varchar(255) DEFAULT '',
  `time` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_room_item
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_smsnotice
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_smsnotice`;
CREATE TABLE `ims_storex_plugin_smsnotice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `notice` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_smsnotice
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_smsset
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_smsset`;
CREATE TABLE `ims_storex_plugin_smsset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `appkey` varchar(100) DEFAULT '',
  `appsecret` varchar(255) DEFAULT '',
  `sign` varchar(1000) DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_smsset
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_sms_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_sms_logs`;
CREATE TABLE `ims_storex_plugin_sms_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `mobile` varchar(32) NOT NULL DEFAULT '',
  `message` varchar(800) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_sms_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_tel
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_tel`;
CREATE TABLE `ims_storex_plugin_tel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `tel` varchar(100) DEFAULT '',
  `storeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_tel
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_plugin_wifi
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_plugin_wifi`;
CREATE TABLE `ims_storex_plugin_wifi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `wifi` varchar(1000) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_plugin_wifi
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_poster
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_poster`;
CREATE TABLE `ims_storex_poster` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `wait` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `params` longtext NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `reward` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_poster
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_refund_logs
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_refund_logs`;
CREATE TABLE `ims_storex_refund_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL,
  `orderid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `out_refund_no` varchar(40) NOT NULL,
  `refund_fee` decimal(10,2) NOT NULL,
  `total_fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `orderid` (`orderid`),
  KEY `storeid` (`storeid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_refund_logs
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_reply`;
CREATE TABLE `ims_storex_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_return_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_return_goods`;
CREATE TABLE `ims_storex_return_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL,
  `good` varchar(20) NOT NULL,
  `nums` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `goods_reason` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `refuse_reason` varchar(500) NOT NULL,
  `goods_status` tinyint(2) NOT NULL,
  `track_number` varchar(64) NOT NULL,
  `express_type` varchar(100) NOT NULL,
  `refund_status` tinyint(2) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `thumbs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_return_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_room
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_room`;
CREATE TABLE `ims_storex_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotelid` int(11) DEFAULT '0',
  `weid` int(11) DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `oprice` decimal(10,2) DEFAULT '0.00',
  `cprice` decimal(10,2) DEFAULT '0.00',
  `thumbs` text,
  `device` text,
  `reserve_device` text,
  `area` varchar(255) DEFAULT '',
  `floor` varchar(255) DEFAULT '',
  `smoke` varchar(255) DEFAULT '',
  `bed` varchar(255) DEFAULT '',
  `persons` int(11) DEFAULT '0',
  `bedadd` varchar(30) DEFAULT '',
  `status` int(11) DEFAULT '0',
  `can_reserve` int(11) NOT NULL DEFAULT '1',
  `can_buy` int(11) NOT NULL DEFAULT '1',
  `isshow` int(11) DEFAULT '0',
  `sales` text,
  `displayorder` int(11) DEFAULT '0',
  `area_show` int(11) DEFAULT '0',
  `floor_show` int(11) DEFAULT '0',
  `smoke_show` int(11) DEFAULT '0',
  `bed_show` int(11) DEFAULT '0',
  `persons_show` int(11) DEFAULT '0',
  `bedadd_show` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `breakfast` tinyint(3) DEFAULT '0',
  `sortid` int(11) NOT NULL DEFAULT '0',
  `sold_num` int(11) NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `service` decimal(10,2) DEFAULT '0.00',
  `store_type` int(8) NOT NULL DEFAULT '1',
  `is_house` int(11) NOT NULL DEFAULT '1',
  `express_set` text NOT NULL,
  `store_base_id` int(11) DEFAULT '0',
  `sub_title` varchar(12) NOT NULL,
  `recycle` tinyint(2) NOT NULL DEFAULT '2',
  `agent_ratio` varchar(300) NOT NULL,
  `isrecommend` tinyint(4) NOT NULL DEFAULT '2',
  `isnew` tinyint(4) NOT NULL DEFAULT '2',
  `ishot` tinyint(4) NOT NULL DEFAULT '2',
  `isnopostage` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_hotelid` (`store_base_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_room
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_room_assign
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_room_assign`;
CREATE TABLE `ims_storex_room_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `roomitemid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_room_assign
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_room_items
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_room_items`;
CREATE TABLE `ims_storex_room_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `storeid` int(10) unsigned NOT NULL DEFAULT '0',
  `roomid` int(10) unsigned NOT NULL DEFAULT '0',
  `roomnumber` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`),
  KEY `roomid` (`roomid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_room_items
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_room_price
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_room_price`;
CREATE TABLE `ims_storex_room_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `hotelid` int(11) DEFAULT '0',
  `roomid` int(11) DEFAULT '0',
  `roomdate` int(11) DEFAULT '0',
  `thisdate` varchar(255) NOT NULL DEFAULT '',
  `oprice` decimal(10,2) DEFAULT '0.00',
  `cprice` decimal(10,2) DEFAULT '0.00',
  `num` varchar(255) DEFAULT '-1',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_hotelid` (`hotelid`),
  KEY `indx_roomid` (`roomid`),
  KEY `indx_roomdate` (`roomdate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_room_price
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_sales
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_sales`;
CREATE TABLE `ims_storex_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `cumulate` decimal(10,2) DEFAULT '0.00',
  `date` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_sales
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_sales_package
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_sales_package`;
CREATE TABLE `ims_storex_sales_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `sub_title` varchar(12) NOT NULL,
  `thumb` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `express` decimal(10,2) DEFAULT '0.00',
  `goodsids` varchar(1000) DEFAULT '',
  `status` int(11) DEFAULT '0',
  `agent_ratio` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `storeid` (`storeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_sales_package
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_set`;
CREATE TABLE `ims_storex_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `user` tinyint(1) DEFAULT '0' COMMENT '用户类型0微信用户1独立用户',
  `reg` tinyint(1) DEFAULT '0' COMMENT '是否允许注册0禁止注册1允许注册',
  `bind` tinyint(1) DEFAULT '0' COMMENT '是否绑定',
  `regcontent` text COMMENT '注册提示',
  `ordertype` tinyint(1) DEFAULT '0' COMMENT '预定类型0电话预定1电话和网络预订',
  `is_unify` tinyint(1) DEFAULT '0' COMMENT '0使用各分店电话,1使用统一电话',
  `tel` varchar(20) DEFAULT '' COMMENT '统一电话',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '提醒接受邮箱',
  `mobile` varchar(32) NOT NULL DEFAULT '' COMMENT '提醒接受手机',
  `paytype1` tinyint(1) DEFAULT '0',
  `paytype2` tinyint(1) DEFAULT '0',
  `paytype3` tinyint(1) DEFAULT '0',
  `version` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0单酒店版1多酒店版',
  `location_p` varchar(50) DEFAULT '',
  `location_c` varchar(50) DEFAULT '',
  `location_a` varchar(50) DEFAULT '',
  `smscode` int(3) NOT NULL DEFAULT '0',
  `refund` int(3) NOT NULL DEFAULT '0',
  `nickname` varchar(20) NOT NULL COMMENT '提醒接收微信',
  `extend_switch` varchar(400) NOT NULL COMMENT '扩展开关',
  `source` tinyint(4) NOT NULL DEFAULT '2' COMMENT '卡券类型，1为系统卡券，2为微信卡券',
  `location` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否开启定位1开2关',
  `credit_pw` tinyint(2) NOT NULL DEFAULT '2' COMMENT '1开2关',
  `credit_pw_mode` varchar(100) NOT NULL COMMENT '余额支付密码验证方式',
  `map_key_name` varchar(50) NOT NULL COMMENT '地图秘钥名称',
  `map_key` varchar(200) NOT NULL COMMENT '腾讯地图秘钥',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_share_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_share_set`;
CREATE TABLE `ims_storex_share_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `link` varchar(200) NOT NULL,
  `goodstable` varchar(50) NOT NULL,
  `goodsid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_share_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_sign_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_sign_record`;
CREATE TABLE `ims_storex_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `credit` int(10) unsigned NOT NULL DEFAULT '0',
  `is_grant` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `year` smallint(4) NOT NULL,
  `month` smallint(2) NOT NULL,
  `day` smallint(2) NOT NULL,
  `remedy` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_sign_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_sign_set
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_sign_set`;
CREATE TABLE `ims_storex_sign_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `sign` varchar(1000) NOT NULL,
  `share` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_sign_set
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_spec
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_spec`;
CREATE TABLE `ims_storex_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_spec
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_spec_goods
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_spec_goods`;
CREATE TABLE `ims_storex_spec_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `sub_title` varchar(12) NOT NULL,
  `sp_name` varchar(255) DEFAULT NULL,
  `sp_val` varchar(1000) NOT NULL DEFAULT '',
  `goods_val` text,
  `thumb` varchar(255) DEFAULT '',
  `oprice` decimal(10,2) DEFAULT '0.00',
  `cprice` decimal(10,2) DEFAULT '0.00',
  `status` int(11) DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_spec_goods
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_spec_value
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_spec_value`;
CREATE TABLE `ims_storex_spec_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `specid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_spec_value
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_tags
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_tags`;
CREATE TABLE `ims_storex_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `title` varchar(48) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `displayorder` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_tags
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_users_permission
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_users_permission`;
CREATE TABLE `ims_storex_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `permission` varchar(10000) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_users_permission
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_virtual_record
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_virtual_record`;
CREATE TABLE `ims_storex_virtual_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `virtual_string` varchar(200) NOT NULL,
  `orderid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `result` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_virtual_record
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_wxapp_userdata
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_wxapp_userdata`;
CREATE TABLE `ims_storex_wxapp_userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_wxapp_userdata
-- ----------------------------

-- ----------------------------
-- Table structure for ims_storex_wxcard_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_storex_wxcard_reply`;
CREATE TABLE `ims_storex_wxcard_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `cid` int(10) unsigned NOT NULL DEFAULT '0',
  `brand_name` varchar(30) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_storex_wxcard_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_about
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_about`;
CREATE TABLE `ims_sudu8_page_about` (
  `uniacid` int(10) NOT NULL,
  `content` mediumtext,
  `header` int(1) DEFAULT NULL,
  `tel_box` int(1) DEFAULT NULL,
  `serv_box` int(1) DEFAULT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_about
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_base
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_base`;
CREATE TABLE `ims_sudu8_page_base` (
  `banner` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `about` text,
  `catename` varchar(255) DEFAULT '产品 & 服务',
  `catenameen` varchar(255) DEFAULT 'Products and Services',
  `copyright` varchar(255) DEFAULT '技术支持：小程序科技',
  `tel_b` varchar(255) DEFAULT NULL,
  `index_style` varchar(255) NOT NULL,
  `about_style` varchar(255) NOT NULL,
  `prolist_style` varchar(255) NOT NULL,
  `slide` varchar(2550) NOT NULL,
  `aboutCN` varchar(255) NOT NULL DEFAULT '门店介绍',
  `index_about_title` varchar(255) NOT NULL,
  `aboutCNen` varchar(255) NOT NULL DEFAULT 'About Store',
  `uniacid` int(11) NOT NULL,
  `footer_style` varchar(255) DEFAULT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `base_color2` varchar(255) DEFAULT NULL,
  `index_pro_btn` varchar(255) DEFAULT NULL,
  `index_pro_lstyle` varchar(255) DEFAULT NULL,
  `index_pro_tstyle` varchar(255) DEFAULT NULL,
  `index_pro_ts_al` varchar(255) DEFAULT NULL,
  `base_color_t` varchar(10) DEFAULT NULL,
  `c_title` int(2) DEFAULT NULL,
  `copyimg` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `v_img` varchar(255) DEFAULT NULL,
  `i_b_x_ts` int(2) DEFAULT NULL,
  `i_b_y_ts` int(2) DEFAULT NULL,
  `catename_x` varchar(255) DEFAULT NULL,
  `catenameen_x` varchar(255) DEFAULT NULL,
  `tel_box` int(1) DEFAULT NULL,
  `tabbar_bg` char(10) DEFAULT NULL,
  `tabbar_tc` char(10) DEFAULT NULL,
  `tabbar` text,
  `tabnum` int(1) DEFAULT NULL,
  `copy_do` int(1) DEFAULT NULL,
  `copy_id` int(5) DEFAULT NULL,
  `base_tcolor` varchar(10) DEFAULT NULL,
  `color_bar` char(8) DEFAULT NULL,
  `c_b_bg` varchar(255) DEFAULT NULL,
  `c_b_btn` int(1) DEFAULT NULL,
  `i_b_x_iw` int(3) DEFAULT NULL,
  `form_index` int(1) DEFAULT NULL,
  `tabbar_tca` char(10) DEFAULT NULL,
  `tabbar_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_base
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_cate
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_cate`;
CREATE TABLE `ims_sudu8_page_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `ename` varchar(255) DEFAULT NULL,
  `cdesc` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `show_i` int(1) DEFAULT NULL,
  `statue` int(1) DEFAULT NULL,
  `num` int(3) DEFAULT NULL,
  `catepic` varchar(255) DEFAULT NULL,
  `list_type` int(2) DEFAULT NULL,
  `list_style` int(2) DEFAULT NULL,
  `list_stylet` char(10) DEFAULT NULL,
  `list_tstyle` int(2) DEFAULT NULL,
  `list_tstylel` int(2) DEFAULT NULL,
  `content` mediumtext,
  `name_n` varchar(255) DEFAULT NULL,
  `pic_page_btn` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_cate
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_collect
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_collect`;
CREATE TABLE `ims_sudu8_page_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_collect
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_copyright
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_copyright`;
CREATE TABLE `ims_sudu8_page_copyright` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `copycon` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_copyright
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_coupon
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_coupon`;
CREATE TABLE `ims_sudu8_page_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `uniacid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `pay_money` varchar(255) NOT NULL DEFAULT '0',
  `btime` int(11) NOT NULL DEFAULT '0',
  `etime` int(11) NOT NULL DEFAULT '0',
  `counts` int(11) NOT NULL DEFAULT '-1',
  `xz_count` int(11) NOT NULL DEFAULT '0',
  `creattime` int(11) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  `color` char(10) NOT NULL DEFAULT '#ff6600',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_coupon_user
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_coupon_user`;
CREATE TABLE `ims_sudu8_page_coupon_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `ltime` int(11) DEFAULT '0',
  `utime` int(11) DEFAULT '0',
  `btime` int(11) DEFAULT '0',
  `etime` int(11) DEFAULT '0',
  `flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_coupon_user
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_forms
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_forms`;
CREATE TABLE `ims_sudu8_page_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `wechat` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `single` varchar(255) DEFAULT NULL,
  `checkbox` varchar(255) DEFAULT NULL,
  `content` text,
  `time` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `vtime` int(10) DEFAULT NULL,
  `sss_beizhu` varchar(255) DEFAULT NULL,
  `timef` varchar(10) DEFAULT NULL,
  `t5` varchar(255) DEFAULT NULL,
  `t6` varchar(255) DEFAULT NULL,
  `c2` varchar(255) DEFAULT NULL,
  `s2` varchar(255) DEFAULT NULL,
  `con2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_forms
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_forms_config
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_forms_config`;
CREATE TABLE `ims_sudu8_page_forms_config` (
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `forms_head` varchar(255) DEFAULT NULL,
  `forms_head_con` text,
  `forms_name` varchar(255) DEFAULT NULL,
  `forms_ename` varchar(255) DEFAULT NULL,
  `forms_title_s` varchar(255) DEFAULT NULL,
  `success` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT '姓名',
  `name_must` int(1) DEFAULT '1',
  `tel` varchar(255) DEFAULT '手机',
  `tel_use` int(1) DEFAULT '1',
  `tel_must` int(1) DEFAULT '1',
  `wechat` varchar(255) DEFAULT '微信',
  `wechat_use` int(1) DEFAULT '1',
  `wechat_must` int(1) DEFAULT '1',
  `address` varchar(255) DEFAULT '地址',
  `address_use` int(1) DEFAULT '1',
  `address_must` int(1) DEFAULT '1',
  `date` varchar(255) DEFAULT '预约时间',
  `date_use` int(1) DEFAULT '1',
  `date_must` int(1) DEFAULT '1',
  `single_n` varchar(255) DEFAULT '性别',
  `single_num` int(2) DEFAULT '2',
  `single_v` varchar(255) DEFAULT '男,女',
  `single_use` int(1) DEFAULT '1',
  `single_must` int(1) DEFAULT '1',
  `checkbox_n` varchar(255) DEFAULT '类型',
  `checkbox_num` int(2) DEFAULT '2',
  `checkbox_v` varchar(255) DEFAULT '栏目一,栏目二',
  `checkbox_use` int(1) DEFAULT '1',
  `content_n` varchar(255) DEFAULT '留言内容',
  `content_use` int(1) DEFAULT '1',
  `content_must` int(1) DEFAULT '1',
  `checkbox_must` int(1) DEFAULT '1',
  `mail_user` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_sendto` varchar(255) DEFAULT NULL,
  `forms_btn` varchar(255) DEFAULT NULL,
  `mail_user_name` varchar(255) DEFAULT NULL,
  `forms_style` int(2) DEFAULT NULL,
  `forms_inps` int(2) DEFAULT NULL,
  `subtime` int(2) DEFAULT NULL,
  `time_use` int(1) DEFAULT '1',
  `time_must` int(1) DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `tel_i` int(1) DEFAULT '0',
  `wechat_i` int(1) DEFAULT '0',
  `address_i` int(1) DEFAULT '0',
  `date_i` int(1) DEFAULT '0',
  `time_i` int(1) DEFAULT '0',
  `single_i` int(1) DEFAULT '0',
  `checkbox_i` int(1) DEFAULT '0',
  `content_i` int(1) DEFAULT '0',
  `t5` varchar(255) DEFAULT NULL,
  `t6` varchar(255) DEFAULT NULL,
  `c2` varchar(255) DEFAULT NULL,
  `s2` varchar(255) DEFAULT NULL,
  `con2` varchar(255) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_forms_config
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_nav
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_nav`;
CREATE TABLE `ims_sudu8_page_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `statue` int(1) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `style` int(2) DEFAULT NULL,
  `url` varchar(999) DEFAULT NULL,
  `box_p_tb` float DEFAULT NULL,
  `box_p_lr` float DEFAULT NULL,
  `number` int(2) DEFAULT NULL,
  `img_size` float DEFAULT NULL,
  `title_color` varchar(10) DEFAULT NULL,
  `title_position` int(1) DEFAULT NULL,
  `title_bg` varchar(15) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `name_s` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_nav
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_order
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_order`;
CREATE TABLE `ims_sudu8_page_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `yhq` varchar(255) NOT NULL,
  `true_price` varchar(255) NOT NULL,
  `creattime` int(11) NOT NULL,
  `custime` int(11) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `pro_user_name` varchar(255) DEFAULT NULL,
  `pro_user_tel` varchar(255) DEFAULT NULL,
  `pro_user_txt` text NOT NULL,
  `overtime` int(11) DEFAULT NULL,
  `reback` int(11) DEFAULT '0',
  `is_more` int(1) NOT NULL DEFAULT '0',
  `coupon` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_order
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_products
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_products`;
CREATE TABLE `ims_sudu8_page_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` mediumtext,
  `thumb` varchar(255) DEFAULT NULL,
  `ctime` int(10) DEFAULT NULL,
  `etime` int(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `uniacid` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `pcid` int(11) DEFAULT NULL,
  `type_x` int(1) DEFAULT NULL,
  `type_y` int(1) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `type_i` int(1) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `market_price` varchar(255) DEFAULT NULL,
  `label_1` int(11) DEFAULT '1',
  `label_2` int(11) DEFAULT '0',
  `sale_num` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `product_txt` text,
  `pro_flag` int(11) DEFAULT '0',
  `pro_kc` int(11) NOT NULL DEFAULT '-1',
  `pro_xz` int(11) NOT NULL DEFAULT '0',
  `sale_tnum` int(11) NOT NULL DEFAULT '0',
  `sale_type` int(11) DEFAULT '1',
  `sale_time` int(11) DEFAULT '0',
  `labels` varchar(255) DEFAULT NULL,
  `pro_flag_tel` int(1) NOT NULL DEFAULT '0',
  `pro_flag_data_name` varchar(40) DEFAULT '预约时间',
  `pro_flag_data` int(1) DEFAULT '0',
  `pro_flag_time` int(1) DEFAULT '0',
  `pro_flag_ding` int(1) DEFAULT '0',
  `is_more` int(1) DEFAULT '0',
  `more_type` text,
  `more_type_x` text,
  `more_type_num` text,
  `flag` int(1) DEFAULT '1',
  `buy_type` varchar(40) DEFAULT '购买',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_products
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_user
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_user`;
CREATE TABLE `ims_sudu8_page_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT NULL,
  `qq` varchar(15) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `gender` tinyint(1) DEFAULT '0',
  `telephone` varchar(15) DEFAULT '',
  `idcardtype` tinyint(1) DEFAULT '1',
  `idcard` varchar(30) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `zipcode` varchar(10) DEFAULT '',
  `nationality` varchar(30) DEFAULT '',
  `resideprovince` varchar(30) DEFAULT '',
  `residecity` varchar(30) DEFAULT '',
  `residedist` varchar(30) DEFAULT '',
  `residecommunity` varchar(30) DEFAULT '',
  `residesuite` varchar(30) DEFAULT '',
  `graduateschool` varchar(50) DEFAULT '',
  `company` varchar(50) DEFAULT '',
  `education` varchar(10) DEFAULT '',
  `occupation` varchar(30) DEFAULT '',
  `position` varchar(30) DEFAULT '',
  `revenue` varchar(10) DEFAULT '',
  `affectivestatus` varchar(30) DEFAULT '',
  `lookingfor` varchar(255) DEFAULT '',
  `bloodtype` varchar(5) DEFAULT '',
  `height` varchar(5) DEFAULT '',
  `weight` varchar(5) DEFAULT '',
  `alipay` varchar(30) DEFAULT '',
  `msn` varchar(30) DEFAULT '',
  `taobao` varchar(30) DEFAULT '',
  `site` varchar(30) DEFAULT '',
  `bio` text,
  `interest` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_user
-- ----------------------------

-- ----------------------------
-- Table structure for ims_sudu8_page_wxapps
-- ----------------------------
DROP TABLE IF EXISTS `ims_sudu8_page_wxapps`;
CREATE TABLE `ims_sudu8_page_wxapps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `type_i` int(1) NOT NULL,
  `appId` varchar(20) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_sudu8_page_wxapps
-- ----------------------------

-- ----------------------------
-- Table structure for ims_superman_home_kv
-- ----------------------------
DROP TABLE IF EXISTS `ims_superman_home_kv`;
CREATE TABLE `ims_superman_home_kv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skey` varchar(255) NOT NULL DEFAULT '',
  `svalue` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_skey` (`skey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_superman_home_kv
-- ----------------------------

-- ----------------------------
-- Table structure for ims_system_stat_visit
-- ----------------------------
DROP TABLE IF EXISTS `ims_system_stat_visit`;
CREATE TABLE `ims_system_stat_visit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `modulename` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_system_stat_visit
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account`;
CREATE TABLE `ims_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `default_acid` int(10) unsigned NOT NULL,
  `rank` int(10) DEFAULT NULL,
  `title_initial` varchar(1) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account
-- ----------------------------
INSERT INTO `ims_uni_account` VALUES ('1', '-1', '智放科技', '一个朝气蓬勃的团队', '1', null, '');

-- ----------------------------
-- Table structure for ims_uni_account_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_group`;
CREATE TABLE `ims_uni_account_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account_menus
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_menus`;
CREATE TABLE `ims_uni_account_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `menuid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL,
  `group_id` int(10) NOT NULL,
  `client_platform_type` tinyint(3) unsigned NOT NULL,
  `area` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `menuid` (`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_menus
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_account_modules
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_modules`;
CREATE TABLE `ims_uni_account_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `settings` text NOT NULL,
  `shortcut` tinyint(1) unsigned NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_modules
-- ----------------------------
INSERT INTO `ims_uni_account_modules` VALUES ('1', '1', 'basic', '1', '', '0', '0');
INSERT INTO `ims_uni_account_modules` VALUES ('2', '1', 'news', '1', '', '0', '0');
INSERT INTO `ims_uni_account_modules` VALUES ('3', '1', 'music', '1', '', '0', '0');
INSERT INTO `ims_uni_account_modules` VALUES ('4', '1', 'userapi', '1', '', '0', '0');
INSERT INTO `ims_uni_account_modules` VALUES ('5', '1', 'recharge', '1', '', '0', '0');

-- ----------------------------
-- Table structure for ims_uni_account_users
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_users`;
CREATE TABLE `ims_uni_account_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `role` varchar(255) NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`uid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_users
-- ----------------------------

-- ----------------------------
-- Table structure for ims_uni_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_group`;
CREATE TABLE `ims_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `modules` text NOT NULL,
  `templates` varchar(5000) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `owner_uid` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_group
-- ----------------------------
INSERT INTO `ims_uni_group` VALUES ('1', '体验套餐服务', 'a:11:{i:0;s:10:\"we7_coupon\";i:1;s:9:\"wn_storex\";i:2;s:30:\"wn_storex_plugin_hotel_service\";i:3;s:11:\"ewei_shopv2\";i:4;s:28:\"wn_storex_plugin_credit_mall\";i:5;s:24:\"wn_storex_plugin_printer\";i:6;s:20:\"wn_storex_plugin_sms\";i:7;s:17:\"zofui_chickenwish\";i:8;s:24:\"wn_storex_plugin_bargain\";i:9;s:10:\"sudu8_page\";i:10;s:22:\"wn_storex_plugin_group\";}', 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";}', '0', '0');

-- ----------------------------
-- Table structure for ims_uni_settings
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_settings`;
CREATE TABLE `ims_uni_settings` (
  `uniacid` int(10) unsigned NOT NULL,
  `passport` varchar(200) NOT NULL,
  `oauth` varchar(100) NOT NULL,
  `jsauth_acid` int(10) unsigned NOT NULL,
  `uc` varchar(500) NOT NULL,
  `notify` varchar(2000) NOT NULL,
  `creditnames` varchar(500) NOT NULL,
  `creditbehaviors` varchar(500) NOT NULL,
  `welcome` varchar(60) NOT NULL,
  `default` varchar(60) NOT NULL,
  `default_message` varchar(2000) NOT NULL,
  `shortcuts` text NOT NULL,
  `payment` text NOT NULL,
  `stat` varchar(300) NOT NULL,
  `default_site` int(10) unsigned DEFAULT NULL,
  `sync` tinyint(3) unsigned NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `tplnotice` varchar(1000) NOT NULL,
  `grouplevel` tinyint(3) unsigned NOT NULL,
  `mcplugin` varchar(500) NOT NULL,
  `exchange_enable` tinyint(3) unsigned NOT NULL,
  `coupon_type` tinyint(3) unsigned NOT NULL,
  `menuset` text NOT NULL,
  `statistics` varchar(100) NOT NULL DEFAULT '',
  `bind_domain` varchar(200) NOT NULL DEFAULT '',
  `comment_status` tinyint(1) NOT NULL,
  `reply_setting` tinyint(4) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_settings
-- ----------------------------
INSERT INTO `ims_uni_settings` VALUES ('1', 'a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}', 'a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}', '0', 'a:1:{s:6:\"status\";i:0;}', 'a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}', 'a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}', 'a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}', '', '', '', '', 'a:4:{s:6:\"credit\";a:3:{s:6:\"switch\";b:0;s:15:\"recharge_switch\";b:0;s:10:\"pay_switch\";b:0;}s:6:\"alipay\";a:6:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";s:15:\"recharge_switch\";b:0;s:10:\"pay_switch\";b:0;}s:6:\"wechat\";a:7:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";s:15:\"recharge_switch\";b:0;s:10:\"pay_switch\";b:0;}s:8:\"delivery\";a:3:{s:6:\"switch\";b:0;s:15:\"recharge_switch\";b:0;s:10:\"pay_switch\";b:0;}}', '', '1', '0', '', '', '0', '', '0', '0', '', '', '', '0', '0');

-- ----------------------------
-- Table structure for ims_uni_verifycode
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_verifycode`;
CREATE TABLE `ims_uni_verifycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `verifycode` varchar(6) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_verifycode
-- ----------------------------

-- ----------------------------
-- Table structure for ims_userapi_cache
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_cache`;
CREATE TABLE `ims_userapi_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_cache
-- ----------------------------

-- ----------------------------
-- Table structure for ims_userapi_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_reply`;
CREATE TABLE `ims_userapi_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL,
  `apiurl` varchar(300) NOT NULL,
  `token` varchar(32) NOT NULL,
  `default_text` varchar(100) NOT NULL,
  `cachetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_reply
-- ----------------------------
INSERT INTO `ims_userapi_reply` VALUES ('1', '1', '\"城市名+天气\", 如: \"北京天气\"', 'weather.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('2', '2', '\"百科+查询内容\" 或 \"定义+查询内容\", 如: \"百科姚明\", \"定义自行车\"', 'baike.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('3', '3', '\"@查询内容(中文或英文)\"', 'translate.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('4', '4', '\"日历\", \"万年历\", \"黄历\"或\"几号\"', 'calendar.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('5', '5', '\"新闻\"', 'news.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('6', '6', '\"快递+单号\", 如: \"申通1200041125\"', 'express.php', '', '', '0');

-- ----------------------------
-- Table structure for ims_users
-- ----------------------------
DROP TABLE IF EXISTS `ims_users`;
CREATE TABLE `ims_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `joindate` int(10) unsigned NOT NULL,
  `joinip` varchar(15) NOT NULL,
  `lastvisit` int(10) unsigned NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `owner_uid` int(10) NOT NULL,
  `founder_groupid` tinyint(4) NOT NULL,
  `register_type` tinyint(3) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `welcome_link` tinyint(4) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_bind
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_bind`;
CREATE TABLE `ims_users_bind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bind_sign` varchar(50) NOT NULL DEFAULT '',
  `third_type` tinyint(4) NOT NULL,
  `third_nickname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `bind_sign` (`bind_sign`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_bind
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_failed_login
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_failed_login`;
CREATE TABLE `ims_users_failed_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `username` varchar(32) NOT NULL,
  `count` tinyint(1) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_username` (`ip`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_failed_login
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_founder_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_founder_group`;
CREATE TABLE `ims_users_founder_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  `maxwebapp` int(10) NOT NULL,
  `maxphoneapp` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_founder_group
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_group
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_group`;
CREATE TABLE `ims_users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  `owner_uid` int(10) NOT NULL,
  `maxwebapp` int(10) NOT NULL,
  `maxphoneapp` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_group
-- ----------------------------
INSERT INTO `ims_users_group` VALUES ('1', '体验用户组', 'a:1:{i:0;i:1;}', '1', '1', '0', '0', '0', '0', '0');
INSERT INTO `ims_users_group` VALUES ('2', '白金用户组', 'a:1:{i:0;i:1;}', '2', '2', '0', '0', '0', '0', '0');
INSERT INTO `ims_users_group` VALUES ('3', '黄金用户组', 'a:1:{i:0;i:1;}', '3', '3', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for ims_users_invitation
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_invitation`;
CREATE TABLE `ims_users_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `fromuid` int(10) unsigned NOT NULL,
  `inviteuid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_invitation
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_permission
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_permission`;
CREATE TABLE `ims_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(100) NOT NULL,
  `permission` varchar(10000) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_permission
-- ----------------------------

-- ----------------------------
-- Table structure for ims_users_profile
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_profile`;
CREATE TABLE `ims_users_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(15) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fakeid` varchar(30) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `workerid` varchar(64) NOT NULL,
  `edittime` int(10) NOT NULL,
  `is_send_mobile_status` tinyint(3) NOT NULL,
  `send_expire_status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_profile
-- ----------------------------

-- ----------------------------
-- Table structure for ims_video_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_video_reply`;
CREATE TABLE `ims_video_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_video_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_voice_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_voice_reply`;
CREATE TABLE `ims_voice_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_voice_reply
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wechat_attachment
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_attachment`;
CREATE TABLE `ims_wechat_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `module_upload_dir` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `media_id` (`media_id`),
  KEY `acid` (`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wechat_news
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_news`;
CREATE TABLE `ims_wechat_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned DEFAULT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `thumb_media_id` varchar(60) NOT NULL,
  `thumb_url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_source_url` varchar(200) NOT NULL,
  `show_cover_pic` tinyint(3) unsigned NOT NULL,
  `url` varchar(200) NOT NULL,
  `displayorder` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `attach_id` (`attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_news
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxapp_general_analysis
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxapp_general_analysis`;
CREATE TABLE `ims_wxapp_general_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `session_cnt` int(10) NOT NULL,
  `visit_pv` int(10) NOT NULL,
  `visit_uv` int(10) NOT NULL,
  `visit_uv_new` int(10) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `stay_time_uv` varchar(10) NOT NULL,
  `stay_time_session` varchar(10) NOT NULL,
  `visit_depth` varchar(10) NOT NULL,
  `ref_date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `ref_date` (`ref_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxapp_general_analysis
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxapp_versions
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxapp_versions`;
CREATE TABLE `ims_wxapp_versions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `version` varchar(10) NOT NULL,
  `modules` varchar(1000) NOT NULL,
  `design_method` tinyint(1) NOT NULL,
  `template` int(10) NOT NULL,
  `redirect` varchar(300) NOT NULL,
  `quickmenu` varchar(2500) NOT NULL,
  `createtime` int(10) NOT NULL,
  `connection` varchar(1000) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` int(2) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `appjson` text NOT NULL,
  `default_appjson` text NOT NULL,
  `use_default` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `version` (`version`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxapp_versions
-- ----------------------------

-- ----------------------------
-- Table structure for ims_wxcard_reply
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxcard_reply`;
CREATE TABLE `ims_wxcard_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxcard_reply
-- ----------------------------
";
$dat = array();
$dat['datas'] = $datas;
return $dat;