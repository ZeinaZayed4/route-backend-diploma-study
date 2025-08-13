<?php

namespace MVC;

abstract class Model
{
	private $conn;
	protected string $table;
	
	public function __construct()
	{
		$this->conn = mysqli_connect('localhost', 'root', '', 'route_blog');
		$this->setTable();
	}
	
	public abstract function setTable();
	
	public function selectAll(string $columns = '*'): array|string
	{
		$query = "SELECT $columns FROM $this->table";
		$result = mysqli_query($this->conn, $query);
		
		if (mysqli_num_rows($result) > 0) {
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		} else {
			return 'No data found';
		}
	}
}