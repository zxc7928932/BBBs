
<html>
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="兴趣书籍论坛">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flat-ui.min.css">
    <script src="js/jquery-1.11.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script language="javascript"  src="bootstrap.js"></script>
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

              <button type="submit" name="submit" value="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
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



<?php
  session_start();
  $curuser = $_SESSION['number'];
  $link1 = mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
  mysql_select_db("guestinfo",$link1) or die("数据库访问错误".mysql_error());    
  mysql_query("set names utf-8");  
  $cmd = "select * from register where uid=$curuser";
  $row = mysql_query($cmd);
  $record = mysql_fetch_row($row);
  $nickname_tmp = $record[1];
  $sex_tmp = $record[4];
  $age_tmp = $record[3];
  $signature_tmp = $record[6];
?>

<body>
  <script type="text/javascript">
  
    var check = function()
    {
      var err = "";
      if(document.getElementById('nickname').value.length == 0)
      {
        err += "昵称不能为空\n";
      }
      
      if(document.getElementById('age').value.length == 0)
      {
        err += "年龄不能为空\n";
      }
    
      if (document.getElementById('age').value.search( /^\d+$/)<0)
      {
        err += "年龄不是数字\n";
      }
      
      if(document.getElementById('signature').value.length == 0)
      {
        err += "个性签名不能为空\n";
      }
    
      if(!(err == ""))
      {
        alert(err);
        return false;
      }
    }
  </script>

   <nav class="navbar navbar-default" role="navigation">

      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
         
          </button>
            <a class="navbar-brand" href="home.html" style="font-size:25px;font-weight:bold;color:#AAAAAA;">Book.fun</a> 
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

           <ul class="nav navbar-nav">
              <li class="active" > <a href="home.html">首页</a> </li>
              <li> <a href="#">书籍</a> </li>
           </ul>

           <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
              <input type="text" class="form-control" style="width:350px;" placeholder="请输入您想查找的书籍...."/>
              </div>
              <button type="submit" class="btn btn-default" style="float:right;margin:0,20px;">搜索</button>
           </form>

           <ul class="nav navbar-nav navbar-right">

             <li> <a href="#">个人中心</a> </li>

             
           </ul>
     </div>
   </nav>

     <div>
       
        <h1 >欢迎来到个人中心</h1>
     </div>

  <div id="content">
      
         
        <form   role="form" enctype="multipart/form-data"   action="../action/person_data1.php" method="post" onsubmit="return check(this);">

              <div class="form-group">
              <label for="nickname">昵称：</label>
              <input type="text" class="form-control" id="nickname" name="nickname" placeholder="给自己取个好听的名字吧~" value="<?php echo $nickname_tmp?>" >
              </div>

              <div class="form-group" style="width:5%">
              <label for="sex">性别：</label>
              <select class="form-control" id="sex" name="sex" >
              <option value="男">男</option>
              <option value="女">女</option>
              </select>
              </div>

              <div class="form-group" >
              <label for="age">年龄：</label>
              <input type="text" class="form-control" id="age" name="age" placeholder="你今年多大啦~" value="<?php echo $age_tmp?>">
              </div>

              <div class="form-group" >
              <label for="signature">个性签名：</label>
              <input type="text" class="form-control" id="signature" name="signature" placeholder="用一句话介绍你自己吧~" value="<?php echo $signature_tmp?>">
              </div>

              <div class="form-group">
              <label for="avatar">头像上传：</label>
              <input type="file" id="filename" name="filename">
              <p class="help-block">快快让大家一睹真容吧</p>
              </div>

  
             <button type="submit" class="btn btn-primary  " id="btn1">提交</button>
             <button type="reset" class="btn btn-default  " id="btn2">重置</button>
        </form>
    
    

</body>
</html>