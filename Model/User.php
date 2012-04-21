<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	public $name = 'User';
	public $hasMany  = array(
			'creatorDeeds' => array(
			'className' => 'Deed',
			'foreignKey' => 'creator_user_id'
		),
			'actorDeeds' => array(
			'className' => 'Deed',
			'foreignKey' => 'actor_user_id'
		)
	);
	
	public $validate = array(
			'email' => array(
				'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'An email address is required'
			)
		),
		'first_name' => array(
				'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A first name is required'
			)		
		),
		'last_name' => array(
				'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A last name is required'
			)		
		),
		'password' => array(
				'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
			)		
		)
	);
	public function beforeSave() {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponents::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
