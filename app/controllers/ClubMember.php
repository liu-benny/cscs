<?php

class ClubMember extends Controller{

    protected $clubmember_model;
    protected $location_model;
    protected $familymember_model;

    public function __construct(){
        $this->clubmember_model = $this->model('clubmember_model');
        $this->location_model = $this->model('location_model');
        $this->familymember_model = $this->model('familymember_model');
    }

  /*  public function index(){
        $clubmembers = $this->clubmember_model->get_clubmembers();
        $data = [
            "clubmembers" => $clubmembers
        ];
        $this->view('ClubMember/get_clubmembers',$data);
    }*/
    public function index()
{
    $search_value = '';

    if (isset($_GET['search'])) {
        $search_value = trim($_GET['search']);
    }
    if ($search_value !== '') {
        $clubmembers =
            $this->clubmember_model->search_clubmembers($search_value);
    } else {
        $clubmembers =
            $this->clubmember_model->get_clubmembers();
    }

    $data = [
        'clubmembers' => $clubmembers,
        'search_value' => $search_value
    ];

    $this->view('ClubMember/get_clubmembers', $data);
}

    public function add_clubmember(){
        if(!isset($_POST['submit'])){
            $locations = $this->location_model->get_locations();
            $data = [
                'locations' => $locations
            ];
            $this->view("ClubMember/add_clubmember", $data);
        }
        else{
            $data=[
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'gender' => trim($_POST['gender']),
                'height_cm' => trim($_POST['height_cm']),
                'weight_kg' => trim($_POST['weight_kg']),
                'ssn' => trim($_POST['ssn']),
                'medicare_number' => trim($_POST['medicare_number']),
                'phone_number' => trim($_POST['phone_number']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code']),
                'location_id' => trim($_POST['location_id']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date']),
                'familymembers' => $this->familymember_model->get_familymembers()
            ];

            $max_minor = date('Y-m-d', strtotime('-4 years'));
            $min_minor = date('Y-m-d', strtotime('-18 years'));

            
            if ($data['date_of_birth'] < $max_minor && $data['date_of_birth'] >= $min_minor) {
                if(session_status() === PHP_SESSION_NONE) { session_start(); }
                 $_SESSION['temp_clubmember_data'] = $data;
                 $this->view("ClubMember/assign_family_member", $data);
            }
            else if($this->clubmember_model->add_clubmember($data)){

                $new_clubmember = $this->clubmember_model->get_latest_membership_number(); 
                if($this->clubmember_model->add_clubmember_location($new_clubmember->membership_number, $data['location_id'], $data['start_date'],$data['end_date'])){
                    echo 'Please wait we are adding the club member for you!';
                
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                }

            }
            
        }
    }

    public function assign_family_member(){
        
        if(session_status() === PHP_SESSION_NONE) { session_start(); }

        if(!isset($_POST['submit'])){

            $this->view("ClubMember/assign_family_member", $_SESSION['temp_clubmember_data']);
            
        }
        else{
            $data = $_SESSION['temp_clubmember_data'];
            $data['family_member_id'] = trim($_POST['family_member_id']);
            $data['relationship_type'] = trim($_POST['relationship_type']);

            if($this->clubmember_model->add_clubmember($data)){

                $new_clubmember = $this->clubmember_model->get_latest_membership_number(); 
                if($this->clubmember_model->add_clubmember_location($new_clubmember->membership_number, $data['location_id'], $data['start_date'],$data['end_date'])){

                    if($this->clubmember_model->add_relationship($new_clubmember->membership_number, $data['family_member_id'], $data['relationship_type'])){
                        echo 'Please wait we are adding the club member for you!';
                
                        echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                    }
                }

            }
        }
    }

    public function edit_clubmember($membership_number){

        $clubmember = $this->clubmember_model->get_clubmember($membership_number);
        if(!isset($clubmember->membership_number)){
                echo 'Club Member not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                return;
        }
        $current_location = $this->clubmember_model->get_clubmember_location($membership_number);
        $data = [
            "clubmember" => $clubmember,
            "current_location" => $current_location
        ];

        if(!isset($_POST['submit'])){
            $this->view("ClubMember/edit_clubmember",$data);
        }
        else{
            $data=[
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'gender' => trim($_POST['gender']),
                'height_cm' => trim($_POST['height_cm']),
                'weight_kg' => trim($_POST['weight_kg']),
                'ssn' => trim($_POST['ssn']),
                'medicare_number' => trim($_POST['medicare_number']),
                'phone_number' => trim($_POST['phone_number']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code'])
            ];

            if($this->clubmember_model->update_clubmember($membership_number,$data)){
                echo 'Please wait we are updating the club member for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
            }
        }
    }

    public function change_location($membership_number){
        $clubmember = $this->clubmember_model->get_clubmember($membership_number);
        if(!isset($clubmember->membership_number)){
                echo 'Club Member not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                return;
        }
        $locations = $this->location_model->get_locations();
        $current_location = $this->clubmember_model->get_clubmember_location($membership_number);
        $data = [
            "clubmember" => $clubmember,
            "locations" => $locations,
            "current_location" => $current_location
        ];

        if(!isset($_POST['submit'])){
            $this->view("ClubMember/change_location",$data);
        }
        else{
            $data=[
                'location_id' => trim($_POST['location_id']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => null
            ];

            if($this->clubmember_model->old_clubmember_location_ends($membership_number, $current_location->location_id)){
                if($this->clubmember_model->add_clubmember_location($membership_number,$data['location_id'],$data['start_date'],$data['end_date'])){
                    echo 'Please wait we are updating the club member location for you!';
                    
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                }
            }
        }
    }

public function delete_clubmember($membership_number)
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/ClubMember/index');
        exit;
    }

    if ($this->clubmember_model->delete_clubmember($membership_number)) {
        header(
            'Location: ' . URLROOT .
            '/ClubMember/index?deleted=1'
        );
        exit;
    }

    echo 'Unable to delete the club member.';
}

}




?>