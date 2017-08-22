<?php
if(!defined('HIBUY')) {
    die('you cant access');
}
$categorys = $GLOBALS['categorys'];
$products = $GLOBALS['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0, user-scalable=0">
    <title>全部分类</title>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/catgory.css" rel="stylesheet" type="text/css">
    <link href="css/youxuan.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-2.0.3.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="title">全部分类</div>
        <div class="catgorys">
            <?php foreach ($categorys as $category):?>
            <div class="catgroy-item" onclick="getOneCategory('<?php echo $category["category_name"];?>')">
                <img src="<?php echo $category['category_img']; ?>">
                <p name="category_name"><?php echo $category['category_name']; ?></p>
            </div>
            <?php endforeach;?>

        </div>

        <div class="youxuan-product">

            <?php echo count($products);
            if(count($products)%2==0){
                for($i=0;$i<count($products);$i+=2) {
                    ?>
                    <div class="product-row">
                        <div class="product-item"">
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
                                <p class="optimization_product_name"><?php echo $products[$i]['product_name']; ?></p>
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
<script>
    function getOneCategory(category_name) {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
         var url='?c=Category&m=showOneCategory&category_name='+category_name;
        xhr.open("get",url);
        //发送http协议请求
        xhr.send(null);
        //判断状态
        xhr.onreadystatechange=function () {
            if (xhr.readyState==4 && xhr.status==200){
                var respObj = JSON.parse(xhr.responseText);
                for(i=0;i<respObj.data.length;i++){
                    document.getElementsByClassName("optimization_img")[i].src=respObj.data[i].list_img_url;
                    document.getElementsByClassName("optimization_product_name")[i].innerText=respObj.data[i].product_name;
                    document.getElementsByClassName("price")[i].innerText=respObj.data[i].origin_price;
                }
            }
        }
        }
</script>
</body>
</html>