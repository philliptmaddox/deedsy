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
			if ($this->Deed->save($this->request->data)) {
                $this->Session->setFlash('Deed has been created.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add deed.');
            }	
		}
	}
}