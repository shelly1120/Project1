<!--這是資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php'); ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!doctype html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shelly's dessert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">


    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <style type="text/css">
            /*輸入有錯誤時，顯示紅框*/
            table input:invalid {
                border: solid red 3px;
            }
        </style>
    </head>

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <div id="mainmenu">
        <div class="s1">
            <div class="item">

                <form name="search" id="search" action="production.php" method="get">
                    <div class="input-group">
                        <input type="text" name="search_name" id="search_name" class="form-control" placeholder="Search..." value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><a href="#"><i class="fas fa-search fa-2x" title="找商品"></i></a></button></span>
                    </div>
                </form>

            </div>

            <div class="item">
                <?php
                //讀取後台購物車內產品數量
                $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip ='" . $_SERVER['REMOTE_ADDR'] . "'";
                $cart_rs = $link->query($SQLstring);
                ?>
                <a href="message.php"><i class="far fa-regular fa-comment fa-2x" title="聯絡我們"></i></a>
                <?php if (isset($_SESSION['login'])) { ?>
          <a href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出？','logout.php')"><i class="far fa-regular fa-user fa-2x" title="會員登出"></i></a>
          <?php } else { ?>
        <a href="dessertlogin.php"><i class="far fa-regular fa-user fa-2x" title="會員登入"></i></a>
        <?php } ?>
                <a href="cart.php"><i class="fas fa-solid fa-cart-plus fa-2x" title="購物車"></i><span class="badge bg-secondary">
                        <?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></a>
            </div>
        </div>
        <nav class="navbar sticky-top navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="120px" height="100px" alt="Shelly's dessert"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">品牌理念</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="production.php" target="_self">所有產品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#buyrules">線上訂購</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">訂購QA/條款</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                會員中心
                            </a>
                            <ul class="dropdown-menu" arial-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">訂單查詢</a></li>
                                <li><a class="dropdown-item" href="#">退訂／退款查詢</a></li>
                                <li><a class="dropdown-item" href="#">現金積點查詢</a></li>
                                <li><a class="dropdown-item" href="#">折價券查詢</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div align="center">
        <div id="scontent">
            <div class="container-fluid">
                <div class="col-md-8">
                    <?php
                    //建立購物車資料查詢
                    $SQLstring = "SELECT * FROM cart,product,product_img where ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid is NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
                    $cart_rs = $link->query($SQLstring);
                    $ptotal = 0; //設定累加的變數，初始=0;
                    ?>
                    <?php if ($cart_rs->rowCount() != 0) { ?>

                        <div class="table-responsive-md">
                            <table class="table table-hover mt-3">
                                <thead>
                                    <tr class="table-warning">
                                        <td width="10%">產品編號</td>
                                        <td width="10%">圖片</td>
                                        <td width="25%">名稱</td>
                                        <td width="15%">價格</td>
                                        <td width="10%">數量</td>
                                        <td width="15%">小計</td>
                                        <td width="15%">下次再買</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while ($cart_data = $cart_rs->fetch()) { ?>
                                        <tr>
                                            <td><?php echo $cart_data['p_id'] ?></td>
                                            <td><img src="images/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid"></td>
                                            <td><?php echo $cart_data['p_name'] ?></td>
                                            <td>
                                                <h4>$<?php echo $cart_data['p_price'] ?></h4>
                                            </td>
                                            <td style="min-width:100px;">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="qty[]" name="qty[]" min="1" max="49" value="<?php echo $cart_data['qty']; ?>" cartid="<?php echo $cart_data['cartid']; ?>" required>
                                                </div>
                                            </td>
                                            <td>
                                                <h4>$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></h4>
                                            </td>
                                            <td><button type="button" id="btn[]" name="btn[]" class="btn btn-secondary" onclick="btn_confirmLink('確定刪除本資料?','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>');">取消</button></td>
                                        </tr>
                                    <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
                                    } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">小計:NT.<?php echo $ptotal ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">運費:NT.60</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" align="right">合計<h4 class="color_ff0000"><?php echo $ptotal + 60; ?></h4>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <a href="production.php" type="button" id="btn01" name="btn01" class="btn btn-outline-warning">繼續購物</a>
                        <button type="button" id="btn02" name="btn02" class="btn btn-outline-warning" onclick="window.history.go(-1)">回到上一頁</button>
                        <button type="button" id="btn01" name="btn01" class="btn btn-outline-warning" onclick="btn_confirmLink('確定清空購物車?','shopcart_del.php?mode=2');">清空購物車</button>
                        <a href="checkout.php" id="btn01" name="btn01" class="btn btn-outline-warning">前往結帳</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning" role="alert">抱歉！目前購物車沒有相關產品。
            </div>
        <?php } ?>
        </div>
    </div>


    <div id="footer">
        <div class="container-fluid">
            <div class="row text-left">
                <div class="col-md-6 bg-warning  f-family2">
                    <ul>連絡我們</ul>
                    <ol>客服專線：04-23592181</ol>
                    <ol>客服時間：10am-10pm</ol>
                    <ol>客服信箱：shelly19931120@gmail.com</ol>
                    <ol>Copyright © 2023 Shelly's dessert all right reserved. Design by SHELLY</ol>
                </div>
                <div class="col-md-6 bg-warning  f-family2">
                    <ul>追蹤我們</ul>
                    <a href="https://zh-tw.facebook.com/"><i class="fab fa-brands fa-facebook fa-5x"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-brands fa-instagram fa-5x"></i></a>
                    <a href="https://line.me/zh-hant/"><i class="fab fa-brands fa-line fa-5x"></i></a>
                    <a href="https://www.youtube.com/"><i class="fab fa-brands fa-youtube fa-5x"></i></a>


                </div>
            </div>
        </div>
    </div>
    <?php require_once("jsfile.php"); ?>
</body>

</html>

<script type="text/javascript">
    

    //將產品p_id加入購物車
    function addcart(p_id) {
        var qty = $("#qty").val();
        if (qty <= 0) {
            alert("產品數量不得為0或負數，請再修改數量！");
            return (false);
        }
        if (qty == undefined) {
            qty = 1;
        } else if (qty >= 50) {
            alert("由於採購限制，產品數量將限制在50以下!");
            return (false);
        }
        //利用jquery $.ajax函數呼叫後台的addcart.php
        $.ajax({
            url: 'addcart.php',
            type: 'get',
            dataType: 'json',
            data: {
                p_id: p_id,
                qty: qty,
            },
            success: function(data) {
                if (data.c == true) {
                    alert(data.m);
                    window.location.reload();
                } else {
                    alert(data.m);
                }
            },
            error: function(data) {
                alert("系統目前無法連接到後台資料庫");
            }
        });
    }

    //將變更的數量寫入後台資料庫

    $("input").change(function() {
        var qty = $(this).val();
        const cartid = $(this).attr("cartid");
        if (qty <= 0 || qty >= 50) {
            alert("更改數量需大於0以上，以及小於50以下。");
            return (false);
        }
        $.ajax({
            url: 'change_qty.php',
            type: 'post',
            dataType: 'json',
            data: {
                cartid: cartid,
                qty: qty,
            },
            success: function(data) {
                if (data.c == true) {
                    alert(data.m);
                    window.location.reload();
                } else {
                    alert(data.m);
                }
            },
            error: function(data) {
                alert("系統目前無法連接到後台資料庫");
            }
        });
    });
</script>
<?php

?>