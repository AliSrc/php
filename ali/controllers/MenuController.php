<?php

namespace Ali\Controllers;
use Ali\Core\App;

class MenuController {
    public function index()
    {
       return view('addmenu');
    }

     public function store()
    {
        // dd($_POST);
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        App::get('database')->insertProduct('product', $productName, $price);
        return redirect('addmenu', compact($message));
    }

}
