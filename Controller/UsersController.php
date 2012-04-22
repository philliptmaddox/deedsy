<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form');	
	public $components = array(
		'Alerts',
		'Session'
    );
	
	public function beforefilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}
	
    public function index() {
        $this->set('users', $this->User->find('all'));
    }
	
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()){
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
		$createdDeeds = $this->User->CreatedDeed->find('all',
			array(
				'conditions' => array(
					'creator_user_id' => $id
				)
			)
		);
		$this->set('createdDeeds', $createdDeeds);
	}
	
	public function add() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User has been created.');
                $this->Alerts->sendWelcomeEmail($this->User->field('email'), $this->User->field('first_name'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add user.');
            }	
		}
	}
	
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
	}
	
	public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
		if ($this->request->is('post')) {
			if($this->Auth->login()) {
				$this->redirect(array('controller' => 'dashboard','action' => 'index'));
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}