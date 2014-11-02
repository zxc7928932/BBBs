<?php
	header("Content-Type: text/html; charset=gb2312");
	session_start();
	$user_name=$_POST['username'];
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names gb2312");                                            //选择字符集标准格式
	$row=mysql_query("select *from register where Username='$user_name'");		//此用户名的数据
	$num=mysql_num_rows($row);													//此用户名数据行数	
	if($num){		//如果已有，说明已注册，跳转回注册页面
	echo "<script> alert('用户名已存在!');window.location.href='../index.php';</script>";	
	}
	else{			//未注册
	$pass_word=$_POST['password1'];
	/********************给密码加密*******************/
	$hash = 2;
	$password = '111';
	$salt = '1234';
	$key = mhash_keygen_s2k(1,$password,$salt,10);
	$password = bin2hex(mhash($hash,$pass_word,$key));
	/*********************给密码加密******************/	
	$sql=mysql_query("insert into register(Username,Password)values('$user_name','$password')");
	//插入数据
	if (!$sql){		//插入失败，跳转回注册页面
     echo "<script> alert('系统繁忙，请重试!');window.location.href='../index.php';</script>";
}
	else{			//注册成功，转到主页面
	$row=mysql_query("select * from register where Username='$user_name'");
	$info=mysql_fetch_object($row);
	$_SESSION['number']=$info->uid;
	mysql_close($link);			//关闭
    echo "<script> window.location.href='../view/home.php';</script>";
}
	}

?>