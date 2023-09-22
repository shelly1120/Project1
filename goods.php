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
  <link rel="stylesheet" href="fancybox-2.1.7/source/jquery.fancybox.css">
 
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
  <div id="content" align="center">
    <div class="container-fluid">
      <?php
      $level1Open = "";
      $level2Open = "";
      $level3Open = "";

      if (isset($_GET['p_id']) && $_GET['p_id'] != "") {
        //使用p_id產品代碼取出資料
        //處理第一層
        $SQLstring = sprintf("SELECT * FROM product,pyclass,(SELECT classid as upclassid, level as uplevel,cname as upcname FROM pyclass WHERE level=1) as uplevel WHERE product.classid=pyclass.classid AND pyclass.uplink=uplevel.upclassid AND product.p_id=%d", $_GET['p_id']);

        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $level1Cname = $data['upcname'];
        $level1Upclassid = $data['upclassid'];
        $level1 = $data['uplevel'];
        $level1Open = '<li class="breadcrumb-item"><a href="production.php?classid=' . $level1Upclassid . '&level=' . $level1 . '">' . $level1Cname . '</a></li>';
        //處理第二層
        $level2Cname = $data['cname'];
        $level2Classid = $data['classid'];
        $level2Open = '<li class="breadcrumb-item"><a href="production.php?classid=' . $level2Classid . '">' . $level2Cname . '</a></li>';
        //處理第三層(產品名稱)
        $level3Open = '<li class="breadcrumb-item active" aria-current="page">' . $data['p_name'] . '</li>';
      } elseif (isset($_GET['search_name'])) {
        //使用關鍵字查詢
        $level1Open = '<li class="breadcrumb-item active" aria-current="page">關鍵字查詢:' . $_GET['search_name'] . '</li>';
      } elseif (isset($_GET['level']) && isset($_GET['classid'])) {


        //選擇第一層類別
        $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=%d AND classid=%d", $_GET['level'], $_GET['classid']);
        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $level1Cname = $data['cname'];
        $level1Open = '<li class="breadcrumb-item active" aria-current="page">' . $level1Cname . '</li>';
      } elseif (isset($_GET['classid'])) {
        //選擇第二層類別
        $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 and classid=%d", $_GET['classid']);
        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $level2Cname = $data['cname'];
        $level2Uplink = $data['uplink'];
        $level2Open = '<li class="breadcrumb-item active" aria-current="page">' . $level2Cname . '</li>';
        //需加處理上一層
        $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=1 AND classid=%d", $level2Uplink);
        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $level1Cname = $data['cname'];
        $level1 = $data['level'];
        $level1Open = '<li class="breadcrumb-item"><a href="production.php?classid=' . $level2Uplink . '&level=' . $level1 . '">' . $level1Cname . '</a></li>';
      }
      ?>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
          <li class="breadcrumb-item"><a href="production.php">所有產品</a></li>
          <?php echo $level1Open . $level2Open . $level3Open; ?>
        </ol>
      </nav>
      <div class="card mb-3 mt-3">
        <?php
        // 取得產品圖片檔名資料
        $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
        $img_rs = $link->query($SQLstring);
        $imgList = $img_rs->fetch();
        ?>
        <div class="row g-0">
          <div class="col-md-3">
            <div class="row mt-2">
              <?php do { ?>
                <div class="col-md-8">
                  <a href="images/<?php echo $imgList['img_file']; ?>" rel="group" class="fancybox" title="<?php echo $data['p_name']; ?>">
                    <img src="images/<?php echo $imgList['img_file']; ?>" class="img-fluid" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>">
                  </a>
                </div>
              <?php } while ($imgList = $img_rs->fetch()); ?>
            </div>
          </div>

          <div class="col-md-9">
            <?php
            // 取得產品圖片檔名資料
            $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
            $img_rs = $link->query($SQLstring);
            $imgList = $img_rs->fetch();
            ?>
            <div class="card1-body">
              <img id="showGoods" name="showGoods" src="images/<?php echo $imgList['img_file']; ?>" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>" class="img-fluid">
              <div class="card-bored">
                <div class="col-md-9">
                  <h1 class="card1-title"><?php echo $data['p_name']; ?></h1>
                  <p class="card-text" align="left"><?php echo $data['p_intro']; ?></p>
                </div>
                <div class="col-md-9">
                  <div class="row mt-5">
                    <div class="col-md-6">
                      <div class="input-group">
                        <span class="input-group-text color-warning" id="inputGroup-sizing-default">數量</span>
                        <input type="number" id="qty" name="qty" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                      </div>
                      <br>
                      <h4 class="color_ff0000" align="left">NT.<?php echo $data['p_price']; ?></h4>
                    </div>
                    <div class="col-md-6">
                      <button name="button01" id="button01" type="button" class="btn btn-warning btn-sm color-warning" onclick="addcart(<?php echo $data['p_id']; ?>);">
                        <i class="fa fa-shopping-cart" aria-hidden="true"> 加入購物車</i>
                      </button>

                    </div>
                  </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
  <?php echo $data['p_content']; ?>
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
  <?php require_once('jsfile.php'); ?>
  <script type="text/javascript" src="fancybox-2.1.7/source/jquery.fancybox.js"></script>
  <script type="text/javascript" src="jslib.js"></script>
  <script type="text/javascript">
    $(function() {
      //定義在滑鼠滑過圖片檔名填入主圖src中
      $(".card .row.mt-2 .col-md-8 a").mouseover(function() {
        var imgsrc = $(this).children("img").attr("src");
        $("#showGoods").attr({
          "src": imgsrc
        });
      });
      //將子圖片放到lightbox展示
      $(".fancybox").fancybox();
    });
  </script>
</body>

</html>
<?php

?>