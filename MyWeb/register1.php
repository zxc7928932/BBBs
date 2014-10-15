<?php
	ini_set('display_errors', 'Off'); 	
					
	$pic_name=$_POST['pic']['name'];						//读取上传文件的文件名
	$pic_name=strstr($pic_name,".");						//截取文件类型
	/* 判断上传的文件类型是不是符合条件
	 * 不成功输出提示并跳转回注册界面
	 */ 
	if(($pic_name==".bmp")||($pic_name==".jpg")&&($pic_name==".tiff")&&($pic_name==".gif")||($pic_name==".pcx")&&($pic_name!=".tga")&&($pic_name!=".fpx")&&($pic_name==".psd")&&($pic_name==".svg")){ 
	echo "<script> alert('照片请上传正确格式（bmp,jpg,tiff,gif,pcx,tga,fpx,svg,psd）!');window.location.href='register.php';</script>";	
	}
	else{                     //图片格式正确，继续执行
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
	mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
	mysql_query("set names gb2312");											//选择字符集标准格式
	$row=mysql_query("select *from register where Username='$user_test'");		//此用户名的数据
	$num=mysql_num_rows($row);													//此用户名数据行数
	if($num){		//如果已有，说明已注册，跳转回注册页面
	echo "<script> alert('用户名已存在!');window.location.href='register.php';</script>";	
	}
	else{			//未注册
	$pass_word=$_POST['password1'];
	/*给密码加密*/
	$hash = 2;
	$password = '111';
	$salt = '1234';
	$key = mhash_keygen_s2k(1,$password,$salt,10);
	$password = bin2hex(mhash($hash,$pass_word,$key));
	/*给密码加密*/
	$user_name=$_POST['username'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	$phpto=$_POST['pic'];
	
	$sql=mysql_query("insert into register(Username,Password,Age,Sex,photo)values('$user_name','$password','$age','$sex','$phpto')");
	//插入数据
	if (!$sql){		//插入失败，跳转回注册页面
     echo "<script> alert('系统繁忙，请重试!');window.location.href='register.php';</script>";
}
	else{			//注册成功，转到主页面
	mysql_close($link);			//关闭
    echo "<script> alert('注册成功!');window.location.href='main.php';</script>";
}
	}
}
?>