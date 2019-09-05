<html>
<?php 

include_once "conexion_usuario.php";

//Comprobar que el $Post venga vacio y sin contraseñas

if(!empty($_POST["usuariologeo"]) && !empty($_POST["passwordlogeo"])){
	
	$usuariologeo = $_POST["usuariologeo"];
	$passwordlogeo = $_POST["passwordlogeo"];
	
	$sql = "select * from usuario where nombreUsuario='$usuariologeo' and contrasenia='$passwordlogeo'";

	$resultado_cosulta = mysql_query($sql);

	if($row = mysql_fetch_array($resultado_cosulta)){

		session_start();

		$_SESSION['usuariologeo'] = $usuariologeo;
		header("Location: ../portada.php");
		
	}
	else
		//echo "El usuario no existe en la base de datos";
		echo "<script type='text/javascript'>
			alert('El usuario no existe');
			window.location='../index.php';
			</script> ";
}
else{
	$_SESSION["fallo"] = "Falta introducir el usuario o contraseña";
	header("Location: ../index.php");
}	//echo "no hay nada"; con el alert sale en el index

?>
</html>