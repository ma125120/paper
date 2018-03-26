/*管理员表*/
CREATE TABLE IF NOT EXISTS `admin` (
	`id` int  NOT NULL AUTO_INCREMENT,
	`username` varchar(40) NOT NULL DEFAULT 'root' COMMENT '用户名',
	`password` varchar(50)  NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED  COMMENT '删除时间',
	PRIMARY KEY `id`(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*文件表*/
CREATE TABLE IF NOT EXISTS `file`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL DEFAULT '' COMMENT '文件名',
	`title` varchar(100)  NOT NULL DEFAULT '' COMMENT '文件标题',
	`content` varchar(100)  NOT NULL DEFAULT '' COMMENT '文件内容或链接',
	`student` varchar(100)  NOT NULL DEFAULT '' COMMENT '学生', 
	`teacher` varchar(100)  NOT NULL DEFAULT '' COMMENT '教师',
	`type` int(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '类型，开题，中期，毕业',
	`score` int(2) UNSIGNED  NOT NULL DEFAULT '' COMMENT '成绩',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED  COMMENT '删除时间',
	PRIMARY KEY `id`(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='文件表';

/*教师表*/
CREATE TABLE IF NOT EXISTS `teacher`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` varchar(40) NOT NULL DEFAULT '' COMMENT '用户名/职工号',
	`password` varchar(50)  NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
	`real_name` varchar(24)  NOT NULL DEFAULT '' COMMENT '真实姓名',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED  COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED  COMMENT '删除时间',
	PRIMARY KEY `id`(`id`),
	UNIQUE INDEX `username`(`username`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='教师表';

/*学生表*/
CREATE TABLE IF NOT EXISTS `student`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` varchar(40) NOT NULL DEFAULT '' COMMENT '用户名/学号',
	`password` varchar(50)  NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e' COMMENT '密码',
	`real_name` varchar(24)  NOT NULL DEFAULT '' COMMENT '真实姓名',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED  COMMENT '删除时间',
	PRIMARY KEY `id`(`id`),
	UNIQUE INDEX `username`(`username`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='学生表';

/*选题表*/
CREATE TABLE IF NOT EXISTS `select_topic`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` varchar(40) NOT NULL DEFAULT '' COMMENT '标题',
	`content` varchar(50)  NOT NULL DEFAULT '' COMMENT '内容',
	`upload_user` varchar(50)  NOT NULL DEFAULT '' COMMENT '上传者',
	`student` varchar(50)  NOT NULL DEFAULT '' COMMENT '学生',
	`status` int(1)  NOT NULL DEFAULT '0' COMMENT '审核状态',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED COMMENT '删除时间',
	PRIMARY KEY `id`(`id`),
	UNIQUE INDEX `student`(`student`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='选题表';

/*交流表*/
CREATE TABLE IF NOT EXISTS `question`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`content` MEDIUMTEXT  NOT NULL DEFAULT '' COMMENT '提问内容',
	`reply_content` MEDIUMTEXT  NOT NULL DEFAULT '' COMMENT '回复内容',
	`student` varchar(50)  NOT NULL DEFAULT '' COMMENT '学生',
	`teacher` varchar(50)  NOT NULL DEFAULT '' COMMENT '教师',
	`status` int(1)  NOT NULL DEFAULT '0' COMMENT '是否回复',
	`reply_time` varchar(24) NOT NULL DEFAULT '0' COMMENT '回复时间',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED  COMMENT '删除时间',
	PRIMARY KEY `id`(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='交流表';

INSERT INTO admin(username) values('root');
/*公告*/
CREATE TABLE IF NOT EXISTS `notice`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT,
	`title` varchar(40) NOT NULL DEFAULT '' COMMENT '标题',
	`content` varchar(50)  NOT NULL DEFAULT '' COMMENT '内容',
	`upload_user` varchar(50)  NOT NULL DEFAULT '' COMMENT '上传者',
	`create_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
	`update_time` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
	`delete_time` int(10) UNSIGNED COMMENT '删除时间',
	PRIMARY KEY `id`(`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='公告';


