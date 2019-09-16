<?php
    $sql="select * from t7";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
<?=$row["t_look"]?>