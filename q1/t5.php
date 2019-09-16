<?php
//=====================================新增=====================================
    if( !empty($_FILES["t_title"]["name"]) ){
        $new_name = date("His").$_FILES["t_title"]["name"];
        $sql = "insert into t5 ( t_pic , t_look ) value('".$new_name."',1)";
        mysqli_query($link,$sql);
        copy($_FILES["t_title"]["tmp_name"],"t5/".$new_name);
    }
//=====================================新增=====================================
//=====================================修改=====================================
    if( !empty($_POST["n_u"]) ){
        $sql = "update t5 set t_look = '1'";
        mysqli_query($link,$sql);
       
        for($i=0;$i<count($_POST["t_look"]);$i++){
            $sql = "update t5 set t_look = '2' where t_seq = '". $_POST["t_look"][$i]."'";
            mysqli_query($link,$sql);
        }
//------------------------------------刪除------------------------------------
        if( !empty($_POST["t_del"][0]) ){
            for($i=0;$i<count($_POST["t_del"]);$i++){
                $sql = "delete from t5 where t_pic = '". $_POST["t_del"][$i]."'";
                mysqli_query($link,$sql);
                unlink("t5/".$_POST["t_del"][$i]);
            }
        }
//------------------------------------刪除------------------------------------        
    }
//=====================================修改=====================================
//=====================================改圖=====================================
    if( !empty($_FILES["t_pic"]["name"]) ){
        $new_name = date("His").$_FILES["t_pic"]["name"];
        $sql = "update t5 set t_pic = '".$new_name."' where t_pic = '".$_POST["t_pic_2"]."'";
        mysqli_query($link,$sql);
        unlink("t5/".$_POST["t_pic_2"]);
        copy($_FILES["t_pic"]["tmp_name"],"t5/".$new_name);
    }
//=====================================改圖=====================================

    $sql="select * from t5";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">網站標題管理</p>
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
        	<td align="center"><embed src="t5/<?=$row["t_pic"]?>"><input name="t_seq[]" value="<?=$row["t_seq"]?>" type="hidden"></td>
            <td align="center"><input name="t_look[]" type="checkbox" value="<?=$row["t_seq"]?>" <?=$rr?> ></td>
            <td align="center"><input name="t_del[]" type="checkbox" value="<?=$row["t_pic"]?>" ></td>
            <td align="center"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t5_3.php?pic=<?=$row["t_pic"]?>&#39;)" value="更新圖片"></td>
        </tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t5_1.php&#39;)" value="新增動畫圖片"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>