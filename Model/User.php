<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
	public $name = 'User';
	public $hasMany  = array(
			'CreatedDeed' => array(
			'className' => 'Deed',
			'foreignKey' => 'creator_user_id'
		),
			'ClaimedDeed' => array(
			'className' => 'Deed',
			'foreignKey' => 'actor_user_id'
		)
	);
	
	public $hasAndBelongsToMany = array(
        'DeedOffers' =>
            array(
                'className'              => 'Deed',
                'joinTable'              => 'deeds_users',
                'foreignKey'             => 'user_id',
                'associationForeignKey'  => 'deed_id'
            ),
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
	public function beforeSave($options = Array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	public function addPoints($points) {
		$balance = $this->data[$this->alias]['balance'];
		$this->data[$this->alias]['balance'] = $balance + $points;
		if ($points > 0) {
			$earned = $this->data[$this->alias]['earned'];
			$this->data[$this->alias]['earned'] = $earned + $points;
		}
		return $this->save();
	}
}
