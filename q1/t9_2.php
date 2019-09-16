<?php
    $sql="select * from t9 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
    $totle = mysqli_num_rows($ro);
    
    $sql="select * from t9 where t_look=2 limit 5";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
<span class="t botli">最新消息區<?php if($totle>5){ echo "　　　　　　　　　　　　　　　　　　　　　<a href='01p04.php'>More...</a>";}?></span>
<ul class="ssaa" style="list-style-type:decimal;">
<?php do{?>
        <li><?=mb_substr($row["t_cont"],0,10,"utf-8")?>...<div class="all" style="display:none;"><?=$row["t_cont"]?></div></li>
<?php }while($row=mysqli_fetch_assoc($ro)); ?>
</ul>
