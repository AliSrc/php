<?php

namespace Ali\Controllers;
use Ali\Core\App;

class MenuController {

    public function addMenu()
    {
        $categories = App::get('database')->selectCategories('categories');
        return view('addmenu', compact('categories'));
    }

    public function index()
    {
	    $pizzas = App::get('database')->selectPizzas('pizzas');
        $categories = App::get('database')->selectCategories('categories');
	    return view('menu', compact('pizzas', 'categories'));
    }

     public function store()
    {
        $pizzaName = $_POST['pizzaName'];
        $number = $_POST['number'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        App::get('database')->insertpizza('pizzas', $number, $pizzaName, $price, $category);
        return redirect('addmenu', compact($message));
    }
}
