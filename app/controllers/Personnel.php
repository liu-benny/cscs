<?php

class Personnel extends Controller {
    
    protected $personnel_model;
    protected $location_model;

    public function __construct(){
        $this->personnel_model = $this->model('personnel_model');
        $this->location_model = $this->model('location_model');
    }

    public function index(){
        $personnels = $this->personnel_model->get_personnels();
        $data = [
            "personnels" => $personnels
        ];
        $this->view('Personnel/get_personnels',$data);
    }

    public function add_personnel(){
        if(!isset($_POST['submit'])){
            $locations = $this->location_model->get_locations();
            $data = [
                'locations' => $locations
            ];
            $this->view("Personnel/add_personnel", $data);
        }
        else{
            $data=[
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'ssn' => trim($_POST['ssn']),
                'medicare_number' => trim($_POST['medicare_number']),
                'phone_number' => trim($_POST['phone_number']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code']),
                'email' => trim($_POST['email']),
                'personnel_role' => trim($_POST['personnel_role']),
                'mandate' => trim($_POST['mandate'])
                
            ];

            $location_id = trim($_POST['location_id']);
            
            if($this->personnel_model->add_personnel($data)){

                $personnel = $this->personnel_model->get_latest_personnel_id(); 
                if($this->personnel_model->add_personnel_location($personnel->personnel_id, $location_id)){
                    echo 'Please wait we are adding the personnel for you!';
                
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Personnel/index">';
                }

            }
        }
    }

    public function edit_personnel($personnel_id){
        if(!isset($_POST['submit'])){
            $personnel = $this->personnel_model->get_personnel($personnel_id);
            $data = [
                'personnel' => $personnel
            ];
            $this->view("Personnel/edit_personnel", $data);
        }
        else{
            $data=[
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'ssn' => trim($_POST['ssn']),
                'medicare_number' => trim($_POST['medicare_number']),
                'phone_number' => trim($_POST['phone_number']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code']),
                'email' => trim($_POST['email']),
                'personnel_role' => trim($_POST['personnel_role']),
                'mandate' => trim($_POST['mandate'])
                
            ];
    
            if($this->personnel_model->update_personnel($personnel_id,$data)){
                echo 'Please wait we are updating the personnel for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Personnel/index">';
            }
        }
        
    }

    
}


?>