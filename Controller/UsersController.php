<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form');
	
    public function index() {
        $this->set('users', $this->User->find('all'));
    }
}