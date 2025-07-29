<?php

namespace Classes;

use http\Client\Curl\User;

class Database
{
	private $conn;
	
	public function __construct(public string $host, public string $username, public string $password, public string $dbName)
	{
		$this->conn = mysqli_connect($host, $username, $password, $dbName);
	}
	
	public function selectAll(string $table, string $columns = '*'): array|string
	{
		$query = "SELECT $columns FROM $table";
		$result = mysqli_query($this->conn, $query);
		
		if (mysqli_num_rows($result) > 0) {
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			return "No data found!";
		}
	}
	
	public function selectWithCondition(string $table, string $conditions, string $columns = '*'): array|string
	{
		$query = "SELECT $columns FROM $table WHERE $conditions";
		$result = mysqli_query($this->conn, $query);
		
		if (mysqli_num_rows($result) > 0) {
			$users = [];
			while ($user = mysqli_fetch_assoc($result)) {
				$users[] = $user;
			}
			return $users;
		}
		return "No data found!";
	}
	
	public function insert(string $table, string $columns, string $values): string
	{
		$query = "INSERT INTO $table ($columns) VALUES ($values)";
		$result = mysqli_query($this->conn, $query);
		
		if ($result) {
			return "Data added successfully!";
		} else {
			return "Can't add your data!";
		}
	}
	
	public function selectOne(string $table, int $id, string $columns = '*'): array|string
	{
		if ($this->checkIfIdExists($table, $id)) {
			$query = "SELECT $columns FROM $table WHERE `id` = $id";
			$result = mysqli_query($this->conn, $query);
			
			return mysqli_fetch_assoc($result);
		} else {
			return "No data found";
		}
	}
	
	public function update(string $table, int $id, string $columns, string $values): string
	{
		if ($this->checkIfIdExists($table, $id)) {
			$columns = explode(', ', $columns);
			$values = explode(', ', $values);
			
			$columns_values = [];
			for ($i = 0; $i < count($columns); ++$i) {
				$columns_values[] = "{$columns[$i]} = {$values[$i]}";
			}
			
			$query = "UPDATE $table SET " . implode(', ', $columns_values) . " WHERE `id` = $id";
			$result = mysqli_query($this->conn, $query);
			
			if ($result) {
				return "Data updated successfully!";
			} else {
				return "Can't update your data!";
			}
		} else {
			return "No data found!";
		}
	}
	
	public function delete(string $table, int $id)
	{
		if ($this->checkIfIdExists($table, $id)) {
			$query = "DELETE FROM $table WHERE `id` = $id";
			$result = mysqli_query($this->conn, $query);
			
			if ($result) {
				return "Data deleted successfully!";
			} else {
				return "Can't delete data!";
			}
		} else {
			return "No data found!";
		}
	}
	
	private function checkIfIdExists(string $table, int $id): bool
	{
		$query = "SELECT * FROM $table WHERE id = $id";
		$result = mysqli_query($this->conn, $query);
		
		if (mysqli_num_rows($result) === 1) {
			return true;
		}
		return false;
	}
}