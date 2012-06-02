<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Default_Home extends Controller_Base {

	public function action_index()
	{
		$this->view->test = "Bla";
	}

}