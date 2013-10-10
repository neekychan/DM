<?php 
	return array(
		'RBAC_SUPERADMIN' 	=> 'admin',
		'ADMIN_AUTH_KEY' 	=> 'superadmin',
		'USER_AUTH_ON' 		=> true,
		'USER_AUTH_TYPE' 	=> 1,
		'USER_AUTH_KEY' 	=> 'uid',
		'NOT_AUTH_MODULE' 	=> 'Index',
		'NOT_AUTH_METHOD' 	=> 'logout',
		'RBAC_ROLE_TABLE'	=> 'think_role',
		'RBAC_USER_TABLE'	=> 'think_role_user',
		'RBAC_ACCESS_TABLE' => 'think_access',
		'RBAC_NODE_TABLE'	=> 'think_node',
		'TMPL_PARSE_STRING' => array(
			'__PUBLIC__' 	=> __ROOT__ . '/' . APP_NAME . '/' . 'Modules/' . GROUP_NAME . '/Tpl/Public'),
		);
 ?>