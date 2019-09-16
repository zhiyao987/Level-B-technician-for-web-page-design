<?php
$sql = "select b_b_no , b_b_id , t9.t_name as tn_1 , t5_3.t_name as tn_2 , t_mail , t9.t_con as tc_1 , t_tel , t5_3.t_seq as item_seq , b_b_cnt , t5_3.t_money as my_money from by_billing , t9 , t5_3 where b_b_id = t9.t_id and b_b_item = t5_3.t_seq and b_b_no ='".$_GET["no"]."' ";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<table width="95%" border="0" align="center" cellpadding="5" cellspacing="3">
  <tr>
    <td colspan="5" align="center">訂單編號 <?=$row["b_b_no"]?></td>
  </tr>
  <tr>
    <td width="200" align="center" bgcolor="#FF9900">會員帳號</td>
    <td colspan="4" align="left"><?=$row["b_b_id"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">姓名</td>
    <td colspan="4" align="left"><?=$row["tn_1"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">電子信箱</td>
    <td colspan="4" align="left"><?=$row["t_mail"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">聯絡地址</td>
    <td colspan="4" align="left"><?=$row["tc_1"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">連絡電話</td>
    <td colspan="4" align="left"><?=$row["t_tel"]?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FF9900">商品名稱</td>
    <td align="center" bgcolor="#FF9900">編號</td>
    <td width="100" align="center" bgcolor="#FF9900">數量</td>
    <td width="100" align="center" bgcolor="#FF9900">單價</td>
    <td width="150" align="center" bgcolor="#FF9900">小計</td>
  </tr>
<?php
$i = 0;
do{
$i += $row["b_b_cnt"]*$row["my_money"];
?>
  <tr>
    <td align="center"><?=$row["tn_2"]?></td>
    <td align="center"><?=$row["item_seq"]?></td>
    <td align="center"><?=$row["b_b_cnt"]?></td>
    <td align="center"><?=$row["my_money"]?></td>
    <td align="center"><?=$row["b_b_cnt"]*$row["my_money"]?></td>
  </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>
  <tr>
    <td colspan="5" align="center" bgcolor="#FF9900">總價 : <?=$i?></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><input type="button" value="返回" onclick="document.location.href='admin.php?do=bill'" /></td>
  </tr>
</table>
