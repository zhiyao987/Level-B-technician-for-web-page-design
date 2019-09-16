<?php
include_once("setdb.php");
$goto = "main.php";
if( !empty($_GET["do"]) ){
    if( $_GET["do"]=="admin_check" ){ $goto = "t10_2.php";}
    if( $_GET["do"]=="admin_lv" ){ $goto = "t10_3.php";}
    if( $_GET["do"]=="admin_ad" ){ $goto = "t10_4.php";}
    if( $_GET["do"]=="admin_update" ){ $goto = "t10_5.php";}
    if( $_GET["do"]=="admin_del" ){ $goto = "t10_6.php";}
    if( $_GET["do"]=="bot" ){ $goto = "t11.php";}
    if( $_GET["do"]=="mem" ){ $goto = "t9.php";}
    if( $_GET["do"]=="memadd" ){ $goto = "t9_2.php";}
    if( $_GET["do"]=="memdel" ){ $goto = "t9_4.php";}
    if( $_GET["do"]=="memupdate" ){ $goto = "t9_5.php";}
    if( $_GET["do"]=="th" ){ $goto = "t5.php";}
    if( $_GET["do"]=="thdel" ){ $goto = "t5_2.php";}
    if( $_GET["do"]=="thdel2" ){ $goto = "t5_3.php";}
    if( $_GET["do"]=="thup1" ){ $goto = "t5_4.php";}
    if( $_GET["do"]=="thup2" ){ $goto = "t5_5.php";}
    if( $_GET["do"]=="item" ){ $goto = "t5_6.php";}
    if( $_GET["do"]=="itemadd" ){ $goto = "t5_7.php";}
    if( $_GET["do"]=="itemupdate" ){ $goto = "t5_8.php";}
    if( $_GET["do"]=="itemdel" ){ $goto = "t5_9.php";}
    if( $_GET["do"]=="itemlook" ){ $goto = "t5_10.php";}
    if( $_GET["do"]=="itemnolook" ){ $goto = "t5_11.php";}
    if( $_GET["do"]=="bill" ){ $goto = "t8_1.php";}
    if( $_GET["do"]=="look_bill" ){ $goto = "t8_2.php";}
    if( $_GET["do"]=="del_bill" ){ $goto = "t8_3.php";}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./Manage Page_files/css.css" rel="stylesheet" type="text/css">
<script src="./Manage Page_files/js.js"></script>
</head>

<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./Manage Page_files/0416.jpg">
            </a>
                            <img src="./Manage Page_files/0417.jpg">
                   </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
<?php if( $_SESSION["id"] == "admin" ){?><a href="?do=admin_lv">管理權限設置</a><?php }?>
<?php if( $_SESSION["lv1"] == 1 ){?><a href="?do=th">商品分類與管理</a><?php }?>
<?php if( $_SESSION["lv2"] == 1 ){?><a href="?do=bill">訂單管理</a><?php }?>
<?php if( $_SESSION["lv3"] == 1 ){?><a href="?do=mem">會員管理</a><?php }?>
<?php if( $_SESSION["lv4"] == 1 ){?><a href="?do=bot">頁尾版權管理</a><?php }?>
<?php if( $_SESSION["lv5"] == 1 ){?><a href="?do=admin_news">最新消息管理</a><?php }?>
<a href="logout.php" style="color:#f00;">登出</a>
                    </div>
                    </div>
        <div id="right"><?php include_once($goto);?></div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);text-align:center;" class="ct"><?php include_once("t11_2.php");?></div>
    </div>

</body></html>