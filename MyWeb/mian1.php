<?php	
	session_start();						//����session
	if($_POST["Submit"]!=""){				//���ύ
	$checks=$_POST["checks"];				
	if($checks==""){
	//��֤��Ϊ�գ�����
	echo "<script> alert('��������֤��!');window.location.href='main.php';</script>";
}
	else{	
	if($checks==$_SESSION[check_checks]){     //�����֤���Ƿ���ȷ
	//�������ݿ�
	$link1=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	//ѡ�����ݿ�
	mysql_query("set names gb2312");												//ѡ���ַ�����׼��ʽ
	
	$user=$_POST['txt_user'];
	$password=$_POST['txt_pwd'];
	$row=mysql_query("select *from houtai where admin='$user'");		//���û���������
	$info=mysql_fetch_object($row);
	if(!$info){
		echo "<script> alert('�û���������!');window.location.href='main.php';</script>";
	}
	else {				//�û������ڣ���������Ƿ���ȷ
		if($password!=$info->ad_password){			//���������ת�ص�½ҳ
	echo "<script> alert('����������벻��ȷ!');window.location.href='main.php';</script>";
	}
	else {										//������ȷ��ת����ҳ
		$_SESSION['member']=$info->Username;	//�û�������session
		
		echo "<script> alert('��¼�ɹ��������ת����ҳ��!');window.location.href='index2.php';</script>";
	}
	
	}
	}
	else {
	echo "<script> alert('���������֤�벻��ȷ!');window.location.href='main.php';</script>";
	}
	}
	}
?>