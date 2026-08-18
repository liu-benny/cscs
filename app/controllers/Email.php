<?php

class Email extends Controller {
    
    protected $email_model;
    protected $team_model;
    protected $location_model;
    protected $personnel_model;
    protected $clubmember_model;

    public function __construct(){
        $this->email_model = $this->model('email_model');
        $this->team_model = $this->model('team_model');
        $this->location_model = $this->model('location_model');
        $this->personnel_model = $this->model('personnel_model');
        $this->clubmember_model = $this->model('clubmember_model');
    }

    public function index(){
        $email_logs = $this->email_model->get_email_logs();

        $data = [
            'email_logs' => $email_logs
        ];

        $this->view("Email/get_email_log",$data);
    }

    public function send_weekly_email(){
        $weekly_sessions = $this->email_model->get_weekly_sessions();

        foreach($weekly_sessions as $session){
            $date_of_week = new DateTime($session->date);
            $subject = $session->name . " " . $date_of_week->format('l') . " " . $date_of_week->format('d-F-Y') . " " . $session->start_time . " " . $session->session_type;
            $body = "<p>Hello {$session->first_name} {$session->last_name},</p>" .
            "<p>This is a reminder of your upcoming session on " . $date_of_week->format('l') . " " . $date_of_week->format('j-F-Y') . " at {$session->start_time} for a {$session->session_type} session.</p>" .
            "<p>You are playing the <strong>{$session->position}</strong>. Your head coach will be {$session->coach_first} {$session->coach_last}. You may contact your coach via email: <a href='mailto:{$session->coach_email}'>{$session->coach_email}</a></p>" .
            "<p>Best Regards,<br>Country Soccer Club System</p>";
            
            $short_body = mb_substr(strip_tags($body), 0, 100);
            $current_date = date("Y-m-d");
            if($this->email_model->add_email_log($session->location_name,$current_date,$session->email,$subject,$short_body)){
                sendmail($subject,$body);
                
            }
            
        }
        echo 'Emails are being SENT! Please check your inbox!';
                
        echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Email/index">';

    }
}