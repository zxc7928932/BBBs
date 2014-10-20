<table>
			</table>
<?php
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
	mysql_select_db("books",$link) or die("数据库访问错误".mysql_error());    //选择数据库
	mysql_query("set names gb2312");
	if($_POST[Submit]="查询"){
	$book_name=$_POST[txt_book];
	$book_name=trim($book_name);
	$name_arr=explode(" ",$book_name,3);				//将空格输入的搜索信息 由空格作为方格 分别传入数组
	$cache_count=count($name_arr);						//计算数组长度（数组长度是搜索信息分段数）
	if($book_name==""){
		header("location:show.html");					//如果书名为空 跳转到显示主页
	}
	else{			//书名为空
		if($cache_count==1){			//如果数组长度为一 寻找与其相似的值
		$sql=mysql_query("select * from books where bookname like '%''.$book_name.''%'");
		}
		else if($cache_count==2){		//寻找与数组成员 1,2相似的值
		$name_arr[0]=trim($name_arr[0]);
		$name_arr[1]=trim($name_arr[1]);
		$sql=mysql_query("select * from books where bookname like '%''.$name_arr[0].''%' or bookname like '%''.$name_arr[1].''%'");
		}
		else{							//寻找与数组成员1,2,3相似的值
		$name_arr[0]=trim($name_arr[0]);
		$name_arr[1]=trim($name_arr[1]);
		$name_arr[2]=trim($name_arr[2]);
		$sql=mysql_query("select * from books where bookname like '%''.$name_arr[0].''%' or bookname like '%''.$name_arr[1].''%' or bookname like '%''.$name_arr[2].''%'");	
		}
		$info=mysql_fetch_array($sql); //得到数据库中此成员
		$num=myql_num_ros($sql);	   //搜搜到行数
		$page_size=6;				  //设置每页显示信息数
		if($info==false){			  //未找到数据 
			echo"您查询的数据不存在";//用html改
		}
		else{					
		if($page=""){					//如果页数还未赋值，给其初始值1
			$page=1;
		}
			$page_count=ceil($num/$page_size);//计算页数
			$offset=($page-1)*$page_size;	  //计算当前页开始显示的第一条信息是第几条
			$result=mysql_query("select * from books where bookname like '%''.$book_name.''%' limit $offset,$page_size");//选出当前页需要显示的信息数
			$row=mysql_fetch_object($result);	//获取结果集
			if(!$row){
				echo"<font color ='red'>暂无书籍信息！</font>";
			}
		do{
			?>
			<table>
			
			
			<td><?php echo $row->bookname;//输出书名?></td>  
			<td><?php echo $row->image;//输出图片?></td>
			
			<?php 
			if(strlen($result->content)>40){	//输出内容简介，超过40输出...
				echo chinesesubstr($conetent,0,40)."....";
			}
			else
			echo $conetent;				//未超过40直接输出
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
	/*  显示“首页”超链接  */
	echo  "<a href=search.php?page=1>首页</a>&nbsp;";
	/*  显示“上一页”超链接  */
	echo "<a href=search.php?page=".($page-1).">上一页</a>&nbsp;";
							}
	/*  如果当前页不是尾页  */
	if($page<$num){						
	/*  显示“下一页”超链接  */
	echo "<a href=search.php?page=".($page+1).">下一页</a>&nbsp;";
	/*  显示“尾页”超链接  */
	echo  "<a href=search.php?page=".$num.">尾页</a>";
	}
	 mysql_free_result($sql);		//释放空间
	 mysql_close($link); 			//关闭
	?>
	<table>

</table>

	<?php 
	}
	}
?>	

<?php
 function chinesesubstr($str,$start,$len) { 	//截取中文字符串，防止乱码方法
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

