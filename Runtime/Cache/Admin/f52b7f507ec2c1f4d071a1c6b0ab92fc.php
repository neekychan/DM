<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>角色列表</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css">
</head>
<body>
	<table class="table">
		<tr>
			<th>编号</th>
			<th>角色名称</th>
			<th>角色描述</th>
			<th>开启状态</th>
			<th>操作</th>
		</tr>

		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["name"]); ?></td>
				<td><?php echo ($v["remark"]); ?></td>
				<td>
					<?php if($v['status']): ?>开启
						<?php else: ?>
						关闭<?php endif; ?>
				</td>
				<td>删除</td>
			</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>