<?php
session_start();
$link = mysqli_connect("localhost","root","","q4");
mysqli_query($link,"set names utf8");
$sql = "select * from t9 where t_id = '".$_POST["x"]."'";
$ro=mysqli_query($link,$sql);
$total = mysqli_num_rows($ro);
if( $total >=1 ){ echo "帳號已重複"; }else{ echo "帳號可以使用"; }
?>