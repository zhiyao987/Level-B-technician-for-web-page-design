<?php
include_once("setdb.php");
$sql="select * from t15";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);
if( !empty($_POST["del"][0])) {
	for( $i=0; $i<count($_POST["del"]);$i++){
		$sql="delete from t15 where t_seq = '".$_POST["del"][$i]."'";
		mysqli_query($link,$sql);
	}
	echo "<script>document.location.href='/?menu=1&in=t15'</script>";
}
?>
<form method="post">
<table width="100%" border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">帳號</td>
    <td align="center">密碼</td>
    <td align="center">刪除</td>
  </tr>
<?php do{ ?>
  <tr>
    <td align="center"><?=$row["t_id"]?></td>
    <td align="center"><?=$row["t_pw"]?></td>
    <td align="center"><input type="checkbox" name="del[]" value="<?=$row["t_seq"]?>"></td>
  </tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
  <tr>
    <td colspan="3" align="center">
      <input type="submit" name="button1" id="button1" value="確認刪除" />
      <input type="reset" name="button2" id="button2" value="清空選取" />
    </td>
  </tr>
</table>
</form>
<br>
<form>
	<p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
	
    <tr>
      <td align="center">Step1:登入帳號</td>
      <td align="center">
      <input type="text" id="id" /></td>
    </tr>
    <tr>
      <td align="center">Step2:登入密碼</td>
      <td align="center">
      <input type="text" id="pw1" /></td>
    </tr>
    <tr>
      <td align="center">Step3:確認密碼</td>
      <td align="center">
      <input type="text" id="pw2" /></td>
    </tr>
    <tr>
      <td align="center">Step4:信箱</td>
      <td align="center">
      <input type="text" id="em" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
		<input type="button" value="註冊" onclick="add_player()"/>
		<input type="reset" value="清空" /></td>
    </tr>
  </table>
</form>
<script>
function add_player(){
	id = document.getElementById("id").value;
	pw1= document.getElementById("pw1").value;
	pw2= document.getElementById("pw2").value;
	em = document.getElementById("em").value;
	$.get("t10_api.php",{ id, pw1, pw2, em },function(o){
		alert(o);
		document.location.href="/?menu=1&in=t15";
	});
}
</script>
