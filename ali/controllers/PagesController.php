<?php

namespace Ali\Controllers;
use Ali\Core\App;

class PagesController {

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

    public function firstInstall()
    {
        // App::get('database')->firstInstall();
        return view('firstInstall');
    }
    public function firstInstallStore()
    {
        App::get('database')->firstInstall();
        // if (!App::get('database')->firstInstall()) {
        //     $message = "Unsuccessfull";
        // } else {
        // $message = "You just created the required tables.";
        // }
        return view('firstInstall');
    }
}
