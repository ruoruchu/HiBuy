<?php
/**
 * 商品尺码操作
 */
include_once 'ConnectDB.php';

function table_name()
{
    return 'hb_size';
}

/*添加尺寸*/
function add_size($size_name,$remark=''){
    $tablename = table_name();
    $sqlStr = "insert into ${tablename}(`size_name`,`remark`) VALUES ('${size_name}',  '${remark}')";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}

/*获取所有尺寸*/
function get_all_size()
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename}";
    $sizeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $sizeInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeInfos[$i] = $info;
        $i++;
    }
    return $sizeInfos;
}

/*查找某一尺寸*/
function get_where_size($size_id)
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $sqlStr = "select * from ${tablename} where size_id=$size_id";
    $sizeInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $sqlStr);
    if(empty($result)) {
        return $sizeInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $sizeInfos[$i] = $info;
        $i++;
    }
    return $sizeInfos;
}

/*** 删除尺寸*/
function db_delete_one_size($size_id)
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "delete from ${tablename} where `size_id`=${size_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}

/**
 * 获取尺寸
 */
function db_get_one_size($size_id)
{
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "select * from ${tablename} where size_id=${size_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/*修改尺寸*/
function db_update_one_size($size_id, $size_name, $remark){
    $sqllink = sqlLink();
    $tablename = table_name();
    $strSql = "update ${tablename} set `size_name`='${size_name}', `remark`='${remark}' where `size_id`=${size_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}