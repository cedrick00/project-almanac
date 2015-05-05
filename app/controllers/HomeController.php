<?php

class HomeController extends BaseController {

	protected $layout = "front.tpl.main";

	public function home()
	{
		$this->layout->content = View::make('front.home');
	}

}