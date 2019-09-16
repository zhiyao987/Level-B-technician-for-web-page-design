<?php
//==========================新增=================================================
    if(!empty($_POST["t_cont"])){
      $sql = "insert into t9 (t_cont,t_look) value('".$_POST["t_cont"]."',1)";
      mysqli_query($link,$sql);
    }
//==========================新增=================================================
//==========================修改=================================================
    if( !empty($_POST["n_u"])){
     for($i=0;$i<count($_POST["t_seq"]);$i++){
        $sql = "update t9 set t_look = '1' where t_seq = '".$_POST["t_seq"][$i]."'";
        mysqli_query($link,$sql);
        }
//==========================內容修改=================================================      
        for($i=0;$i<count($_POST["t_cont1"]);$i++){
            $sql = "update t9 set t_cont = '".$_POST["t_cont1"][$i]."' where t_seq = '".$_POST["t_seq"][$i]."'";
            mysqli_query($link,$sql);  
        }   
//==========================內容修改=================================================         
//==========================顯示修改=================================================
         for($i=0;$i<count($_POST["t_look"]);$i++){
            $sql = "update t9 set t_look = '2' where t_seq = '".$_POST["t_look"][$i]."'";
            mysqli_query($link,$sql);  
        }    
//==========================顯示修改================================================= 
//==========================刪除=================================================
     if( !empty($_POST["t_del"][0])){
          for($i=0;$i<count($_POST["t_del"]);$i++){
              $sql = "delete from t9 where t_seq = '".$_POST["t_del"][$i]."'";
              mysqli_query($link,$sql);
          }
     }
//==========================刪除=================================================
     }
//==========================修改=================================================
    $sql="select * from t9";
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
    
    $sql="select * from t9 limit ".$page_open." , ".$page_cnt;
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro); 
?> 
 <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">最新消息管理</p>
        <form method="post">
<input type="hidden" name="n_u" value="1">        
    <table width="100%">
    <tr class="yel">
        	<td width="45%">最新消息</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
      </tr>
<?php 
do{
$rr = "";
if($row["t_look"]==2){ $rr ="checked='checked'";}
?>      
      <tr>
        	<td align="left">
          <textarea name="t_cont1[]" style="width:90%"><?=$row["t_cont"]?></textarea>        	  
          <input name="t_seq[]" value="<?=$row["t_seq"]?>" type="hidden"></td>
          <td align="center"><input name="t_look[]" type="checkbox" value="<?=$row["t_seq"]?>"<?=$rr?></td>
          <td align="center"><input name="t_del[]" type="checkbox" value="<?=$row["t_seq"]?>"></td>
      </tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
<?php
if($page_totle > 1){          
?>
        <tr>
            <td align="center" colspan="4"><a href="admin.php?to=t9&page=<?=$p1?>">＜</a>
<?php
    for($i=1;$i<=$page_totle;$i++){
        if( $page_now == $i){echo "<span style='font-size:20px'>".$i."</span>";
        }else{
        echo $i."　";
        }
}
?>
<a href="admin.php?to=t9&page=<?=$p2?>">＞</a>
          </td>
        </tr>
<?php
}        
?>                    
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t9_1.php&#39;)" value="新增最新消息"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>