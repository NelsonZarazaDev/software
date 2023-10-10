<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";

class AccessController
{
    function validateUrl() 
    {
        $AccessView=new AccessView();
        $AccessView->showFormSession();
    }
    
    function validateFormSession($array)
    {
        $Connection=new Connection('sel');
         
        $email=$array['email'];
        $password=$array['password'];

        if(empty($email)){exit("El usuario es obligatorio");}
        if(empty($password)){exit("La clave es obligatoria");}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){exit("Correo mal estructurado");}

        $AccessModel=new AccessModel($Connection);

        $array_access=$AccessModel->sqlFormSession($email,$password);

        if($array_access)
        {
            $_SESSION['pers_id']=$array_access[0]->pers_id;
            $_SESSION['auth']='OK'; 
        }

        header('Location: index.php');
    }

    function closeSession()
    {
        $array_response=array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $array_response['message']='Que tenga un buen dìa';

        exit(json_encode($array_response));
    }
}
?>