<html>

	<?php
		
		include_once "conexion.php";
		
/*VARIABLES GLOBALES*/
		
		$nombreUsuario = $_POST['nombreUsuario'];
		$contrasenia = $_POST['contrasenia'];
		$comentario = $_POST['comentario'];
		$titulo = $_POST['titulo'];
		date_default_timezone_set('Europe/Madrid');
		
/*COMPROBACION EXISTE USUARIO*/		
		if(!empty($usuario)){
			
			$sql = "select * from datos_usuario where usuario='$usuario'";
			$resultado_cosulta = mysql_query($sql);
			
			//EXISTE
			
			if($row = mysql_fetch_array($resultado_cosulta)){
				//COMPRUEBO SU CONTRASEÑA
				if(!empty($clave)){
					$sql = "select clave from datos_usuario where usuario='$usuario'";
					$resultado_cosulta = mysql_query($sql);
					
					//ES CORRECTA
					if($row = mysql_fetch_array($resultado_cosulta)){
						//¿HA RELLENADO EL CAMPO COMENTARIO DE FORMA ADECUADA?
						if(!empty($comentario) && strlen($comentario)< 200){
							//¿HA INTRODUCIDO EL NOMBRE DEL DISCO DE FORMA ADECUADA?
							if(es_correcto_disco($disco)){
								//ESTÁ TODO BIEN INSERTO EN LA TABLA.
								$date = date('Y-m-d');
	
								$sql = "insert into comentarios_discos " . "\n" .
								" values ('$usuario' , '$date', '$comentario', '$disco')";
								
								$resultado_consulta = mysql_query($sql);
								
								/*COMPROBAMOS QUE SE HA INSERTADO BIEN*/
								
								if($resultado_consulta){
									echo"<script type='text/javascript'>
									alert('Tu comentario se ha insertado correctamente.');
									window.location='../index.php';
									</script> ";
								}
								else{
									echo mysql_error();
									echo"<script type='text/javascript'>
									alert('No se ha introducido bien, algo ha ido mal...');
									window.location='../formulario_comentar.php';
									</script> ";
								}
								
							}
							else{
								//NO ES CORRECTO EL TITULO.
								echo"<script type='text/javascript'>
									alert('Te has equivocado en el titulo del disco...');
									window.location='../formulario_comentar.php';
									</script> ";
							}
						}
						else{
							//NO HA CUMPLIDO CON LAS NORMAS DEL COMENTARIO.
							echo"<script type='text/javascript'>
							alert('No has cumplido con las normas del comentario...');
							window.location='../formulario_comentar.php';
							</script> ";
						}
					}
					else{
						//NO HA INTRODUCIDO BIEN SU CONTRASEÑA.
						echo"<script type='text/javascript'>
						alert('Te has equivocado en tu contraseña...');
						window.location='../formulario_comentar.php';
						</script> ";
					}
				}
				else{
					//NO DEJES EL CAMPO VACÍO!!
					echo"<script type='text/javascript'>
					alert('Introduce tu contraseña...');
					window.location='../formulario_comentar.php';
					</script> ";
				}
			}
			else{
				//TE HAS EQUIVOCADO EN EL USUARIO
				echo"<script type='text/javascript'>
				alert('Te has equivocado en tu usuario...');
				window.location='../formulario_comentar.php';
				</script> ";
			}
		} 
		else{
			//HA DEJADO EL CAMPO VACIO.
			echo"<script type='text/javascript'>
			alert('No te dejes campos vacíos...');
			window.location='../formulario_comentar.php';
			</script> ";
		}
	?>


</html>