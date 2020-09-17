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
        App::get('database')->firstInstall();
        return redirect('menu');
    }
}
