<?php if (!defined('THINK_PATH')) exit();?><html><head><title>首页 - book.fun</title><meta charset="UTF-8"><meta name="Author" content="Soleil-kk"><meta name="Keywords" content="book.fun"><meta name="Description" content="兴趣书籍论坛"><link rel="stylesheet" type="text/css" href="__PUBLIC__/v/css/bootstrap.min.css"><link rel="stylesheet" type="text/css" href="__PUBLIC__/v/css/flat-ui.min.css"><script src="__PUBLIC__/v/js/jquery-1.11.1.min.js"></script><script src="__PUBLIC__/v/js/bootstrap.min.js"></script><style type="text/css">    body,ul,p,h1,h2,form,select,input{
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
   

</style></head><body style="overflow-x:hidden"><nav class="navbar navbar-default navbar-fixed-top" role="navigation" ><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button><a class="navbar-brand" href="<?php echo U('MainPage/main_page');?>" style="font-size:25px;font-weight:bold;color:#AAAAAA;">            Book.fun
              
            </a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;"><ul class="nav navbar-nav"><li ><a href="<?php echo U('MainPage/main_page');?>" ><span class="glyphicon glyphicon-home"></span>                 首页
              </a><li ></li><li><a href="<?php echo U('BookCenter/upload_show');?>"><span class="glyphicon glyphicon-cloud-upload"></span>                     上传书籍
                   </a></li></ul><form class="navbar-form navbar-right" role="search" action="<?php echo U('BookCenter/search_book');?>" method="get"><div class="form-group" id="nav-search"><input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/></div><button type="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button></form><ul class="nav navbar-nav navbar-right"><li style="margin-left:50px;"><a href="<?php echo U('PersonalCenter/center_show');?>"><span class="glyphicon glyphicon-user">                  个人中心
              </a></li><li><a href="<?php echo U('Login/logout');?>"><span class="glyphicon glyphicon-log-out"></span>                 退出
              </a></li></ul></div></nav><div class="row"><div class="col-md-3 column" style="margin:50px 30px 30px 100px;"><div class="bs-sidebar hidden-print affix " role="complementary"><ul class="nav  bs-sidenav"><li class="active" style="font-weight:bold;padding:30px 0 10px 0;"> 书籍分类 </li><li ><a href="<?php echo U('MainPage/classify?choice=小说');?>">小说</a></li><li ><a href="<?php echo U('MainPage/classify?choice=文学');?>">文学</a></li><li><a href="<?php echo U('MainPage/classify?choice=情感');?>">情感</a></li><li><a href="<?php echo U('MainPage/classify?choice=科技');?>">科技</a></li><li><a href="<?php echo U('MainPage/classify?choice=经管');?>">经管</a></li><li><a href="<?php echo U('MainPage/classify?choice=儿童');?>">儿童</a></li><li><a href="<?php echo U('MainPage/classify?choice=教育');?>">教育</a></li><li><a href="<?php echo U('MainPage/classify?choice=生活');?>">生活</a></li><li><a href="<?php echo U('MainPage/classify?choice=体育');?>">体育</a></li><!-- class="disabled"--></li></ul></div><div style="margin-left:110px;"><img src="__PUBLIC__/v/img/top.gif"></div><div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin:25px 30px 0px 150px;width:750px;height:310px;"><ol class="carousel-indicators"><li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><li data-target="#carousel-example-generic" data-slide-to="1"></li><li data-target="#carousel-example-generic" data-slide-to="2"></li></ol><!-- Wrapper for slides --><div class="carousel-inner" role="listbox"><div class="item active"><img src="__PUBLIC__/v/img/main1.jpg" alt="..."></div><div class="item"><img src="__PUBLIC__/v/img/main2.jpg" alt="..."><div class="carousel-caption"></div></div><div class="item"><img src="__PUBLIC__/v/img/main3.jpg" alt="..."></div></div><!-- Controls --><a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></div></div><div class="page-header" style="margin:100px 0px 10px 1100px;height:160px"><h6><span class="glyphicon glyphicon-tags"></span><a href="<?php echo U('PersonalCenter/my_collection');?>" style="color: black;">&nbsp;&nbsp;我的收藏</a><small style="color:#C6E2FF;">&nbspMy collection</small></h6><?php echo ($info1); ?><ol><?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["myURL"]); ?>"><?php echo ($vo["bookname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ol></div><div class="page-header" style="margin:15px 0px 10px 1100px;height:220px"><h6><span class="glyphicon glyphicon-stats"></span><a href="<?php echo U('BookCenter/hot_book');?>" style="color: #EE0000;">&nbsp;&nbsp;最热图书</a><small style="color:#C6E2FF;">&nbsp&nbsp top5</small></h6><?php echo ($info2); ?><ol><?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["myURL"]); ?>"><?php echo ($vo["bookname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?></ol></div><div class="page-header" style="margin:20px 0px 10px 200px;"><h5><span class="glyphicon glyphicon-heart-empty" style="color:#EE0000"></span>          新书抢先看
          <small style="color:#C6E2FF;">Daily regular push popular books on the same day</small></h5></div><div class="row" style="margin-left:190px;"><?php echo ($info2); if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-2"><a href= "<?php echo ($vo["myURL"]); ?>"><img class="img-circle" src="__PUBLIC__/Uploads/<?php echo ($vo["image"]); ?>" ></a><p style="text-align:center;color:blue"><?php echo ($vo["bookname"]); ?></p><p style="text-align:center"><small><?php echo ($vo["author"]); ?></small></p></div><?php endforeach; endif; else: echo "" ;endif; ?></div><!--推荐书目结尾--></body></html>