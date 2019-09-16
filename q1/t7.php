<?php
    if( !empty($_POST["t_look"]) ){
        $sql = "update t7 set t_look='".$_POST["t_look"]."'";
        mysqli_query($link,$sql);
        ?><script>document.location.href='admin.php?to=t7'</script><?php
    }
    $sql="select * from t7";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">進站總人數管理</p>
        <form method="post">
    <table width="100%">
    	<tbody><tr>
        	<td width="45%" align="right">進站總人數:</td><td><input name="t_look" value="<?=$row["t_look"]?>"></td>
                    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:100%;">
     <tbody><tr>
      <td class="cent" align="center"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>