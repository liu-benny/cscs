<?php

class Personnel extends Controller {
    
    protected $personnel_model;
    protected $location_model;

    public function __construct(){
        $this->personnel_model = $this->model('personnel_model');
        $this->location_model = $this->model('location_model');
    }

    /*public function index(){
        $personnels = $this->personnel_model->get_personnels();
        $data = [
            "personnels" => $personnels
        ];
        $this->view('Personnel/get_personnels',$data);
    }*/
public function index()
{
    $search_value = '';

    if (isset($_GET['search'])) {
        $search_value = trim($_GET['search']);
    }

    if ($search_value !== '') {
        $personnels =
            $this->personnel_model->search_personnels($search_value);
    } else {
        $personnels =
            $this->personnel_model->get_personnels();
    }

    $data = [
        'personnels' => $personnels,
        'search_value' => $search_value
    ];

    $this->view('Personnel/get_personnels', $data);
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
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            
            if($this->personnel_model->add_personnel($data)){

                $new_personnel = $this->personnel_model->get_latest_personnel_id(); 
                if($this->personnel_model->add_personnel_location($new_personnel->personnel_id, $location_id, $start_date, $end_date)){
                    echo 'Please wait we are adding the personnel for you!';
                
                    echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Personnel/index">';
                }

            }
        }
    }

    public function edit_personnel($personnel_id){
        if(!isset($_POST['submit'])){
            $personnel = $this->personnel_model->get_personnel($personnel_id);

            if(!isset($personnel->personnel_id)){
                echo 'Personnel not found!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Personnel/index">';
                return;
            }
            $locations = $this->location_model->get_locations();
            $current_location = $this->personnel_model->get_current_personnel_location($personnel_id);
            $data = [
                'personnel' => $personnel,
                'locations' => $locations,
                'current_location' => $current_location
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
        
        public function change_location($personnel_id){
            if(!isset($_POST['submit'])){
                $personnel = $this->personnel_model->get_personnel($personnel_id);
                $locations = $this->location_model->get_locations();
                $current_location = $this->personnel_model->get_current_personnel_location($personnel_id);
                $data = [
                    'personnel' => $personnel,
                    'locations' => $locations,
                    'current_location' => $current_location
                ];
                $this->view("Personnel/change_location", $data);
            }
            else{
                $current_location = $this->personnel_model->get_current_personnel_location($personnel_id);
                $location_id = trim($_POST['location_id']);
                $start_date = trim($_POST['start_date']);
                // $end_date = trim($_POST['end_date']);
    
                if($this->personnel_model->old_personnel_location_ends($personnel_id, $current_location->location_id)){
                    if($this->personnel_model->add_personnel_location($personnel_id, $location_id, $start_date, "")){
                        echo 'Please wait we are updating the personnel location for you!';
                    
                        echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Personnel/index">';
                    }
                }
            }
        }

        public function delete_personnel($personnel_id)
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/Personnel/index');
        exit;
    }

    $personnel =
        $this->personnel_model->get_personnel($personnel_id);

    if (!isset($personnel->personnel_id)) {
        header(
            'Location: ' . URLROOT .
            '/Personnel/index?delete_error=not_found'
        );
        exit;
    }

    if ($this->personnel_model->delete_personnel($personnel_id)) {
        header(
            'Location: ' . URLROOT .
            '/Personnel/index?deleted=1'
        );
        exit;
    }

    header(
        'Location: ' . URLROOT .
        '/Personnel/index?delete_error=1'
    );
    exit;
}
}

    



?>