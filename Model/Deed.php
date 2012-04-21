<?php
class Deed extends AppModel {
	public $belongsTo = array(
		'UserCreator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_user_id'	
		),
		'UserActor' => array(
			'className' => 'User',
			'foreignKey' => 'actor_user_id'
		) 
	);
	
	public $validate = array (
		'name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'An name is required'
			)
		),
		'description' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Describe your deed.'
			)		
		),
		'value' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Set a value for this deed.'
			)		
		)
	);
	
	public function isOwnedBy($deed, $user) {
		return $this->field('id', array('id' => $deed, 'creator_user_id' => $user)) === $deed;
	}
}