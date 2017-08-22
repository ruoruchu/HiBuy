<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14 0014
 * Time: 9:12
 */
/*潮流搭配*/

include '../models/DressModel.php';
function showDress(){
    $dress_id = getClientParam('dress_id');
    $GLOBALS['productInfos'] = db_get_is_fashion($dress_id);
    views('fashion');
    return;
}
