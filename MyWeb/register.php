<!doctype html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
  <title>快快填写您的个人信息完成注册吧</title>  
  <meta name="Author" content="Soleil-kk">
  <meta name="Keywords" content="book.fun">
  <meta name="Description" content="兴趣书籍论坛">
  <title>Document</title>
 </head>
<h1 color="green" align="center">Enroll book.fun</h1>
 <body>
   <table width="500" align="center">
     <tr>
	 <td>
     <form  name="form1" action="register1.php" method="post">
	 <fieldset>
	 <legend>欢迎注册</legend>
	  <table border="0" cellpadding="10"  cellspacing="0" width="400" align="center" >
        <colgroup align="right"></colgroup>
        <tr>
		  <td width="200">用户名：</td>
		  <td width="100"><input type="text" name="username"></td>
		</tr>
        <tr>
		  <td>密码(16位以内)：</td>
		  <td><input type="password" name="password1" maxlength="16"  onClick="return check1(form1);" ></td>
		</tr>
		<tr>
		  <td>确认密码sb：</td>
		  <td><input type="password" name="password2" maxlength="16" onClick="return check2(form1);" ></td>
		</tr>
        <tr>
		  <td>年龄：</td>
		  <td><input type="text" name="age" maxlength="3" size="2" onClick="return check3(form1);"></td>
        </tr>
		<tr>
		  <td>性别：</td>
		  <td>
		      <input type="radio" name="sex" value="man" checked="checked" id="man" onClick="return check4(form1);">
			  <label for="man">男</label>
     
              &nbsp
		  	  
		      <input type="radio" name="sex" value="woman" id="woman" onClick="return check4(form1);" >
              <label for="woman">女</label>
		  </td>
		</tr>
		<tr>
		    <td>照片上传:</td>
		    <td>
		    <input type="file" name="pic"/ >
			</td>
		</tr>
		<tr>
		  <td colspan="2">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="submit" value="提交" onClick="return check(form1);"/>
                  &nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="reset" value="重置"/>
		  </td >
		</tr>



     </table>
	
     </form>
    </fieldset>
	</td>
	</tr>
   </table>
 </body>
</html>
<script language="javascript">
function check(form){
	if(form.username.value==""){
		alert("请输入用户名!");form.username.focus();return false;
	}
	if(form.password1.value==""){
		alert("请输入密码!");form.password1.focus();return false;
	}
	if(form.password2.value==""){
		alert("请再次输入密码!");form.password2.focus();return false;
	}
	if(form.age.value==""){
		alert("请输入年龄!");form.age.focus();return false;
	}
	if(form.sex.value==""){
		alert("请选择性别!");form.sex.focus();return false;
	}
	if(form.pic.value==""){
		alert("请选择文件!");form.pic.focus();return false;
	}
	if(form.password1.value!=form.password2.value){
		alert("两次输入密码不同!");form.password2.focus();return false;
		}
	if(form.password1.value.length>20){
		alert("密码过长!");form.password1.focus();return false;
	}
	if(form.password1.value.length<5){
		alert("密码过短!");form.password1.focus();return false;
	}
	if(form.username.value.length>15){
		alert("用户名过长!");form.username.focus();return false;
	}
	if(form.username.value.length<5){
		alert("用户名过短!");form.username.focus();return false;
	}
	if(isNaN(form.age.value)){
		alert("请输入数字年龄!");form.age.focus();return false;
	}
	if(form.age.value<1&&form.age.value>100){
		alert("请输入正确年龄!");form.age.focus();return false;
	}
	if(escape(form.username.value).indexOf("%u")>=0){   
		alert("用户名包含中文请，输入全英文");  
		} 
	if(escape(form.password1.value).indexOf("%u")>=0){   
		alert("密码包含中文请，输入全英文");  
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

}
function check4(form){
	if(form.age.value==""){
		alert("请输入年龄!");form.age.focus();return false;
	}
	if(isNaN(form.age.value)){
		alert("请输入数字年龄!");form.age.focus();return false;
	}
	if(form.age.value<1&&form.age.value>100){
		alert("请输入正确年龄!");form.age.focus();return false;
	}

}

</script>


