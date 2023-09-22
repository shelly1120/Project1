-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2023 �?09 ??22 ??03:55
-- 伺服器版本: 5.0.51b-community-nt-log
-- PHP 版本： 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `dessert`
--

-- --------------------------------------------------------

--
-- 資料表結構 `addbook`
--

CREATE TABLE IF NOT EXISTS `addbook` (
  `addressid` int(10) NOT NULL auto_increment COMMENT '地址ID',
  `setdefault` tinyint(1) NOT NULL default '0' COMMENT '預設收件人',
  `emailid` int(10) NOT NULL COMMENT '會員編號',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '收件者姓名',
  `mobile` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '收件者電話',
  `myzip` varchar(10) collate utf8_unicode_ci default NULL COMMENT '郵遞區號',
  `address` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '收件地址',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`addressid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 資料表的匯出資料 `addbook`
--

INSERT INTO `addbook` (`addressid`, `setdefault`, `emailid`, `cname`, `mobile`, `myzip`, `address`, `create_date`) VALUES
(3, 1, 9, '林小強', '0912345678', '407', '工業區一路100號', '2021-04-22 02:39:50'),
(4, 0, 10, '李小明', '0934567891', '105', '中正路1號', '2021-04-22 02:41:48'),
(8, 0, 10, '陳小信', '0934567891', '223', '中正路1號', '2021-04-22 02:41:48'),
(9, 0, 10, '曹小成', '0934567891', '290', '中正路1號', '2021-04-22 02:41:48'),
(10, 1, 10, '張山山', '0934567891', '407', '工業區一路100號', '2021-04-23 12:00:59');

-- --------------------------------------------------------

--
-- 資料表結構 `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
  `caro_id` int(3) NOT NULL auto_increment COMMENT '輪播編號',
  `caro_title` varchar(50) collate utf8_unicode_ci default NULL COMMENT '輪播標題',
  `caro_content` varchar(100) collate utf8_unicode_ci default NULL COMMENT '輪播內容介紹',
  `caro_online` tinyint(1) NOT NULL default '1' COMMENT '上下架',
  `caro_sort` int(3) NOT NULL COMMENT '輪播排序',
  `caro_pic` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '輪播圖檔名稱',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`caro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 資料表的匯出資料 `carousel`
--

INSERT INTO `carousel` (`caro_id`, `caro_title`, `caro_content`, `caro_online`, `caro_sort`, `caro_pic`, `p_id`, `create_date`) VALUES
(1, '嚴選食材 ', '奶油、餅皮到水果，只要能提升品質的食材，我們絲毫不吝嗇', 1, 1, 'product_intro_01.jpg', 13, '2021-03-18 03:59:55'),
(2, '手工製作', '不用機器大量生產，堅持用手指的溫度創造你我口中的小確幸', 1, 2, 'product_intro_02.jpg', 49, '2021-03-18 03:59:55'),
(3, '創意甜品', '你的喜悅是我們的動力，讓我們不斷創造特色甜品滿足你多變的舌尖', 1, 3, 'product_intro_03.jpg', 50, '2021-03-18 03:59:55');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int(10) NOT NULL auto_increment COMMENT '購物車編號',
  `emailid` int(10) default NULL COMMENT '會員編號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `qty` int(3) NOT NULL COMMENT '產品數量',
  `orderid` varchar(30) collate utf8_unicode_ci default NULL COMMENT '訂單編號',
  `status` tinyint(4) NOT NULL default '1' COMMENT '訂單處理狀態',
  `ip` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '訂購者的IP',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '加入購物車時間',
  PRIMARY KEY  (`cartid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`cartid`, `emailid`, `p_id`, `qty`, `orderid`, `status`, `ip`, `create_date`) VALUES
