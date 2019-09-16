<?php      
    $sql = "select * from t5 where t_look=1 order by t_orderby desc";
    $ro = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($ro);
    $total = mysqli_num_rows($ro);
    $t_w = $total*90;
?>
<script>
var p_pic = new Array(<?=$total?>);
var n_pic = new Array(<?=$total?>);
</script>
<style>
.img{
    width:60px;
    height:65px;
    margin:0 15px;
    float:left;
    background-size:100% 100%;
}
.arr{
    width:20px;
    height:20px;
    float:left;
}
#all_pic{
    width:<?=$t_w?>px;
    height:65px;
    position:relative; 
}
</style>
<div class="arr" style="margin:20px 10px 20px 0;background:url(img/01E01.jpg)" onclick="ll()"></div>
<div style="width:360px;height:65px;float:left;overflow:hidden;">
    <div id="all_pic">
      <?php 
$pic_list = 0;      
      do{ 
$pic_list ++;      
      ?> 
<script>
    p_pic[<?=$pic_list?>] = "t5/<?=$row["t_pic"]?>";
    n_pic[<?=$pic_list?>] = "<?=$row["t_title"]?>";
</script>         
        <div class="img" style="background-image:url(t5/<?=$row["t_pic"]?>)" onclick="p<?=$_SESSION["cha"]?>('<?=$pic_list?>')"></div>
      <?php }while($row = mysqli_fetch_assoc($ro));?> 
    </div>
</div>      
<div class="arr" style="margin:20px 0 20px 10px;background:url(img/01E02.jpg)" onclick="rr()"></div>
<script>
var now_1 = 1;
function ll(){
    now_1 = now_1-1;
    if(now_1 < 1){now_1 = 1;}
    go_pic();
}
function rr(){
    now_1 = now_1+1;
    if(now_1 > <?=$total?>-3){now_1 = <?=$total?>-3;}
    go_pic();
}
function go_pic(){
    now_position = (now_1 - 1)*90;
    $("#all_pic").animate({left:"-" + now_position +"px"},500);
}
var max_look = <?=$total?>;
var now_look = 1;
function ctime(){
    if(now_look >= max_look){now_look = 1;}else{now_look++;}
    p<?=$_SESSION["cha"]?>(now_look);
    setTimeout( function(){ ctime();}, 5000 );
}
ctime();
function p1(x){     
      document.getElementById("npic").innerHTML=n_pic[x];
      document.getElementById("ppic").style.display="none";
      document.getElementById("ppic").style.backgroundImage="url("+p_pic[x]+")";
      $("#ppic").fadeToggle(2000);
}

function p2(x){
      document.getElementById("npic").innerHTML=n_pic[x];     
      document.getElementById("ppic").style.display="none";
      document.getElementById("ppic").style.backgroundImage="url("+p_pic[x]+")";
      $("#ppic").slideToggle(2000);
}
function p3(x){     
      document.getElementById("npic").innerHTML=n_pic[x];
      document.getElementById("ppic").style.display="none";
      document.getElementById("ppic").style.backgroundSize="auto 100%";
      document.getElementById("ppic").style.backgroundImage="url("+p_pic[x]+")";
      $("#ppic").slideToggle(2000);
}

</script>