/**
    表名: hb_hot
    数据库: hibuy
    描述: 今日热点
    作者: kingphp
    建表时间: 2017-08-15

*/
CREATE TABLE `hb_hot`
(
  `hot_id` INT NOT NULL auto_increment,
  `hot_title` VARCHAR(65532),
  `hot_context` TEXT,
  PRIMARY KEY(`hot_id`)
)engine=innodb DEFAULT charset=utf8;