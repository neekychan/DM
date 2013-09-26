<?php 
	class RbacAction extends Action {
		public function index() {

		}

		public function role() {
			$this->data = M('role')->select();
			$this->display();
		}

		public function node() {

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

		}
	}
 ?>