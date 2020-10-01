<?php 
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);

	if (!isset($_SESSION)) {
		session_start();
	}

	if (!defined("BASE_PATH")) {
		defined("BASE_PATH", "http://localhost/unidad4")
	}

 ?>