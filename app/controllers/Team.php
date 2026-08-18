<?php

class Team extends Controller
{
    protected $team_model;
    protected $location_model;
    protected $personnel_model;
    protected $clubmember_model;

    public function __construct()
    {
        $this->team_model = $this->model('team_model');
        $this->location_model = $this->model('location_model');
        $this->personnel_model = $this->model('personnel_model');
        $this->clubmember_model = $this->model('clubmember_model');
    }

    public function index()
    {
        if(session_status() === PHP_SESSION_NONE) { session_start(); }

        foreach ($_SESSION as $key => $value) { 
                    unset($_SESSION[$key]);
        }
        $team_formations = $this->team_model->get_team_formations();

        foreach ($team_formations as $formation) {
            $formation->players = $this->team_model->get_team_players(
                $formation->team_id,
                $formation->session_id
            );
        }

        $data = [
            'team_formations' => $team_formations
        ];

        $this->view('Team/get_team_formations', $data);
    }

    public function add_team()
    {
        if (!isset($_POST['submit'])) {

            $locations = $this->location_model->get_locations();

            $data = [
                'locations' => $locations
            ];

            $this->view("Team/add_team",$data);
        } else {
            $data = [
                'name' => trim($_POST['name']),
                'gender_category' => trim($_POST['gender_category']),
                'location_id' => trim($_POST['location_id'])
            ];

            if ($this->team_model->add_team($data)) {
                $latest_team_id = $this->team_model->get_latest_team_id()->team_id;
                $this->team_model->add_team_location($latest_team_id, $data['location_id']);
                echo 'Team added successfully!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Team/index">';
            }
        }

    }

    public function add_team_session()
    {
        // if(session_status() === PHP_SESSION_NONE) { session_start(); }
        
        // if (!isset($_POST['submit'])) {

        //     $this->view("Team/add_team_session");
        // } else {
        //     $data = [
        //         'session_type' => trim($_POST['session_type']),
        //         'date' => trim($_POST['date']),
        //         'start_time' => trim($_POST['start_time']),
        //         'address' => trim($_POST['address']),
        //         'gender' => trim($_POST['gender'])
                
        //     ];

        //     $_SESSION['new_session'] = $data;
        //     $this->view("Team/choose_teams",$data);
        // }
    if(session_status() === PHP_SESSION_NONE) { session_start(); }
    
    if (!isset($_POST['submit'])) {
        $this->view("Team/add_team_session");
    } else {
        
        $date_time = new DateTime(trim($_POST['date']) . ' ' . trim($_POST['start_time']));
        $_SESSION = [
            'session_type' => trim($_POST['session_type']),
            'date' => trim($_POST['date']),
            'start_time' => trim($_POST['start_time']),
            'address' => trim($_POST['address']),
            'gender' => trim($_POST['gender']),
            'date_time' => $date_time
        ];

        $teams = $this->team_model->get_team_by_gender($_SESSION['gender']);

        $data = [
            'teams' => $teams,
            'new_session' => $_SESSION
        ];

        
        $this->view("Team/choose_teams", $data);
    }

    }

    public function choose_teams()
    {
        if (!isset($_POST['submit'])) {
            $teams = $this->team_model->get_team_by_gender($_SESSION['gender']);
            $data = [
                'teams' => $teams,
                'new_session' => $_SESSION
            ];

             $this->view("Team/choose_teams", $data);
        }
        else{
            $team1_id = trim($_POST['team1_id']);
            $team2_id = trim($_POST['team2_id']);

            $team1 = $this->team_model->get_team($team1_id);
            $team2 = $this->team_model->get_team($team2_id);

            $location1_id = $this->team_model->get_team_location($team1_id)->location_id;
            $location2_id = $this->team_model->get_team_location($team2_id)->location_id;

            $coaches1 = $this->personnel_model->get_head_coaches_by_location($location1_id);
            $coaches2 = $this->personnel_model->get_head_coaches_by_location($location2_id);

            $players1 = $this->clubmember_model->get_clubmember_by_location_and_gender($location1_id, $team1->gender_category);
            $players2 = $this->clubmember_model->get_clubmember_by_location_and_gender($location2_id, $team2->gender_category);

            $data = [
                'team1' => $team1,
                'team2' => $team2,
                'coaches1' => $coaches1,
                'coaches2' => $coaches2,
                'players1' => $players1,
                'players2' => $players2,
            ];

            $_SESSION['team1'] = $team1;
            $_SESSION['team2'] = $team2;
            $_SESSION['coaches1'] = $coaches1;
            $_SESSION['coaches2'] = $coaches2;
            $_SESSION['players1'] = $players1;
            $_SESSION['players2'] = $players2;

            $this->view("Team/add_team_formations", $data);
        }

       
    }

