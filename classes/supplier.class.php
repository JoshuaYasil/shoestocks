<?php

require_once 'database.php';

class Suppliers{
    //attributes

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $company_position;
    public $company_name;
    public $company_address = 'None';
    public $status = 'Inactive';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO suppliers (firstname, lastname, email, company_position, company_name, company_address, status) VALUES 
        (:firstname, :lastname, :email, :company_position, :company_name, :company_address, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':company_position', $this->company_position);
        $query->bindParam(':company_name', $this->company_name);
        $query->bindParam(':company_address', $this->company_address);
        $query->bindParam(':status', $this->status);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM suppliers ORDER BY CONCAT('lastname',', ','firstname') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function edit(){
        $sql = "UPDATE suppliers SET firstname=:firstname, lastname=:lastname, email=:email, company_position=:company_position, company_name=:company_name,company_name=:company_name, status=:status 
        WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':company_position', $this->company_position);
        $query->bindParam(':company_name', $this->company_name);
        $query->bindParam(':company_name', $this->company_name);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM suppliers WHERE id = :id ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function delete($record_id){
        $sql = "DELETE FROM suppliers WHERE id = :id ;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
    }
}

?>