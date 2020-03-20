<?php
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');
function search()
{

	//	Si recibe un valor mediante POST realiza la siguiente función: crear una query que busque 21 publicaciones que contengan lo que se recibe con el POST.

	include 'conexion.php';
	$search = $_POST['search'];
	$query = "SELECT * FROM publicaciones WHERE titulo_publicacion LIKE '%$search%' LIMIT 21";
	if ($result = mysqli_query($enlace,$query)) {		
		while($fila = mysqli_fetch_array($result)) {
		$query_user = "SELECT * FROM usuarios WHERE id_usuario = '$fila[id_usuario]'";
		$resultado_user = mysqli_query($enlace, $query_user);
		while($fila_user = mysqli_fetch_array($resultado_user)) {

			//	Crea una galería con las 21 primeras publicaciones que coincidan con la búsqueda.

  			 	echo '<div class="galeria__obra">
					<div class="galeria__imagen"><a href="publicacion.php?id='.$fila['id_publicacion'].'">
						<div class="imagen__filtro">'.$fila['titulo_publicacion'].'</div>
						<img src="uploads/'.$fila['imagen_publicacion'].'" alt="imagen"></a>
					</div>
					<div class="galeria__autor"><a href="usuario.php?usuario='.$fila_user['id_usuario'].'"><div class="autor__efecto"><img src="images/perfiles/'.$fila_user['foto_perfil'].'" alt=""></div></a></div>
				</div>';
			}
		}
	}
}

search();
?>	

