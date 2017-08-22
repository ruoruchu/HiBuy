<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7 0007
 * Time: 14:55
 */
include "ConnectDB.php";

function table_name(){
    return "hb_shape";
}

/*增加形状*/
function db_add_shape($shape_name,$remark){
    $sqllink = sqlLink();     //获取数据库的连接
    $tablename = table_name();  //获取数据库的表名
    $sqlStr = "insert into ${tablename} (`shape_name`,`remark`) VALUES ('${shape_name}','${remark}')";  //拼接sql语句
    mysqli_query($sqllink,$sqlStr);
    return true;
}

/*获取所有形状*/
function db_get_all_shape(){
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename}";
    $shapeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink,$sqlStr);
    if (empty($result)){
        return $shapeInfos;
    }
    while ($info = mysqli_fetch_assoc($result)){
        $shapeInfos[$i] = $info;
        $i++;
    }
    return $shapeInfos;
}

