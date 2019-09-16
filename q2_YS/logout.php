<?php
	session_start();
	unset($_SESSION["account"]);
	?><script>document.location.href="index.php"</script><?php
?>