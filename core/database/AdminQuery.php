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

}
