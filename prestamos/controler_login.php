<?php
  session_start();
 
  // Obtengo los datos cargados en el formulario de login.
  $user = $_POST['user'];
  $password = $_POST['password'];
   
  // Comprobacion de datos
  if($user == "" || $password == ""){

	echo 'El usuario o password esta vacio,<a href="login.php">vuelva a intenarlo</a>';

  }
  else{
        // Guardo la sesión usuario.
		$_SESSION['user'] = $user;
     
		// Redirecciono al usuario a su página principal del sitio.
		header("Location: principal.php"); 
  }
 
?>