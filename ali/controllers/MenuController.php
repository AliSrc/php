<?php

namespace Ali\Controllers;
use Ali\Core\App;

class MenuController {
    public function addMenu()
    {
       return view('addmenu');
    }


    public function index()
    {
	    $products = App::get('database')->selectAll('product');
	    return view('menu', compact('product'));
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
