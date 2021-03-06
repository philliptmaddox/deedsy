<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('User', 'Model');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'deeds', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'pages', 'action' => 'home'),
			'authenticate' => array(
				'Form' => array( 
					'fields' => array('username' => 'email')
				)
			)
		)
	);
	
	public function beforeFilter() {
		$this->Auth->allow('index', 'view', 'display');
		if($this->Auth->loggedIn()){
			$this->loadModel('User');
			//debug($this->Auth->user('id'), true);
			$this->User->id = $this->Auth->user('id');
			$this->set('user', $this->User->read());
			//debug($this->User->read(), true);
		}
	}
	
	public function isAuthorized($user) {
		//to add the concept of admin users, check the role of the user here
		//default to deny	
		return false;
	}
}
