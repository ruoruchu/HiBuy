/**
    表名: hb_switchable
    数据库: hibuy
    描述: 轮播图
    作者: kingphp
    建表时间: 2017-08-10

    category_name: 图片名称,
    category_img: 轮播的图片
    order: 轮播顺序
*/
CREATE TABLE `hb_switchable`
(
  `switchable_id` INT NOT NULL auto_increment,
  `switchable_name` VARCHAR(16) NOT NULL DEFAULT '',
  `switchable_img` VARCHAR(520) NOT NULL DEFAULT '',
  `order` INT NOT NULL DEFAULT 0,
  PRIMARY KEY(`switchable_id`)
)engine=innodb DEFAULT charset=utf8;