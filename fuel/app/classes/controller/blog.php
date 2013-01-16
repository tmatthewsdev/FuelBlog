<?php

class Controller_Blog extends Controller_App
{

	public function before()
	{
		parent::before();

		Casset::css('blog.css');
	}
	
	public function get_index()
	{
		$this->template->title   = 'Blog Index';
		$this->template->content = View::forge('blog/index', array(
			'blogs' => Model_Blog::get_index(),
		));
	}

	public function get_view($url)
	{
		$blog = Model_Blog::get_by_url($url);

		$this->template->title   = 'Blog View';
		$this->template->content = View::forge('blog/view', array(
			'blog' => $blog,
		));
	}


	public function get_add()
	{
		$this->template->title   = 'Blog Add';
		$this->template->content = View::forge('blog/add');
	}

	public function post_add()
	{
		$title = Input::post('title');
		$body  = Input::post('body');

		$blog = Model_Blog::add_article($title, $body);
		$this->redirect($blog->url(), 'success', "Article added");
	}

}