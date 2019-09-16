<?php
    if( !empty($_POST["t_title"]) ){
        $sql = "update t8 set t_title='".$_POST["t_title"]."'";
        mysqli_query($link,$sql);
    }
    $sql="select * from t8";
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);
?>
                                <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
                                    <p class="t cent botli">頁尾版權資料管理</p>
        <form method="post">
    <table width="100%">
    	<tbody><tr>
        	<td width="45%" align="right">頁尾版權資料:</td><td><input name="t_title" value="<?=$row["t_title"]?>"></td>
                    </tr>
    </tbody></table>
           <table style="margin-top:40px; width:100%;">
     <tbody><tr>
      <td class="cent" align="center"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table>    

        </form>
                                    </div>