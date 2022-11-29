<?php

require_once 'database.php';

class Brand{
    //attributes

    public $id;
    public $brandname;
    public $origin;
    public $size;
    public $quantity;
    public $status = 'Inactive';

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add(){
        $sql = "INSERT INTO brand (brandname, origin, size, quantity, status) VALUES
        (:brandname, :origin, :size, :quantity, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':brandname', $this->brandname);
        $query->bindParam(':origin', $this->origin);
        $query->bindParam(':size', $this->size);
        $query->bindParam(':quantity', $this->quantity);
        $query->bindParam(':status', $this->status);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    function show(){
        $sql = "SELECT * FROM brand ORDER BY CONCAT('brandname',', ','origin') ASC;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>