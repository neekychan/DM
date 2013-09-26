<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/Public.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/node.css">
	<script type="text/javascript" src='__PUBLIC__/Js/jquery.min.js'>
	</script>
	<script type="text/javascript">
		$(function(){
			$("input[level=1]").click(function(){
				var inputs = $(this).parents('.app').find('input');
				$(this).attr('checked') ? inputs.attr('checked','checked') : inputs.removeAttr('checked');
			});

			$("input[level=2]").click(function(){
				var inputs = $(this).parents('dl').find('input');
				$(this).attr('checked') ? inputs.attr('checked','checked') : inputs.removeAttr('checked');
			});

		});
	</script>
</head>
<body>
	<form action="<?php echo U('Admin/Rbac/setAccess');?>" method='post'>
		<div id="wrap">
			<a href="<?php echo U('Admin/Rbac/node');?>" class='add-app'>返回</a>

			<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
					<p>
						<strong><?php echo ($app["title"]); ?></strong>
						<input type='checkbox' name='access[]' value="<?php echo ($app['id']); ?>_1" level='1'>
					</p>

					<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
							<dt>
								<strong><?php echo ($action['title']); ?></strong>
								<input type='checkbox' name='access[]' value="<?php echo ($action['id']); ?>_2" level='2'>
							</dt>

							<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
									<span><?php echo ($method['title']); ?></span>
									<input type='checkbox' name='access[]' value="<?php echo ($method['id']); ?>_3" level='3'>
								</dd><?php endforeach; endif; ?>

						</dl><?php endforeach; endif; ?>
				</div><?php endforeach; endif; ?>
		</div>
		<input type='hidden' name='rid' value='<?php echo ($rid); ?>'>
		<input type='submit' value='保存设置'>
	</form>
</body>
</html>