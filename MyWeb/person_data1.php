<?php 
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$filename = $_POST['filename'];
	$nickname = $_POST['nickname'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$signature = $_POST['signature'];
	$curuser = $_SESSION['number'];
	$path="uploadfile/";

	if(!file_exists($path)) 
	{ 
		mkdir("$path", 0700); 
	}

	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 

	if(!in_array($_FILES["filename"]["type"],$tp)) //�ж�ͼƬ�����Ƿ���ȷ
	{ 
		echo "<script> alert('ͼƬ��ʽ����');window.location.href='center.php';</script>";
	}
	if($_FILES["filename"]["name"]) 
	{ 
		$file1=$_FILES["filename"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 
	if($flag) 
	{
		$result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2); //��������ͼƬ�ƶ�
	}

	$link1 = mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	
	mysql_query("set names gb2312");							
	$avatar = $file2;											
	
	//���¸���������Ϣ
	$cmd = "update register set Username ='".$nickname."',Age='".$age."',Sex='".$sex."',Photo='".$avatar."',singing='".$signature."' ";
	$cmd .= "where uid='".$curuser."'";
	$result = mysql_query($cmd);
	
	if(!result)
	{
		echo "<script> alert('�޸ĸ�����Ϣʧ��');window.location.href='center.php';</script>";
	}
	else 
	{
		echo "<script> alert('�޸ĸ�����Ϣ�ɹ�');window.location.href='center.php';</script>";
	}
?>