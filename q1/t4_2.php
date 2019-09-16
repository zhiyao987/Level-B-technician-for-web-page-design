<?php
    $sql="select * from t4 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
do{
    echo " ".$row["t_cont"]." ";
}while($row=mysqli_fetch_assoc($ro));    
?>
