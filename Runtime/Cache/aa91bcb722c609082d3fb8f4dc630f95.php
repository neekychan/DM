<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
</head>
<body>
	<h1><?php echo ($data["id"]); ?>--<?php echo ($data["username"]); ?></h1>
	<h2><?php if(isset($data["name"])): ?>id已经赋值<?php else: ?> id还没有赋值<?php endif; ?></h2>
</body>
</html>