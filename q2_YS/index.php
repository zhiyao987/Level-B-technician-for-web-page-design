﻿<?php
	include_once("setdb.php");
	$menu = "menu.php"; 
	$in = "content.php"; 
	if( !empty($_GET["menu"]) ){  //分前端menu.php 及後端menu_admin.php
		$menu= "menu2.php";
	}
	if( !empty($_GET["in"]) ){ $in = $_GET["in"].".php"; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>健康促進網</title>
<link href="./home_files/css.css" rel="stylesheet" type="text/css">
<script src="./home_files/jquery-1.9.1.min.js"></script>
<script src="./home_files/js.js"></script>
</head>

<body>
<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
	<pre id="ssaa"></pre>
</div>
<iframe name="back" style="display:none;"></iframe>
	<div id="all">
    	<div id="title">
        <?=date("m")?> 月 <?=date("d")?> 號 <?=date("l")?> | 今日瀏覽: 1 | 累積瀏覽: 36　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　<a href="/">回首頁</a></div>
        <div id="title2">
			<img src="images/02B01.jpg" alt="健康促進網-回首頁" title="健康促進網-回首頁">
        </div>
        <div id="mm">
        	<div class="hal" id="lef">
<?php include_once($menu);?>           	                	   
               	                 </div>
            <div class="hal" id="main">
			<div>
			<marquee width="81%">請民眾踴躍投稿電子報，請電子報成為大家相互交流、分享的園地！詳見最新文章</marquee>
			<span style="width:18%; display:inline-block;">
		<?php if( !empty($_SESSION["account"]) ){ echo "歡迎，".$_SESSION["account"]."<input type='button' value='登出' onclick='logout()'> " ;}else{ ?><a href="?in=t6">會員登入</a><?php }?>
			</span>
				<div class="">
<?php include_once($in);?>   				
				</div>
		</div>
           	
            </div>
        </div>
        <div id="bottom">
    	    本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2019健康促進網社群平台 All Right Reserved 
    		 <br>服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45">
        </div>
    </div>
</body></html>
<script>
function logout(){
	document.location.href="logout.php";
}
</script>