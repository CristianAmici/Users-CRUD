<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/styles/images/iconUsersGreen.png">
    <link rel="stylesheet" href="./src/styles/css/style.css">
    <script src="./src/js/loginJs.js"></script>
    <title>Inicio de sesión</title>
</head>

<body>
    <main>
        <header>
            <a href="users"><img class="userLogo" src="./src/styles/images/iconUsersGreen.png" alt=""></a>
            <h1 class="center">Bienvenido</h1>
            <div>
                <button id="createAccount" class="btnSuccess">
                    <?php
                    if (PHP_SESSION_ACTIVE){
                        echo "Crear Cuenta";
                    }
                    ?>
                </button>
                <button id="session" class="btnSuccess createUser">Iniciar Sesión</button>
            </div>
        </header>
        <section id="login">
            <h3>Para ingresar a nuestro administrador de usuarios por favor inicie sesión</h3>
            <img class="loginLogo" src="./src/styles/images/iconUsersGreen.png" alt="">
            <form action="verifyUser" method="POST" class="was-validated" valid-feedback>
                <div class="inputConteiner">
                    <label>Usuario:</label>
                    <input type="email" class="form-control" placeholder="Ingrese su email" id="email" name="verify_email">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña:</label>
                    <input type="password" class="form-control" placeholder="Ingrese contraseña" id="pwd" name="verify_password">
                </div>
                <button type="submit" class="btnSuccess">Ingresar</button>
            </form>
            <p class="text-danger"><?php echo $this->msj ?></p>
        </section>
        <section id="createUser" class="createUser">
            <h3>Crear una cuenta</h3>
            <img class="loginLogo" src="./src/styles/images/iconUsersGreen.png" alt="">
            <form action="createUser" method="POST" valid-feedback>
                <div class="inputConteiner">
                    <label>Nombre de Usuario:</label>
                    <input type="text" class="form-control" placeholder="Nombre" id="name" name="create_name">
                </div>
                <div class="inputConteiner">
                    <label>Email:</label>
                    <input type="email" placeholder="Ingrese su email" id="email" name="create_email">
                </div>
                <div class="inputConteiner">
                    <label>Contraseña:</label>
                    <input type="password" placeholder="Ingrese contraseña" id="pwd" name="create_password">
                </div>

                <button type="submit" class="btnSuccess">Crear Cuenta</button>

            </form>
        </section>
</body>

</html>