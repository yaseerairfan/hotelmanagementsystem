<?php
class Connection{
    public $host;
    public $dbusername;
    public $dbpassword;
    public $dbname;
    public $portno;
    public $tablename;
   
    
    function __construct($host,$dbusername,$dbpassword,$dbname,$tablename,$portno){
        $this->host = $host;
        $this->dbusername=$dbusername;
        $this->dbpassword=$dbpassword;
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->portno=$portno;
    }
    function new_connect(){
        
        $connection_error='false';
        try{
            // Create connection
            $conn = new mysqli ($this->host, $this->dbusername, $this->dbpassword, $this->dbname,$this->portno);
            return $conn;
        }
        catch(Exception $ex){
            throw new Exception('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error(),$ex);
            $connection_error='true';
            return $connection_error;
        }
        
    }
    function insert($column_names,$column_values){
       $columnnames=implode(",",$column_names);
        $columnvalues=implode(",",$column_values);
        
        
        try{
            if ($this->new_connect()=='true'){
                throw Exception("Can't connect to the database! \n");
                
            }
            else{
                $sql = "INSERT INTO $this->tablename ($columnnames)
                    values ($columnvalues)";
                return $sql;
            }
        }  
        catch(Exception $e){
            echo $e->getMessage();
        }        
    }

}
?>