    public function add_team_formations(){

        if (!isset($_POST['submit'])) {
            
            $this->view("Team/add_team_formation", $_SESSION);
        }
        else{

            $data =[
                'coach1_id' => trim($_POST['coach1_id']),
                'coach2_id' => trim($_POST['coach2_id']),
                'team1_players' => $_POST['team1_players'] ?? [],
                'team2_players' => $_POST['team2_players'] ?? [],
                'team1_score'   => (!empty($_POST['team1_score']) || (isset($_POST['team1_score']) && $_POST['team1_score'] === '0')) ? trim($_POST['team1_score']) : null,
                'team2_score'   => (!empty($_POST['team2_score']) || (isset($_POST['team2_score']) && $_POST['team2_score'] === '0')) ? trim($_POST['team2_score']) : null
            ];

            $_SESSION['coach1_id'] = $data['coach1_id'];
            $_SESSION['coach2_id'] = $data['coach2_id'];
            $_SESSION['team1_players'] = $data['team1_players'];
            $_SESSION['team2_players'] = $data['team2_players'];
            $_SESSION['team1_score'] = $data['team1_score'];
            $_SESSION['team2_score'] = $data['team2_score'];

            foreach ($data['team1_players'] as $membership_number) {
                $player_sessions = $this->team_model->get_player_sessions($membership_number);   
                foreach ($player_sessions as $session) {
                    if ($session->date == $_SESSION['date']){
                        $current_session_time = new DateTime($session->start_time);
                        $new_session_time = new DateTime($_SESSION['start_time']);
                        
                        // Calculate the difference
                        $interval = $current_session_time->diff($new_session_time);
                        
                        // Convert the total interval difference into total hours
                        $hours_difference = $interval->h + ($interval->i / 60);

                    
                        if ($hours_difference <= 3) {
                            echo $session->first_name . ' ' . $session->last_name . ' (Membership # ' . $membership_number . ') is already assigned to a session at ' . $session->start_time . ' on ' . $session->date . ', which is less than 3 hours apart from the new session at ' . $_SESSION['start_time'] . ' on ' . $_SESSION['date'] . '. Please choose a different player.';
                            echo '<meta http-equiv="Refresh" content="5; url=' . URLROOT . '/Team/add_team_session">';
                            return;
                        }
                    }
                   
                }
            }

            foreach ($data['team2_players'] as $membership_number) {
                $player_sessions = $this->team_model->get_player_sessions($membership_number);   
                foreach ($player_sessions as $session) {
                    if ($session->date == $_SESSION['date']){
                        $current_session_time = new DateTime($session->start_time);
                        $new_session_time = new DateTime($_SESSION['start_time']);
                        
                        // Calculate the difference
                        $interval = $current_session_time->diff($new_session_time);
                        
                        // Convert the total interval difference into total hours
                        $hours_difference = $interval->h + ($interval->i / 60);

                    
                        if ($hours_difference <= 3) {
                            echo $session->first_name . ' ' . $session->last_name . ' (Membership Number: ' . $membership_number . ') is already assigned to a session at ' . $session->start_time . ' on ' . $session->date . ', which is less than 3 hours apart from the new session at ' . $_SESSION['start_time'] . ' on ' . $_SESSION['date'] . '. Please choose a different player.';
                            echo '<meta http-equiv="Refresh" content="5; url=' . URLROOT . '/Team/add_team_session">';
                            return;
                        }
                    }
                   
                }
            }

            $this->view("Team/assign_positions", $data);
        }
    }

