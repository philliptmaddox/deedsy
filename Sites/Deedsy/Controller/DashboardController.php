<?php
class DashboardController extends AppController {
	var $uses = array('User');
	public $helpers = array('Html', 'Form');	
	
	public function beforeFilter() {
	}
	
	public function index() {
		if ($this->Auth->user('id') != null) {
			$id = $this->Auth->user('id');
			$this->User->id = $id;
			$this->set('user', $this->User->read());
			
			$createdDeeds = $this->User->CreatedDeed->find('all', array(
					'conditions' => array(
						'creator_user_id' => $id
					)
				)
			);
			$this->set('createdDeeds', $createdDeeds);
			
			$claimedDeeds = $this->User->ClaimedDeed->find('all', array(
					'conditions' => array(
						'actor_user_id' => $id
					)
				)
			);
			$this->set('claimedDeeds', $claimedDeeds);
		} else {
			$this->redirect(array('controller' => 'users','action' => 'login'));
		}
	}
}
	