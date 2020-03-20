<?php

	$host_name = "localhost";
	$user_name = "id9090490_uimgapp";
	$password = "Inefable1";
	$database = "id9090490_imgapp";
	$ruta = 'uploads/';		//	Esta ruta es para las subidas de imágenes

	$enlace = mysqli_connect($host_name, $user_name, $password, $database);

	if(mysqli_connect_errno()) {
		echo 'No se ha podido conectar a la base de datos'.mysqli_connect_error();
	}

?>