<?php
$sql="select * from t13 where t_seq = '".$_GET["no"]."'";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

$sql="select * from t13 where t_q = '".$row["t_q"]."'";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

$sql="select * from t13 a , t13_log b where b.t_t13_seq = a.t_seq and t_q = '".$row["t_q"]."'";
$ro2=mysqli_query($link,$sql);
$all_total=mysqli_num_rows($ro2);
?>
<style>
.cnt{
	width=200px;
	height:30px;
	background:#ffdfff;
	display:inline-block;
}
</style>
<fieldset>
	<legend>目前位置：首頁＞問卷調查</legend>

<table width="100%">
	<tr>
		<td align="left" colspan="2"><?=$row["t_q"]?></td>
	</tr>
<?php
$i=0;
do{ 
$i++;
$sql="select * from t13_log where t_t13_seq = '".$row["t_seq"]."'";
$ro1=mysqli_query($link,$sql);
$now_total=mysqli_num_rows($ro1);
?>
	<tr>
		<td align="left" width="60%"><?=$row["t_a"]?></td>
		<td align="left"><div class="cnt" style="width:<?=($now_total/$all_total)*200?>px"></div><?=$now_total?>票(<?=($now_total/$all_total)*100?>%)</td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
	<tr>	
<form method="post" action="?in=t13">

		<td align="center" colspan="2"><input value="返回" type="submit"></td>
</form>		
	</tr>
</table>
</fieldset>
