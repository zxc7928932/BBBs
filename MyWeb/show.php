<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Book title</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css"></style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" >
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button>
            <a class="navbar-brand" href="home.html" style="font-size:25px;font-weight:bold;color:#AAAAAA;">
                <span class="glyphicon glyphicon-home"></span>
                Book.fun
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li  >
                    <a href="home.html"></span>
                    首页
                </a>
            </li>
            <li class="active">
                <a href="#">书籍</a>
            </li>
        </ul>
        <form class="navbar-form navbar-right" role="search" action="get">
            <div class="form-group form-group-search" id="nav-search">
                <input type="text" class="form-control" style="width:400px;" placeholder="请输入您想查找的书籍...."/>
            </div>
            <button type="submit" class="btn btn-default" style="float:right;margin-right:20px;">
                <span class="glyphicon glyphicon-search"></span>
                搜索
            </button>
        </form>
        <ul class="nav navbar-nav navbar-right">
            <li style="margin-left:50px;">
                <a href="个人中心v1.01.html">
                    <span class="glyphicon glyphicon-user">个人中心</a>
                </li>
            </ul>
        </div>
    </nav>
<?php 
    session_start();
    $link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());//链接数据库
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names gb2312");                                            //选择字符集标准格式
    $sql=mysql_query("select * from books where id =$id");                      //检索书籍
    $row=mysql_fetch_object($sql);
    $uid=$_SESSION['number'];
    $result=mysql_query("select * from collection where uid=$uid and id=$id");
    $num = mysql_num_rows($result);

    
?>
    <div class="container center-container">

        <div class="row clearfix">
            <div class="col-md-12 column heading">
                <h1><?php echo $row->bookname ?></h1>
            </div>
        </div>
        <!-- row -->

        <div class="row clearfix">
            <div class="col-md-4 column">
                <div id="mainpic" class="">
                    <a class="nbg" href="http://img3.douban.com/lpic/s27457804.jpg" title="<?php echo $row->bookname ?>">
                        <img src="<?php echo $row->image ?>" title="点击看大图" alt="<?php echo $row->bookname ?>" rel="v:photo"></a>
                </div>
            </div>

            <div class="col-md-6 column">
                <div id="info" class="">
                    <span>
                        <span class="pl">作者</span>
                        :
                        <a class="" href="/search/%E6%9D%89%E6%B5%A6%E5%BA%B7%E5%B9%B3%20%E7%BC%96%E8%91%97"><?php echo $row->author."编著" ?> </a>
                    </span>
                    <br>
                    <span class="pl">出版社:</span>
            <?php echo $row->press."出版" ?>
                    <br>
                  
                    <br>
                </div>
            </div>


            <div class="col-md-2 column">
            <?php if($num==0){ ?>
             <a href=collection.php?id=".<?php $row->id?>." class="btn btn-default btn-success" contenteditable="true"> 收藏 </a>
             <?php }
             else{ ?>
             <a href=delete_collection.php?id=".<?php $row->id?>." class="btn btn-default btn-danger" contenteditable="true"> 取消收藏</a>
             <?php }?>
            </div>
        </div>
        <!-- row -->

        <div class="subject clearfix"></div>

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="related_info">
                    <h2>
                        <span class="">内容简介</span>
                        &nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·
                    </h2>
                    <div class="intro">
                        <p><?php echo $row->bookname ?></p>
                        <p>分类:<?php echo $row->classify?></p>
                        <p>让我们走进这本书籍的世界</p>
                        <p>◎内容简介</p>
                        <p>
                           <?php echo $row->content?>
                        </p>
            
                    </div>

                    <div class="reviews">

                        <div class="clearfix ">
                            <h2>书评&nbsp;&nbsp;· · · · · ·&nbsp;</h2>

                            <ul class="nav nav-pills comment-right">
                                <li class="active">
                                    <a href="#">
                                        <span class="badge pull-right"></span>
                                        全部评论
                                    </a>
                                </li>
                                <li>
                                    <a href="#comment-editor">
                                        <span class="badge pull-right"></span>
                                        我来评论这本书
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div id="js-comment-box" class="comment-box">
<?php 
    $sql1=mysql_query("selcect * from comment where book_id='$id' orede  order by id ");                        //检索评论
    $row1=mysql_fetch_object($sql1);
    for($i=0;$i<3;$i++){
    $sql2=mysql_query("selcect * from register where uid='$row1->user'");
    $row2=mysql_fetch_object($sql2);
?>
                            <div class="comment">
                                <div class="comment-title">
                                    <div class="image">
                                      
                                            <img src="$row2->Photo</img>" alt="user image"><?php echo $row2->Username?></a>
                                    </div>
                                </div>
                                <div class="comment-message">
                                    <p>
                                        <?php echo $row1->content?>
                                    </p>
                                </div>
                            </div>
                            

<?php 
    $row1=mysql_fetch_object($sql1);
    }
?>

                            <div class="comment-footer">
                    <a class="js-more-discussion" href="javascript:;">显示更早的讨论</a>
            </ul>
        </div>

                        </div>
                        <!-- box --> </div>
                    <!-- reviews --> </div>
                <!-- related --> </div>
            <!-- column --> </div>
        <!-- row -->

        <div class="row clearfix">
            <div class="col-md-12 column">
                <div id="comment-editor" class='box' style="margin-top:60px;">
                    <div class='box-header'>
                        <h3 class='box-title'>
                            评论
                            <small></small>
                        </h3>
                        <div class="pull-right box-tools">

                            <!-- tools box --> </div>
                        <!-- /.box-header -->
                        <div class='box-body pad' >
                            <form action="" method="post" >
                                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <div class="footer" style="margin-top:10px;">
                                    <button type="submit" class="btn btn-success">提交</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- row --> </div>
    <!-- container -->
    <!-- <div class="col-md-4 column">这里是啥来着。。忘了</div>
-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function() {
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();

                    $(".js-more-discussion").click( function(){  
                        alert("1111111");
                    }); 


            });



        </script>
</body>
</html>