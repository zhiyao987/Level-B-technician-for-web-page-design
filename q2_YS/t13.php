<?php
$sql="select * from t13 group by t_q";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);
?>
<fieldset>
	<legend>目前位置：首頁＞問卷調查</legend>
<table width="100%">
	<tr>
		<td width="5%" align="center">編號</td>
		<td width="65%" align="center">問卷題目</td>
		<td width="10%" align="center">投票總數</td>
		<td width="10%" align="center">結果</td>
		<td width="10%" align="center">狀態</td>
	</tr>
<?php
$i=0;
do{ 
	$i++;
	$sql="select * from t13 a, t13_log b where b.t_t13_seq = a.t_seq and a.t_q='".$row["t_q"]."'";
	$ro1=mysqli_query($link,$sql);
	$total=mysqli_num_rows($ro1); 
?>
	<tr>
		<td align="center" ><?=$i?></td>
		<td align="left" ><?=$row["t_q"]?></td>
		<td align="center" ><?=$total?></td>
		<td align="center" ><a href="?in=t13_3&no=<?=$row["t_seq"]?>">結果</a></td>
		<td align="center" >
			<?php if( empty($_SESSION["account"]) ){?>請先登入<?php }else{?><a href="?in=t13_2&no=<?=$row["t_seq"]?>">參與投票</a><?php }?>
		</td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>	
</table>
</fieldset>
