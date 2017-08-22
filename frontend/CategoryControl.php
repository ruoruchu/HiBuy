<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/ProductCategoryModel.php';
include_once '../models/ProductModel.php';
/*获取分类*/
function showCategory()
{
    $GLOBALS['categorys'] = db_get_all_product_category();
    $GLOBALS['products'] = db_get_all_product();
    views('category');
}

/*获取其中一个分类*/
function showOneCategory(){
    $category_name = getClientParam('category_name');
    $productInfo = db_get_one_category_product($category_name);
    $GLOBALS['products'] = $productInfo;
    return rtMsg(OK,$GLOBALS['products']);
}