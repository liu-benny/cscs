<?php

class familymember_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_familymembers(){
        $this->query("SELECT * FROM FamilyMember");
        return $this->getResultSet();
    }

    public function get_familymember($family_member_id){
        $this->query("SELECT * FROM FamilyMember WHERE family_member_id = :family_member_id");
        $this->bind(":family_member_id",$family_member_id);
        return $this->getSingle();
    }

    public function add_familymember($familymember){

        $this->query("INSERT INTO FamilyMember (first_name,last_name,date_of_birth,ssn,medicare_number, phone_number, address, city, province,postal_code, email)
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

    public function add_familymember_location($family_member_id, $location_id, $start_date,$end_date){

        if($end_date == ""){
            $this->query("INSERT INTO AssignedTo (family_member_id, location_id, start_date, end_date) VALUES (:family_member_id, :location_id, :start_date, NULL)");
        }
        else{
            $this->query("INSERT INTO AssignedTo (family_member_id, location_id, start_date, end_date) VALUES (:family_member_id, :location_id, :start_date, :end_date)");
            $this->bind(":end_date",$end_date);
        }

        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":location_id",$location_id);
        $this->bind(":start_date",$start_date);

        return $this->execute();
    }

    public function get_current_familymember_location($family_member_id){
        $this->query("SELECT location.location_id, location.location_name FROM AssignedTo 
                        JOIN location ON AssignedTo.location_id = location.location_id 
                        WHERE AssignedTo.family_member_id = :family_member_id AND AssignedTo.end_date IS NULL");
        $this->bind(":family_member_id",$family_member_id);
        return $this->getSingle();
    }

    public function update_familymember($family_member_id,$familymember){
        $this->query("UPDATE FamilyMember SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, ssn = :ssn, medicare_number = :medicare_number, phone_number = :phone_number, address = :address, city = :city, province = :province, postal_code = :postal_code, email = :email WHERE family_member_id = :family_member_id");

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

    // public function update_familymember_location($family_member_id, $location_id){

    //     $this->query("UPDATE AssignedTo SET end_date = NOW() WHERE family_member_id = :family_member_id");
    //     $this->bind(":family_member_id", $family_member_id);

    //     if (!$this->execute()) {
    //         return false;
    //     }

    //     $this->query("INSERT INTO AssignedTo (familymember_id, location_id) VALUES (:family_member_id, :location_id)");
    //     $this->bind(":family_member_id", $family_member_id);
    //     $this->bind(":location_id", $location_id);

    //     return $this->execute();
    // }

    public function add_relationship($family_member_id, $membership_number, $relationship, $start_date){
        $this->query("INSERT INTO RelatedTo (familymember_id, membership_number, relationship, start_date) VALUES (:family_member_id, :membership_number, :relationship, :start_date)");
        $this->bind(":family_member_id",$family_member_id);
        $this->bind(":membership_number",$membership_number);
        $this->bind(":relationship", $relationship);
        $this->bind(":start_date", $start_date);
        return $this->execute();
    }

    public function old_familymember_location_ends($family_member_id, $location_id){
        $this->query("UPDATE AssignedTo SET end_date = CURDATE() 
                        WHERE family_member_id = :family_member_id AND location_id = :location_id AND end_date IS NULL");
        $this->bind(":family_member_id", $family_member_id);
        $this->bind(":location_id", $location_id);
        return $this->execute();
    }

    public function get_latest_familymember_id(){
        $this->query("SELECT LAST_INSERT_ID() AS family_member_id");
        return $this->getSingle();
    }
public function delete_familymember($family_member_id)
{
    $this->query(
        "DELETE FROM RelatedTo
         WHERE family_member_id = :family_member_id"
    );
    $this->bind(":family_member_id", $family_member_id);
    $this->execute();

    $this->query(
        "DELETE FROM AssignedTo
         WHERE family_member_id = :family_member_id"
    );
    $this->bind(":family_member_id", $family_member_id);
    $this->execute();

    $this->query(
        "DELETE FROM FamilyMember
         WHERE family_member_id = :family_member_id"
    );
    $this->bind(":family_member_id", $family_member_id);

    return $this->execute();
}
public function search_familymembers($search_value)
{
    $search_pattern = '%' . $search_value . '%';

    $this->query(
        "SELECT *
         FROM FamilyMember
         WHERE CAST(family_member_id AS CHAR)
                   LIKE :family_member_id
            OR first_name LIKE :first_name
            OR last_name LIKE :last_name
            OR CONCAT(first_name, ' ', last_name)
                   LIKE :full_name
            OR date_of_birth LIKE :date_of_birth
            OR ssn LIKE :ssn
            OR medicare_number LIKE :medicare_number
            OR phone_number LIKE :phone_number
            OR address LIKE :address
            OR city LIKE :city
            OR province LIKE :province
            OR postal_code LIKE :postal_code
            OR email LIKE :email
         ORDER BY last_name, first_name"
    );

    $this->bind(":family_member_id", $search_pattern);
    $this->bind(":first_name", $search_pattern);
    $this->bind(":last_name", $search_pattern);
    $this->bind(":full_name", $search_pattern);
    $this->bind(":date_of_birth", $search_pattern);
    $this->bind(":ssn", $search_pattern);
    $this->bind(":medicare_number", $search_pattern);
    $this->bind(":phone_number", $search_pattern);
    $this->bind(":address", $search_pattern);
    $this->bind(":city", $search_pattern);
    $this->bind(":province", $search_pattern);
    $this->bind(":postal_code", $search_pattern);
    $this->bind(":email", $search_pattern);

    return $this->getResultSet();
}
    
}

?>