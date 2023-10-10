<?php
class CountryModel
{
    private $Connection;
    
    function __construct($Connection)
    {
        $this->Connection=$Connection;
    }

    function insertCountry($coun_name)
    {
        $sql="INSERT INTO country (coun_name) VALUES ('$coun_name')";

        $this->Connection->query($sql);
    }

    function updateCountry($coun_name,$coun_id)
    {
        $sql="UPDATE country SET coun_name='$coun_name' WHERE coun_id='$coun_id'";

        $this->Connection->query($sql);
    }

    function paginateCountries()
    {
        $sql="SELECT * FROM country";

        $this->Connection->query($sql); 

        return $this->Connection->fetchAll();
    }

    function selectCountry($array)
    {
        $field=$array['field'];
        $value=$array['value'];

        $sql="SELECT * FROM country WHERE $field='$value'";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }

    function duplicateCountry($coun_name,$coun_id='')
    {
        if($coun_id)
        {
            $sql="SELECT * FROM country WHERE coun_name='$coun_name' AND coun_id!='$coun_id'";
        }
        else
        {
            $sql="SELECT * FROM country WHERE coun_name='$coun_name'";
        }

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }
}
?>