<?php
if( isset($_POST["t_n"]) ){ 
    $sql="insert into t7 value(null,'".$_POST["t_n"]."','".$_POST["t_lv"]."','".$_POST["d_y"]."-".$_POST["d_m"]."-".$_POST["d_d"]."','".$_POST["t_f"]."','".$_POST["t_d"]."','".$_FILES["t_m"]["name"]."','".$_FILES["t_p"]["name"]."','".$_POST["t_c"]."','".$_POST["t_time"]."',0,0)";
    mysqli_query($link,$sql);
    copy($_FILES["t_m"]["tmp_name"],"t7/".$_FILES["t_m"]["name"]);
    copy($_FILES["t_p"]["tmp_name"],"t7/".$_FILES["t_p"]["name"]);
}
?>
<form method="post" enctype="multipart/form-data">
  <table width="400" border="1" cellspacing="0" cellpadding="5" align="center">
    <tr>
      <td width="80" align="center">片名</td>
      <td align="center">
        <input type="text" name="t_n">
      </td>
    </tr>
    <tr>
      <td align="center">分級</td>
      <td align="center">
        <select name="t_lv">
          <option value="1">普遍級</option>
          <option value="2">輔導級</option>
          <option value="3">保護級</option>
          <option value="4">限制級</option>
      </select></td>
    </tr>
    <tr>
      <td align="center">片長</td>
      <td align="center">
        <input type="text" name="t_time">
      </td>
    </tr>
    <tr>
      <td align="center">上映日期</td>
      <td align="center">
        <select name="d_y">
          <option value="2019">2019</option>
        </select> 年 
       <select name="d_m">
<?php for($i=1;$i<=12;$i++){?>
            <option value="<?=$i?>"><?=$i?></option>
<?php }?>
        </select> 月 
        <select name="d_d">
<?php for($i=1;$i<=31;$i++){?>
            <option value="<?=$i?>"><?=$i?></option>
<?php }?>
        </select> 日
      </td>
    </tr>
    <tr>
      <td align="center">發行商</td>
      <td align="center">
        <input type="text" name="t_f">
      </td>
    </tr>
    <tr>
      <td align="center">導演</td>
      <td align="center">
        <input type="text" name="t_d">
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
        <textarea name="t_c"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出"></td>
    </tr>
  </table>
</form>