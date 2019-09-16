<?php
if( isset($_POST["id"])){
    if($_POST["id"]=="admin"){
        if( $_POST["pw"]=="1234"){
            ?><script>document.location.href="/?do=admin&redo=admin"</script><?php
        }
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <label for="id"></label>
    帳號:<input type="text" name="id" id="id" />
  <br>
  <br>
    <label for="pw"></label>
    密碼:<input type="password" name="pw" id="pw" />
  <br>
  <br>
    <input type="submit"  value="送出" />
  <br>
</form>
</body>
</html>