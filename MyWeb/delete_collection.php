<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$bookid = $id;
$uid = $_SESSION['number'];
$link1 = mysql_connect("localhost","root","676792")or die("���ݿ���������Ӵ���".mysql_error());
mysql_select_db("test",$link1) or die("���ݿ���ʴ���".mysql_error());  	
mysql_query("set names utf8");
$result = mysql_query("delete from collection where uid=$uid and id=$bookid");
$num = mysql_affected_rows();
if($num == 0)
{
	echo "<script language=javascript>alert('���黹δ�ղأ�');history.back();</script>";
}
else
{
	echo "<script language=javascript>alert('ɾ���ղسɹ���');history.back();</script>";
}
?>