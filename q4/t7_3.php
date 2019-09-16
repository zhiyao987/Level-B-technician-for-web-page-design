<?php
   // unset($_SESSION["account"]);
if( !empty($_SESSION["t_item"][0]) ){
    for( $i=0;$i<count($_SESSION["t_item"]);$i++ ){
        $sql = "insert into buycar value(null,'".$_SESSION["t_item"][$i]."','".$_SESSION["t_buy"][$i]."','".$_SESSION["account"]."','".$_SESSION["t_time"][$i]."',0);";
        mysqli_query($link,$sql);
    }
    unset($_SESSION["t_item"]);
    unset($_SESSION["t_buy"]);
    unset($_SESSION["t_time"]);
}
if( !empty($_POST["t_buy"]) ){
    if( !empty($_POST["t_item"]) ){
        $sql = "insert into buycar value(null,'".$_POST["t_item"]."','".$_POST["t_buy"]."','".$_SESSION["account"]."','".$nt."',0);";
        mysqli_query($link,$sql);
        echo "<script>document.location.href='?do=buycart'</script>";
        exit();
    }
}
$sql = "select * from buycar , t5_3 where b_id = '".$_SESSION["account"]."' and b_item = t_seq and b_bill=0";
$ro = mysqli_query($link,$sql);
$row= mysqli_fetch_assoc($ro);
?>
<table width="700" align="center">
    <tr>
        <td width="100" align="center">編號</td>
        <td width="200" align="center">商品名稱</td>
        <td width="100" align="center">數量</td>
        <td width="100" align="center">庫存</td>
        <td width="100" align="center">單價</td>
        <td width="100" align="center">小計</td>
        <td width="100" align="center">刪除</td>
    </tr>
<?php do{?>
    <tr>
        <td align="center"><?=$row["b_item"]?></td>
        <td align="center"><?=$row["t_name"]?></td>
        <td align="center"><?=$row["b_cnt"]?></td>
        <td align="center"><?=$row["t_cnt"]?></td>
        <td align="center"><?=$row["t_money"]?></td>
        <td align="center"><?=$row["b_cnt"]*$row["t_money"]?></td>
        <td align="center"><a href="?do=buycartdel&no=<?=$row["b_seq"]?>">刪除</a></td>
    </tr>
<?php }while($row= mysqli_fetch_assoc($ro));?>
    <tr>
        <td align="center" colspan=7><a href="/"><img src="img/0411.jpg"></a>　<a href="?do=check_bill"><img src="img/0412.jpg"></a></td>
    </tr>
</table>