<?php
class DeedsController extends AppController {
    var $uses = array('User', 'Deed');
	 
    public $helpers = array('Html', 'Form');
	
	public $components = array(
		'Alerts'
    );
	
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
			$this->request->data['Deed']['status_id'] = 1;
			 
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

	public function edit($id = null) {
		$this->Deed->id = $id;
		
		if ($this->request->is('get')) {
			$this->request->data = $this->Deed->read();
		} else {
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
                $this->Session->setFlash('Deed has been edited.');
                $this->redirect(array('controller' => 'dashboard','action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to edit deed.');
            }	
		}
	}


	public function delete($id = null) {
		if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Deed->id = $id;
        if (!$this->Deed->exists()) {
            throw new NotFoundException(__('Invalid deed'));
        }
        if ($this->Deed->delete()) {
            $this->Session->setFlash(__('Deed deleted'));
            $this->redirect(array('controller'=>'dashboard','action' => 'index'));
        }
        $this->Session->setFlash(__('Deed was not deleted'));
        $this->redirect(array('action' => 'index'));
	}
	
	public function review($id = null) {
		$this->User->id = $this->Auth->user('id');
		$this->Deed->id = $id;
		$this->set('deed', $this->Deed->read());
		$this->set('user', $this->User->read());
	}
	
	public function share($id = null) {
		$this->Deed->id = $id;
		
		if ($this->request->is('post')) {
			 $to = $this->request->data['Share']['email'];
			 //debug($this->request->data, true);
			 $this->Alerts->sendShareEmail($to, $this->Deed->read());
		}
		
		$this->User->id = $this->Auth->user('id');
		$this->layout = 'nostyle';
		$this->set('deed', $this->Deed->read());
		$this->set('user', $this->User->read());
	}
	
	public function claimDeed($id = null) {
		if ($this->request->is('post')) {
			$this->User->id = $this->Auth->user('id');
			$this->Deed->id = $id;
			$this->Deed->set('actor_user_id', $this->User->id);
			$this->Deed->set('status_id', 2);
			$this->Deed->save();
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
	}
	
	public function markCompleted($id = null) {
		if ($this->request->is('post')) {
			$this->Deed->id = $id;
			$this->Deed->set('status_id', 3);
			$this->Deed->save();
			$this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
		}
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
	
	public function getLoggedInUser() {
		$this->User->id = $this->Auth->user('id');
		return $this->User;
	}
}