<?php

class Model_Comment extends Orm\Model {

	protected static $_properties = array(	
		'id',
		'blog_id',
		'author',
		'content',
		'created_at',
		'updated_at'
	);
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_belongs_to = array(
		'blog' => array(
			'key_from' => 'blog_id',
			'model_to' => 'Model_Blog',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	public function content()
	{
		return $this->content;
	}

	public function author()
	{
		return $this->author;
	}

	public function date()
	{
		return date("Y m d", $this->created_at);
	}

}