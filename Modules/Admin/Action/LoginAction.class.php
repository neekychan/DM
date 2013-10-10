<?php 
	Class LoginAction extends Action {
		public function verify() {
			$username = I('username');
			$password = I('password');

			$User = M('User');
	    	$map['username'] = array('eq',$username);
	    	$result = $User->where($map)->find();
	    	if(!$result || $result['password'] != md5($password)) {
	    		$this->error('帐号或密码错误，请重新输入！');
	    	}

	    	if($result['lock']) {
	    		$this->error('你的帐号已被锁定，请联系管理员。');
	    	}


	    	$update_data = array('id'=>$result['id'],
	    		'logintime'=>time(),
	    		'loginip'=>get_client_ip());

	    	$User->save($update_data);
	    	session(C('USER_AUTH_KEY'),$result['id']);
	    	session('username',$result['username']);

	    	if($result['username'] == C('RBAC_SUPERADMIN')) {
	    		session(C('ADMIN_AUTH_KEY'),true);
	    	}

	    	import('ORG.Util.RBAC');
	    	RBAC::saveAccessList();
	    	//dump($_SESSION);
			$this->redirect('Admin/Index/index');
		}
	}
 ?>