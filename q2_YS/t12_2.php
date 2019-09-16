<?php
include("setdb.php");
$tseq=$_POST["x"];
$tcnt=$_POST["xx"];
$sql="update t11 set t_cnt = t_cnt + ".$tcnt." where t_seq = '".$tseq."' ";
mysqli_query($link, $sql);

if( $tcnt==1 ){
	$_SESSION["good"][$tseq] = 1;
	
}else{
	unset($_SESSION["good"][$tseq]);
}
?>