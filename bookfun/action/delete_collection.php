<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$bookid = $id;
$uid = $_SESSION['number'];
$link1 = mysql_connect("localhost","root","676792")or die("数据库服务器连接错误".mysql_error());
mysql_select_db("test",$link1) or die("数据库访问错误".mysql_error());  	
mysql_query("set names utf8");
$result = mysql_query("delete from collection where user=$uid and book=$bookid");
$num = mysql_affected_rows();
if($num == 0)
{
	echo "<script language=javascript>alert('该书还未收藏！');history.back();</script>";
}
else
{
	echo "<script language=javascript>alert('删除收藏成功！');history.back();</script>";
}
?>