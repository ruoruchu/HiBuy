/**
    表名：hb_shape
    数据库名：hibuy
    描述：商品的尺寸
    作者：kingphp
    时间：2017年8月7日14:59:16
*/

CREATE TABLE `hb_shape`(
  `shape_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `shape_name` VARCHAR(32) NOT NULL ,
  `remark` VARCHAR(32)
)ENGINE = innodb DEFAULT CHARSET =utf8;