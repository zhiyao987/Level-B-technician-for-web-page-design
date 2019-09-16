<?php
    $sql="select * from t8";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
<?=$row["t_title"]?>