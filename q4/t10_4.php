<?php
if( !empty($_POST["tid"]) ){
    $tid = $_POST["tid"];
    $lv1 = 0;
    $lv2 = 0;
    $lv3 = 0;
    $lv4 = 0;
    $lv5 = 0;
    if( !empty($_POST["tpw"]) ){ $tpw = $_POST["tpw"];}
    if( !empty($_POST["lv1"]) ){ $lv1 = $_POST["lv1"];}
    if( !empty($_POST["lv2"]) ){ $lv2 = $_POST["lv2"];}
    if( !empty($_POST["lv3"]) ){ $lv3 = $_POST["lv3"];}
    if( !empty($_POST["lv4"]) ){ $lv4 = $_POST["lv4"];}
    if( !empty($_POST["lv5"]) ){ $lv5 = $_POST["lv5"];}
    $sql="insert into t10 value(null,'".$tid."','".$tpw."','".$lv1."','".$lv2."','".$lv3."','".$lv4."','".$lv5."')";
    mysqli_query($link,$sql);
    header("location:admin.php?do=admin_lv");
}
?>
<form method="post">
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="2" align="center">新增管理帳號</td>
    </tr>
    <tr>
        <td width="40%" align="center">帳號</td>
        <td align="left">
            <input type="text" name="tid"/>
        </td>
    </tr>
    <tr>
        <td align="center">密碼</td>
        <td align="left">
            <input type="text" name="tpw"/>
        </td>
    </tr>
    <tr>
        <td align="center">權限</td>
        <td align="left">
            <input type="checkbox" name="lv1" value="1"/> 商品分類與管理<br>
            <input type="checkbox" name="lv2" value="1"/> 訂單管理<br>
            <input type="checkbox" name="lv3" value="1"/> 會員管理<br>
            <input type="checkbox" name="lv4" value="1"/> 頁尾版權管理<br>
            <input type="checkbox" name="lv5" value="1"/> 最新消息管理
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="新增" /></td>
    </tr>
</table>

</form>