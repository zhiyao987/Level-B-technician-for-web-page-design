<?php
	if( !empty($_POST["t_q"]) ){
		for($i=0; $i<count($_POST["t_a"]); $i++){
			$sql="insert into t13 value(NULL, '".$_POST["t_q"]."', '".$_POST["t_a"][$i]."')";
			mysqli_query($link, $sql);
		}
	}
?>
<style>

</style>

<fieldset>
	<legend>新增問卷</legend>
<form method="post">
	<table width="100%">
		<tr>
			<td width="100">問卷名稱</td>
			<td><input name="t_q"></td>
		</tr>
		<tr>
			<td colspan="2" >
				選項<input name="t_a[]">
				<span id ="taa"></span>
				<input type="button" value="更多" onclick="add_ta()">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="新增"><input type="reset" value="清空">
			</td>
		</tr>
	</table>
</form>
	
</fieldset>
<script>
var add_t_a = '<br>選項<input name="t_a[]">';
function add_ta(){
		now_t_a=$("#taa").html(); 
		$("#taa").html(now_t_a + add_t_a);		
}
</script>
