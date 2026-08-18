<?php

class team_model extends Model{

    public function __construct(){
            parent::__construct();
    }

    public function get_teams(){
        $this->query("SELECT * FROM Team");
        return $this->getResultSet();
    }

    public function get_team_formation($session_id,$team_id){
        $this->query("SELECT Team.team_id, TeamFormation.session_id, Team.name, Team.gender_category, Personnel.first_name AS coach_first_name, Personnel.last_name AS coach_last_name, TeamFormation.coach_id,
                        COALESCE(CAST(TeamFormation.score AS CHAR(10)), 'TBA') AS score, TeamSession.date, TeamSession.start_time
                        FROM TeamFormation
                        JOIN Team ON TeamFormation.team_id = Team.team_id
                        JOIN Personnel ON TeamFormation.coach_id = Personnel.personnel_id
                        JOIN TeamSession ON TeamFormation.session_id = TeamSession.session_id
                        WHERE TeamFormation.session_id = :session_id AND TeamFormation.team_id = :team_id");

        $this->bind(":session_id",$session_id);
        $this->bind(":team_id",$team_id);

        return $this->getSingle();
    }


    public function get_team_formations(){
        $this->query("SELECT Team.team_id, TeamFormation.session_id, Team.name, Team.gender_category, Personnel.first_name AS coach_first_name, Personnel.last_name AS coach_last_name, 
                        COALESCE(CAST(TeamFormation.score AS CHAR(10)), 'TBA') AS score, TeamSession.date, TeamSession.start_time
                        FROM TeamFormation
                        JOIN Team ON TeamFormation.team_id = Team.team_id
                        JOIN Personnel ON TeamFormation.coach_id = Personnel.personnel_id
                        JOIN TeamSession ON TeamFormation.session_id = TeamSession.session_id
                        ORDER BY TeamFormation.session_id DESC");
        return $this->getResultSet();
    }

    public function get_team_players($team_id, $session_id){
        $this->query("SELECT ClubMember.membership_number,ClubMember.first_name, ClubMember.last_name, TeamPlayer.position
                        FROM TeamPlayer
                        JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                        WHERE TeamPlayer.team_id = :team_id AND TeamPlayer.session_id = :session_id
                        ");
        $this->bind(":team_id",$team_id);
        $this->bind(":session_id",$session_id);
        return $this->getResultSet();
    }

    public function get_team($team_id){
        $this->query("SELECT * FROM Team WHERE team_id = :team_id");
        $this->bind(":team_id",$team_id);
        return $this->getSingle();
    }

    public function get_team_by_gender($gender_category){
        $this->query("SELECT * FROM Team WHERE gender_category = :gender_category");
        $this->bind(":gender_category",$gender_category);
        return $this->getResultSet();     
    }

    public function get_team_by_gender_and_location($gender_category, $location_id){
        $this->query("SELECT * FROM Team 
                    WHERE gender_category = :gender_category AND team_id IN (SELECT team_id FROM PlaysAt WHERE location_id = :location_id)");
        $this->bind(":gender_category",$gender_category);
        $this->bind(":location_id",$location_id);

        return $this->getResultSet();
    }
    public function get_team_location($team_id){
        $this->query("SELECT location_id FROM PlaysAt WHERE team_id = :team_id");
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

    public function add_team_formation($team_id, $session_id, $coach_id,$score){
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

    public function get_player_sessions($membership_number){
        $this->query("SELECT TeamFormation.session_id, TeamFormation.team_id, TeamFormation.coach_id, TeamFormation.score, TeamSession.date, TeamSession.start_time, TeamPlayer.membership_number,ClubMember.first_name, ClubMember.last_name
                        FROM TeamPlayer
                        JOIN TeamFormation ON TeamPlayer.team_id = TeamFormation.team_id AND TeamPlayer.session_id = TeamFormation.session_id
                        JOIN TeamSession ON TeamFormation.session_id = TeamSession.session_id
                        JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                        WHERE TeamPlayer.membership_number = :membership_number
                        ORDER BY TeamSession.date DESC");
        $this->bind(":membership_number",$membership_number);
        return $this->getResultSet();
    }

    public function get_player_sessions_except_current($membership_number,$session_id){
        $this->query("SELECT TeamFormation.session_id, TeamFormation.team_id, TeamFormation.coach_id, TeamFormation.score, TeamSession.date, TeamSession.start_time, TeamPlayer.membership_number,ClubMember.first_name, ClubMember.last_name
                        FROM TeamPlayer
                        JOIN TeamFormation ON TeamPlayer.team_id = TeamFormation.team_id AND TeamPlayer.session_id = TeamFormation.session_id
                        JOIN TeamSession ON TeamFormation.session_id = TeamSession.session_id
                        JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                        WHERE TeamPlayer.membership_number = :membership_number AND TeamSession.session_id != :session_id
                        ORDER BY TeamSession.date DESC");
        $this->bind(":membership_number",$membership_number);
        $this->bind(":session_id",$session_id);
        return $this->getResultSet();
    }

    public function update_team_formation($data){
        $this->query("UPDATE TeamFormation 
                    SET coach_id = :coach_id, 
                        score = :score 
                    WHERE team_id = :team_id 
                    AND session_id = :session_id;");
        $this->bind(":coach_id", $data['coach_id']);
        // Note: Make sure your session uses 'team_score' or 'score' consistently
        $this->bind(":score", $data['team_score'] ?? $data['score']); 
        $this->bind(":team_id", $data['team_id']);
        $this->bind(":session_id", $data['session_id']);

        if($this->execute()){
        
            $this->query("DELETE FROM TeamPlayer 
                        WHERE team_id = :team_id 
                        AND session_id = :session_id");
            $this->bind(":team_id", $data['team_id']);
            $this->bind(":session_id", $data['session_id']);
                        
            if($this->execute()){
                foreach($data['team_players'] as $membership_number){
                    
                    // FIXED: Safely pull the correct position using the player's ID as the array key
                    $position = $data['player_positions'][$membership_number] ?? 'Unassigned';

                    $this->query("INSERT INTO TeamPlayer (team_id, session_id, membership_number, position) 
                                VALUES (:team_id, :session_id, :membership_number, :position);");
                    $this->bind(":team_id", $data['team_id']);
                    $this->bind(":session_id", $data['session_id']);
                    $this->bind(":membership_number", $membership_number);
                    $this->bind(":position", $position); // FIXED: Added missing bind for position
                    
                    // Execute individual insert
                    if(!$this->execute()){
                        return false; // Break early if an insert fails
                    }
                }
            return true; // Everything updated perfectly
            }
         }
    return false;
       
    }

    public function get_opposing_players($team_id, $session_id) {
    $this->query("SELECT ClubMember.membership_number, ClubMember.first_name, ClubMember.last_name, TeamPlayer.position
                  FROM TeamPlayer
                  JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                  WHERE TeamPlayer.session_id = :session_id 
                    AND TeamPlayer.team_id != :team_id");
                    
    $this->bind(':session_id', $session_id);
    $this->bind(':team_id', $team_id);
    
    return $this->getResultSet(); 
}

    public function get_latest_team_id(){
        $this->query("SELECT LAST_INSERT_ID() AS team_id");
        return $this->getSingle();
    }
    

    public function get_latest_session_id(){
        $this->query("SELECT LAST_INSERT_ID() AS session_id");
        return $this->getSingle();
    }
}
