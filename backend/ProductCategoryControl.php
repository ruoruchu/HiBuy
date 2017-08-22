<?php
include_once '../models/ProductCategoryModel.php';

// ajax 增加商品分类接口
function addProductCategory()
{
    $category_name = getClientParam('category_name');
    $category_img = getClientParam('category_img');
    if(empty($category_img) || empty($category_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_product_category($category_name, $category_img);
    return rtMsg();
}

// ajax 修改商品分类接口
function ajax_updateProductCategory()
{
    $category_id = getClientParam('category_id');
    $category_name = getClientParam('category_name');
    $category_img = getClientParam('category_img');
    if(empty($category_img) || empty($category_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_productCategory($category_id,$category_name,$category_img);
    return rtMsg();
}

// 显示添加页面
function showAddProductCategory()
{
    include 'views/product_category_add.php';
}

//显示产品列表页面
function showListProductCatagory(){
    $GLOBALS['productCategoryInfos'] = db_get_all_product_category();
    include 'views/product_category_list.php';
}

//删除某条分类
function deleteProductCategory(){
    $category_id = getClientParam('category_id');
    if (empty($category_id)){
        return showListProductCatagory();
    }
    db_delete_one_product_category($category_id);
    return showListProductCatagory();
}

//更新产品分类
function updateProductCategory(){
    $category_id = getClientParam('category_id');
    if (empty($category_id)){
        header("location:?c=ProductCategory&m=showListProductCategory");
        return;
    }
    $productCategoryInfo = db_get_one_productCategory($category_id);
    if(empty($productCategoryInfo)) {
        header('location: ?c=ProductCategory&m=showListProductCategory');
        return;
    }
    $GLOBALS['productCategoryInfo'] = $productCategoryInfo;
    views('product_category_update');
}

// 更新分类，返回页面
function updateProductCategoryPage()
{
    $GLOBALS['rt_code'] = '0';
    $category_id = getClientParam('category_id');
    $categoryName = getClientParam('category_name');
    $category_img = getClientParam('category_img');
    if(empty($category_id) || empty($categoryName) || empty($category_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_productCategory($category_id, $categoryName, $category_img);

    $productCategoryInfo = db_get_one_productCategory($category_id);
    $GLOBALS['productCategoryInfo'] = $productCategoryInfo;
    views('product_category_update');
}