<?php
require_once "models/PersonModel.php";
require_once "views/PersonView.php";
    
class PersonController
{ 
    function paginatePeople()
    {
        require_once "models/ReligionModel.php";
        require_once "models/SexModel.php";
        require_once "models/CountryModel.php";
        
        
        $Connection=new Connection('sel');

        $PersonModel=new PersonModel($Connection);
        $ReligionModel=new ReligionModel($Connection);
        $SexModel=new SexModel($Connection);
        $CountryModel=new CountryModel($Connection);

        $PersonView=new PersonView();

        $array_people=$PersonModel->paginatePeople();
        $array_religions=$ReligionModel->paginateReligions();
        $array_sexes=$SexModel->paginateSexes();
        $array_countries=$CountryModel->paginateCountries();
        
        $PersonView->paginatePeople($array_people,$array_religions,$array_sexes,$array_countries);  
    }
    
    function insertPerson()
    {
        $Connection=new Connection('all');
        
        $PersonModel=new PersonModel($Connection);
        $PersonView=new PersonView();
        
        $sex_id=$_POST['sexo_id'];
        $coun_id_nacionality=$_POST['pais_nacionalidad_id'];
        $coun_id_where_live=$_POST['pais_donde_vive_id'];
        $pers_document=$_POST['documento'];
        $pers_names=$_POST['nombres'];
        $pers_surnames=$_POST['apellidos'];
        $pers_birth_date=$_POST['fecha_nacimiento'];
        $pers_smart_phone=$_POST['celular'];
        $pers_email=$_POST['email']; 
        $reli_id=$_POST['religion_id'];

        $array_person=$PersonModel->duplicatePerson($pers_document);

        if(!(is_numeric($pers_smart_phone))){exit('el numero de telefono debe ser un valor numerico');}
        if(strlen($pers_smart_phone)>10){exit('El numero de teledono no puede tener mas de 10 caracteres');}

        if($array_person)
        {
            $array_message=['message'=>'El documento ya existe en la base de datos'];
            exit(json_encode($array_message));
        }
        
        $PersonModel->insertPerson($sex_id,$coun_id_nacionality,$coun_id_where_live,$pers_document,$pers_names,$pers_surnames,$pers_birth_date,$pers_smart_phone,$pers_email,$reli_id);

        $array_people=$PersonModel->paginatePeople();

        $PersonView->paginatePeople($array_people);  
    }

    function showReligion()
    {
        $Connection=new Connection('sel');

        $ReligionModel=new ReligionModel($Connection);
        $ReligionView=new ReligionView();

        $reli_id=$_POST['id'];

        $array_religion=$ReligionModel->selectReligion(['field'=>'reli_id','value'=>$reli_id]);

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