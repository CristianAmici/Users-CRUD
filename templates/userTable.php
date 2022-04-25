<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<base href="<?php echo BASE_URL ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./src/styles/images/iconUsersGreen.png">
	<link rel=" stylesheet" href="./src/styles/css/style.css">
	<script src="./src/js/tableJs.js"></script>
	<title><?php echo $this->msj ?></title>
</head>

<body>
	<main>
		<header>
		<a href="users"><img class="userLogo" src="./src/styles/images/iconUsersGreen.png" alt=""></a>
			<h1>Bienvenido
				<?php
				echo $_SESSION['user_name'];
				?>
			</h1>
			<a class="link" href="logout">
				<?php
				if (!empty($_SESSION['user_name']))
					echo "Cerrar Sesión"
				?>
			</a>
		</header>
		<section>
			<img class="imgUsersTable" src="./src/styles/images/users.png" alt="">
			<h3>Lista de Usuarios</h3>
			<table>
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($this->users as $user) {
					?>
						<tr>
							<td><?php echo $user->name_user; ?></td>
							<td><?php echo $user->email_user; ?></td>
							<td><a href="editMenu/<?php echo $user->id_user; ?>"><img class="iconPen" src="./src/styles/images/iconPen.png" alt="Editar"></a></td>
							<td><a href="deleteUser/<?php echo $user->id_user; ?>"><img class="iconBin" src="./src/styles/images/iconBin.png" alt="Eliminar"></a></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</section>
		<p class=""><?php echo $this->msj ?></p>
		<button id="btnInsertForm"  class="btnSuccess">Agregar usuario</button>
		<!-- Form Insert Users -->
		<section id="createUser" class="createUser">
			<form action="insertUser" method="POST" valid-feedback>
				<h3>Ingresar usuario:</h3>
				<div class="inputConteiner">
					<label>Nombre de Usuario:</label>
					<input type="text" class="form-control" placeholder="Nombre" id="name" name="create_name">
				</div>
				<div class="inputConteiner">
					<label>Email:</label>
					<input type="email" placeholder="Email" id="email" name="create_email">
				</div>
				<div class="inputConteiner">
					<label>Contraseña:</label>
					<input type="password" placeholder="Contraseña" id="pwd" name="create_password">
				</div>

				<button type="submit" class="btnSuccess">Crear Usuario</button>

				<button id="btnReturn" class="btnReturn">X</button>
			</form>
		</section>

	</main>

</body>

</html>