<html>

	<?php
	
	include_once "conexion.php";
	
	/*---------------------INICIAMOS SESION----------------------------------*/

	if(!empty($_POST["usuario"]) && !empty($_POST["contrasenia"])){
		
		$usuario = $_POST["usuario"];
		$contrasenia = $_POST["contrasenia"];
	
		$sql = "select * from datos_usuario where usuario='$usuario' and clave='$contrasenia'";

		$resultado_cosulta = mysql_query($sql);

		if($row = mysql_fetch_array($resultado_cosulta)){
			session_start();
			
			$_SESSION['usuario']=$usuario;
			header("Location: ../portada.php");
			
		}
		else{
			echo "<script type='text/javascript'>
				alert('Te has equivocado D: Prueba de nuevo.');
				window.location='../index.php';
				</script> ";
			
		}
	
		mysql_free_result($resultado_cosulta);
		mysql_close();
	}
	else
		echo"<script type='text/javascript'>
			alert('Por favor, introduce los datos.');
			window.location='../index.php';
			</script> ";
	?>


</html>