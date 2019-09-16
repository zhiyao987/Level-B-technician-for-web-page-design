<?php
$sql = "select * from buycar where b_id = '".$_SESSION["account"]."' and b_bill=0";
$ro = mysqli_query($link,$sql);
$row= mysqli_fetch_assoc($ro);
$id =date("YmdHis",$nowtime);
$total_bill = 0;
do{
    $bill_sql = "select * from t5_3 where t_seq = '".$row["b_item"]."'";
    $bill_ro = mysqli_query($link,$bill_sql);
    $bill_row= mysqli_fetch_assoc($bill_ro);
    $total_bill += $bill_row["t_money"]*$row["b_cnt"];

    $sql = "insert into by_billing value(null,'".$id."','".$_SESSION["account"]."','".$row["b_item"]."','".$row["b_cnt"]."',0,'".$nt."',0,'0000-00-00 00:00:00');";
    mysqli_query($link,$sql);
}while($row= mysqli_fetch_assoc($ro));

$sql = "update buycar set b_bill = 1 where b_id = '".$_SESSION["account"]."' and b_bill=0";
mysqli_query($link,$sql);
$sql = "update by_billing set b_b_total = '".$total_bill."' where b_b_no = '".$id."' ";
mysqli_query($link,$sql);

?>
<script>
    alert("訂購成功");
    document.location.href='/';
</script>