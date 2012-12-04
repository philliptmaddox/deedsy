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
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'That email address is already being used'
			),
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
		if (in_array('password', $this->getChanged())) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	public function addPoints($points) {
		$balance = $this->data[$this->alias]['balance'];
		$this->data[$this->alias]['balance'] = $balance + $points;
		if ($points > 0) {
			$earned = isset($this->data[$this->alias]['earned']) ? $this->data[$this->alias]['earned'] : 0 ;
			$this->data[$this->alias]['earned'] = $earned + $points;
		}
		return $this->save();
	}
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->virtualFields['level'] = sprintf('IF(%1$s.earned <= 25, 1, IF(%1$s.earned <= 65, 2, IF(%1$s.earned <= 116, 3, IF(%1$s.earned <= 192, 4, IF(%1$s.earned <= 295, 5, IF(%1$s.earned <= 444, 6, IF(%1$s.earned <= 645, 7, IF(%1$s.earned <= 946, 8, IF(%1$s.earned <= 1500, 9, 10)))))))))', $this->alias);
	}
}
