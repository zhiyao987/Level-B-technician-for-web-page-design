<fieldset>
	<legend>會員註冊</legend>
<form>
	<p style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</p>
  <table width="100%" border="1" cellspacing="0" cellpadding="5">
	
    <tr>
      <td align="center">Step1:登入帳號</td>
      <td align="center">
      <input type="text" id="id" /></td>
    </tr>
    <tr>
      <td align="center">Step2:登入密碼</td>
      <td align="center">
      <input type="text" id="pw1" /></td>
    </tr>
    <tr>
      <td align="center">Step3:確認密碼</td>
      <td align="center">
      <input type="text" id="pw2" /></td>
    </tr>
    <tr>
      <td align="center">Step4:信箱</td>
      <td align="center">
      <input type="text" id="em" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
		<input type="button" value="註冊" onclick="add_player()"/>
		<input type="reset" value="清除" /></td>
    </tr>
  </table>
</form>
</fieldset>

<script>
function add_player(){
	id = document.getElementById("id").value;
	pw1= document.getElementById("pw1").value;
	pw2= document.getElementById("pw2").value;
	em = document.getElementById("em").value;
	$.get("t10_api.php",{ id, pw1, pw2, em },function(o){
		alert(o);
		document.location.href="/?in=t10";
	});
}
</script>
