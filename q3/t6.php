<?php
    $sql = "select * from t7 where t_seq = ".$_GET["no"];
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    $nowtime = strtotime($row["t_up"]);
    
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="3" align="center">院線片簡介</td>
  </tr>
  <tr>
    <td rowspan="6"　width="325"><img src="t7/<?=$row["t_p"]?>"></td>
    <td>片名：<?=$row["t_name"]?></td>
    <td rowspan="6"><embed src="t7/<?=$row["t_m"]?>"></td>
  </tr>
  <tr>
    <td>分級： <img src="img/<?=$row["t_lv"]?>.png"></td>
  </tr>
  <tr>
    <td>片長：<?=$row["t_time"]?></td>
  </tr>
  <tr>
    <td>上映日期：<?=date("Y",$nowtime)?>/<?=date("m",$nowtime)?>/<?=date("d",$nowtime)?></td>
  </tr>
  <tr>
    <td>發行商：<?=$row["t_f"]?></td>
  </tr>
  <tr>
    <td>導演：<?=$row["t_d"]?></td>
  </tr>
  <tr>
    <td colspan="3">
        劇情簡介：<br><?=$row["t_c"]?>
        
    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
