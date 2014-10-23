<?php
	if($_POST["Submit"]=="提交"){
	$link1=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());  	//选择数据库
	mysql_query("set names gb2312");												//选择字符集标准格式
	$author=$_POST["author"];
	$press=$_POST["press"];
	$content=$_POST["content"];
	
	$image=$_POST["image"];
	$im_name=$_POST['image']['name'];						//读取上传文件的文件名
	$pic_name=strstr($im_name,".");						//截取文件类型
	/* 判断上传的文件类型是不是符合条件
	 * 不成功输出提示并跳转回注册界面
	 */ 
	if(($pic_name==".bmp")||($pic_name==".jpg")&&($pic_name==".tiff")&&($pic_name==".gif")||($pic_name==".pcx")&&($pic_name!=".tga")&&($pic_name!=".fpx")&&($pic_name==".psd")&&($pic_name==".svg")){ 
	echo "<script> alert('照片请上传正确格式（bmp,jpg,tiff,gif,pcx,tga,fpx,svg,psd）!');window.location.href='Setbook.php';</script>";	
	}
	if(strlen($content)>200){
	$content=chinesesubstr($conetent,0,40)."....";	
	}
	$sql=mysql_query("insert into books(author,press,content,image)values('$author','$press','$content','$image')");
	}
?>
<?php
 function chinesesubstr($str,$start,$len) { 
    $strlen=$start+$len; 
    for($i=0;$i<$strlen;$i++) { 
        if(ord(substr($str,$i,1))>0xa0) { 
            $tmpstr.=substr($str,$i,2); 
            $i++; 
         } 
		else 
            $tmpstr.=substr($str,$i,1); 
    } 
    return $tmpstr; 
}
?>