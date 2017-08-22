<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 16:15
 */
include_once "ConnectDB.php";

function table_name2(){
    return 'hb_popular_category';
}

//增加流行类别
function db_add_popularCategory($popular_category_name,$popular_category_img){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "insert into ${tablename} (`popular_category_name`,`popular_category_img`) VALUES ('$popular_category_name','$popular_category_img')";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

//获取所有流行类别
function db_get_all_popularCategory(){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "select * from ${tablename}";
    $popularCategoryInfos = [];
    $i=0;
    $result = mysqli_query($sqllink,$sqlStr);
    if(empty($result)){
        return $popularCategoryInfos;
    }
    while ($info = mysqli_fetch_assoc($result)){
        $popularCategoryInfos[]=$info;
        $i++;
    }
    return $popularCategoryInfos;
}

//删除某条流行类别
function db_delete_one_popularCategory($popular_category_id){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "delete from ${tablename} WHERE `popular_category_id`='$popular_category_id'";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

//修改某条流行类别
function db_update_one_popularCategory($popular_category_id,$popular_category_name,$popular_category_img){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "update ${tablename} set `popular_category_name`='${popular_category_name}',`popular_category_img`='' where `popular_category_id`=${popular_category_id}";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

function db_get_one_popularCategory($popular_category_id){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "select * from ${tablename} WHERE `popular_category_id`='$popular_category_id'";
    $result = mysqli_query($sqllink,$sqlStr);
    if (empty($result)){
        return false;
    }
    $info = mysqli_fetch_assoc($result);
    return $info;
}

function db_get_is_week_popular($popular_category_id){
    $sqllink = sqlLink();
    $tablename = table_name2();
    $sqlStr = "select * from ${tablename},hb_product where ${tablename}.popular_category_id=hb_product.popular_category_id and ${tablename}.popular_category_id=${popular_category_id}";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}