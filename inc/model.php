<?php
include_once("conn.php");
class Model{
  
    public $lastname,$firstname,$email,$password,$id,$conn;
    private $table = 'users';     
     
    function __construct(){
        $this->conn = Db::conn();
        $this->email = $this->treat(@$_POST['email']);
        $this->firstname = $this->treat(@$_POST['fname']);
        $this->lastname = $this->treat(@$_POST['lname']);
        $this->id = $this->treat(@$_GET['id']);
    }

    public function create(){
        $sql = "INSERT INTO $this->table (firstname,lastname,email) VALUES ('$this->firstname','$this->lastname','$this->email')";    
        return $this->conn->query($sql);
    }

    public function update(){

        $sql = "UPDATE $this->table SET firstname='$this->firstname',lastname='$this->lastname',email='$this->email' WHERE id ='$this->id'";   
        return $this->conn->query($sql);
    }

     /**
     * get record from database
     *
     * @return void
     */
    public function getRecord($id = null){
        $sql = is_null($id) ? "SELECT * FROM $this->table" : "SELECT * FROM $this->table WHERE id = '$id'"; 
        $ex = $this->conn->query($sql);
        if($ex->num_rows > 0){
            while($row = mysqli_fetch_array($ex)){
                $all[] = $row;
            }   
            return $all;
        }else{
            return $ex->num_rows;
        }
    }

    /**
     * delete record from database
     *
     * @return void
     */
    public function delRecord(){
        $sql = "DELETE FROM $this->table WHERE id = '$this->id'"; 
        return $this->conn->query($sql);
    } 

    /**
     * validate data
     *
     * @param [type] $data
     * @return void
     */
    public function treat($data){
        $data=mysqli_real_escape_string($this->conn, trim($data));
        $data=htmlspecialchars($data);
        return $data;
    }

    /**
     * Error and Success message
     */
    public static function message(){

        if(isset($_SESSION['error'])){
            echo "
            <div class='error ree' id='msg'>
                <div class='pb-3'><button type='button' id='close' class='close'>&times;</button>
                <h4>Error!</h4></div><div class='clear'></div>
                ".$_SESSION['error']."
            </div> 
            ";
            unset($_SESSION['error']);
        } 
        if(isset($_SESSION['success'])){
            echo "
            <div class='success ree msg' id='msg'>
                <div class='pb-3'>
                <button type='button' id='close' class='close'>&times;</button>
                <h4> Success!</h4>
                </div><div class='clear'></div>
                ".$_SESSION['success']."
            </div>
            ";
            unset($_SESSION['success']);
        }
        
    }

    /**
    * checks if email exists
    *
    * @return bool
    */
    public function emailExists(){
        $sql = "SELECT email FROM $this->table WHERE email = '$this->email'";
        $ex = $this->conn->query($sql);
        return ($ex->num_rows > 0) ? true : false;
    }

}

$user = new Model();
