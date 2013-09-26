<?php

class IndexAction extends Action {
    public function index(){
        echo 'Hello World';
    }

    public function create() {
    	$User = M('User');
    	$user_name = I('get.username');
    	$password = I('get.password');
    	$User->create(array('username'=>$user_name,'password' => md5($password)));
    	$User->add();
    }

    public function select() {
    	$User = M('User');
    	$map['id'] = array('eq','1');
    	$result = $User->where($map)->select();
    	//echo var_dump($result[0]);
    	$this->data = $result[0];
    	$this->display();
    	//echo var_dump($data);	
    }

    public function find() {
    	$id = I('get.id');
    	$User = M('User');
    	$map['id'] = array('eq',$id);
    	$data = $User->where($map);
    	if($data) {
    		echo $data->getField('username');	
    	} else {
    		echo 'Sorry,We Can\'t find this user.';
    	}
    }

    public function delete() {
    	$id = I('get.id');
    	$User = M('User');
    	$map['id'] = array('eq',$id);
    	$data = $User->where($map)->delete();

    	if($data) {
    		echo 'Delete Success!';
    	} else {
    		echo 'Delete Error!';
    	}
    }

    public function update() {
    	$User = M('User');
    	$id = I('get.id');
    	$user_name = I('get.username');
    	$data['username'] = $user_name;
    	$User->where('id = '.$id)->save($data);
    }

    public function verify() {
    	$user_name = I('get.username');
    	$password = I('get.password');
    	$User = M('User');
    	$map['username'] = array('eq',$user_name);
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
    	session('id',$result['id']);
    	session('username',$result['username']);
		$this->redirect('Info/Index/index');

	}

    // public function login() {
    //     echo 'Login View';
    //     //$this->display();
    // }

}