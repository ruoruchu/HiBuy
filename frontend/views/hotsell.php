<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$products = $GLOBALS['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>优选</title>

    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="youxuan-head">
        <div class="banner">
            <img src="image/0.png">
        </div>
        
    </div>


    <div class="youxuan-product">

        <?php if(count($products)%2==0){
            for($i=0;$i<count($products);$i+=2) {
                ?>
                <div class="product-row">
                    <div class="product-item">
                        <a href="?c=Product&m=showDetail&product_id='<?php echo $products[$i]["product_id"]?>'">
                            <img class="optimization_img" src="<?php echo $products[$i]['list_img_url']; ?>">
                            <p class="optimization_product_name"><?php echo $products[$i]['product_name'];?></p>
                            <div class="price-car">
                                <span class="price">￥ <?php echo $products[$i]['origin_price']; ?></span>
                                <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="?c=Product&m=showDetail&product_id='<?php echo $products[$i+1]["product_id"]?>'">
                            <img class="optimization_img" src="<?php echo $products[$i + 1]['list_img_url']; ?>">
                            <p class="optimization_product_name"><?php echo $products[$i + 1]['product_name']; ?></p>
                            <div class="price-car">
                                <span class="price">￥ <?php echo $products[$i + 1]['origin_price']; ?></span>
                                <img src="image/car1.png" onclick="alert('已加入购物车');return false">
                            </div>
                        </a>
                    </div>
                </div>
            <?php }
        }else{  ?>

            <?php for($i=0;$i<(count($products)-1);$i+=2){ ?>
                <div class="product-row">
                    <div class="product-item">
                        <a href="?c=Product&m=showDetail&product_id='<?php echo $products[$i]["product_id"]?>'">
                            <img class="optimization_img" src="<?php echo $products[$i]['list_img_url']; ?>">
                            <p class="optimization_product_name"><?php echo $products[$i]['product_name']; echo count($products);?></p>
                            <div class="price-car">
                                <span class="price">￥ <?php echo $products[$i]['origin_price']; ?></span>
                                <img src="image/car1.png" onclick="alert('x');return false">
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="?c=Product&m=showDetail&product_id='<?php echo $products[$i+1]["product_id"]?>'">
                            <img class="optimization_img" src="<?php echo $products[$i+1]['list_img_url']; ?>">
                            <p class="optimization_product_name"><?php echo $products[$i+1]['product_name'];?></p>
                            <div class="price-car">
                                <span class="price">￥ <?php echo $products[$i+1]['origin_price']; ?></span>
                                <img src="image/car1.png" onclick="alert('x');return false">
                            </div>
                        </a>
                    </div>
                </div>
            <?php }?>
            <div class="product-item">
                <a href="?c=Product&m=showDetail&product_id='<?php echo $products[count($products)-1]["product_id"]?>'">
                    <img class="optimization_img" src="<?php echo $products[count($products)-1]['list_img_url']; ?>">
                    <p class="optimization_product_name"><?php echo $products[count($products)-1]['product_name'];?></p>
                    <div class="price-car">
                        <span class="price">￥ <?php echo $products[count($products)-1]['origin_price']; ?></span>
                        <img src="image/car1.png" onclick="alert('x');return false">
                    </div>
                </a>
            </div>
        <?php }?>

    </div>
</div>
</body>