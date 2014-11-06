<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title>Book title</title><meta charset="utf-8"><link href="__PUBLIC__/v/css/bootstrap.min.css" rel="stylesheet"><link href="__PUBLIC__/v/css/master.css" rel="stylesheet"><!-- bootstrap wysihtml5 - text editor --><link href="__PUBLIC__/v/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /><style type="text/css"></style></head><body><nav class="navbar navbar-default navbar-fixed-top" role="navigation" ><div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button><a class="navbar-brand" href="<?php echo U('MainPage/main_page');?>" style="font-size:25px;font-weight:bold;color:#AAAAAA;">            Book.fun
              
            </a></div><div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:  #0F0F0F;"><ul class="nav navbar-nav"><li ><a href="<?php echo U('MainPage/main_page');?>"><span class="glyphicon glyphicon-home"></span>                 首页
              </a></li><li><a href="<?php echo U('BookCenter/upload_show');?>"><span class="glyphicon glyphicon-cloud-upload"></span>                     上传书籍
                   </a></li></ul><form class="navbar-form navbar-right" role="search" action="<?php echo U('BookCenter/search_book');?>" method="get"><div class="form-group" id="nav-search"><input type="text" name="txt_book" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/></div><button type="submit" class="btn btn-primary" style="float:right;margin-right:20px;"><span class="glyphicon glyphicon-search"></span> 搜索 </button></form><ul class="nav navbar-nav navbar-right"><li style="margin-left:50px;"><a href="<?php echo U('PersonalCenter/center_show');?>"><span class="glyphicon glyphicon-user">                  个人中心
              </a></li><li><a href="<?php echo U('Login/logout');?>"><span class="glyphicon glyphicon-log-out"></span>                 退出
              </a></li></ul></div></nav><div class="container center-container"><div class="row clearfix"><div class="col-md-12 column heading"><h1><?php echo ($list1["bookname"]); ?></h1></div></div><!-- row --><div class="row clearfix"><div class="col-md-4 column"><div id="mainpic" class=""><a class="nbg" href="/bookfun/Public/Uploads/<?php echo ($list1["image"]); ?>" title="<?php echo $row->bookname ?>"><img src="/bookfun/Public/Uploads/<?php echo ($list1["image"]); ?>" title="点击看大图" alt="/bookfun/Public/Uploads/<?php echo ($list1["image"]); ?>" rel="v:photo"></a></div></div><div class="col-md-6 column"><div id="info" class=""><span><span class="pl">作者：</span><div  style="color:blue"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo ($list1["author"]); ?></div></span><br><span class="pl">出版社：</span><div  style="color:blue"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo ($list1["press"]); ?></div><br><br></div></div><div class="col-md-2 column"><a href="<?php echo ($list1["myURL"]); ?>" class="btn btn-default btn-success" ><?php echo ($list1["info"]); ?></a></div></div><!-- row --><div class="subject clearfix"></div><div class="row clearfix"><div class="col-md-12 column"><div class="related_info"><h2><span class="">内容简介</span>                        &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
                    </h2><div class="intro"><p><?php echo ($list1["bookname"]); ?></p><p>分类:<?php echo ($list1["classify"]); ?></p><p>让我们走进这本书籍的世界</p><p>◎内容简介</p><p><pre><?php echo ($list1["content"]); ?></pre></p></div><div class="reviews"><div class="clearfix "><h2>书评&nbsp;&nbsp;· · · · · ·&nbsp;</h2><ul class="nav nav-pills comment-right"><li><a href="#comment-editor"><span class="badge pull-right"></span>                                        我来评论这本书
                                    </a></li></ul></div><div class="comment-box"><?php echo ($comment_info); ?><div id="js-comment-box"><?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="comment"><div class="comment-title"><div class="image"><?php
 $User = D('user'); $tmp_uid = $vo['uid']; $user = $User->where("uid = $tmp_uid")->find(); ?><img src="__PUBLIC__/Uploads/<?php echo ($user["photo"]); ?>" alt="user image"><?php echo ($user["username"]); ?></a></div></div><p><pre class="comment-message" style="width:1100px;"><?php echo ($vo["content"]); ?></pre></p></div><?php endforeach; endif; else: echo "" ;endif; ?></div><div class="result page"><?php echo ($page); ?></div></div><!-- box --></div><!-- reviews --></div><!-- related --></div><!-- column --></div><!-- row --><div class="row clearfix"><div class="col-md-12 column"><div id="comment-editor" class='box' style="margin-top:60px;"><div class='box-header'><h3 class='box-title'>                            评论
                            <small></small></h3><div class="pull-right box-tools"><!-- tools box --></div><!-- /.box-header --><div class='box-body pad' ><form name="form1"action="<?php echo ($list1["commentURL"]); ?>" method="get" ><textarea name="comment" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea><div class="footer" style="margin-top:10px;"><button type="submit" class="btn btn-success" onClick="return check1(form1);">提交</button></div></form></div></div></div></div></div><!-- row --></div><!-- container --><!-- <div class="col-md-4 column">这里是啥来着。。忘了</div>--><script src="__PUBLIC__/v/js/jquery.min.js"></script><script src="__PUBLIC__/v/js/bootstrap.min.js"></script><!-- Bootstrap WYSIHTML5 --><script src="__PUBLIC__/v/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script><script type="text/javascript">            var comment_count = 3;
            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();

                $(".js-more-discussion").click( function(){  
                        $.getJSON("../action/showmore.php",  {bookid:<?php echo $row->id;?>, cnt: comment_count},
                               function(data){
                                    comment_count += data.length; 

                                    $.each(data, function(i,item){
                                        content = '<div class="comment"><div class="comment-title"><div class="image"><a ' + 
                                         ' title="' + 
                                        item.nickname +  '"><img src="'+
                                        item.image_url +  '" alt="user image">' + 
                                        item.nickname + 
                                        '</a></div></div><div class="comment-message">' + 
                                        '<p>'+ item.comment + '</p>'
                                        '</div></div>';

                                        $("#js-comment-box").append(content);  
                                    })
                                  })

                }); 

            });



        </script></body></html><script language="javascript">                                              //检测各信息是否正确
/*检测各值是否为空*/
function check1(form){
    if(form.comment.value==""){
        alert("请输入评论");form.comment.focus();return false;
    }
     
    if(form.comment.value.length>250){
        alert("评论过长!");form.comment.focus();return false;
    }
    if(form.comment.value.length<5){
        alert("评论过短!");form.comment.focus();return false;
    }
}
</script>