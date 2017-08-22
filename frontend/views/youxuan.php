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
                <img src="image/b1.png">
            </div>

            <div class="order">
                <div class="order-item selected" onclick="getOpOrdertimizationByProductId()">综合</div>
                <div class="order-item">
                    销量
                    <div class="up-down">
                        <div class="up up-selected" onclick="getOpOrdertimizationBySellnum()"></div>
                        <div class="down" onclick="getOpOrdertimizationBySellnumDesc()"></div>
                    </div>
                </div>
                <div class="order-item">
                    价格
                    <div class="up-down">
                        <div class="up" onclick="getOpOrdertimizationByPrice()"></div>
                        <div class="down" onclick="getOpOrdertimizationByPriceDesc()"></div>
                    </div>
                </div>
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
<script>
    var i=0;
    function getOpOrdertimizationByProductId() {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        xhr.open("get","?c=Optimization&m=optimizationOrderByProductId");
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

    function getOpOrdertimizationByPrice() {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        xhr.open("get","?c=Optimization&m=optimizationOrderByPrice");
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

    function getOpOrdertimizationByPriceDesc() {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        xhr.open("get","?c=Optimization&m=optimizationOrderByPriceDesc");
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

    function getOpOrdertimizationBySellnum() {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        xhr.open("get","?c=Optimization&m=optimizationOrderBySellnum");
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

    function getOpOrdertimizationBySellnumDesc() {
        //创建ajax对象
        var xhr = new XMLHttpRequest();
        //创建http协议请求
        xhr.open("get","?c=Optimization&m=optimizationOrderBySellnumDesc");
        //发送http协议请求
        xhr.send(null);
        //判断状态
        xhr.onreadystatechange=function () {
            if (xhr.readyState==4 && xhr.status==200){

                var respObj = JSON.parse(xhr.responseText);
                for(i=0;i<respObj.data.length;i++){
                    console.log(document.getElementsByClassName("optimization_img")[i]);
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