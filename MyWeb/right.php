



<?php 
	include("function.php");
	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());//�������ݿ�
    mysql_select_db("guestinfo",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
    mysql_query("set names gb2312");                                            //ѡ���ַ�����׼��ʽ
	$query="select * from books order by id";
	$sql=mysql_query($query);
	$row=mysql_fetch_object($sql); //�õ����ݿ��д˳�Ա
	do{
		?>	
		
		
		
	<?php 
	}while($row=mysql_fetch_object($sql));
	?>

	
