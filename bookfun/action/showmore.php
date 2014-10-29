<?php
    header("Content-Type: text/html; charset=utf-8");
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	
	mysql_query("set names utf-8");
	$id=$_GET['bookid'];
	$cnt=$_GET['cnt'];
    $cnt=1;
    $id=1;
	$qua="select * from comment where book_id=$id order by book_id desc limit $cnt,5";
	$sql=mysql_query($qua);
	$i=0;
	$row=mysql_fetch_object($sql);
	do{
		$uid=$row->user;
		$sql1=mysql_query("select * from register where uid=$uid");
		$row1=mysql_fetch_object($sql1);
		$array[$i]=array("$row->content","$row1->nickname","$row1->Photo");

		$i++;
	}while($row=mysql_fetch_object($sql));
    for($o=0;$o<$i;$o++){
        $arr[$o]=array(
        "nickname"=>$array[$o][1],
        "image_url"=>$array[$o][2],
        "comment" =>$array[$o][0],
        );
    }

     print_r(json_encode($arr));
     exit;
?>