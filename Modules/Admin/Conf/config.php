<?php 
	return array(
		'RBAC_SUPERADMIN' => 'admin',
		'ADMIN_AUTH_KEY' => 'superadmin',
		'USER_AUTH_ON' => true,
		'USER_AUTH_TYPE' => 1,
		'USER_AUTH_KEY' => 'uid',
		'NOT_AUTH_MODULE' => '',
		'NOT_AUTH_METHOD' => '',
		'TMPL_PARSE_STRING' => array(
			'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/' . 'Modules/' . GROUP_NAME . '/Tpl/Public'),
		);
 ?>