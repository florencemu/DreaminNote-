
<?php
header('Content-Type:text/html;charset=utf8');
include('conn.php');
include 'smtp.func.php';

//获取信息
$sql = "SELECT * From mail";
mysqli_query($conn,'set names utf8');
$result = mysqli_query($conn,$sql) or die ('error'.mysql_error().'产生的问题的sql<br/>'.$sql);

if($result){
	$row=mysqli_num_rows($result);
//
	$mail=array();
		for($i=0;$i<$row;$i++)
			$mail[$i]= mysqli_fetch_row($result)[0];
	$address=implode(',', $mail);
}

//获取状态
// $name=file_get_contents('php://input', 'name');
// $sql = "SELECT state From customer WHERE name=$name";
// $result = mysqli_query($conn,$sql) or die ('error'.mysql_error().'产生的问题的sql<br/>'.$sql);
// if($result){
	
// }




//期刊推送

$sql = "SELECT name,photo_info,phone,info,state From customer";
$result = mysqli_query($conn,$sql) or die ('error'.mysql_error().'产生的问题的sql<br/>'.$sql);


if(isset($_GET['do']) && $_GET['do']=='action') {

$mailto='';  //收件人

$subject="";  //邮件主题

$body="";   //邮件内容

if($_POST['mailuser']=='') {

echo "<script>alert('请输入收件人邮箱帐号');</script>";

}else {

$mailto = $_POST['mailuser'];

}

if($_POST['mailtitle']=='') {

echo "<script>alert('请输入邮件标题');</script>";

}else {

$subject = $_POST['mailtitle'];

}

if($_POST['mailcontent']=='') {

echo "<script>alert('请输入邮件内容');</script>";

}else {

$body = $_POST['mailcontent']."<br>".date("Y年m月d日 H时i分s秒");

}

$mes = sendmailto($mailto,$subject,$body, false);

if($mes) {

echo "<script>alert('推送成功');location.href='admin.php'</script>";

}else {

echo "<script>alert('推送失败');location.href='admin.php'</script>";

}

}

?>



<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

<title>Dremin-note-后台管理</title>

<style type="text/css">

body {background-image: url(bg.jpg); font-family: '微软雅黑'} * {margin: 0;padding: 0;}

input,textarea {font-family: '微软雅黑';color:	#FF6A6A;}

#main {width: 800px; overflow: hidden; text-align: center; border: 1px solid #ccc; background: #fff; margin: 50px auto;opacity: 0.9;}

#name {color: 	#FF6A6A; margin: 10px}
#name1 {color: #FF6A6A; margin: 10px;}
#name2 {color: #FF6A6A; margin: 10px;}


#table1,tr,td {border-collapse:collapse; border: 1px solid 	#FF8C69; margin: 10px auto}
#table1 td {width:720px;padding: 5px;}



#table2,tr,td {border-collapse:collapse; border: 1px solid #FF8C69;color: #FF6A6A; margin: 10px auto}
#table2 td {padding: 5px;}
#table2 textarea {width: 720px; height: 100px;font-size: 16px; padding:0 5px;}

.inp {width: 300px; height: 30px; font-size: 16px; padding:0 5px;}


.sub {padding: 8px 20px; font-size: 16px;}
</style>

</head>

<body>

	<div id="main">
	<div id='name'>
	❤
	<h3>Dremin-note-后台管理</h3>
	</div>
<input type="submit" value="注销" onclick="out()">
	<div id='name1'>
	❤
	<h4>预约信息</h4>
	</div>
	<form action="index.php?do=action" method="post">

	<div id="table1">
	<table>


	<tr>
	<td>姓名</td>
	<td>套餐内容</td>
	<td>联系方式</td>
	<td>预定详情</td>
	<td>状态</td>
	<td>操作</td>
	</tr>
<?php
if($num=mysqli_num_rows($result))
{
	while($row=mysqli_fetch_assoc($result))
		{  
?>
	<tr>
	<td><h4><?php echo $row['name']; ?></h4></td>
	<td><h4><?php echo $row['photo_info']; ?></h4></td>
	<td><h4><?php echo $row['phone']; ?></h4></td>
	<td><h4><?php echo $row['info']; ?></h4></td>
	<td><input type="button" value="定金">
	<input type="button" value="拍摄">
	<input type="button" value="出片"></td>
	<td><input type="button" value="修改">
	<input type="button" value="删除"></td>
	</tr>

<?php
		}
} 
mysqli_close($conn);
?>
	
	</table>
	</div>

	</form>


	<div id='name2'>
	❤
	<h4>期刊推送</h4>
	</div>
	<form action="admin.php?do=action" method="post">
	<div id="table2">
	<table>

	<tr>

	<td>收件人</td>

	<td><input type="text" name="mailuser" value="<?php echo $address; ?>" style="width:730px;"></td>

	</tr>

	<tr>

	<td>推送主题</td>

	<td><input type="text" name="mailtitle" style="width:730px;"></td>

	</tr>

	<tr>

	<td>推送内容</td>

	<td><textarea name="mailcontent"></textarea></td>

	</tr>

	<tr>

	<td colspan="2"><input type="submit" value="推送"></td>

	</tr>

	</table>
	</div>

	</form>


	</div>



<script type='text/javascript'>
function out(){

	window.location = "admin_login.php"; 
}

</script>
	



</body>

</html>
