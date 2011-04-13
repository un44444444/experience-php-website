<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Widget extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world!');
	}

	public function action_blog_list()
	{
		$view = View::factory('pages/widget/blog_list');
		$view->blog_list = Model::factory('blog')->get_blog_list();
		$this->response->body($view);
	}

} // End Controller_Widget
