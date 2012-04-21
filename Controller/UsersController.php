<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form');	
	public $components = array(
		'Alerts',
		'Session'
    );
	
    public function index() {
        $this->set('users', $this->User->find('all'));
    }
	
	public function view($id = null) {
		$this->User->id = $id;
		$this->set('user', $this->User->read());
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
}