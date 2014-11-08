<?php
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	session_destroy();
	echo '<script>alert(\'用户已安全退出!\');location=(\'main.php\');</script>';
	
?>