<?php
    $sql="select * from t12";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                
<?php do{?>
<a href="<?=$row["t_cont"]?>">
    <div class="mainmu"><?=$row["t_title"]?></div>
</a> 
<?php
    $sql="select * from t13 where t_pic ='".$row["t_seq"]."'";
    $ro2 = mysqli_query($link,$sql);
    $row2=mysqli_fetch_assoc($ro2);
?>
    <?php do{?>
        <a href="<?=$row2["t_cont"]?>">
            <div class="mainmu2"><?=$row2["t_title"]?></div>
        </a> 
    <?php }while($row2=mysqli_fetch_assoc($ro2));?>
<?php }while($row=mysqli_fetch_assoc($ro));?>
