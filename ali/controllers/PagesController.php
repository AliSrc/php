<?php

namespace Ali\Controllers;

use Ali\Core\App;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function menu()
    {
        return view('menu');
    }

    public function admin()
    {
        // $users = App::get('AdminQuery')->adminUsers('users');
        return view('admin');

        // $users = App::get('database')->selectAll('users');
        // return view('admin', compact('users'));
    }

    public function registerAdmin()
    {
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
            return view('adminregister', compact('errorMessage'));
        } else {
            $errorMessage = "User created succesfully!";
            App::get('database')->insertAdmin('admins', $name, $lastname, $username, $email, $phone, $password);
            $errorMessage = "User created succesfully!";
            return view('index', compact('errorMessage'));
        }
    }

    public function adminLogin()
    {
        $admin = $_POST['admin'];
        $password = $_POST['adminPassword'];
        $user = App::get('database')->selectAll('users');
        var_dump($user);
        // foreach ($users as $user) {
        //     if ($admin == $user->username && $password == $user->password) {
        //         die('Logged in');
        //     } else {
        //         die('FAIL!!!');
        //     }
        // }
        return view('admin', compact('users'));
    }

    public function dashboard()
    {
        $user = App::get('database')->selectAll('users');
        return view('dashboard', compact('user'));
    }

    public function firstInstall()
    {
        return view('firstInstall');
    }
    public function firstInstallStore()
    {
        App::get('database')->firstInstall();

        return view('adminregister');
    }
}
