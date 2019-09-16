<?php
    if( !empty($_POST["del"])){
        $sql = "delete from t8 where t_no = '".$_POST["del"]."'";
        mysqli_query($link,$sql);
    }
    if( !empty($_POST["ddel"])){
        $sql = "delete from t8 where t_day = '".$_POST["ddel"]."'";
        mysqli_query($link,$sql);
    }
    if( !empty($_POST["dddel"])){
        $sql = "delete from t8 where t_name = '".$_POST["dddel"]."'";
        mysqli_query($link,$sql);
    }
    
    $sql = "select t8.t_no ,t7.t_name ,t8.t_day ,t8.t_c from t8 ,t7 where t8.t_name = t7.t_seq group by t_no desc";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    
    $sql = "select * from t7";
    $ro0 = mysqli_query($link,$sql);
    $row0 = mysqli_fetch_assoc($ro0);  
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
<form method="post">
  <tr>
    <td colspan="7">快速刪除 依日期
    <input type="text" name="ddel">
    <input type="submit" value="刪除">
    </td>
  </tr>
</form> 
<form method="post" >

  <tr>
    <td colspan="7">快速刪除 依電影
    <select name="dddel">
<?php do{?>    
        <option value="<?=$row0["t_seq"]?>"><?=$row0["t_name"]?></option>
<?php }while($row0 = mysqli_fetch_assoc($ro0));?>
    </select> 
    <input type="submit" value="刪除">
    </td>
  </tr>
</form> 
  <tr>
    <td align="center">訂單編號</td>
    <td align="center">電影名稱</td>
    <td align="center">觀看日期</td>
    <td align="center">場次時間</td>
    <td align="center">訂購數量</td>
    <td align="center">訂購位置</td>
    <td align="center"></td>
  </tr>
<?php do{?>
<?php 
    $sql = "select * from t8 where t_no = '".$row["t_no"]."'";
    $ro1 = mysqli_query($link,$sql);
    $row1 = mysqli_fetch_assoc($ro1);
    $total = mysqli_num_rows($ro1);
     
?>  
<form method="post">
<input type="hidden" name="del" value="<?=$row["t_no"]?>">  
  <tr>
    <td align="center"><?=$row["t_no"]?></td>
    <td align="center"><?=$row["t_name"]?></td>
    <td align="center"><?=$row["t_day"]?></td>
    <td align="center"><?=$row["t_c"]?></td>
    <td align="center"><?=$total?></td>
    <td align="center">
          <?php 
              do{
   $z = $row1["t_s"];
   $x = ceil($z/5);//計算排數
   $y = $z - (($x-1)*5);//計算位置數        
   echo $x."排 - ".$y."號<br>";       
              }while($row1 = mysqli_fetch_assoc($ro1));
              ?>     
    </td>
    <td align="center"><input type="submit" value="刪除"></td>
  </tr>
</form> 
<?php }while($row = mysqli_fetch_assoc($ro));?> 
</table>
