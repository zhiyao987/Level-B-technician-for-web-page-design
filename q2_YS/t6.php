<?php 
	if( !empty($_POST["id"]) ){
		$sql="select * from t15 where t_id='".$_POST["id"]."' and t_pw = '".$_POST["pw"]."'";
		$ro=mysqli_query($link,$sql);
		$tot=mysqli_num_rows($ro);
		if( $tot == 1 ){
			$_SESSION["account"]=$_POST["id"];
			if( $_POST["id"] == "admin" ){
				echo "<script>document.location.href='/?menu=1&in=t14'</script>";
			}else{ 
				echo "<script>document.location.href='index.php'</script>";
			}
		}else{
			$sql="select * from t15 where t_id='".$_POST["id"]."'";
			$ro=mysqli_query($link,$sql);
			$tot=mysqli_num_rows($ro);	
			if( $tot == 1 ){
				echo "<script>alert('密碼錯誤');</script>";
			}else{
				echo "<script>alert('查無帳號');</script>";
			}
		}
	}
?>
<fieldset>
	<legend>會員登入</legend>
	<form method="post">
	<table width="500" border="0" cellspacing="0" cellpadding="5">
	  <tr>
		<td align="center">帳號</td>
		<td align="center">
		  <input type="text" name="id" /></td>
	  </tr>
	  <tr>
		<td align="center">密碼</td>
		<td align="center">
		  <input type="text" name="pw" /></td>
	  </tr>
	  <tr>
		<td align="center">
			<input type="submit" name="button" id="button" value="登入" />
			<input type="reset" name="button2" id="button2" value="清除" /></td>
		 <td align="center">
			<a href="/?in=t9">忘記密碼</a>  |  <a href="/?in=t10">尚未註冊</a></td>
	  </tr>
	</table>
	</form>
</fieldset>