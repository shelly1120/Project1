<!--這是資料庫，連線程式載入-->
<?php require_once('Connections/conn_db.php'); ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!--載入共用PHP函數庫-->
<?php require_once("php_lib.php") ?>

<!doctype html>
<html lang="zh-tw">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shelly's dessert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <div id="mainmenu">
    <div id="mainmenu">
      <div class="s1">
        <div class="item">
          <form name="search" id="search" action="production.php" method="get">
            <div class="input-group">
              <input type="text" name="search_name" id="search_name" class="form-control" placeholder="Search..." value="<?php echo (isset($_GET['search_name'])) ? $_GET['search_name'] : ''; ?>" required>
              <span class="input-group-btn"><button class="btn btn-default" type="submit"><a href="#"><i class="fas fa-search fa-2x"></i></a></button></span>
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
          <a href="dessertlogin.php"><i class="far fa-regular fa-user fa-2x" title="會員登入"></i></a>
          <a href="cart.php"><i class="fas fa-solid fa-cart-plus fa-2x" title="購物車"></i><span class="badge bg-secondary">
              <?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span></a>
        </div>
      </div>
      <nav class="navbar sticky-top navbar-expand-md bg-light">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="production.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  所有商品
                </a>
                <?php
                //列出產品類別第一層
                $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
                $pyclass01 = $link->query($SQLstring);
                $i = 1; //控制編號順序
                ?>
                <ul class="dropdown-menu">
                  <?php while ($pyclass01_Rows = $pyclass01->fetch()) { ?>

                    <li class="nav-item dropend"><a class="dropdown-item dropdown-toggle" href="#"><?php echo $pyclass01_Rows['cname']; ?></a>
                      <?php
                      //列出產品類別第二層
                      $SQLstring = sprintf("SELECT * FROM pyclass where level=2 and uplink=%d order by sort", $pyclass01_Rows['classid']);
                      $pyclass02 = $link->query($SQLstring);
                      ?>
                      <ul class="dropdown-menu">
                        <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                          <li><a class="dropdown-item" href="production.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"><?php echo $pyclass02_Rows['cname']; ?></a></li>
                        <?php } ?>

                      </ul>
                    </li>
                  <?php } ?>

                </ul>
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

    

<body>
                    <div id="content">
                    <div class="container-fluid">
                    <h3>會員結帳作業</h3>
                    <div class="row">
                        <div class="card" style="width:30rem;">
                            <div class="card-header" style="color:#007bff;"><i class="fas fa-truck fa-flip-horizontal me-1"></i>
                                配送資訊
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">收件人資訊</h4>
                                <h5 class="card-title">姓名：李小明</h5>
                                <p class="card-text">電話：0912345678</p>
                                <p class="card-text">郵遞區號：407台中市西屯區</p>
                                <p class="card-text">地址：中正路1號</p>
                                <a href="#" class="btn btn-outline-primary">選擇其他收件人</a>
                            </div>
                        </div>

                        <div class="card" style="width:30rem;">
                            <div class="card-header" style="color:#000;"><i class="fas fa-credit-card  me-1"></i>
                                付款方式
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">收件人資訊</h4>
                                <h5 class="card-title">姓名：李小明</h5>
                                <p class="card-text">電話：0912345678</p>
                                <p class="card-text">郵遞區號：407台中市西屯區</p>
                                <p class="card-text">地址：中正路1號</p>
                                <a href="#" class="btn btn-outline-primary">選擇其他收件人</a>
                            </div>
                        </div>
                    </div>
                      
             
                    <div class="table-responsive-md" style="width:80%">
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr class="bg-primary" style="color:white;">
                                    <td width="10%">產品編號</td>
                                    <td width="10%">圖片</td>
                                    <td width="30%">名稱</td>
                                    <td width="15%">價格</td>
                                    <td width="15%">數量</td>
                                    <td width="20%">小計</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="product_img/zoom-front-174388.webp" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色" class="img-fluid"></td>
                                    <td>
                                        Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色
                                    </td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                <tr>
                                    <td>1</td>
                                    <td><img src="product_img/zoom-front-174388.webp" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色" class="img-fluid"></td>
                                    <td>
                                        Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色
                                    </td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><img src="product_img/zoom-front-174388.webp" alt="Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色" class="img-fluid"></td>
                                    <td>
                                        Maybelline 媚比琳純淨礦物極效幻膚BB凝露 升級版 SPF 50/PA++++ 01白皙色
                                    </td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <h4 class="color_e600a0 pt-1">$999</h4>
                                    </td>
                                </tr>
                            </tbody>
                            </tfoot>
                            <tr>
                                <td colspan="7">累計:123456</td>
                            </tr>
                            <tr>
                                <td colspan="7">運費:100</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="color_red">總計:123456</td>
                            </tr>
                            <tr>
                                <td colspan="7"><button type="button" id="btn04" name="btn04" class="btn btn-danger"><i class="fas fa-cart-arrow-down pr-2"></i>確認結帳</button></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
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
    <!-- </div> -->
</body>
<script type="text/javascript" src="jslib.js"></script>

</html>
<?php

?>