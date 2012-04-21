<?php
class User extends AppModel {
	 public $validate = array(
        'first_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter your first name',
            'required' => true
        ),
        'last_name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter your last name',
            'required' => true
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Please enter your email address',
            'required' => true
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'message' => 'Please set a password',
            'required' => true
        )
    );
}