<?php
	$filename = $_POST['filename'];
	echo $_FILES["filename"]["name"];
	$path="uploadfile/";
	
	if(!file_exists($path)) 
	{ 
		mkdir("$path", 0700); 
	}
	/* �ж��ϴ����ļ������ǲ��Ƿ�������
	 * ���ɹ������ʾ����ת��ע�����
	 */ 
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 
	if(!in_array($_FILES["filename"]["type"],$tp)) //�ж�ͼƬ�����Ƿ���ȷ
	{ 
		echo "��ʽ����ȷ";
		 "<script> alert('��Ƭ���ϴ���ȷ��ʽ!');window.location.href='register.php';</script>";
		
	}
	else{                     //ͼƬ��ʽ��ȷ������ִ��
	
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
	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());//�������ݿ�
	mysql_select_db("guestinfo",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
	mysql_query("set names gb2312");											//ѡ���ַ�����׼��ʽ
	$avatar = $file2;
	$row=mysql_query("select *from register where Username='$user_test'");		//���û���������
	$num=mysql_num_rows($row);													//���û�����������
	
	if($num){		//������У�˵����ע�ᣬ��ת��ע��ҳ��
	echo "<script> alert('�û����Ѵ���!');window.location.href='register.php';</script>";	
	}
	else{			//δע��
	$pass_word=$_POST['password1'];
	/*���������*/
	$hash = 2;
	$password = '111';
	$salt = '1234';
	$key = mhash_keygen_s2k(1,$password,$salt,10);
	$password = bin2hex(mhash($hash,$pass_word,$key));
	/*���������*/
	$user_name=$_POST['username'];
	$age=$_POST['age'];
	$sex=$_POST['sex'];
	
	
	$sql=mysql_query("insert into register(Username,Password,Age,Sex,Photo)values('$user_name','$password','$age','$sex','$avatar')");
	//��������
	if (!$sql){		//����ʧ�ܣ���ת��ע��ҳ��
     echo "<script> alert('ϵͳ��æ��������!');window.location.href='register.php';</script>";
}
	else{			//ע��ɹ���ת����ҳ��
	mysql_close($link);			//�ر�
    echo "<script> alert('ע��ɹ�!');window.location.href='main.php';</script>";
}
	}
}
?>