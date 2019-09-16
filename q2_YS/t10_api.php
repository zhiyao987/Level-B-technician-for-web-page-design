<?php
include_once("setdb.php");
if( !empty($_GET["id"]) ){
	if( !empty($_GET["pw1"]) ){
		if( !empty($_GET["pw2"]) ){
			if( !empty($_GET["em"]) ){
				$sql="select * from t15 where t_id = '".$_GET["id"]."'";
				$ro=mysqli_query($link,$sql);
				$tot=mysqli_num_rows($ro);
				if( $tot < 1 ){ 
					$sql="insert into t15 value(null, '".$_GET["id"]."','".$_GET["pw1"]."','".$_GET["em"]."')";
					mysqli_query($link,$sql);
					echo "註冊完成, 歡迎加入";
				}
				else{ echo "帳號重複"; }
			}else{ echo "不可空白"; }
		}else{ echo "不可空白"; }
	}else{ echo "不可空白"; }
}else{ echo "不可空白"; }
?>
