<?php
if( !empty($_POST["t_name"]) ){
    $sql = "update t9 set t_name = '".$_POST["t_name"]."',  t_mail = '".$_POST["t_mail"]."', t_tel = '".$_POST["t_tel"]."', t_con = '".$_POST["t_con"]."' where t_seq = '".$_GET["no"]."'";
    mysqli_query($link,$sql);
    ?><script>document.location.href="admin.php?do=mem";</script><?php
}
$sql = "select * from t9 where t_seq = '".$_GET["no"]."'";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<form method="post">
<table width="45%" border="0" align="center" cellpadding="5" cellspacing="2">
    <tr>
        <td colspan="2" align="center">修改會員</td>
    </tr>
    <tr>
        <td width="30%" align="center" bgcolor="#FF33f0">姓名</td>
        <td align="left"><input name="t_name" value="<?=$row["t_name"]?>"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">信箱</td>
        <td align="left"><input name="t_mail" value="<?=$row["t_mail"]?>"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">電話</td>
        <td align="left"><input name="t_tel" value="<?=$row["t_tel"]?>"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">地址</td>
        <td align="left"><input name="t_con" value="<?=$row["t_con"]?>"></td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" value="送出"></td>
    </tr>
</table>
</form>