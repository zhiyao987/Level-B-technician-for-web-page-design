<?php
$page=5;
$now_page=1;
if( !empty($_GET["pg"]) ){$now_page=$_GET["pg"];}
$limit=($now_page -1) * 5;
$np = $now_page+1;
$pp = $now_page-1;

$sql="select * from t11 ";
$ro=mysqli_query($link,$sql);
$total=mysqli_num_rows($ro);
$total_page=ceil($total/$page);

$sql="select * from t11 order by t_cnt DESC limit ".$limit.",".$page;
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
#sw{
	width:450px;
	height:500px;
	background-color:rgba(50,50,50,0.9);
	padding:10px;
	position:fixed;
	left:50%;
	top:100px;
	display:none;
	overflow:auto;
	}	
#swt{
	font-size:20px;
	color:#0ff;
}
#swc{
	color:#fff;
}
</style>
<div id="sw">
	<div id="swt"></div>
	<div id="swc"></div>
</div>
<fieldset>
	<legend>目前位置：首頁＞人氣文章區</legend>
<table width="100%">
	<tr>
		<td width="25%" align="center">標題</td>
		<td width="50%" align="center">內容</td>
		<td width="25%" align="center">人氣</td>
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
		<td width="25%" align="left"><span id="c<?=$row["t_seq"]?>1"><?=$row["t_title"]?></span></td>
		<td width="50%" align="left"><div class="cc" onmouseover="look_start('c<?=$row["t_seq"]?>')" onmouseout="look_stop()" id="c<?=$row["t_seq"]?>"><?=nl2br($row["t_cont"])?></div></td>
		<td width="25%" align="center">
		<?=$row["t_cnt"]?>個人說<img src="images/02b03.jpg" width="20">
		<?php if( !empty($_SESSION["account"]) ){ ?> <div id="a<?=$row["t_seq"]?>" onclick="<?=$word1?>good(<?=$row["t_seq"]?>)"><?=$word2?>讚</div><?php  } ?>
		</td>
	</tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>	
	<tr>
		<td align="left" colspan="3">
		<a href='?in=t12&pg=<?=$pp?>' >＜</a>
		
<?php
	for($i=1;$i<=$total_page;$i++){
		$ww = $i;
		if( $i==$now_page ){ $ww = "<span style='font-size:20px'>".$i."</span>"; }
		echo "　".$ww."　";
	}
?>		
			<a href='?in=t12&pg=<?=$np?>' >＞</a>
		</td>
		
	</tr>
</table>
</fieldset>
<script>
	//$(".cc").click(function(){
	//	$(this).attr("class","c2");
	//});
function look_start(x){
	$("#swt").html(document.getElementById(x+"1").innerHTML);
	$("#swc").html(document.getElementById(x).innerHTML);
	$("#sw").show();
}	
function look_stop(){
	$("#sw").hide();
}	
function good(x){
	$("#a"+x).html("回收讚");
	$("#a"+x).attr("onclick","nogood("+x+")");
	$.post("t12_2.php",{x,xx:1},function(){});
//		document.location.href='<?=$_SERVER["REQUEST_URI"]?>';
		document.location.href='?in=t12';
}
function nogood(x){
	$("#a"+x).html("讚");
	$("#a"+x).attr("onclick","good("+x+")");
	$.post("t12_2.php",{x,xx:-1},function(){});
//		document.location.href='<?=$_SERVER["REQUEST_URI"]?>';
		document.location.href='?in=t12';
}
</script>
