<!--這是資料庫，連線程式載入-->
<?php require_once('connections/conn_db.php'); ?>
<!--如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取-->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!--載入共用PHP函數庫-->
<?php require_once("php_lib.php") ?>
<?php
//取得要返回的php頁面
if (isset($_GET['sPath'])) {
  $sPath = $_GET['sPath'] . ".php";
} else {
  //登入完成預設要進入首頁
  $sPath = "index.php";
}
//檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
  header(sprintf("location: %s", $sPath));
}
?>

<!doctype html>
<html lang="zh-tw">
<style type="text/css">
  .form-signin input[type="email"],
  .form-signin input[type="password"],
  .form-signin button {
    width: 100%;
    height: 44px;
    font-size: 16px;
    display: block;
    margin-bottom: 20px;
  }
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to SHELLY's dessert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
  <link rel="stylesheet" href="fancybox-2.1.7/source/jquery.fancybox.css">
  

</head>

<body>
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
        </div>
      </div>
    </nav>
  </div>
  </div>
  <main>
    <div class="row">
      <div class="col-md-6 mb-2">
        <img src="./images/product_picture_20220810143029237361.jpg" class="bgimg">
        <img src="./images/product_picture_202212161209128793922.jpg" class="bgimg">
        <img src="./images/bearhand4.jpg" class="bgimg">
        <img src="./images/product_picture_20220810232026190615.jpg" class="bgimg">
        <img src="./images/product_picture_20221216120912879392.jpg" class="bgimg">
        <img src="./images/bearhand3.jpg" class="bgimg">
      </div>

      <div class="col-md-6">
        <h1 class="login-title">Welcome to SHELLY's dessert</h1>
        <div class="login-card">
            <form action="" method="POST" class="form-signin" id="form1">
              帳號:<input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus>
              密碼:<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="password" required>

              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox">記住我
                </label>
                <div><a href="register.php">還不是會員嗎？立即註冊</a></div>
              </div>
              <br>
              <button class="btn btn-warning" type="submit" name="submit" value="送出">登入</button>
            </form>
        </div>
      </div>
    </div>
    </div>
    </div>
  </main>
  <div id="footer2">
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
  <script type="text/javascript">
    $(function() {
      $("#form1").submit(function() {
        const inputAccount = $("#inputAccount").val();
        const inputPassword = $("#inputPassword").val();
        $("#loading").show();
        //利用$ajax函數來呼叫後台的auth_user.php驗證帳號密碼
        $.ajax({
          url: 'auth_user.php',
          type: 'post',
          dataType: 'json',
          data: {
            inputAccount: inputAccount,
            inputPassword: inputPassword,
          },
          success: function(data) {
            if (data.c == true) {
              alert(data.m);
              //window.location.reload();
              window.location.href = "<?php echo $sPath; ?>";
            } else {
              alert(data.m);
            }
          },
          error: function(data) {
            alert("系統目前無法連接到後台資料庫");
          }
        });
      });
    });
  </script>
  <div id="loading" name="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,.5);z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute;top:50%;left:50%"></i></div>
  
</body>

</html>