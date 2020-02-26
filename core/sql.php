<?php


class SQL{

    //Backing Fields
    protected $ret_array; //The array for retrieving only a certain number of items.
    protected $db; //The actual database variable being wrapped.
    protected $statement; //For making statements.
    public $status; //The status of the connection.

    //Constructor that will call the connect method.
    public function __construct(array $data)
    {
        $this->status = $this->connect($data['host'], $data['dbname'], $data['user'], $data['pass']);
        
    }

    //The connect method will assign the pdo connection to the db variable.
    //It uses a try catch in the event that the connection fails and will
    //return the connection status to the user.
    protected function connect($host, $dbname, $user, $pass){

        try{
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        }
        catch(Exception $e){
            return $e->getMessage(); //Returns error message.
        }
        return "Success"; //Returns success message.

    }

    //For using SQL Commands to directly edit the database.
    public function direct_edit($sql){
        $this->statement = $this->db->prepare($sql);
        $this->execute();
    }

    //Retrieving database info and returning it as a class.  Must always be returned to a
    //class.
    public function retrieve_all($sql, $class = ""){
        $this->direct_edit($sql);
        return $this->statement->fetchAll(PDO::FETCH_CLASS, $class);
    }
    
    //For retrieving a specified number of items.
    public function retrieve($sql, $class = "", $count){
        $this->ret_array[$count];
        $this->direct_edit($sql);

        while($row = $this->statement->fetch(PDO::FETCH_CLASS, $class)){
            $this->ret_array[$count] = $row;
        }

        return $this->ret_array;
    }


    //This is called to execute the pdo prepared statement.
    protected function execute(){
        $this->statement->execute();
    }

}


?>