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

}

