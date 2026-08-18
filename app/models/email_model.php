<?php

class email_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_email_logs(){
        $this->query("SELECT * FROM EmailLog");

        return $this->getResultSet();
    }

    public function get_weekly_sessions(){
        $this->query("SELECT 
                        Team.name,
                        TeamSession.session_type,
                        TeamSession.date,
                        TeamSession.start_time,
                        ClubMember.first_name,
                        ClubMember.last_name,
                        ClubMember.email,
                        TeamPlayer.position,
                        Personnel.first_name AS coach_first,
                        Personnel.last_name AS coach_last,
                        Personnel.email AS coach_email,
                        Location.location_name
                    FROM TeamSession
                    JOIN TeamFormation ON TeamSession.session_id = TeamFormation.session_id
                    JOIN Team ON TeamFormation.team_id = Team.team_id
                    JOIN PlaysAt ON Team.team_id = PlaysAt.team_id
                    JOIN Location ON PlaysAt.location_id = Location.location_id
                    JOIN Personnel ON TeamFormation.coach_id = Personnel.personnel_id
                    JOIN TeamPlayer ON TeamFormation.team_id = TeamPlayer.team_id AND TeamSession.session_id = TeamPlayer.session_id
                    JOIN ClubMember ON TeamPlayer.membership_number = ClubMember.membership_number
                    WHERE TeamSession.date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)
                    ORDER BY TeamSession.date, TeamSession.start_time, Team.name, ClubMember.last_name;");

        return $this->getResultSet();
    }

    public function add_email_log($location_name,$date,$receiver_email,$subject,$body){
        $this->query("INSERT INTO EmailLog (location_name,date,receiver_email,subject,body) 
                        VALUES (:location_name,:date,:receiver_email,:subject,:body) ");
        $this->bind(":location_name",$location_name);
        $this->bind(":date",$date);
        $this->bind(":receiver_email",$receiver_email);
        $this->bind(":subject",$subject);
        $this->bind(":body",$body);

        return $this->execute();
    }

}