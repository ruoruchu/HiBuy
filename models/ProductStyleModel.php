<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 19:00
 */
include "ConnectDB.php";

function table_name(){
    return "hb_product_style";
}

function table_name1(){
    return "hb_product";
}

/*增加商品样式*/
function db_add_product_style($product_id,$color_id,$size_id,$stock,$sell_num){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "insert into ${tablename}(`product_id`,`color_id`,`size_id`,`stock`,`sell_num`)VALUES ('${product_id}','${color_id}','${size_id}','${stock}','${sell_num}')";
    mysqli_query($sqllink, $sqlStr);
    return true;
}

/*获取product_id*/
function db_get_product_id(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $tablename1 = table_name1();
    $sqlStr = "select * from ${tablename1}";
    $productIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $productIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productIdInfo[$i] = $info;
        $i++;
    }
    return $productIdInfo;
}

/*获取color_id*/
function db_get_color_id(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from `hb_color`";
    $colorIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $colorIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $colorIdInfo[$i] = $info;
        $i++;
    }
    return $colorIdInfo;
}

/*获取size_id*/
function db_get_size_id(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from `hb_size`";
    $sizeIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $sizeIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeIdInfo[$i] = $info;
        $i++;
    }
    return $sizeIdInfo;
}

/*获取所有商品样式*/
function db_get_all_product_style()
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename},`hb_product`,`hb_color`,`hb_size` WHERE ${tablename}.product_id = hb_product.product_id and ${tablename}.color_id = hb_color.color_id and ${tablename}.size_id = hb_size.size_id order by ${tablename}.product_id";
    $productStyleInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $productStyleInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productStyleInfos[$i] = $info;
        $i++;
    }
    return $productStyleInfos;
}

/*** 删除某一商品样式*/
function db_delete_one_product_style($productStyle_id)
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "delete from ${tablename} where `productStyle_id`=${productStyle_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}

/**
 * 获取某一商品样式
 */
function db_get_one_product_style($productStyle_id)
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "select * from ${tablename} where  productStyle_id=${productStyle_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/*修改商品样式*/
function db_update_one_product_style($productStyle_id, $product_id,$color_id,$size_id,$stock,$sell_num){
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "update ${tablename} set `product_id`='${product_id}', `color_id`='${color_id}', `size_id`='${size_id}', `stock`='${stock}', `sell_num`='${sell_num}' where `productStyle_id`=${productStyle_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}