<?php

class familymember_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_familymembers(){
        $this->query("SELECT * FROM familymember");
        return $this->getResultSet();
    }

    public function get_familymember($family_member_id){
        $this->query("SELECT * FROM familymember WHERE familymember_id = :familymember_id");
        $this->bind(":family_member_id",$familymember_id);
        return $this->getSingle();
    }

    public function add_familymember($familymember){

        $this->query("INSERT INTO familymember (first_name,last_name,date_of_birth,ssn,medicare_number, phone_number, address, city, province,postal_code, email)
                      VALUES (:first_name,:last_name,:date_of_birth,:ssn,:medicare_number, :phone_number, :address, :city, :province,:postal_code, :email)");
        
        $this->bind(":first_name",$familymember['first_name']);
        $this->bind(":last_name",$familymember['last_name']);
        $this->bind(":date_of_birth",$familymember['date_of_birth']);
        $this->bind(":ssn",$familymember['ssn']);
        $this->bind(":medicare_number",$familymember['medicare_number']);
        $this->bind(":phone_number",$familymember['phone_number']);
        $this->bind(":address",$familymember['address']);
        $this->bind(":city",$familymember['city']);
        $this->bind(":province",$familymember['province']);
        $this->bind(":postal_code",$familymember['postal_code']);
        $this->bind(":email",$familymember['email']);

        return $this->execute();
    }

    public function add_familymember_location($family_member_id, $location_id){
        $this->query("INSERT INTO AssignedTo (familymember_id, location_id) VALUES (:family_member_id, :location_id)");
        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":location_id",$location_id);

        return $this->execute();
    }

    public function update_familymember($family_member_id,$familymember){
        $this->query("UPDATE familymember SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, ssn = :ssn, medicare_number = :medicare_number, phone_number = :phone_number, address = :address, city = :city, province = :province, postal_code = :postal_code, email = :email WHERE familymember_id = :familymember_id");

        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":first_name",$familymember['first_name']);
        $this->bind(":last_name",$familymember['last_name']);
        $this->bind(":date_of_birth",$familymember['date_of_birth']);
        $this->bind(":ssn",$familymember['ssn']);
        $this->bind(":medicare_number",$familymember['medicare_number']);
        $this->bind(":phone_number",$familymember['phone_number']);
        $this->bind(":address",$familymember['address']);
        $this->bind(":city",$familymember['city']);
        $this->bind(":province",$familymember['province']);
        $this->bind(":postal_code",$familymember['postal_code']);
        $this->bind(":email",$familymember['email']);

        return $this->execute();
    }

    public function update_familymember_location($family_member_id, $location_id){

        $this->query("UPDATE AssignedTo SET end_date = NOW() WHERE familymember_id = :family_member_id");
        $this->bind(":family_member_id", $family_member_id);

        if (!$this->execute()) {
            return false;
        }

        $this->query("INSERT INTO AssignedTo (familymember_id, location_id) VALUES (:family_member_id, :location_id)");
        $this->bind(":family_member_id", $family_member_id);
        $this->bind(":location_id", $location_id);

        return $this->execute();
    }

    public function add_relationship($family_member_id, $membership_number){
        $this->query("INSERT INTO RelatedTo (familymember_id, membership_number, relationship) VALUES (:family_member_id, :membership_number)");
        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":membership_number",$membership_number);
        return $this->execute();
    }
}

?>