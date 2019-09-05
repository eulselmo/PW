<?php
	session_start();
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Perfil</title>
		<link rel= "stylesheet" type="text/css" href= "CSS/info_otro_usuario.css">
		<link rel="shortcut icon" href="icono.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>	

		<header>

			<a href="portada.php"><img src="foto/hi5.png" alt = "Logo" id="modificado1"></a>

			<a href="portada.php"><p id="titulo">HiFIVE</p></a>
					

		<article>

			<a href="actualizar.php"><img src="fotos/angel_20170421_1151.jpg" alt = "Foto" id="modificado2"></a>
			<form action="php/cerrar_sesion.php" method="post">
				
				<input type="submit" value="Salir" id="salir">


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
							<a href="julio/julio_20170421_1152.html"><img src="fotos/julio_20170421_1154.jpg" alt = "Foto" id="usuario"></a>
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
				
				$sql = "select nombre, apellido, nombreUsuario from usuario where nombreUsuario='".$_GET['nombreUsuario']."' ;";
				$resultado_consulta = mysql_query($sql);

				$row = mysql_fetch_array($resultado_consulta);
				
				if($row != NULL){

					for ($i=1; $i<count($nombreUsuario); $i++ ){
						
						echo '
							<article id="casilla">

							<img src="fotos/julio_20170421_1154.jpg" alt = "Foto" id="usuarioCasilla">
				
							<p id="info1">Nombre de Usuario: '. $row['nombreUsuario'] .'</p>
							<p id="info2">Nombre: '. $row['nombre'] .'</p>
							<p id="info3">Apellidos: '. $row['apellido'] .'</p>

							</article>';
							
					}
					
				}	
				else
					echo '</p> $nombre </p>';	
			
			?>

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