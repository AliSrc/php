<?php

namespace Ali\Core\Database;

use PDO;

require_once 'Pizzas.php';
require_once 'Toppings.php';

class QueryBuilder {
	protected $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function insertUser($table, $name, $lastname, $username, $email, $phone, $password) {
		$sqlcheck = "SELECT COUNT(username) FROM {$table} WHERE username='{$username}'";
		$result = $this->pdo->prepare($sqlcheck);
		$result->execute();
		$numberofRows = $result->fetchColumn();

		if ($numberofRows < 1) {
			$statement = $this->pdo->prepare(
				"INSERT INTO {$table} (name, lastname, username, email, phone, password, created_at)
        VALUES ('{$name}', '{$lastname}', '{$username}', '{$email}', '{$phone}', md5('{$password}'), NOW());");
			$statement->execute();
		} else {
			$errorMessage = "This username is already taken!";
		}
	}

	public function selectAll($table) {
		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function firstInstall() {
		$statement = $this->pdo->prepare("
          CREATE TABLE IF NOT EXISTS users (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(25) NOT NULL,
          lastname varchar(25) NOT NULL,
          username varchar(50) NOT NULL,
          email varchar(75) NOT NULL,
          phone varchar(14) NOT NULL,
          password varchar(50) NOT NULL,
          created_at timestamp NOT NULL,
          PRIMARY KEY  (id)
          );

          CREATE TABLE IF NOT EXISTS categories (
          category_id int(11) NOT NULL AUTO_INCREMENT,
          category_name varchar(30) NOT NULL,
          PRIMARY KEY (category_id)
          );

          CREATE TABLE IF NOT EXISTS pizzas (
          pizza_number int(11) NOT NULL,
          pizza_name varchar(30) NOT NULL,
          price varchar(4) NOT NULL,
          category int(11) NOT NULL,
          PRIMARY KEY  (pizza_number),
          FOREIGN KEY (category) REFERENCES categories(category_id)
          );

          CREATE TABLE IF NOT EXISTS toppings (
          topping_id int(11) NOT NULL AUTO_INCREMENT,
          topping_name varchar(30) NOT NULL,
          price varchar(10) NOT NULL,
          PRIMARY KEY (topping_id)
          );

          CREATE TABLE IF NOT EXISTS pizza_topping (
          id int(11) NOT NULL AUTO_INCREMENT,
          pizza_number int(11) NOT NULL,
          topping_id int(11) NOT NULL,
          PRIMARY KEY (id),
          FOREIGN KEY (pizza_number) REFERENCES pizzas(pizza_number) ON DELETE CASCADE,
          FOREIGN KEY (topping_id) REFERENCES toppings(topping_id)ON DELETE CASCADE
          );
      ");
		$statement->execute();
	}
}
