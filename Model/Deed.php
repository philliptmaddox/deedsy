<?php
class Deed extends AppModel {
	var $name = 'Deed';
	var $belongsTo = array(
		'DeedCreator' => array(
			'className' => 'User',
			'foreignKey' => 'creator_user_id'	
		),
		'DeedDoer' => array(
			'className' => 'User',
			'foreignKey' => 'actor_user_id'
		)
	);
	
	public $hasAndBelongsToMany = array(
        'Tag' =>
            array(
                'className'              => 'Tag',
                'joinTable'              => 'deeds_tags',
                'foreignKey'             => 'deed_id',
                'associationForeignKey'  => 'tag_id'
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