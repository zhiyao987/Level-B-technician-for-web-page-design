<?php
    if( !empty($_SESSION["six"])){
        $_SESSION["six"] = $_SESSION["six"]+1;
    }else{
        $_SESSION["six"] = 1000;
    }
    
echo "選擇的電影：".$_POST["t_1"]."<br>";
echo "觀看日期：".$_POST["t_d"]."<br>";
echo "時刻：".$_POST["t_2"]."<br>";
echo "訂單編號：".date("Ymd",$nd).$_SESSION["six"]."<br>";
echo "座位：<br>";    


    for($i=0;$i<count($_POST["dw"]) ; $i++){
        $z = $_POST["dw"][$i];
        $x = ceil($z/5);//計算排數
        $y = $z - (($x-1)*5);//計算位置數        
        echo $x."排 - ".$y."號<br>";
        $sql="insert into t8 value(null,'".$_POST["t_m"]."','".$_POST["t_d"]."','".$_POST["t_n"]."','".$_POST["dw"][$i]."','".date("Ymd",$nd).$_SESSION["six"]."')";
        mysqli_query($link,$sql);
        
    }
?>