<?php
if( !empty($_POST["footer"]) ){
    $sql = "update t11 set t_word = '".$_POST["footer"]."'";
    mysqli_query($link,$sql);
}
$sql = "select * from t11";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<br>
<form method="post">
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="2" align="center">頁尾管理</td>
    </tr>
    <tr>
        <td width="20%" align="center">內容</td>
        <td align="center">
            <input type="text" name="footer" id="footer" value="<?=$row["t_word"]?>">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="編輯" /> <input type="button" value="重置" onclick="document.getElementById('footer').value='';"/></td>
    </tr>
</table>
</form>