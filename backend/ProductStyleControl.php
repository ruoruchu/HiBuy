<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 20:03
 */

include "../models/ProductStyleModel.php";
//在页面添加商品样式
function showAddProductStyle(){
    $GLOBALS['rt_code'] = 0;
    $submit = getClientParam('submit');
    $GLOBALS['productIdInfo'] = db_get_product_id();
    $GLOBALS['colorIdInfo'] = db_get_color_id();
    $GLOBALS['sizeIdInfo'] = db_get_size_id();
    if (empty($submit)){
        include "views/product_style_add.php";
        return;
    }
    $product_id = getClientParam('product_id');
    $color_id = getClientParam('color_id');
    $size_id = getClientParam('size_id');
    $stock = getClientParam("stock");
    $sell_num = getClientParam("sell_num");
    if (empty($stock) || empty($sell_num)){
        $GLOBALS['rt_code'] = ERR_PARAM;
        include "views/product_style_add.php";
        return;
    }
    db_add_product_style($product_id,$color_id,$size_id,$stock,$sell_num);
    $GLOBALS['rt_code']=OK;
    include "views/product_style_add.php";
}

//在页面获取商品样式
function showListProductStyle(){
    $GLOBALS['productIdInfo'] = db_get_product_id();
    $GLOBALS['colorIdInfo'] = db_get_color_id();
    $GLOBALS['sizeIdInfo'] = db_get_size_id();
    $GLOBALS['productStyleInfos'] = db_get_all_product_style();
    include 'views/product_style_list.php';
}

// 删除某个商品样式页面
function deleteProductStyle()
{
    $productStyle_id = getClientParam('productStyle_id');
    if(empty($productStyle_id)) {
        return showListProductStyle();
    }
    db_delete_one_product_style($productStyle_id);
    return showListProductStyle();
}

//修改某个商品样式
function updateProductStyle(){
    $productStyle_id = getClientParam('productStyle_id');
    if(empty($productStyle_id)) {
        header('location: ?c=ProductStyle&m=showListProductStyle');
        return;
    }
    $GLOBALS['productIdInfo'] = db_get_product_id();
    $GLOBALS['colorIdInfo'] = db_get_color_id();
    $GLOBALS['sizeIdInfo'] = db_get_size_id();
    $productStyleInfos = db_get_one_product_style($productStyle_id);
    if(empty($productStyleInfos)) {
        header('location: ?c=ProductStyle&m=showListProductStyle');
        return;
    }
    $GLOBALS['productStyleInfos'] = $productStyleInfos;
    views('product_style_update');
}

// 更新样式，返回页面
function updateProductStylePage()
{
    $GLOBALS['rt_code'] = '0';
    $GLOBALS['productIdInfo'] = db_get_product_id();
    $GLOBALS['colorIdInfo'] = db_get_color_id();
    $GLOBALS['sizeIdInfo'] = db_get_size_id();
    $productStyle_id = getClientParam('productStyle_id');
    $product_id = getClientParam('product_id');
    $color_id = getClientParam('color_id');
    $size_id = getClientParam('size_id');
    $stock = getClientParam('stock');
    $sell_num = getClientParam('sell_num');


    if(empty($productStyle_id) || empty($product_id) || empty($product_id) || empty($color_id) || empty($size_id) || empty($stock) || empty($sell_num) ) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_product_style($productStyle_id, $product_id,$color_id,$size_id,$stock,$sell_num);

    $productStyleInfos = db_get_one_product_style($productStyle_id);
    $GLOBALS['productStyleInfos'] = $productStyleInfos;
    views('product_style_update');
}