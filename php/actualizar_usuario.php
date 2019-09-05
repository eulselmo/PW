<?php
session_start();
?>
<html>
<?php
	
	include_once "conexion_usuario.php";


/*Variables del formulario de actualizacion*/


		
/*------------FUNCIONES DE COMPROBACIÓN--------------------------*/
/*FUNCIONA

	function esta_vacio(){
		
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;

		if(empty($nombre) && empty($apellido) && empty($nombreUsuario) && empty($correo) &&
		empty($contrasenia) && empty($repeticionContrasenia) && empty($cumpleanios)){

			echo"<script type='text/javascript'>
			alert('Los campos están vacios');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";	
			return false;

		}
		else{
			
			return true;
		}
	}
*/
/*FUNCIONA*/

	function minimo_caracteres(){
				
		if(strlen($_POST['actualizar_nombre']) > 3 && strlen($_POST['actualizar_usuario']) > 3 
			&& strlen($_POST['actualizar_apellido']) > 3){
	
				if(strlen($_POST['actualizar_contrasenia']) > 4 && strlen($_POST['actualizar_contrasenia']) < 20 && strlen($_POST['actualizar_repeticioncontrasenia']) > 4 && strlen($_POST['actualizar_repeticioncontrasenia']) < 20)
		
					return true;	

		}else{
			echo"<script type='text/javascript'>
			alert('Introduce el numero minimo de caracteres para nombre, apellidos y nombre de usuario >3. Además contraseña y repeticion son > 4 y < 20');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;

		}	
	
	}


	function sin_char_extranios(){

		if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['actualizar_usuario'])){
			echo"<script type='text/javascript'>
			alert('Los nombres de usuario son solo con letras y numeros');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['actualizar_repeticioncontrasenia'])){
			echo"<script type='text/javascript'>
			alert('La repeticion de la contraseñia son solo con letras y numeros');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['actualizar_contrasenia'])){
			echo"<script type='text/javascript'>
			alert('La contrasenia es solo con letras y numeros');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else	
			return true;
	}


	function solo_letras(){

				
		if (!preg_match("/^[a-zA-Z ]+$/", $_POST['actualizar_nombre'])){
			echo"<script type='text/javascript'>
			alert('El nombre es solo con letras');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else if (!preg_match("/^[a-zA-Z ]+$/", $_POST['actualizar_apellido'])){
			echo"<script type='text/javascript'>
			alert('Los apellidos son solo con letras');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else	
			return true;
	}


/*FUNCIONA*/

	function valido_correo(){
				
		if(filter_var($_POST['actualizar_correo'],FILTER_VALIDATE_EMAIL) == false){
			echo"<script type='text/javascript'>
			alert('Introduce un correo valido');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else
			return true;
	}


	function valido_contrasenia(){
		if($_POST['actualizar_contrasenia']!=$_POST['actualizar_repeticioncontrasenia']){
			echo"<script type='text/javascript'>
			alert('Las contraseñas no coinciden');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
			return false;
		}
		else
			return true;
	}
	

	
	function comprobacion(){

		if(minimo_caracteres($_POST['actualizar_nombre'],$_POST['actualizar_apellido'],$_POST['actualizar_usuario'],$_POST['actualizar_contrasenia'],$_POST['actualizar_repeticioncontrasenia'])==false)
				echo"<script type='text/javascript'>
			alert('No has rellenado el minimo de caracteres');
			window.location='../angel/angel_20170421_1150.php';
			</script> ";
		else if(solo_letras($_POST['actualizar_nombre'],$_POST['actualizar_apellido'])==true && valido_correo($_POST['actualizar_correo'])==true
			&& sin_char_extranios($_POST['actualizar_usuario'],$_POST['actualizar_contrasenia'],$_POST['actualizar_repeticioncontrasenia'])==true && valido_contrasenia($_POST['actualizar_contrasenia'],$_POST['actualizar_repeticioncontrasenia'])==true)
				return true;
			else
				return false;

	}

	//VER SI SE PUEDE COMPARAR EL USUARIO Y CONTRASEÑA A LA VEZ SIN USAR LA BASE DE DATOS//
	/*
	if(comprobacion()==true) {
		global $nombre, $apellido, $nombreUsuario, $correo, $contrasenia,
		       $repeticionContrasenia, $sexo, $cumpleanios;
		
		$sql = "UPDATE `usuario` SET `apellido`='".$apellido."' WHERE nombreUsuario='".$_SESSION['usuariologeo']."' ; ";
		
		$resultado_consulta = mysql_query($sql);
		
		if($resultado_consulta){
			echo"<script type='text/javascript'>
			alert('Usuario actualizado');
			window.location='../angel_20170421_1150.php';
			</script> ";
		}
		else{
			echo"<script type='text/javascript'>
			alert('no se ha actualizado nada');
			window.location='../angel_20170421_1150.php';
			</script> ";
		}
	}
	*/

 	if(											
	isset($_POST['actualizar_nombre']) && $_POST['actualizar_nombre'] != "" &&
	isset($_POST['actualizar_apellido']) && $_POST['actualizar_apellido'] != "" &&
	isset($_POST['actualizar_usuario']) && $_POST['actualizar_usuario'] != "" &&
	isset($_POST['actualizar_correo']) && $_POST['actualizar_correo'] != "" &&
	isset($_POST['actualizar_contrasenia']) && $_POST['actualizar_contrasenia'] != "" &&
	isset($_POST['actualizar_repeticioncontrasenia']) && $_POST['actualizar_repeticioncontrasenia'] != "" &&
	isset($_POST['actualizar_sexo']) && $_POST['actualizar_sexo'] != "" &&
	isset($_POST['actualizar_cumpleanios']) && $_POST['actualizar_cumpleanios'] != "" 
	){
		if (comprobacion()==true) {
			$sql = "UPDATE usuario SET nombre='".$_POST['actualizar_nombre']."',apellido='".$_POST['actualizar_apellido']."',nombreUsuario='".$_POST['actualizar_usuario']."', correo='".$_POST['actualizar_correo']."',contrasenia='".$_POST['actualizar_contrasenia']."',repeticionContrasenia='".$_POST['actualizar_repeticioncontrasenia']."',sexo='".$_POST['actualizar_sexo']."',cumpleanios='".$_POST['actualizar_cumpleanios']."' WHERE nombreUsuario='".$_SESSION['usuariologeo']."' ; ";
		//echo '<p>resultado ='.$sql.'</p>';
		
			$resultado_consulta = mysql_query($sql);
		
		if($resultado_consulta){
			echo"<script type='text/javascript'>
			alert('Usuario actualizado');
			window.location='../angel_20170421_1150.php';
			</script> ";
		}
		else{
			echo"<script type='text/javascript'>
			alert('no se ha actualizado nada');
			window.location='../angel_20170421_1150.php';
			</script> ";
		}
	}
		
} else {
		echo"<script type='text/javascript'>
		alert('Los campos están vacios');
		window.location='../angel/angel_20170421_1150.php';
		</script> ";	
		return false;
}


?>

</html>