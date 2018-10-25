<?php





?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Dremin-note-详单查询</title>

<style type="text/css">

body {background:#FFE4E1; font-family: '微软雅黑'} * {margin: 0;padding: 0;}

input,textarea {font-family: '微软雅黑';color:	#FF6A6A;}

#main {width: 800px; overflow: hidden; text-align: center; border: 1px solid #ccc; background: #fff; margin: 200px auto;opacity: 0.8;}

#name {color: 	#FF6A6A; margin: 10px}
#name1 {color: #FF6A6A; margin: 30px;}



#table1,tr,td {border-collapse:collapse; border: 1px solid 	#FF8C69; color: #FF6A6A; margin: 30px auto}
#table1 td {width:720px;padding: 5px; }





.inp {width: 300px; height: 30px; font-size: 16px; padding:0 5px;}


.sub {padding: 8px 20px; font-size: 16px;}
</style>

</head>

<body>

<div id="main">
	<div id='name'>
	❤
	<h3>Dremin-note-详单查询</h3>
	</div>

	<div id='name1'>
	<h4><input type="text" name="info" placeholder="请填写预定时留下的联系方式" style="width: 180px;">
	<input type="submit" value="查询"></h4>

	</div>

	<div id="table1">
	<table>
	<tr>
	<td>姓名</td>
	<td>套餐内容</td>
	<td>联系方式</td>
	<td>预定详情</td>
	<td>状态</td>
	</tr>

	<tr>
	<td>黄静雯</td>
	<td>胶片单人</td>
	<td>13119182798</td>
	<td>2018.11.29 西安</td>
	<td>定金期</td>
	</tr>

	
	</table>
	</div>
</div>	
</body>
</html>