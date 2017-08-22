<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 14:26
 */
include '../models/DressModel.php';

// ajax 增加潮流搭配接口
function addDress()
{
    $dress_name = getClientParam('dress_name');
    $dress_img = getClientParam('dress_img');
    if(empty($dress_img) || empty($dress_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_dress($dress_name, $dress_img);
    return rtMsg();
}

// ajax 修改潮流搭配接口
function ajax_updateDress()
{
    $dress_id = getClientParam('dress_id');
    $dress_name = getClientParam('dress_name');
    $dress_img = getClientParam('dress_img');
    if(empty($dress_img) || empty($dress_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_dress($dress_id,$dress_name,$dress_img);
    return rtMsg();
}

// 显示添加页面
function showAddDress()
{
    include 'views/dress_add.php';
}

//显示产品列表页面
function showListDress(){
    $GLOBALS['dressInfos'] = db_get_all_dress();
    include 'views/dress_list.php';
}

//删除某条分类
function deleteDress(){
    $dress_id = getClientParam('dress_id');
    if (empty($dress_id)){
        return showListDress();
    }
    db_delete_one_dress($dress_id);
    return showListDress();
}

//更新产品分类
function updateDress(){
    $dress_id = getClientParam('dress_id');
    if (empty($dress_id)){
        header("location:?c=Dress&m=showListDress");
        return;
    }
    $dressInfos = db_get_one_dress($dress_id);
    if(empty($dressInfos)) {
        header('location:?c=Dress&m=showListDress');
        return;
    }
    $GLOBALS['dressInfos'] = $dressInfos;
    views('dress_update');
}

// 更新分类，返回页面
function updateDressPage()
{
    $GLOBALS['rt_code'] = '0';
    $dress_id = getClientParam('dress_id');
    $dressName = getClientParam('dress_name');
    $dress_img = getClientParam('dress_img');
    if(empty($dress_id) || empty($dressName) || empty($dress_img)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_dress($dress_id, $dressName, $dress_img);

    $dressInfos = db_get_one_dress($dress_id);
    $GLOBALS['dressInfos'] = $dressInfos;
    views('dress_update');
}