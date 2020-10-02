<?php

namespace Ali\Controllers;

use Ali\Core\App;

class MenuController
{

    public function index()
    {
        $pizzas = App::get('pizzaQuery')->selectPizzas('pizzas');
        $categories = App::get('pizzaQuery')->selectCategories('categories');
        $toppings = App::get('pizzaQuery')->selectToppings('toppings');
        return view('menu', compact('pizzas', 'categories', 'toppings'));
    }

    public function addMenu()
    {
        $categories = App::get('pizzaQuery')->selectCategories('categories');
        $pizzas = App::get('pizzaQuery')->selectPizzas('pizzas');
        $toppings = App::get('pizzaQuery')->selectTop('toppings');
        return view('addmenu', compact('categories', 'toppings', 'pizzas'));
    }

    public function editPizza()
    {
        $pizzas = App::get('pizzaQuery', )->selectPizzas('pizzas');
        return view('editpizza', compact('pizzas'));
    }

    public function category()
    {
        $categories = App::get('pizzaQuery')->selectCategories('categories');
        return view('category', compact('categories'));
    }

    public function storeCategory()
    {
        $category = $_POST['category'];
        App::get('pizzaQuery')->insertCategory('categories', $category);
        return redirect('category');
    }

    public function storeProduct()
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

        if (!preg_match("/^[a-zA-Z]*$/", $pizza_name)) {
            $errorMessage[] = 'Insert a valid pizza name';
        } else {
            $pizza_name = $_POST['pizza_name'];
        }

        if (!preg_match("/^[0-9]*$/", $pizza_number)) {
            $errorMessage[] = 'Insert a valid pizza number';
        } else {
            $pizza_number = $_POST['pizza_number'];
        }
        if (!preg_match("/^[0-9]*$/", $price)) {
            $errorMessage[] = 'Insert a valid price';
        } else {
            $price = $_POST['price'];
        }
        if ($valid == false) {
            return redirect('addmenu', compact($errorMessage));
        } else {
            App::get('pizzaQuery')->insertpizza('pizzas', $pizza_number, $pizza_name, $price, $category, $tops);
            return redirect('addmenu');
        }
    }

    public function addtopping()
    {
        $categories = App::get('pizzaQuery')->selectCategories('categories');
        $toppings = App::get('pizzaQuery')->selectCategories('toppings');
        return view('addtopping', compact('categories', 'toppings'));
    }

    public function storeTopping()
    {
        $onlyCharacters = '/^[a-zA-Z ]*$/';
        $onlyNumbers = '/^[0-9]*$/';
        $topping = $_POST['topping'];
        $price = $_POST['price'];
        $valid = true;
        $errorMessage = ["ali", "mehmet"];

        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $valid = false;
            }
        }

        if (!preg_match($onlyCharacters, $topping)) {
            // $errorMessage[] = "Enter a valid topping name";
            $valid = false;
        } else {
            $topping = $_POST['topping'];
            $errorMessage .= "hello";

        }

        if (!preg_match($onlyNumbers, $price)) {
            // $errorMessage[] = "Please enter a valid price only NUMBERS!";
            $valid = false;
        } else {
            $price = $_POST['price'];
        }

        if ($valid == false) {
            return redirect('addtopping');
        } else {

            App::get('pizzaQuery')->insertTopping('toppings', $topping, $price);
            return view('addtopping', 'errorMessage');
        }
    }
}
