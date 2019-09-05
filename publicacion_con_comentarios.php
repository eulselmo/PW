<?php
	session_start();
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Publicaci&oacute;n</title>
		<link rel= "stylesheet" type="text/css" href= "CSS/publicacion_con_comentarios.css">
		<link rel="shortcut icon" href="icono.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>	

		<header>

			<a href="portada.php"><img src="fotos/hi5.png" alt = "Logo" id="modificado1"></a>

			<a href="portada.php"><p id="titulo">HiFIVE</p></a>
					

		<article>

			<a href="actualizar.php"><img src="fotos/angel_20170421_1151.jpg" alt = "Foto" id="modificado2"></a>
			<form action="php/cerrar_sesion.php" method="post">
				
				<input type="submit" value="Salir" id="salir">
		
			</form>

		</article>		

		</header>

		<section id="navegador">
			<nav id="opciones">
				<a id="cursor" href="portada.php">BIOGRAFIA</a>
				<a id="cursor" href="publicaciones_otro.php">FOTOS</a> 
				<a id="cursor" href="info_otro_usuario.php">INFORMACION</a>
			</nav>
		</section>
	
		<section id="usuarios">
			<?php
				include_once 'php/conexion_usuario.php';
				$nombreUsuario=array('');
				
				$sql = "select nombreUsuario from usuario";
				$resultado_consulta = mysql_query($sql);
				
				$row = mysql_fetch_array($resultado_consulta);
				
				//Si no esta vacío
				if($row != NULL){
					while($row){
						array_push($nombreUsuario, $row['nombreUsuario']);
						//delvuelve el array de usuarios
						$row = mysql_fetch_array($resultado_consulta);
					}
					for ($i=1; $i<count($nombreUsuario); $i++ ){
						echo '
							<article id="user">
							<a href="info_otro_usuario"><img src="fotos/julio_20170421_1154.jpg" alt = "Foto" id="usuario"></a>
							<br>
							<br>
							<p id="nombre">'. $nombreUsuario[$i] .'</p>
							</article>';	
					}
					
				}
			
			?>			
		</section>	
			
		<section id="entradas">

			<?php
				include_once 'php/conexion_usuario.php';
				$nombreUsuario=array('');
				$horaPublicacion=array('');
				$tituloPublicacion=array('');
				$textoPublicacion=array('');

				$sql = "select nombreUsuario, horaPublicacion, tituloPublicacion, textoPublicacion from publicaciones";
				$resultado_consulta = mysql_query($sql);
				
				$row = mysql_fetch_array($resultado_consulta);
				
				//Si no esta vacío
				if($row != NULL){
					while($row){
						array_push($nombreUsuario, $row['nombreUsuario']);
						array_push($horaPublicacion, $row['horaPublicacion']);
						array_push($tituloPublicacion, $row['tituloPublicacion']);
						array_push($textoPublicacion, $row['textoPublicacion']);

						$row = mysql_fetch_array($resultado_consulta);
					}
					for ($i=1; $i<count($nombreUsuario); $i++ ){

						echo '
							<article id="carmen">
								<p id="nombrePublicacion">'. $nombreUsuario[$i] .'</p>
								<p id="horaPublicacion">'. $horaPublicacion[$i] .'</p>
								<img src="fotos/carmen_20170421_1147.jpg" alt = "Foto" id="usuarioPublicacion">
								<a href="publicacion_con_comentarios.php"><h4 id="tituloPublicacion">'. $tituloPublicacion[$i] .'</h4></a>
								<p id="textoPublicacion">'. $textoPublicacion[$i] .'</p>
							</article>

							';	

					}	
				}
			?>
			<article id="comentarios">
				<p id="nombreComentario">Dani</p>
				<p id="horaComentario">Hace 1 minuto...</p>
				<img src="dani_20170421_1212.jpg" alt = "Foto" id="usuarioComentario">
				<p id="textoComentario">Espero que lo paseis genial en vuestra aventura! Saludos :).</p>

				<p id="nombreComentario">Julio</p>
				<p id="horaComentario">Hace 3 minutos...</p>
				<img src="julio_20170421_1154.jpg" alt = "Foto" id="usuarioComentario">
				<p id="textoComentario">Ya me contareis de vuelta gente ;).</p>

			</article>

			<form id="casilla" action="php/comprobacion_comentario.php" method="post">
				<?php			
					include_once 'php/conexion_usuario.php';

					echo '	
						<p id="nombreUsuario">'. $_SESSION['usuariologeo'] .'</p>
						<img src="fotos/julio_20170421_1154.jpg" alt = "Foto" id="usuarioCasilla">';
				?>	
				<textarea id = "casillaTexto" placeholder=	"Escribe tu comentario ..." rows="4" cols="80" maxlength="200" ></textarea>
				<input type = "submit" id = "Envio" value = "Enviar"/>


			</form>

		</section>		
		
		<aside>
			<article id="Enlinea">
				<h4 id="activo">En linea</h4>
			</article>
			
			<?php
				include_once 'php/conexion_usuario.php';

						echo '
							<article id="line">
							<p id="lineName">'. $_SESSION['usuariologeo'] .'</p>
							<a href="julio/julio_20170421_1152.html"><img src="fotos/julio_20170421_1154.jpg" alt = "Foto" id="linePhoto"></a>
							</article>';	
			
			?>	

		</aside>
		
		<footer>

			<h4>Contacto</h4>
			<p>hifive@gmail.es</p> 
			<address>Granada, 18071, Telefono: 958596931</address>
			<h4>Acerca de </h4>
			<a href="../como_se_hizo.pdf"><p>Como se hizo</p></a> 
			
		</footer>

		
	</body>
</html>