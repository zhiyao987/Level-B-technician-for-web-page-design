<?php
$upday = $day2;//今日日期  -2
$downday = $nowday;//今日日期 
$today = 
$no = 0;//電影索引鍵
$no2 = 0;//電影日期
$no3 = 0;//電影場次
if( !empty($_GET["no"])){
    $no = $_GET["no"];
}
if( !empty($_GET["no2"])){
    $no2 = $_GET["no2"];
    $sql = "select count(*) as t_cnt,t_c from t8 where t_day='".$no2."' and t_name = '".$no."' group by t_c";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    do{
        $tcnt[ $row["t_c"] ]=$row["t_cnt"];
    }while($row = mysqli_fetch_assoc($ro));
    for( $i=1;$i<=5;$i++){
         if( empty($tcnt[$i]) ){$tcnt[$i]=0;}
    }
}
if( !empty($_GET["no3"])){
    $no3 = $_GET["no3"];
}     
$sql = "select * from t7 where t_look=1 and t_up >= '".$upday."' and t_up <= '".$downday."'";
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<form method="post" action="?redo=t8_2">
<table width="400" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="50" align="center">電影：</td>
    <td align="left">
<select name="t_m" onchange="document.location.href='?redo=t8&no='+this.value;">
<option >請選擇電影</option>
<?php 
do{
    $n1 = ""; 
    if( $no == $row["t_seq"]){ 
        $n1 = "selected='selected'";
        $t2 = 0; //第2天  0可訂票 1不可訂票
        $t3 = 0; //第3天  0可訂票 1不可訂票
        if($row["t_up"] == $day2){ $t2 = 1;$t3 = 1;}
        if($row["t_up"] == $day1){ $t3 = 1;}
    }
?>
    <option value="<?=$row["t_seq"]?>"<?=$n1?>><?=$row["t_name"]?></option>
<?php }while($row = mysqli_fetch_assoc($ro)); ?>
</select>    
    </td>
  </tr>
<?php
    if( !empty($_GET["no"])){
?>  
  <tr>
    <td align="center">日期：</td>
    <td align="left">
<select name="t_d" onchange="document.location.href='?redo=t8&no=<?=$no?>&no2='+this.value;"> 
<option >請選擇日期</option>   
    <option value="<?=$nowday?>" <?php if( $no2 == $nowday){ echo "selected='selected'";}?> > <?=date("Y/m/d" ,$nd)?> </option>
    <?php if( $t2 == 0 ){?><option value="<?=$day3?>" <?php if( $no2 == $day3){ echo "selected='selected'";}?>><?=date("Y/m/d" ,$nd3)?></option><?php }?>
    <?php if( $t3 == 0 ){?><option value="<?=$day4?>" <?php if( $no2 == $day4){ echo "selected='selected'";}?>><?=date("Y/m/d" ,$nd4)?></option><?php }?>
</select>
    </td>
  </tr>
<?php
    }
    if( !empty($_GET["no2"])){
?>     
  <tr>
    <td align="center">場次：</td>
    <td align="left">
<select name="t_n">  
<?php 
if( $downday == $no2 ){
    $nowtime = intval(date("Hi",$nd));        
?> 
    <option >請選擇場次</option> 
    <?php if($nowtime < 1400 ){?><option value="1" <?php if( $no3 == 1){ echo "selected='selected'";}?>>14:00~16:00 剩餘座位<?=20-$tcnt[1]?></option><?php }?>
    <?php if($nowtime < 1600 ){?><option value="2" <?php if( $no3 == 2){ echo "selected='selected'";}?>>16:00~18:00 剩餘座位<?=20-$tcnt[2]?></option><?php }?>
    <?php if($nowtime < 1800 ){?><option value="3" <?php if( $no3 == 3){ echo "selected='selected'";}?>>18:00~20:00 剩餘座位<?=20-$tcnt[3]?></option><?php }?>
    <?php if($nowtime < 2000 ){?><option value="4" <?php if( $no3 == 4){ echo "selected='selected'";}?>>20:00~22:00 剩餘座位<?=20-$tcnt[4]?></option><?php }?>
    <?php if($nowtime < 2200 ){?><option value="5" <?php if( $no3 == 5){ echo "selected='selected'";}?>>22:00~24:00 剩餘座位<?=20-$tcnt[5]?></option><?php }?>
<?php }else{ ?>  
    <option >請選擇場次</option>   
    <option value="1" <?php if( $no3 == 1){ echo "selected='selected'";}?>>14:00~16:00 剩餘座位<?=20-$tcnt[1]?></option>
    <option value="2" <?php if( $no3 == 2){ echo "selected='selected'";}?>>16:00~18:00 剩餘座位<?=20-$tcnt[2]?></option>
    <option value="3" <?php if( $no3 == 3){ echo "selected='selected'";}?>>18:00~20:00 剩餘座位<?=20-$tcnt[3]?></option>
    <option value="4" <?php if( $no3 == 4){ echo "selected='selected'";}?>>20:00~22:00 剩餘座位<?=20-$tcnt[4]?></option>
    <option value="5" <?php if( $no3 == 5){ echo "selected='selected'";}?>>22:00~24:00 剩餘座位<?=20-$tcnt[5]?></option>
<?php }?>
</select>   
    </td>
  </tr>   
  <tr>
    <td colspan="2" align="center"><input type="submit" value="確定"></td>
  </tr>
<?php
    }
?>
</table>
</form>