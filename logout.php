<?php
	include 'includes/cabecera.php';

	session_destroy();
	echo '<script>window.location="index.php"</script>';

	include 'includes/pie.php';
?>