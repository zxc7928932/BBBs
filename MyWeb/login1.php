<?php	
	session_start();						//����session
	if($_POST["Submit"]!=""){				//���ύ
	$checks=$_POST["checks"];				
	if($checks==""){
	//��֤��Ϊ�գ�����
	echo "<script> alert('��������֤��!');window.location.href='login.php';</script>";
}
	else{	
	if($checks==$_SESSION[check_checks]){     //�����֤���Ƿ���ȷ
	//�������ݿ�
	$link1=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	//ѡ�����ݿ�
	mysql_query("set names gb2312");												//ѡ���ַ�����׼��ʽ
	$txt_user_test=$_POST['txt_user'];												
	$txt_pwd_test=$_POST['txt_pwd'];
	/*���������*/
	$hash = 2;											//����hashֵ							
	$password = '111';									
	$salt = '1234';
	$key = mhash_keygen_s2k(1,$password,$salt,10);		//����keyֵ
	$password = bin2hex(mhash($hash,$txt_pwd_test,$key));//����
	/*���������*/
	$row1=mysql_query("select * from register where Username='$txt_user_test'");//��ȡ�û���Ϊ�����û���������
	$info1=mysql_num_rows($row1);												//��ȡ��������
	$info=mysql_fetch_object($row1);											//ѡ���ȡ���Ķ���
	if(!$info1){		//���û�в鵽���ݣ���ת�ص�¼ҳ	
		echo "<script> alert('�û���������!');window.location.href='login.php';</script>";
	}
	else {				//�û������ڣ���������Ƿ���ȷ
		if($password!=$info->Password){			//���������ת�ص�½ҳ
	echo "<script> alert('����������벻��ȷ!');window.location.href='login.php';</script>";
	}
	else {										//������ȷ��ת����ҳ
		$_SESSION['number']=$info->uid;	//�û���Ŵ���session
		
		echo "<script> alert('��¼�ɹ��������ת��ҳ!');window.location.href='main.php';</script>";
	}
}
		}
	else {
	echo "<script> alert('���������֤�벻��ȷ!');window.location.href='login.php';</script>";
	}
	}	
}
	
?>