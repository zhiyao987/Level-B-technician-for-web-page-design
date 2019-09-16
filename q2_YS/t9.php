<?php
if( !empty($_POST["em"]) ){
	$sql="select * from t15 where t_email = '".$_POST["em"]."'";
	$ro=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($ro);
	$tot=mysqli_num_rows($ro);
}
?>
<form method="post">
<table width="90%" border="0" align="center" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td align="center">
		<input type="text" name="em"/></td>
  </tr>
<?php if(!empty($_POST["em"]) ){ ?>  
  <tr>
	<td align="center"><?php if($tot > 0){ echo "您的密碼為: ".$row["t_pw"]; }else{ echo "查無此資料"; } ?></td>
  </tr>
<?php }?>
  <tr>
    <td align="center">
		<input type="submit" value="尋找" />
    </td>
  </tr>
</table>
</form>
