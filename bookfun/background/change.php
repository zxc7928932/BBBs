<?php 
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	if($_SESSION['member']==""){
	echo "<script>alert('请先登录！');history.back();window.location.href=main.php;</script>";
}
	$filename1 = $_POST['filename1'];
	$filename2 = $_POST['filename2'];
	$filename3 = $_POST['filename3'];
	$path="../Uploads/";//设置轮播器路径
	if($_FILES["filename1"]["name"]!=""){			//如果文件名不为空则图片一需要修改
	$name1=$_FILES["filename1"]["name"];
	$end1=strstr($name1,'.');						//截取后缀名
	
	$_FILES["filename1"]["name"]="main1.jpg";		//上传图片重命名
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 

	if(!in_array($_FILES["filename1"]["type"],$tp)) 	//如果格式不正确 跳转
	{ 
		echo "<script> alert('图片1请上传正确格式');window.location.href='index2.php';</script>";
}
	
	if($_FILES["filename1"]["name"]) 
	{ 
		$file1=$_FILES["filename1"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 

	$uploadedfile = $_FILES['filename1']['tmp_name'];
	if($end1==".jpg"||$end1==".jpeg"){		//判断格式建图
	$src = imagecreatefromjpeg($uploadedfile);
}else if($end1==".gif"){
	$src = imagecreatefromgif($uploadedfile);
}else{
	$src = imagecreatefrompng($uploadedfile);
}
	list($width,$height)=getimagesize($uploadedfile);
	$newwidth=750;
	$newheight=308;
	$tmp=imagecreatetruecolor($newwidth,$newheight);//建缓存图片

	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
	$filename = $file2;
	if($end1==".jpg"||$end1==".jpeg"){		//生成图片
	imagejpeg($tmp,$filename,100);
}else if($end1==".gif"){
	imagegif($tmp,$filename,100);
}else{
	imagepng($tmp,$filename,9);
}
	imagedestroy($src);
	imagedestroy($tmp); 
}

if($_FILES["filename2"]["name"]!=""){			//如果文件名不为空则图片二需要修改
	$name1=$_FILES["filename2"]["name"];
	$end1=strstr($name1,'.');					//截取后缀名

	$_FILES["filename2"]["name"]="main2.jpg";	//上传图片重命名
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); 

	if(!in_array($_FILES["filename2"]["type"],$tp)) //如果格式不正确 跳转
	{ 
		echo "<script> alert('图片1请上传正确格式');window.location.href='index2.php';</script>";
}
	
	if($_FILES["filename2"]["name"]) 
	{ 
		$file1=$_FILES["filename2"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 
	
	$uploadedfile = $_FILES['filename2']['tmp_name'];
	if(($end1==".jpg")||($end1==".jpeg")){		//判断格式建图
	$src = imagecreatefromjpeg($uploadedfile);
}else if($end1==".gif"){
	$src = imagecreatefromgif($uploadedfile);
}else{
	$src = imagecreatefrompng($uploadedfile);
}
	list($width,$height)=getimagesize($uploadedfile);
	$newwidth=750;
	$newheight=308;
	$tmp=imagecreatetruecolor($newwidth,$newheight);//建缓存图片

	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
	$filename = $file2;
	if($end1==".jpg"||$end1==".jpeg"){ 				//生成图片
	imagejpeg($tmp,$filename,100);
}else if($end1==".gif"){
	imagegif($tmp,$filename,100);
}else{
	imagepng($tmp,$filename,9);
}
	imagedestroy($src);
	imagedestroy($tmp); 
}

if($_FILES["filename3"]["name"]!=""){				//如果文件名不为空则图片三需要修改
	$name1=$_FILES["filename3"]["name"];	
	$end1=strstr($name1,'.');						//截取后缀名
	$_FILES["filename3"]["name"]="main3.jpg";		//上传图片重命名
	$tp = array("image/gif","image/pjpeg","image/jpeg","image/png"); //如果格式不正确 跳转
	{ 
		echo "<script> alert('图片1请上传正确格式');window.location.href='index2.php';</script>";
}
	
	if($_FILES["filename3"]["name"]) 
	{ 
		$file1=$_FILES["filename3"]["name"]; 
		$file2 = $path.$file1; 
		$flag=1; 
	} 

	$uploadedfile = $_FILES['filename3']['tmp_name'];
	if(($end1==".jpg")||($end1==".jpeg")){			//判断格式建图
	$src = imagecreatefromjpeg($uploadedfile);
}else if($end1==".gif"){
	$src = imagecreatefromgif($uploadedfile);
}else{
	$src = imagecreatefrompng($uploadedfile);
}
	list($width,$height)=getimagesize($uploadedfile);
	$newwidth=750;
	$newheight=308;
	$tmp=imagecreatetruecolor($newwidth,$newheight);		//建缓存图片

	imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height); 
	$filename = $file2;
	if($end1==".jpg"||$end1==".jpeg"){				//生成图片
	imagejpeg($tmp,$filename,100);
}else if($end1==".gif"){
	imagegif($tmp,$filename,100);
}else{
	imagepng($tmp,$filename,9);
}
	imagedestroy($src);
	imagedestroy($tmp); 
}
	echo "<script> alert('修改成功！');window.location.href='index2.php';</script>";
 ?>