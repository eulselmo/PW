<?php //Formulario con php
	
	session_start();

	$_SESSION["nombreUsuario"] = $_POST["nombreUsuario"];

	if(isset($_POST["nombre"], $_POST["apellido"], $_POST["nombreUsuario"], $_POST["correo"], $_POST["contrasenia"], $_POST["repeticionContrasenia"], $_POST["sexo"], $_POST["cumpleanios"]) and $_POST["nombre"] !="" and $_POST["apellido"] !="" and $_POST["nombreUsuario"] !="" and $_POST["correo"] !="" and $_POST["contrasenia"] !="" and $_POST["repeticionContrasenia"] !="" and $_POST["sexo"] !="" and $_POST["cumpleanios"] !=""){

		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$nombreUsuario = $_POST['nombreUsuario'];
		$correo	= $_POST['correo'];
		$contrasenia = $_POST['contrasenia'];
		$repeticionContrasenia = $_POST['repeticionContrasenia'];
		$sexo = $_POST['sexo'];
		var_dump($sexo);
		$cumpleanios = $_POST['cumpleanios'];

		//orden SQL para insertar usuario

		$consulta= "INSERT INTO usuario VALUES (nombre, apellido, nombreUsuario, correo, contrasenia, repeticionContrasenia, sexo, cumpleanios) VALUES ('$nombre','$apellido','$nombreUsuario','$correo','$contrasenia','repeticionContrasenia','$sexo','cumpleanios')";
		if (mysql_query($consulta)){
		echo '<p>Se ha registrado correctamente</p>';
		} else {
			echo '<p>Fallo en el registro</p>'; 
		}
	} elseif (!$nombre) {
		//cuadro de texto en rojo cuando está mal
		echo "El nombre no ha sido rellenado";
	} elseif(!$apellido){
		//
		echo "El apellido no ha sido rellenado";
	} elseif (!$nombreUsuario) {
		//
		echo "El nombre de usuario no ha sido rellenado";
	} elseif (!$correo) {
		//
		echo "El correo no ha sido rellenado";
	} elseif (!$contrasenia) {
		//
		echo "La contrase&ntilde;a no ha sido rellenada";
	} elseif (!$repeticionContrasenia) {
		//
		echo "Repite la contrase&ntilde;a";
	} elseif (!$sexo) {
		//
		echo "El sexo no ha sido seleccionado";
	} elseif (!$cumpleanios) {
		//
		echo "La fecha de cumplea&ntilde;os no ha sido seleccionada";
	} else{

			echo '<p>El formulario de ingreso no ha sido completado.</p>'
	}
	session_destroy();
?>