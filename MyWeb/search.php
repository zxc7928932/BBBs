<table>
			</table>
<?php
	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());//�������ݿ�
	mysql_select_db("books",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
	mysql_query("set names gb2312");
	if($_POST[Submit]="��ѯ"){
	$book_name=$_POST[txt_book];
	$book_name=trim($book_name);
	$name_arr=explode(" ",$book_name,3);				//���ո������������Ϣ �ɿո���Ϊ���� �ֱ�������
	$cache_count=count($name_arr);						//�������鳤�ȣ����鳤����������Ϣ�ֶ�����
	if($book_name==""){
		header("location:show.html");					//�������Ϊ�� ��ת����ʾ��ҳ
	}
	else{			//����Ϊ��
		if($cache_count==1){			//������鳤��Ϊһ Ѱ���������Ƶ�ֵ
		$sql=mysql_query("select * from books where bookname like '%''.$book_name.''%'");
		}
		else if($cache_count==2){		//Ѱ���������Ա 1,2���Ƶ�ֵ
		$name_arr[0]=trim($name_arr[0]);
		$name_arr[1]=trim($name_arr[1]);
		$sql=mysql_query("select * from books where bookname like '%''.$name_arr[0].''%' or bookname like '%''.$name_arr[1].''%'");
		}
		else{							//Ѱ���������Ա1,2,3���Ƶ�ֵ
		$name_arr[0]=trim($name_arr[0]);
		$name_arr[1]=trim($name_arr[1]);
		$name_arr[2]=trim($name_arr[2]);
		$sql=mysql_query("select * from books where bookname like '%''.$name_arr[0].''%' or bookname like '%''.$name_arr[1].''%' or bookname like '%''.$name_arr[2].''%'");	
		}
		$info=mysql_fetch_array($sql); //�õ����ݿ��д˳�Ա
		$num=myql_num_ros($sql);	   //���ѵ�����
		$page_size=6;				  //����ÿҳ��ʾ��Ϣ��
		if($info==false){			  //δ�ҵ����� 
			echo"����ѯ�����ݲ�����";//��html��
		}
		else{					
		if($page=""){					//���ҳ����δ��ֵ�������ʼֵ1
			$page=1;
		}
			$page_count=ceil($num/$page_size);//����ҳ��
			$offset=($page-1)*$page_size;	  //���㵱ǰҳ��ʼ��ʾ�ĵ�һ����Ϣ�ǵڼ���
			$result=mysql_query("select * from books where bookname like '%''.$book_name.''%' limit $offset,$page_size");//ѡ����ǰҳ��Ҫ��ʾ����Ϣ��
			$row=mysql_fetch_object($result);	//��ȡ�����
			if(!$row){
				echo"<font color ='red'>�����鼮��Ϣ��</font>";
			}
		do{
			?>
			<table>
			
			
			<td><?php echo $row->bookname;//�������?></td>  
			<td><?php echo $row->image;//���ͼƬ?></td>
			
			<?php 
			if(strlen($result->content)>40){	//������ݼ�飬����40���...
				echo chinesesubstr($conetent,0,40)."....";
			}
			else
			echo $conetent;				//δ����40ֱ�����
			?>
			
			<?php 
		}while($row=mysql_fetch_object($result));
		
	}
	?>
		</table>
		<table>
		</table>
	<?php 
	if($page!=1){			
	/*  ��ʾ����ҳ��������  */
	echo  "<a href=search.php?page=1>��ҳ</a>&nbsp;";
	/*  ��ʾ����һҳ��������  */
	echo "<a href=search.php?page=".($page-1).">��һҳ</a>&nbsp;";
							}
	/*  �����ǰҳ����βҳ  */
	if($page<$num){						
	/*  ��ʾ����һҳ��������  */
	echo "<a href=search.php?page=".($page+1).">��һҳ</a>&nbsp;";
	/*  ��ʾ��βҳ��������  */
	echo  "<a href=search.php?page=".$num.">βҳ</a>";
	}
	 mysql_free_result($sql);		//�ͷſռ�
	 mysql_close($link); 			//�ر�
	?>
	<table>

</table>

	<?php 
	}
	}
?>	

<?php
 function chinesesubstr($str,$start,$len) { 	//��ȡ�����ַ�������ֹ���뷽��
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

