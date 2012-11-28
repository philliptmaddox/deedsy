<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	function getChanged() {
		$this->recursive = -1;
		$old = $this->findById($this->id);
		$changed_fields = array();
		if ($old){
			foreach ($this->data[$this->alias] as $key =>$value) {
				if ($old[$this->alias][$key] != $value) {
					$changed_fields[] = $key;
				}
			}
		} else { // model doesn't exist - all fields are 'changed'
			$changed_fields = array_keys($this->data[$this->alias]);
		}
		return $changed_fields;
	}
}
