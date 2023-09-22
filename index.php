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
  <!-- <script src="wow.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  
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


  <div class="animate__animated animate__fadeInUp" data-wow-delay="2s">
    <div id="scontent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <?php
            //建立廣告輪播carousel資料查詢
            $SQLstring = "SELECT * FROM carousel where caro_online=1 order by caro_sort";
            $carousel = $link->query($SQLstring);
            $i = 0; //控制active啟動
            ?>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <?php for ($i = 0; $i < $carousel->rowCount(); $i++) { ?>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo activeShow($i, 0); ?>" aria-current="true" aria-label="Slide <?php echo $i; ?>"></button>
                <?php } ?>

              </div>
              <div class="carousel-inner">
                <?php
                $i = 0;
                while ($data = $carousel->fetch()) { ?>

                  <div class="carousel-item <?php echo activeShow($i, 0); ?>">
                    <img src="./images/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="<?php echo $data['caro_title']; ?>">
                    <div class="carousel-caption d-none d-md-block">
                      <h3><?php echo $data['caro_title']; ?></h3>
                      <h4><?php echo $data['caro_content']; ?>
                      </h4>
                    </div>
                  </div>
                <?php $i++;
                }
                ?>

              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-4">
            <h2>品牌理念</h2>
            <p class="p1">
              每日限量 經典美味<br>
              從滿足家人的味蕾開始<br>
              家，是我們的起點。<br>
              從家裡的一台小烤箱開始，翻過一本又一本的食譜，<br>
              嘗試一遍又一遍的食材，<br>
              從前每一份送到家人口中的甜點，<br>
              都承載著滿滿的心意。<br></p>
              <p class="p1">現在，<br>
              我們要將這份心意傳到大街小巷，<br>
              傳到城市的每一個巷弄，與你分享我們私藏的小喜悅。
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="animate__animated animate__fadeInUp" data-wow-delay="3s">
    <div id="content" align="center">
      <div class="container-fluid">
        <h2>熱銷商品</h2>
        <?php
        //建立熱銷商品查詢
        $SQLstring = "SELECT * FROM hot,product,product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 order by h_sort";
        $hot = $link->query($SQLstring);
        ?>
        <div class="row">
          <?php while ($data = $hot->fetch()) { ?>
            <div class="card1 col-lg-3 col-md-4 col-sm-6">
              <div class="image-container">
                <a href="goods.php?p_id=<?php echo $data['p_id']; ?>"><img src="images/<?php echo $data['img_file']; ?>" class="card-img-top mt-2" alt="HOT<?php echo $data['h_sort']; ?>"></a>
              </div>
              <div class="card-body mb-3">
                <h3 class="card1-title"><?php echo $data['p_name']; ?></h3>
                <p align="left"><?php echo $data['p_intro']; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="color_ff0000">NT.<?php echo $data['p_price']; ?></p>
                  <a href="goods.php?p_id=<?php echo $data['p_id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-solid fa-cheese"></i>前往購買</a>
                </div>
              </div>
            </div>
          <?php } ?>
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
  </div>
  <?php require_once("jsfile.php"); ?>
</body>

</html>
<?php
function activeShow($num, $chkPoint)
{
  return (($num == $chkPoint) ? "active" : "");
}
?>