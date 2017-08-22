<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9 0009
 * Time: 16:57
 */
include "../models/ProductModel.php";

// ajax 增加商品
function addProduct()
{
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam("list_img_url");
    $origin_price = getClientParam("origin_price");
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam("is_optimization");
    $is_hot = getClientParam("is_hot");
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam("popular_category_id");
    $ctime = date("Y-m-d H:i:s");
    $remark = getClientParam("remark");
    if(empty($product_no) || empty($product_name)) {
        return rtMsg(ERR_PARAM);
    }
   db_add_product($product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);
    return rtMsg();
}

/*在页面添加商品*/
function showAddProduct(){
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $GLOBALS['rt_code'] = 0;
    $submit = getClientParam('submit');
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    if (empty($submit)){
        include "views/product_add.php";
        return;
    }
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam("list_img_url");
    $origin_price = getClientParam("origin_price");
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam("is_optimization");
    $is_hot = getClientParam("is_hot");
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam("popular_category_id");
    $ctime = getClientParam("ctime");
    $remark = getClientParam("remark");
    if (empty($product_no) || empty($list_img_url)){
        $GLOBALS['rt_code'] = ERR_PARAM;
        include "views/product_add.php";
        return;
    }
    db_add_product($product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);
    $GLOBALS['rt_code']=OK;
    include "views/product_add.php";
}

/*在页面获取商品样式*/
function showListProduct(){
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $GLOBALS['productInfo'] = db_get_all_product();
    include 'views/product_list.php';
}

/*在页面删除某个商品*/
function deleteProduct(){
    $product_id = getClientParam('product_id');
    if(empty($product_id)) {
        return showListProduct();
    }
    db_delete_one_product($product_id);
    return showListProduct();
}

// ajax 修改商品分类接口
function ajax_updateProduct()
{
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $product_id = getClientParam('product_id');
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam("list_img_url");
    $origin_price = getClientParam("origin_price");
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam("is_optimization");
    $is_hot = getClientParam("is_hot");
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam("popular_category_id");
    $ctime = date("Y-m-d H:i:s");
    $remark = getClientParam("remark");
    if(empty($product_no) || empty($product_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_product($product_id,$product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);
    return rtMsg();
}

//更新商品信息
function updateProduct(){
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $product_id = getClientParam('product_id');
    if (empty($product_id)){
        header("location:?c=Product&m=showListProduct");
        return;
    }
    $productInfo = db_get_one_product($product_id);
    if(empty($productInfo)) {
        header('location: ?c=Product&m=showListProduct');
        return;
    }
    $GLOBALS['productInfo'] = $productInfo;
    views('product_update');
}

// 更新商品信息，返回页面
function updateProductPage()
{
    $GLOBALS['rt_code'] = '0';
    $GLOBALS['categoryIdInfo'] = db_get_category_id();
    $GLOBALS['dressIdInfo'] = db_get_dress_id();
    $GLOBALS['popularCategoryIdInfo'] = db_get_popular_category_id();
    $product_id = getClientParam('product_id');
    $product_no = getClientParam('product_no');
    $product_name = getClientParam('product_name');
    $product_subname = getClientParam('product_subname');
    $list_img_url = getClientParam("list_img_url");
    $origin_price = getClientParam("origin_price");
    $discount_price = getClientParam('discount_price');
    $freight_type = getClientParam('freight_type');
    $freight_limit = getClientParam('freight_limit');
    $is_optimization = getClientParam("is_optimization");
    $is_hot = getClientParam("is_hot");
    $is_week_popular = getClientParam('is_week_popular');
    $category_id = getClientParam('category_id');
    $dress_id = getClientParam('dress_id');
    $popular_category_id = getClientParam("popular_category_id");
    $ctime = date("Y-m-d H:i:s");
    $remark = getClientParam("remark");
    if(empty($product_no) || empty($product_name) ||empty($product_id)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_product($product_id,$product_no,$product_name,$product_subname,$list_img_url,$origin_price,$discount_price,$freight_type,$freight_limit,$is_optimization,$is_hot,$is_week_popular,$category_id,$dress_id,$popular_category_id,$ctime,$remark);

    $productInfo = db_get_one_product($product_id);
    $GLOBALS['productInfo'] = $productInfo;
    views('product_update');
}
