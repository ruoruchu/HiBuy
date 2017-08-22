<?php
include_once 'ConnectDB.php';

function table_name3()
{
    return 'hb_product';
}

/*添加商品*/
function db_add_product($product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark){
    $tablename = table_name3();
    $sqlStr = "insert into ${tablename}(`product_no`,`product_name`,`product_subname`,`list_img_url`,`origin_price`,`discount_price`,`freight_type`,`freight_limit`,`is_optimization`,`is_hot`,`is_week_popular`,`category_id`,`dress_id`,`popular_category_id`,`ctime`,`remark`) VALUES ('${product_no}',  '${product_name}','${product_subname}',  '${list_img_url}','${origin_price}',  '${discount_price}','${freight_type}',  '${freight_limit}','${is_optimization}',  '${is_hot}','${is_week_popular}',  '${category_id}','${dress_id}',  '${popular_category_id}',  '${ctime}','${remark}')";
    $sqllink = sqlLink();
    mysqli_query($sqllink, $sqlStr);
    return true;
}

/*获取category_id*/
function db_get_category_id(){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from `hb_product_category`";
    $categoryIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $categoryIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $categoryIdInfo[$i] = $info;
        $i++;
    }
    return $categoryIdInfo;
}

/*获取dress_id*/
function db_get_dress_id(){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from `hb_dress`";
    $dressIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $dressIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $dressIdInfo[$i] = $info;
        $i++;
    }
    return $dressIdInfo;
}

/*获取popular_category_id*/
function db_get_popular_category_id(){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from `hb_popular_category`";
    $popularCategoryIdInfo=[];
    $i=0;
    $result=mysqli_query($sqllink,$sqlStr);
    if(empty($result)) {
        return $popularCategoryIdInfo;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $popularCategoryIdInfo[$i] = $info;
        $i++;
    }
    return $popularCategoryIdInfo;
}

// 获取所有产品
function db_get_all_product()
{
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from ${tablename},`hb_product_category`,`hb_dress`,`hb_popular_category`  WHERE ${tablename}.category_id=hb_product_category.category_id and ${tablename}.dress_id=hb_dress.dress_id and ${tablename}.popular_category_id=hb_popular_category.popular_category_id";
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

//删除某个商品
function db_delete_one_product($product_id){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $strSql = "delete from ${tablename} where `product_id`=${product_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}

/**
 * 获取某一商品信息
 */
function db_get_one_product($product_id)
{
    $sqllink = sqlLink();
    $tablename = table_name3();
    $strSql = "select * from ${tablename} where  product_id=${product_id}";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}

/**
 * 获取某一类商品信息
 */
function db_get_one_category_product($category_name)
{
    $sqllink = sqlLink();
    $tablename = table_name3();
    $strSql = "select * from ${tablename},hb_product_category where ${tablename}.category_id=hb_product_category.category_id and hb_product_category.category_name='${category_name}'";
    $productInfos = [];
    $i=0;
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result)) {
        return $productInfos;
    }
    while($info = mysqli_fetch_assoc($result)) {
        $productInfos[$i] = $info;
        $i++;
    }
    return $productInfos;
}

/*修改商品信息*/
function db_update_one_product($product_id,$product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $strSql = "update ${tablename} set `product_no`='${product_no}', `product_name`='${product_name}', `product_subname`='${product_subname}', `list_img_url`='${list_img_url}', `origin_price`='${origin_price}', `discount_price`='${discount_price}', `freight_type`='${freight_type}', `freight_limit`='${freight_limit}', `is_optimization`='${is_optimization}', `is_hot`='${is_hot}', `dress_id`='${dress_id}', `category_id`='${category_id}', `ctime`='${ctime}', `popular_category_id`='${popular_category_id}', `is_week_popular`='${is_week_popular}', `remark`='${remark}' where `product_id`=${product_id}";
    mysqli_query($sqllink, $strSql);
    return true;
}

/*获取热销产品*/
function db_get_is_hot(){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from ${tablename} where is_hot='1'";
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

/*获取精选产品*/
function db_get_is_optimization(){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $sqlStr = "select * from ${tablename} where is_optimization='1'";
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

function db_get_one_product_detail($product_id){
    $sqllink = sqlLink();
    $tablename = table_name3();
    $strSql = "select * from ${tablename},hb_product_style where  ${tablename}.product_id=hb_product_style.product_id and ${tablename}.product_id=$product_id";
    $result = mysqli_query($sqllink, $strSql);
    if(empty($result))
        return false;
    $info = mysqli_fetch_assoc($result);
    return $info;
}



