<html>
<head>
	<title>最热图书</title>
	<meta charset="utf-8">
	<meta name="Author" content="Soleil-kk">
	<meta name="Keywords" content="book.fun">
	<meta name="Description" content="兴趣书籍论坛">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css">
	<script type="text/javascript"  src="bootstrap.js"></script>
	
	<style type="text/css">

body,ul,p,h1,h2,form,select,input {
    margin: 0;
    padding: 0;
}

img {
    border: none;
}

li {
    list-style: none;
}

h3 {
    color: #1874CD;
    margin-left: 80px;
}

.form-group {
    width: 30%;
    margin-left: 100px;
}

#nav-search {
    margin: 0;
    margin-right: 10px;
}

#book_form {
    display: inline;
    width: 230px;
    height: 400px;
    margin: 40px;
}

#book_img {
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
            <a class="navbar-brand" href="../view/home.php" style="font-size:25px;font-weight:bold;color:#AAAAAA;">
            Book.fun
              
            </a> 
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;">

           <ul class="nav navbar-nav">
              <li > 
              <a href="../view/home.php">
                <span class="glyphicon glyphicon-home"></span>
                 首页
              </a>
               </li>
              <li> <a href="../view/upload.php">
                    <span class="glyphicon glyphicon-cloud-upload"></span>

                     上传书籍
                   </a> 
              </li>
           </ul>

           <form class="navbar-form navbar-right" role="search" action="../action/search.php" method="post">

              <div class="form-group" id="nav-search">
                 <input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
              </div>

              <button type="submit" name="submit" value="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
           </form>

          <ul class="nav navbar-nav navbar-right">

           <li >
              <a href="../view/center.php">
                <span class="glyphicon glyphicon-user">
                  个人中心
              </a> 
            </li>

             <li >
              <a href="../action/logout.php">
                <span class="glyphicon glyphicon-off">
                退出账户
              </a> 
            </li>

           </ul>
      </div>
   </nav>




<div class="page-header" style="margin-top: 80px;">

<h3><span class="glyphicon glyphicon-map-marker"></span> 书籍搜索结果 <small>The
following is based on your keywords </small></h3>
</div>

<div class="row">

	<?php
	session_start();
	$uid=$_SESSION['number'];
	$link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names utf-8");                                            //选择字符集标准格式
	
	if($page==""){         //如果页数还未赋值，给其初始值1
		$page=1;
	}
  	$page_size=6;         //设置每页显示信息数
  	$offset=($page-1)*$page_size;            //计算下一页从第几条数据开始循环 
  	$sql=mysql_query("select * from books");//找到当前用户的收藏
  	$rows=mysql_num_rows($sql);													//得到用户收藏的数量
  	$sql=mysql_query("select * from books order by count desc limit $offset,$page_size ");
  	$count=ceil($rows/$page_size);						//计算页数
  	$row=mysql_fetch_object($sql); //得到数据库中此成员
  	if($row==false){        //未找到数据 
  		echo"<font color ='red'>暂无图书上传！</font>";
  	}
  	else{         
  		do{
  			$book_id=$row->id;
  			$sql1=mysql_query("select * from books where id =$book_id");
  			$row1=mysql_fetch_object($sql1);
  			$sql3=mysql_query("select * from collection where user=$uid and book=$book_id");
            $num=mysql_num_rows($sql3);
  			?>  
  			<div class="col-sm-6 col-md-4" id="book_form"  style="margin-left:80px">
  				<div class="thumbnail" >
  					<img src="<?php echo $row1->image ?>" alt="mmmm" id="book_img">
  					<div class="caption">
  						<h3><?php echo $row1->bookname ?></h3>
  						<p><?php echo chinesesubstr($row1->content, 0, 30);if(strlen($row->content)>30) echo "..."; ?>
  						</p>
  						<p>
  							<a href="../view/show.php?id=<?php echo $row->id;?>" class="btn btn-primary" role="button">详情</a>
  							<?php if($num==0){ ?>
    					<a href="../action/collection.php?id=<?php echo $row->id;?>" class="btn btn-default" role="button">收藏</a></p>
    					<?php }
   					 else { ?>
    				<a href="../action/delete_collection.php?id=<?php echo $row->id;?>" class="btn btn-default" role="button">取消收藏</a></p>
    				<?php } ?> 
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
  	/*  显示“首页”超链接  */
  	echo  "<a href=hotbook.php?page=1>首页</a>&nbsp;";
  	
  	if($page>1){
  		/*  显示“上一页”超链接  */
  		echo "<a href=hotbook.php?page=".($page-1).">上一页</a>&nbsp;";
  	}
  }
  /*  如果当前页不是尾页  */
  if($page<$count){           
  	
  	/*  显示“下一页”超链接  */
  	echo "<a href=hotbook.php?page=".($page+1).">下一页</a>&nbsp;";
  	
  	/*  显示“尾页”超链接  */
  	echo  "<a href=hotbook.php?page=".$page_count.">尾页</a>";
  }
 mysql_free_result($sql);   //释放空间
 mysql_close($link);      //关闭


 ?>


</body>
</html>