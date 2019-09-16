<?php
$sql = "select * from t11";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<?=$row["t_word"]?>