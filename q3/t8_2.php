<?php
$t_m = $_POST["t_m"];
$t_d = $_POST["t_d"];
$t_n = $_POST["t_n"];

$time[1]="14:00~16:00";
$time[2]="16:00~18:00";
$time[3]="18:00~20:00";
$time[4]="20:00~22:00";
$time[5]="22:00~24:00";

$sql = "select * from t7 where t_seq=".$t_m;
$ro = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($ro);
?>
<style>
.dingwa{
    width:40px;
    height:80px;
    margin:1px;
    border:1px #000 solid;
    float:left;
}
</style>
<form method="post" action="?redo=t8_3">
<input type="hidden" name="t_m" value="<?=$t_m?>">
<input type="hidden" name="t_d" value="<?=$t_d?>">
<input type="hidden" name="t_n" value="<?=$t_n?>">
<input type="hidden" name="t_1" value="<?=$row["t_name"]?>">
<input type="hidden" name="t_2" value="<?=$time[$t_n]?>">
<div style="width:220px;min-height:260px;margin:0 auto;">
<?php for($i=1;$i<=20;$i++){?>
    <div class="dingwa"><img src="img/a0.png"><br><input type="checkbox" name="dw[]" id="b<?=$i?>" value="<?=$i?>" onclick="ch_di(<?=$i?>)"></div>
<?php }?>    
</div>
<div style="width:220px;min-height:260px;margin:0 auto;" align="center">
選擇的電影：<?=$row["t_name"]?><br>
觀看日期：<?=$t_d?><br>
時刻：<?=$time[$t_n]?><br>
已選擇<span id="now_check_cnt">0</span>個位置<br>
    <input type="submit" value="訂購"> <input type="button" value="上一步" onclick="document.location.href='?redo=t8&no=<?=$t_m?>&no2=<?=$t_d?>&no3=<?=$t_n?>'">
</div>
</form>
<script>
var total_checkbox = 0;
function ch_di(x){
    vv = document.getElementById("b"+x).checked;
    if(vv == true){
        if(total_checkbox >=4){
           document.getElementById("b"+x).checked = false;
        }else{
           total_checkbox = total_checkbox + 1;
        }        
    }else{
        total_checkbox = total_checkbox - 1;
    }
    document.getElementById("now_check_cnt").innerHTML = total_checkbox;
}
function dd(o){
    document.getElementsByClassName("dingwa")[o-1].innerHTML="<img src='img/a1.png'>";
}
<?php
    $sql = "select * from t8 where t_name='".$t_m."' and t_day='".$t_d."' and t_c='".$t_n."'";
    $ro1 = mysqli_query($link,$sql);
    $row1 = mysqli_fetch_assoc($ro1); 
    do{
       echo "dd(".$row1["t_s"].");";
    }while($row1= mysqli_fetch_assoc($ro1));   
?>
</script>