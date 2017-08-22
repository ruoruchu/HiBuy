<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14 0014
 * Time: 17:00
 */
include_once "../models/ProductModel.php";

function showDetail(){
    $product_id = getClientParam('product_id');
    $GLOBALS['productInfos'] = db_get_one_product_detail($product_id);
    views('detail');
    return;
}