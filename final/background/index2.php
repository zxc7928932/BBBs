<?php 
	session_start();
	if($_SESSION['member']==""){
	echo "<script>alert('请先登录！');history.back();window.location.href=main.php;</script>";
}
?>
<html>
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>

		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top"><table width="202" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php include("menu.php");?></td>
          </tr>
        </table></td>
		<td height="34" background="images/image_04.gif" style="background-repeat :no-repeat">

			<a href="logout.php" style="margin-left:280px;">退出登录</a>
			
		</td>
		
	</tr>
	<tr>

		<td height="38" background="images/image_06.gif">&nbsp;			</td>
	</tr>
	
		
		<tr>
		<td height="70" valign="top">
		  <table width="626" border="0" cellpadding="0" cellspacing="0" >
			
              <tr>
                <td height="237" align="center" valign="top" background="images/image_08.gif">
       <table style="height:360px;" width="600" height="237"  border="0" cellpadding="0" cellspacing="0">
       	<form action="change.php" method="post" enctype="multipart/form-data">
                 <tr>
          <tr>
		    <td style="text-align:center;"><h3 style="color:red;">首页轮播器图片修改(gif,jpg,png)</h3></td>
		   </tr>
		  <tr>
		    <td><p style="margin-left:150px;">图片1：</p><input type="file"  name="filename1" style="margin:10px 0px 10px 150px;"> 
		    </td>
		  </tr>
		  <tr>
		    <td><p style="margin-left:150px;">图片2：</p><input type="file"  name="filename2" style="margin:10px 0px 10px 150px;"></td>
		  </tr>
		  <tr>
		    <td><p style="margin-left:150px;">图片3：</p><input type="file"  name="filename3" style="margin:0px 0px 20px 150px;"></td>
		  </tr>
		</tr>
		<tr>
		  <td colspan="2" >
                 
		  <input type="submit" value="提交" style="margin-left:190px;"/>
                  
		  <input type="reset" value="重置" style="margin-left:50px;"/>
		  </td >
		</tr>
              
                  </form>
                </table></td>
              </tr>
            </table>			</td>
	</tr>
	<tr>
		<td bgcolor="#F0F0F0"></td>
		<td height="43" background="images/image_12.gif"></td>
	</tr>
</table>
</body>
</html>