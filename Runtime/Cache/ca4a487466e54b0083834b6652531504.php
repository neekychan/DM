<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>点卖网-用户登录</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">
</head>
<body>
	<?php echo C('SESSION_PREFIX');?>
	<form action="<?php echo U('Index/verify','','');?>" type='post'>
		<div class="login_box">
			<div class='login-form'>
				<p class="login-form-item">
				<label class='login-form-label'>帐号</label> <input class='login-userName' type='text' name='username'>
			</p>

			<p class="login-form-item">
				<label class='login-form-label'>密码</label> <input class='login-pwd' type='password' name='password'>
			</p>
			<p>
				<input class="login-form-submit" type='submit' value='登录'/>
			</p>
			</div>
		</div>
	</form>
</body>
</html>