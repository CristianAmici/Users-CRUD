<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/styles/images/iconUsersGreen.png">
    <link rel="stylesheet" href="./src/styles/css/style.css">
    <script src="./js/js.js"></script>
    <title>Editar usuario</title>
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
                if (PHP_SESSION_ACTIVE)
                    echo "Cerrar Sesión"
                ?>
            </a>
        </header>
        <section class="">
            <!-- Form Edit Users -->
            <form action="editUser" method="POST" valid-feedback>
                <h3>Editar usuario</h3>
                <input type="hidden" name="id_usuario" value="<?php echo  $this->users->id_user;?>">
                <div class="inputConteiner">
                    <label>Nombre de Usuario:</label>
                    <input type="text" class="" placeholder="Nombre" id="name" name="editar_nombre" value="<?php echo  $this->users->name_user; ?>">
                </div>
                <div class="inputConteiner">
                    <label>Email:</label>
                    <input type="email" placeholder="Email" id="email" name="editar_email" value="<?php echo  $this->users->email_user; ?>">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña anterior:</label>
                    <input type="password" placeholder="Contraseña" id="pwd" name="anterior_password">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña nueva:</label>
                    <input type="password" placeholder="Contraseña" id="pwd" name="editar_password">
                </div>
                <p><?php echo $this->msj ?></p>
                <button type="submit" class="btnSuccess">Editar Usuario</button>

                <a href="users" class="linkReturn">X</a>

            </form>
        </section>
    </main>

</body>

</html>