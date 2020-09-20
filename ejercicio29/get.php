<?php 

$mysqli = new mysqli("localhost", "root", "", "clase");

 
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}else{
	/**INSERTAR AQUÍ**/
	$usuarios = $mysqli->prepare("select* from usuario");
    $usuarios->execute();
    $resultusuarios = $usuarios->get_result();
    $rows = array();
    
	while($r = mysqli_fetch_assoc($resultusuarios)) {
	    $rows[] = $r;
	}
	echo json_encode($rows);
	$usuarios->close();
}

$mysqli->close();
?>