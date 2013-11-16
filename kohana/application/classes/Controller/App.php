<?php defined('SYSPATH') or die('No direct script access.');

class Controller_App extends Controller_Template {

	public $template = 'template';
	public $site = 'Kohana Project';

	
	public function after()
	{
		if ($this->auto_render === TRUE)
		{
			$this->template->site_name = $this->site;
		}

		parent::after();
	}
}
