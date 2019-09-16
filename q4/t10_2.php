<?php
    $error = 0;
    if( $_GET["tid"]=="admin" and $_GET["tpw"]=="1234" ){
        $_SESSION["lv1"] = 1;
        $_SESSION["lv2"] = 1;
        $_SESSION["lv3"] = 1;
        $_SESSION["lv4"] = 1;
        $_SESSION["lv5"] = 1;
        $_SESSION["id"] = "admin";
        $error = 1;    
    }else{
        $sql="select * from t10 where t_id='".$_GET["tid"]."' and t_pw='".$_GET["tpw"]."' ";
        $ro=mysqli_query($link,$sql);
        $row=mysqli_fetch_assoc($ro);
        $total = mysqli_num_rows($ro);
        if($total == 1) {
            $_SESSION["lv1"] = $row["t_lv1"];
            $_SESSION["lv2"] = $row["t_lv2"];
            $_SESSION["lv3"] = $row["t_lv3"];
            $_SESSION["lv4"] = $row["t_lv4"];
            $_SESSION["lv5"] = $row["t_lv5"];
            $_SESSION["id"] = $_GET["tid"];
            $error = 1;        
        }
    }
    if($error == 0){ echo "<script>document.location.href='index.php?do=admin'</script>";exit();}
    else{ echo "<script>document.location.href='admin.php'</script>";exit(); }
?>