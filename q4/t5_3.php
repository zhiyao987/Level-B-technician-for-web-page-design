<?php
$sql = "delete from t5_2 where t_seq = '".$_GET["no"]."'";
mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=th";
</script>