<?php
    /*  链接数据库  */
    header("Content-Type:text/html; charset=utf-8");
    $link=mysql_connect("localhost","root","zxc7928932")or die("数据库服务器连接错误".mysql_error());
    mysql_select_db("guestinfo",$link) or die("数据库访问错误".mysql_error());    //选择数据库
    mysql_query("set names utf-8");                                      //选择字符集标准格式
    mysql_query("SET FOREIGN_KEY_CHECKS = 0");
    $sql=mysql_query("delete from comment where comment_id=$id");                  //删除书本信息
    if($sql){//删除成功跳转
        echo "<script>alert('信息删除成功！');history.back();window.location.href=document.referrer;</script>";
    }
    else{//删除失败跳转
        echo "<script>alert('信息删除失败！');history.back();window.location.href=document.referrer;</script>";
    }
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    