<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="estilos.css">
	</head>

	<body>
	
		<div class="login-box">
			
			<h1>AUTENTICACION DE USUARIOS</h1>
		
			<form method="post">
			
				<label for="usuario">Usuario</label>	
				<input type="text" id="usuario" name="usuario" placeholder="Ingresa nombre de usuario">
				
				<label for="password">Contraseña</label>
				<input type="password" id="password" name="password" placeholder="Ingresa tu contraseña">
				
				<!-- <input type="submit" value="Ingresar"> -->
				<button type="submit">Ingresar</button>

				
				<?php

				include "usuarios.php";

					$login = new Usuarios();
					$login -> ingresoUsuario();
				?>


			</form>	
		
		</div>
		

	</body>
	
</html>
