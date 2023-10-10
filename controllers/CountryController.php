<?php
require_once "models/CountryModel.php";
require_once "views/CountryView.php";
    
class CountryController
{ 
    function paginateCountries()
    {
        $Connection=new Connection('sel');

        $CountryModel=new CountryModel($Connection);
        $CountryView=new CountryView();

        $array_countries=$CountryModel->paginateCountries();
        
        $CountryView->paginateCountries($array_countries);  
    }
    
    function insertCountry()
    {
        $Connection=new Connection('all');
        
        $CountryModel=new CountryModel($Connection);

        $CountryView=new CountryView();
        
        $coun_name=$_POST['name'];

        if(strlen($coun_name)>100)
        {
            $array_message=['message'=>'El nombe del pa&iacute;s solo permite 100 caracteres'];
            exit(json_encode($array_message));
        }

        $array_country=$CountryModel->duplicateCountry($coun_name);

        if($array_country)
        {
            $array_message=['message'=>'El pa&iacute;s ya existe en la base de datos'];
            exit(json_encode($array_message));
        }
        
        $CountryModel->insertCountry($coun_name);

        $array_countries=$CountryModel->paginateCountries();

        $CountryView->paginateCountries($array_countries);  
    }

    function showCountry()
    {
        $Connection=new Connection('sel');

        $CountryModel=new CountryModel($Connection);
        $CountryView=new CountryView();

        $coun_id=$_POST['id'];

        $array_country=$CountryModel->selectCountry(['field'=>'coun_id','value'=>$coun_id]);

        $CountryView->showCountry($array_country);
    }

    function updateCountry()
    {
        $Connection=new Connection('all');
        
        $CountryModel=new CountryModel($Connection);

        $CountryView=new CountryView();
        
        $coun_id=$_POST['id'];
        $coun_name=$_POST['name'];

        if(strlen($coun_name)>100){exit('El nombe del pa&iacute;s solo permite 100 caracteres');}

        $array_country=$CountryModel->duplicateCountry($coun_name,$coun_id);
        if($array_country)
        {
            $array_message=['message'=>'El pa&iacute;s ya existe en la base de datos'];
            exit(json_encode($array_message));
        }
        
        $CountryModel->updateCountry($coun_name,$coun_id);

        $array_countries=$CountryModel->paginateCountries();

        $CountryView->paginateCountries($array_countries);   
    }
}
?>