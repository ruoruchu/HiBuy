<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14 0014
 * Time: 16:06
 */
/*每周流行*/

include '../models/PopularCategoryModel.php';
function showPopularCategory()
{
    $popular_category_id = getClientParam('popular_category_id');
    $GLOBALS['productInfos'] = db_get_is_week_popular($popular_category_id);
    views('weekpopular');
    return;
}