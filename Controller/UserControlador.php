<?php
require_once "./RouterFinal.php";
require_once "Model/UserModel.php";
require_once "View/UserView.php";
class UserControlador
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
    }

    function logout()
    {
        session_start();
        session_destroy();
        $this->view->showLogin();
    }

    function login()
    {
        $this->view->showLogin();
    }

    function createUser()
    {
        if (empty($_POST['create_email'])) {

            $this->view->showLogin("Ingrese un correo electrónico");
        } else if (empty($_POST['create_name'])) {

            $this->view->showLogin("Ingrese un nombre");
        } else {
            if ($userFromDB = $this->model->getUserByName($_POST['create_name'])) {

                $this->view->showLogin("El nombre de usuario ya existe");
            } else {

                $hash = password_hash($_POST['create_password'], PASSWORD_DEFAULT);
                $user = $_POST["create_email"];
                $userFromDB = $this->model->getUserByEmail($user);
                if ($userFromDB) {
                    $this->view->showLogin("La cuenta ya existe");
                } else {
                    $this->model->createUser($_POST['create_name'], $_POST['create_email'], $hash);
                    session_start();
                    $_SESSION['user_name'] = $_POST['create_name'];
                    $this->getUsers();
                }
            }
        }
    }
    function insertUser()
    {
        $users = $this->model->getUsers();
        session_start();
        if (!empty($_SESSION['user_name'])) {

            if (empty($_POST['create_email'])) {

                $this->view->showUserTable("Ingrese un correo electrónico", $users);
            } else if (empty($_POST['create_name'])) {

                $this->view->showUserTable("Ingrese un nombre", $users);
            } else {
                if ($this->model->getUserByName($_POST['create_name'])) {

                    $this->view->showUserTable("El nombre de usuario ya existe", $users);
                } else if ($this->model->getUserByEmail($_POST['create_email'])) {

                    $this->view->showUserTable("Existe una cuenta registrada con ese email", $users);
                } else {

                    $hash = password_hash($_POST['create_password'], PASSWORD_DEFAULT);
                    $user = $_POST["create_email"];
                    $userFromDB = $this->model->getUserByEmail($user);
                    if ($userFromDB) {
                        $this->view->showUserTable("La cuenta ya existe", $users);
                    } else {
                        $this->model->createUser($_POST['create_name'], $_POST['create_email'], $hash);
                        $users = $this->model->getUsers();
                        $this->view->showUserTable("Cargado exitosamente", $users);
                    }
                }
            }
        }
    }
    function verifyUser()
    {
        $user = $_POST["verify_email"];
        $pass = $_POST["verify_password"];

        if (!empty($user)) {
            $userFromDB = $this->model->getUserByEmail($user);

            if (isset($userFromDB) && $userFromDB) {
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password_user)) {

                    session_start();
                    $_SESSION['user_name'] = $userFromDB->name_user;

                    $this->view->showUsers();
                } else {
                    $this->view->showLogin("Contraseña incorrecta");
                }
            } else {
                // No existe el user en la DB
                $this->view->showLogin("El usuario no existe");
            }
        } else {
            $this->view->showLogin("Ingrese un correo electrónico");
        }
    }

    function editMenu($params = null)
    {
        session_start();
        if (!empty($_SESSION['user_name'])) {
            $id_user = $params[':ID'];
            $user = $this->model->getUserById($id_user);
            $this->view->showEditUser("", $user);
        }
    }
    function editUser($params = null)
    {
        session_start();
        $user = $this->model->getUserById($_POST['id_user']);
        if (!empty($_SESSION['user_name'])) {

            if (
                !empty($_POST['edit_name']) && !empty($_POST['edit_email'])
                && !empty($_POST['edit_password']) && !empty($_POST['last_password'])
            ) {

                $id_user = $_POST['id_user'];
                $name_user = $_POST['edit_name'];
                $email_user = $_POST['edit_email'];
                $password_user = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);
                $userFromDB = $this->model->getUserById($id_user);
                if (!password_verify($_POST['last_password'], $userFromDB->password_u)) {
                    $this->view->showEditUser("La contraseña ingresada no coincide con la anterior", $user);
                } else {
                    if ($this->model->editUser($id_user, $name_user, $email_user, $password_user)) {

                        $this->view->showUsers("La edicion se realizo correctamente");
                    } else {
                        $this->view->showEditUser("Ocurrio un error no se pudo editar el usuario", $user);
                    }
                }
            } else {
                $this->view->showEditUser("Recuerde completar todos los campos", $user);
            }
        } else {
            $this->view->showHome();
        }
    }

    function deleteUser($params = null)
    {
        session_start();
        if (!empty($_SESSION['user_name'])) {
            $id_user = $params[':ID'];
            $this->model->deleteUser($id_user);
            $this->view->showUsers();
        }
    }

    function getUsers()
    {
        if(session_status()!=2)
        session_start();
        if (!empty($_SESSION['user_name'])) {

            $users = $this->model->getUsers();
            $this->view->showUserTable("", $users);
        } else {
            $this->view->showLogin();
        }
    }
}
