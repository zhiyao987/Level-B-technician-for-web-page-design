<?php
$sql = "update t5_3 set t_look = 1 where t_seq = '".$_GET["no"]."'";
mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=item";
</script>