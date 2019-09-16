<?php
$sql = "select * from t10";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="3" align="center"><a href="?do=admin_ad">新增管理員</a></td>
  </tr>
  <tr bgcolor="#FF9900">
    <td width="40%" align="center">帳號</td>
    <td align="center">密碼</td>
    <td width="20%" align="center">管理</td>
  </tr>

  <tr>
    <td align="center" bgcolor="#FFCC00">admin</td>
    <td align="center" bgcolor="#FFCC00">****</td>
    <td align="center" bgcolor="#FFCC00">-</td>
  </tr>
<?php do{?>
  <tr>
    <td align="center" bgcolor="#FFCC00"><?=$row["t_id"]?></td>
    <td align="center" bgcolor="#FFCC00"><?=$row["t_pw"]?></td>
    <td align="center" bgcolor="#FFCC00"><input type="submit" value="修改" onclick="document.location.href='admin.php?do=admin_update&no=<?=$row['t_seq']?>'" /> 
    <input type="submit" value="刪除" onclick="document.location.href='admin.php?do=admin_del&no=<?=$row['t_seq']?>'"/></td>
  </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>
</table>
