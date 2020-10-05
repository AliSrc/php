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
		return view('admin');
	}

	public function registerAdmin() {
		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$email = "";
		$phone = $_POST['phone'];
		$valid = true;
		$errorMessage = array();
		foreach ($_POST as $key => $value) {
			if (empty($_POST[$key])) {
				$valid = false;
			}
		}

		if ($valid == true) {
			if ($_POST['password'] != $_POST['confirm_password']) {
				$errorMessage[] = 'Passwords should be same.';
				$valid = false;
			} else {
				$password = $_POST['password'];
			}

			if (!isset($error_message)) {
				if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
					$errorMessage[] = "Invalid email address.";
					$valid = false;
				} else {
					$email = $_POST['email'];
				}
			}
			if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
				$errorMessage[] = 'Insert a valid username';
			} else {
				$name = $_POST['name'];
			}
		} else {
			$errorMessage[] = "All fields are required.";
		}

		if ($valid == false) {
			$errorMessage = "Username has already been taken";
			return view('adminregister', compact('errorMessage'));
		} else {
			App::get('adminQuery')->insertAdmin('admins', $name, $lastname, $username, $email, $phone, $password);
			$errorMessage = "Admin created succesfully!";
			return view('index', compact('errorMessage'));
		}
	}

	public function adminLogin() {
		$admin = $_POST['admin'];
		$password = md5($_POST['adminPassword']);
		$users = App::get('database')->selectAll('admins');
		foreach ($users as $user) {
			if ($admin == $user->username && $password == $user->password) {
				die('Logged in');
			} else {
				die('FAIL!!!');
			}
		}
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
		$tableCount = App::get('database')->ifExistsInDb();
		if ($tableCount > 0) {
			$errorMessage = "Tables are already created";
			return view('index', compact('errorMessage'));
		} else {
			App::get('database')->firstInstall();
			return view('adminregister');
		}

	}
}
