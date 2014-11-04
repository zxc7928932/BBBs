<?php
	
	session_start();					  //开启session
	header("content-type:image/png");  	  //定义输出为图像类型
	$image_width=70;                      //定义图像宽度
	$image_height=18;                     //定义长度
	srand(microtime()*100000);         	  //选取随机种子
	for($i=0;$i<4;$i++){                  //循环生成一个四位随机数
    $new_number.=dechex(rand(0,15));
}
	$_SESSION[check_checks]=$new_number;   //将随机数写入session

	$num_image=imagecreate($image_width,$image_height);  //创建画布
	imagecolorallocate($num_image,255,255,255);     	 //设置画布颜色
	for($i=0;$i<strlen($_SESSION[check_checks]);$i++){  //循环读取SESSION变量中的验证码
    $font=mt_rand(3,5);                            	//设置随机的字体
    $x=mt_rand(1,8)+$image_width*$i/4;               //设置随机字符所在位置的X坐标
    $y=mt_rand(1,$image_height/4);                   //设置随机字符所在位置的Y坐标
    $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));  	 //设置字符的颜色
    imagestring($num_image,$font,$x,$y,$_SESSION[check_checks][$i],$color);				     //水平输出字符
}
	imagepng($num_image);      			//生成PNG格式的图像
	imagedestroy($num_image);  			//释放图像资源
?>