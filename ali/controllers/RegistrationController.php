<?php

namespace Ali\Controllers;
use Ali\Core\App;

class RegistrationController
 {
    public function index()
    {
       return view('registration');
    }

    /**
     * @throws \Exception
     */
    public function registerUser()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $valid = true;
        $errorMessage = array();
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if($valid == true) {
            if ($_POST['password'] != $_POST['confirm_password']) {
                $errorMessage[] = 'Passwords should be same.';
                $valid = false;
            }else {
                $password = $_POST['password'];
            }

            if (! isset($error_message)) {
                if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $errorMessage[] = "Invalid email address.";
                    $valid = false;
                }else{
                    $email = $_POST['email'];
                }
            }
            if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){
                $errorMessage[] = 'Insert a valid username';
            }else{
                $name = $_POST['name'];
            }
        }
        else {
            $errorMessage[] = "All fields are required.";
        }

        if ($valid == false) {
            return redirect('registration', compact($errorMessage));
        }else {
            $message = "User created succesfully!";
            App::get('database')->insertUser('users', $name, $lastname, $email, $phone, $password);
            $message = "User created succesfully!";
            return redirect('users', compact($message));
        }
    }
}
