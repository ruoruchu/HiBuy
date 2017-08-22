<?php
include_once 'ConnectDB.php';

function table_name1()
{
    return 'hb_product_category';
}

// 增加分类
function db_add_product_category($cagtegory_name, $imgurl)
{
    $link = sqlLink();
    $tableName = table_name1();

    $strSql = "insert into ${tableName}(`category_name`, `category_img`) VALUES ('${cagtegory_name}', '${imgurl}')";

    mysqli_query($link, $strSql);
    return true;
}

// 获取所有分类
function db_get_all_product_category()
{
    $link = sqlLink();
    $tableName = table_name1();
    $strSql = "select * from ${tableName}";
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

//删除某条分类
function db_delete_one_product_category($category_id){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr = "delete from ${tablename} WHERE `category_id`=${category_id}";
    mysqli_query($sqllink,$sqlStr);
    return true;
}

/*获取某一分类*/
function db_get_one_productCategory($category_id){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr = "select * from ${tablename} WHERE `category_id`='$category_id'";
    $result = mysqli_query($sqllink,$sqlStr);
    if (empty($result)){
        return false;
    }
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/*修改某个分类*/
function db_update_one_productCategory($category_id,$category_name,$category_img){
    $sqllink = sqlLink();
    $tablename = table_name1();
    $sqlStr ="update ${tablename} set `category_name`='$category_name', `category_img`='$category_img' where `category_id`='$category_id'";
    mysqli_query($sqllink,$sqlStr);
    return true;
}