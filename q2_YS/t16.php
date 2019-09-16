<?php
if( !empty($_POST["myno"][0]) ){
	for( $i=0; $i<count($_POST["myno"]); $i++ ){
		$sql="update t11 set t_look = 0 where t_seq = '".$_POST["myno"][$i]."'";
		mysqli_query($link,$sql);
	}
	for( $i=0; $i<count($_POST["look"]); $i++ ){
		$sql="update t11 set t_look = 1 where t_seq = '".$_POST["look"][$i]."'";
		mysqli_query($link,$sql);
	}
}
if( !empty($_POST["del"][0]) ){
	for( $i=0; $i<count($_POST["del"]); $i++ ){
		$sql="delete from  t11 where  t_seq = '".$_POST["del"][$i]."'";
		mysqli_query($link,$sql);
	}
}

$page=3;
$now_page=1;
if( !empty($_GET["pg"]) ){$now_page=$_GET["pg"];}
$limit=($now_page -1) * $page;
$np = $now_page+1;
$pp = $now_page-1;

$sql="select * from t11 ";
$ro=mysqli_query($link,$sql);
$total=mysqli_num_rows($ro);
$total_page=ceil($total/$page);

$sql="select * from t11 limit ".$limit.",".$page;
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

?>
<style>
.cc{
	width:100%;
	height:23px;
	overflow:hidden;
	}
.c2{
	width:100%;
	min-height:23px;
	}
</style>
<fieldset>
	<legend>目前位置：首頁＞最新文章區</legend>
<form method="post">
<table width="100%">
	<tr>
		<td width="10%" align="center">編號</td>
		<td width="70%" align="center">標題</td>
		<td width="10%" align="center">顯示</td>
		<td width="10%" align="center">刪除</td>
	</tr>
<?php do{ ?>
	<tr>
		<td width="10%" align="center"><?=$row["t_seq"]?><input type="hidden" value="<?=$row["t_seq"]?>" name="myno[]"></td>
		<td width="70%" align="center"><?=$row["t_title"]?></td>
		<td width="10%" align="center"><input type="checkbox" value="<?=$row["t_seq"]?>" name="look[]"<?php if ($row["t_look"]==1 ){?> checked='checked'<?php }?> ></td>
		<td width="10%" align="center"><input type="checkbox" value="<?=$row["t_seq"]?>" name="del[]"></td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>	
	<tr>
		<td align="left" colspan="4">
		<a href='?menu=3&in=t16&pg=<?=$pp?>' >＜</a>
		
<?php
	for($i=1;$i<=$total_page;$i++){
		$ww = $i;
		if( $i==$now_page ){ $ww = "<span style='font-size:20px'>".$i."</span>"; }
		echo "　".$ww."　";
	}
?>		
			<a href='?menu=3&in=t16&pg=<?=$np?>' >＞</a>
		</td>
	</tr>
	<tr>
		<td colspan="4" align="center"><input type="submit" value="確定修改"></td>
	</tr>
</table>
</form>
</fieldset>
