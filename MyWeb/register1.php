<?php
	ini_set('display_errors', 'Off'); 	
					
	$pic_name=$_POST['pic']['name'];						//��ȡ�ϴ��ļ����ļ���
	$pic_name=strstr($pic_name,".");						//��ȡ�ļ�����
	/* �ж��ϴ����ļ������ǲ��Ƿ�������
	 * ���ɹ������ʾ����ת��ע�����
	 */ 
	if(($pic_name==".bmp")||($pic_name==".jpg")&&($pic_name==".tiff")&&($pic_name==".gif")||($pic_name==".pcx")&&($pic_name!=".tga")&&($pic_name!=".fpx")&&($pic_name==".psd")&&($pic_name==".svg")){ 
	echo "<script> alert('��Ƭ���ϴ���ȷ��ʽ��bmp,jpg,tiff,gif,pcx,tga,fpx,svg,psd��!');window.location.href='register.php';</script>";	
	}
	else{                     //ͼƬ��ʽ��ȷ������ִ��
	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());//�������ݿ�
	mysql_select_db("guestinfo",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
	mysql_query("set names gb2312");											//ѡ���ַ�����׼��ʽ
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
	$phpto=$_POST['pic'];
	
	$sql=mysql_query("insert into register(Username,Password,Age,Sex,photo)values('$user_name','$password','$age','$sex','$phpto')");
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