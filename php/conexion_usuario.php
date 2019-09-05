<html>
	<?php
		
		define('DB_SERVER', 'localhost');
		define('DB_NAME', 'pw_75168992');
		define('DB_USER', 'pw_75168992');
		define('DB_PASS', 'garcia94');
		$link = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
		$entrar = mysql_select_db(DB_NAME,$link);
		
		if(!$entrar){
			echo "Error de conexión";
		}
	
	?>
</html>