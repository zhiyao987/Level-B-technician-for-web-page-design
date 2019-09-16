<?php
    $sql="select * from t5 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
    $pp = 0;
do{
?>
 lin[<?=$pp?>]="t5/<?=$row["t_pic"]?>";
<?php
    $pp++;
}while($row=mysqli_fetch_assoc($ro));
?>