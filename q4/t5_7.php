<?php
$sql = "select * from t5";
$ro = mysqli_query($link,$sql);
$row= mysqli_fetch_assoc($ro);

if(!empty($_GET["no"])){
    $sql = "select * from t5_2 where t_b_seq = '".$_GET["no"]."'";
    $ro2 = mysqli_query($link,$sql);
    $row2= mysqli_fetch_assoc($ro2);
}
if(!empty($_POST["t2"])){
    $sql = "insert into t5_3 value( null, '".$_POST["t2"]."', '".$_POST["t_name"]."', '".$_POST["t_money"]."', '".$_POST["t_type"]."', '".$_POST["t_cnt"]."', '".$_FILES["t_pic"]["name"]."', '".$_POST["t_con"]."', '0' )";
    mysqli_query($link,$sql);
    copy( $_FILES["t_pic"]["tmp_name"] , "item/".$_FILES["t_pic"]["name"] );
}
?>
<form method="post" enctype="multipart/form-data">
    <table width="80%" border="0" align="center" cellpadding="5" cellspacing="3">
        <tr>
            <td width="200" align="center">所屬大類</td>
            <td align="center">
                <select name="t1" id="t1" onchange="document.location.href='admin.php?do=itemadd&no='+document.getElementById('t1').value">
                    <option>請選擇大類</option>
<?php do{?>
                    <option value="<?=$row["t_seq"]?>" <?php if(!empty($_GET["no"])){ if($_GET["no"] == $row["t_seq"]){ echo "selected='selected'"; } } ?> ><?=$row["t_name"]?></option>
<?php }while($row= mysqli_fetch_assoc($ro));?>
                </select>
            </td>
        </tr>
<?php if(!empty($_GET["no"])){?>
        <tr>
            <td align="center">所屬中類</td>
            <td align="center">
                <select name="t2">
<?php do{?>
                    <option value="<?=$row2["t_seq"]?>"><?=$row2["t_name"]?></option>
<?php }while($row2= mysqli_fetch_assoc($ro2));?>
                </select>
            </td>
        </tr>
<?php }?>

        <tr>
            <td align="center">商品名稱</td>
            <td align="center">
                <input name="t_name">
            </td>
        </tr>
        <tr>
            <td align="center">商品價格</td>
            <td align="center">
                <input name="t_money">
            </td>
        </tr>
        <tr>
            <td align="center">規格</td>
            <td align="center">
            <input name="t_type">
            </td>
        </tr>
        <tr>
            <td align="center">庫存量</td>
            <td align="center">
                <input name="t_cnt">
            </td>
        </tr>
        <tr>
            <td align="center">商品圖片</td>
            <td align="center">
                <input type="file" name="t_pic">
            </td>
        </tr>
        <tr>
            <td align="center">商品介紹</td>
            <td align="center">
                <textarea name="t_con" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="送出" >
            </td>
        </tr>
    </table>
</form>