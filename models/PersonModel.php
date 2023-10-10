<?php
class PersonModel
{
    private $Connection;
    
    function __construct($Connection)
    {
        $this->Connection=$Connection;
    }

    function insertPerson($sex_id,$coun_id_nacionality,$coun_id_where_live,$pers_document,$pers_names,$pers_surnames,$pers_birth_date,$pers_smart_phone,$pers_email,$reli_id)
    {
        $sql="INSERT INTO religion 
            (sex_id,coun_id_nacionality,coun_id_where_live,pers_document,pers_names,pers_surnames,pers_birth_date,pers_smart_phone,pers_email,reli_id) 
            VALUES 
            ('$sex_id','$coun_id_nacionality','$coun_id_where_live','$pers_document','$pers_names','$pers_surnames','$pers_birth_date','$pers_smart_phone','$pers_email','$reli_id')
            ";

        $this->Connection->query($sql);
    }

    function updateReligion($reli_name,$reli_id)
    {
        $sql="UPDATE religion SET reli_name='$reli_name' WHERE reli_id='$reli_id'";

        $this->Connection->query($sql);
    } 

    function paginatePeople()
    {
        $sql="SELECT * FROM person";

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

    function duplicatePerson($pers_document,$pers_id='')
    {
        if($pers_id)
        {
            $sql="SELECT * FROM person WHERE pers_document='$pers_document' AND pers_id!='$pers_id'";
        }
        else
        {
            $sql="SELECT * FROM person WHERE pers_document='$pers_document'";
        }

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }
}
?>