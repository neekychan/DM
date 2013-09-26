<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
</head>
<body>
	欢迎回来,<?php echo ($_SESSION['username']); ?>
	<a href="<?php echo U('logout'),'','';?>">登出</a>
</body>
</html>