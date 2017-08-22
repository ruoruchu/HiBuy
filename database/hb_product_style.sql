/**
    表名: hb_product_style
    数据库: hibuy
    描述: 商品样式表
    作者: kingphp
    建表时间: 2017-07-28
*/
CREATE TABLE `hb_product_style`
(
  `productStyle_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `product_id` INT unsigned NOT NULL DEFAULT 0,
  `color_id` INT NOT NULL DEFAULT 0,
  `size_id` INT NOT NULL DEFAULT 0,
  `stock` INT NOT NULL DEFAULT 0,
  `sell_num` INT NOT NULL DEFAULT 0,
  FOREIGN KEY(`product_id`) REFERENCES hb_product(`product_id`) ON DELETE CASCADE,
  FOREIGN KEY(`color_id`) REFERENCES hb_color(`color_id`) ON DELETE CASCADE,
  FOREIGN KEY(`size_id`) REFERENCES hb_size(`size_id`) ON DELETE CASCADE
)engine=innodb DEFAULT charset=utf8;