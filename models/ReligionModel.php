<?php
class ReligionModel
{
    private $Connection;
    
    function __construct($Connection)
    {
        $this->Connection=$Connection;
    }

    function insertReligion($reli_name,$token)
    {
        $sql="INSERT INTO religion (reli_name,token) VALUES ('$reli_name','$token')";

        $this->Connection->query($sql);
    }

    function updateReligion($reli_name,$reli_id)
    {
        $sql="UPDATE religion SET reli_name='$reli_name' WHERE reli_id='$reli_id'";

        $this->Connection->query($sql);
    }

    function paginateReligions()
    {
        $sql="SELECT * FROM religion";

        $this->Connection->query($sql); 

        return $this->Connection->fetchAll();
    }

    function selectReligion($array)
    {
        $field=$array['field'];
        $value=$array['value'];

        $sql="SELECT * FROM religion WHERE $field='$value'";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }

    function duplicateReligion($reli_name,$reli_id='')
    {
        if($reli_id)
        {
            $sql="SELECT * FROM religion WHERE reli_name='$reli_name' AND reli_id!='$reli_id'";
        }
        else
        {
            $sql="SELECT * FROM religion WHERE reli_name='$reli_name'";
        }

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }
}
?>