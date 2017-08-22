<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 14:12
 */
include_once "ConnectDB.php";

function table_name(){
    return 'hb_dress';
}

//增加潮流搭配
function db_add_dress($dress_name,$dress_img){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "insert into ${tablename} (`dress_name`,`dress_img`) VALUES ('${dress_name}','${dress_img}')";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

//获取所有潮流穿搭
function db_get_all_dress(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename}";
    $dressInfos = [];
    $i=0;
    $result = mysqli_query($sqllink,$sqlStr);
    if(empty($result)){
        return $dressInfos;
    }
    while ($info = mysqli_fetch_assoc($result)){
        $dressInfos[]=$info;
        $i++;
    }
    return $dressInfos;
}

//删除某条潮流搭配
function db_delete_one_dress($dress_id){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "delete from ${tablename} WHERE `dress_id`='$dress_id'";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

//修改某条潮流搭配
function db_update_one_dress($dress_id,$dress_name,$dress_img){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "update ${tablename} set `dress_name`='${dress_name}',`dress_img`='${dress_img}' where `dress_id`=${dress_id}";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

function db_get_one_dress($dress_id){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} WHERE `dress_id`='$dress_id'";
    $result = mysqli_query($sqllink,$sqlStr);
   if (empty($result)){
       return false;
   }
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/*前台根据潮流搭配ID获取潮流搭配*/
function db_get_is_fashion($dress_id){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename},hb_product where ${tablename}.dress_id=hb_product.dress_id and ${tablename}.dress_id=${dress_id}";
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