<?php

class team_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_teams(){
        $this->query("SELECT * FROM Team");
        return $this->getResultSet();
    }

    public function get_team_formations(){
        $this->query("SELECT Team.team_id, Team.name, Team.gender_category, Personnel.first_name AS coach_first_name, Personnel.last_name AS coach_last_name
                        FROM TeamFormation
                        JOIN Team ON TeamFormation.team_id = Team.team_id
                        JOIN Personnel ON TeamFormation.coach_id = Personnel.personnel_id");
        return $this->getResultSet();
    }

    public function get_team_players($team_id, $session_id){
        $this->query("SELECT ClubMember.first_name, ClubMember.last_name, TeamPlayer.position
                        FROM TeamPlayer
                        JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                        WHERE TeamPlayer.team_id = :team_id AND TeamPlayer.session_id = :session_id");
        $this->bind(":team_id",$team_id);
        $this->bind(":session_id",$session_id);
        return $this->getResultSet();
    }

    public function get_team($team_id){
        $this->query("SELECT * FROM Team WHERE team_id = :team_id");
        $this->bind(":team_id",$team_id);
        return $this->getSingle();
    }

    public function add_team($team){

        $this->query("INSERT INTO Team (name, gender_category) VALUES (:name, :gender_category)");
        $this->bind(":name",$team['name']);
        $this->bind(":gender_category",$team['gender_category']);

        return $this->execute();
    }

    public function add_team_location($team_id, $location_id){
        $this->query("INSERT INTO PlaysAt (team_id, location_id) VALUES (:team_id, :location_id)");
        $this->bind(":team_id",$team_id);
        $this->bind(":location_id",$location_id);

        return $this->execute();
    }

    public function add_team_session($session){
        $this->query("INSERT INTO TeamSession (session_type, date, start_time, address) VALUES (:session_type, :date, :start_time, :address)");

        $this->bind(":session_type",$session['session_type']);
        $this->bind(":date",$session['date']);
        $this->bind(":start_time",$session['start_time']);
        $this->bind(":address",$session['address']);

        return $this->execute();
    }

    public function add_team_formation($team_id, $session_id, $coach_id,score){
        $this->query("INSERT INTO TeamFormation (team_id, session_id, coach_id, score) VALUES (:team_id, :session_id, :coach_id, :score)");

        $this->bind(":team_id",$team_id);
        $this->bind(":session_id",$session_id);
        $this->bind(":coach_id",$coach_id);
        $this->bind(":score",$score);

        return $this->execute();
    }

    public function add_team_player($team_id, $session_id, $membership_number, $position){
        $this->query("INSERT INTO TeamPlayer (team_id, session_id, membership_number, position) VALUES (:team_id, :session_id, :membership_number, :position)");

        $this->bind(":team_id",$team_id);
        $this->bind(":session_id",$session_id);
        $this->bind(":membership_number",$membership_number);
        $this->bind(":position",$position);

        return $this->execute();
    }
}
