<?php
	/*�������ݿ�*/
 	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
    mysql_select_db("guestinfo",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
    mysql_query("set names gb2312");                                            //ѡ���ַ�����׼��ʽ
	$id=$_GET[id];
	$sql=mysql_query("delete from register where uid=$id");
	if($sql){
	echo "<script>alert('��Ϣɾ���ɹ���');history.back();window.location.href='delete_user.php?id=$id';</script>";
	}
	else{
	echo "<script>alert('��Ϣɾ��ʧ�ܣ�');history.back();window.location.href='delete_user.php?id=$id';</script>";
	}
	?>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
