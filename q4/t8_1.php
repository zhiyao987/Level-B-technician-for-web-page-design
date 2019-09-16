<?php
$sql = "select b_b_no,b_b_id,t_name,b_b_date,b_b_total from by_billing , t9 where b_b_id = t_id group by b_b_no";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="3">
  <tr>
    <td colspan="6" align="center">訂單管理</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF6600">訂單編號</td>
    <td width="100" align="center" bgcolor="#FF6600">金額</td>
    <td width="100" align="center" bgcolor="#FF6600">帳號</td>
    <td width="100" align="center" bgcolor="#FF6600">姓名</td>
    <td width="200" align="center" bgcolor="#FF6600">下單時間</td>
    <td width="50" align="center" bgcolor="#FF6600">刪除</td>
  </tr>
<?php do{ ?>
  <tr>
    <td align="center" bgcolor="#FFCC99"><a href="admin.php?do=look_bill&no=<?=$row["b_b_no"]?>"><?=$row["b_b_no"]?></a></td>
    <td align="center" bgcolor="#FFCC99"><?=$row["b_b_total"]?></td>
    <td align="center" bgcolor="#FFCC99"><?=$row["b_b_id"]?></td>
    <td align="center" bgcolor="#FFCC99"><?=$row["t_name"]?></td>
    <td align="center" bgcolor="#FFCC99"><?=$row["b_b_date"]?></td>
    <td align="center" bgcolor="#FFCC99"><a href="admin.php?do=del_bill&no=<?=$row["b_b_no"]?>">刪除</a></td>
  </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>
</table>

