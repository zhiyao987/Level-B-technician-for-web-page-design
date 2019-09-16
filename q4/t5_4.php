<?php
$sql = "update t5 set t_name = '".$_GET["con"]."' where t_seq = '".$_GET["no"]."'";
mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=th";
</script>