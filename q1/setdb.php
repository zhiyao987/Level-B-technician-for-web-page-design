<?php
    session_start();
    $link=mysqli_connect("localhost","root","","q1");
    mysqli_query($link,"set names utf8");
    if( empty($_SESSION["cnt"]) ){
        $sql = "update t7 set t_look=t_look+1 ";
        mysqli_query($link,$sql);
        $_SESSION["cnt"] = 1;
    }
?>