<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
<div id="xx" style="width:420px;height:330px;background:#fff">
      <div id="ppic" style="width:420px;height:315px;background-size:auto 330px;background-repeat:no-repeat;background-position:center center;"></div>
      <div id="npic" style="width:420px;height:15px;color:#000;text-align:center;">111</div>
</div>
<div style="width:420px;height:60px;background:#fff;margin:10px 0;">
<?php include_once("t4.php");?>
</div>
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
<?php
    $page=4;
    $now_page=1;
    if(!empty($_GET["page"])){ $now_page=$_GET["page"];}
    $upday = $day2;//今日日期  -2
    $downday = $nowday;//今日日期 
    $sql = "select * from t7 where t_look = 1 and t_up >= '".$upday."' and t_up <= '".$downday."' order by t_order desc";
    $ro = mysqli_query($link,$sql);
    $total = mysqli_num_rows($ro);
    $total_page = ceil($total/$page);
 
    $l_page = ($now_page - 1)* $page;
    $sql = "select * from t7 where t_look = 1 and t_up >= '".$upday."' and t_up <= '".$downday."' order by t_order desc limit ".$l_page.",".$page;
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
?>      
      <div class="rb tab" style="width:95%;">
<?php do{?>
<div style="width:200px;height:200px;background-color:#009688;margin:5px;float:left;">
    <table width="200" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td colspan="2" align="center" width="100"><?=$row["t_name"]?></td>
  </tr>
  <tr>
    <td rowspan="2" align="center" width="100"><img src="t7/<?=$row["t_p"]?>"width="100" onclick="document.location.href='?redo=t6&no=<?=$row["t_seq"]?>'"></td>
    <td align="left"><img src="img/<?=$row["t_lv"]?>.png"></td>
  </tr>
  <tr>
     <td align="left"><?=$row["t_up"]?></td>
  </tr>
  <tr>
    <td align="center"><input type="button" onclick="document.location.href='?redo=t6&no=<?=$row["t_seq"]?>'" value="劇情簡介"></td>
    <td align="center"><input type="button" onclick="document.location.href='?redo=t8&no=<?=$row["t_seq"]?>'" value="線上訂票"></td>
  </tr>
</table>
</div>
<?php }while($row= mysqli_fetch_assoc($ro));?>
　
        <div class="ct" style="width:440px;height:10px;"><?php for($i=1;$i<=$total_page;$i++){echo "<a href='?page=".$i."'>".$i."</a>";}?></div>
      </div>
    </div>