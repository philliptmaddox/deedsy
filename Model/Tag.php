<?php
class Tag extends AppModel {
	public $name = 'Tag';
    public $hasAndBelongsToMany = array(
        'Deed' =>
            array(
                'className'              => 'Deed',
                'joinTable'              => 'deeds_tags',
                'foreignKey'             => 'tag_id',
                'associationForeignKey'  => 'deed_id'
            )
    );
}