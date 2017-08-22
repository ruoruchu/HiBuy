<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$popularInfos = $GLOBALS['productInfos'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>每周流行</title>
    <link href="css/global.css" rel="stylesheet" type="text/css">
    <link href="css/product_list.css" rel="stylesheet" type="text/css">
    <link href="css/weekpopular.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="popular-desc">
        <img src="<?php echo $popularInfos[0]['popular_category_img'];?>">
        <div class="desc">
            <p class="title">流行详解</p>
            <p>春风吹起来，连衣裙穿起来，凸显气质的早春连衣裙都在这里了。</p>
        </div>
    </div>

    <div class="header-nav">
        <div class="nav-item selected">流行</div>
        <div class="nav-item">热销</div>
        <div class="nav-item">新品</div>
        <div class="nav-item">价格</div>
    </div>

    <?php $c=count($popularInfos);
    if(count($popularInfos)%2==0){ ?>
        <div class="product-list">
            <?php for($i=0;$i<count($popularInfos);$i+=2){?>
                <div class="product-item">
                    <a href="?c=Product&m=showDetail&product_id='<?php echo $popularInfos[$i]["product_id"]?>'">
                        <img src="<?php echo $popularInfos[$i]['list_img_url'];?>">
                        <div class="product-title"><?php echo $popularInfos[$i]['product_name'];?></div>
                        <div class="price-shop">
                            <span class="price">￥<?php echo $popularInfos[$i]['origin_price'];?></span>
                            <img src="image/shopping1.png">
                        </div>
                    </a>

                </div>

                <div class="product-item">
                    <a href="?c=Product&m=showDetail&product_id='<?php echo $popularInfos[$i+1]["product_id"]?>'">
                        <img src="<?php echo $popularInfos[$i+1]['list_img_url'];?>">
                        <div class="product-title"><?php echo $popularInfos[$i+1]['product_name'];?></div>
                        <div class="price-shop">
                            <span class="price">￥<?php echo $popularInfos[$i+1]['origin_price'];?></span>
                            <img src="image/shopping1.png">
                        </div>
                    </a>

                </div>
            <?php }?>
        </div>

    <?php }else{?>

        <div class="product-list">

            <div class="product-item">
                <a href="?c=Product&m=showDetail&product_id='<?php echo $popularInfos[0]["product_id"]?>'">
                    <img src="<?php echo $popularInfos[0]['list_img_url'];?>">
                    <div class="product-title"><?php echo $popularInfos[0]['product_name'];?></div>
                    <div class="price-shop">
                        <span class="price">￥<?php echo $popularInfos[0]['origin_price'];?></span>
                        <img src="image/shopping1.png">
                    </div>
                </a>
            </div>

            <div class="product-item">
                <?php for($i=0;$i<count($popularInfos)-2;$i+=2){?>
                <a href="?c=Product&m=showDetail&product_id='<?php echo $popularInfos[$i+1]["product_id"]?>'">
                    <img src="<?php echo $popularInfos[$i+1]['list_img_url'];?>">
                    <div class="product-title"><?php echo $popularInfos[$i+1]['product_name'];?></div>
                    <div class="price-shop">
                        <span class="price">￥<?php echo $popularInfos[$i+1]['origin_price'];?></span>
                        <img src="image/shopping1.png">
                    </div>
                </a>

            </div>

            <div class="product-item">
                <a href="?c=Product&m=showDetail&product_id='<?php echo $popularInfos[$i+2]["product_id"]?>'">
                    <img src="<?php echo $popularInfos[$i+2]['list_img_url'];?>">
                    <div class="product-title"><?php echo $popularInfos[$i+2]['product_name'];?></div>
                    <div class="price-shop">
                        <span class="price">￥<?php echo $popularInfos[$i+2]['origin_price'];?></span>
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