<?php
    $sql="select * from t3 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
<img src="t3/<?=$row["t_pic"]?>" alt="<?=$row["t_cont"]?>" title="<?=$row["t_cont"]?>" width="1024">