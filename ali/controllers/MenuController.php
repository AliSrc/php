<?php

namespace Ali\Controllers;
use Ali\Core\App;

class MenuController {

    public function addMenu()
    {
        $categories = App::get('database')->selectCategories('categories');
        $toppings = App::get('database')->selectCategories('toppings');
        return view('addmenu', compact('categories', 'toppings'));
    }

    public function addtopping()
    {
        $categories = App::get('database')->selectCategories('categories');
        $toppings = App::get('database')->selectCategories('toppings');
        return view('addtopping', compact('categories', 'toppings'));
    }

    public function index()
    {
	    $pizzas = App::get('database')->selectPizzas('pizzas');
        $categories = App::get('database')->selectCategories('categories');
        $toppings = App::get('database')->selectToppings('toppings');
	    return view('menu', compact('pizzas', 'categories', 'toppings'));
    }

     public function store()
    {
        $pizza_name = $_POST['pizza_name'];
        $pizza_number = $_POST['pizza_number'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        App::get('database')->insertpizza('pizzas', $pizza_number, $pizza_name, $price, $category);
        return redirect('addmenu');
    }

    public function storeTopping()
    {
        $topping = $_POST['topping'];
        $price = $_POST['price'];
        App::get('database')->insertTopping('toppings', $topping, $price);
        return redirect('addtopping');
    }
}
