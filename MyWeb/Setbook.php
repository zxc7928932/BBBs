<?php
	if($_POST["Submit"]=="�ύ"){
	$link1=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	//ѡ�����ݿ�
	mysql_query("set names gb2312");												//ѡ���ַ�����׼��ʽ
	$author=$_POST["author"];
	$press=$_POST["press"];
	$content=$_POST["content"];
	
	$image=$_POST["image"];
	$im_name=$_POST['image']['name'];						//��ȡ�ϴ��ļ����ļ���
	$pic_name=strstr($im_name,".");						//��ȡ�ļ�����
	/* �ж��ϴ����ļ������ǲ��Ƿ�������
	 * ���ɹ������ʾ����ת��ע�����
	 */ 
	if(($pic_name==".bmp")||($pic_name==".jpg")&&($pic_name==".tiff")&&($pic_name==".gif")||($pic_name==".pcx")&&($pic_name!=".tga")&&($pic_name!=".fpx")&&($pic_name==".psd")&&($pic_name==".svg")){ 
	echo "<script> alert('��Ƭ���ϴ���ȷ��ʽ��bmp,jpg,tiff,gif,pcx,tga,fpx,svg,psd��!');window.location.href='Setbook.php';</script>";	
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