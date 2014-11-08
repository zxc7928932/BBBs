<html>
<head>
    <title>首页</title>

    <meta charset="UTF-8">
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="兴趣书籍论坛">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css">
    <script src="js/jquery-1.11.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
 
    <style type="text/css">

    body,ul,p,h1,h2,form,select,input{
        margin:0;
        padding:0;
    }
    img{
        border:none;
    }
   
    .form-group{
       width: 30%;
       margin-left: 100px;
    }

    #nav-search{
      margin:0;
      margin-right: 10px;
    }

    #book_img{
      width:150px;
      height: 150px;
    }
   

</style>

</head>

<body>

   <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >

      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
         
          </button>
            <a class="navbar-brand" href="home.php" style="font-size:25px;font-weight:bold;color:#AAAAAA;">
            Book.fun
              
            </a> 
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;">

           <ul class="nav navbar-nav">
              <li > 
              <a href="home.php">
                <span class="glyphicon glyphicon-home"></span>
                 首页
              </a>
               </li>
              <li> <a href="upload.php">
                    <span class="glyphicon glyphicon-cloud-upload"></span>

                     上传书籍
                   </a> 
              </li>
           </ul>

           <form class="navbar-form navbar-right" role="search" action="../action/search.php" method="post">

              <div class="form-group" id="nav-search">
                 <input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
              </div>

              <button type="submit" name="submit" value="submit"class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
           </form>

          <ul class="nav navbar-nav navbar-right">

           <li >
              <a href="center.php">
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




 <div class="row">
 <div class="col-md-3 column" style="margin:50px 30px 30px 100px;">
    <div class="bs-sidebar hidden-print affix " role="complementary"> 
            
      <ul class="nav  bs-sidenav">
        <li class="active" style="font-weight:bold;padding:30px 0 10px 0;"> 书籍分类 </li>
        <li > <a href="../action/classify.php?choice=小说">小说</a></li>
        <li > <a href="../action/classify.php?choice=文学">文学</a> </li>
        <li> <a href="../action/classify.php?choice=情感">情感</a> </li>
        <li> <a href="../action/classify.php?choice=科技">科技</a> </li>
        <li> <a href="../action/classify.php?choice=经管">经管</a> </li>
        <li> <a href="../action/classify.php?choice=儿童">儿童</a> </li>
        <li> <a href="../action/classify.php?choice=教育">教育</a> </li>
        <li> <a href="../action/classify.php?choice=生活">生活</a> </li>
        <li> <a href="../action/classify.php?choice=体育">体育</a> </li>
        <!-- class="disabled"-->
        </li>
      </ul>
    </div>

  
    <div style="margin-left:120px;">
       <img src="img/home-top.gif">
      
    </div>

 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin:25px 30px 0px 150px;width:750px;height:310px;"> 
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/xijinpingxin750x315.jpg" alt="...">
     
    </div>
    <div class="item">
      <img src="img/750315jins1020.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    <div class="item">
      <img src="img/xs750x315_sq_20141034.jpg" alt="...">
      
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


  </div>

   <div class="page-header" style="margin:100px 0px 10px 1100px;">
        <h6><span class="glyphicon glyphicon-signal"></span>
          <a href="../action/show_collection.php">我的收藏</a>          <!--我的全部收藏链接-->
           <small>My collection</small> 
        </h6>
        <ol>
<?php 
    session_start();
    $user=$_SESSION['number'];
    $link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names utf8");    
    $sql=mysql_query("select * from collection where user = $user limit 0,3 ");
    $num=mysql_num_rows($sql);
    $row=mysql_fetch_object($sql);
    if($num==0){
      echo '暂无收藏信息';
    }
    else{
    do{
      $bookid=$row->book;
      $sql1=mysql_query("select * from books where id=$bookid");
      $row1=mysql_fetch_object($sql1);
      $title=$row1->bookname;
?>
           <li><a href="show.php?id=<?php echo $row1->id;?>"><?php echo $title ;?></a></li>
           
      <?php }while($row=mysql_fetch_object($sql));
    }?>
        </ol>
 </div>

 <div class="page-header" style="margin:100px 0px 10px 1100px;">
        <h6><span class="glyphicon glyphicon-signal"></span>
          <a href="../action/hotbook.php">最热图书</a>          <!--我的全部收藏链接-->
           <small>top3</small> 
        </h6>
        <ol>
<?php 

    $sql=mysql_query("select * from books order by count desc limit 0,5");
    $num=mysql_num_rows($sql);
    $row=mysql_fetch_object($sql);
    if($num==0){
      echo '暂无图书上传';
    }
    else{
    do{
      $bookid=$row->id;
      $sql1=mysql_query("select * from books where id=$bookid");
      $row1=mysql_fetch_object($sql1);
      $title=$row1->bookname;
?>
           <li><a href="show.php?id=<?php echo $row1->id;?>"><?php echo $title ;?></a></li>
           
      <?php }while($row=mysql_fetch_object($sql));
    }?>
        </ol>
 </div>

 </div>  <!--轮播器这一行的截止位置-->

 <div class="page-header" style="margin:0px 0px 10px 200px;">
        <h5><span class="glyphicon glyphicon-heart-empty"></span>
          新书抢先看
          <small>Daily regular push popular books on the same day</small>  
        </h5>
        
 </div>
<?php
    include("../action/function.php");
    $query="select * from books order by id desc limit 0,6";
    $sql2=mysql_query($query);
    $row2=mysql_fetch_object($sql2); //得到数据库中此成员
    do{
      $b_id=$row2->id;
?>
<div class="row" style="margin-left:190px;">
  <div class="col-md-2">
    <a href="show.php?id=<?php echo $b_id ;?>">
     <img class="img-circle" src="<?php echo $row2->image ;?>" >
   </a>
     <h6><?php echo $row2->bookname;?></h6>
     <p><?php 
     echo chinesesubstr($row2->content,0,26);
     if(strlen($row2->content)>26) echo "...";
     ?>
     </p>
  </div>

<?php }while($row2=mysql_fetch_object($sql2));?>

</div> <!--推荐书目结尾-->


</body>
</html>