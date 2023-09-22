<!-- 這是將資料庫，連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SESSION功能，這是跨頁變數存取 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>

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
    <script type="text/javascript" src="commlib.js"></script>
    
    
    <style type="text/css">
        div.input-group>.form-control {
            width: 100%;
        }
        input#search_name.form-control {
            width: 10%;
        }
        span.error-tips,
        span.error-tips::before {
            font-family: "Font Awesome 5 Free";
            color:red;
            font-weight:900 ;
            content:"\f0c4";
        }
        span.valid-tips,
        span.valid-tips::before{
            font-family: "Font Awesome 5 Free";
            color:greenyellow;
            font-weight:900 ;
            content:"\f00c";
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    <body>
       
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3>會員註冊
                            </h3>
                            <h5>請輸入相關資料，＊為必須輸入欄位</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-2 text-left">
                            <form id="reg" name="reg" action="register.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="*請輸入email帳號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pw1" id="pw1" class="form-control" placeholder="*請輸入密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pw2" id="pw2" class="form-control" placeholder="*請再次確認密碼">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="cname" id="cname" class="form-control" placeholder="*請輸入姓名">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="tssn" id="tssn" class="form-control" placeholder="*請輸入身分證字號">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="birthday" id="birthday" onfocus="(this.type='date')" class="form-control" placeholder="*請選擇生日">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="*請輸入手機號碼">
                                </div>
                                <div class="input-group mb-3">
                                    <select name="myCity" id="myCity" class="form-control">
                                        <option value="">請選擇市區
                                            <?php $city = "SELECT * FROM `city` WHERE State=0";
                                            $city_rs = $link->query($city);
                                            while ($city_rows = $city_rs->fetch()) { ?>
                                        <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                                    <?php } ?>
                                    </select><br>
                                    <select name="myTown" id="myTown" class="form-control">
                                        <option value="">請選擇地區</option>
                                    </select>
                                </div>
                                <label for="address" class="form-label" id="zipcode" name="zipcode">郵遞區號:地址</label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="myZip" id="myZip" value="">
                                    <input type="text" name="address" id="address" class="form-control" placeholder="請輸入後續地址">
                                </div>
                                <label for="fileToUpload" class="form-label">上傳相片:</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" title="請上傳相片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                                    <p class="mt-1"><button type="button" class="btn btn-primary" id="uploadForm" name="uploadForm">開始上傳</button></p>
                                    <div id="progress-div01" class="progress" style="width:100%;display:none">
                                        <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" style="width:0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                                    </div>
                                    <input type="hidden" name="uploadname" id="uploadname" value="">
                                    <img id="showimg" name="showimg" src="" alt="photo" style="display:none;">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="captcha" id="captcha" value=''>
                                    <a href="javascript:void(0);" title="按我更新認證碼" onclick="getCaptcha();">
                                        <canvas id="can"></canvas>
                                    </a>
                                    <input type="text" name="recaptcha" id="recaptcha" class="form-control" placeholder="請輸入驗證碼">
                                </div>
                                <input type="hidden" name="formctl" id="formctl" value="reg">
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-warning btn-sm">送出</button>
                                </div>
                            </form>
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
        <?php require_once("jsfile.php"); ?>
        <script type="text/javascript" src="jquery.validate.js"></script>
        <script type="text/javascript">            
            $(function() {
              //驗證form #reg表單
            $('#reg').validate({
                rules:{
                    email:{
                        required:true,
                        email:true,
                        remote:'checkmail.php'
                    },
                },
                message:{
                    email:{
                        required:'email信箱不得為空白',
                        email:'email信箱格式有誤',
                        remote:'email信箱已經註冊'
                    },
                },
            })
                // 取得元素ID
                function getID(el) {
                    return document.getElementById(el)
                }
                // 圖示上傳處理
                $("#uploadForm").click(function(e) {
                    var fileName = $('#fileToUpload').val();
                    var idxDot = fileName.lastIndexOf(".") + 1;
                    let extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                        $('#progress-div01').css("display", "flex");
                        let file1 = getID("fileToUpload").files[0];
                        let formdata = new FormData();
                        formdata.append("file1", file1);
                        let ajax = new XMLHttpRequest();
                        ajax.upload.addEventListener("progress", progressHandler, false);
                        ajax.addEventListener("load", completeHandler, false);
                        ajax.addEventListener("error", errorHandler, false);
                        ajax.addEventListener("abort", abortHandler, false);
                        ajax.open("POST", "file_upload_parser.php");
                        ajax.send(formdata);
                        return false
                    } else {
                        alert('目前只支援jpg,jpeg,png,gif檔案格式上傳!');
                    }
                });

                //上傳過程顯示百分比
                function progressHandler(event) {
                    let percent = Math.round((event.loaded / event.total) * 100)
                    $("#progress-bar01").css("width", percent + "%")
                    $("#progress-bar01").html(percent + "%")
                }

                //上傳完成處理顯示圖片
                function completeHandler(event) {
                    let data = JSON.parse(event.target.responseText)
                    if (data.success == 'true') {
                        $('#uploadname').val(data.fileName)
                        $('#showimg').attr({
                            'src': 'uploads/' + data.fileName,
                            'style': 'display:block;'
                        })
                        $('button.btn.btn-danger').attr({
                            'style': 'display:none;'
                        })
                    } else {
                        alert(data.error)
                    }
                }

                //Upload Failed:上傳發生錯誤處理
                function errorHandler(event) {
                    alert("Upload Failed:上傳發生錯誤");
                }

                //Upload Aborted:上傳作業取消處理
                function abortHandler(event) {
                    alert("Upload Aborted:上傳作業取消");
                }


                //啟動認證碼功能
                getCaptcha();

                //取得縣市代碼後查鄉鎮市的名稱

                $("#myCity").change(function() {
                    var CNo = $('#myCity').val();
                    if (CNo == "") {
                        return false;
                    }
                    $.ajax({ //將鄉鎮市的名稱從後台資料庫取回
                        url: 'Town_ajax.php',
                        type: 'post',
                        dataType: 'Json',
                        data: {
                            CNo: CNo,
                        },
                        success: function(data) {
                            if (data.c == true) {
                                $('#myTown').html(data.m);
                                $('myZip').val("");
                            } else {
                                alert(data.m);
                            }
                        },
                        error: function(data) {
                            alert("系統目前無法連接到後台資料庫");
                        }
                    });
                });

                //取得鄉鎮市代碼，查詢郵遞區號放入#myZip,#zipcode
                $("#myTown").change(function() {
                    var AutoNo = $('#myTown').val();
                    if (AutoNo == "") {
                        return false;
                    }
                    $.ajax({
                        url: 'Zip_ajax.php',
                        type: 'get',
                        dataType: 'json',
                        data: {
                            AutoNo: AutoNo,
                        },
                        success: function(data) {
                            if (data.c == true) {
                                $('#myZip').val(data.Post);
                                $('#zipcode').html(data.Post + data.Cityname + data.Name);
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

            function getCaptcha() {
                var inputText = document.getElementById("captcha");
                //can為canvas的ID名稱
                //150=影像寬,50=影像高,blue=影像背景顏色
                //white=文字顏色,28px=文字大小,5=認證碼長度
                inputText.value = captchaCode("can", 150, 50, "blue", "white", "28px", 5);
            }

            
        </script>
         
    </body>

</html>
