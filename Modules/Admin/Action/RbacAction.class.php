<?php 
	class RbacAction extends Action {
		public function index() {

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

			$this->node = node_merge(M('node')->order('sort')->select());
			//dump($this->node);
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