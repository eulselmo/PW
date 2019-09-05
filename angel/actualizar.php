<?php
	session_start();
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Perfil Mio</title>
		<link rel= "stylesheet" type="text/css" href= "CSS/actualizar.css">
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
				<a id="cursor" href="publicaciones_mias.php">FOTOS</a> 
				<a id="cursor" href="actualizar.php">INFORMACION</a>
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

			<article id="casilla">

				<img src="angel_20170421_1151.jpg" alt = "Foto" id="usuarioCasilla">
				<input type = "submit" id ="Modificar" value = "Cambiar foto"/>

				<form action="php/actualizar_usuario.php" method="post" id="datos">
					<fieldset id="cuadro">
					<label for="actualizar_nombre"></label>
					<input type = "text" placeholder="Nombre" id = "actualizar_nombre" name="actualizar_nombre" size = "25" maxlength="15"/>

					<label for="actualizar_apellido"></label>
					<input type = "text" placeholder="Apellidos" id ="actualizar_apellido" name="actualizar_apellido" size = "25"	maxlength="30"/> 
					<br>
				
					<br>

					<label for="actualizar_usuario"></label>
					<input type = "text" placeholder="Nombre de Usuario" id = "actualizar_usuario" name="actualizar_usuario" size = "25" />

					<label for="actualizar_correo">	</label>
					<input type = "text" placeholder="Correo electr&oacute;nico" id ="actualizar_correo" name="actualizar_correo" size = "25" maxlength="30"/> 
					<br>

					<br>				

					<label for="actualizar_contrasenia">	</label>
					<input type = "password" placeholder="Contrase&ntilde;a" id = "actualizar_contrasenia" name="actualizar_contrasenia" size = "25" maxlength="20"/> 
				
					<label for="actualizar_repeticioncontrasenia">	</label>
					<input type = "password" placeholder="Repetici&oacute;n de Contrase&ntilde;a" id ="actualizar_repeticioncontrasenia" name="actualizar_repeticioncontrasenia" size = "25" maxlength="20"/>
					<br>

					<br>

					<label for="actualizar_sexo" id="actualizar_sexo">Sexo:</label>
					<select name="actualizar_sexo">
     					<option value="Hombre">Hombre</option>
    					<option value="Mujer">Mujer</option>
    				    <option value="Otro">Otro</option>
  					</select>
				
					<label for="actualizar_cumpleanios" id="actualizar_cumpleanios">Fecha de Nacimiento:</label>
					<input type="date" name="actualizar_cumpleanios" step="1" min="1918-01-01" max="1998-12-31" value="2013-01-01">
					<br>

					<br>				

					<input type = "submit" id = "button" value = "Actualizar"/>

					</fieldset>
				</form>

			</article>

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


