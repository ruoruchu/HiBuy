<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 16:28
 */
include '../models/PopularCategoryModel.php';

// ajax 增加潮流搭配接口
function addPopularCategory()
{
    $popular_category_name = getClientParam('popular_category_name');
    $popular_category_img = getClientParam('popular_category_img');
    if(empty($popular_category_img) || empty($popular_category_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_popularCategory($popular_category_name, $popular_category_img);
    return rtMsg();
}

// ajax 修改潮流搭配接口
function ajax_updatePopularCategory()
{
    $popular_category_id = getClientParam('popular_category_id');
    $popular_category_name = getClientParam('popular_category_name');
    $popular_category_img = getClientParam('popular_category_img');
    if(empty($popular_category_img) || empty($popular_category_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_popularCategory($popular_category_id,$popular_category_name,$popular_category_img);
    return rtMsg();
}

// 显示添加页面
function showAddPopularCategory()
{
    include 'views/popular_category_add.php';
}

//在页面获取流行类别
function showListPopularCategory(){
    $GLOBALS['popularCategoryInfos'] = db_get_all_popularCategory();
    include 'views/popular_category_list.php';
}

//在页面删除某条流行类别
function deletePopularCategory(){
    $popular_category_id = getClientParam('popular_category_id');
    if(empty($popular_category_id)) {
        return showListPopularCategory();
    }
    db_delete_one_popularCategory($popular_category_id);
    return showListPopularCategory();
}

//在页面修改某条流行类别
function updatePopularCategory(){
    $popular_category_id =getClientParam('popular_category_id');
    if (empty($popular_category_id)){
        header("location:?c=PopularCategory&m=showListPopularCategory");
        return;
    }
    $popularCategoryInfo = db_get_one_popularCategory($popular_category_id);
    if (empty($popularCategoryInfo)){
        header("location:?c=PopularCategory&m=showListPopularCategory");
        return;
    }
    $GLOBALS['popularCategoryInfo'] = $popularCategoryInfo;
    views("popular_category_update");
}

// 更新流行类别，返回页面
function updatePopularCategoryPage()
{
    $GLOBALS['rt_code'] = '0';
    $popular_category_id = getClientParam('popular_category_id');
    $popular_categoryName = getClientParam('popular_category_name');
    if(empty($popular_category_id) || empty($popular_categoryName)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_popularCategory($popular_category_id,$popular_categoryName);
    $popularCategoryInfo = db_get_one_popularCategory($popular_category_id);
    $GLOBALS['popularCategoryInfo'] = $popularCategoryInfo;
    views('popular_category_update');
}


