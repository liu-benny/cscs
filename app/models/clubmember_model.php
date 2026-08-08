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

    public function get_clubmember_location($membership_number){
        $this->query("SELECT location.location_id, location.location_name FROM MemberLocation 
                        JOIN location ON MemberLocation.location_id = location.location_id 
                        WHERE MemberLocation.membership_number = :membership_number AND end_date IS NULL");
        $this->bind(":membership_number",$membership_number);
        return $this->getSingle();
    }

    public function add_clubmember_location($membership_number, $location_id,$start_date,$end_date){

        if($end_date == ""){
            $this->query("INSERT INTO MemberLocation (membership_number, location_id, start_date, end_date) VALUES (:membership_number, :location_id, :start_date, NULL)");
        }
        else{
            $this->query("INSERT INTO MemberLocation (membership_number, location_id, start_date, end_date) VALUES (:membership_number, :location_id, :start_date, :end_date)");
            $this->bind(":end_date",$end_date);
        }
        $this->bind(":membership_number",$membership_number);
        $this->bind(":location_id",$location_id);
        $this->bind(":start_date",$start_date);

        return $this->execute();
    }

    public function old_clubmember_location_ends($membership_number, $location_id){
        $this->query("UPDATE MemberLocation SET end_date = CURDATE() WHERE membership_number = :membership_number AND location_id = :location_id AND end_date IS NULL");
        $this->bind(":membership_number",$membership_number);
        $this->bind(":location_id",$location_id);
        return $this->execute();
    }

    public function get_latest_membership_number(){
        $this->query("SELECT membership_number FROM ClubMember ORDER BY membership_number DESC LIMIT 1");
        return $this->getSingle();
    }

    public function add_relationship($membership_number, $family_member_id, $relationship){
        $this->query("INSERT INTO RelatedTo (membership_number, family_member_id, relationship_type) VALUES (:membership_number, :family_member_id, :relationship)");
        $this->bind(":membership_number",$membership_number);
        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":relationship", $relationship);
        return $this->execute();
    }

}