(66, 10, 42, 3, '1619161669175448', 1, '::1', '2021-04-23 07:06:48'),
(67, 10, 43, 3, '1619161669175448', 1, '::1', '2021-04-23 07:06:54'),
(68, 10, 15, 13, '1619161669175448', 1, '::1', '2021-04-23 07:07:03'),
(69, 10, 27, 2, '1619161669175448', 1, '::1', '2021-04-23 07:07:15'),
(70, 10, 51, 1, '1619161734581887', 1, '::1', '2021-04-23 07:08:16'),
(71, 10, 47, 1, '1619161734581887', 1, '::1', '2021-04-23 07:08:20'),
(72, 10, 46, 1, '1619161734581887', 1, '::1', '2021-04-23 07:08:24'),
(74, 10, 27, 1, '1619181180278775', 1, '::1', '2021-04-23 07:22:31'),
(76, 10, 26, 1, '1619181180278775', 1, '::1', '2021-04-23 07:22:38'),
(78, 10, 51, 1, '1619260500232495', 1, '::1', '2021-04-23 12:39:53'),
(79, 10, 28, 2, '1619260500232495', 1, '::1', '2021-04-23 12:39:56'),
(80, 10, 25, 3, '1619260500232495', 1, '::1', '2021-04-23 12:39:59'),
(81, 10, 21, 1, '1619260500232495', 1, '::1', '2021-04-23 12:40:03'),
(82, 10, 48, 1, '1619261102143533', 1, '::1', '2021-04-24 10:43:59'),
(83, 10, 47, 1, '1619261102143533', 1, '::1', '2021-04-24 10:44:02'),
(84, 10, 46, 1, '1619261102143533', 1, '::1', '2021-04-24 10:44:04'),
(86, 10, 45, 1, '1619261102143533', 1, '::1', '2021-04-24 10:44:12'),
(87, 10, 20, 1, '1619261102143533', 1, '::1', '2021-04-24 10:44:20'),
(88, 10, 19, 1, '1619261102143533', 1, '::1', '2021-04-24 10:44:25'),
(89, 10, 50, 1, '1619261151557635', 1, '::1', '2021-04-24 10:45:29'),
(97, NULL, 19, 1, NULL, 1, '::1', '2023-09-13 05:31:40'),
(104, NULL, 14, 2, NULL, 1, '::1', '2023-09-22 00:49:06'),
(98, NULL, 18, 2, NULL, 1, '::1', '2023-09-14 00:14:12'),
(103, NULL, 19, 2, NULL, 1, '::1', '2023-09-20 06:18:35');

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `AutoNo` int(10) NOT NULL auto_increment COMMENT '城市編號',
  `Name` varchar(150) collate utf8_unicode_ci NOT NULL COMMENT '城市名稱',
  `cityOrder` tinyint(2) NOT NULL COMMENT '標記',
  `State` smallint(6) NOT NULL COMMENT '狀態',
  PRIMARY KEY  (`AutoNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- 資料表的匯出資料 `city`
--

INSERT INTO `city` (`AutoNo`, `Name`, `cityOrder`, `State`) VALUES
(1, '臺北市', 0, 0),
(2, '基隆市', 0, 0),
(3, '新北市', 0, 0),
(4, '宜蘭縣', 0, 0),
(5, '新竹市', 0, 0),
(6, '新竹縣', 0, 0),
(7, '桃園市', 0, 0),
(8, '苗栗縣', 0, 0),
(9, '台中市', 0, 0),
(10, '彰化縣', 0, 0),
(11, '南投縣', 0, 0),
(12, '雲林縣', 0, 0),
(13, '嘉義市', 0, 0),
(14, '嘉義縣', 0, 0),
(15, '台南市', 0, 0),
(16, '高雄市', 0, 0),
(17, '南海諸島', 0, 0),
(18, '澎湖縣', 0, 0),
(19, '屏東縣', 0, 0),
(20, '台東縣', 0, 0),
(21, '花蓮縣', 0, 0),
(22, '金門縣', 0, 0),
(23, '連江縣', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `hot`
--

CREATE TABLE IF NOT EXISTS `hot` (
  `h_id` int(3) NOT NULL auto_increment COMMENT '熱銷商品流水號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `h_sort` int(3) default NULL COMMENT '熱銷商品排名',
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 資料表的匯出資料 `hot`
--

INSERT INTO `hot` (`h_id`, `p_id`, `h_sort`) VALUES
(1, 16, 1),
(2, 19, 2),
(3, 17, 3),
(4, 18, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `emailid` int(11) NOT NULL auto_increment COMMENT 'email流水號',
  `email` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT 'email帳號',
  `pw1` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT '密碼',
  `active` tinyint(1) NOT NULL default '1' COMMENT '是否啟動',
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '中文姓名',
  `tssn` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '身份證字號',
  `birthday` date NOT NULL COMMENT '生日',
  `imgname` varchar(20) collate utf8_unicode_ci default NULL COMMENT '相片檔名',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`emailid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`emailid`, `email`, `pw1`, `active`, `cname`, `tssn`, `birthday`, `imgname`, `create_date`) VALUES
