<?php
session_start();
$link = mysqli_connect("localhost","root","","q4");
mysqli_query($link,"set names utf8");
$nowtime=strtotime("+7hour");
$nt=date("Y-m-d H:i:s",$nowtime);
?>