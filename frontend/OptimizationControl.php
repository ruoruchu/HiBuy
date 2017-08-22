<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 15:15
 */
if(!defined('HIBUY')) {
    die('you cant access');
}
include_once '../models/OptimizationModel.php';

/**显示所有优选*/
function showOptimization()
{
    $GLOBALS['products'] = db_get_all_optimization();
    views('youxuan');
}

/*Ajax按id排序升序*/
function optimizationOrderByProductId(){
    $GLOBALS['products'] = optimization_orderby_product_id();
    return rtMsg(OK,$GLOBALS['products']);
}

/*Ajax按价格排序升序*/
function optimizationOrderByPrice(){
    $GLOBALS['products'] = optimization_orderby_price();
    return rtMsg(OK,$GLOBALS['products']);
}

/*Ajax按价格排序降序*/
function optimizationOrderByPriceDesc(){
    $GLOBALS['products'] = optimization_orderby_price_desc();
    return rtMsg(OK,$GLOBALS['products']);
}

/*Ajax按销量排序升序*/
function optimizationOrderBySellnum(){
    $GLOBALS['products'] = optimization_orderby_sell_num();
    return rtMsg(OK,$GLOBALS['products']);
}

/*Ajax按销量排序降序*/
function optimizationOrderBySellnumDesc(){
    $GLOBALS['products'] = optimization_orderby_sell_num_desc();
    return rtMsg(OK,$GLOBALS['products']);
}