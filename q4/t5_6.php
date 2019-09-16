<?php
$sql = "select * from t5_3";
$ro = mysqli_query($link,$sql);
$row= mysqli_fetch_assoc($ro);

$look[0]="已下架";
$look[1]="販售中";
?>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="3">
    <tr>
        <td colspan="5" align="center"><a href="admin.php?do=th">商品分類</a> 商品管理</td>
    </tr>
    <tr>
        <td colspan="5" align="center"><a href="admin.php?do=itemadd">新增商品</a></td>
    </tr>
    <tr>
        <td align="center">編號</td>
        <td align="center">商品名稱</td>
        <td align="center">庫存量</td>
        <td align="center">狀態</td>
        <td align="center">操作</td>
    </tr>
<?php do{?>
    <tr>
        <td align="center"><?=$row["t_seq"]?></td>
        <td align="center"><?=$row["t_name"]?></td>
        <td align="center"><?=$row["t_cnt"]?></td>
        <td align="center"><?=$look[$row["t_look"]]?></td>
        <td align="center"><a href="admin.php?do=itemupdate&no=<?=$row["t_seq"]?>">修改</a> <a href="admin.php?do=itemdel&no=<?=$row["t_seq"]?>">刪除</a><br><a href="admin.php?do=itemlook&no=<?=$row["t_seq"]?>">上架</a> <a href="admin.php?do=itemnolook&no=<?=$row["t_seq"]?>">下架</a></td>
    </tr>
<?php }while($row= mysqli_fetch_assoc($ro));?>
</table>