    public function assign_positions(){
        
        if (!isset($_POST['submit'])) {

            $this->view("Team/assign_positions", $_SESSION);
        }
        else{
            $data =[
                'team1_positions' => $_POST['team1_positions'] ?? [],
                'team2_positions' => $_POST['team2_positions'] ?? [],
            ];

            if($this->team_model->add_team_session($_SESSION)){
                $latest_session_id = $this->team_model->get_latest_session_id()->session_id;
                $this->team_model->add_team_formation($_SESSION['team1']->team_id, $latest_session_id, $_SESSION['coach1_id'], $_SESSION['team1_score'] );
                $this->team_model->add_team_formation($_SESSION['team2']->team_id, $latest_session_id, $_SESSION['coach2_id'], $_SESSION['team2_score'] );

                foreach ($_SESSION['team1_players'] as $membership_number) {
                    $position = $data['team1_positions'][$membership_number] ?? null;
                    $this->team_model->add_team_player($_SESSION['team1']->team_id, $latest_session_id, $membership_number, $position);
                }

                foreach ($_SESSION['team2_players'] as $membership_number) {
                    $position = $data['team2_positions'][$membership_number] ?? null;
                    $this->team_model->add_team_player($_SESSION['team2']->team_id, $latest_session_id, $membership_number, $position);
                }

                foreach ($_SESSION as $key => $value) { 
                    unset($_SESSION[$key]);
                }

                echo 'Team formations added successfully!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Team/index">';
            }
            
        }
    }
    public function edit_team_formation($session_id,$team_id){
        $team_formation = $this->team_model->get_team_formation($session_id,$team_id);
        $team_players = $this->team_model->get_team_players($team_id, $session_id);

        $team_location = $this->team_model->get_team_location($team_id);

        $all_coaches = $this->personnel_model->get_head_coaches_by_location($team_location->location_id);
        $all_players = $this->clubmember_model->get_clubmember_by_location_and_gender($team_location->location_id,$team_formation->gender_category);
        
        if(!isset($_POST['submit'])){
            if(!isset($team_formation)){
            echo 'Team formation not found!';
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Team/index">';
            return; 
            }

            $data = [
                'team_formation' => $team_formation,
                'team_players' => $team_players,
                'all_coaches' => $all_coaches,
                'all_players' => $all_players
            ];
            $this->view("Team/edit_team_formation", $data);
        }
        else{
            if(session_status() === PHP_SESSION_NONE) { session_start(); }

            $data = [
                'team_formation' => $team_formation,
                'team_id' => $team_id,
                'session_id' => $session_id,
                'coach_id' => trim($_POST['coach_id']),
                'team_players'=>  $_POST['team_players'] ?? [],
                'team_score' => trim($_POST['score'] ?? NULL)
            ];

            $_SESSION['coach_id'] = $data['coach_id'];
            $_SESSION['team_players'] = $data['team_players'];
            $_SESSION['team_score'] = $data['team_score'];
            $_SESSION['team_formation'] = $data['team_formation'];
            $_SESSION['team_id'] = $data['team_id'];
            $_SESSION['session_id'] = $data['session_id'];
            
            $opposing_players = $this->team_model->get_opposing_players($data['team_id'],$data['session_id']);

            foreach ($data['team_players'] as $membership_number) {

                if (in_array($membership_number, array_column($opposing_players, 'membership_number'))) {
                    $index = array_search($membership_number, array_column($opposing_players, 'membership_number'));
    
                    $opposing_player = $opposing_players[$index];
                    echo $opposing_player->first_name . ' ' . $opposing_player->last_name . ' (Membership#' . $membership_number . ') is already on the opposing team!';
                    echo '<meta http-equiv="Refresh" content="3; url=' . URLROOT . '/Team/edit_team_formation/' . $session_id . '/' . $team_id . '" >';
                    return;
                }

                $all_other_sessions = $this->team_model->get_player_sessions_except_current($membership_number,$session_id);   
                foreach ($all_other_sessions as $other_session) {
                    if ($other_session->date == $_SESSION['team_formation']->date){
                        $other_session_time = new DateTime($other_session->start_time);
                        $current_session_time = new DateTime($data['team_formation']->start_time);
                        
                        // Calculate the difference
                        $interval = $other_session_time->diff($current_session_time);
                        
                        // Convert the total interval difference into total hours
                        $hours_difference = $interval->h + ($interval->i / 60);

                    
                        if ($hours_difference <= 3) {
                            echo $other_session->first_name . ' ' . $other_session->last_name . ' (Membership # ' . $membership_number . ') is already assigned to a session at ' . $other_session->start_time . ' on ' . $other_session->date . ', which is less than 3 hours apart from the new session at ' . $data['team_formation']->start_time . ' on ' . $data['team_formation']->date . '. Please choose a different player.';
                            echo '<meta http-equiv="Refresh" content="5; url=' . URLROOT . '/Team/edit_team_formation/' . $session_id . '/' . $team_id . '" >';
                            return;
                        }
                    }
                   
                }
            }
            $selected_players_objects = [];
            foreach ($data['team_players'] as $membership_number) {
                $selected_players_objects[] = $this->clubmember_model->get_clubmember($membership_number); 
            }

            // Save the complete objects to the session instead of just raw IDs
            $_SESSION['team_players_objects'] = $selected_players_objects;
            $this->view("Team/edit_positions",$_SESSION);
        }
        
    }

    public function edit_positions(){
        if(!isset($_POST['submit'])){
            
            $this->view("Team/edit_positions",$_SESSION);
        }

        else{
            $data = [
                'player_positions' => $_POST['player_positions']
            ];

            $_SESSION['player_positions'] = $data['player_positions'];

            if($this->team_model->update_team_formation($_SESSION)){
                echo 'The team formation was successfully changed!';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Team/index">';

            }
        }
    }
}

