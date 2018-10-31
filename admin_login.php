<?php

include('conn.php');

if(isset($_GET['do']) && $_GET['do']=='action') {

$admin='';  
$pwd="";  

if($_POST['admin']=='') {

echo "<script>alert('请输入管理员帐号');</script>";

}else {

$admin = $_POST['admin'];

}

if($_POST['pwd']=='') {

echo "<script>alert('请输入密码');</script>";

}else {

$pwd = $_POST['pwd'];

}


$sql="select * from admin where id='$admin' and pwd='$pwd'";
	$result=mysqli_query($conn,$sql);

	if($result){
	$rows=mysqli_num_rows($result);
	if($rows){
		echo"<script type='text/javascript'>"; 
		echo "alert('登录成功');window.location.href='admin.php'";
		echo "</script>";
	}
	else
	{
		echo"<script type='text/javascript'>"; 
		echo"alert('登录失败，请检查用户名和密码！')";
		echo "</script>";
	}
}

}




?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Dremin-note-管理登录</title>

<style type="text/css">

body {background-image: url(bg.jpg); font-family: '微软雅黑'} * {margin: 0;padding: 0;}

input,textarea {font-family: '微软雅黑';color:	#FF6A6A;}

#main {width: 400px; height: 300px; overflow: hidden; text-align: center; border: 1px solid #ccc; margin: 200px auto; background:#FFFFFF; opacity: 0.9;}

#name {color: #FF6A6A; margin: 30px}
#name1 {color: #FF6A6A; margin: 30px;}



#table1,tr,td {border-collapse:collapse; border: 1px solid 	#FF8C69; color: #FF6A6A; margin: 60px }
#table1 td {width:220px;padding: 5px; }




</style>

</head>

<body>

<div id="main">
	<div id='name'>
	<h3>Dremin-note-管理登录</h3>
	</div>


<form action="admin_login.php?do=action" method="post">
	<div id="table1">
	<table>
	<tr>
	<td>Admin-Id</td>
	<td><input type="text" name="admin" ></td>
	</tr>
	<tr>
	<td>Pass-Word</td>
	<td><input type="Password" name="pwd"></td>
	</tr>
	
	</table>
	</div>
		<input type="submit" value="Login">
</form>

</div>	
</body>
</html>