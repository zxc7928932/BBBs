﻿=<html>
<head>
    <meta charset="gb2312">
    <title>欢迎来到book.fun</title>
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="兴趣书籍论坛">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="css/master.css" rel="stylesheet">

    
    <style type="text/css">
        
        body { 
            background-image: url(img/bg_x1.png); 

            width:1349px;               
            height: 500px;
            background-repeat: repeat-x;
        } 
       img{
            margin-top:50px;
            margin-left: 150px; 
            width:180px;
            height: 180px;
        }
        #title{
            background-image: url(img/141391119970924.gif);
            margin-left:50px;
            margin-top:50px;
            
            width:960px;
            height:190px;
        }
        #ddd{
            display: inline;
        }
        
        
    </style>

    


</head>

<body >
  
<div id="title">
    
</div>

<div id="login-box" class="box box-primary login-sginup-box" style="position:fixed; right:35%; top:150px; visibility:hidden;border:2px solid #AEEEEE;" >
                                <div class="box-header">
                                    <h3 class="box-title" style="font-weight:bold;font-size:25px;">欢迎登录</h3>
                                     <div class="pull-right box-tools">
                                        <button id="close" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" name="form8" method="post" action="./action/login.php" >
    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">用户名</label>
                                            <input type="text" name="txt_user" class="form-control" id="exampleInputEmail1" placeholder="Enter email" >
                                            <!-- <p class="err-p">出错信息<p> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">密码</label>
                                            <input type="password" name="txt_pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" onClick="return check5(form8);">
                                        </div>


                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" name="Submit" value="登录" onClick="return check7(form8);"class="btn btn-primary btn-lg btn-block">登录</button>
                                    </div>

                                </form>
                            </div>


<div id="signup-box" class="box box-primary login-sginup-box" style="position:fixed; right:35%; top:150px; visibility:hidden;border:2px solid #AEEEEE;" >
                                <div class="box-header">
                                    <h3 class="box-title" style="font-weight:bold;font-size:25px;">欢迎注册</h3>
                                    <div class="pull-right box-tools">
                                        <button id="close" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" name="form1" action="./action/register.php" method="post">
    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">用户名</label>
                                            <input type="text" name="username"  name="password1"  class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                            <!-- <p class="err-p">出错信息<p> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">密码</label>
                                            <input type="password" name="password1" onClick="return check1(form1);"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">确认密码</label>
                                            <input type="password" name="password2" onClick="return check2(form1);" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                        </div>

                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" value="提交" onClick="return check3(form1);" class="btn btn-primary btn-lg btn-block">提交</button>
                                    </div>
                                </form>
                            </div>




<img src="img/141391232975391.gif" style="margin-left:100px;width:960;height:64px;">

<div sytle="position: relative; ">


    <img src="img/s27401345.jpg"  class="img-circle" style="margin-left:255px;">
    <img src="img/s27401489.jpg"  class="img-circle" >
    <img src="img/s27356225.jpg"  class="img-circle" >
    <button id="login" type="button" class="btn btn-primary btn-lg" style="margin-left:20px;margin-top:200px;">登录</button>
    <button id="signup"  type="button" class="btn btn-danger btn-lg" style="margin-left:10px;margin-top:200px;">注册</button>

    
</div>



<p>

</p>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
            $(function() {
                $("#login").click( function(){  
                $('#login-box').css('visibility','visible');
                $('#signup-box').css('visibility','hidden');
            });
                $("#signup").click( function(){  
                $('#login-box').css('visibility','hidden');
                $('#signup-box').css('visibility','visible');
            });
             $(".btn-sm").click( function(){  
                $('#login-box').css('visibility','hidden');
                $('#signup-box').css('visibility','hidden');
            });

    });
</script>

</body>
    
</html>

<script language="javascript">                                              //检测各信息是否正确
/*检测各值是否为空*/
function check5(form){                                                      
    if(form.txt_user.value==""){
        alert("请输入用户名!");form.txt_user.focus();return false;
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
function check1(form){
    if(escape(form.username.value).indexOf("%u")>=0){   
        alert("用户名包含中文请，输入全英文");  
        }  
    if(form.username.value==""){
        alert("请输入用户名!");form.username.focus();return false;
    }
    
    if(form.username.value.length>15){
        alert("用户名过长!");form.username.focus();return false;
    }
    if(form.username.value.length<5){
        alert("用户名过短!");form.username.focus();return false;
    }

}
function check2(form){
    if(form.password1.value==""){
        alert("请输入密码!");form.password1.focus();return false;
    }
    if(escape(form.password1.value).indexOf("%u")>=0){   
        alert("密码包含中文请，输入全英文");  
        } 
    if(form.password1.value.length>20){
        alert("密码过长!");form.password1.focus();return false;
    }
    if(form.password1.value.length<5){
        alert("密码过短!");form.password1.focus();return false;
    }
}
function check3(form){
    if(form.password1.value!=form.password2.value){
        alert("两次输入密码不同!");form.password2.focus();return false;
        }
     if(form.password1.value==""){
        alert("请输入密码!");form.password1.focus();return false;
    }
    if(escape(form.password1.value).indexOf("%u")>=0){   
        alert("密码包含中文请，输入全英文");  
        } 
    if(form.password1.value.length>20){
        alert("密码过长!");form.password1.focus();return false;
    }
    if(form.password1.value.length<5){
        alert("密码过短!");form.password1.focus();return false;
    }
    if(escape(form.username.value).indexOf("%u")>=0){   
        alert("用户名包含中文请，输入全英文");  
        }  
    if(form.username.value==""){
        alert("请输入用户名!");form.username.focus();return false;
    }
    
    if(form.username.value.length>15){
        alert("用户名过长!");form.username.focus();return false;
    }
    if(form.username.value.length<5){
        alert("用户名过短!");form.username.focus();return false;
    }
}
</script>