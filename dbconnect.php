<?php
		/**
		 * dbconnect.php
		 *
		 * Supermarket project 
		 *
		 * @category   Database
		 * @package    Database connectivity
		 * @author     Mangesh Sathe
		 * @copyright  2022 Mangesh Sathe
		 * @license    Open Source
		 * @version    1.0.0
		 * @release    May/02/2022
		 */
	class dbconnect {
	
	private $hostname = 'localhost';
	private $dbname = 'assignment';
	private $username = 'root';
	private $password = '';
	private $pdo;

	function getItemInfo() {
		try {
			$pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", "$this->username", $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));		
		} catch(PDOException $e) {
			die("ERROR: Could not connect. " . $e->getMessage());
		}
		try{
			$sql = "SELECT * FROM `items`";   
			$result = $pdo->query($sql);
			if($result->rowCount() > 0){
				$data = $result->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			} else{
				echo "No records matching your query were found.";
			}
		} catch(PDOException $e){
			die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}
	}
	
	function getOrderedInfo($SKU) {
		try {
			$pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", "$this->username", $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));	
		} catch(PDOException $e) {
			die("ERROR: Could not connect. " . $e->getMessage());
		}

		try{
			$sql = "SELECT * FROM `items` WHERE SKU IN ($SKU)";   
			$result = $pdo->query($sql);
			if($result->rowCount() > 0){
				$data = $result->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			} else{
				echo "No records matching your query were found.";
			}
		} catch(PDOException $e){
			die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}
	}
	
	function getItemDiscInfo($SKU, $quantity) {
	    try {
			$pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", "$this->username", $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));	
		} catch(PDOException $e) {
			die("ERROR: Could not connect. " . $e->getMessage());
		}

		try{
			$sql = "SELECT * FROM `items` WHERE SKU = '$SKU' AND sp_on_SKU = '$quantity'";   
			$result = $pdo->query($sql);
			if($result->rowCount() > 0){
				$data = $result->fetchAll(PDO::FETCH_ASSOC);
				return $data;
			} else{
				echo "No records matching your query were found.";
			}
		} catch(PDOException $e){
			die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}
	}
}