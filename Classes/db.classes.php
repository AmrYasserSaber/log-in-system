<?php 

Class Dbh{
	protected function connect(string $host, string $dbname, string $username, string $password): PDO {
		try {
			$dsn = "pgsql:host=$host;dbname=$dbname;";
			$pdo = new PDO($dsn, $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch (PDOException $e) {
			die("Error connecting to database: " . $e->getMessage());
		}
	}
	

}

