<?php

class HomeController {

	public function index() {
		echo "We're in home";
		View::make();
	}

}