<html>
<head>
	<title>�ղ�����</title>

	<meta name="Author" content="Soleil-kk">
	<meta name="Keywords" content="book.fun">
	<meta name="Description" content="��Ȥ�鼮��̳">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript"  src="bootstrap.js"></script>
	
	<style type="text/css">

	body,ul,p,h1,h2,form,select,input{
		margin:0;
		padding:0;
	}
	img{
		border:none;
	}
	li{
		list-style: none;
	}

	h3{
		color: #1874CD;
		margin-left: 80px;
	}    
	.form-group{
		width: 30%;
		margin-left: 100px;
	}

	#nav-search{
		margin:0;
		margin-right: 10px;
	}

	#book_form{
		display: inline;
		width:230px;
		height:400px;
		margin: 40px;
	}
	#book_img{
		width: 220px;
		height: 250px;
	}

	</style>

</head>

<body>
	<?php include("function.php");?>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 

			</button>
			<a class="navbar-brand" href="home.html" style="font-size:25px;font-weight:bold;color:#AAAAAA;">
				<span class="glyphicon glyphicon-home"></span>
				Book.fun

			</a> 
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav">
				<li class="active" > 
					<a href="home.html">
					</span>
					��ҳ
				</a>
			</li>
			<li> <a href="#">�鼮</a> </li>
		</ul>

		<form class="navbar-form navbar-right" role="search" action="search.php" method="post">

			<div class="form-group" id="nav-search">
				<input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="������������ҵ��鼮...."/>
			</div>

			<button type="submit" name="submit" value="����" class="btn btn-default" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> ���� </button>
		</form>

		<ul class="nav navbar-nav navbar-right">

			<li style="margin-left:50px;">
				<a href="��������v1.01.html">
					<span class="glyphicon glyphicon-user">
						��������
					</a> 
				</li>

			</ul>
		</div>
	</nav>



	<div class="page-header" style="margin-top:80px;">

		<h3>
			<span class="glyphicon glyphicon-map-marker"></span>
			ȫ���ղ� 
			<small>The following is based on your keywords
			</small>
		</h3>
	</div>

	<div class="row" >

	<?php
	session_start();
	$link=mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());//�������ݿ�
    mysql_select_db("guestinfo",$link) or die("���ݿ���ʴ���".mysql_error());    //ѡ�����ݿ�
    mysql_query("set names gb2312");                                            //ѡ���ַ�����׼��ʽ
	$u_id=$_SESSION['number'];
	if($page==""){         //���ҳ����δ��ֵ�������ʼֵ1
		$page=1;
	}
  	$page_size=6;         //����ÿҳ��ʾ��Ϣ��
  	$offset=($page-1)*$page_size;            //������һҳ�ӵڼ������ݿ�ʼѭ�� 
  	$sql=mysql_query("select * from collection where user = $u_id order by id ");//�ҵ���ǰ�û����ղ�
  	$rows=mysql_num_rows($sql);													//�õ��û��ղص�����
  	$sql=mysql_query("select * from collection where user = $u_id order by id limit $offset,$page_size ");
  	$count=ceil($rows/$page_size);						//����ҳ��
  	$row=mysql_fetch_object($sql); //�õ����ݿ��д˳�Ա
  	if($row==false){        //δ�ҵ����� 
  		echo"<font color ='red'>�����鼮��Ϣ��</font>";
  	}
  	else{         
  		do{
  			$book_id=$row->book;
  			$sql1=mysql_query("sqlect * from books where id =$book_id");
  			$row1=mysql_fetch_object($sql1);
  			?>  
  			<div class="col-sm-6 col-md-4" id="book_form"  style="margin-left:80px">
  				<div class="thumbnail" >
  					<img src="<?php echo $row1->image ?>" alt="mmmm" id="book_img">
  					<div class="caption">
  						<h3><?php echo $row1->bookname ?></h3>
  						<p><?php echo chinesesubstr($row1->content, 0, 30);if(strlen($row->content)>30) echo "..."; ?>
  						</p>
  						<p>
  							<a href=show.php?id=".<?php $row1->id?>." class="btn btn-primary" role="button">����</a> 
  						</p>
  					</div>
  				</div>
  			</div>
  			
  			<?php 
  		}while($row=mysql_fetch_object($sql));
  		
  	}
  	?>
  </div>


  <?php 
  if($page!=1){     
  	/*  ��ʾ����ҳ��������  */
  	echo  "<a href=show_collection.php?page=1>��ҳ</a>&nbsp;";
  	
  	if($page>1){
  		/*  ��ʾ����һҳ��������  */
  		echo "<a href=show_collection.php?page=".($page-1).">��һҳ</a>&nbsp;";
  	}
  }
  /*  �����ǰҳ����βҳ  */
  if($page<$count){           
  	
  	/*  ��ʾ����һҳ��������  */
  	echo "<a href=show_collection.php?page=".($page+1).">��һҳ</a>&nbsp;";
  	
  	/*  ��ʾ��βҳ��������  */
  	echo  "<a href=show_collection.php?page=".$page_count.">βҳ</a>";
  }
 mysql_free_result($sql);   //�ͷſռ�
 mysql_close($link);      //�ر�


 ?>


</body>
</html>

