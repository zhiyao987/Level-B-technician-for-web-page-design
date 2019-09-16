<?php
$search = "";
if( !empty($_GET["no"]) ){
    if($_GET["no"]=="1" ){ $search = "where t_t5_2 = '4'";}
    if($_GET["no"]=="2" ){ $search = "where t_t5_2 = '5'";}
    if($_GET["no"]=="3" ){ $search = "where t_t5_2 = '6'";}
    if($_GET["no"]=="4" ){ $search = "where t_t5_2 = '7'";}
    if($_GET["no"]=="5" ){ $search = "where t_t5_2 = '8'";}
    if($_GET["no"]=="6" ){ $search = "where t_t5_2 = '9'";}
    if($_GET["no"]=="7" ){ $search = "where t_t5_2 = '10'";}
}
$sql ="select * from t5_3 ".$search;
$rov = mysqli_query($link,$sql);
$rowv = mysqli_fetch_assoc($rov);
?>

<?php do{?>
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="300" rowspan="4" align="center"><img src="item/<?=$rowv["t_pic"]?>" width="300"></td>
    <td align="center"><?=$rowv["t_name"]?></td>
  </tr>
  <tr>
    <td align="left">價錢 : <?=$rowv["t_money"]?> <a href="?do=buycar&no=<?=$rowv["t_seq"]?>"><img src="img/0402.jpg"></a></td>
  </tr>
  <tr>
    <td align="left">規格 : <?=$rowv["t_type"]?></td>
  </tr>
  <tr>
    <td align="left">簡介 : <?=nl2br($rowv["t_con"])?></td>
  </tr>
</table>
<?php }while($rowv = mysqli_fetch_assoc($rov));?>