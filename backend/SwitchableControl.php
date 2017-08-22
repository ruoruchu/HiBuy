<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 9:43
 */
include_once '../models/SwitchableModel.php';

// ajax 增加轮播图片接口
function addSwitchable()
{
    $switchable_name = getClientParam('switchable_name');
    $switchable_img = getClientParam('switchable_img');
    $order = getClientParam('order');
    if(empty($switchable_img) || empty($switchable_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_add_switchable($switchable_name, $switchable_img,$order);
    return rtMsg();
}

// ajax 修改商品分类接口
function ajax_updateSwitchable()
{
    $switchable_id = getClientParam('switchable_id');
    $switchable_name = getClientParam('switchable_name');
    $switchable_img = getClientParam('switchable_img');
    $order = getClientParam('order');
    if(empty($switchable_img) || empty($switchable_name)) {
        return rtMsg(ERR_PARAM);
    }
    db_update_one_switchable($switchable_id,$switchable_name,$switchable_img,$order);
    return rtMsg();
}

// 显示添加页面
function showAddSwitchable()
{
    include 'views/switchable_add.php';
}

//显示轮播图片列表页面
function showListSwitchable(){
    $GLOBALS['switchableInfos'] = db_get_all_switchable();
    include 'views/switchable_list.php';
}

//删除某张图片
function deleteSwitchable(){
    $switchable_id = getClientParam('switchable_id');
    if (empty($switchable_id)){
        return showListSwitchable();
    }
    db_delete_one_switchable($switchable_id);
    return showListSwitchable();
}

//更新轮播图片
function updateSwitchable(){
    $switchable_id = getClientParam('switchable_id');
    if (empty($switchable_id)){
        header("location:?c=Switchable&m=showListSwitchable");
        return;
    }
    $switchableInfo = db_get_one_switchable($switchable_id);
    if(empty($switchableInfo)) {
        header('location:?c=Switchable&m=showListSwitchable');
        return;
    }
    $GLOBALS['switchableInfo'] = $switchableInfo;
    views('switchable_update');
}

// 更新轮播图片，返回页面
function updateSwitchablePage()
{
    $GLOBALS['rt_code'] = '0';
    $switchable_id = getClientParam('switchable_id');
    $switchableName = getClientParam('switchable_name');
    $switchable_img = getClientParam('switchable_img');
    $order = getClientParam('order');
    if(empty($switchable_id) || empty($switchableName) || empty($switchable_img) || empty($order)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_switchable($switchable_id, $switchableName, $switchable_img,$order);
    $switchableInfo = db_get_one_switchable($switchable_id);
    $GLOBALS['switchableInfo'] = $switchableInfo;
    views('switchable_update');
}