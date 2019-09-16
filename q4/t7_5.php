<?php
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
    </tr>
<?php do{?>
    <tr>
        <td align="center"><?=$row["b_item"]?></td>
        <td align="center"><?=$row["t_name"]?></td>
        <td align="center"><?=$row["b_cnt"]?></td>
        <td align="center"><?=$row["t_cnt"]?></td>
        <td align="center"><?=$row["t_money"]?></td>
        <td align="center"><?=$row["b_cnt"]*$row["t_money"]?></td>
    </tr>
<?php }while($row= mysqli_fetch_assoc($ro));?>
    <tr>
        <td align="center" colspan=7><a href="?do=buycart"><button>返回修改訂單</button></a>　<a href="?do=bill_ok"><button>確定送出</button></a></td>
    </tr>
</table>