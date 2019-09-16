<?php
$sql = "update t5_2 set t_name = '".$_GET["con"]."' where t_seq = '".$_GET["no"]."'";
mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=th";
</script>