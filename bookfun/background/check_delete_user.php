<?php
	/*链接数据库*/
 	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names gb2312");                                            //选择字符集标准格式
	$id=$_GET[id];
	$sql=mysql_query("delete from register where uid=$id");
	if($sql){
	echo "<script>alert('信息删除成功！');history.back();window.location.href='delete_user.php?id=$id';</script>";
	}
	else{
	echo "<script>alert('信息删除失败！');history.back();window.location.href='delete_user.php?id=$id';</script>";
	}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
