<html>
<head>
    <title>后台登录</title>

    <meta charset="gb2312">
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="兴趣书籍论坛">
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
    .form-group{
       width: 30%;
       margin-left: 100px;
    }

    #nav-search{
      margin:0;
      margin-right: 10px;
    }

     h1{
       margin:80px 0px 30px 160px;
       font-size:200%;
       font-weight: bold;
       color: #1874CD;
    }
</style>

</head>

<body>
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
                 首页
              </a>
               </li>
              <li> <a href="#">书籍</a> </li>
           </ul>

           <form class="navbar-form navbar-right" role="search" action="get">

              <div class="form-group" id="nav-search">
                 <input type="text" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
              </div>

              <button type="submit" class="btn btn-default" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
           </form>

           <ul class="nav navbar-nav navbar-right">

             <li style="margin-left:50px;">
                   <a href="个人中心v1.01.html">
                     <span class="glyphicon glyphicon-user">
                     个人中心
                   </a> 
             </li>

             
           </ul>
      </div>
   </nav>

     <div>
        <h1 >欢迎来到后台管理系统</h1>
     </div>

     <form name="form8" method="post" action="mian1.php" role="form">

         <div class="form-group">
            <label for="user">账号</label>
            <input type="text" class="form-control" id="user" name="txt_user" >
         </div>

         <div class="form-group">
            <label for="txt_pwd">密码</label>
            <input type="password" class="form-control" id="txt_pwd" name="txt_pwd" onClick="return check5(form8);">
         </div>

         <div class="form-group">

            <label for="check">验证码</label>
            <input type="text" id="check" name="checks" onClick="return check6(form8);">
            <img src="checks.php" width="120px" height="25px" border="0" align="bottom">
           
         </div>
  
        <button name="Submit" type="submit" class="btn btn-primary btn-lg " onClick="return check7(form8);" style="margin-left:100px; width:30%;">
           提交
        </button>
 
      
     </form>


   <script language="javascript">    //检测各信息是否正确
      /*检测各值是否为空*/
    function check5(form){                            
      if(form.txt_user.value==""){
    alert("请输入用户名!");form.txt_user.focus();return false;
  }
  
}
    function check6(form){
      if(form.txt_pwd.value==""){
    alert("请输入密码!");form.txt_pwd.focus();return false;
  }
}
    function check7(form){
      if(form.txt_user.value==""){
    alert("请输入用户名!");form.txt_user.focus();return false;
  }
    if(form.txt_pwd.value==""){
      alert("请输入密码!");form.txt_pwd.focus();return false;
  }
  form.submit();
}
   /*检测各值是否为空*/
   </script>

</body>
</html>