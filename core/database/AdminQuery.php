<?php

namespace Ali\Core\Database;
require_once 'Users.php';
use PDO;

class AdminQuery {
	protected $pdo;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	public function adminUsers($table) {
		$statement = $this->pdo->prepare("SELECT * FROM users");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS, 'Users');
	}

	public function insertAdmin($table, $name, $lastname, $username, $email, $phone, $password) {
		$sqlcheck = "SELECT COUNT(username) FROM {$table} WHERE username='{$username}'";
		$result = $this->pdo->prepare($sqlcheck);
		$result->execute();
		$numberofRows = $result->fetchColumn();

		if ($numberofRows < 1) {
			$statement = $this->pdo->prepare("
               INSERT INTO {$table} (name, lastname, username, email, phone, password, created_at)
               VALUES ('{$name}', '{$lastname}', '{$username}', '{$email}', '{$phone}', md5('{$password}'), NOW());
               ");
			$statement->execute();
		} else {
			$errorMessage = "This username is already taken!";
		}
	}
}
