<?php 
	session_start();
	$user= $_SESSION['number'];
	$id=$_SESSION['boo_id'];
	$user=2;
	header("Content-Type: text/html; charset=utf-8");
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	
	mysql_query("set names utf-8");
	$comment=$_POST['comment'];

	$sql=mysql_query("insert into comment(content,book_id,user)values('$comment','$id','$user')");
	if(!$sql){
		echo "<script> alert('系统繁忙，请重试!');window.location.href='../view/show.php?id=$id';</script>";
	}
	else{
		$sql=mysql_query("select * from books where id = $id");
  		$row=mysql_fetch_object($sql); 
  		$num = $row->count;
  		$num ++;
  		$sql=mysql_query("update books set count = $num where id = $id");
  		if(!$sql){
			echo "<script> alert('系统繁忙，请重试!');window.location.href='../view/show.php?id=$id';</script>";
		}
		echo "<script> alert('评论成功!');history.back();</script>";
	}
	unset ($_SESSION['boo_id']) ;
?>