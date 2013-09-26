<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>添加角色</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css">
</head>
<body>
	<form method='post' action="<?php echo U('Admin/Rbac/addRoleHandle');?>">
		<table class="table">
			<tr>
				<th colspan='2'>添加角色</th>
			</tr>	
			<tr>
				<td align='right'>角色名称:</td>
				<td><input name='name' type='text'></td>
			</tr>
			<tr>
				<td align='right'>角色描述:</td>
				<td><input type='text' name='remark'></td>
			</tr>
			<tr>
				<td align="right">角色状态:</td>
				<td>
					<input type="radio" name='status' value="1" checked='checked'>&nbsp;启用
					<input type="radio" name='status' value="0">&nbsp;停用
				</td>
			</tr>
			<tr>
				<td colspan='2' align='center'>
					<input type='submit' value='添加'>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>