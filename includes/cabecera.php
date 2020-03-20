<?php 
	session_start();
	include 'includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="keywords" content="HTML,CSS,JavaScript,MySQL,PHP,Art,images,social,network,beautiful,drawing,painting,digital,3d">
		<meta name="description" content="Free social network to share and discover new art">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link  rel="icon" href="images/logo.png"/>
		<meta name="author" content="Julen Castillo">
		<meta charset="UTF-8">
		<title>IMgapp</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Play&display=swap" rel="stylesheet">
	</head>

	<body onload="animacionLogo()">
		<main>
			<header>
				
				<!-- Este es el menú de usuario. La barra superior del navegador. No confundir con el menú de filtros. -->

				<nav class="menu">
					<a href="index.php"><img class="logotipo" src="images/logo.png" alt="Logo"></a>
					<input type="search" id="busqueda" class="menu__buscar" placeholder="Buscar..."><img onclick="buscarPublicaciones()" class="botonBuscar" src="images/search.svg" alt="Buscar">
					<ul class="menu__lista">

						<?php
							if(isset($_SESSION['usuario'])) {
								echo '<li class="autor__efecto"><a href="publicar.php"><img class="menu__iconos" src="images/upload.svg" alt="Subir archivos"></a></li>';
							}else {
								echo '<li class="autor__efecto" onclick="abrirFormulario()"><img class="menu__iconos" src="images/upload.svg" alt="Subir archivos"></li>';
							}
						?>
						
						<li class="autor__efecto"><img class="menu__iconos" src="images/notification.svg" alt="Notificaciones"></li>
						<li class="autor__efecto"><img class="menu__iconos" src="images/message.svg" alt="Mensajes"></li>
						<?php

							//	Verifica si hay una sesión iniciada. Si la hay, crea el div del menú de usuario con la foto del perfil en cuestión (si es que tiene foto). Si no tiene, o no hay sesión iniciada, saldrá la foto por defecto.

							if(isset($_SESSION['usuario'])){
								echo '<li class="autor__efecto" onclick="abrirFormulario()"><img class="menu__iconos perfil" src="images/perfiles/'.$_SESSION['foto'].'" alt="Mi Perfil"></li>';
							}else {
								echo '<li class="autor__efecto" onclick="abrirFormulario()"><img class="menu__iconos perfil" src="images/perfiles/account.png" alt="Mi Perfil"></li>';
							}
						?>
					</ul>
				</nav>
			</header>

			