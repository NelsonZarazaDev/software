<?php
require_once "models/ReligionModel.php";
require_once "views/ReligionView.php";
    
class ReligionController
{ 
    function paginateReligions()
    {
        $Connection=new Connection('sel');

        $ReligionModel=new ReligionModel($Connection);
        $ReligionView=new ReligionView();

        $array_religions=$ReligionModel->paginateReligions();
        
        $ReligionView->paginateReligions($array_religions);  
    }
    
    function insertReligion()
    {
        $Connection=new Connection('all');
        
        $ReligionModel=new ReligionModel($Connection);

        $ReligionView=new ReligionView();
        
        $reli_name=$_POST['name'];

        $token=date('YmdHms').microtime(true).$_SESSION['pers_id'].uniqid();

        if(strlen($reli_name)>100)
        {
            $array_message=['message'=>'El nombe de la religi&oacute;n solo permite 100 caracteres'];
            exit(json_encode($array_message));
        }

        $array_religion=$ReligionModel->duplicateReligion($reli_name);

        if($array_religion)
        {
            $array_message=['message'=>'La religi&oacute;n ya existe en la base de datos'];
            exit(json_encode($array_message));
        }
        
        $ReligionModel->insertReligion($reli_name,$token);

        $array_religions=$ReligionModel->paginateReligions();

        $ReligionView->paginateReligions($array_religions);  
    }

    function showReligion()
    {
        $Connection=new Connection('sel');

        $ReligionModel=new ReligionModel($Connection);
        $ReligionView=new ReligionView();

        $token=$_POST['id'];

        $array_religion=$ReligionModel->selectReligion(['field'=>'token','value'=>$token]);

        $ReligionView->showReligion($array_religion);
    }

    function updateReligion()
    {
        $Connection=new Connection('all');
        
        $ReligionModel=new ReligionModel($Connection);

        $ReligionView=new ReligionView();
        
        $reli_id=$_POST['id'];
        $reli_name=$_POST['name'];

        if(strlen($reli_name)>100){exit('El nombre de la religi&oacute;n solo permite 100 caracteres');}

        $array_religion=$ReligionModel->duplicateReligion($reli_name,$reli_id);

        if($array_religion)
        {
            $array_message=['message'=>'La religi&oacute;n ya existe en la base de datos'];
            exit(json_encode($array_message));
        }
        
        $ReligionModel->updateReligion($reli_name,$reli_id);

        $array_religions=$ReligionModel->paginateReligions();

        $ReligionView->paginateReligions($array_religions);   
    }
}
?>