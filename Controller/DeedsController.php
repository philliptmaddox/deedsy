<?php
class DeedsController extends AppController {
     
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
			 
			 //gather tags
			 $tags = explode(',', $this->request->data['Deed']['tags']);
		 
			 $new_data = $this->data;
			 
			 foreach($tags as $_tag) {
				$_tag = strtolower(trim($_tag));
				if ($_tag) {
					$this->Deed->Tag->recursive = -1;
					$tag = $this->Deed->Tag->findByName($_tag);
					if (!$tag) {
						$this->Deed->Tag->create();
						$tag = $this->Deed->Tag->save(array('name'=>$_tag));
						$tag['Tag']['id'] = $this->Deed->Tag->id;
						if (!$tag) {
							$this->_flash(__(sprintf('The Tag %s could not be saved.',$_tag), true),'success');
						}
					}
					if ($tag) {
						$new_data['Tag']['Tag'][$tag['Tag']['id']] = $tag['Tag']['id'];
					}
				}
			}
			 
			if ($this->Deed->save($new_data)) {
                $this->Session->setFlash('Deed has been created.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add deed.');
            }	
		}
	}
	
	public function review($id = null) {
		$this->User->id = $this->Auth->user('id');
		debug($this->User->id, true);
		$this->Deed->id = $id;
		$this->set('deed', $this->Deed->read());
		$this->set('user', $this->User->read());
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