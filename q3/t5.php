<?php
if( !empty($_POST["t_title"])){
    $pn = rand(0,9);
    $sql = "insert into t5 value(null,'".$_POST["t_title"]."','a".$pn.$_FILES["t_pic"]["name"]."',0,0);";
    mysqli_query($link,$sql);
    copy($_FILES["t_pic"]["tmp_name"],"t5/a".$pn.$_FILES["t_pic"]["name"]);
}
if( !empty($_POST["look"][0])){
    $sql = "update t5 set t_look = 0";
    mysqli_query($link,$sql);
    for( $i=0;$i<count($_POST["look"]);$i++ ){
        $sql = "update t5 set t_look = 1  where t_seq='".$_POST["look"][$i]."'";
        mysqli_query($link,$sql);
    }
}
if( !empty($_POST["orderby"][0])){
    for( $i=0;$i<count($_POST["orderby"]);$i++ ){
        $sql = "update t5 set t_orderby = '".$_POST["orderby"][$i]."' where t_seq='".$_POST["seq"][$i]."'";
        mysqli_query($link,$sql);
    }
}
if( !empty($_POST["del"][0])){
   for( $i=0;$i<count($_POST["del"]);$i++){ 
    $sql = "delete from t5 where t_pic='".$_POST["del"][$i]."'";
    mysqli_query($link,$sql);
    unlink("t5/".$_POST["del"][$i]);
  }
} 
if( !empty($_POST["cha"])){
    $_SESSION["cha"]= $_POST["cha"];
}       
    $sql = "select * from t5 order by t_orderby desc";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
$look[0] = "";
$look[1] = "checked='checked'";
?>
<form method="post" enctype="multipart/form-data">
  <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="2" align="center">新增預告片海報</td>     
    </tr>
    <tr>
      <td width="50%" align="center">預告片海報
        <input type="file" name="t_pic">
      </td>
      <td align="center">預告片片名
        <input type="text" name="t_title">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="送出">
      </td>
    </tr>
  </table>
</form>
<br>
<form name="form2" method="post">
  <table width="100%" border="1" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td colspan="4" align="center">
<select name="cha">    
    <option>請選擇切換動畫</option>
    <option value="1">淡入</option>
    <option value="2">滑出</option>
    <option value="3">縮放</option>
</select>
      </td>
    </tr>
    <tr>
      <td colspan="4" align="center">預告片清單</td> 
    </tr>
    <tr>
      <td width="25%" align="center">海報</td>
      <td width="25%" align="center">片名</td>
      <td width="25%" align="center">排序</td>
      <td width="25%" align="center">操作</td>
    </tr>
<?php do{ ?>    
    <tr>
      <td align="center"><img src="t5/<?=$row["t_pic"]?>" width="100"></td>
      <td align="center"><?=$row["t_title"]?></td>
      <td align="center">
      <input name="orderby[]" value="<?=$row["t_orderby"]?>"><input type="hidden" name="seq[]" value="<?=$row["t_seq"]?>">        
      </td>
      <td align="center">
        顯示<input type="checkbox" name="look[]" value="<?=$row["t_seq"]?>" <?=$look[$row["t_look"]]?>> 
        刪除<input type="checkbox" name="del[]" value="<?=$row["t_pic"]?>">
      </td>
    </tr>
<?php }while($row = mysqli_fetch_assoc($ro));?>    
    <tr>
      <td colspan="4" align="center"><input type="submit" name="button2" id="button2" value="送出"></td>
    </tr>
  </table>
</form>
