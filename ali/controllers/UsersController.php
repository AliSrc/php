<?php

namespace Ali\Controllers;
use Ali\Core\App;

class UsersController
 {
    public function index()
    {
       $users = App::get('database')->selectAll('users');
       return view('users', compact('users'));
    }


    public function store()
    {
        $name = $_POST['name'];

        App::get('database')->insertName('users', $name);

        return redirect('users');
    }

    public function destroy()
    {
        $id = $_POST['id'];

        App::get('database')->deleteName('name', $id);

        return redirect('users');
    }
}
