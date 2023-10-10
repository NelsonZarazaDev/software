 <?php
class AccessModel
{
    private $Connection;
    
    function __construct($Connection)
    {
        $this->Connection=$Connection; 
    }
    
    function sqlFormSession($email,$password)
    {
        $sql="SELECT * FROM access 
              WHERE acce_email='$email' 
              AND acce_password='$password'
              ";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }
}
?>