DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `created` int(11) NOT NULL DEFAULT '0',
  `updated` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '$2y$10$/2NhoV2e6uISms4KJ23R9OBVmahDi.PyjSLZVLqBMhvyn7SxtcjPW', '847837639@qq.com', '1469969057', '1474814900', '1');
INSERT INTO `admin_user` VALUES ('4', 'user', '$2y$10$G4TY8qVA0whbN56uxzWQ9OFnqmSXXGzU8ZhVNRlyyq0pxYFuGX7TG', '', '1473343604', '1473949057', '1');

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', null, 'N;');
INSERT INTO `auth_assignment` VALUES ('user', '1', null, 'N;');

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '2', '管理员', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/default/index', '1', '工作台', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/role/del', '0', '删除角色', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/role/edit', '0', '编辑角色', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/role/index', '1', '角色', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/user/del', '0', '删除用户', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/user/edit', '0', '编辑用户', null, 'N;');
INSERT INTO `auth_item` VALUES ('admin/user/index', '1', '用户', null, 'N;');
INSERT INTO `auth_item` VALUES ('user', '2', '用户', null, 'N;');

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/default/index');
INSERT INTO `auth_item_child` VALUES ('user', 'admin/default/index');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/role/del');
INSERT INTO `auth_item_child` VALUES ('admin/role/index', 'admin/role/del');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/role/edit');
INSERT INTO `auth_item_child` VALUES ('admin/role/index', 'admin/role/edit');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/role/index');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/user/del');
INSERT INTO `auth_item_child` VALUES ('admin/user/index', 'admin/user/del');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/user/edit');
INSERT INTO `auth_item_child` VALUES ('admin/user/index', 'admin/user/edit');
INSERT INTO `auth_item_child` VALUES ('admin', 'admin/user/index');