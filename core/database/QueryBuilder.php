<?php

namespace Ali\Core\Database;
use PDO;

class QueryBuilder{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectPizzas($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}  ORDER BY number");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectCategories($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insertUser($table, $name, $lastname, $email, $phone, $password)
    {
        $sqlcheck = "SELECT COUNT(name) FROM {$table} WHERE name='{$name}'";
        $result = $this->pdo->prepare($sqlcheck);
        $result->execute();
        $numberofRows = $result->fetchColumn();

        if ($numberofRows < 1){
        $statement = $this->pdo->prepare(
                          "CREATE TABLE IF NOT EXISTS {$table} (
                          ID int(11) AUTO_INCREMENT,
                          name varchar(255) NOT NULL,
                          PRIMARY KEY  (ID));
                          /* Creating table if not exists ends here and Insert going progressed*/
                          INSERT INTO {$table} (name, lastname, email, phone, password)
                          VALUES ('{$name}', '{$lastname}', '{$email}', '{$phone}', md5('{$password}'));"
                      );
        $statement->execute();
        } else {
            $errorMessage= "This username is already taken!";
        }
    }

  public function insertPizza($table, $number, $pizzaName, $price, $category)
      {
          $statement = $this->pdo->prepare(
            "INSERT INTO {$table} (number, pizzaName, price, category)
            VALUES ('{$number}', '{$pizzaName}', '{$price}', '{$category}');"
          );
          $statement->execute();
      }

      public function firstInstall()
      {
        $statement = $this->pdo->prepare(
          "CREATE TABLE IF NOT EXISTS users (
          id int(11) NOT NULL AUTO_INCREMENT,
          name varchar(255) NOT NULL,
          lastname varchar(50) NOT NULL,
          email varchar(75) NOT NULL,
          phone varchar(75) NOT NULL,
          password varchar(255) NOT NULL,
          PRIMARY KEY  (id)
          );

          CREATE TABLE IF NOT EXISTS categories (
          category_id int(11) NOT NULL AUTO_INCREMENT,
          category_name varchar(50) NOT NULL,
          PRIMARY KEY (category_id)
          );

          CREATE TABLE IF NOT EXISTS pizzas (
          pizza_id int(11) NOT NULL AUTO_INCREMENT,
          number int(11) UNSIGNED NOT NULL,
          pizzaName varchar(150) NOT NULL,
          price varchar(4) NOT NULL,
          category int(11) NOT NULL,
          PRIMARY KEY  (pizza_id),
          FOREIGN KEY (category) REFERENCES categories(category_id)
          );

          CREATE TABLE IF NOT EXISTS toppings (
          topping_id int(11) NOT NULL AUTO_INCREMENT,
          topping_name varchar(50) NOT NULL,

          );

      ");
        $statement->execute();
      }
}
