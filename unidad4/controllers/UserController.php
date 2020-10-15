<?php 
	
include_once "conecction.php";
if (isset($_POST["action"])) 
{
	switch ($_POST["action"])
	{
		case 'store':
			$name = strip_tags($_POST["name"]);
			$lastName = strip_tags($_POST["lastName"]);
			$email = strip_tags($_POST["email"]);
			$pass = strip_tags($_POST["pass"]);

			UserController->store($name, $lastName, $email, $pass);
			break;
	}
}

class UserController
{
	function get()
	{
		$conn = connect();
		if (!$conn->connect_error) 
		{
			$query = "select* from users";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$users = $results->fetch_all(MYSQL_ASSOC);
		}else
		{
			return array();
		}
	}

	function store($name, $lastName, $email, $pass)
	{
		$conn = connect();
		if (!$conn->connect_error) 
		{
			if ($name != "" && $lastName != "" && $email != "" && $pass != "") 
			{
				$query = "insert into users";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();
			}
		}	
		else
		{
			return array();
		}
	}
}

?>