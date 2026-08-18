<?php

class personnel_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_personnels(){
        $this->query("SELECT * FROM Personnel");
        return $this->getResultSet();
    }

    public function get_personnel($personnel_id){
        $this->query("SELECT * FROM Personnel WHERE personnel_id = :personnel_id");
        $this->bind(":personnel_id",$personnel_id);
        return $this->getSingle();
    }

    public function get_current_personnel_location($personnel_id){
        $this->query("SELECT Location.location_id, Location.location_name FROM EmployedAt 
                        JOIN Location ON EmployedAt.Location_id = Location.location_id 
                        WHERE EmployedAt.personnel_id = :personnel_id AND EmployedAt.end_date IS NULL");
        $this->bind(":personnel_id",$personnel_id);
        return $this->getSingle();
    }

    public function add_personnel($personnel){

        $this->query("INSERT INTO Personnel (first_name,last_name,date_of_birth,ssn,medicare_number, phone_number, address, city, province,postal_code, email,personnel_role,mandate)
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
        $this->query("UPDATE Personnel SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, ssn = :ssn, medicare_number = :medicare_number, phone_number = :phone_number, address = :address, city = :city, province = :province, postal_code = :postal_code, email = :email, personnel_role = :personnel_role, mandate = :mandate WHERE personnel_id = :personnel_id");

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

    public function add_personnel_location($personnel_id, $location_id,$start_date,$end_date){
        if ($end_date === "") {
            $this->query("INSERT INTO EmployedAt (personnel_id, location_id, start_date, end_date) VALUES (:personnel_id, :location_id, :start_date, NULL)");
        } else {
            $this->query("INSERT INTO EmployedAt (personnel_id, location_id, start_date, end_date) VALUES (:personnel_id, :location_id, :start_date, :end_date)");
            $this->bind(":end_date",$end_date);
        }
        $this->bind(":personnel_id",$personnel_id);
        $this->bind(":location_id",$location_id);
        $this->bind(":start_date",$start_date);
        

        return $this->execute();
    }

    // personnel location change means the end date will no longer be NULL
    public function old_personnel_location_ends($personnel_id, $location_id){

        $this->query("UPDATE EmployedAt SET end_date = GREATEST(start_date, CURDATE())
                        WHERE personnel_id = :personnel_id AND location_id = :location_id AND end_date IS NULL");
        $this->bind(":personnel_id", $personnel_id);
        $this->bind(":location_id", $location_id);

        return $this->execute();
    }

    public function search_personnels($search_value)
    {
        $search_pattern = '%' . $search_value . '%';

        $this->query(
            "SELECT *
            FROM Personnel
            WHERE CAST(personnel_id AS CHAR) LIKE :personnel_id
                OR first_name LIKE :first_name
                OR last_name LIKE :last_name
                OR CONCAT(first_name, ' ', last_name) LIKE :full_name
                OR date_of_birth LIKE :date_of_birth
                OR ssn LIKE :ssn
                OR medicare_number LIKE :medicare_number
                OR phone_number LIKE :phone_number
                OR address LIKE :address
                OR city LIKE :city
                OR province LIKE :province
                OR postal_code LIKE :postal_code
                OR email LIKE :email
                OR personnel_role LIKE :personnel_role
                OR mandate LIKE :mandate
            ORDER BY last_name, first_name"
        );

        $this->bind(":personnel_id", $search_pattern);
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
        $this->bind(":personnel_role", $search_pattern);
        $this->bind(":mandate", $search_pattern);

        return $this->getResultSet();
    }



    public function delete_personnel($personnel_id)
    {
    /*
        * TeamPlayer references TeamFormation, so delete those
        * player records before deleting coached formations.
        */
        $this->query(
            "DELETE TeamPlayer
                FROM TeamPlayer
                INNER JOIN TeamFormation
                ON TeamPlayer.team_id = TeamFormation.team_id
                AND TeamPlayer.session_id = TeamFormation.session_id
                WHERE TeamFormation.coach_id = :personnel_id"
        );

        $this->bind(":personnel_id", $personnel_id);
        $this->execute();

        $this->query(
            "DELETE FROM TeamFormation
                WHERE coach_id = :personnel_id"
        );

        $this->bind(":personnel_id", $personnel_id);
        $this->execute();

        $this->query(
            "DELETE FROM Manages
                WHERE personnel_id = :personnel_id"
        );

        $this->bind(":personnel_id", $personnel_id);
        $this->execute();

        $this->query(
            "DELETE FROM EmployedAt
                WHERE personnel_id = :personnel_id"
        );

        $this->bind(":personnel_id", $personnel_id);
        $this->execute();

        $this->query(
            "DELETE FROM Personnel
                WHERE personnel_id = :personnel_id"
        );

        $this->bind(":personnel_id", $personnel_id);

        return $this->execute();
    }

    public function get_head_coaches_by_location($location_id){
        $this->query("SELECT Personnel.* 
                        FROM Personnel
                        INNER JOIN EmployedAt ON Personnel.personnel_id = EmployedAt.personnel_id
                        WHERE Personnel.personnel_role = 'Coach' 
                        AND EmployedAt.location_id = :location_id;");
        $this->bind(":location_id", $location_id);
        return $this->getResultSet();
    }

    public function get_latest_personnel_id(){
        $this->query("SELECT LAST_INSERT_ID() AS personnel_id");
        return $this->getSingle();
    }

}

?>