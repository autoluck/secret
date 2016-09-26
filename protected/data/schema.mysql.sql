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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '$2y$10$/2NhoV2e6uISms4KJ23R9OBVmahDi.PyjSLZVLqBMhvyn7SxtcjPW', '847837639@qq.com', '1469969057', '1474814900', '1');
INSERT INTO `admin_user` VALUES ('4', 'user', '$2y$10$G4TY8qVA0whbN56uxzWQ9OFnqmSXXGzU8ZhVNRlyyq0pxYFuGX7TG', '', '1473343604', '1473949057', '1');

drop table if exists `auth_assignment`;
drop table if exists `auth_item_child`;
drop table if exists `auth_item`;

create table `auth_item`
(
   `name`                 varchar(64) not null,
   `type`                 integer not null,
   `description`          text,
   `bizrule`              text,
   `data`                 text,
   primary key (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `auth_item_child`
(
   `parent`               varchar(64) not null,
   `child`                varchar(64) not null,
   primary key (`parent`,`child`),
   foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
   foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `auth_assignment`
(
   `itemname`             varchar(64) not null,
   `userid`               varchar(64) not null,
   `bizrule`              text,
   `data`                 text,
   primary key (`itemname`,`userid`),
   foreign key (`itemname`) references `auth_item` (`name`) on delete cascade on update cascade
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
-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '1', null, 'N;');
INSERT INTO `auth_assignment` VALUES ('user', '1', null, 'N;');