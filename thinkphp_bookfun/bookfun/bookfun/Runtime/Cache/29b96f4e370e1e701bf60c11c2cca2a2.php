<?php if (!defined('THINK_PATH')) exit();?><html><head><title>首页-book.fun</title><meta charset="UTF-8"><meta name="Author" content="Soleil-kk"><meta name="Keywords" content="book.fun"><meta name="Description" content="兴趣书籍论坛"><link rel="stylesheet" type="text/css" href="/bookfun/Public/PersonalCenter/css/bootstrap.min.css"><style type="text/css">    body,ul,p,h1,h2,form,select,input{
        margin:0;
        padding:0;
    }
    img{
        border:none;
    }
    li{
        list-style: none;
    }
    body{
        background: #fff url(bg.png); 
        background-repeat:repeat-x;
    }

    label{
       font-size: 18px;
    }

    .form-group{
       width: 30%;
       margin-left: 100px;
    }

    h1{
       margin:50px 0px 30px 180px;
       font-size:200%;
       font-weight: bold;
       color: #1874CD;
    }

    #btn1{
      width:10%;
      margin-top: 30px;
      margin-left: 130px;
    }

    #btn2{
      width:10%;
      margin-left: 60px;
      margin-top: 30px;
    }



    </style></head><body><nav class="navbar navbar-default navbar-fixed-top" role="navigation" ><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button><a class="navbar-brand" href="<?php echo U('MainPage/main_page');?>" style="font-size:25px;font-weight:bold;color:#AAAAAA;">            Book.fun
              
            </a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;"><ul class="nav navbar-nav"><li ><a href="<?php echo U('MainPage/main_page');?>"><span class="glyphicon glyphicon-home"></span>                 首页
              </a></li><li><a href="<?php echo U('BookCenter/upload_show');?>"><span class="glyphicon glyphicon-cloud-upload"></span>                     上传书籍
                   </a></li></ul><form class="navbar-form navbar-right" role="search" action="<?php echo U('BookCenter/search_book');?>" method="get"><div class="form-group" id="nav-search"><input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/></div><button type="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button></form><ul class="nav navbar-nav navbar-right"><li style="margin-left:50px;"><a href="<?php echo U('PersonalCenter/center_show');?>"><span class="glyphicon glyphicon-user">                  个人中心
              </a></li></ul></div></nav><div><h1 >欢迎来到个人中心</h1></div><div id="content"><form role="form" enctype="multipart/form-data"  action="<?php echo U('PersonalCenter/alter_data');?>" method="post" onsubmit="return check(this);"><div class="form-group"><label for="nickname">昵称：</label><input type="text" class="form-control" id="nickname" name="nickname" placeholder="给自己取个好听的名字吧~" value="<?php echo ($list["username"]); ?>" ></div><div class="form-group" style="width:5%"><label for="sex">性别：</label><select class="form-control" id="sex" name="sex" ><option value="男">男</option><option value="女">女</option></select></div><div class="form-group" ><label for="age">年龄：</label><input type="text" class="form-control" id="age" name="age" placeholder="你今年多大啦~" value="<?php echo ($list["age"]); ?>"></div><div class="form-group" ><label for="signature">个性签名：</label><input type="text" class="form-control" id="signature" name="signature" placeholder="用一句话介绍你自己吧~" value="<?php echo ($list["signature"]); ?>"></div><div class="form-group"><label for="avatar">头像上传：</label><input type="file" id="filename" name="filename"><p class="help-block">快快让大家一睹真容吧</p></div><button type="submit" class="btn btn-primary  " id="btn1">提交</button><button type="reset" class="btn btn-default  " id="btn2">重置</button></form></body><script type="text/javascript">    var check = function()
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

    window.onload = function()
    {
      var tmp = '<?php echo ($list["sex"]); ?>';
      var tp = document.getElementById('sex');
      if(tp.options[0].value == tmp)
      {
        tp.options[0].selected = true;
      }
      else
      {
        tp.options[1].selected = true;
      }
    }
  </script></html>