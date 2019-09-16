<?php
include_once("setdb.php");
$goto = "main.php";
if( !empty($_GET["do"]) ){
    if( $_GET["do"]=="admin" ){ $goto = "t10.php";}
    if( $_GET["do"]=="news" ){ $goto = "t6.php";}
    if( $_GET["do"]=="look" ){ $goto = "t3.php";}
    if( $_GET["do"]=="list" ){ $goto = "t4.php";}
    if( $_GET["do"]=="buycar" ){ $goto = "t4_2.php";}
    if( $_GET["do"]=="login" ){ $goto = "t7.php";}
    if( $_GET["do"]=="login_add" ){ $goto = "t7_2.php";}
    if( $_GET["do"]=="buycart" ){ $goto = "t7_3.php";}
    if( $_GET["do"]=="buycartdel" ){ $goto = "t7_4.php";}
    if( $_GET["do"]=="check_bill" ){ $goto = "t7_5.php";}
    if( $_GET["do"]=="bill_ok" ){ $goto = "t7_6.php";}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>┌精品電子商務網站」</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/js.js"></script>
</head>
<style>
.ct{
    overflow:auto;
}
#right{
    overflow:auto;
}
</style>
<body>
<iframe name="back" style="display:none;"></iframe>
	<div id="main">
    	<div id="top">
        	<a href="?">
            	<img src="./home_files/0416.jpg">
            </a>
                        <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=login">購物車</a> |
                <a href="?do=login">會員登入</a> |
                <a href="?do=admin">管理登入</a>
           </div>
        </div>
        <div id="left" class="ct">
        	<div style="min-height:400px;">
                <a href="?do=list">全部商品(8)</a>

                <a href="#" title="男用皮件、女用皮件" onmouseover="op(1)">流行皮件(3)</a>
                    <a href="?do=list&no=1" id="a1" style="background-color:#fbdbff;display:none;"><div >男用皮件</div></a>
                    <a href="?do=list&no=2" id="a2" style="background-color:#fbdbff;display:none;"><div>女用皮件</div></a>

                <a href="#" title="少女鞋區、紳士流行鞋區" onmouseover="op(2)">流行鞋區(2)</a>
                    <a href="?do=list&no=3" id="b1" style="background-color:#fbdbff;display:none;"><div>少女鞋區</div></a>
                    <a href="?do=list&no=4" id="b2" style="background-color:#fbdbff;display:none;"><div>紳士流行鞋區</div></a>

                <a href="#" title="時尚手錶、時尚珠寶" onmouseover="op(3)">流行飾品(1)</a>
                    <a href="?do=list&no=5" id="c1" style="background-color:#fbdbff;display:none;"><div>時尚手錶</div></a>
                    <a href="?do=list&no=6" id="c2" style="background-color:#fbdbff;display:none;"><div>時尚珠寶</div></a>

                <a href="#" title="背包" onmouseover="op(4)">背包(2)</a>
                    <a href="?do=list&no=7" id="d1" style="background-color:#fbdbff;display:none;"><div>背包</div></a>
        	</div>
                        <span>
            	<div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                	00005                </div>
            </span>
                    </div>
        <div id="right">
            <marquee>年終特賣會開跑了　　情人節特惠活動</marquee><br>
            <?php include_once($goto);?>
        </div>
<div id="bottom" style="line-height:40px; color:#FFF; background:url(icon/bot.png);text-align:center;" class="ct"><?php include_once("t11_2.php");?></div>
    </div>

</body></html>
<script>
    function op(x){
        document.getElementById("a1").style.display="none";
        document.getElementById("a2").style.display="none";
        document.getElementById("b1").style.display="none";
        document.getElementById("b2").style.display="none";
        document.getElementById("c1").style.display="none";
        document.getElementById("c2").style.display="none";
        document.getElementById("d1").style.display="none";
        if( x == 1){
            document.getElementById("a1").style.display="block";
            document.getElementById("a2").style.display="block";
        }
        if( x == 2){
            document.getElementById("b1").style.display="block";
            document.getElementById("b2").style.display="block";
        }
        if( x == 3){
            document.getElementById("c1").style.display="block";
            document.getElementById("c2").style.display="block";
        }
        if( x == 4){
            document.getElementById("d1").style.display="block";
        }
    }
</script>