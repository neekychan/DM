<?php 
	class InfoAction extends Action {
		public function index() {
			if(!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
				$this->redirect('Index/Index/login');
			}

			$this->display();
		}


		public function logout() {
			session_unset();
			session_destroy();
			$this->redirect('Index/Index/login');
		}
	}
 ?>