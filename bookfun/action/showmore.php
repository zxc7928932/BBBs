<?php
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	
	mysql_query("set names utf-8");
	$id=$_GET['bookid'];
	$cnt=$_GET['cnt'];
	$qua="select * from comment where book_id=$id order by id limit cnt,5";
	$sql=mysql_query($qua);
	$i=0;
	$row=mysql_fetch_object($sql);
	do{
		$uid=$row->user;
		$sql1=mysql_query("select * from register where uid=$uid");
		$row1=mysql_fetch_object($sql1);
		$array[i]=array("$row->content","$row1->nickname","$row1->Photo");

		$i++;
	}while($row=mysql_fetch_object($sql));
     $arr = array( 
     	array(
        "nickname"=>"$array[0][0]",
        "image_url"=>"$array[0][1]",
        "comment": =>"$array[0][2]",
        ),
        array(
        "nickname"=>"$array[1][0]",
        "image_url"=>"$array[1][1]",
        "comment": =>"$array[1][2]",
        ),
        array(
        "nickname"=>"$array[2][0]",
        "image_url"=>"$array[2][1]",
        "comment": =>"$array[2][2]",
        ),
        array(
        "nickname"=>"$array[3][0]",
        "image_url"=>"$array[3][1]",
        "comment": =>"$array[3][2]",
        ),array(
        "nickname"=>"$array[4][0]",
        "image_url"=>"$array[4][1]",
        "comment": =>"$array[4][2]",
        ),
),
     print_r(json_encode($arr));
     exit;
?>