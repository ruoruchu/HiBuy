<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 9:00
 */

include_once 'ConnectDB.php';

function table_name1()
{
    return 'hb_switchable';
}

// 增加图片
function db_add_switchable($switchable_name, $imgurl,$order)
{
    $link = sqlLink();
    $tableName = table_name1();

    $strSql = "insert into ${tableName}(`switchable_name`, `switchable_img`,`order`) VALUES ('${switchable_name}', '${imgurl}','$order')";

    mysqli_query($link, $strSql);
    return true;
}

// 获取所有图片
function db_get_all_switchable()
{
    $link = sqlLink();
    $tableName = table_name1();
    $strSql = "select * from ${tableName} ORDER BY `order`";
    $result = mysqli_query($link, $strSql);
    if(!$result) {
        // to log
        return false;
    }

    $infos = [];
    $i = 0;
    while ($info = mysqli_fetch_assoc($result)) {
        $infos[$i] = $info;
        $i++;
    }
    return $infos;

}

//删除某张图片
function db_delete_one_switchable($switchable_id){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr = "delete from ${tablename} WHERE `switchable_id`=${switchable_id}";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

/*获取某一张图片*/
function db_get_one_switchable($switchable_id){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr = "select * from ${tablename} WHERE `switchable_id`='$switchable_id'";
    $result = mysqli_query($sqllink,$sqlStr);
    if (empty($result)){
        return false;
    }
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/*修改某个图片*/
function db_update_one_switchable($switchable_id,$switchable_name,$switchable_img,$order){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr ="update ${tablename} set `switchable_name`='$switchable_name', `switchable_img`='$switchable_img',`order`='$order' where `switchable_id`='$switchable_id'";
    mysqli_query($sqllink,$sqlStr);
    return true;
}