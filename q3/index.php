<?php
    include_once("setdb.php");
    $goto="main.php";
    if( !empty($_GET["redo"])){
        if($_GET["redo"]=="login"){$goto = "login.php";}
        if($_GET["redo"]=="admin"){$goto = "admin.php";}
        if($_GET["redo"]=="t5"){$goto = "t5.php";}
        if($_GET["redo"]=="t6"){$goto = "t6.php";}
        if( $_GET["redo"]=="t7" ){ $goto = "t7.php";}
        if( $_GET["redo"]=="t7_2" ){ $goto = "t7_2.php";}
        if( $_GET["redo"]=="t7_3" ){ $goto = "t7_3.php";}
        if($_GET["redo"]=="t8"){$goto = "t8.php";}
        if($_GET["redo"]=="t8_2"){$goto = "t8_2.php";}
        if($_GET["redo"]=="t8_3"){$goto = "t8_3.php";}
        if($_GET["redo"]=="t9"){$goto = "t9.php";}
    }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="home_files/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="/">首頁</a> <a href="?redo=t8">線上訂票</a> <a href="#">會員系統</a> <a href="?redo=login">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm">
<?php include_once("admin_menu.php");?>
<?php include_once($goto);?>    
  </div>
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>