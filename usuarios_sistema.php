<?php
	$query= "SELECT * FROM usuario";
	$resultado= mysql_query($query);

	while ($fila = mysql_fetch_array($resultado)) {
		echo "$fila[nombreUsuario]";
		echo "$fila[foto]";
	}
?>