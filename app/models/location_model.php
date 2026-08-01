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

    public function add_location($location){
        $this->query("INSERT INTO location (location_type,location_name,address,city,province,postal_code,phone_number,web_address,max_capacity)
                                 VALUES (:location_type,:location_name,:address,:city,:province,:postal_code,:phone_number,:web_address,:max_capacity)");

        $this->bind(":location_type",$location['location_type']);
        $this->bind(":location_name",$location['location_name']);
        $this->bind(":address",$location['address']);
        $this->bind(":city",$location['city']);
        $this->bind(":province",$location['province']);
        $this->bind(":postal_code",$location['postal_code']);
        $this->bind(":phone_number",$location['phone_number']);
        $this->bind(":web_address",$location['web_address']);
        $this->bind(":max_capacity",$location['max_capacity']);

        return $this->execute();
    }

    public function update_location($location_id,$location){
        $this->query("UPDATE location SET location_name = :location_name, address = :address, city = :city, province = :province, postal_code = :postal_code, phone_number = :phone_number, web_address = :web_address, max_capacity = :max_capacity WHERE location_id = :location_id");

        $this->bind(":location_id",$location_id);
        $this->bind(":location_name",$location['location_name']);
        $this->bind(":address",$location['address']);
        $this->bind(":city",$location['city']);
        $this->bind(":province",$location['province']);
        $this->bind(":postal_code",$location['postal_code']);
        $this->bind(":phone_number",$location['phone_number']);
        $this->bind(":web_address",$location['web_address']);
        $this->bind(":max_capacity",$location['max_capacity']);

        return $this->execute();
    }
}

?>