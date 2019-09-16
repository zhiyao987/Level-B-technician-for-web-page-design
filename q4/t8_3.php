<?php
    $sql="delete from by_billing where b_b_no = '".$_GET["no"]."'";
    mysqli_query($link,$sql);
?>
<script>
    document.location.href="admin.php?do=bill";
</script>