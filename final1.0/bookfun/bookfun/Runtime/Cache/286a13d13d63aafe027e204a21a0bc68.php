<?php if (!defined('THINK_PATH')) exit();?><html><head><title><?php echo ($classify_info); ?>书籍 - book.fun</title><meta charset="utf-8"><meta name="Author" content="Soleil-kk"><meta name="Keywords" content="book.fun"><meta name="Description" content="兴趣书籍论坛"><link rel="stylesheet" type="text/css" href="__PUBLIC__/a/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="__PUBLIC__/v/css/flat-ui.min.css"><script type="text/javascript" src="__PUBLIC__/a/js/bootstrap.js"></script><style type="text/css">body,ul,p,h1,h2,form,select,input {
    margin: 0;
    padding: 0;
}

img {
    border: none;
}

li {
    list-style: none;
}

h5 {
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
</style></head><body><nav class="navbar navbar-default navbar-fixed-top" role="navigation" ><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button><a class="navbar-brand" href="<?php echo U('MainPage/main_page');?>" style="font-size:25px;font-weight:bold;color:#AAAAAA;">            Book.fun
              
            </a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;"><ul class="nav navbar-nav"><li ><a href="<?php echo U('MainPage/main_page');?>"><span class="glyphicon glyphicon-home"></span>                 首页
              </a></li><li><a href="<?php echo U('BookCenter/upload_show');?>"><span class="glyphicon glyphicon-cloud-upload"></span>                     上传书籍
                   </a></li></ul><form class="navbar-form navbar-right" role="search" action="<?php echo U('BookCenter/search_book');?>" method="get"><div class="form-group" id="nav-search"><input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/></div><button type="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button></form><ul class="nav navbar-nav navbar-right"><li style="margin-left:50px;"><a href="<?php echo U('PersonalCenter/center_show');?>"><span class="glyphicon glyphicon-user">                  个人中心
              </a></li><li><a href="<?php echo U('Login/logout');?>"><span class="glyphicon glyphicon-log-out"></span>                 退出
              </a></li></ul></div></nav><div class="page-header" style="margin-top: 80px;"><h5><span class="glyphicon glyphicon-map-marker"></span>书籍类别：<?php echo ($classify_info); ?><small>&nbsp&nbspThe
following is based on your choice</small></h5></div><div class="row"><?php echo ($search_info); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4" id="book_form" style="margin-left: 80px"><div class="thumbnail"><img src="/bookfun/Public/Uploads/<?php echo ($vo["image"]); ?>"><div class="caption"><p style=" text-align:center;font-weight:bold;"><?php echo ($vo["bookname"]); ?></p><p style=" text-align:center;">作者：<?php echo ($vo["author"]); ?></p><p style=" text-align:center;"><a href=<?php echo ($vo["dir"]); ?> class="btn btn-primary" role="button">详情</a>&nbsp;
<a href=<?php echo ($vo["myURL"]); ?> class="btn btn-danger" role="button"><?php echo ($vo["info"]); ?></a></p></div></div></div><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="result page" style=" text-align:center;"><?php echo ($page); ?></div></body></html>