<?php
//=====================================新增=====================================
    if( !empty($_FILES["t_title"]["name"]) ){
        $new_name = date("His").$_FILES["t_title"]["name"];
        $sql = "insert into t6 ( t_pic , t_look ) value('".$new_name."',1)";
        mysqli_query($link,$sql);
        copy($_FILES["t_title"]["tmp_name"],"t6/".$new_name);
    }
//=====================================新增=====================================
//=====================================修改=====================================
    if( !empty($_POST["n_u"]) ){
        for($i=0;$i<count($_POST["t_seq"]);$i++){
            $sql = "update t6 set t_look = '1' where t_seq = '". $_POST["t_seq"][$i]."'";
            mysqli_query($link,$sql);
        }
       
        for($i=0;$i<count($_POST["t_look"]);$i++){
            $sql = "update t6 set t_look = '2' where t_seq = '". $_POST["t_look"][$i]."'";
            mysqli_query($link,$sql);
        }
//------------------------------------刪除------------------------------------
        if( !empty($_POST["t_del"][0]) ){
            for($i=0;$i<count($_POST["t_del"]);$i++){
                $sql = "delete from t6 where t_pic = '". $_POST["t_del"][$i]."'";
                mysqli_query($link,$sql);
                unlink("t6/".$_POST["t_del"][$i]);
            }
        }
//------------------------------------刪除------------------------------------        
    }
//=====================================修改=====================================
//=====================================改圖=====================================
    if( !empty($_FILES["t_pic"]["name"]) ){
        $new_name = date("His").$_FILES["t_pic"]["name"];
        $sql = "update t6 set t_pic = '".$new_name."' where t_pic = '".$_POST["t_pic_2"]."'";
        mysqli_query($link,$sql);
        unlink("t6/".$_POST["t_pic_2"]);
        copy($_FILES["t_pic"]["tmp_name"],"t6/".$new_name);
    }
//=====================================改圖=====================================
//=====================================計算分頁=================================
    $sql="select * from t6";
    $ro = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($ro);
    
    $page_cnt=3;
    $page_totle = ceil($totle / $page_cnt);
    $page_now = 1;
    if( !empty($_GET["page"])){
        $page_now = $_GET["page"];
    }
    $page_open = ($page_now - 1)*$page_cnt;
    $p1 = $page_now -1;
    $p2 = $page_now +1;
    
    $sql="select * from t6 limit ".$page_open." , ".$page_cnt;
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">校園映像圖片</p>
        <form method="post">
<input type="hidden" name="n_u" value="1">
    <table width="100%">
    	<tr class="yel">
        	<td width="70%">網站標題</td><td width="7%">顯示</td><td width="7%">刪除</td><td></td>
        </tr>
<?php
do{
$rr ="";
if($row["t_look"] == 2){ $rr ="checked='checked'"; }
?>
    	<tr>
        	<td align="center"><img src="t6/<?=$row["t_pic"]?>" width="100" height="68"><input name="t_seq[]" value="<?=$row["t_seq"]?>" type="hidden"></td>
            <td align="center"><input name="t_look[]" type="checkbox" value="<?=$row["t_seq"]?>" <?=$rr?> ></td>
            <td align="center"><input name="t_del[]" type="checkbox" value="<?=$row["t_pic"]?>" ></td>
            <td align="center"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t6_3.php?pic=<?=$row["t_pic"]?>&#39;)" value="更新圖片"></td>
        </tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
<?php
if($page_totle > 1){          
?>
        <tr>
            <td align="center" colspan="4"><a href="admin.php?to=t6&page=<?=$p1?>">＜</a>
<?php
    for($i=1;$i<=$page_totle;$i++){
        if( $page_now == $i){echo "<span style='font-size:20px'>".$i."</span>";
        }else{
        echo $i."　";
        }
}
?>
<a href="admin.php?to=t6&page=<?=$p2?>">＞</a>
          </td>
        </tr>
<?php
}        
?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t6_1.php&#39;)" value="新增校園映像圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>