<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$bookid = $id;
$uid = $_SESSION['number'];
$link1 = mysql_connect("localhost","root","676792")or die("数据库服务器连接错误".mysql_error());
mysql_select_db("test",$link1) or die("数据库访问错误".mysql_error());  	
mysql_query("set names utf8");
$result = mysql_query("delete from collection where uid=$uid and id=$bookid");
$num = mysql_affected_rows();
if($num == 0)
{
	echo "<script language=javascript>alert('该书还未收藏！');history.back();</script>";
}
else
{
	$sql=mysql_query("select * from books where id = $bookid");
  	$row=mysql_fetch_object($sql); 
  	$num = $row->count;
  	$num -= 5;
  	$sql=mysql_query("update books set count = $num where id = $bookid");
  	if(!$sql){
		echo "<script> alert('系统繁忙，请重试!');window.location.href='../view/show.php?id=$id';</script>";
	}
	echo "<script language=javascript>alert('删除收藏成功！');history.back();</script>";
}
?>