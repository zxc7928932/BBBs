<?php

	session_start();						//开启session
	if($_POST["submit"]!=""){				//已提交
	$checks=$_POST["checks"];				
	if($checks==""){
	//验证码为空，回跳
	echo "<script> alert('请输入验证码!');window.location.href='main.php';</script>";
}
	else{	
	if($checks==$_SESSION[check_checks]){     //检测验证码是否正确
	//链接数据库
	$link=mysql_connect("localhost","syslab","syslab")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("test",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names utf8");                                            //选择字符集标准格式
	$user=$_POST['txt_user'];
	$password=$_POST['txt_pwd'];
	$row=mysql_query("select * from houtai where Username='$user'");		//此用户名的数据
	$info=mysql_fetch_object($row);
	if(!$info){
		echo "<script> alert('用户名不存在!');window.location.href='main.php';</script>";
	}
	else {				//用户名存在，检测密码是否正确
		if($password!=$info->ad_password){			//密码错误，跳转回登陆页
	echo "<script> alert('您输入的密码不正确!');window.location.href='main.php';</script>";
	}
	else {										//密码正确，转至主页
		$_SESSION['member']=$info->Username;	//用户名存入session
		
		echo "<script> window.location.href='index2.php';</script>";
	}
	
	}
	}
	else {
	echo "<script> alert('您输入的验证码不正确!');window.location.href='main.php';</script>";
	}
	}
	}
else{
echo "<script> alert('您输入的验证码为空!');window.location.href='main.php';</script>";
}
?>