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


</head>
<body>
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
</body>
</html>