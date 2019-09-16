<?php
include_once("setdb.php");
$sql = "delete from t10 where t_seq = '".$_GET["no"]."' ";
mysqli_query($link,$sql);
header("location:admin.php?do=admin_lv");

?>