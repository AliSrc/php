<?php

namespace Ali\Controllers;
use Ali\Core\App;

class RegistrationController
 {
    public function index()
    {
       return view('registration');
    }

    public function store()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        App::get('database')->insertUser('users', $name, $lastname, $email, $phone, $password);

        return redirect('users');
    }
}
