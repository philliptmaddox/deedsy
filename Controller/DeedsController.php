<?php
class DeedsController extends AppController {
    var 
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
		$this->Deed->id = $id;
		debug($this->Deed, true)
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