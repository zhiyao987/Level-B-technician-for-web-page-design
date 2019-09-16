<?php 
    if( !empty($_POST["del"]) ){
        $sql="delete from t7 where t_seq = ".$_POST["del"];
        mysqli_query($link,$sql);
    }
     if( !empty($_GET["del"]) ){
        $sql="delete from t7 where t_seq = ".$_GET["del"];
        mysqli_query($link,$sql);
    }
    $sql = "select * from t7";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="4" align="center"><a href="?do=admin&redo=t7_2">新增電影</a></td>
  </tr>
  <tr>
    <td align="center" width="200">海報</td>
    <td align="center" width="300">片名</td>
    <td align="center" width="400">簡介</td>
    <td align="center"></td>
    </tr>
<?php do{?>    
  <tr>
    <td align="center"><img src="t7/<?=$row["t_p"]?>" width="100"></td>
    <td align="center"><?=$row["t_name"]?></td>
    <td align="center"><?=$row["t_c"]?></td>
    <td align="center">
    
    <form  method="post" action="?do=admin&redo=t7_3">
     <input type="hidden" name="update"  value="<?=$row["t_seq"]?>">
     <input type="submit" value="編輯">
    </form>
    
    <form method="post">
    <input type="hidden" name="del"  value="<?=$row["t_seq"]?>">
      <input type="submit" value="刪除">
    </form>
    <a href="?do=admin&redo=t7&del=<?=$row["t_seq"]?>">刪除</a>
    </td>
  </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>  
</table>
