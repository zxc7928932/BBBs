
<html>
<head>
    <title>��ҳ-book.fun</title>
    <meta name="Author" content="Soleil-kk">
    <meta name="Keywords" content="book.fun">
    <meta name="Description" content="��Ȥ�鼮��̳">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script language="javascript"  src="bootstrap.js"></script>
    
    <style type="text/css">

    body,ul,p,h1,h2,form,select,input{
        margin:0;
        padding:0;
    }
    img{
        border:none;
    }
    li{
        list-style: none;
    }
    body{
        background: #fff url(bg.png); 
        background-repeat:repeat-x;
    }

    label{
       font-size: 18px;
    }

    .form-group{
       width: 30%;
       margin-left: 100px;
    }

    h1{
       margin:50px 0px 30px 180px;
       font-size:200%;
       font-weight: bold;
       color: #1874CD;
    }

    #btn1{
      width:10%;
      margin-top: 30px;
      margin-left: 130px;
    }

    #btn2{
      width:10%;
      margin-left: 60px;
      margin-top: 30px;
    }



    </style>

</head>

<?php
	session_start();
	$curuser = $_SESSION['number'];
	$curuser = 9;
	$link1 = mysql_connect("localhost","root","zxc7928932")or die("���ݿ���������Ӵ���".mysql_error());
	mysql_select_db("guestinfo",$link1) or die("���ݿ���ʴ���".mysql_error());  	
	mysql_query("set names gb2312");	
	$cmd = "select * from register where uid=$curuser";
	$row = mysql_query($cmd);
	$record = mysql_fetch_row($row);
	$nickname_tmp = $record[1];
	$sex_tmp = $record[4];
	$age_tmp = $record[3];
	$signature_tmp = $record[6];
?>

<body>
	<script type="text/javascript">
	
		var check = function()
		{
			var err = "";
			if(document.getElementById('nickname').value.length == 0)
			{
				err += "�ǳƲ���Ϊ��\n";
			}
			
			if(document.getElementById('age').value.length == 0)
			{
				err += "���䲻��Ϊ��\n";
			}
		
			if (document.getElementById('age').value.search( /^\d+$/)<0)
			{
				err += "���䲻������\n";
			}
			
			if(document.getElementById('signature').value.length == 0)
			{
				err += "����ǩ������Ϊ��\n";
			}
		
			if(!(err == ""))
			{
				alert(err);
				return false;
			}
		}
	</script>

   <nav class="navbar navbar-default" role="navigation">

      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
         
          </button>
            <a class="navbar-brand" href="home.html" style="font-size:25px;font-weight:bold;color:#AAAAAA;">Book.fun</a> 
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

           <ul class="nav navbar-nav">
              <li class="active" > <a href="home.html">��ҳ</a> </li>
              <li> <a href="#">�鼮</a> </li>
           </ul>

           <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
              <input type="text" class="form-control" style="width:350px;" placeholder="������������ҵ��鼮...."/>
              </div>
              <button type="submit" class="btn btn-default" style="float:right;margin:0,20px;">����</button>
           </form>

           <ul class="nav navbar-nav navbar-right">

             <li> <a href="#">��������</a> </li>

             
           </ul>
     </div>
   </nav>

     <div>
       
        <h1 >��ӭ������������</h1>
     </div>

  <div id="content">
      
         
        <form role="form" enctype="multipart/form-data"  action="person_data1.php" method="post" onsubmit="return check(this);">

              <div class="form-group">
              <label for="nickname">�ǳƣ�</label>
              <input type="text" class="form-control" id="nickname" name="nickname" placeholder="���Լ�ȡ�����������ְ�~" value="<?php echo $nickname_tmp?>" >
              </div>

              <div class="form-group" style="width:5%">
              <label for="sex">�Ա�</label>
              <select class="form-control" id="sex" name="sex" >
              <option value="��">��</option>
              <option value="Ů">Ů</option>
              </select>
              </div>

              <div class="form-group" >
              <label for="age">���䣺</label>
              <input type="text" class="form-control" id="age" name="age" placeholder="���������~" value="<?php echo $age_tmp?>">
              </div>

              <div class="form-group" >
              <label for="signature">����ǩ����</label>
              <input type="text" class="form-control" id="signature" name="signature" placeholder="��һ�仰�������Լ���~" value="<?php echo $signature_tmp?>">
              </div>

              <div class="form-group">
              <label for="avatar">ͷ���ϴ���</label>
              <input type="file" id="filename" name="filename">
              <p class="help-block">����ô��һ�����ݰ�</p>
              </div>

  
             <button type="submit" class="btn btn-primary  " id="btn1">�ύ</button>
             <button type="reset" class="btn btn-default  " id="btn2">����</button>
        </form>
    
    

</body>
</html>