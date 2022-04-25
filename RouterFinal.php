<?php

require_once "Controller/UserControlador.php";
require_once "RouterClass.php";



define ("BASE_URL", '//'.$_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]).'/');
define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
$r = new Router();

/////////////////////////////////USUARIO///////////////////////////////

$r->addRoute("login", "GET", "UserControlador", "login");
$r->addRoute("users", "GET", "UserControlador", "getUsers"); 
$r->addRoute("editMenu/:ID", "GET", "UserControlador", "editMenu");
$r->addRoute("editUser", "POST", "UserControlador", "editUser");
$r->addRoute("deleteUser/:ID", "GET", "UserControlador", "deleteUser"); 
$r->addRoute("verifyUser", "POST", "UserControlador", "verifyUser");
$r->addRoute("logout", "GET", "UserControlador", "logout");
$r->addRoute("createUser", "POST","UserControlador", "createUser");
$r->addRoute("insertUser", "POST","UserControlador", "insertUser");

$r->setDefaultRoute("UserControlador", "login");
//RUN
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
