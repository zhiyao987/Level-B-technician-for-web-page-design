<?php
if( !empty($_POST["t_id"]) ){
    $sql = "select * from t9 where t_id = '".$_POST["t_id"]."'";
    $ro=mysqli_query($link,$sql);
    $total = mysqli_num_rows($ro);
    if( $total ==0 ){ 
        $sql = "insert into t9 ( t_name , t_id , t_pw , t_mail , t_tel , t_con ) value('".$_POST["t_name"]."','".$_POST["t_id"]."','".$_POST["t_pw"]."','".$_POST["t_mail"]."','".$_POST["t_tel"]."','".$_POST["t_con"]."')";
        mysqli_query($link,$sql);
        $_SESSION["account"] = $_POST["t_id"];
        echo "<script>document.location.href='?do=login'</script>";
    }
}

?>
<form method="post">
<table width="45%" border="0" align="center" cellpadding="5" cellspacing="2">
    <tr>
        <td colspan="2" align="center">註冊會員</td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">帳號</td>
        <td align="left"><input name="t_id" id="t_id"><input type="button" onclick="check_id()" value="檢測帳號"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">密碼</td>
        <td align="left"><input name="t_pw"></td>
    </tr>
    <tr>
        <td width="30%" align="center" bgcolor="#FF33f0">姓名</td>
        <td align="left"><input name="t_name"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">信箱</td>
        <td align="left"><input name="t_mail"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">電話</td>
        <td align="left"><input name="t_tel"></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FF33F0">地址</td>
        <td align="left"><input name="t_con"></td>
    </tr>
    <tr>
        <td align="center" colspan="2"><input type="submit" value="送出"></td>
    </tr>
</table>
</form>
<script src="js/jquery-1.9.1.min.js"></script>
<script>
function check_id(){
    x = document.getElementById("t_id").value;
    if(x == "admin"){ alert("不得使用admin");}
    $.post("t7_7.php",{x},function(o){ alert(o);});
}
</script>