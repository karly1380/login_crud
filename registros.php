
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuario</title>
	<?php require_once "script.php"; ?>
</head>
<body>
	<body background="imagenes/nu.png">
	<div class="container">
		<h1>Registro de Usuarios</h1>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<form action="procesos/registros.php" method="post">
					<label for="nombre"><h3>Nombre</h3></label>
					<input type="text" name="nombre" class="form-control" required="">
					<label for="apellido"><h3>Apellido</h3></label>
					<input type="text" name="apellido" class="form-control" required="">
					<label for="email"><h3>Email</h3></label>
					<input type="text" name="email" class="form-control" required="">
					<label for="apellido"><h3>Usuario</h3></label>
					<input type="text" name="usuario" class="form-control" required="">
					<label for="email"><h3>Password</h3></label>
					<input type="text" name="password" class="form-control" required="">
					<br>
					<button class="btn btn-danger">Registrar</button>
					<a href="index.php" class="btn btn-primary">Login</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>