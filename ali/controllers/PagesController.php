<?php

namespace Ali\Controllers;

use Ali\Core\App;

class PagesController {
	public function home() {
		return view('index');
	}

	public function about() {
		return view('about');
	}

	public function contact() {
		return view('contact');
	}

	public function menu() {
		return view('menu');
	}

	public function firstInstall() {
		return view('firstInstall');
	}
	public function firstInstallStore() {
		App::get('database')->firstInstall();

		return view('firstInstall');
	}
}
