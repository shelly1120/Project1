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
        <div class="row">

          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_card01.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body mb-3 ">
              <h3 class="card1-title">重乳酪蛋糕</h3>
              <p class="card-text">嚴選特級乳酪製作，經典中的經典<br>
                紮實的乳酪層每一口，<br>
                都能吃到滿滿的濃郁乳酪<br>
                絕對是乳酪迷的首選</p>
              <p class="card-text">NT. 530</p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>

          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_card02.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">OREO乳酪蛋糕</h3>
              <p class="card-text">
                濃郁乳酪奶香搭配著oreo酥脆口感<br>
                與厚實的巧克力<br>
                乳酪蛋糕的新層次<br>
                無法言喻的迷人滋味</p>
              <p class="card-text">NT.580</p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_card03.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">萌熊重乳酪--2入禮盒</h3>
              <p class="card-text">超萌熊掌造型結合重乳酪蛋糕<br>
                卡哇伊造型讓人看了忍不住尖叫<br>
                療癒系x真材實料<br>
                帶給你不同的驚喜！！</p>
              <p class="card-text">
                NT. 250
              </p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_card04.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">Cream sandies限定版</h3>
              <p class="card-text">還在思考如何慶生嗎?<br>
                又是餅乾又是蛋糕又是冰淇淋<br>
                三種口感通通給你<br>
                手工製作，要提前預訂喔</p>
              <p class="card-text">NT.1,200 (10入)</p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/creamHBD2.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body mb-3">
              <h3 class="card1-title">北海道奶油三明治冰淇淋</h3>
              <p class="card-text">
                Cream sandies<br>
                酥脆的餅中夾入了淡奶油和香氣<br>
                口味高達30種，小孩才選擇～<br>
                我通通都要吃看看</p>
              <p class="card-text">NT.550</p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_picture_20210314001547818059.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">十勝牛乳布丁-六入禮盒</h3>
              <p class="card-text">
                100%使用北海道十勝鮮乳製作<br>
                不加一滴水<br>
                濃厚的乳香滑順細緻的口感<br>
                大人小孩都喜愛的甜點人氣王<br>
              <p class="card-text">NT.500</p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_picture_20220810233459556838.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">焦糖奶油+宇治抹茶餅乾</h3>
              <p class="card-text">
                餅乾使用了濃醇的宇治抹茶的麵粉<br>
                帶點苦味的抹茶甜而不膩的焦糖餡<br>
                無法言喻的層次感<br>
                絕對是抹茶控的口袋名單！<br>
              <p class="card-text">
                NT.320
              </p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
          <div class="card1 col-md-3">
            <div class="image-container">
              <img src="images/product_picture_202208102320261906151.jpg" class="card-img-top mt-2" alt="...">
            </div>
            <div class="card-body">
              <h3 class="card1-title">焦糖奶油+濃黑巧克力</h3>
              <p class="card-text">
                餅乾使用兩種不同濃度的可可粉<br>
                內餡由奶油、巧克力、嚴選咖啡豆<br>
                少許萊姆酒香氣結合而成的巧克力焦糖<br>
                十足大人味<br>
              <p class="card-text">NT.320 </p>
              <a href="#" class="btn btn-outline-warning">加入購物車</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-itema active"><a class="page-link" href="#">1</a></li>
          <li class="page-item "><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
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