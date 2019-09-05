<?php
session_start();
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>HiFIVE</title>
		<link rel="shortcut icon" href="fotos/icono.ico">
		<link rel= "stylesheet" type="text/css" href= "CSS/index.css">

	</head>
	<body>

		<audio src="musica/destiny.mp3" autoplay>
			</audio>		

		<header>

			<img src="fotos/hi5.png" alt = "Logo" id="modificado1">

			<p id="titulo">HiFIVE</p>
					

		<article>
			<form action="php/manejador.php" method="post">
				<input type = "text" id = "usuariologeo" name="usuariologeo" placeholder="Usuario" maxlength="20"/> <br><br>
				<input type = "password" id = "passwordlogeo" name="passwordlogeo" placeholder="Contraseña" maxlength="20"/>
				<br>
				<input type="submit" value="Entrar" id="Entrar">	
			</form>
			<?php
				if (isset($_SESSION["fallo"])) {
					echo "Pon bien el usuario y contraseña";
				}
				session_destroy();
			?>
		</article>	

		</header>

		<section id="section1">
			<fieldset>
			<h3>Registro gratuito</h3>
				<form action="php/usuario.php" method="post">
				
				<label for="nombre"></label>
				<input type = "text" placeholder="Nombre" id = "nombre" name="nombre" size = "25" maxlength="15"/>

				<label for="apellidos"></label>
				<input type = "text" placeholder="Apellidos" id ="apellidos" name="apellidos" size = "25"	maxlength="30"/> 
				<br>
				
				<br>

				<label for="nombreUsuario"></label>
				<input type = "text" placeholder="Nombre de Usuario" id = "nombreUsuario" name="nombreUsuario" size = "25" />

				<label for="correo"></label>
				<input type = "text" placeholder="Correo electr&oacute;nico" id ="correo" name="correo" size = "25" maxlength="30"/> 
				<br>

				<br>				

				<label for="contrasenia"></label>
				<input type = "password" placeholder="Contrase&ntilde;a" id = "contrasenia" name="contrasenia" size = "25" maxlength="20"/> 
				
				<label for="repeticionContrasenia"></label>
				<input type = "password" placeholder="Repetici&oacute;n de Contrase&ntilde;a" id ="repeticionContrasenia" name="repeticionContrasenia" size = "25" maxlength="20"/><br>

				<br>

				<label for="sexo" id="sexo">Sexo:</label>
				<select name="sexo">
     					 <option value="Hombre">Hombre</option>
    					 <option value="Mujer">Mujer</option>
    				     <option value="Otro">Otro</option>
  				</select>
				
				<label for="cumpleanios" id="cumpleanios">Fecha de Nacimiento:</label>
				<input type="date" name="cumpleanios" step="1" min="1918-01-01" max="1998-12-31" value="2013-01-01">
				<br>

				<br>				

				<input type = "submit" id = "envio" name="registrarte" value = "Registrarte"/>

			</fieldset>
			</form>
		</section>
		<section id="section2">
			<article class="demo-2 effect">
    		
      				<h3 class="zero">Dise&ntilde;ada por Angel Garcia Illescas</h3>
      				<h3 class="zero">2017</h3>
   			
   				<img id="Foto" class="top" src="fotos/index.jpg" alt=""/>
			</article>
		</section>	

		<footer>

			<h4>Contacto</h4>
			<p>hifive@gmail.es</p> 
			<address>Granada, 18071, Telefono: 958596931</address>
			<h4>Acerca de </h4>
			<a href="como_se_hizo.pdf"><p>Como se hizo</p></a> 

		</footer>
	</body>
</html>