(9, 'test@gmail.com', '123456', 1, '林小強', 'A123456789', '2021-04-01', '', '2021-04-22 02:39:50'),
(10, 'te@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '李小明', 'A223456789', '2021-04-01', '', '2021-04-22 02:41:48');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(10) NOT NULL auto_increment COMMENT '產品編號',
  `classid` int(3) NOT NULL COMMENT '產品類別',
  `p_name` varchar(200) collate utf8_unicode_ci NOT NULL COMMENT '產品名稱',
  `p_intro` varchar(200) collate utf8_unicode_ci default NULL COMMENT '產品簡介',
  `p_price` int(11) default NULL COMMENT '產品單價',
  `p_open` tinyint(1) NOT NULL default '1' COMMENT '上架',
  `p_content` text collate utf8_unicode_ci COMMENT '產品詳細規格',
  `p_date` timestamp NULL default CURRENT_TIMESTAMP COMMENT '產品輸入日期',
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`p_id`, `classid`, `p_name`, `p_intro`, `p_price`, `p_open`, `p_content`, `p_date`) VALUES
(13, 22, '重乳酪蛋糕', '嚴選特級乳酪製作，經典中的經典\r\n紮實的乳酪層每一口，\r\n都能吃到滿滿的濃郁乳酪\r\n絕對是乳酪迷的首選', 530, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_20210628101808168402.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_tasting_20210712105341107608.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>底層：餅乾(進口小麥胚芽餅)<br>\r\n            特色：採用天然香純的 Cream Cheese 蒸烤製成<br>\r\n            入口即化，幸福的感覺從入口開始。<br>\r\n<br>\r\n            規格說明：<br>\r\n            八吋蛋糕(蛋奶素)，<br>\r\n            直徑約 19 公分(±1 公分)高盒裝，<br>\r\n            其最大裝箱數為 12 盒。<br>\r\n\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2017-08-06 16:00:00'),
(14, 21, 'OREO乳酪蛋糕', '濃郁乳酪奶香搭配著oreo酥脆口感\r\n與厚實的巧克力\r\n乳酪蛋糕的新層次\r\n無法言喻的迷人滋味', 580, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_20220819095028103271.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_tasting_20210712105341107608.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>底層：餅乾(進口小麥胚芽餅)<br>\r\n            特色：採用天然香純的 Cream Cheese 蒸烤製成<br>\r\n            內餡：奶油乳酪搭配著oreo巧克力酥脆口感<br>\r\n            入口即化，幸福的感覺從入口開始。<br>\r\n<br>\r\n            規格說明：<br>\r\n            八吋蛋糕(蛋奶素)，<br>\r\n            直徑約 19 公分(±1 公分)高盒裝，<br>\r\n            其最大裝箱數為 12 盒。<br>\r\n\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2017-08-06 16:00:00'),
(15, 22, '萌熊重乳酪--2入禮盒', '超萌熊掌造型結合重乳酪蛋糕\r\n卡哇伊造型讓人看了忍不住尖叫\r\n療癒系x真材實料\r\n帶給你不同的驚喜！！', 250, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_20220819093015621679.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_tasting_20210712105341107608.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>\r\n            特色：採用天然香純的 Cream Cheese 蒸烤製成<br>\r\n            內餡：原味奶油乳酪搭配著oreo口味酥脆口感<br>\r\n            來自日本的原料，<br>層疊出超濃厚口感。<br><br>\r\n            規格說明：<br>\r\n            原味(2入組)NT. 250<br>原味(1入)+Oreo(1入)NT. 260 <br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:15:16'),
(16, 22, 'Cream sandies限定版', '還在思考如何慶生嗎?\r\n又是餅乾又是蛋糕又是冰淇淋\r\n三種口感通通給你\r\n手工製作，要提前預訂喔！', 1200, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_descripti2.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_descripti1.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>\r\n            特色：<br>\r\n酥脆的曲奇餅中夾了帶有空氣的淡奶，當你咬一口時，<br>\r\n你一定會對他柔軟滑順全新的質地和味道感到驚訝，<br> \r\n平衡且細緻，能以其他食材巧妙融合製作出更多精彩美味。<br>\r\n內餡：<br>濃黑72％巧克力、萊姆葡萄、愛媛藍莓、夏威夷果仁、仲夏莓果<br>\r\n泰式奶茶、沖繩黑糖提拉米蘇QQ、經典原味、焦糖核桃起司、<br>\r\n宇治抹茶牛乳、摩卡咖啡、君度香橙乳酪、靜岡抹茶紅豆<br>\r\n覆盆莓、沖繩海鹽花生、和歌山水蜜桃、宇治抹茶、青森蘋果、<br>\r\n山梨櫻桃、福岡草莓<br><br>\r\n\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:18:41'),
(17, 22, '北海道奶油三明治冰淇淋', 'Cream sandies\r\n酥脆的餅中夾入了淡奶油和香氣\r\n口味高達30種，小孩才選擇，\r\n我通通都要吃看看～', 550, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_descripti3.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_description_202212161227363510.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>\r\n            特色：<br>\r\n酥脆的曲奇餅中夾了帶有空氣的淡奶，當你咬一口時，<br>\r\n你一定會對他柔軟滑順全新的質地和味道感到驚訝，<br> \r\n平衡且細緻，能以其他食材巧妙融合製作出更多精彩美味。<br>\r\n內餡：<br>濃黑72％巧克力、萊姆葡萄、愛媛藍莓、夏威夷果仁、仲夏莓果<br>\r\n泰式奶茶、沖繩黑糖提拉米蘇QQ、經典原味、焦糖核桃起司、<br>\r\n宇治抹茶牛乳、摩卡咖啡、君度香橙乳酪、靜岡抹茶紅豆<br>\r\n覆盆莓、沖繩海鹽花生、和歌山水蜜桃、宇治抹茶、青森蘋果、<br>\r\n山梨櫻桃、福岡草莓<br><br>\r\n\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:18:41'),
(18, 26, '十勝牛乳布丁-六入禮盒', '100%使用北海道十勝鮮乳製作\r\n不加一滴水\r\n濃厚的乳香滑順細緻的口感\r\n大人小孩都喜愛的甜點人氣王', 500, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_20210314232704302428.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_picture_20210314001559519988.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>特色：<br>\r\n自然純淨的乳香，<br>\r\n吃來香濃醇厚，<br> \r\n如絲綢般滑順細緻的口感，<br>\r\n一入口生乳風味瞬間化開，<br>\r\n宛如現喝北海道鮮奶一樣。<br><br>\r\n規格說明：<br>\r\n一盒六入<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:18:41'),
(19, 25, '北海道焦糖奶油餅乾', '外層餅乾口感酥脆，厚實又有獨特乳香味，\r\n內餡濃郁的天然奶油+滑順不粘牙的焦糖，\r\n咬下那一瞬間爆漿！', 320, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n          <img src="./images/product_description_20220810142625488815.jpg" width="100%" height="auto">\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>特色：<br>\r\n連續大熱門商品~絕對要買啦<br>\r\n餅乾研發是由鑄鐵工匠獨特訂製<br>\r\n熱➡壓➡烤製技術工法<br>\r\n夾在鑄鐵板中熱壓成形烘烤<br>\r\n適中溫火逼去多餘的油質！<br>\r\n外層餅乾口感酥脆厚實又有獨特乳香味<br>\r\n內餡濃郁的天然奶油+滑順不粘牙的焦糖<br>\r\n夾在上下2層酥脆的餅乾咬下那一瞬間爆漿<br><br>\r\n規格說明：<br>\r\n一盒五入<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:18:41'),
(20, 25, '北海道焦糖奶油+濃黑巧克力', '餅乾使用兩種不同濃度的可可粉\r\n內餡由奶油、巧克力、嚴選咖啡豆\r\n少許萊姆酒香氣結合而成的巧克力焦糖\r\n十足大人味', 320, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n          <img src="./images/product_picture_202208102320261906152.jpg" width="100%" height="auto">\r\n        </div>\r\n        <div class="col-md-6">\r\n          <h2>產品說明</h2>\r\n          <p>特色：<br>\r\n餅乾和原味奶油餅的製作方式一樣<br>\r\n都是利用模具壓縮來達到酥脆扎實的口感<br>\r\n一口咬下夾著流心內餡的奶油餅乾<br>\r\n滿滿可可風味令人滿足<br>\r\n十足大人味<br><br>\r\n內餡：<br>\r\n奶油，以及由巧克力與嚴選咖啡豆<br>\r\n少許萊姆酒香氣結合而成的巧克力焦糖<br><br>\r\n規格說明：<br>\r\n一盒五入<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2021-03-10 07:18:41'),
(22, 24, '可可-牛牛曲奇餅', '頂級法芙娜100%可可粉<br>\r\n融合著淡淡奶香<br>\r\n纏繞在心中的濃郁苦甜滋味<br><br>\r\n規格：<br>\r\nNT. 360 (一層)<br>\r\nNT. 600(二層)<br>', 360, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_20210714113204108248.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_description_20210714113539185409.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n         \r\n <h2>產品說明</h2>\r\n          <p>特色：<br>\r\n遵循傳統工法製成84%含乳量的發酵奶油<br>\r\n無添加人工香精，沒有強烈的香味，<br>\r\n但我們的餅乾有淡淡的後韻，<br>\r\n真材實料，真心誠意，一口接一口，讓相聚的午茶時光更幸福。</p>\r\n\r\n<p>內餡：<br>\r\n嚴選法國品牌「LESCURE萊思克」AOP產區認證奶油<br>\r\n來自最經典的口味<br>\r\n質地醇厚細緻，甜度適中\r\n</div>\r\n</p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2023-08-28 01:28:26'),
(21, 24, '原味-牛牛曲奇餅', '遵循傳統工法製成84%<br>\r\n含乳量的發酵奶油<br>\r\n無添加人工香精，<br>沒有強烈的香味，<br>\r\n但我們的餅乾有淡淡的後韻<br>\r\n真材實料，真心誠意，<br>\r\n一口接一口，<br>\r\n讓相聚的午茶時光更幸福。<br>', 360, 1, '<div id="description">\r\n    <div class="container-fluid">\r\n      <div class="row">\r\n        <div class="col-md-6">\r\n        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">\r\n  <div class="carousel-inner">\r\n    <div class="carousel-item active" data-bs-interval="10000">\r\n      <img src="./images/product_description_202107131029557879.jpg" class="d-block w-100" alt="...">\r\n    </div>\r\n    <div class="carousel-item" data-bs-interval="2000">\r\n      <img src="./images/product_description_20210713102250926344.jpg" class="d-block w-100" alt="...">\r\n    </div>   \r\n  </div>\r\n  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">\r\n    <span class="carousel-control-prev-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Previous</span>\r\n  </button>\r\n  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">\r\n    <span class="carousel-control-next-icon" aria-hidden="true"></span>\r\n    <span class="visually-hidden">Next</span>\r\n  </button>\r\n</div>\r\n\r\n        </div>\r\n        <div class="col-md-6">\r\n         \r\n <h2>產品說明</h2>\r\n          <p>特色：<br>\r\n遵循傳統工法製成84%含乳量的發酵奶油<br>\r\n無添加人工香精，沒有強烈的香味，<br>\r\n但我們的餅乾有淡淡的後韻，<br>\r\n真材實料，真心誠意，一口接一口，讓相聚的午茶時光更幸福。</p>\r\n<p>內餡：<br>\r\n嚴選法國品牌「LESCURE萊思克」AOP產區認證奶油<br>\r\n來自最經典的口味<br>\r\n質地醇厚細緻，甜度適中\r\n</div>\r\n</p>\r\n        </div>\r\n      </div>\r\n      <div class="row mt-5">\r\n        <div class="col-md-4">\r\n          <h3 class="tit">注意事項</h3>\r\n          所有蛋糕產品皆以冷凍保鮮，<br>\r\n          若蛋糕上方有白色結霜、<br>\r\n          或者內餡有碎冰皆屬正常現象，\r\n          稍為退冰後即可，請安心食用。\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">取貨與付款方式</h3>\r\n          單盒運費 $ 160<br>\r\n          2 盒 ~ 5 盒運費 $ 225<br>\r\n          6 盒 ~ 14 盒運費 $ 290<br>\r\n          超過 14 盒將分箱寄送，<br>\r\n          超過的部分按上述方式計算，<br>\r\n          例如：訂購 17 盒，運費為 $290(第一箱14盒) + $225(第二箱3盒) 共為 $515<br>\r\n          若有訂單中預購商品，將會分開出貨，運費另外計算<br>\r\n          若需要寄送不同地址，<br>\r\n          請分開下單<br>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h3 class="tit">營養標示</h3>\r\n          每一份量 100 公克<br>\r\n          本包裝含 12 分<br>\r\n          ----------------------<br>\r\n          每份 每 100 公克<br>\r\n          ---------------------------<br>\r\n          熱量 343.5 大卡<br>\r\n          蛋白質 7.3 公克<br>\r\n          脂肪 22.7 公克<br>\r\n          飽和脂肪 15.8 公克<br>\r\n          反式脂肪 0 公克<br>\r\n          碳水化合物 27.5 公克<br>\r\n          糖 7.2 公克<br>\r\n          鈉 260 毫克<br>\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n', '2023-08-24 08:32:51');

-- --------------------------------------------------------

--
-- 資料表結構 `product_img`
--

CREATE TABLE IF NOT EXISTS `product_img` (
  `img_id` int(11) NOT NULL auto_increment COMMENT '圖檔編號',
  `p_id` int(10) NOT NULL COMMENT '產品編號',
  `img_file` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '圖檔名稱',
  `sort` int(2) NOT NULL COMMENT '圖片順序',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '建立日期',
  PRIMARY KEY  (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=116 ;

--
-- 資料表的匯出資料 `product_img`
--

INSERT INTO `product_img` (`img_id`, `p_id`, `img_file`, `sort`, `create_date`) VALUES
(4, 13, 'product_picture_20210628100842629761.jpg', 2, '2021-03-10 06:36:26'),
(5, 13, 'product_picture_20210628100859247004.jpg', 1, '2021-03-10 06:36:26'),
(6, 13, 'product_picture_20210628100939242957.jpg', 3, '2021-03-10 06:37:23'),
(7, 14, 'product_picture_20210628102257211708.jpg', 2, '2021-03-10 06:37:23'),
(8, 14, 'product_picture_20210628102251747592.jpg', 1, '2021-03-10 06:37:23'),
(9, 14, 'product_picture_20210628102303290434.jpg', 3, '2021-03-10 06:37:23'),
(10, 15, 'bearhand1.jpg', 2, '2021-03-10 07:16:13'),
(11, 15, 'bearhand2.jpg', 1, '2021-03-10 07:16:13'),
(12, 16, 'creamHBD.jpg', 1, '2021-03-10 07:20:07'),
(13, 16, 'creamHBD1.jpg', 2, '2021-03-10 07:20:07'),
(14, 17, 'product_picture_20221222110238268596.jpg', 1, '2021-03-10 07:20:07'),
(15, 17, 'product_picture_202212161209128793922.jpg', 2, '2021-03-10 07:20:07'),
(16, 17, 'product_picture_202212161209128793923.jpg', 3, '2021-03-10 07:20:07'),
(18, 18, 'product_picture_20210314001547818059.jpg', 1, '2021-03-17 03:06:03'),
(19, 18, 'product_picture_20210218102903391352.jpg', 2, '2021-03-17 03:06:03'),
(20, 18, 'product_picture_20210316091715737966.jpg', 3, '2021-03-17 03:06:03'),
(21, 19, 'product_picture_20220810142219101855.jpg', 1, '2021-03-17 03:09:50'),
(22, 19, 'product_picture_20220810142412277511.jpg', 2, '2021-03-17 03:09:50'),
(23, 20, 'product_picture_20220810232026190615.jpg', 1, '2021-03-17 03:16:12'),
(24, 20, 'product_picture_202208102320261906151.jpg', 2, '2021-03-17 03:16:12'),
(25, 20, 'product_picture_202208102320261906152.jpg', 3, '2021-03-17 03:16:12'),
(31, 21, 'product_picture_202107131019129211053.jpg', 2, '2023-09-05 05:32:45'),
(30, 21, 'product_picture_202107131019129211051.jpg', 3, '2023-09-05 05:31:16'),
(29, 22, 'product_picture_20210314005730316353.jpg', 2, '2023-09-05 05:16:44'),
(28, 22, 'product_picture_20220714195101475439.jpg', 3, '2023-09-05 05:15:08'),
(27, 22, 'product_picture_20220714195107248386.jpg', 1, '2023-08-28 01:50:46'),
(32, 21, 'product_picture_20210713101912921105.jpg', 1, '2023-09-05 05:59:53'),
(33, 15, 'product_card03.jpg', 3, '2023-09-22 00:17:15'),
(34, 16, 'creamHBD4.jpg', 0, '2023-09-22 00:28:17');

-- --------------------------------------------------------

--
-- 資料表結構 `pyclass`
--

CREATE TABLE IF NOT EXISTS `pyclass` (
  `classid` int(3) NOT NULL auto_increment,
  `level` int(2) NOT NULL,
  `cname` varchar(30) collate utf8_unicode_ci NOT NULL,
  `sort` int(3) NOT NULL,
  `uplink` int(3) NOT NULL,
  `create_date` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- 資料表的匯出資料 `pyclass`
--

INSERT INTO `pyclass` (`classid`, `level`, `cname`, `sort`, `uplink`, `create_date`) VALUES
(1, 1, '人氣蛋糕系列', 1, 0, '0000-00-00 00:00:00'),
(2, 1, '熱門下午茶甜點', 2, 0, '0000-00-00 00:00:00'),
(21, 2, '巧克力系列', 1, 1, '0000-00-00 00:00:00'),
(22, 2, '乳酪系列', 2, 1, '2023-08-24 01:12:38'),
(23, 2, '抹茶系列', 3, 1, '0000-00-00 00:00:00'),
(24, 2, '曲奇餅', 1, 2, '2023-08-23 04:47:41'),
(25, 2, '夾心餅乾', 2, 2, '0000-00-00 00:00:00'),
(26, 2, '布丁', 3, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `townNo` bigint(20) NOT NULL auto_increment COMMENT '鄕鎮市編號',
  `Name` varchar(150) collate utf8_unicode_ci NOT NULL COMMENT '鄕鎮市名稱',
  `Post` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT '郵遞區號',
  `State` smallint(6) NOT NULL COMMENT '狀態',
  `AutoNo` int(10) NOT NULL COMMENT '上層城市編號連結',
  PRIMARY KEY  (`townNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=374 ;

--
-- 資料表的匯出資料 `town`
--

INSERT INTO `town` (`townNo`, `Name`, `Post`, `State`, `AutoNo`) VALUES
(1, '中正區', '100', 0, 1),
(2, '大同區', '103', 0, 1),
(3, '中山區', '104', 0, 1),
(4, '松山區', '105', 0, 1),
(5, '大安區', '106', 0, 1),
(6, '萬華區', '108', 0, 1),
(7, '信義區', '110', 0, 1),
(8, '士林區', '111', 0, 1),
(9, '北投區', '112', 0, 1),
(10, '內湖區', '114', 0, 1),
(11, '南港區', '115', 0, 1),
(12, '文山區', '116', 0, 1),
(13, '仁愛區', '200', 0, 2),
(14, '信義區', '201', 0, 2),
(15, '中正區', '202', 0, 2),
(16, '中山區', '203', 0, 2),
(17, '安樂區', '204', 0, 2),
(18, '暖暖區', '205', 0, 2),
(19, '七堵區', '206', 0, 2),
(20, '萬里區', '207', 0, 3),
(21, '金山區', '208', 0, 3),
(22, '板橋區', '220', 0, 3),
(23, '汐止區', '221', 0, 3),
(24, '深坑區', '222', 0, 3),
(25, '石碇區', '223', 0, 3),
(26, '瑞芳區', '224', 0, 3),
(27, '平溪區', '226', 0, 3),
(28, '雙溪區', '227', 0, 3),
(29, '貢寮區', '228', 0, 3),
(30, '新店區', '231', 0, 3),
(31, '坪林區', '232', 0, 3),
(32, '烏來區', '233', 0, 3),
(33, '永和區', '234', 0, 3),
(34, '中和區', '235', 0, 3),
(35, '土城區', '236', 0, 3),
(36, '三峽區', '237', 0, 3),
(37, '樹林區', '238', 0, 3),
(38, '鶯歌區', '239', 0, 3),
(39, '三重區', '241', 0, 3),
(40, '新莊區', '242', 0, 3),
(41, '泰山區', '243', 0, 3),
(42, '林口區', '244', 0, 3),
(43, '蘆洲區', '247', 0, 3),
(44, '五股區', '248', 0, 3),
(45, '八里區', '249', 0, 3),
(46, '淡水區', '251', 0, 3),
(47, '三芝區', '252', 0, 3),
(48, '石門區', '253', 0, 3),
(49, '宜蘭市', '260', 0, 4),
(50, '頭城鎮', '261', 0, 4),
(51, '礁溪鄉', '262', 0, 4),
(52, '壯圍鄉', '263', 0, 4),
(53, '員山鄉', '264', 0, 4),
(54, '羅東鎮', '265', 0, 4),
(55, '三星鄉', '266', 0, 4),
(56, '大同鄉', '267', 0, 4),
(57, '五結鄉', '268', 0, 4),
(58, '冬山鄉', '269', 0, 4),
(59, '蘇澳鎮', '270', 0, 4),
(60, '南澳鄉', '272', 0, 4),
(61, '釣魚台列嶼', '290', 0, 4),
(62, '新竹市(東區)', '300', 0, 5),
(63, '竹北市', '302', 0, 6),
(64, '湖口鄉', '303', 0, 6),
(65, '新豐鄉', '304', 0, 6),
(66, '新埔鎮', '305', 0, 6),
(67, '關西鎮', '306', 0, 6),
(68, '芎林鄉', '307', 0, 6),
(69, '寶山鄉', '308', 0, 6),
(70, '竹東鎮', '310', 0, 6),
(71, '五峰鄉', '311', 0, 6),
(72, '橫山鄉', '312', 0, 6),
(73, '尖石鄉', '313', 0, 6),
(74, '北埔鄉', '314', 0, 6),
(75, '峨眉鄉', '315', 0, 6),
(76, '中壢區', '320', 0, 7),
(77, '平鎮區', '324', 0, 7),
(78, '龍潭區', '325', 0, 7),
(79, '楊梅區', '326', 0, 7),
(80, '新屋區', '327', 0, 7),
(81, '觀音區', '328', 0, 7),
(82, '桃園區', '330', 0, 7),
(83, '龜山區', '333', 0, 7),
(84, '八德區', '334', 0, 7),
(85, '大溪區', '335', 0, 7),
(86, '復興區', '336', 0, 7),
(87, '大園區', '337', 0, 7),
(88, '蘆竹區', '338', 0, 7),
(89, '竹南鎮', '350', 0, 8),
(90, '頭份市', '351', 0, 8),
(91, '三灣鄉', '352', 0, 8),
(92, '南庄鄉', '353', 0, 8),
(93, '獅潭鄉', '354', 0, 8),
(94, '後龍鎮', '356', 0, 8),
(95, '通霄鎮', '357', 0, 8),
(96, '苑裡鎮', '358', 0, 8),
(97, '苗栗市', '360', 0, 8),
(98, '造橋鄉', '361', 0, 8),
(99, '頭屋鄉', '362', 0, 8),
(100, '公館鄉', '363', 0, 8),
(101, '大湖鄉', '364', 0, 8),
(102, '泰安鄉', '365', 0, 8),
(103, '銅鑼鄉', '366', 0, 8),
(104, '三義鄉', '367', 0, 8),
(105, '西湖鄉', '368', 0, 8),
(106, '卓蘭鎮', '369', 0, 8),
(107, '中區', '400', 0, 9),
(108, '東區', '401', 0, 9),
(109, '南區', '402', 0, 9),
(110, '西區', '403', 0, 9),
(111, '北區', '404', 0, 9),
(112, '北屯區', '406', 0, 9),
(113, '西屯區', '407', 0, 9),
(114, '南屯區', '408', 0, 9),
(115, '太平區', '411', 0, 9),
(116, '大里區', '412', 0, 9),
(117, '霧峰區', '413', 0, 9),
(118, '烏日區', '414', 0, 9),
(119, '豐原區', '420', 0, 9),
(120, '后里區', '421', 0, 9),
(121, '石岡區', '422', 0, 9),
(122, '東勢區', '423', 0, 9),
(123, '和平區', '424', 0, 9),
(124, '新社區', '426', 0, 9),
(125, '潭子區', '427', 0, 9),
(126, '大雅區', '428', 0, 9),
(127, '神岡區', '429', 0, 9),
(128, '大肚區', '432', 0, 9),
(129, '沙鹿區', '433', 0, 9),
(130, '龍井區', '434', 0, 9),
(131, '梧棲區', '435', 0, 9),
(132, '清水區', '436', 0, 9),
(133, '大甲區', '437', 0, 9),
(134, '外埔區', '438', 0, 9),
(135, '大安區', '439', 0, 9),
(136, '彰化市', '500', 0, 10),
(137, '芬園鄉', '502', 0, 10),
(138, '花壇鄉', '503', 0, 10),
(139, '秀水鄉', '504', 0, 10),
(140, '鹿港鎮', '505', 0, 10),
(141, '福興鄉', '506', 0, 10),
(142, '線西鄉', '507', 0, 10),
(143, '和美鎮', '508', 0, 10),
(144, '伸港鄉', '509', 0, 10),
(145, '員林市', '510', 0, 10),
(146, '社頭鄉', '511', 0, 10),
(147, '永靖鄉', '512', 0, 10),
(148, '埔心鄉', '513', 0, 10),
(149, '溪湖鎮', '514', 0, 10),
(150, '大村鄉', '515', 0, 10),
(151, '埔鹽鄉', '516', 0, 10),
(152, '田中鎮', '520', 0, 10),
(153, '北斗鎮', '521', 0, 10),
(154, '田尾鄉', '522', 0, 10),
(155, '埤頭鄉', '523', 0, 10),
(156, '溪州鄉', '524', 0, 10),
(157, '竹塘鄉', '525', 0, 10),
(158, '二林鎮', '526', 0, 10),
(159, '大城鄉', '527', 0, 10),
(160, '芳苑鄉', '528', 0, 10),
(161, '二水鄉', '530', 0, 10),
(162, '南投市', '540', 0, 11),
(163, '中寮鄉', '541', 0, 11),
(164, '草屯鎮', '542', 0, 11),
(165, '國姓鄉', '544', 0, 11),
(166, '埔里鎮', '545', 0, 11),
(167, '仁愛鄉', '546', 0, 11),
(168, '名間鄉', '551', 0, 11),
(169, '集集鎮', '552', 0, 11),
(170, '水里鄉', '553', 0, 11),
(171, '魚池鄉', '555', 0, 11),
(172, '信義鄉', '556', 0, 11),
(173, '竹山鎮', '557', 0, 11),
(174, '鹿谷鄉', '558', 0, 11),
(175, '斗南鎮', '630', 0, 12),
(176, '大埤鄉', '631', 0, 12),
(177, '虎尾鎮', '632', 0, 12),
(178, '土庫鎮', '633', 0, 12),
(179, '褒忠鄉', '634', 0, 12),
(180, '東勢鄉', '635', 0, 12),
(181, '臺西鄉', '636', 0, 12),
(182, '崙背鄉', '637', 0, 12),
(183, '麥寮鄉', '638', 0, 12),
(184, '斗六市', '640', 0, 12),
(185, '林內鄉', '643', 0, 12),
(186, '古坑鄉', '646', 0, 12),
(187, '莿桐鄉', '647', 0, 12),
(188, '西螺鎮', '648', 0, 12),
(189, '二崙鄉', '649', 0, 12),
(190, '北港鎮', '651', 0, 12),
(191, '水林鄉', '652', 0, 12),
(192, '口湖鄉', '653', 0, 12),
(193, '四湖鄉', '654', 0, 12),
(194, '元長鄉', '655', 0, 12),
(195, '嘉義市(東區)', '600', 0, 13),
(196, '番路鄉', '602', 0, 14),
(197, '梅山鄉', '603', 0, 14),
(198, '竹崎鄉', '604', 0, 14),
(199, '阿里山鄉', '605', 0, 14),
(200, '中埔鄉', '606', 0, 14),
(201, '大埔鄉', '607', 0, 14),
(202, '水上鄉', '608', 0, 14),
(203, '鹿草鄉', '611', 0, 14),
(204, '太保市', '612', 0, 14),
(205, '朴子市', '613', 0, 14),
(206, '東石鄉', '614', 0, 14),
(207, '六腳鄉', '615', 0, 14),
(208, '新港鄉', '616', 0, 14),
(209, '民雄鄉', '621', 0, 14),
(210, '大林鎮', '622', 0, 14),
(211, '溪口鄉', '623', 0, 14),
(212, '義竹鄉', '624', 0, 14),
(213, '布袋鎮', '625', 0, 14),
(214, '中西區', '700', 0, 15),
(215, '東區', '701', 0, 15),
(216, '南區', '702', 0, 15),
(217, '北區', '704', 0, 15),
(218, '安平區', '708', 0, 15),
(219, '安南區', '709', 0, 15),
(220, '永康區', '710', 0, 15),
(221, '歸仁區', '711', 0, 15),
(222, '新化區', '712', 0, 15),
(223, '左鎮區', '713', 0, 15),
(224, '玉井區', '714', 0, 15),
(225, '楠西區', '715', 0, 15),
(226, '南化區', '716', 0, 15),
(227, '仁德區', '717', 0, 15),
(228, '關廟區', '718', 0, 15),
(229, '龍崎區', '719', 0, 15),
(230, '官田區', '720', 0, 15),
(231, '麻豆區', '721', 0, 15),
(232, '佳里區', '722', 0, 15),
(233, '西港區', '723', 0, 15),
(234, '七股區', '724', 0, 15),
(235, '將軍區', '725', 0, 15),
(236, '學甲區', '726', 0, 15),
(237, '北門區', '727', 0, 15),
(238, '新營區', '730', 0, 15),
(239, '後壁區', '731', 0, 15),
(240, '白河區', '732', 0, 15),
(241, '東山區', '733', 0, 15),
(242, '六甲區', '734', 0, 15),
(243, '下營區', '735', 0, 15),
(244, '柳營區', '736', 0, 15),
(245, '鹽水區', '737', 0, 15),
(246, '善化區', '741', 0, 15),
(247, '大內區', '742', 0, 15),
(248, '山上區', '743', 0, 15),
(249, '新市區', '744', 0, 15),
(250, '安定區', '745', 0, 15),
(251, '新興區', '800', 0, 16),
(252, '前金區', '801', 0, 16),
(253, '苓雅區', '802', 0, 16),
(254, '鹽埕區', '803', 0, 16),
(255, '鼓山區', '804', 0, 16),
(256, '旗津區', '805', 0, 16),
(257, '前鎮區', '806', 0, 16),
(258, '三民區', '807', 0, 16),
(259, '楠梓區', '811', 0, 16),
(260, '小港區', '812', 0, 16),
(261, '左營區', '813', 0, 16),
(262, '仁武區', '814', 0, 16),
(263, '大社區', '815', 0, 16),
(264, '岡山區', '820', 0, 16),
(265, '路竹區', '821', 0, 16),
(266, '阿蓮區', '822', 0, 16),
(267, '田寮區', '823', 0, 16),
(268, '燕巢區', '824', 0, 16),
(269, '橋頭區', '825', 0, 16),
(270, '梓官區', '826', 0, 16),
(271, '彌陀區', '827', 0, 16),
(272, '永安區', '828', 0, 16),
(273, '湖內區', '829', 0, 16),
(274, '鳳山區', '830', 0, 16),
(275, '大寮區', '831', 0, 16),
(276, '林園區', '832', 0, 16),
(277, '鳥松區', '833', 0, 16),
(278, '大樹區', '840', 0, 16),
(279, '旗山區', '842', 0, 16),
(280, '美濃區', '843', 0, 16),
(281, '六龜區', '844', 0, 16),
(282, '內門區', '845', 0, 16),
(283, '杉林區', '846', 0, 16),
(284, '甲仙區', '847', 0, 16),
(285, '桃源區', '848', 0, 16),
(286, '那瑪夏區', '849', 0, 16),
(287, '茂林區', '851', 0, 16),
(288, '茄萣區', '852', 0, 16),
(289, '東沙', '817', 0, 17),
(290, '南沙', '819', 0, 17),
(291, '馬公市', '880', 0, 18),
(292, '西嶼鄉', '881', 0, 18),
(293, '望安鄉', '882', 0, 18),
(294, '七美鄉', '883', 0, 18),
(295, '白沙鄉', '884', 0, 18),
(296, '湖西鄉', '885', 0, 18),
(297, '屏東市', '900', 0, 19),
(298, '三地門鄉', '901', 0, 19),
(299, '霧臺鄉', '902', 0, 19),
(300, '瑪家鄉', '903', 0, 19),
(301, '九如鄉', '904', 0, 19),
(302, '里港鄉', '905', 0, 19),
(303, '高樹鄉', '906', 0, 19),
(304, '鹽埔鄉', '907', 0, 19),
(305, '長治鄉', '908', 0, 19),
(306, '麟洛鄉', '909', 0, 19),
(307, '竹田鄉', '911', 0, 19),
(308, '內埔鄉', '912', 0, 19),
(309, '萬丹鄉', '913', 0, 19),
(310, '潮州鎮', '920', 0, 19),
(311, '泰武鄉', '921', 0, 19),
(312, '來義鄉', '922', 0, 19),
(313, '萬巒鄉', '923', 0, 19),
(314, '崁頂鄉', '924', 0, 19),
(315, '新埤鄉', '925', 0, 19),
(316, '南州鄉', '926', 0, 19),
(317, '林邊鄉', '927', 0, 19),
(318, '東港鄉', '928', 0, 19),
(319, '琉球鄉', '929', 0, 19),
(320, '佳冬鄉', '931', 0, 19),
(321, '新園鄉', '932', 0, 19),
(322, '枋寮鄉', '940', 0, 19),
(323, '枋山鄉', '941', 0, 19),
(324, '春日鄉', '942', 0, 19),
(325, '獅子鄉', '943', 0, 19),
(326, '車城鄉', '944', 0, 19),
(327, '牡丹鄉', '945', 0, 19),
(328, '恆春鎮', '946', 0, 19),
(329, '滿州鄉', '947', 0, 19),
(330, '臺東市', '950', 0, 20),
(331, '綠島鄉', '951', 0, 20),
(332, '蘭嶼鄉', '952', 0, 20),
(333, '延平鄉', '953', 0, 20),
(334, '卑南鄉', '954', 0, 20),
(335, '鹿野鄉', '955', 0, 20),
(336, '關山鎮', '956', 0, 20),
(337, '海端鄉', '957', 0, 20),
(338, '池上鄉', '958', 0, 20),
(339, '東河鄉', '959', 0, 20),
(340, '成功鎮', '961', 0, 20),
(341, '長濱鄉', '962', 0, 20),
(342, '太麻里鄉', '963', 0, 20),
(343, '金峰鄉', '964', 0, 20),
(344, '大武鄉', '965', 0, 20),
(345, '達仁鄉', '966', 0, 20),
(346, '花蓮市', '970', 0, 21),
(347, '新城鄉', '971', 0, 21),
(348, '秀林鄉', '972', 0, 21),
(349, '吉安鄉', '973', 0, 21),
(350, '壽豐鄉', '974', 0, 21),
(351, '鳳林鎮', '975', 0, 21),
(352, '光復鄉', '976', 0, 21),
(353, '豐濱鄉', '977', 0, 21),
(354, '瑞穗鄉', '978', 0, 21),
(355, '萬榮鄉', '979', 0, 21),
(356, '玉里鎮', '981', 0, 21),
(357, '卓溪鄉', '982', 0, 21),
(358, '富里鄉', '983', 0, 21),
(359, '金沙鎮', '890', 0, 22),
(360, '金湖鎮', '891', 0, 22),
(361, '金寧鄉', '892', 0, 22),
(362, '金城鎮', '893', 0, 22),
(363, '烈嶼鄉', '894', 0, 22),
(364, '烏坵鄉', '896', 0, 22),
(365, '南竿鄉', '209', 0, 23),
(366, '北竿鄉', '210', 0, 23),
(367, '莒光鄉', '211', 0, 23),
(368, '東引鄉', '212', 0, 23),
(371, '新竹市(北區)', '300', 0, 5),
(372, '新竹市(香山區)', '300', 0, 5),
(373, '嘉義市(西區)', '600', 0, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `uorder`
--

CREATE TABLE IF NOT EXISTS `uorder` (
  `orderid` varchar(30) collate utf8_unicode_ci NOT NULL COMMENT '訂單編號',
  `emailid` int(10) NOT NULL COMMENT '會員編號',
  `addressid` int(10) NOT NULL COMMENT '收件人編號',
  `howpay` tinyint(4) NOT NULL default '1' COMMENT '如何付款',
  `status` tinyint(1) NOT NULL default '1' COMMENT '訂單處理狀態',
  `remark` varchar(200) collate utf8_unicode_ci default NULL COMMENT '備註',
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '訂單時間',
  PRIMARY KEY  (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `uorder`
--

INSERT INTO `uorder` (`orderid`, `emailid`, `addressid`, `howpay`, `status`, `remark`, `create_date`) VALUES
('1619161669175448', 10, 4, 1, 1, NULL, '2021-04-23 07:07:49'),
('1619161734581887', 10, 4, 1, 1, NULL, '2021-04-23 07:08:54'),
('1619181180278775', 10, 9, 1, 1, NULL, '2021-04-23 12:33:00'),
('1619260500232495', 10, 4, 1, 1, NULL, '2021-04-24 10:35:00'),
('1619261102143533', 10, 4, 1, 1, NULL, '2021-04-24 10:45:02'),
('1619261151557635', 10, 10, 1, 1, NULL, '2021-04-24 10:45:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
