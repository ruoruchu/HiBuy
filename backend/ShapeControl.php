<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/7 0007
 * Time: 14:55
 */

include_once "../models/ShapeModel.php";

/*Ajax接口添加形状*/
function addShape(){
    $shapeName = getClientParam('shape_name');
    $remark = getClientParam('remark');
    if (empty($shapeName)){
        return rtMsg(ERR_PARAM);
    }
    db_add_shape($shapeName,$remark);
    return rtMsg();
}

/*页面添加形状*/
function showAddShape(){
    $GLOBALS['rt_code'] = 0;
    $submit = getClientParam('submit');
    if (empty($submit)){
        include 'views/shape_add.php';
        return;
    }
    $shape_name = getClientParam('shape_name');
    $remark = getClientParam('remark');

    if (empty($shape_name)){
        $GLOBALS['rt_code'] = ERR_PARAM;
        include "views/shape_add.php";
        return;
    }
    db_add_shape($shape_name,$remark);
    $GLOBALS['rt_code'] = OK;
    include "views/shape_add.php";
}
