<?php

class UserView
{

    protected $msj;
    protected $template;
    protected $users;

    public function __construct()
    {

    }

    public function showLogin($msj=null)
    {
        $this->msj =$msj;
        $this->template = $this->getContentTemplate("login");
        echo $this->template; 
    }

    public function showUserTable($msj=null,$users = null)
    {
        $this->users=$users;
        $this->template = $this->getContentTemplate("userTable");
        echo $this->template;
    }

    public function showEditUser($msj=null, $users = null)
    {
        $this->msj = $msj;
        $this->users=$users;
        $this->template = $this->getContentTemplate("editUserTable");
        echo $this->template;
    }

    public function showUsers($msj=null)
    {
        $this->msj =$msj;
        header("Location:" . BASE_URL . "users");
    }
    public function showHome()
    {
        header("Location:" . BASE_URL . "login");
    }
    public function getContentTemplate($fileName)
    {
        $file_path = 'templates/' . $fileName . '.php';
        if (is_file($file_path)) {
            ob_start();
            require($file_path);
            $template = ob_get_contents();
            ob_end_clean();
            return $template;
        } else {
            throw new Exception("Error No existe $file_path");
        }
    }
    
}
