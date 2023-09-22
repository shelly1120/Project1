<!--這是資料庫，連線程式載入-->
<?php require_once('Connections/conn_db.php');?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION))?session_start():"";?>

<!doctype html>
<html lang="zh-tw">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shelly's dessert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">


</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <div id="mainmenu">
    <div class="s1">
      <div class="item">
        <form class="d-flex" role="search">
          <input class="form-control mx-2 form-control-sm" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>

      </div>
      <div class="item">
        <i class="far fa-regular fa-comment fa-2x"></i>
        <i class="far fa-regular fa-user fa-2x"></i>
        <i class="fas fa-solid fa-cart-plus fa-2x"></i></i>
      </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="bookstrapCDN.php"><img src="images/logo.png" width="120px" height="100px" alt="Shelly's dessert"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="bookstrapCDN.php">品牌理念</a>
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

            <li class="nav-item">
              <a class="nav-link" href="#">登入</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">註冊</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">登出</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>
  <div id="content" align="center">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="bookstrapCDN.php">首頁</a></li>
          <li class="breadcrumb-item"><a href="#">所有產品</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
      </nav>
      <div class="pic">
        <div class="card mb-6">
          <div class="flex-row">
            <div class="row flex-column">
              <div class="col-md-10 mb-3">
                <img id="showGoods" name="showGoods" src="images/product_picture_20210628100939242957.jpg" class="img-fluid rounded-start" alt="重乳酪蛋糕">
              </div>
              <div class="col-md-10 mb-3">
                <img id="showGoods" name="showGoods" src="images/product_picture_20210628100859247004.jpg" class="img-fluid rounded-start" alt="重乳酪蛋糕">
              </div>
              <div class="col-md-10 mb-3">
                <img id="showGoods" name="showGoods" src="images/product_picture_20210628100911178795.jpg" class="img-fluid rounded-start" alt="重乳酪蛋糕">
              </div>
            </div>
            <div class="col-md-4 mt-2">
              <img id="showGoods" name="showGoods" src="images/product_card01.jpg" class="img-fluid rounded-start" alt="重乳酪蛋糕">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h4 class="card1-title">重乳酪蛋糕</h4>
                <p class="card-text">雙倍濃郁乳酪、選用進口乳酪製作，底部撲滿酥脆餅乾，雙倍濃郁乳酪，濃郁到無限值，人氣大推薦，好吃到停不下來的起司蛋糕！
                <h4 class="color_ff0000" align="left">$580</h4>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group input-group-lg">
                      <span class="input-group-text color-warning" id="inputGroup-sizing-lg">數量</span>
                      <input type="number" id="qty" name="qty" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <button name="button01" id="button01" type="button" class="btn btn-warning btn-lg color-warning">加入購物車</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="description">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <img src="./images/product_picture_20210628100911178795.jpg" width="100%" height="auto">
        </div>
        <div class="col-md-6">
          <h2>產品說明</h2>
          <p>底層：餅乾(進口小麥胚芽餅)<br>
            特色：採用天然香純的 Cream Cheese 蒸烤製成<br>
            入口即化，幸福的感覺從入口開始。<br>

            規格說明：<br>
            八吋蛋糕(蛋奶素)，<br>
            直徑約 19 公分(±1 公分)高盒裝，<br>
            其最大裝箱數為 12 盒。<br>

          </p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4">
          <h3 class="tit">注意事項</h3>
          所有蛋糕產品皆以冷凍保鮮，<br>
          若蛋糕上方有白色結霜、<br>
          或者內餡有碎冰皆屬正常現象，
          稍為退冰後即可，請安心食用。
        </div>
        <div class="col-md-4">
          <h3 class="tit">取貨與付款方式</h3>
          單盒運費 $ 160<br>
          2 盒 ~ 5 盒運費 $ 225<br>
          6 盒 ~ 14 盒運費 $ 290<br>
          超過 14 盒將分箱寄送，<br>
          超過的部分按上述方式計算，<br>
          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>
          若有訂單中預購商品，將會分開出貨，運費另外計算<br>
          若需要寄送不同地址，<br>
          請分開下單<br>
        </div>
        <div class="col-md-4">
          <h3 class="tit">營養標示</h3>
          每一份量 100 公克<br>
          本包裝含 12 分<br>
          ----------------------<br>
          每份 每 100 公克<br>
          ---------------------------<br>
          熱量 343.5 大卡<br>
          蛋白質 7.3 公克<br>
          脂肪 22.7 公克<br>
          飽和脂肪 15.8 公克<br>
          反式脂肪 0 公克<br>
          碳水化合物 27.5 公克<br>
          糖 7.2 公克<br>
          鈉 260 毫克<br>
          </p>
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
</body>

</html>