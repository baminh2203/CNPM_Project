<?php

class admin{
    public $db=null;

    public function __construct(DBController $db){
        if (!isset($db->con)) return null;
        $this->db=$db;
    }

    public function addAdmin($string){
        if($this->db->con!=null){

         $result = $this->db->con->query($string);
         return $result;
    }
    }

    public function getAdmin($string){
        if($this->db->con!=null){

            $result = $this->db->con->query($string);
            return $result;
        }
    }

}

