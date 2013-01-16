<?php

class Model_Blog extends Orm\Model {

	protected static $_properties = array(	
		'id',
		'title',
		'url',
		'body',
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
		'Orm\Observer_Slug' => array(
			'events' => array('before_insert', 'before_save'),
			'source' => 'title',
			'property' => 'url',
		),
	);
	
	protected static $_has_many = array(
		'comments' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Comment',
			'key_to' => 'blog_id',
			'cascade_save' => true,
			'cascade_delete' => true,
		)
	);

	public function title()
	{
		return $this->title;
	}

	public function url()
	{
		return '' . $this->url;
	}

	public function date()
	{
		return date("Y m d", $this->created_at);
	}

	public function body()
	{
		return $this->body;
	}

	public function comments()
	{
		return $this->comments;
	}




	public static function get_index()
	{
		return static::find()->order_by('created_at', 'asc')->get();
	}

	public static function get_by_url($url)
	{
		return static::find()->where('url', $url)->get_one();
	}

	public static function add_article($title, $body)
	{
		$blog = static::forge(array(
			'title' => $title,
			'body' => $body,
		));

		$blog->save();
		return $blog;
	}

}