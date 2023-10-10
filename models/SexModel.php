<?php
class SexModel
{
    private $Connection;
    
    function __construct($Connection)
    {
        $this->Connection=$Connection;
    }

    function paginateSexes()
    {
        $sql="SELECT * FROM sex";

        $this->Connection->query($sql); 

        return $this->Connection->fetchAll();
    }
}
?>