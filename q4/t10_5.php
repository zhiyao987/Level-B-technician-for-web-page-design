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
    $sql="update t10  set t_id = '".$tid."', t_pw = '".$tpw."', t_lv1='".$lv1."', t_lv2 = '".$lv2."', t_lv3 = '".$lv3."', t_lv4 = '".$lv4."', t_lv5 = '".$lv5."' where t_seq = '".$_GET['no']."'";
    mysqli_query($link,$sql);
    header("location:admin.php?do=admin_lv");
}
$sql = "select * from t10 where t_seq = '".$_GET['no']."'";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<form method="post">
<table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="2" align="center">修改管理帳號</td>
    </tr>
    <tr>
        <td width="40%" align="center">帳號</td>
        <td align="left">
            <input type="text" name="tid" value="<?=$row["t_id"]?>"/>
        </td>
    </tr>
    <tr>
        <td align="center">密碼</td>
        <td align="left">
            <input type="text" name="tpw" value="<?=$row["t_pw"]?>"/>
        </td>
    </tr>
    <tr>
        <td align="center">權限</td>
        <td align="left">
            <input type="checkbox" name="lv1" value="1" <?php if($row["t_lv1"]==1 ){ echo "checked";}?> > 商品分類與管理<br>
            <input type="checkbox" name="lv2" value="1" <?php if($row["t_lv2"]==1 ){ echo "checked";}?> > 訂單管理<br>
            <input type="checkbox" name="lv3" value="1" <?php if($row["t_lv3"]==1 ){ echo "checked";}?> > 會員管理<br>
            <input type="checkbox" name="lv4" value="1" <?php if($row["t_lv4"]==1 ){ echo "checked";}?> > 頁尾版權管理<br>
            <input type="checkbox" name="lv5" value="1" <?php if($row["t_lv5"]==1 ){ echo "checked";}?> > 最新消息管理
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="button" id="button" value="修改" /></td>
    </tr>
</table>

</form>