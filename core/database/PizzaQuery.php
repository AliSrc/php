<?php

namespace Ali\Core\Database;

use PDO;

require_once 'Pizzas.php';
require_once 'Toppings.php';

class PizzaQuery {
	protected $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function selectToppings($table) {
		$statement = $this->pdo->prepare("select *
          from $table
          left join pizza_topping
          on pizza_topping.topping_id = toppings.topping_id
          ");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Toppings');
	}

	public function selectCategories($table) {
		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function selectPizzas($table) {
		$statement = $this->pdo->prepare("select * from $table");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Pizzas');
	}

	public function selectTop($table) {
		$statement = $this->pdo->prepare("select topping_id, topping_name, price from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insertPizza($table, $pizza_number, $pizza_name, $price, $category, $tops) {
		$statement = $this->pdo->prepare(
			"INSERT INTO {$table} (pizza_number, pizza_name, price, category)
            VALUES ('{$pizza_number}', '{$pizza_name}', '{$price}', '{$category}');
            ");
		$statement->execute();

		foreach ($tops as $topi) {
			$topping = $topi;
			$statement1 = $this->pdo->prepare(
				"INSERT INTO pizza_topping (pizza_number, topping_id)
              VALUES ('{$pizza_number}', '{$topping}');"
			);
			$statement1->execute();
		}
	}

	public function insertTopping($table, $topping, $price) {
		$statement = $this->pdo->prepare(
			"INSERT INTO {$table} (topping_name, price)
            VALUES ('{$topping}', '{$price}');"
		);
		$statement->execute();
	}

	public function insertCategory($table, $category) {
		$statement = $this->pdo->prepare(
			"INSERT INTO {$table} (category_name)
            VALUES ('{$category}');"
		);
		$statement->execute();
	}

}
