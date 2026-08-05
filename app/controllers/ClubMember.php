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

    public function index(){
        $clubmembers = $this->clubmember_model->get_clubmembers();
        $data = [
            "clubmembers" => $clubmembers
        ];
        $this->view('ClubMember/get_clubmembers',$data);
    }

    public function edit_clubmember($membership_number){

        $clubmember = $this->clubmember_model->get_clubmember($membership_number);
        if(!isset($clubmember->membership_number)){
                echo 'Club Member not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/ClubMember/index">';
                return;
        }
        $data = [
            "clubmember" => $clubmember
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

}


?>