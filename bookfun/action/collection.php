<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	$bookid =$id;
	$uid=$_SESSION['number'];
	/*链接数据库*/
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	
	mysql_query("set names utf-8");
	/*查找该用户是否已收藏图书*/
	$result=mysql_query("select * from collection where user=$uid and book=$bookid");
	$num = mysql_num_rows($result);
	
	if($num == 0)
	{	
		/*插入收藏*/
		$cmd1 = "insert into collection (uid,bookid)values(".$uid.",".$bookid.")";
		$result1 = mysql_query($cmd1);
		if(!$result1)
		{
			echo "<script language=javascript>alert('收藏失败！');history.back();</script>";
		}
		else
		{
			$sql=mysql_query("select * from books where id = $bookid");
  			$row=mysql_fetch_object($sql); 
  			$num = $row->count;
  			$num += 5;
  			$sql=mysql_query("update books set count = $num where id = $bookid");
  			if(!$sql){
				echo "<script> alert('系统繁忙，请重试!');window.location.href='../view/show.php?id=$id';</script>";
			}
			echo "<script language=javascript>alert('收藏成功！');history.back();</script>";
		}
	}
	else
	{
		echo "<script language=javascript>alert('该书已收藏！');history.back();</script>";
	}
?>
