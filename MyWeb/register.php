<!doctype html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
  <title>�����д���ĸ�����Ϣ���ע���</title>  
  <meta name="Author" content="Soleil-kk">
  <meta name="Keywords" content="book.fun">
  <meta name="Description" content="��Ȥ�鼮��̳">
  <title>Document</title>
 </head>
<h1 color="green" align="center">Enroll book.fun</h1>
 <body>
   <table width="500" align="center">
     <tr>
	 <td>
     <form  name="form1" action="register1.php" method="post">
	 <fieldset>
	 <legend>��ӭע��</legend>
	  <table border="0" cellpadding="10"  cellspacing="0" width="400" align="center" >
        <colgroup align="right"></colgroup>
        <tr>
		  <td width="200">�û�����</td>
		  <td width="100"><input type="text" name="username"></td>
		</tr>
        <tr>
		  <td>����(16λ����)��</td>
		  <td><input type="password" name="password1" maxlength="16"  onClick="return check1(form1);" ></td>
		</tr>
		<tr>
		  <td>ȷ������sb��</td>
		  <td><input type="password" name="password2" maxlength="16" onClick="return check2(form1);" ></td>
		</tr>
        <tr>
		  <td>���䣺</td>
		  <td><input type="text" name="age" maxlength="3" size="2" onClick="return check3(form1);"></td>
        </tr>
		<tr>
		  <td>�Ա�</td>
		  <td>
		      <input type="radio" name="sex" value="man" checked="checked" id="man" onClick="return check4(form1);">
			  <label for="man">��</label>
     
              &nbsp
		  	  
		      <input type="radio" name="sex" value="woman" id="woman" onClick="return check4(form1);" >
              <label for="woman">Ů</label>
		  </td>
		</tr>
		<tr>
		    <td>��Ƭ�ϴ�:</td>
		    <td>
		    <input type="file" name="pic"/ >
			</td>
		</tr>
		<tr>
		  <td colspan="2">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="submit" value="�ύ" onClick="return check(form1);"/>
                  &nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="reset" value="����"/>
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
		alert("�������û���!");form.username.focus();return false;
	}
	if(form.password1.value==""){
		alert("����������!");form.password1.focus();return false;
	}
	if(form.password2.value==""){
		alert("���ٴ���������!");form.password2.focus();return false;
	}
	if(form.age.value==""){
		alert("����������!");form.age.focus();return false;
	}
	if(form.sex.value==""){
		alert("��ѡ���Ա�!");form.sex.focus();return false;
	}
	if(form.pic.value==""){
		alert("��ѡ���ļ�!");form.pic.focus();return false;
	}
	if(form.password1.value!=form.password2.value){
		alert("�����������벻ͬ!");form.password2.focus();return false;
		}
	if(form.password1.value.length>20){
		alert("�������!");form.password1.focus();return false;
	}
	if(form.password1.value.length<5){
		alert("�������!");form.password1.focus();return false;
	}
	if(form.username.value.length>15){
		alert("�û�������!");form.username.focus();return false;
	}
	if(form.username.value.length<5){
		alert("�û�������!");form.username.focus();return false;
	}
	if(isNaN(form.age.value)){
		alert("��������������!");form.age.focus();return false;
	}
	if(form.age.value<1&&form.age.value>100){
		alert("��������ȷ����!");form.age.focus();return false;
	}
	if(escape(form.username.value).indexOf("%u")>=0){   
		alert("�û������������룬����ȫӢ��");  
		} 
	if(escape(form.password1.value).indexOf("%u")>=0){   
		alert("������������룬����ȫӢ��");  
		} 
form.submit();
}
function check1(form){
	if(escape(form.username.value).indexOf("%u")>=0){   
		alert("�û������������룬����ȫӢ��");  
		}  
	if(form.username.value==""){
		alert("�������û���!");form.username.focus();return false;
	}
	
	if(form.username.value.length>15){
		alert("�û�������!");form.username.focus();return false;
	}
	if(form.username.value.length<5){
		alert("�û�������!");form.username.focus();return false;
	}

}
function check2(form){
	if(form.password1.value==""){
		alert("����������!");form.password1.focus();return false;
	}
	if(escape(form.password1.value).indexOf("%u")>=0){   
		alert("������������룬����ȫӢ��");  
		} 
	if(form.password1.value.length>20){
		alert("�������!");form.password1.focus();return false;
	}
	if(form.password1.value.length<5){
		alert("�������!");form.password1.focus();return false;
	}
}
function check3(form){
	if(form.password1.value!=form.password2.value){
		alert("�����������벻ͬ!");form.password2.focus();return false;
		}

}
function check4(form){
	if(form.age.value==""){
		alert("����������!");form.age.focus();return false;
	}
	if(isNaN(form.age.value)){
		alert("��������������!");form.age.focus();return false;
	}
	if(form.age.value<1&&form.age.value>100){
		alert("��������ȷ����!");form.age.focus();return false;
	}

}

</script>


