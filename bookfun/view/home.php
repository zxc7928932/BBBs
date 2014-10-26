<html>
<head>
    <title>首页</title>
    <meta charset="utf-8">
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="兴趣书籍论坛">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
    li{
        list-style: none;
    }
   
 
    .form-group{
       width: 30%;
       margin-left: 100px;
    }

    #nav-search{
      margin:0;
      margin-right: 10px;
    }

</style>

</head>

<body>

   <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >

      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
         
          </button>
            <a class="navbar-brand" href="home.php" style="font-size:25px;font-weight:bold;color:#AAAAAA;">
            <span class="glyphicon glyphicon-home"></span>
            Book.fun

            </a> 
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;">

           <ul class="nav navbar-nav">
              <li > 
              <a href="home.php">
                </span>
                 首页
              </a>
               </li>
              <li> 书籍 </li>
           </ul>

           <form class="navbar-form navbar-right" role="search" action="../action/search.php" method="get">

              <div class="form-group" id="nav-search">
                 <input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
              </div>

              <button type="submit"  class="btn btn-default" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
           </form>

          <ul class="nav navbar-nav navbar-right">

            <li style="margin-left:50px;">
              <a href="center.php">
                <span class="glyphicon glyphicon-user">
                  个人中心
              </a> 
            </li>

           </ul>
      </div>
   </nav>



 <div class="col-md-3 column" style="margin:50px 30px 30px 100px;">
    <div class="bs-sidebar hidden-print affix " role="complementary">
      <ul class="nav  bs-sidenav">
        <li class="active"> <a href="index.php">Home</a> </li>
        <li> <a href="phone.php">文学</a> </li>
        <li> <a href="video.php">Video</a> </li>
        <li> <a href="video.php">Video</a> </li>
        <li> <a href="video.php">Video</a> </li>
        <li> <a href="video.php">Video</a> </li>
        <li> <a href="video.php">Video</a> </li>
       
        <!-- class="disabled"-->
        </li>
      </ul>
    </div>




 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin:25px 30px 20px 150px;width:500px;height:300px;"> 
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../img/TB1ML5mGFXXXXbvXpXXvKyzTVXX-520-280.jpg" alt="...">
      <div class="carousel-caption">
        第一幅图
      </div>
    </div>
    <div class="item">
      <img src="../img/TB1xmBCGFXXXXcDXFXXvKyzTVXX-520-280.jpg" alt="...">
      <div class="carousel-caption">
        第二幅图
      </div>
    </div>
    <div class="item">
      <img src="../img/TB2HjX3aVXXXXbTXXXXXXXXXXXX_!!2250860980.jpg" alt="...">
      <div class="carousel-caption">
        
      </div>
    </div>
    ...
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

</body>
</html>