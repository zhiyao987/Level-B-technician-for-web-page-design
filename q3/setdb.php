<?php
    session_start();
    $link=mysqli_connect("localhost","root","","q3");
    mysqli_query($link,"set names utf8");
    
    $nd = strtotime("+7hour");
    $nd1 = strtotime("+7hour-1day");
    $nd2 = strtotime("+7hour-2day");
    $nd3 = strtotime("+7hour+1day");
    $nd4 = strtotime("+7hour+2day");
    
    $nowday = date("Y-m-d",$nd);
    $day1 = date("Y-m-d",$nd1);//-1
    $day2 = date("Y-m-d",$nd2);//-2
    $day3 = date("Y-m-d",$nd3);//+1
    $day4 = date("Y-m-d",$nd4);//+2
?>