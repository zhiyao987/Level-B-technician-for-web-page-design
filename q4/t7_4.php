<?php
    $sql="update buycar set b_bill = 2 where b_seq ='".$_GET["no"]."'";
    mysqli_query($link,$sql);
    echo "<script>document.location.href='?do=buycart'</script>";
    exit();
 
?>