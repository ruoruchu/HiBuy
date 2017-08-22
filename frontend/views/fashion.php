<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$dressInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>潮流穿搭</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/fashion.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="header-nav">
        <div class="nav-item selected">流行</div>
        <div class="nav-item">热销</div>
        <div class="nav-item">新品</div>
        <div class="nav-item">价格</div>
    </div>
    <?php $c=count($dressInfos);
        if(count($dressInfos)%2==0){ ?>
    <div class="product-list">
        <?php for($i=0;$i<count($dressInfos);$i+=2){?>
        <div class="product-item">
            <a href="?c=Product&m=showDetail&product_id='<?php echo $dressInfos[$i]["product_id"]?>'">
                <img src="<?php echo $dressInfos[$i]['list_img_url'];?>">
                <div class="product-title"><?php echo $dressInfos[$i]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $dressInfos[$i]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>

        </div>

        <div class="product-item">
            <a href="?c=Product&m=showDetail&product_id='<?php echo $dressInfos[$i+1]["product_id"]?>'">
                <img src="<?php echo $dressInfos[$i+1]['list_img_url'];?>">
                <div class="product-title"><?php echo $dressInfos[$i+1]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $dressInfos[$i+1]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>

        </div>
        <?php }?>
    </div>

        <?php }else{?>

     <div class="product-list">

        <div class="product-item">
                <a href="?c=Product&m=showDetail&product_id='<?php echo $dressInfos[0]["product_id"]?>'">
                    <img src="<?php echo $dressInfos[0]['list_img_url'];?>">
                    <div class="product-title"><?php echo $dressInfos[0]['product_name'];?></div>
                    <div class="price-shop">
                        <span class="price">￥<?php echo $dressInfos[0]['origin_price'];?></span>
                        <img src="image/shopping1.png">
                    </div>
                </a>
            </div>

        <div class="product-item">
            <?php for($i=0;$i<count($dressInfos)-2;$i+=2){?>
            <a href="?c=Product&m=showDetail&product_id='<?php echo $dressInfos[$i+1]["product_id"]?>'">
                <img src="<?php echo $dressInfos[$i+1]['list_img_url'];?>">
                <div class="product-title"><?php echo $dressInfos[$i+1]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $dressInfos[$i+1]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>

        </div>

        <div class="product-item">
            <a href="?c=Product&m=showDetail&product_id='<?php echo $dressInfos[$i+2]["product_id"]?>'">
                <img src="<?php echo $dressInfos[$i+2]['list_img_url'];?>">
                <div class="product-title"><?php echo $dressInfos[$i+2]['product_name'];?></div>
                <div class="price-shop">
                    <span class="price">￥<?php echo $dressInfos[$i+2]['origin_price'];?></span>
                    <img src="image/shopping1.png">
                </div>
            </a>
            <?php }?>
        </div>

    </div>
<?php }?>
</div>
</body>
</html>