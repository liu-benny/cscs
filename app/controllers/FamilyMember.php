<?php

class FamilyMember extends Controller {
    
    protected $personnel_model;
    protected $location_model;
    protected $familymember_model;

    public function __construct(){
        $this->personnel_model = $this->model('personnel_model');
        $this->location_model = $this->model('location_model');
        $this->familymember_model = $this->model('familymember_model');
    }

    public function index(){
        $familymembers = $this->familymember_model->get_familymembers();
        $data = [
            "familymembers" => $familymembers
        ];
        $this->view('FamilyMember/get_familymembers',$data);
    }

    public function add_familymember(){
        if(!isset($_POST['submit'])){
            $locations = $this->location_model->get_locations();
            $data = [
                'locations' => $locations
            ];
            $this->view("FamilyMember/add_familymember", $data);
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
                'email' => trim($_POST['email'])
                
            ];

            $location_id = trim($_POST['location_id']);
            
            if($this->familymember_model->add_familymember($data)){

                $new_familymember = $this->familymember_model->get_latest_familymember_id(); 
                if($this->familymember_model->add_familymember_location($new_familymember->family_member_id, $location_id)){
                    echo 'Please wait we are adding the family member for you!';
                
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/FamilyMember/index">';
                }

            }
        }
        
    }

    public function edit_familymember($family_member_id){

        $familymember = $this->familymember_model->get_familymember($family_member_id);
        if(!isset($familymember->family_member_id)){
                echo 'Family Member not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/FamilyMember/index">';
                return;
        }
        $locations = $this->location_model->get_locations();
        $current_location = $this->familymember_model->get_current_familymember_location($family_member_id);
        $data = [
            "familymember" => $familymember,
            "locations" => $locations,
            "current_location" => $current_location
        ];

        if(!isset($_POST['submit'])){
            $this->view("FamilyMember/edit_familymember",$data);
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
                'email' => trim($_POST['email'])
                
            ];
    
            if($this->familymember_model->update_familymember($family_member_id,$data)){
                echo 'Please wait we are updating the family member for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/FamilyMember/index">';
            }
        }
        
    }

    public function change_location($family_member_id){
        $familymember = $this->familymember_model->get_familymember($family_member_id);
        if(!isset($familymember->family_member_id)){
                echo 'Family Member not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/FamilyMember/index">';
                return;
        }
        $locations = $this->location_model->get_locations();
        $current_location = $this->familymember_model->get_current_familymember_location($family_member_id);
        $data = [
            "familymember" => $familymember,
            "locations" => $locations,
            "current_location" => $current_location
        ];

        if(!isset($_POST['submit'])){
            $this->view("FamilyMember/change_location",$data);
        }
        else{
            $location_id = trim($_POST['location_id']);
            $start_date = trim($_POST['start_date']);
            // $end_date = trim($_POST['end_date']);

            if($this->familymember_model->old_familymember_location_ends($family_member_id, $current_location->location_id)){
                if($this->familymember_model->add_familymember_location($family_member_id, $location_id, $start_date, "")){
                echo 'Please wait we are updating the family member location for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/FamilyMember/index">';
            }
            }
            
        }
        
    }

    
}

    



?>