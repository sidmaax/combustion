<?php

use Combustion\Ninja;

class HomeController {

	public function index() {
		$ninja = new Ninja(APP_PATH . "views/master");
		$ninja->title = 'Home';
		$ninja->content = "Hi I'm home";
		echo $ninja->output();
	}

}