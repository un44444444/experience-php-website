<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Controller_Template {

	public $template = 'templates/blog';

	public function action_index()
	{
		$view = View::factory('pages/main');
		$view->content = 'main content';
		$this->template->content = $view;
	}

} // End Controller_Main
