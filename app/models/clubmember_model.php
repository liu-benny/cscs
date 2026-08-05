<?php

class clubmember_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_clubmembers(){
        $this->query("SELECT * FROM ClubMember");
        return $this->getResultSet();
    }

    public function get_clubmember($membership_number){
        $this->query("SELECT * FROM ClubMember WHERE membership_number = :membership_number");
        $this->bind(":membership_number",$membership_number);
        return $this->getSingle();
    }

    public function add_clubmember($clubmember){

        $this->query("INSERT INTO ClubMember (first_name,last_name,date_of_birth,gender,height_cm,weight_kg,ssn,medicare_number, phone_number, address, city, province,postal_code)
                      VALUES (:first_name,:last_name,:date_of_birth,:gender,:height_cm,:weight_kg,:ssn,:medicare_number, :phone_number, :address, :city, :province,:postal_code)");
        
        $this->bind(":first_name",$clubmember['first_name']);
        $this->bind(":last_name",$clubmember['last_name']);
        $this->bind(":date_of_birth",$clubmember['date_of_birth']);
        $this->bind(":gender",$clubmember['gender']);
        $this->bind(":height_cm",$clubmember['height_cm']);
        $this->bind(":weight_kg",$clubmember['weight_kg']);
        $this->bind(":ssn",$clubmember['ssn']);
        $this->bind(":medicare_number",$clubmember['medicare_number']);
        $this->bind(":phone_number",$clubmember['phone_number']);
        $this->bind(":address",$clubmember['address']);
        $this->bind(":city",$clubmember['city']);
        $this->bind(":province",$clubmember['province']);
        $this->bind(":postal_code",$clubmember['postal_code']);
        

        return $this->execute();
    }

    public function update_clubmember($membership_number,$clubmember){
        $this->query("UPDATE ClubMember SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, gender = :gender, height_cm = :height_cm, weight_kg = :weight_kg, ssn = :ssn, medicare_number = :medicare_number, phone_number = :phone_number, address = :address, city = :city, province = :province, postal_code = :postal_code 
                        WHERE membership_number = :membership_number");    

        $this->bind(":membership_number",$membership_number);
        $this->bind(":first_name",$clubmember['first_name']);
        $this->bind(":last_name",$clubmember['last_name']);
        $this->bind(":date_of_birth",$clubmember['date_of_birth']);
        $this->bind(":gender",$clubmember['gender']);
        $this->bind(":height_cm",$clubmember['height_cm']);
        $this->bind(":weight_kg",$clubmember['weight_kg']);
        $this->bind(":ssn",$clubmember['ssn']);
        $this->bind(":medicare_number",$clubmember['medicare_number']);
        $this->bind(":phone_number",$clubmember['phone_number']);
        $this->bind(":address",$clubmember['address']);
        $this->bind(":city",$clubmember['city']);
        $this->bind(":province",$clubmember['province']);
        $this->bind(":postal_code",$clubmember['postal_code']);

        return $this->execute();
    }

    

}

?>