<?php
require_once 'database.php';

Class Account{
    public $firstname;
    public $lastname;
    public $type;
    public $username;
    public $user_password;

    function __construct()
    {
        $this->db = new Database();
    }

    function validate(){
        $sql = "SELECT * FROM account WHERE username =:username and user_password = :user_password ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':user_password', $this->user_password);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }
}

?>