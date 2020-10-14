<?php 
	
include_once "connectionController.php";
include_once "config.php";

if (isset($_POST["action"])) 
{
	if($_SESSION["token"] == $_POST["token"])
	{
		switch ($_POST["action"])
		{
			case 'store':
				$name = strip_tags($_POST["name"]);
				$lastName = strip_tags($_POST["lastName"]);
				$email = strip_tags($_POST["email"]);
				$pass = strip_tags($_POST["pass"]);

				$userController = new UserController();
				$userController->store($name, $lastName, $email, $pass);
			break;

			case 'update':
				$id = strip_tags($_POST["id"]);
				$name = strip_tags($_POST["name"]);
				$lastName = strip_tags($_POST["lastName"]);
				$email = strip_tags($_POST["email"]);
				$pass = strip_tags($_POST["pass"]);

				$userController = new UserController();
				$userController->update($name, $lastName, $email, $pass, $id);
			break;

			case 'remove':
	            $id = strip_tags($_POST['id']);
	            $userController = new UserController();
	            echo json_encode($userController->remove($id)); 
	        break;
		}
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
			$users = $results->fetch_all(MYSQLI_ASSOC);

			return $users;
		}
		else
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
				$query = "insert into users(name, lastName, email, pass) values(?, ?, ?, ?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param("ssss", $name, $lastName, $email, $pass);
				$prepared_query->execute();
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			}
			else
			{
				$_SESSION["message"] = "check information";
				$_SESSION["status"] = "error";
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			}
		}	
		else
		{
			$_SESSION["message"] = "connections problems";
			$_SESSION["status"] = "error";
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
	}

	function update($name, $lastName, $email, $pass, $id)
	{
		$conn = connect();
		if (!$conn->connect_error) 
		{
			if ($name != "" && $lastName != "" && $email != "" && $pass != "" && $id != "") 
			{
				$query = "update users set name = ?, lastName = ?, email = ?, pass = ? where idUser = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param("ssssi", $name, $lastName, $email, $pass, $id);
				$prepared_query->execute();
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			}
			else
			{
				$_SESSION["message"] = "check information";
				$_SESSION["status"] = "error";
				header("Location: ".$_SERVER["HTTP_REFERER"]);
			}
		}	
		else
		{
			$_SESSION["message"] = "connections problems";
			$_SESSION["status"] = "error";
			header("Location: ".$_SERVER["HTTP_REFERER"]);
		}
	}

	function remove($id)
	{
		$conn = connect();
		if (!$conn->connect_error) 
		{
			if ($id != "") 
			{
				$query = "delete from users where idUser = ?";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param("i", $id);
				if($prepared_query->execute())
				{
					$response = array(
						"status" => "success",
						"messege" => "usuario eliminado correctamente"
					);
					return $response;
				}
				else
				{
					$response = array(
						"status" => "error",
						"messege" => "ocurrio un error en el proceso"
					);
					return $response;
				}
			}
			else
			{
				$response = array(
					"status" => "error",
					"messege" => "verifique la unformacion"
				);
				return $response;
			}
		}	
		else
		{
			$response = array(
				"status" => "error",
				"messege" => "error al conectar"
			);
			return $response;
		}
	}
}

?>