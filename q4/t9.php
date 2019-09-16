<?php
$sql = "select * from t9";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="1">
    <tr>
        <td colspan="4" align="center">會員管理</td>
    </tr>
    <tr>
        <td colspan="4" align="center"><A HREF="?do=memadd">新增</A></td>
    </tr>
    <tr>
        <td width="30%" align="center" bgcolor="#FF33f0">姓名</td>
        <td width="30%" align="center" bgcolor="#FF33F0">帳號</td>
        <td width="25%" align="center" bgcolor="#FF33F0">註冊日期</td>
        <td width="15%" align="center" bgcolor="#FF33F0">操作</td>
    </tr>
<?php do{?>
    <tr>
        <td align="center"><?=$row["t_name"]?></td>
        <td align="center"><?=$row["t_id"]?></td>
        <td align="center"><?=$row["t_dat"]?></td>
        <td align="center">
            <input type="button" value="編輯" onclick="document.location.href='?do=memupdate&no=<?=$row["t_seq"]?>'"> 
            <input type="button" value="刪除" onclick="document.location.href='?do=memdel&no=<?=$row["t_seq"]?>'">
        </td>
    </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>
</table>
