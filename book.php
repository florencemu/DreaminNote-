<?php
header('Content-Type:text/html;charset=utf8');
include('conn.php');
include 'smtp.func.php';

//提交预定
$from = $_SERVER['HTTP_REFERER'];

if ($from == "http://localhost/dreaminnote/book.html")
	$type = "数码单人";
else if ($from == "http://localhost/dreaminnote/book_double.html")
	$type = "数码双人";
else if ($from == "http://localhost/dreaminnote/book_film.html")
	$type = "胶片单人";
else if ($from == "http://localhost/dreaminnote/book_create.html")
	$type = "创作";

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$mail = $_POST['mail'];
$time = $_POST['time'];
$ps = $_POST['ps'];



$infomation = $time." ".$address." ".$ps."。";

$sql = "INSERT INTO `customer` (`name`, `phone`, `mail`, `info`, `photo_info`, `state`) VALUES ('$name', '$phone', '$mail', '$infomation', '$type','0');";
$sql1=" SELECT mail_address FROM mail WHERE mail_address = '$mail'";
mysqli_query($conn,'set names utf8');
$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
$num=mysqli_num_rows($result1);
if(!$num){
$sql2 = "INSERT INTO `mail` (`mail_address`) VALUES ('$mail');";
$result2 = mysqli_query($conn,$sql2);
}

if($result)
{
	$mailto='1002185919@qq.com';  //收件人

	$subject="【DreaminNote】收到一条新预定通知！";  //邮件主题

	$body="联系方式为".$phone."的顾客预定了".$type."套餐。具体信息为".$infomation."请尽快处理！";   //邮件内容

$mes = sendmailto($mailto,$subject,$body, false);

if($mes) {
	echo"<script type='text/javascript'>"; 
	echo "alert('预定成功，请留意您所留下的联系方式，我们将尽快与您取得联络！');window.location.href='index.html'";
	echo "</script>";

}
else 
	echo "<script>alert('预定失败！1请联系微信:Florence-mu');location.href='index.html'</script>";

}
 else echo "<script>alert('预定失败！2请联系微信:Florence-mu');location.href='index.html'</script>";
   // else echo $name.$phone.$address.$mail.$time.$ps.$type;


?>