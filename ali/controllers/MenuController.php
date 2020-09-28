<?php

namespace Ali\Controllers;
use Ali\Core\App;

class MenuController {

    public function index()
    {
	    $pizzas = App::get('database')->selectPizzas('pizzas');
        $categories = App::get('database')->selectCategories('categories');
        $toppings = App::get('database')->selectToppings('toppings');
	    return view('menu', compact('pizzas', 'categories', 'toppings'));
    }

    public function addMenu()
    {
        $categories = App::get('database')->selectCategories('categories');
        $pizzas = App::get('database')->selectPizzas('pizzas');
        $toppings = App::get('database')->selectTop('toppings');
        return view('addmenu', compact('categories', 'toppings', 'pizzas'));
    }

    public function editPizza(){
	$pizzas = App::get('database',)->selectPizzas('pizzas');
	return view('editpizza', compact('pizzas'));
    }

    public function category()
    {
        $categories = App::get('database')->selectCategories('categories');
        return view('category', compact('categories'));
    }

    public function storeCategory()
    {
        $category = $_POST['category'];
        App::get('database')->insertCategory('categories', $category);
        return redirect('category');
    }

     public function store()
    {
        $pizza_name = $_POST['pizza_name'];
        $pizza_number = $_POST['pizza_number'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $tops = $_POST['tops'];
        $errorMessage = array();
        $valid = true;

        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if (!preg_match("/^[a-zA-Z]*$/", $pizza_name)){
                $errorMessage[] = 'Insert a valid pizza name';
            }else{
                $pizza_name = $_POST['pizza_name'];
            }

        if (!preg_match("/^[0-9]*$/", $pizza_number)){
            $errorMessage[] = 'Insert a valid pizza number';
        }else{
            $pizza_number = $_POST['pizza_number'];
        }
        if (!preg_match("/^[0-9]*$/", $price)){
            $errorMessage[] = 'Insert a valid price';
        }else{
            $price = $_POST['price'];
        }
        if ($valid == false) {
            return redirect('addmenu', compact($errorMessage));
        }else {
        App::get('database')->insertpizza('pizzas', $pizza_number, $pizza_name, $price, $category, $tops);
        return redirect('addmenu');
        }
    }

    public function addtopping()
    {
        $categories = App::get('database')->selectCategories('categories');
        $toppings = App::get('database')->selectCategories('toppings');
        return view('addtopping', compact('categories', 'toppings'));
    }


    public function storeTopping()
    {
        $topping = $_POST['topping'];
        $price = $_POST['price'];
        App::get('database')->insertTopping('toppings', $topping, $price);
        return redirect('addtopping');
    }
}
