<?php
return array(

	'APP_PATH' => 'DM',

	//'配置项'=>'配置值'
	// 'DB_PREFIX' => 'think_',
	// 'DB_HOST' 	=> 'localhost',
	// 'DB_NAME' 	=> 'thinkphp',
	// 'DB_USER' 	=> 'root',
	// 'DB_PWD' 	=> 'root',
	// 'DB_PORT' 	=> '3306',

	//'配置项'=>'配置值'
	'DB_PREFIX' => 'think_',
	'DB_HOST' 	=> 'localhost',
	'DB_NAME' 	=> 'ThinkPHP',
	'DB_USER' 	=> 'root',
	'DB_PWD' 	=> 'root',
	'DB_PORT' 	=> '8889',



	//独立分组设置
	'APP_GROUP_LIST' => 'Index,Admin',
	'APP_GROUP_MODE' => 1,
	'APP_GROUP_PATH' => 'Modules',
	'DEFAULT_GROUP' => 'Index',


	//模板设置
	'TMPL_FILE_DEPR' => '_',

	//session设置
	'SESSION_TYPE' => 'Db',
	'SESSION_TABLE' => 'think_session',
);
?>
