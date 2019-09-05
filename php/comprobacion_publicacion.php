<?php
session_start();
?>
<html>
<?php
	
	include_once "conexion_usuario.php";
	
/*Variables del formulario de inscripcion*/

		$tituloPublicacion =$_POST['tituloPublicacion'];
		$textoPublicacion= $_POST['textoPublicacion'];
		$nombreUsuario= $_SESSION['usuariologeo'];
		echo "$nombreUsuario";
		
/*------------FUNCIONES DE COMPROBACIÓN--------------------------*/
/*FUNCIONA

	function no_estan_vacios(){
		
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;

		if(!empty($nombre) && !empty($apellido) && !empty($nombreUsuario) && !empty($correo) &&
		!empty($contrasenia) && !empty($repeticionContrasenia) && !empty($cumpleanios)){

			return true;

		}
		else{
			echo"<script type='text/javascript'>
			alert('Los campos están vacios');
			window.location='../index.php';
			</script> ";		
			return false;
		}
	}

/*FUNCIONA

	function minimo_caracteres(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;

				
		if(strlen($nombre) > 3 && strlen($nombreUsuario) > 3 
			&& strlen($apellido) > 3){
	
				if(strlen($contrasenia) > 4 && strlen($contrasenia) < 20 && strlen($repeticionContrasenia) > 4 && strlen($repeticionContrasenia) < 20)
		
					return true;	

		}else{
			echo"<script type='text/javascript'>
			alert('Introduce el numero minimo de caracteres:<br> nombre, apellidos y nombre de usuario >3 <br> contraseña y repeticion > 4 y < 20');
			window.location='../index.php';
			</script> ";
			return false;

		}	
	
	}


	function sin_char_extranios(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;
				
		if (!preg_match("/^[a-zA-Z0-9]+$/", $nombreUsuario)){
			echo"<script type='text/javascript'>
			alert('Los nombres de usuario son solo con letras y numeros');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]+$/", $repeticionContrasenia)){
			echo"<script type='text/javascript'>
			alert('La repeticion de la contraseñia son solo con letras y numeros');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]+$/", $contrasenia)){
			echo"<script type='text/javascript'>
			alert('La contrasenia es solo con letras y numeros');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else	
			return true;
	}


/*FUNCIONA

	function solo_letras(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;
				
		if (!preg_match("/^[a-zA-Z ]+$/", $nombre)){
			echo"<script type='text/javascript'>
			alert('El nombre es solo con letras');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z ]+$/", $apellido)){
			echo"<script type='text/javascript'>
			alert('Los apellidos son solo con letras');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else	
			return true;
	}


/*FUNCIONA

	function valido_correo(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;
				
		if(filter_var($correo,FILTER_VALIDATE_EMAIL) == false){
			echo"<script type='text/javascript'>
			alert('Introduce un correo valido');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else
			return true;
	}


	function valido_contrasenia(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;
				
		if($contrasenia!=$repeticionContrasenia){
			echo"<script type='text/javascript'>
			alert('Las contraseñas no coinciden');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else
			return true;
	}
	

	function comprobacion(){
		if(no_estan_vacios()==false)
			echo"<script type='text/javascript'>
			alert('Hay campos sin rellenar');
			window.location='../index.php';
			</script> ";

		else if(minimo_caracteres()==false)
				echo"<script type='text/javascript'>
			alert('No has rellenado el minimo de caracteres');
			window.location='../index.php';
			</script> ";
		else if(solo_letras()==true && valido_correo()==true
			&& sin_char_extranios()==true && valido_contrasenia()==true)
				return true;
			else
				return false;

	}
*/
	//VER SI SE PUEDE COMPARAR EL USUARIO Y CONTRASEÑA A LA VEZ SIN USAR LA BASE DE DATOS//

	/*if(comprobacion()==true) {*/

		$sql = "INSERT INTO publicaciones VALUES ('$nombreUsuario', now(),'$tituloPublicacion', '$textoPublicacion')";
		
		$resultado_consulta = mysql_query($sql);
		
		if($resultado_consulta){
			echo"<script type='text/javascript'>
			alert('Todo ha ido bien. Comentario introduccido');
			window.location='../publicaciones_mias.php';
			</script> ";
		}
		else{
			var_dump($resultado_consulta);
			echo '<p>resultado='. $nombreUsuario .'</p>';
			echo '<p>resultado='. $tituloPublicacion .'</p>';
			echo '<p>resultado='. $textoPublicacion .'</p>';
			/*echo"<script type='text/javascript'>
			alert('No se ha introducido un comentario');
			window.location='../publicaciones_mias.php';
			</script> ";*/
		}
	/*}*/
	
?>

</html>