<?php


include_once '../models/SizeModel.php';

function addSize()
{
    $sizeName = getClientParam('size_name');
    $remark = getClientParam('remark');
    if (empty($sizeName)) {
        return rtMsg(ERR_PARAM);
    }
    add_size($sizeName, $remark);
    return rtMsg();
}

function getAllSize()
{
    $infos = get_all_size();
    return rtMsg(OK, $infos);
}

function getAllSizeWhere($sizeId)
{
    $sizeId = getClientParam('size_id');
    $infos = get_where_size($sizeId);
    return rtMsg(OK, $infos);
}

// 显示添加商品尺寸页面
function showAddSize()
{
    include 'views/size_add.php';
}

//显示商品尺寸列表
function showListSize(){
    $GLOBALS['sizeInfos'] = get_all_size();
    include 'views/size_list.php';
}

// 删除某个尺寸页面
function deleteSize()
{
    $size_id = getClientParam('size_id');
    if(empty($size_id)) {
        return showListSize();
    }
    db_delete_one_size($size_id);
    return showListSize();
}


//修改某一尺寸
function updateSize()
{
    $size_id = getClientParam('size_id');
    if(empty($size_id)) {
        header('location: ?c=Size&m=showListSize');
        return;
    }
    $sizeInfo = db_get_one_size($size_id);
    if(empty($sizeInfo)) {
        header('location: ?c=Size&m=showListSize');
        return;
    }
    $GLOBALS['sizeInfo'] = $sizeInfo;
    views('size_update');
}

// 更新尺寸，返回页面
function updateSizePage()
{
    $GLOBALS['rt_code'] = '0';
    $size_id = getClientParam('size_id');
    $sizeName = getClientParam('size_name');
    $remark = getClientParam('remark');
    if(empty($size_id) || empty($sizeName)) {
        $GLOBALS['rt_code'] = ERR_PARAM;
    }
    db_update_one_size($size_id, $sizeName, $remark);

    $sizeInfo = db_get_one_size($size_id);
    $GLOBALS['sizeInfo'] = $sizeInfo;
    views('size_update');
}
