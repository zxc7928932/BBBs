<?php
	/*链接数据库*/
	header("Content-Type:text/html; charset=utf-8");
 	$link=mysql_connect("localhost","root","676792")or die("数据库服务器连接错误".mysql_error());
    mysql_select_db("test",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names utf8");     
    $id = $_GET['id'];                                       //选择字符集标准格式
    $sql1=mysql_query("select * from user where uid=$id");
    $row1=mysql_fetch_object($sql1);
     $filename=$row1->photo;
    $filename = "../bookfun/Public/Uploads/".$filename;
    if (file_exists($filename)) {
    if($filename!="deault.jpg") 
    unlink($filename);
    } 
	$sql=mysql_query("delete from user where uid=$id");//删除信息
	if($sql){	//删除成功跳转
	echo "<script>alert('信息删除成功！');history.back();window.location.href=document.referrer;</script>";
	}
	else{		//删除失败跳转
	echo "<script>alert('信息删除失败！');history.back();window.location.href=document.referrer;</script>";
	}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
