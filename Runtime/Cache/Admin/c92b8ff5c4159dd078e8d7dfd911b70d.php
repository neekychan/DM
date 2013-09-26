<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css">
</head>
<body>
	<form action="<?php echo U('Admin/Rbac/addNodeHandle');?>" method='post'>
		<table class='table'>
			<tr>
				<th colspan='2'>添加节点</th>
			</tr>
			<tr>
				<td align='right'><?php echo ($title); ?>名称:</td>
				<td>
					<input type='text' name='name'>
				</td>
			</tr>
			<tr>
				<td align='right'><?php echo ($title); ?>描述:</td>
				<td><input type='text' name='title'></td>
			</tr>
			<tr>
				<td align='right'>开启:</td>
				<td>
					<input type='radio' name='status' value='1' checked='checked'>&nbsp;开启
					<input type='radio' name='status' value='0'>&nbsp;关闭
				</td>
			</tr>
			<tr>
				<td align='right'>排序</td>
				<td><input type='text' name='sort' value='1'></td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='hidden' name='pid' value="<?php echo ($pid); ?>">
					<input type='hidden' name='level' value="<?php echo ($level); ?>">
					<input type='submit' value='添加'>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>