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
				<td align='right'>应用名称:</td>
				<td>
					<input type='text' name='name'>
				</td>
			</tr>
			<tr>
				<td align='right'>应用描述:</td>
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
					<input type='hidden' name='pid' value='0'>
					<input type='hidden' name='level' value='1'>
					<input type='submit' value='添加'>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>