<?php
	session_start();
	$bookid =$id;
	$uid=$_SESSION['number'];
	/*�������ݿ�*/
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	
	mysql_query("set names gb2312");
	/*���Ҹ��û��Ƿ����ղ�ͼ��*/
	$result=mysql_query("select * from collection where uid=$uid and id=$bookid");
	$num = mysql_num_rows($result);
	
	if($num == 0)
	{	
		/*�����ղ�*/
		$cmd1 = "insert into collection (uid,bookid)values(".$uid.",".$bookid.")";
		$result1 = mysql_query($cmd1);
		if(!$result1)
		{
			echo "<script language=javascript>alert('�ղ�ʧ�ܣ�');history.back();</script>";
		}
		else
		{
			echo "<script language=javascript>alert('�ղسɹ���');history.back();</script>";
		}
	}
	else
	{
		echo "<script language=javascript>alert('�������ղأ�');history.back();</script>";
	}
?>
