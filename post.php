<?php
header('Content-Type:text/html;charset=utf8');
include('conn.php');
include 'smtp.func.php';
$address = $_POST['email'];
$sql = "INSERT INTO `mail` (`mail_address`) VALUES ('$address');";
mysqli_query($conn,'set names utf8');
$result = mysqli_query($conn,$sql);

if($result)
{
	$mailto=$address;  //收件人

	$subject="【DreaminNote】订阅成功通知";  //邮件主题

	$body="感谢订阅DreaminNote摄影工作社期刊，请留意邮箱动态，我们将以邮件的方式定期给予推送，同时也欢迎您继续关注本工作室官网上发布的各项活动或进行预约拍摄，以光影，记录美好时刻。";   //邮件内容

$mes = sendmailto($mailto,$subject,$body, false);

if($mes) {
	echo"<script type='text/javascript'>"; 
	echo "alert('订阅成功，请留意您的邮箱动态！');window.location.href='index.html'";
	echo "</script>";

}
else 
	echo "<script>alert('订阅失败');location.href='index.html'</script>";

}
 else echo "<script>alert('提交预定信息将自动进行订阅，您可能已经完成订阅！');location.href='index.html'</script>";

	
?>