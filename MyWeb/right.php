



<?php 
	include("function.php");
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names gb2312");                                            //选择字符集标准格式
	$query="select * from books order by id";
	$sql=mysql_query($query);
	$row=mysql_fetch_object($sql); //得到数据库中此成员
	do{
		?>	
		
		
		
	<?php 
	}while($row=mysql_fetch_object($sql));
	?>

	
