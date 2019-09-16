<?php
include_once("setdb.php");
    $sql="select * from t9 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($ro);
    
    $page_cnt=5;
    $page_totle = ceil($totle / $page_cnt);
    $page_now = 1;
    if( !empty($_GET["page"])){
        $page_now = $_GET["page"];
    }
    $page_open = ($page_now - 1)*$page_cnt;
    $p1 = $page_now -1;
    $p2 = $page_now +1;
    
    $sql="select * from t9 where t_look=2 limit ".$page_open." , ".$page_cnt;
    $ro1 = mysqli_query($link,$sql);
    $row1=mysqli_fetch_assoc($ro1); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=meg -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./news_files/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<script src="./news_files/jquery-1.9.1.min.js"></script>
<script src="./news_files/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
    	<a title="" href="?"><?php include_once("t3_2.php");?><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
                    	                            <span class="t botli">主選單區</span>
<?php include_once("t12_2.php");?>                                               
                                                </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 :<?php include_once("t7_1.php");?></span>
                    </div>
        		</div>
                <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
                	                     <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;"><?php include_once("t4_2.php");?></marquee>
                    <div style="height:32px; display:block;"></div>
                                        <!--正中央-->
    <table width="100%">
<?php 
do{
?>      
      <tr>
        	<td align="left"><?=mb_substr($row1["t_cont"],0,30,"utf-8")?></td> 
      </tr>
<?php }while($row1=mysqli_fetch_assoc($ro1));?>
<?php
if($page_totle > 1){          
?>
        <tr>
            <td align="center" colspan="4"><a href="01P04.php?to=t9&page=<?=$p1?>">＜</a>
<?php
    for($i=1;$i<=$page_totle;$i++){
        if( $page_now == $i){echo "<span style='font-size:20px'>".$i."</span>";
        }else{
        echo $i."　";
        }
}
?>
<a href="01P04.php?to=t9&page=<?=$p2?>">＞</a>
          </td>
        </tr>
<?php
}        
?>                    
    </table>                                    
                        
	                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="document.location.href='login.php'">回後台管理</button>
                	<div style="width:89%; height:480px;" class="dbor">
                    	<span class="t botli">校園映象區</span>
<?php include_once("t6_2.php");?>                      
						                        <script>
                        	var nowpage=0,num=0;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)*3<=num*1+3)
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=2;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)
                        </script>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
                	<span class="t" style="line-height:123px;"><?php include_once("t8_1.php");?></span>
                </div>
    </div>

</body></html>