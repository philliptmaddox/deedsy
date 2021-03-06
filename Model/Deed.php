<?php
class Deed extends AppModel {
	// statuses
	const UNASSIGNED = 1;
	const ACCEPTED = 2;
	const COMPLETED = 4;
	const EXPIRED = 8;
		
	var $name = 'Deed';
	var $belongsTo = array(
		'DeedCreator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_user_id'	
		),
		'DeedDoer' => array(
			'className' => 'User',
			'foreignKey' => 'actor_user_id'
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id'
		)
	);
	
	public $hasAndBelongsToMany = array(
        'Tag' =>
            array(
                'className'              => 'Tag',
                'joinTable'              => 'deeds_tags',
                'foreignKey'             => 'deed_id',
                'associationForeignKey'  => 'tag_id'
            ),
        'UserOffers' =>
            array(
                'className'              => 'User',
                'joinTable'              => 'deeds_users',
                'foreignKey'             => 'deed_id',
                'associationForeignKey'  => 'user_id'
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
	
	public function beforeSave($options = Array()) {
		if (empty($this->data[$this->alias]['expires'])) {
			$this->data[$this->alias]['expires'] = strtotime("+30 days");
		}
		return true;
	}
	public function isOwnedBy($deed, $user) {
		return $this->field('id', array('id' => $deed, 'creator_user_id' => $user)) === $deed;
	}
	
	public function isClaimedBy($deed, $user) {
		return $this->field('id', array('id' => $deed, 'actor_user_id' => $user)) === $deed;
	}
}
