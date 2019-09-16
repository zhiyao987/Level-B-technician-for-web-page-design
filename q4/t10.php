<?php
    $r1=rand(10,99);
    $r2=rand(10,99);
    $r3= $r1+$r2;
?>
    <table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <td width="80" align="center">帳號</td>
            <td align="center"><input type="text" id="t_id" />    </td>
        </tr>
        <tr>
            <td align="center">密碼</td>
            <td align="center"><input type="text" id="t_pw" /></td>
        </tr>
        <tr>
            <td align="center">驗證碼</td>
            <td align="center"> <?=$r1?> + <?=$r2?> = <input type="text" id="t_aa" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="button" value="送出" onclick="sub()" /> <input type="button" value="返回" onclick="document.location.href='/'" /></td>
        </tr>
    </table>
<script>
function sub(){
    if( document.getElementById("t_aa").value == <?=$r3?> ){
        document.location.href="admin.php?do=admin_check&tid="+document.getElementById("t_id").value+"&tpw="+document.getElementById("t_pw").value;
    }else{
        alert("對不起，您輸入的驗證碼有誤請您重新登入");
    }    
}
</script>