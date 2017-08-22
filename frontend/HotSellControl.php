<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/13 0013
 * Time: 21:33
 */
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductModel.php';

function showHotSell()
{
    $GLOBALS['products'] = db_get_is_hot();
    views('hotsell');
}