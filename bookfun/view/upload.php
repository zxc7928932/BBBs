<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Book</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/master.css" rel="stylesheet">
<style type="text/css"></style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> </button>
    <a class="navbar-brand" href="home.html" style="font-size:25px;font-weight:bold;color:#AAAAAA;"> <span class="glyphicon glyphicon-home"></span> Book.fun </a> </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li > <a href="home.html"> </span> 首页 </a> </li>
      <li class="active"> <a href="#">书籍</a> </li>
    </ul>
    <form class="navbar-form navbar-right" role="search" action="search.php" method="post" >
      <div class="form-group form-group-search" id="nav-search">
        <input type="text" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
      </div>
      <button type="submit" class="btn btn-default" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li style="margin-left:50px;"> <a href="个人中心v1.01.html"> <span class="glyphicon glyphicon-user"> 个人中心 </a> </li>
    </ul>
  </div>
</nav>
<div class="container ">
  <div class="row clearfix">
    <div class="col-md-12 column"> </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12 column">
      <h1>添加书籍</h1>
      <form   name="form2"role="form" enctype="multipart/form-data"  action="../action/setbook.php" method="post"onsubmit="return check(form2);"  >
    
    
        <div class="form-group">
          <label for="exampleInputEmail1">书名</label>
          <input type="text" name="bookname" class="form-control" name="exampleInputEmail1" style="width:200px;"/>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">作者</label>
          <input type="text" class="form-control" name="author" style="width:250px;"/>
        </div>


                <div class="form-group">
                                            <label>书籍种类</label>
                                            <select multiple="" class="form-control" name="classify"style="width:300px;">
                                                <option>小说</option>
                                                <option>文学</option>
                                                <option>情感</option>
                                                <option>科技</option>
                                                <option>经管</option>
                                                <option>儿童</option>
                                                                                                <option>教育</option>
                                                <option>生活</option>
                                                                                                <option>体育</option>
                            
                                            </select>
                                        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">出版社</label>
          <input type="text" class="form-control" name="press" style="width:350px;"/>
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">内容简介</label>
          <textarea name="content" class="form-control"  rows="5" style="width:550px;"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">封面上传</label>
          <input type="file" name="filename" >
          <p class="help-block"> 请选择多大多大的图片 </p>
        </div>


        <button type="submit" name="submit" value="submit" class="btn btn-default" >确认</button>
      </form>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>
    <script type="text/javascript">
  function check(form){
    if(form.author.value==""){
        alert("请输入作者!");form.author.focus();return false;
    }
    if(form.classify.value==""){   
        alert("请选择分类!");form.classify.focus();return false;
        } 
    if(form.content.value==""){   
        alert("请输入内容!");form.content.focus();return false;
        } 
      if(form.bookname.value==""){   
        alert("请输入书名!");form.bookname.focus();return false;
        } 
        if(form.press.value==""){   
        alert("请输入出版社!");form.press.focus();return false;
        } 
         if(form.content.value.length>150){
        alert("内容过长!");form.content.focus();return false;
    }
    if(form.content.value.length<5){
        alert("内容过短!");form.content.focus();return false;
    }
    if(form.filename.value.length==""){
        alert("请选择图片!");form.filename.focus();return false;
    }
}
</script>