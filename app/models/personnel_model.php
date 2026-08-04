<?php

class personnel_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_personnels(){
        $this->query("SELECT * FROM personnel");
        return $this->getResultSet();
    }

    public function get_personnel($personnel_id){
        $this->query("SELECT * FROM personnel WHERE personnel_id = :personnel_id");
        $this->bind(":personnel_id",$personnel_id);
        return $this->getSingle();
    }

    public function add_personnel($personnel){

        $this->query("INSERT INTO personnel (first_name,last_name,date_of_birth,ssn,medicare_number, phone_number, address, city, province,postal_code, email,personnel_role,mandate)
                      VALUES (:first_name,:last_name,:date_of_birth,:ssn,:medicare_number, :phone_number, :address, :city, :province,:postal_code, :email,:personnel_role,:mandate)");
        
        $this->bind(":first_name",$personnel['first_name']);
        $this->bind(":last_name",$personnel['last_name']);
        $this->bind(":date_of_birth",$personnel['date_of_birth']);
        $this->bind(":ssn",$personnel['ssn']);
        $this->bind(":medicare_number",$personnel['medicare_number']);
        $this->bind(":phone_number",$personnel['phone_number']);
        $this->bind(":address",$personnel['address']);
        $this->bind(":city",$personnel['city']);
        $this->bind(":province",$personnel['province']);
        $this->bind(":postal_code",$personnel['postal_code']);
        $this->bind(":email",$personnel['email']);
        $this->bind(":personnel_role",$personnel['personnel_role']);
        $this->bind(":mandate",$personnel['mandate']);

        return $this->execute();
    }


    public function update_personnel($personnel_id,$personnel){
        $this->query("UPDATE personnel SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, ssn = :ssn, medicare_number = :medicare_number, phone_number = :phone_number, address = :address, city = :city, province = :province, postal_code = :postal_code, email = :email, personnel_role = :personnel_role, mandate = :mandate WHERE personnel_id = :personnel_id");

        $this->bind(":personnel_id",$personnel_id);
        $this->bind(":first_name",$personnel['first_name']);
        $this->bind(":last_name",$personnel['last_name']);
        $this->bind(":date_of_birth",$personnel['date_of_birth']);
        $this->bind(":ssn",$personnel['ssn']);
        $this->bind(":medicare_number",$personnel['medicare_number']);
        $this->bind(":phone_number",$personnel['phone_number']);
        $this->bind(":address",$personnel['address']);
        $this->bind(":city",$personnel['city']);
        $this->bind(":province",$personnel['province']);
        $this->bind(":postal_code",$personnel['postal_code']);
        $this->bind(":email",$personnel['email']);
        $this->bind(":personnel_role",$personnel['personnel_role']);
        $this->bind(":mandate",$personnel['mandate']);

        return $this->execute();
    }

    public function add_personnel_location($personnel_id, $location_id){
        $this->query("INSERT INTO EmployedAt (personnel_id, location_id, start_date) VALUES (:personnel_id, :location_id, CURDATE())");
        $this->bind(":personnel_id",$personnel_id);
        $this->bind(":location_id",$location_id);

        return $this->execute();
    }

    public function get_latest_personnel_id(){
        $this->query("SELECT LAST_INSERT_ID() AS personnel_id");
        return $this->getSingle();
    }

}

?>