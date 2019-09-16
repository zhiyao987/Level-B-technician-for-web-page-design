<?php
if( !empty($_POST["t_select"]) ){
	$sql="insert into t13_log value(null, '".$_POST["t_select"]."','".$_SESSION["account"]."');";
	mysqli_query($link,$sql);
}
$sql="select * from t13 where t_seq = '".$_GET["no"]."'";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

$sql="select * from t13 where t_q = '".$row["t_q"]."'";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

?>
<fieldset>
	<legend>目前位置：首頁＞問卷調查</legend>
<form method="post">
<table width="100%">
	<tr>
		<td align="left"><?=$row["t_q"]?></td>
	</tr>
<?php
$i=0;
do{ 
$i++;
?>
	<tr>
		<td align="left"><input type="radio" name="t_select" value="<?=$row["t_seq"]?>"><?=$row["t_a"]?></td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>	
	<tr>
		<td align="center"><input value="我要投票" type="submit"></td>
	</tr>
</table>
</form>
</fieldset>
