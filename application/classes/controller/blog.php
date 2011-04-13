<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Blog extends Controller_Template {

	public $template = 'templates/blog';

	/**
	 * 显示日志列表
	 */
	public function action_index()
	{
		$model = Model::factory('blog');
		$view = View::factory('pages/blog/list.php');
		$view->blog_list = $model->get_blog_list();
		$this->template->content = $view;
	}

	/**
	 * 显示日志详细
	 * 
	 * @param $blog_id 日志编号
	 */
	public function action_show($blog_id)
	{
		$model = Model::factory('blog');
		$view = View::factory('pages/blog/show.php');
		$view->blog_info = $model->get_blog_info($blog_id);
		$this->template->content = $view;
	}

} // End Controller_Blog
