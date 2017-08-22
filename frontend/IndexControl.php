<?php
if(!defined('HIBUY')) {
    die('you cant access');
}

include '../models/SwitchableModel.php';
include '../models/DressModel.php';
include '../models/PopularCategoryModel.php';
include '../models/ProductModel.php';


function showIndex()
{
    $GLOBALS['switchables'] = db_get_all_switchable();
    $GLOBALS['fashions'] = db_get_all_dress();
    $GLOBALS['popularCategorys']= db_get_all_popularCategory();
    $GLOBALS['products'] = db_get_is_optimization();
    views('index');
    return;
}
