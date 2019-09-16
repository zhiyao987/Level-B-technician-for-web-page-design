<?php
//=====================================新增=====================================
    if( !empty($_POST["t_cont"]) ){
        $sql = "insert into t13 ( t_cont , t_title , t_pic) value('".$_POST["t_cont"]."','".$_POST["t_title"]."','".$_GET["nowseq"]."')";
        mysqli_query($link,$sql);
    }
//=====================================新增=====================================
//=====================================修改=====================================
    if( !empty($_POST["n_u"]) ){
        $sql = "update t13 set t_look = '1'";
        mysqli_query($link,$sql);
//------------------------------------內容修改------------------------------------       
        for($i=0;$i<count($_POST["t_cont1"]);$i++){
            $sql = "update t13 set t_title = '".$_POST["t_cont1"][$i]."' where t_seq = '". $_POST["t_seq"][$i]."'";
            mysqli_query($link,$sql);
        }
        for($i=0;$i<count($_POST["t_cont1"]);$i++){
            $sql = "update t13 set t_cont = '".$_POST["t_cont13"][$i]."' where t_seq = '". $_POST["t_seq"][$i]."'";
            mysqli_query($link,$sql);
        }
//------------------------------------內容修改------------------------------------
//------------------------------------刪除------------------------------------
        if( !empty($_POST["t_del"][0]) ){
            for($i=0;$i<count($_POST["t_del"]);$i++){
                $sql = "delete from t13 where t_seq = '". $_POST["t_del"][$i]."'";
                mysqli_query($link,$sql);
            }
        }
//------------------------------------刪除------------------------------------        
    }
//=====================================修改=====================================
    $sql="select * from t13 where t_pic ='".$_GET["nowseq"]."'";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">次選單管理</p>
        <form method="post">
<input type="hidden" name="n_u" value="1">
    <table width="100%">
    	<tr class="yel">
        	<td width="40%">次選單</td>
            <td width="40%">次選單連結網址</td>
            <td width="10%">刪除</td>
        </tr>
<?php
do{
$rr ="";
if($row["t_look"] == 2){ $rr ="checked='checked'"; }
?>
    	<tr>
            <td align="left"><input name="t_cont1[]" value="<?=$row["t_title"]?>" style="width:90%"><input name="t_seq[]" value="<?=$row["t_seq"]?>" type="hidden"></td>
            <td align="left"><input name="t_cont13[]" value="<?=$row["t_cont"]?>" style="width:90%" ></td>
            <td align="center"><input name="t_del[]" type="checkbox" value="<?=$row["t_seq"]?>" ></td>
            
        </tr>
<?php }while($row=mysqli_fetch_assoc($ro));?>
    </table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;t13_1.php&#39;)" value="新增次選單"></td><td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>