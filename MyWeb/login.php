
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>注册界面</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {font-weight: bold; font-size: 12px;}
-->
</style>
</head>
<body>
<form name="form8" method="post" action="login1.php">
  <table width="1003" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="168" height="169" background="images/index_01.gif">&nbsp;</td>
      <td width="685" background="images/index_02.gif">&nbsp;</td>
      <td width="150" background="images/index_03.gif">&nbsp;</td>
    </tr>
    <tr>
      <td width="168" height="311" background="images/index_04.gif">&nbsp;</td>
      <td background="images/index_05.jpg"><table width="675" height="169"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="43" align="center" valign="baseline">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="baseline">&nbsp;</td>
        </tr>
        <tr>
          <td width="382" height="24" align="center" valign="baseline">&nbsp;</td>
          <td width="207" height="24" valign="middle"><span class="style2">用户名</span><span class="STYLE1">
            <input  name="txt_user" id="txt_user" style="height:20px " size="10" >
              </span></td>
          <td width="86" height="24" align="center" valign="baseline">&nbsp;</td>
        </tr>
        <tr>
          <td height="24" align="center" valign="baseline">&nbsp;</td>
          <td height="24" valign="middle"><span class="style2">密码</span><span class="STYLE1">
          <input  name="txt_pwd" type="password" id="txt_pwd" onClick="return check5(form8);"style="FONT-SIZE: 9pt; height:20px" size="10" >
          </span></td>
          <td height="24" align="center" valign="baseline">&nbsp;</td>
        </tr>
        <tr>
          <td height="24" align="center" valign="baseline">&nbsp;</td>
          <td height="24" valign="middle"><span class="style2">验证码</span><span class="STYLE1">
          <input name="checks" size="6" onClick="return check6(form8);" style="height:20px "  >
          <img src="checks.php" width="70" height="18" border="0" align="bottom"></span>&nbsp;&nbsp;</td>
          <td height="24" align="center" valign="baseline">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" align="center" valign="baseline">&nbsp;</td>
          <td align="center" valign="baseline">&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit" name="Submit" value="登录" onClick="return check7(form8);"></td>
          <td align="center" valign="baseline">&nbsp;</td>
        </tr>
      </table></td>
      <td background="images/index_06.gif">&nbsp;</td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

<script language="javascript">												//检测各信息是否正确
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