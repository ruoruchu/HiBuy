<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/11 0011
 * Time: 17:06
 */
if(!defined('HIBUY')) {
    die('you cant access');
}

include_once '../models/ProductModel.php';

function showDetail()
{
    $GLOBALS['detail'] = db_get_all_product();
    views('detail');
    return;
}