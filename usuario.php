<html>

<?php
	
	include_once "conexion.php";
	
/*----------------VARIABLES--------------------------*/

		$nombre = trim($_POST['nombre']);
		$apellido = trim($_POST['apellido']);
		$nombreUsuario =trim($_POST['nombreUsuario']);
		$correo	= trim($_POST['correo']);
		$contrasenia = trim($_POST['contrasenia']);
		$repeticionContrasenia = trim($_POST['repeticionContrasenia']);
		$sexo = trim($_POST['sexo']);
		$cumpleanios = trim($_POST['cumpleanios']);
		$envio = trim($_POST['Envio']);
		
/*------------FUNCIONES DE COMPROBACIÓN--------------------------*/
	function estan_vacios(){
		
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;

		if(!empty($nombre) && !empty($apellido) && !empty($nombreUsuario) && !empty($correo) &&
		!empty($contrasenia) && !empty($repeticionContrasenia) && !empty($sexo) && !empty($cumpleanios) &&
		!empty($envio)){

				return false;
		}
		else{
			return true;
		}
	}
	
	function minimo_caracteres(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;

				
		if(strlen($nombre) > 3 && strlen($nombreUsuario) > 3 
			&& strlen($apellido) > 3)
			
				if(strlen($clave) > 4 && strlen($clave) < 20)
		
					return true;
		else
			return false;
	}
		
	function solo_enteros(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia, 
	 		   $repeticionContrasenia, $sexo, $cumpleanios, $envio;

	
		if(!is_numeric($codigoPostal)){
			echo"<script type='text/javascript'>
			alert('El codigo postal son sólo numeros...');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else
			return true;
	}
	
	function solo_letras(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;
				
		if (!preg_match("/^[a-zA-Z ]+$/", $nombre)){
			echo"<script type='text/javascript'>
			alert('El nombre son solo letras...');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z ]+$/", $apellido)){
			echo"<script type='text/javascript'>
			alert('Los apellidos son solo letras...');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else	
			return true;
	}
		
	function valido_correo(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;
				
		if(filter_var($correo,FILTER_VALIDATE_CORREO) == false){
			echo"<script type='text/javascript'>
			alert('Introduce un correo correcto...');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else
			return true;
	}
	
	function sin_char_extranios(){
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;
				
		if(!preg_match("/[a-zA-Z0-9]/",'$contrasenia')){
			echo"<script type='text/javascript'>
			alert('No uses caracteres extraños...1');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if(!preg_match("/[a-zA-Z0-9]/",'$repeticionContrasenia')){
			echo"<script type='text/javascript'>
			alert('No uses caracteres extraños...2');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else if(!preg_match("/[a-zA-Z0-9 ]/",'$nombreUsuario')){
			echo"<script type='text/javascript'>
			alert('No uses caracteres extraños...3');
			window.location='../index.php';
			</script> ";
			return false;
		}
		else
			return true;
	}
	
/*------------FUNCIÓN PRINCIPAL--------------------------*/	
	function comprobacion(){
		if(estan_vacios())
			echo"<script type='text/javascript'>
			alert('Hay campos vacios.!');
			window.location='../index.php';
			</script> ";

		else if(!minimo_caracteres())
				echo"<script type='text/javascript'>
				alert('No has rellenado el minimo de caracteres.');
				window.location='../index.php';
				</script> ";
		else if(solo_enteros() && solo_letras() && valido_correo()
			&& sin_char_extranios())
				return true;
			else
				return false;
		
	}
	
/*-------------------"MAIN"--------------------------*/
	if(comprobacion() == true) {
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios, $envio;
		
		$sql = "insert into usuario values " . "\n" .
		"('$nombre', '$apellido', '$nombreUsuario', '$correo', " . "\n" .
		"'$contrasenia', '$repeticionContrasenia', '$sexo', '$cumpleanios', '$envio')";
		
		$resultado_consulta = mysql_query($sql);
		
		if($resultado_consulta){
			echo"<script type='text/javascript'>
			alert('Todo ha ido bien. Disfruta de la página');
			window.location='../portada.php';
			</script> ";
		}
		else{
			echo"<script type='text/javascript'>
			alert('Ese usuario ya esta escogido, prueba otro.');
			window.location='../index.php';
			</script> ";
		}
	}
?>

</html>