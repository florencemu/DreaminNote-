<?php

date_default_timezone_set('Asia/Shanghai');

include 'smtp.func.php';

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

echo "<script>alert('发送成功');location.href='index.php'</script>";

}else {

echo "<script>alert('发送失败');location.href='index.php'</script>";

}

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Dremin-note-期刊发送</title>

<style type="text/css">

body {background: #fcfcfc; font-family: '微软雅黑'} * {margin: 0;padding: 0;}

input,textarea {font-family: '微软雅黑'}

#main {width: 800px; overflow: hidden; text-align: center; border: 1px solid #ccc; background: #fff; margin: 50px auto;}

#main h3 {color: #ff0000; margin: 10px;}

.tab,tr,td {border-collapse:collapse; border: 1px solid #ff0000; margin: 10px auto}

.tab td {padding: 5px;}

.inp {width: 300px; height: 30px; font-size: 16px; padding:0 5px;}

.tab textarea {width: 300px; height: 100px;font-size: 16px; padding:0 5px;}

.sub {padding: 8px 20px; font-size: 16px;}

</style>

</head>

<body>

<div id="main">
❤
<h3>Dremin-note-期刊发送</h3>

<form action="index.php?do=action" method="post">

<table>

<tr>

<td>收件人</td>

<td><input type="text" name="mailuser"></td>

</tr>

<tr>

<td>邮件标题</td>

<td><input type="text" name="mailtitle"></td>

</tr>

<tr>

<td>邮件内容</td>

<td><textarea name="mailcontent"></textarea></td>

</tr>

<tr>

<td colspan="2"><input type="submit"></td>

</tr>

</table>

</form>

</div>

</body>

</html>