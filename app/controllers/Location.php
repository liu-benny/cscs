<?php
class Location extends Controller
{
    protected $location_model;

    public function __construct()
    {
        $this->location_model = $this->model('location_model');
    }

    public function index()
    {
        $locations = $this->location_model->get_locations();
        $data = [
            "locations" => $locations
        ];
        $this->view('Location/get_locations',$data);
    }

    public function add_location(){
        if(!isset($_POST['submit'])){
            $this->view("Location/add_location");
        }
        else{
            $data=[
                'location_type' => trim($_POST['location_type']),
                'location_name' => trim($_POST['location_name']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code']),
                'phone_number' => trim($_POST['phone_number']),
                'web_address' => trim($_POST['web_address']),
                'max_capacity' => trim($_POST['max_capacity'])
                
            ];
    
            if($this->location_model->add_location($data)){
                echo 'Please wait we are adding the location for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Location/index">';
            }
        }
        
    }

    public function edit_location($location_id){

        $location = $this->location_model->get_location($location_id);
        if(!isset($location->location_id)){
                echo 'Location not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Location/index">';
                return;
        }
        $data = [
            "location" => $location
        ];

        if(!isset($_POST['submit'])){
            $this->view("Location/edit_location",$data);
        }
        else{
            $data=[
                'location_name' => trim($_POST['location_name']),
                'address' => trim($_POST['address']),
                'city' => trim($_POST['city']),
                'province' => trim($_POST['province']),
                'postal_code' => trim($_POST['postal_code']),
                'phone_number' => trim($_POST['phone_number']),
                'web_address' => trim($_POST['web_address']),
                'max_capacity' => trim($_POST['max_capacity'])
                
            ];
    
            if($this->location_model->update_location($location_id,$data)){
                echo 'Please wait we are updating the location for you!';
                
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Location/index">';
            }
        }
    }

}

?>