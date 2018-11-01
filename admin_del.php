<?php
header('Content-Type:text/html;charset=utf8');
include('conn.php');

$num=$_GET['id'];
$sql = "DELETE FROM `customer` WHERE `customer`.`num` = $num";
mysqli_query($conn,'set names utf8');
$result = mysqli_query($conn,$sql) or die ('error'.mysql_error().'产生的问题的sql<br/>'.$sql);

if($result) echo "<script>alert('成功取消本条预定！');location.href='admin.php'</script>";
else echo "<script>alert('取消失败！');location.href='admin.php'</script>";

?>