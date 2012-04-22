<?php
class DeedsController extends AppController {
    var $uses = array('User', 'Deed');
	 
    public $helpers = array('Html', 'Form');
	
    public function index() {
        $this->set('deeds', $this->Deed->find('all'));
    }
	
	public function view($id = null) {
		$this->Deed->id = $id;
		$this->set('deed', $this->Deed->read());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			 $this->request->data['Deed']['creator_user_id'] = $this->Auth->user('id');
			if ($this->Deed->save($this->request->data)) {
                $this->Session->setFlash('Deed has been created.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add deed.');
            }	
		}
	}
	
	public function setStatus($id = null, $status) {
		$this->Deed->id = $id;
	}
	
	public function claimDeed($id = null) {
		$this->User->id = $this->Auth->user('id');
		$this->Deed->id = $id;
		$this->Deed->set('actor_user_id', $this->User->id);
		$this->Deed->save();
		$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
	}	
	
	public function isAuthorized($user) {
		if (in_array($this->action, array('view','index'))) {
			return true;
		}
		
		if (in_array($this->action, array('edit', 'delete'))) {
			$deedId = $this->request->params['pass'][0];
			if($this->Deed->isOwnedBy($deedId,$user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
}