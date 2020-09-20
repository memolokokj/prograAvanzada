<?php 

$mysqli = new mysqli("localhost", "root", "", "clase");

 
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}else{
	/**INSERTAR AQUÍ**/
	$sentencia = $mysqli->prepare("insert into usuario(email,contraseña,año) values(?,?,?)");
	$sentencia->bind_param("ssi",$_POST["email"],$_POST["pass"],$_POST["year"]);
	$sentencia->execute();
	$sentencia->close();
}

$mysqli->close();

?>