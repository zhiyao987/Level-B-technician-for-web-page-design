<?php
if( !empty($_POST["t_buy"]) ){
    if( !empty($_POST["t_item"]) ){
        $_SESSION["t_item"][]=$_POST["t_item"];
        $_SESSION["t_buy"][]=$_POST["t_buy"];
        $_SESSION["t_time"][]=$nt;
        echo "<script>document.location.href='?do=login'</script>";
        exit();
    }
}

if( !empty($_GET["tid"]) ){
    if( !empty($_GET["tpw"]) ){
        $sql = "select * from t9 where t_id = '".$_GET["tid"]."' and t_pw = '".$_GET["tpw"]."' ";
        $ro =mysqli_query($link,$sql);
        $row= mysqli_num_rows($ro);
        if($row == 1){
            $_SESSION["account"]=$_GET["tid"];
            if( !empty($_SESSION["t_item"][0]) ){
                for( $i=0;$i<count($_SESSION["t_item"]);$i++ ){
                    $sql = "insert into buycar value(null,'".$_SESSION["t_item"][$i]."','".$_SESSION["t_buy"][$i]."','".$_GET["tid"]."','".$_SESSION["t_time"][$i]."',0);";
                    mysqli_query($link,$sql);
                }
                unset($_SESSION["t_item"]);
                unset($_SESSION["t_buy"]);
                unset($_SESSION["t_time"]);
            }
        }
    }
}

if( !empty($_SESSION["account"]) ){
    echo "<script>document.location.href='?do=buycart'</script>";
    exit();    
}
    $r1=rand(10,99);
    $r2=rand(10,99);
    $r3= $r1+$r2;
?>
　第一次購物<br>
　<a href="?do=login_add"><img src="img/0413.jpg"></a>
<br>
<br>
　登入
    <table width="80%" border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <td width="80" align="center">帳號</td>
            <td align="left"><input type="text" id="t_id" />    </td>
        </tr>
        <tr>
            <td align="center">密碼</td>
            <td align="left"><input type="text" id="t_pw" /></td>
        </tr>
        <tr>
            <td align="center">驗證碼</td>
            <td align="left"> <?=$r1?> + <?=$r2?> = <input type="text" id="t_aa" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="button" value="送出" onclick="sub()" /></td>
        </tr>
    </table>


<script>
function sub(){
    if( document.getElementById("t_aa").value == <?=$r3?> ){
        document.location.href="?do=login&tid="+document.getElementById("t_id").value+"&tpw="+document.getElementById("t_pw").value;
    }else{
        alert("對不起，您輸入的驗證碼有誤請您重新登入");
    }    
}
</script>