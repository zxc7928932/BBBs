<?php	
	session_start();						//开启session
	if($_POST["Submit"]!=""){				//已提交
	$checks=$_POST["checks"];				
	if($checks==""){
	//验证码为空，回跳
	echo "<script> alert('请输入验证码!');window.location.href='login.php';</script>";
}
	else{	
	if($checks==$_SESSION[check_checks]){     //检测验证码是否正确
	//链接数据库
	$link1=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	//选择数据库
	mysql_query("set names gb2312");												//选择字符集标准格式
	$txt_user_test=$_POST['txt_user'];												
	$txt_pwd_test=$_POST['txt_pwd'];
	/*给密码加密*/
	$hash = 2;											//设置hash值							
	$password = '111';									
	$salt = '1234';
	$key = mhash_keygen_s2k(1,$password,$salt,10);		//生成key值
	$password = bin2hex(mhash($hash,$txt_pwd_test,$key));//加密
	/*给密码加密*/
	$row1=mysql_query("select * from register where Username='$txt_user_test'");//读取用户名为输入用户名的行数
	$info1=mysql_num_rows($row1);												//读取到的行数
	$info=mysql_fetch_object($row1);											//选择读取到的对象
	if(!$info1){		//如果没有查到数据，跳转回登录页	
		echo "<script> alert('用户名不存在!');window.location.href='login.php';</script>";
	}
	else {				//用户名存在，检测密码是否正确
		if($password!=$info->Password){			//密码错误，跳转回登陆页
	echo "<script> alert('您输入的密码不正确!');window.location.href='login.php';</script>";
	}
	else {										//密码正确，转至主页
		echo "<script> alert('登录成功，点击跳转主页!');window.location.href='main.php';</script>";
	}
}
		}
	else {
	echo "<script> alert('您输入的验证码不正确!');window.location.href='login.php';</script>";
	}
	}	
}
	
?>