<?php
class DeedsController extends AppController {
    public $helpers = array('Html', 'Form');
	
    public function index() {
        $this->set('deeds', $this->Deed->find('all'));
    }
}