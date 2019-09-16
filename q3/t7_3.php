<?php
if( isset($_POST["t_n"]) ){
    $tm="";
    $tp="";
    if( !empty($_FILES["t_m"]["name"])){
        copy($_FILES["t_m"]["tmp_name"],"t7/".$_FILES["t_m"]["name"]);
        $tm=",t_m = '".$_FILES["t_m"]["name"]."'";
    }
    if( !empty($_FILES["t_p"]["name"])){
        copy($_FILES["t_p"]["tmp_name"],"t7/".$_FILES["t_p"]["name"]);
        $tp=",t_p = '".$_FILES["t_p"]["name"]."'";
    }  
    $sql="update t7 set t_name = '".$_POST["t_n"]."',t_lv = '".$_POST["t_lv"]."',t_up = '".$_POST["t_day"]."',t_f = '".$_POST["t_f"]."',t_d = '".$_POST["t_d"]."',t_c = '".$_POST["t_c"]."',t_time = '".$_POST["t_time"]."',t_look = '".$_POST["t_look"]."',t_order = '".$_POST["t_order"]."' ".$tm.$tp." where t_seq =".$_POST["update"];
    mysqli_query($link,$sql);
}
    
    $sql = "select * from t7 where t_seq = ".$_POST["update"];
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
?>                                
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="update" value="<?=$_POST["update"]?>">
  <table width="400" border="1" cellspacing="0" cellpadding="5" align="center">
    <tr>
      <td width="80" align="center">片名</td>
      <td align="center">
        <input type="text" name="t_n" value="<?=$row["t_name"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">分級</td>
      <td align="center">
        <select name="t_lv">
          <option value="1" <?php if($row["t_lv"] ==1){echo 'selected="selected"';}?>>普遍級</option>
          <option value="2" <?php if($row["t_lv"] ==2){echo 'selected="selected"';}?>>輔導級</option>
          <option value="3" <?php if($row["t_lv"] ==3){echo 'selected="selected"';}?>>保護級</option>
          <option value="4" <?php if($row["t_lv"] ==4){echo 'selected="selected"';}?>>限制級</option>
      </select></td>
    </tr>
    <tr>
      <td align="center">片長</td>
      <td align="center">
        <input type="text" name="t_time" value="<?=$row["t_time"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">上映日期</td>
      <td align="center">
         <input type="text" name="t_day" value="<?=$row["t_up"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">發行商</td>
      <td align="center">
        <input type="text" name="t_f" value="<?=$row["t_f"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">導演</td>
      <td align="center">
        <input type="text" name="t_d" value="<?=$row["t_d"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">預告片</td>
      <td align="center">
        <input type="file" name="t_m">
      </td>
    </tr>
    <tr>
      <td align="center">海報</td>
      <td align="center">
        <input type="file" name="t_p">
      </td>
    </tr>
    <tr>
      <td align="center">簡介</td>
      <td align="center">
        <textarea name="t_c"><?=$row["t_c"]?></textarea>
      </td>
    </tr>
    <tr>
      <td align="center">是否顯示</td>
      <td align="center">
        <input type="text" name="t_look" value="<?=$row["t_look"]?>">
      </td>
    </tr>
    <tr>
      <td align="center">排序</td>
      <td align="center">
        <input type="text" name="t_order" value="<?=$row["t_order"]?>">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出"></td>
    </tr>
  </table>
</form>