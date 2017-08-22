<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11 0011
 * Time: 9:03
 */
include 'ConnectDB.php';

function table_name(){
    return 'hb_product';
}

/*从产品中获取所有优选*/
function db_get_all_optimization(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} WHERE `is_optimization`='1'";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}

/*按id排序*/
function optimization_orderby_product_id(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} WHERE `is_optimization`='1' order by `product_id`";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}

/*按价格排序升序*/
function optimization_orderby_price(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} WHERE `is_optimization`='1' order by `origin_price`";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}

/*按价格排序降序*/
function optimization_orderby_price_desc(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} WHERE `is_optimization`='1' order by `origin_price` DESC";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}

/*按销量排序升序*/
function optimization_orderby_sell_num(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from (select left(product_id,sell_num) product_id1,sum(sell_num) sell_num from hb_product_style group by left(product_id,sell_num) order by sum(sell_num)) as a,(select * from hb_product) as b where a.product_id1=b.product_id order by a.sell_num";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}

/*按销量排序降序*/
function optimization_orderby_sell_num_desc(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from (select left(product_id,sell_num) product_id1,sum(sell_num) sell_num from hb_product_style group by left(product_id,sell_num) order by sum(sell_num)) as a,(select * from hb_product) as b where a.product_id1=b.product_id order by a.sell_num DESC";
    $optimizationInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $optimizationInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $optimizationInfos[$i] = $info;
        $i++;
    }
    return $optimizationInfos;
}
