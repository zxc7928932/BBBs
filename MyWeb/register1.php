<?php
	$filename = $_POST['filename'];
	echo $_FILES["filename"]["name"];
	$path="uploadfile/";
	
	if(!file_exists($path)) 
	{ 
		mkdir("$path", 0700); 
	}
	/* 判断上传的文件类型是不是符合条件
	 * 不成功输出提示并跳转回注册界面
	 */ 
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 
	if(!in_array($_FILES["filename"]["type"],$tp)) //判断图片类型是否正确
	{ 
		echo "格式不正确";
		 "<script> alert('照片请上传正确格式!');window.location.href='register.php';</script>";
		
	}
	else{                     //图片格式正确，继续执行
	
	if($_FILES["filename"]["name"]) 
	{ 
		$file1=$_FILES["filename"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 
	if($flag) 
	{
		$result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2); //服务器端图片移动
	}
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
	mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
	mysql_query("set names gb2312");											//选择字符集标准格式
	$avatar = $file2;
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
	
	
	$sql=mysql_query("insert into register(Username,Password,Age,Sex,Photo)values('$user_name','$password','$age','$sex','$avatar')");
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