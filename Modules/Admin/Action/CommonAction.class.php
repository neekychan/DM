<?php 
	class CommonAction extends Action {
		public function _initialize() {
			if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
				$this->redirect('Admin/Login/index');
			}

			$notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) || 
			in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

			if(C('USER_AUTH_ON') && !$notAuth) {
				import('ORG.Util.RBAC');
				// dump(RBAC::AccessDecision(GROUP_NAME));
				// dump($_SESSION);
				// echo'对不起，你无权执行当前操作';
				RBAC::AccessDecision(GROUP_NAME) || $this->error('对不起，你无权执行当前操作');
			}

		}
	}
 ?>