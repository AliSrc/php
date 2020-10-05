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

	public function admin() {
		// $users = App::get('AdminQuery')->adminUsers('users');
		return view('admin');

		// $users = App::get('database')->selectAll('users');
		// return view('admin', compact('users'));
	}

	public function adminLogin() {
		$admin = $_POST['admin'];
		$password = $_POST['adminPassword'];
		$user = App::get('database')->selectAll('users');
		var_dump($user);
		// foreach ($users as $user) {
		// 	if ($admin == $user->username && $password == $user->password) {
		// 		die('Logged in');
		// 	} else {
		// 		die('FAIL!!!');
		// 	}
		// }
		return view('admin', compact('users'));
	}

	public function dashboard() {
		$user = App::get('database')->selectAll('users');
		return view('dashboard', compact('user'));
	}

	public function firstInstall() {
		return view('firstInstall');
	}
	public function firstInstallStore() {
		App::get('database')->firstInstall();

		return view('firstInstall');
	}
}
