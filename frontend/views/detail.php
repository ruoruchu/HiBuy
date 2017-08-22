<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$productInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0, user-scalable=0">
    <title>商品详情</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/detail.css" type="text/css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="header">
        <img src="image/shopping1.png">
    </div>

    <div class="product">
        <div class="imgs">
            <img src="<?php echo $productInfos['list_img_url']?>">
        </div>
        <div class="product-attr">
            <div class="product-name"><?php echo $productInfos['product_name']?></div>
            <div class="product-price">
                <span class="rmb">￥</span>
                <span class="money"><?php echo $productInfos['origin_price']?></span>
                <span class="remark">(积分可抵扣8元)</span>
            </div>
            <div class="storage">
                <span class="key">库存:</span>
                <span class="name"><?php echo $productInfos['stock']?></span>
            </div>
            <div class="deliver">
                <span class="key">运费:</span>
                <span class="name">免运费</span>
            </div>
        </div>

    </div>

    <div class="comment">
        <div class="comment-header">宝贝评价(0)</div>
        <div class="comment-tags">
            <div class="tag">有图(0)</div>
            <div class="tag">好评(0)</div>
            <div class="tag">中评(0)</div>
            <div class="tag">差评(0)</div>
        </div>
    </div>

    <div class="desc"><?php echo $productInfos['product_subname']?></div>
</div>

<div class="buy-shop">
    <button class="buy">立即购买</button>
    <button class="shop">加入购物车</button>
</div>

</body>
</html>