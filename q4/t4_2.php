<?php
$sql ="select * from t5_3 where t_seq = ".$_GET["no"];
$rov = mysqli_query($link,$sql);
$rowv = mysqli_fetch_assoc($rov);

$sql = "select b.t_name as t1, a.t_name as t2 from t5_2 a,t5 b where a.t_seq = ".$rowv["t_t5_2"]." and a.t_b_seq = b.t_seq";
$rovv = mysqli_query($link,$sql);
$rowvv = mysqli_fetch_assoc($rovv);

?>

<?php do{?>
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="300" rowspan="6" align="center"><img src="item/<?=$rowv["t_pic"]?>" width="300"></td>
    <td align="center"><?=$rowv["t_name"]?></td>
  </tr>
  <tr>
    <td align="left">分類 : <?=$rowvv["t1"]?>/<?=$rowvv["t2"]?></td>
  </tr>
  <tr>
    <td align="left">編號 : <?=$rowv["t_seq"]?></td>
  </tr>
  <tr>
    <td align="left">價錢 : <?=$rowv["t_money"]?></td>
  </tr>
  <tr>
    <td align="left">庫存量 : <?=$rowv["t_cnt"]?></td>
  </tr>
  <tr>
    <td align="left">簡介 : <?=nl2br($rowv["t_con"])?></td>
  </tr>
  <tr>
    <td align="center" colspan=2>
        <form method="post" id="f1" action="?do=<?php if( !empty($_SESSION["account"]) ){ echo "buycart"; }else{ echo "login"; }?>">購買數量 <input name="t_buy"><input name="t_item" type="hidden" value="<?=$rowv["t_seq"]?>"> <a href="javascript:document.getElementById('f1').submit();"><img src="img/0402.jpg"></a></form>
    </td>
  </tr>
  <tr>
    <td align="center" colspan=2><a href="/">返回</a></td>
  </tr>
</table>
<?php }while($rowv = mysqli_fetch_assoc($rov));?>