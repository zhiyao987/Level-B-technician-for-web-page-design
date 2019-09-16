<?php
$page=5;
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
<table width="100%">
	<tr>
		<td width="25%" align="center">標題</td>
		<td width="65%" align="center">內容</td>
		<td width="10%" align="center"></td>
	</tr>
<?php do{ 
	$word1="";
	$word2="";
	if( !empty($_SESSION["good"][$row["t_seq"]]) ){
		$word1="no";
		$word2="回收";
	}
?>
	<tr>
		<td width="25%" align="left"><?=$row["t_title"]?></td>
		<td width="65%" align="left"><div class="cc"><?=nl2br($row["t_cont"])?></div></td>
		<td width="10%" align="center">
		<?php if( !empty($_SESSION["account"]) ){ ?> <div id="a<?=$row["t_seq"]?>" onclick="<?=$word1?>good(<?=$row["t_seq"]?>)"><?=$word2?>讚</div><?php  } ?>
		</td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>	
	<tr>
		<td align="left" colspan="3">
		<a href='?in=t11&pg=<?=$pp?>' >＜</a>
		
<?php
	for($i=1;$i<=$total_page;$i++){
		$ww = $i;
		if( $i==$now_page ){ $ww = "<span style='font-size:20px'>".$i."</span>"; }
		echo "　".$ww."　";
	}
?>		
			<a href='?in=t11&pg=<?=$np?>' >＞</a>
		</td>
		
	</tr>
</table>
</fieldset>
<script>
	$(".cc").click(function(){
		$(this).attr("class","c2");
	});
function good(x){
	$("#a"+x).html("回收讚");
	$("#a"+x).attr("onclick","nogood("+x+")");
	$.post("t11_2.php",{x,xx:1},function(){});
}
function nogood(x){
	$("#a"+x).html("讚");
	$("#a"+x).attr("onclick","good("+x+")");
	$.post("t11_2.php",{x,xx:-1},function(){});
}
</script>
