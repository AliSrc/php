
<?php

namespace Ali\Controllers;
use Ali\Core\App;

class PizzaController {

    public function index()
    {
    	$pizzas = App::get('database')->selectPizzas('pizzas');
        return view('menu', compact('pizzas', 'categories', 'toppings'));
    }
}
