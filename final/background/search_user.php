<?php 
  session_start();
  if($_SESSION['member']==""){
  echo "<script>alert('请先登录！');history.back();window.location.href=main.php;</script>";
}
?>
<html>
<head>
<title>信息管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<script language="javascript">
function check(form){
	if(form.txt_keyword.value==""){
		alert("请输入查询关键字!");form.txt_keyword.focus();return false;
	}
form.submit();
}
</script>
<table width="828" height="522" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td background="images/image_01.gif">&nbsp;			</td>
		<td height="140" background="images/image_02.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td width="202" rowspan="3" valign="top" bgcolor="#F0F0F0"><table width="202" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?php include("menu.php");?></td>
          </tr>
      </table></td>
		<td height="34" background="images/image_04.gif"style="background-repeat :no-repeat">

      <a href="logout.php" style="margin-left:280px;">退出登录</a>		</td>
	</tr>
	<tr>
		<td height="38" background="images/image_06.gif">&nbsp;			</td>
	</tr>
	<tr>
		<td height="270" valign="top">
			<table width="626" height="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="257" align="center" valign="top" background="images/image_08.gif"><table width="600" height="271"  border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" align="center" valign="top" class="word_orange"><strong>查询用户信息</strong></td>
                  </tr>
                  <tr>
                    <td height="249" align="center" valign="top"><table width="400" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30" align="center"><form name="form1" method="post" action="">
                          查询关键字&nbsp;                          
                          <input name="txt_keyword" type="text" id="txt_keyword" size="40">
&nbsp;                              
<input type="submit" name="Submit" value="搜索" onClick="return check(form)">
                                                                        </form></td>
                      </tr>
                    </table>
                      <table width="550" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#999999">
                      <tr align="center" bgcolor="#f0f0f0">
                        <td width="221">用户名</td>
                        <td width="329">用户签名</td>
                        <td width="47">详情</td>
                      </tr>
					 <?php

          $conn=mysql_connect("localhost","syslab","syslab") or die("数据库服务器连接错误".mysql_error());
          mysql_select_db("test",$conn) or die("数据库访问错误".mysql_error());
          mysql_query("set names utf8");
          $keyword=$_POST['txt_keyword'];
          /*  当前页提交的搜索 $page初始化为1  */      
          if($_POST[Submit]!=""){
            $page=1;
          }
          $user_name=trim($keyword);
          $name_arr = explode(" ",$user_name); //用空格分解搜索内容
          $num = count($name_arr);  //得到分解得到的信息条数
           for($i=0; $i<$num; $i++)
            {
                if(strlen($name_arr[$i]))
                {
                  $cnt ++;
                  if($cnt == 1)
                      $info .= "where Username like '%$name_arr[$i]%' ";
                  else
                      $info .= "or Username like '%$name_arr[$i]%'";
                }
             }
             if($cnt == 0){
               echo"请输入用户名";
          }
          /*  $page为当前页，如果$page为空，则初始化为1  */
          if ($page==""){
            $page=1;}
             if (is_numeric($page)){
            $page_size=4;                     //每页显示4条记录
            $sql=mysql_query("select * from register  $info");
            $message_count=mysql_num_rows($sql);  
            $page_count=ceil($message_count/$page_size);      //根据记录总数除以每页显示的记录数求出所分的页数
            $offset=($page-1)*$page_size;           //计算下一页从第几条数据开始循环  
            $sql=mysql_query("select * from register $info limit $offset,$page_size");
            $row=mysql_fetch_object($sql);
            if(!$row){
              echo "<font color='red'>暂无书籍信息!</font>";
            }
            do{
            ?>
                      <tr bgcolor="#FFFFFF">
                        <td><?php echo $row->username ;?></td>
                        <td><?php echo $row->signature ;?></td>
                       <td align="center"><a href="check_info.php?id=<?php echo $row->uid;?>"><img src="images/update.gif" width="22" height="22" border="0"></a></td>     
                      </tr>
					<?php
						}while($row=mysql_fetch_object($sql));
					}
					?>
                     </table>
                      <br>
                      <table width="550" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <!--  翻页条 -->
							<td width="37%">&nbsp;&nbsp;页次：<?php echo $page;?>/<?php echo $page_count;?>页&nbsp;记录：<?php echo $message_count;?> 条&nbsp; </td>
							<td width="63%" align="right">
							<?php
							/*  如果当前页不是首页  */
							if($page!=1){
							/*  显示“首页”超链接  */
							echo  "<a href=search_user.php?page=1>首页</a>&nbsp;";
							/*  显示“上一页”超链接  */
							echo "<a href=search_user.php?page=".($page-1).">上一页</a>&nbsp;";
							}
							/*  如果当前页不是尾页  */
							if($page<$page_count){
							/*  显示“下一页”超链接  */
							echo "<a href=search_user.php?page=".($page+1).">下一页</a>&nbsp;";
							/*  显示“尾页”超链接  */
							echo  "<a href=search_user.php?page=".$page_count.">尾页</a>";
							}
							mysql_free_result($sql);
							mysql_close($conn);
							?>
                    </table></td>
                  </tr>
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