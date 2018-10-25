<?php
$host='localhost';
$user_name='root';
$password='2205365123awd';

$conn=mysqli_connect($host,$user_name,$password);
if(!$conn)
{
	die ('数据库链接失败'.mysql_error());
}

mysqli_select_db($conn,'dreaminnote');
?>
