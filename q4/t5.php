<?php
if( !empty($_POST["t1"]) ){
    $sql="insert into t5 value( null, '".$_POST["t1"]."' )";
    mysqli_query($link,$sql);
}
if( !empty($_POST["t2"]) ){
    $sql="insert into t5_2 value( null , '".$_POST["t2"]."' , '".$_POST["s1"]."' )";
    mysqli_query($link,$sql);
}
$sql = "select * from t5";
$ro = mysqli_query($link,$sql);
$row= mysqli_fetch_assoc($ro);

$ro1 = mysqli_query($link,$sql);
$row1= mysqli_fetch_assoc($ro1);
?>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="3">
    <tr>
        <td colspan="2" align="center">商品分類 <a href="admin.php?do=item">商品管理</a></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
<form method="post">
            新增大類 
            <input name="t1">
            <input type="submit" value="新增" />
</form>        
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
<form method="post">
            新增中類
            <select name="s1">
<?php do{?>
                <option value="<?=$row1["t_seq"]?>"><?=$row1["t_name"]?></option>
<?php }while($row1= mysqli_fetch_assoc($ro1));?>
            </select>
            <input name="t2"/>
            <input type="submit"  value="新增" />
</form>
        </td>
    </tr>
<?php do{?>
    <tr>
        <td align="left" bgcolor="#ffd6bf" width="80%"><?=$row["t_name"]?></td>
        <td align="center" bgcolor="#ffd6bf"><a href="javascript:if(x = prompt('請輸入新的分類名稱','<?=$row["t_name"]?>') ){ document.location.href='admin.php?do=thup1&no=<?=$row["t_seq"]?>&con='+x ;}">修改</a> <a href="admin.php?do=thdel&no=<?=$row["t_seq"]?>">刪除</a></td>
    </tr>
<?php
    $sql = "select * from t5_2 where t_b_seq = '".$row["t_seq"]."'";
    $ro0 = mysqli_query($link,$sql);
    $row0= mysqli_fetch_assoc($ro0);
    $t0= mysqli_num_rows($ro0);
    if($t0 > 0){
        do{ ?>
            <tr>
                <td align="left" bgcolor="#91f4a6" width="80%"><?=$row0["t_name"]?></td>
                <td align="center" bgcolor="#91f4a6"><a href="javascript:if(x = prompt('請輸入新的分類名稱','<?=$row0["t_name"]?>') ){ document.location.href='admin.php?do=thup2&no=<?=$row0["t_seq"]?>&con='+x ;}">修改</a> <a href="admin.php?do=thdel2&no=<?=$row0["t_seq"]?>">刪除</a></td>
            </tr>
        <?php }while($row0= mysqli_fetch_assoc($ro0));
    }
    ?>
<?php }while($row= mysqli_fetch_assoc($ro));?>
</table>