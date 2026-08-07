<?php
class location_model extends Model{


    public function __construct(){
            parent::__construct();
    }
    

    public function get_location($location_id){
        $this->query("SELECT * FROM location WHERE location_id = :location_id");
        $this->bind(":location_id",$location_id);
        return $this->getSingle();
    }

    public function get_locations(){
        $this->query("SELECT * FROM location");
        return $this->getResultSet();
    }

    public function get_location_phone_numbers($location_id){
        $this->query("SELECT phone_number FROM LocationPhone WHERE location_id = :location_id");
        $this->bind(":location_id",$location_id);
        return $this->getResultSet();
    }

    public function add_location($location){
        $this->query("INSERT INTO location (location_type,location_name,address,city,province,postal_code,web_address,max_capacity)
                                 VALUES (:location_type,:location_name,:address,:city,:province,:postal_code,:web_address,:max_capacity)");

        $this->bind(":location_type",$location['location_type']);
        $this->bind(":location_name",$location['location_name']);
        $this->bind(":address",$location['address']);
        $this->bind(":city",$location['city']);
        $this->bind(":province",$location['province']);
        $this->bind(":postal_code",$location['postal_code']);
        // $this->bind(":phone_number",$location['phone_number']);
        $this->bind(":web_address",$location['web_address']);
        $this->bind(":max_capacity",$location['max_capacity']);

        return $this->execute();
    }

    public function add_location_phone_number($location_id, $phone_number){
        $this->query("INSERT INTO LocationPhone (location_id, phone_number) VALUES (:location_id, :phone_number)");
        $this->bind(":location_id",$location_id);
        $this->bind(":phone_number",$phone_number);

        return $this->execute();
    }

    public function update_location($location_id,$location){
        $this->query("UPDATE location SET location_name = :location_name, address = :address, city = :city, province = :province, postal_code = :postal_code, web_address = :web_address, max_capacity = :max_capacity WHERE location_id = :location_id");

        $this->bind(":location_id",$location_id);
        $this->bind(":location_name",$location['location_name']);
        $this->bind(":address",$location['address']);
        $this->bind(":city",$location['city']);
        $this->bind(":province",$location['province']);
        $this->bind(":postal_code",$location['postal_code']);
        // $this->bind(":phone_number",$location['phone_number']);
        $this->bind(":web_address",$location['web_address']);
        $this->bind(":max_capacity",$location['max_capacity']);

        return $this->execute();
    }

    public function update_location_phone_numbers($location_id, $phone_numbers){
        $this->query("DELETE FROM LocationPhone WHERE location_id = :location_id");
        $this->bind(":location_id",$location_id);
        $this->execute();
        
    }

    function get_latest_location_id(){
        $this->query("SELECT LAST_INSERT_ID() AS location_id");
        return $this->getSingle();
    }
public function search_locations($search_value)
{
    $search_pattern = '%' . $search_value . '%';

    $this->query(
        "SELECT *
         FROM Location
         WHERE CAST(location_id AS CHAR) LIKE :location_id
            OR location_type LIKE :location_type
            OR location_name LIKE :location_name
            OR address LIKE :address
            OR city LIKE :city
            OR province LIKE :province
            OR postal_code LIKE :postal_code
            OR web_address LIKE :web_address
            OR CAST(max_capacity AS CHAR) LIKE :max_capacity
            OR EXISTS (
                SELECT 1
                FROM LocationPhone
                WHERE LocationPhone.location_id =
                      Location.location_id
                  AND LocationPhone.phone_number
                      LIKE :phone_number
            )
         ORDER BY location_name"
    );

    $this->bind(":location_id", $search_pattern);
    $this->bind(":location_type", $search_pattern);
    $this->bind(":location_name", $search_pattern);
    $this->bind(":address", $search_pattern);
    $this->bind(":city", $search_pattern);
    $this->bind(":province", $search_pattern);
    $this->bind(":postal_code", $search_pattern);
    $this->bind(":web_address", $search_pattern);
    $this->bind(":max_capacity", $search_pattern);
    $this->bind(":phone_number", $search_pattern);

    return $this->getResultSet();
}
public function delete_location($location_id)
{
    $tables = [
        "LocationPhone",
        "PlaysAt",
        "EmailLog",
        "EmployedAt",
        "AssignedTo",
        "Manages"
    ];

    foreach ($tables as $table) {
        $this->query(
            "DELETE FROM $table
             WHERE location_id = :location_id"
        );

        $this->bind(":location_id", $location_id);
        $this->execute();
    }

    $this->query(
        "DELETE FROM Location
         WHERE location_id = :location_id"
    );

    $this->bind(":location_id", $location_id);

    return $this->execute();
}
}

?>