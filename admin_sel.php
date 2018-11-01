<?php
header('Content-Type:text/html;charset=utf8');
include('conn.php');

$type = $_POST['type'];
$state = $_POST['state'];
if((!$type)&&!($state)) {
	echo "<script>alert('请至少选择一个您要筛选的类目！');location.href='admin.php'</script>";
}
else if((!$type)&&$state) $sql = "SELECT * From customer WHERE state ='$state'";
else if((!$state)&&$type) $sql = "SELECT * From customer WHERE photo_info ='$type'";
else if($type&&$state) $sql = "SELECT * From customer WHERE photo_info = '$type' AND state ='$state'";
mysqli_query($conn,'set names utf8');
$result = mysqli_query($conn,$sql) or die ('error'.mysql_error().'产生的问题的sql<br/>'.$sql);

if($result){
	$row=mysqli_num_rows($result);
	$info=array();
		for($i=0;$i<$row;$i++)
			$info[$i]= mysqli_fetch_row($result);
	$json = json_encode($info,JSON_UNESCAPED_UNICODE); 
	echo $json;
}



?>