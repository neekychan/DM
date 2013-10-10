<?php 
	class RbacAction extends CommonAction {
		public function index() {
			//field语法，true则不查询返回指定字段
			$this->users = D('UserRelation')->field('password',true)->relation(true)->select();
			$this->display();
		}

		public function role() {
			$this->data = M('role')->select();
			$this->display();
		}

		public function node() {
			$node = M('node')->order('sort')->select();
			$this->node = node_merge($node);
			//dump($this->node);
			$this->display();
		}

		public function addUser() {
			//将角色表数据遍历出来，在添加用户的时候可以分配角色。
			$this->role = M('role')->select();
			$this->display();
		}

		public function addUserHandler() {
			$data = I('post.');
			$data['lock'] = 0;

			$user = array(
				'username' => I('username'),
				'password' => I('password','','md5'),
				'logintime' => time(),
				'loginip' => get_client_ip()
				);

			//在新用户信息被成功写入数据库后，往role_user表插入角色信息。
			if($uid = M('user')->add($user)) {
				$role = array();
				foreach ($_POST['role_id'] as $v) {
					$role[] = array(
						'role_id' => $v,
						'user_id' => $uid
						);
				}

				M('role_user')->addAll($role);
				$this->success('新用户添加成功', U('Admin/Rbac/index'));
			} else {
				$this->error('添加用户失败', U('Admin/Rbac/addUser'));
			}
		}

		public function addRole() {
			$this->display();
		}

		public function addRoleHandle() {
			$data = I('post.');
			if(M('role')->add($data)) {
				$this->success('添加角色成功',U('Admin/Rbac/role'));
			} else {
				$this->error('添加角色失败');
			}
		}

		public function addNode() {
			$this->pid = I('pid',0,'intval');
			$this->level = I('level',1,'intval');

			switch ($this->level) {
				case 0:
					$this->title = '应用';
					break;
				case 1:
					$this->title = '控制器';
					break;
				case 2:
					$this->title = '方法';
					break;
				
				default:
				$this->title = '应用';
					break;
			}

			$this->display();
		}

		public function addNodeHandle() {
			if(M('node')->add(I('post.'))) {
				$this->success('添加成功',U('Admin/Rbac/node'));
			} else {
				$this->error('添加失败');
			}
		}

		public function access() {
			$rid = I('rid',0,'intval');

			//原有已配置的权限。
			$access = M('access')->where(array('role_id' => $rid))->getField('node_id',true);

			$this->node = node_merge(M('node')->order('sort')->select(),$access);

			$this->rid = $rid;
			$this->display();
		}

		public function setAccess() {
			//dump($_POST);
			$rid = I('post.rid',0,'intval');

			$data = array();

			foreach (I('post.access') as $v) {
				$tmp = explode('_', $v);
				$data[] = array(
					'role_id' => $rid,
					'node_id' => $tmp[0],
					'level' => $tmp[1],
					);
			}

			//p($data);
			M('access')->where(array('role_id' => $rid))->delete();
			$result = M('access')->addAll($data);
			if($result) {
				$this->success('修改成功',U('Admin/Rbac/role'));
			} else {
				$this->success('修改失败',U('Admin/Rbac/role'));
			}
		}
	}
 ?>