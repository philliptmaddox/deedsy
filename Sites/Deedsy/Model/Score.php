<?php
class Score extends AppModel {
	public $name = 'Score';
    public $belongsTo = array(
        'className' => 'User',
			'foreignKey' => 'creator_user_id'	
            )
    );
}