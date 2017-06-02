-- 删除之前存在的数据库
drop database massage;

-- 创建推拿数据库
create database massage;

-- 使用当前数据库
use massage;

-- 创建用户表
create table user(
	id int primary key auto_increment comment '用户自增长id',
	name char(100) comment '用户名',
	tel char(100) not null default '' comment '手机号',
	openid char(100) not null default '' comment '微信号',
	affiliationId int not null default 0 comment '手机归属地ID', 
	regionId int not null comment '头像ID',
	regionId int not null comment '地址ID'
);

-- 创建手机号归属地
create table affiliation(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) comment '地址名'
);

-- 创建技师表
create table technician(
	id int primary key auto_increment comment '用户自增长id',
	`name` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '技师姓名',
	`tel` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '技师手机号',
	`password` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '技师密码',
	`sum` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '接单总数',
	`gender` ENUM('女', '男') NOT NULL DEFAULT '女' COMMENT '技师性别',
	`native_place` TEXT NOT NULL COMMENT '技师籍贯',
	`idcard` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '技师身份证号',
	`age_id` INT NOT NULL COMMENT '技师年龄所属阶段ID',
	`age` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '技师年龄',
	`experience` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '技师的经验,单位,年',
	`experience_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '技师经验的年段ID',
	`region_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '地区ID',
	`portrait_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '头像ID',
	`identity_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '身份证ID'
);

-- 创建技能信息表
create table technician_skill(
	id int primary key auto_increment comment '信息自增长id',
	skill_id int comment '技能名称',
	technician_id int comment '技能名称'
);

-- 创建技能表
create table skill(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null comment '技能名称'
);

-- 添加技能信息
insert into skill (name) values ("按摩");
insert into skill (name) values ("足疗");
insert into skill (name) values ("推背");
insert into skill (name) values ("全身SPA");

-- 创建经验表
create table experience(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null comment '经验年段'
);

-- 添加经验列表
insert into experience (name) values("0-2年");
insert into experience (name) values("2-4年");
insert into experience (name) values("4-6年");
insert into experience (name) values("6年以上");

-- 创建年龄段表
create table age(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null comment '年龄段'
);

-- 添加年龄段信息
insert into  age (name) values("18-22"); 
insert into  age (name) values("23-26"); 
insert into  age (name) values("27-32"); 
insert into  age (name) values("32-50");

-- 创建酒店信息表
create table grogshop(
	id int primary key auto_increment comment '用户自增长id',
	name char(100) comment '酒店名称',
	tel char(100) not null comment '手机号',
	fixedtel char(100) not null comment '固定电话',
	affiliationId int not null comment '手机归属地ID', 
	openid char(100) not null comment '微信号',
	password char(100) not null comment '密码',
	regionId int not null comment '地址ID',
	address text comment '详细地址',
	grogshopUserId int not null comment '负责人ID'
);

-- 创建酒店负责人信息表
create table grogshop_user(
	id int primary key auto_increment comment '自增长id',
	username char(100) not null unique key comment '负责人名',
	idcard char(100) not null unique key comment '身份证号',
	`picture_id` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '身份证ID'
);

-- 创建相关照片表
create table picture(
	id int primary key auto_increment comment '照片自增长id',
	path text comment '图片路径',
	pictureTypeId int not null comment '图片种类'
);

-- 创建图片种类列表
create table pictureType(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null unique key comment '状态名'
);

-- 添加图片种类信息
insert into (name) values ("营业执照");
insert into (name) values ("酒店照片");
insert into (name) values ("身份证");
insert into (name) values ("用户头像");
insert into (name) values ("微信二维码");

-- 创建订单列表
create table indent(
	id int primary key auto_increment comment '订单自增长id',
	userId char(100) not null comment '客户ID',
	technicianId int not null comment '技师ID',
	itemId int not null comment '服务项目ID',
	regionId int not null comment '地址ID',
	indentTypeId int not null comment '订单状态',
	address text comment '详细地址',
	addtime int not null comment '下单时间'
);

-- 创建订单状态列表
create table indentType(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null unique key comment '状态名'
);

-- 添加订单状态数据
insert into indentType (name) values ("待付款");
insert into indentType (name) values ("待确认");
insert into indentType (name) values ("待评价");
insert into indentType (name) values ("退款/售后");

--创建服务项目
create table item(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null unique key comment '状态名',
	duration int not null comment '服务时长,单位分钟',
	cost int not null comment '服务价格,单位元',
	intro text not null comment '项目简介',
	part text not null comment '针对部位',
	effect text not null comment '预期效果',
	notice text not null comment '预约须知'
);

-- 添加项目数据
insert into (name,duration,cost,intro,part,effect,notice) values ("全身理疗",45,180,"哈哈哈哈","哈哈哈哈","哈哈哈哈","哈哈哈哈");

-- 创建评论列表
create table discuss(
	id int primary key auto_increment comment '信息自增长id',
	reviewerId int comment '被评论者ID',
	criticsId int comment '评论者ID',
	message text comment '评论信息',
	level int comment '评价星级',
);

-- 创建地区表
create table region(
	id int primary key auto_increment comment '信息自增长id',
	name char(100) not null comment '地区名称',
	level int not null default 0 comment '地区等级',
	upid int not null comment '上级地区ID'
);

