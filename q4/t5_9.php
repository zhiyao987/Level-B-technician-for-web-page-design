<?php
$sql = "delete from t5_3 where t_seq = '".$_GET["no"]."'";
mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=item";
</script>