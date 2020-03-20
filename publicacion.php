<?php
	include 'includes/cabecera.php';
?>

<section class="publicacion">

<?php

	$id = $_GET['id'];

	$query_imagen = "SELECT * FROM publicaciones WHERE id_publicacion = $id";
	if($result = mysqli_query($enlace, $query_imagen)) {
		while($fila = mysqli_fetch_array($result)) {
			$query_usuario = "SELECT * FROM usuarios WHERE id_usuario = '$fila[id_usuario]'";
			$resultado_usuario = mysqli_query($enlace, $query_usuario);
				while($fila_usuario = mysqli_fetch_array($resultado_usuario)) {

//-------------------------------------------------------------------------------------
		if(isset($_GET['liki'])){
			$user = '.'.trim($_SESSION['usuario']).'.';
			$user_replace = trim($_SESSION['usuario']).'.';
			$busqueda = strpos($fila['usuario_like'], $user);
			//	$fix_puntos = strpos('..', $fila['usuario_like']);


			//	var_dump($user);
			//	echo '<script>alert("'.$user.'");</script>';
			//	echo '<script>alert("'.$busqueda.'");</script>';
			 if($busqueda===false){
				$fila['usuario_like'] .= $user;
				$new_like = $fila['likes_publicacion']+1;
				$query_likes = "UPDATE publicaciones SET likes_publicacion = '$new_like', usuario_like = '$fila[usuario_like]' WHERE id_publicacion = '$id'";
				mysqli_query($enlace, $query_likes);
			}else {
				$new_user_string = str_replace($user_replace, '', $fila['usuario_like']);
				$new_like = $fila['likes_publicacion']-1;
				$query_likes = "UPDATE publicaciones SET likes_publicacion = '$new_like', usuario_like = '$new_user_string' WHERE id_publicacion = '$id'";
				mysqli_query($enlace, $query_likes);
			}
		}
			
//-------------------------------------------------------------------------------------
					echo '<div class="publicacion__contenedor">
						<img class="publicacion__imagen" src="uploads/'.$fila['imagen_publicacion'].'" alt="'.$fila['titulo_publicacion'].'">
					</div>
					<div class="columna__info">
					<img class="foto__usuario" src="images/perfiles/'.$fila_usuario['foto_perfil'].'" alt="'.$fila_usuario['nombre_usuario'].'">
						<a href="usuario.php?usuario='.$fila_usuario['id_usuario'].'"><h3>'.$fila_usuario['nombre_usuario'].'</h3></a>
						<h2>'.$fila['titulo_publicacion'].'</h2>
						<p>'.$fila['texto_publicacion'].'</p>';

						if(isset($_SESSION['usuario'])) {
							echo '<a class="no__decor" href="publicacion.php?id='.$id.'&liki='.$fila['likes_publicacion'].'"><button class="likebutton boton__likes"><img src="images/likeWh.png" alt="Like">'.$fila['likes_publicacion'].'</button></a>';
						}else {
							echo '<button onclick="abrirFormulario()" class="likebutton boton__likes"><img src="images/likeWh.png" alt="Like">'.$fila['likes_publicacion'].'</button>';
						}
						
						echo '<h3> Comentarios</h3>';

						$query_comentario = "SELECT * FROM comentarios WHERE id_publicacion = '$id'";
						$resultado_comentario = mysqli_query($enlace, $query_comentario);
						while($fila_comentario = mysqli_fetch_array($resultado_comentario)) {
							$query_usuario2 = "SELECT * FROM usuarios WHERE id_usuario = '$fila_comentario[id_usuario]'";
							$resultado_usuario2 = mysqli_query($enlace, $query_usuario2);
							while($fila_usuario2 = mysqli_fetch_array($resultado_usuario2)){
								echo '<div class="columna__info__comentario"><img class="comentario__usuario" src="images/perfiles/'.$fila_usuario2['foto_perfil'].'"><h4><a href="usuario.php?usuario='.$fila_usuario2['id_usuario'].'">'.$fila_usuario2['nombre_usuario'].'</a></h4><div class="contenido__comentario">'.$fila_comentario['contenido_comentario'].'</div></div>';
							}
						}

						if(isset($_SESSION['usuario'])) {
							echo '<form class="comentar" action="publicarComentario.php?id='.$id.'" method="POST">
								<label for="comentario">Comentar</label><textarea name="comentario" id="comentario" cols="30" rows="10" required></textarea>
								<button class="boton enviar__comentario" name="comentar">Comentar Publicación</button>
							</form>';
						}
						echo '</div>';
					}	
				}
			}
			
?>

</section>
	
<?php

	include 'includes/menu.php';
	include 'includes/pie.php';

?>
